<?php
include('security.php');

    $id = $_GET['id'];
    $status = $_GET['status'];

    $sql = "UPDATE `users`SET status = $status WHERE id = $id";
    $result = mysqli_query($connect, $sql);

    header("location: register.php");
?>

