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
        <?php
        if(isset($_GET['id'])) {
          $id = $_GET['id'];
          
          $select_query = "SELECT * FROM filemanager WHERE id=$id";
          $select_result = mysqli_query($conn, $select_query);
          $select_row = $select_result->fetch_assoc();
          $select_row_title = $select_row['title'];
          $select_row_filelink = $select_row['filelink'];
        
          if(isset($_POST['submit'])) {
            $title = $_POST['title'];
            $filename_changed = $_FILES['dataFile']['name'];
            
            if ($title) {
               if($title == $select_row_title) {
               
                if ($filename_changed) {
                    /* first delete exist file from upload folder */
                    $full_filelink = '../uploads/'.$select_row_filelink;
                    unlink($full_filelink);
                /* new changed file need further process */
                  $new_file = $_FILES['dataFile']['name'];
                  $new_file_size = $_FILES['dataFile']['size'];
                  $explode_values = explode('.', $new_file);
                  $explode_file_first_name = str_replace(' ', '', strtolower($explode_values[0]));
                  $ext = strtolower($explode_values[1]);
                  $final_explode_file_filelink = $explode_file_first_name.time().'.'.$ext;
echo $final_explode_file_filelink;
                  if($new_file_size <= 200000){
                    if(move_uploaded_file($_FILES['dataFile']['tmp_name'], '../uploads/'.$final_explode_file_filelink)){
  echo $id       ;               
                        $insert_query = "UPDATE filemanager SET filelink='$final_explode_file_filelink' where id=$id";

                        $result_query = mysqli_query($conn, $insert_query);
                                   if($result_query) {
                                    echo "File is uploaded successfully.";
                                   } else {
                                    echo "File uploaded Failed.";
                                   }
                    }else {
                        echo "File upload error.";
                    }
                  }else {
                    echo "File size is exceded. Supported up to 2 MB.";
                  }              
                } else {
                    echo header("Location: index.php?msg=no_change");
                }
            } else {
                
            }  
            } else {
                echo " Title cannot be empty. Please enter title.";
            }
           
            
          }
        }
        ?>
        <div class="card-body">
            <div class="contatiner">
                <h3>Create / Upload file</h3>
                <div class="row">

                    <div class="col-md-12">
                        <!-- WHen submit button is clicked -->
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for=""> Upload Title</label>
                                <input type="text" name="title" id="" class="form-control"
                                    value="<?php echo $select_row_title ?>" placeholder="" aria-describedby="helpId">
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