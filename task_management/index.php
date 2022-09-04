<?php 
require('config.php')
?>
<!doctype html>
<html lang="en">

<head>
    <title>Login Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="card">
        <?php
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $login_query = "SELECT * FROM users WHERE email='$email' AND password='$password'" ;
    $login_result = mysqli_query($conn, $login_query);

    $count = mysqli_num_rows($login_result);

    if($count) {
        echo header('Location: home.php?msg=loginsuccessfully' );
    } else {
        echo "Invalid user. Please check your email and password";
    }
    
} 
?>
        <div class="card-body">
            <div class="contatiner">
                <h3> Login to task management system </h3>
                <div class="row">
                    <div class="col-md-12">
                        <form action="#" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for=""> Email</label>
                                <input type="email" name="email" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                            </div>
                            <div class="form-group">
                                <label for=""> Password</label>
                                <input type="password" name="password" id="" class="form-control" placeholder=""
                                    aria-describedby="helpId">
                            </div>


                            <button type="submit" class="btn btn-primary" name="submit">Login</button>
                        </form>
                        <p class="form-text text-secondary"> If You have not register yet, <a href="register.php"
                                target="_blank">
                                Create your account. </a>
                        </p>
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