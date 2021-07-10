<?php
include('includes/connect.php');
session_start();

if(isset($_POST['role'])){
    $_SESSION['role'] = $_REQUEST['role'];
    header("Location:login.php");
} else {
    header("Location:main.php?error: try again");
}

?>