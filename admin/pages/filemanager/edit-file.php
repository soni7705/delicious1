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
                            <h1>Add file</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add File</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- SELECT2 EXAMPLE -->
                    <div class="card card-default">
                        <div class="card-header">



                            <?php

                        if(isset($_GET['id']))

                        {
                            $id= $_GET['id'];
                            $selectdata="SELECT * FROM filemanager where id =$id";
                            $result1 = mysqli_query($conn, $selectdata);
                            $data=$result1->fetch_assoc();
                        }
                            if(isset($_POST['submit'])){
                              $name= $_POST['name'];
                              $file_link= $_POST['file_link'];
                              $type= md5 ($_POST['type']);

                              if( $name!="" && $email!="" && $password !=""){
                                $query="UPDATE filemanager SET name='$name',file_link='$file_link',type='$type' where id=$id";  
                                $result = mysqli_query($conn, $query);
                                if($result){
                                  // header("Refresh:0; url=manage-users.php");
                                  echo "<meta http-equiv='refresh' content='0; URL=manage-file.php'>";
                                }
                                else{
                                  echo "file is not submited";
                                }
                              }else{
                                echo " files are rwquired";
                              }
                            }
                            
                            
                            ?>

                            <form action="#" method="POST" enctype="multipart/form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="name" value="<?php echo $data['name']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="email" value="<?php echo $data['email']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1"
                                                name="password" value="<?php echo $data['password']; ?>">
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1"name="name">
                                        </div> -->
                                    </div>
                                </div>
                                <div class="button">
                                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                                </div>
                            </form>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                        </div>
                    </div>
                    <!-- /.card -->

                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>

        <?php include("../../inc/footer.php"); ?>