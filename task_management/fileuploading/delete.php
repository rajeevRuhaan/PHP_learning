<?php
require('../config.php');
if(isset($_GET['id'])) {

    $id = $_GET['id'];

    $select_query = "SELECT * FROM filemanager WHERE id=$id ";
    $select_result = mysqli_query($conn, $select_query);
    $select_row = $select_result->fetch_assoc();

    $select_row_filelink = $select_row['filelink'];
    echo $select_row_filelink;

    $full_filelink = '../uploads/'.$select_row_filelink;
/*  unlink() used to delete file */
    unlink($full_filelink);

    $delete_query = "DELETE FROM filemanager WHERE id=$id ";

    $delete_result = mysqli_query($conn, $delete_query);
    
    if($delete_result) {
        
        echo header('Location: index.php');
    } else {
        echo "Error in deleting file";
    }

}
?>