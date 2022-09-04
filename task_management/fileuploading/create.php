<?php 
require('../config.php')
?>
<!doctype html>
<html lang="en">

<head>
    <title>File Upload</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="row">
                    <a id="" class="btn btn-primary" href="index.php" role="button">View Files</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="contatiner">
                <h3>Create / Upload file</h3>
                <div class="row">
                    <?php
                    /*  When the submit button clicked */

                    if(isset($_POST['submit'])){
                        $title = $_POST['title'];
                        $filename = $_FILES['dataFile']['name'];
                        $filesize = $_FILES['dataFile']['size'];
                        $explode_values = explode('.', $filename);
                        $filename = str_replace(' ', '', strtolower($explode_values[0]));
                        $ext = strtolower($explode_values[1]);
                        
                        $finalname = $filename.'.'.$ext;
                        
                        
                    }
                    ?>
                    <div class="col-md-12">
                        <!-- WHen submit button is clicked -->
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for=""> Upload Title</label>
                                <input type="text" name="title" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for=""> Upload File</label>
                                <input type="file" name="dataFile" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                            </div>

                            <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                        </form>
                    </div>

                </div>

            </div>
        </div>
        <div class="card-footer text-muted">
            Develop by @ Rajeev Sah
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</body>

</html>