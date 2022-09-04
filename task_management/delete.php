<?php
require('config.php');
session_start();
require('secureuser.php');

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    $user_id = $_SESSION['id'];

    $check_query = "SELECT * FROM tasks WHERE user_id=$user_id";
    $check_result = mysqli_query($conn, $check_query);
    $check_row = $check_result->fetch_assoc();
    $task_user_id = $check_row['user_id'];

    if ($task_user_id == $user_id){

        $delete_query = "DELETE FROM tasks WHERE id=$id";
        
        
        $delete_result = mysqli_query($conn, $delete_query);
        
        if($delete_result) {
            echo header('Location: home.php?msg=dsuccess');
        } else {
            echo header('Location: home.php?msg=derror');
        }
    } else {
        echo header('Location: index.php?msg=invalid_attempt_access');
    }
}
?>