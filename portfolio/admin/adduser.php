<?php 
require('inc/toppart.php'); 
?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="assets/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60"
                width="60" />
        </div>
        <!-- Navbar -->
        <?php require('inc/navbar.php'); ?>

        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php require('inc/sidebar.php');?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Add User</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add User</li>
                            </ol>
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="col-md-12">
                            <!--  when submit button is clicked -->
                            <?php
                            if(isset($_POST['submit'])){
                                $name = $_POST['name'];
                                $email = $_POST['email'];
                                $password = md5($_POST['password']);
                                $confirm_password = md5($_POST['confirm_password']);
                                /* Filedata upload */
                                $filename = $_FILES['dataFile']['name'];
                                $filesize = $_FILES['dataFile']['size'];
                                $explode_value = explode('.', $filename);
                                $filename = str_replace(' ', '', strtolower($explode_value[0]));
                                $ext =  strtolower($explode_value[1]);

                                $finalfilename = $filename.time(). '.' .$ext;

                                if($name !== "" && $email !== "" && $password !== "" && $confirm_password !== "") {   
                                    if($password === $confirm_password) {

                                        if(move_uploaded_file($_FILES['dataFile']['tmp_name'], '../uploads/profile/'.$finalfilename)) {
                                            $insert_query = "INSERT INTO users(name, email, password, img) VALUES('$name', '$email', '$password', '$finalfilename')";
                                            
                                            $query_result = mysqli_query($conn, $insert_query);

                                        if($query_result) {
                                            ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <strong>Successfully added</strong>
                            </div>
                            <?php
                                        } else {
                                            ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <strong>Users could not added successfully</strong>

                            </div>
                            <?php
                                        }
                                        }
                                        
                                    } else {
                            ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <strong>Password doesnot matched</strong>
                            </div>
                            <?php
                                    }

                                } else {
                            ?>
                            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <strong>All fields are necessary.</strong>
                            </div>

                            <?php
                                }
                                            }
                            ?>
                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Add user</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->

                                <form action="#" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" placeholder="Name">
                                        </div>
                                        <div class="form-group">
                                            <label for="Email">Email address</label>
                                            <input type="email" name="email" class="form-control"
                                                placeholder="Enter email">
                                        </div>
                                        <div class="form-group">
                                            <label for="Password">Password</label>
                                            <input type="password" name="password" class="form-control"
                                                placeholder="Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="Password">Confirm Password</label>
                                            <input type="password" name="confirm_password" class="form-control"
                                                placeholder="Confirm Password">
                                        </div>
                                        <div class="form-group">
                                            <label for="dataFile">Picture file</label>
                                            <input type="file" name="dataFile" class="form-control" placeholder="Name">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    <div class="card-footer">
                                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <?php require('inc/footer.php')?>