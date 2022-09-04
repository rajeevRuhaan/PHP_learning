<?php 
require('config.php');
session_start();
require('secureuser.php');
?>
<!doctype html>
<html lang="en">

<head>
    <title>Edit Task</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <!-- Fetching data coming from GET method -->
    <?php
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    /* secure user can edit task */
    $user_id = $_SESSION['id'];

    $check_query = "SELECT * FROM tasks WHERE user_id=$user_id";
    $check_result = mysqli_query($conn, $check_query);
    $check_row = $check_result->fetch_assoc();
    $task_user_id = $check_row['user_id'];
  
    if ($task_user_id == $user_id){
        /*  To fetch the existing data we have to use SELECT Query */
        $select_query = "SELECT * FROM tasks WHERE id=$id";
        $select_result = mysqli_query($conn, $select_query);
        /* making associative array when the data has fetched from database */
        $select_row = $select_result -> fetch_assoc();
        $select_title = $select_row['title'];
        $select_des = $select_row['des'];
    }else {
echo header('Location: index.php?msg=invalid_attempt_access');
    }

}
?>

    <div class="card">
        <div class="card-header">
            <div class="container">
                <div class="row">
                    <a id="" class="btn btn-primary" href="home.php" role="button">Manage Tasks</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="contatiner">
                <h3> Create Task </h3>
                <div class="row">
                    <div class="col-md-12">
                        <!-- When the submit button is clicked -->
                        <?php
                        if(isset($_POST['submit'])) {
                            $title= $_POST['title'];
                            $des= $_POST['des'];

                            $update_query = "UPDATE tasks SET title='$title', des='$des' WHERE id='$id' ";
                            
                            $update_result = mysqli_query($conn, $update_query);

                            if ($update_result) {
                                echo "Task updated successfully";
                            } else {
                                echo "Task is not updated successfully";
                            }
                        }
                        ?>
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for=""> Task Title</label>
                                <input type="text" value="<?php echo $select_title ?>" name="title" id=""
                                    class="form-control" placeholder="" aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for=""> Task Description</label>
                                <textarea class="form-control" name="des" id="" cols="30"
                                    rows="10"><?php echo $select_des ?></textarea>

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