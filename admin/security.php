<?php
session_start();
include("connectdb.php");

if($connect){
    // echo 'Database connected';
}
else{
    header("location: connectdb.php");
}

if(!$_SESSION['username']){
    header('location: login.php');
}
?>