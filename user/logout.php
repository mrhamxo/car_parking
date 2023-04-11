<?php
session_start();

// Logout session
if(isset($_POST['logout_btn'])){
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../admin/login.php");
}
?>