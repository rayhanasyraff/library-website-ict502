<?php
include('includes/connect.php');
session_start();
// echo isset($_REQUEST['email'])." ".isset($_REQUEST['new-password']);
if(isset($_REQUEST['email']) && isset($_REQUEST['new-password'])){
   
    $email = $_REQUEST['email'];
    $newPassword = $_REQUEST['new-password'];
    $role = $_SESSION['role'];
    
    if($role == "member") {
        $query = 'update member set member_password = :password where member_email = :email';
    } else if ($role == "staff") {
        $query = 'update staff set staff_password = :password where staff_email = :email';
    }

    $stid = oci_parse($conn,$query);
    oci_bind_by_name($stid, ":email", $email);
    oci_bind_by_name($stid, ":password", $newPassword);
    oci_execute($stid, OCI_DEFAULT);
    // $data = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);

    if(oci_num_rows($stid) > 0)  
    {  
        oci_commit($conn); //*** Commit Transaction ***//  
        header("Location:login.php");
    }  
    else  
    {  
        oci_rollback($conn); //*** RollBack Transaction ***//  
        header("Location:forgot.php?error");
    }  

} else {
    header("Location:forgot.php?error");
}

?>