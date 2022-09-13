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
                            <h1 class="m-0">Add Blog</h1>
                        </div>
                        <!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                                <li class="breadcrumb-item active">Add Blog</li>
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
                                $title = $_POST['title'];
                                $slug = $_POST['slug'];
                                $content = addslashes($_POST['content']);
                                if($title !== "" && $slug !== "" && $content !== ""){
                                   
                                    if($_FILES['dataFile']['size'] !== 0) {
                                     /* Image uploading work */
                                        $imagesize = $_FILES['dataFile']['size'];
                                        $imagename = $_FILES['dataFile']['name'];
                                        $explode_values = explode('.', $imagename);
                                        $filename = str_replace(' ', '', strtolower($explode_values[0])).time();
                                        $ext = strtolower($explode_values[1]);
                                        $finalname = $filename. '.' .$ext;

                                if(move_uploaded_file($_FILES['dataFile']['tmp_name'], '../uploads/'.$finalname)){
                                    
                                    $insert_query = "INSERT INTO blgs(title, slug, img, content) VALUES('$title', '$slug', '$finalname', '$content')";

                                    $insert_result = mysqli_query($conn, $insert_query);

                                    if($insert_query) {
                                ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <strong>Blog is added successfully.</strong>
                            </div>
                            <?php
                                    } else {
                                ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <strong>Blog could't added successfully</strong>
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
                                <strong>File upload failed</strong>
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
                                <strong>Image is mandatory</strong>
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
                                    <h3 class="card-title">Add Blog</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->

                                <form action="#" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Title</label>
                                                    <input type="text" name="title" id="" class="form-control"
                                                        placeholder="" aria-describedby="helpId">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="">Slug</label>
                                                    <input type="text" name="slug" id="" class="form-control"
                                                        placeholder="" aria-describedby="helpId">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Featured Image</label>
                                                    <input type="file" name="dataFile" id="" class="form-control"
                                                        placeholder="" aria-describedby="helpId">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="">Content</label>
                                                    <textarea name="content" id="summernote"
                                                        class="form-control"></textarea>
                                                </div>
                                            </div>
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