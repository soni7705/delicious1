<?php include("../../inc/toppart.php"); ?>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        <!-- Navbar -->
        <?php include("../../inc/navbar.php"); ?>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include("../../inc/sidebar.php"); ?>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Add File </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add file</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->

            <section class="p-5">
                <div class="container">
                    <div class="form w-25 mx-auto">
                        <h5 class="py-5">Task Management system</h5>

                        <?php 
                    if(isset($_POST['submit'])){
                        $name= $_POST['name'];

                        // find file name like ram.png
                        $filename=$_FILES['dataFile']['name'];
                        // find size of file like 123142
                        $filesize=$_FILES['dataFile']['size'];
                        // fragmentation to file  ram  jpg
                        $explode= explode(".",$filename);
                        // convert file name in to lower case and [0] this is a indexing of file name
                        $fname= strtolower($explode[0]);
                        // convert extension in to lower case and [1] this is a indexing of file name
                        $ext= strtolower($explode[1]);
                        // replace the space on file name ram sharma.jpg : ramsharma.jpg
                        $rep= str_replace(" ", "", $filename);
                        
                        
                        // replace the space on file name ram sharma.jpg : ramsharma.jpg
                        $finalfilename= $rep.time().".".$ext;

                        if($filesize>30000){
                            if($ext=="jpg" || $ext=="png" || $ext=="mp4" || $ext=="pdf"  || $ext=="jpeg" || $ext=="mp3"){
                                if(move_uploaded_file($_FILES['dataFile']['tmp_name'],'../../../uploads/'.$finalfilename)){
                                    $query= "INSERT INTO file_manager(name, file_link, type) VALUES('$name', '$finalfilename', '$ext')";
                                    $result=mysqli_query($conn, $query);
                                    if($result){
                                        ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            File is submitted
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>

                        <?php
                                    }
                                    else {
                                         echo "file is not submitted";
                                    }
                                }

                            }else{
                                echo "file extension is not acceptable";
                            }

                        }
                        else {
                            echo " file size must be less then 3MB";
                        }

                    }
                    ?>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="mb-3">
                                <label for="exampleInputUsername" class="form-label">File Name</label>
                                <input type="text" class="form-control" id="exampleInputUsername"
                                    aria-describedby="userHelp" name="name">
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">File link</label>
                                <input type="file" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp" name="dataFile">
                            </div>
                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>
                </div>
            </section>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
                crossorigin="anonymous"></script>
</body>

</html>

<?php include("../../inc/footer.php"); ?>