<?php 
require('../config.php')
?>
<!doctype html>
<html lang="en">

<head>
    <title>FIle Uplading in PHP</title>
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
                    <a id="" class="btn btn-primary" href="create.php" role="button">Back to file upload</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="contatiner">
                <div class="row">
                    <h3> File Manager | Manage File </h3>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>S.N</th>
                                <th>File title</th>
                                <th>Preview File</th>
                                <th>Action</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                            $select_query = "SELECT *FROM filemanager";
                            $select_result = mysqli_query($conn, $select_query);
                            $count = 0;
                            while ($data_row = mysqli_fetch_array($select_result)) {
                                $count ++;
                                ?>
                            <tr>
                                <td scope="row"><?php echo $count ?></td>
                                <td><?php echo $data_row['title'] ?></td>
                                <td><img src="../uploads/<?php echo $data_row['filelink'] ?>"
                                        alt="<?php echo $data_row['title'] ?>" height="90px" width="90px"></img> </td>
                                <td>
                                    <a class="btn btn-primary" href="edit.php?id=<?php echo $data_row['id'] ?>"
                                        role="button">Edit</a>
                                    <a class="btn btn-danger" href="delete.php?id=<?php echo $data_row['id'] ?>"
                                        role="button">Delete</a>
                                </td>
                            </tr>
                            <?php

                            }

                            ?>
                        </tbody>
                    </table>
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