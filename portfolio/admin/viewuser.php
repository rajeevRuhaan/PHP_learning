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
        <!-- to load user information from database -->
        <?php
            if(isset($_GET['id'])){
                $id = $_GET['id'];
                
                $selecet_query = "SELECT * FROM users WHERE id=$id";
                $select_result = mysqli_query($conn, $selecet_query);

               // $select_row = mysqli_fetch_assoc($selecet_result);
               $select_row = $select_result->fetch_assoc();
               $select_name = $select_row['name'];
               $select_email = $select_row['email']; 
               $select_img = $select_row['img']; 
            }
        ?>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Edit User</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Edit User</li>
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

                            <!-- general form elements -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit user</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->

                                <form>
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" value="<?php echo $select_name?>" name="name"
                                                class="form-control" placeholder="Name" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="Email">Email address</label>
                                            <input type="email" value="<?php echo $select_email?>" name="email"
                                                class="form-control" placeholder="Enter email" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="Email">Image File</label>
                                            <input type="email" value="<?php echo $select_img?>" name="email"
                                                class="form-control" placeholder="Enter email" disabled>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

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