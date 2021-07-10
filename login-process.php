<?php
include('includes/connect.php');
session_start();
if(isset($_REQUEST['email']) && isset($_REQUEST['password'])){
   
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $role = $_SESSION['role'];
    
    if($role == "member") {
        $query = 'select * from member where member_email = :email and member_password = :password';
    } else if ($role == "staff") {
        $query = 'select * from staff where staff_email = :email and staff_password = :password';
    }

    $stid = oci_parse($conn,$query);
    oci_bind_by_name($stid, ":email", $email);
    oci_bind_by_name($stid, ":password", $password);
    oci_execute($stid);
    $data = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);

    if(oci_num_rows($stid) > 0 ){
        $_SESSION['user_data'] = $data;    
        if($role == "member"){
            header("Location:member_home.php");
        } else if($role == "staff") {
            header("Location:staff_home.php");
        }
    } else {
        header("Location:login.php?error");
    }

} else {
    header("Location:login.php?error?Please Enter Email and Password");
}

?>