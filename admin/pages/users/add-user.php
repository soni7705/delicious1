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
                            <h1>Add user </h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Add User</li>
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

                            <form action="#" method="POST" enctype="multipart/form-group">

                           
                            <?php
                            if(isset($_POST['submit'])){
                              $name= $_POST['name'];
                              $email= $_POST['email'];
                              $password= md5 ($_POST['password']);

                              if( $name!="" && $email!="" && $password !=""){
                                $query= "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";
                                $result = mysqli_query($conn, $query);
                                if($result){
                                  // header("Refresh:0; url=manage-users.php");
                                  echo "<meta http-equiv='refresh' content='0; URL=manage-users.php'>";
                                }
                                else{
                                  echo "data is not submited";
                                }
                              }else{
                                echo " all fields are rwquired";
                              }
                            }
                            
                            
                            ?>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <input type="text" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp" name="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                                            <input type="email" class="form-control" id="exampleInputEmail1"
                                                aria-describedby="emailHelp"name="email">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1"name="password">
                                        </div>
                                        <div class="col-md-6">
                                            <label for="image">Choose an image</label>
                                            <input type="file">
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label for="exampleInputPassword1" class="form-label">Password</label>
                                            <input type="password" class="form-control" id="exampleInputPassword1"name="name">
                                        </div> -->
                                    </div>
                                </div>
                                <div class="button">
                                <button type="submit" class="btn btn-primary"name="submit">Submit</button>
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