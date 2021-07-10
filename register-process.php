<?php

// include('includes/header.php');
include('includes/connect.php');
require('helper.php');
session_start();
// error variable.
$error = array();

$role = $_SESSION['role'];

// echo "hello";

if($role == "member"){
    $name = validate_input_text($_POST['name']);
    if (empty($name)){
        $error[] = "You forgot to enter your name";
    }
    
    $address = validate_input_text($_POST['address']);
    if (empty($address)){
        $error[] = "You forgot to enter your address";
    }
    
    $phone = validate_input_text($_POST['phone']);
    if (empty($phone)){
        $error[] = "You forgot to enter your phone number";
    }
    
    $email= validate_input_email($_POST['email']);
    if (empty($email)){
        $error[] = "You forgot to enter your email";
    }
    
    $username = validate_input_text($_POST['username']);
    if (empty($username)){
        $error[] = "You forgot to enter your username";
    }

    $password= validate_input_text($_POST['password']);
    if (empty($password)){
        $error[] = "You forgot to enter your password";
    }

    $confirm_pwd = validate_input_text($_POST['confirmPassword']);
    if (empty($confirm_pwd)){
        $error[] = "You forgot to enter your confirm password";
    }

} else if($role == "staff") {
    $name = validate_input_text($_POST['name']);
    if (empty($name)){
        $error[] = "You forgot to enter your name";
    }
    
    $address = validate_input_text($_POST['address']);
    if (empty($address)){
        $error[] = "You forgot to enter your address";
    }
    
    $phone = validate_input_text($_POST['phone']);
    if (empty($phone)){
        $error[] = "You forgot to enter your phone number";
    }

    if(isset($_POST['manager'])){
        $manager = validate_input_text($_POST['manager']);
    } else {
        $manager = NULL;
    }

    $job = validate_input_text($_POST['job']);
    if ($job == "" || empty($job)){
        $error[] = "You forgot to select your job";
    }
    
    $hire = validate_input_text($_POST['hire-date']);
    if (empty($hire)){
        $error[] = "You forgot to select your hire date";
    }
    
    $email = validate_input_email($_POST['email']);
    if (empty($email)){
        $error[] = "You forgot to enter your email";
    }

    $username = validate_input_text($_POST['username']);
    if (empty($username)){
        $error[] = "You forgot to enter your email";
    }

    $password= validate_input_text($_POST['password']);
    if (empty($password)){
        $error[] = "You forgot to enter your password";
    }

    $confirm_pwd = validate_input_text($_POST['confirmPassword']);
    if (empty($confirm_pwd)){
        $error[] = "You forgot to enter your confirm password";
    }
}

// var_dump($error);
// $files = $_FILES['profileUpload'];
// $profileImage = upload_profile('./assets/profile/', $files);
// echo $hire;
if(empty($error)){
    // register a new user
    // $hash_pass = password_hash($password, PASSWORD_DEFAULT);
    $expire = "SYSDATE+365";
    $register = "SYSDATE";
    $status = "Active";
    $comm = 0;
    if($role == "member") {
        $query = "INSERT INTO MEMBER(MEMBER_ID, MEMBER_NAME,MEMBER_ADDRESS, MEMBER_EMAIL, MEMBER_PHONE,EXPIRE_DATE, MEMBER_STATUS, MEMBER_USERNAME,MEMBER_PASSWORD, MEMBER_REGISTER_DATE)";
        $query .= "VALUES (member_id_seq.NEXTVAL,:name,:address,:email,:phone,SYSDATE+365,:status,:username,:password,SYSDATE)";
    } else if ($role == "staff") {
        $query = "INSERT INTO STAFF(STAFF_ID,MANAGER_ID,STAFF_NAME,STAFF_ADDRESS,STAFF_EMAIL,STAFF_PHONE,STAFF_JOB,STAFF_SALARY,HIRE_DATE,STAFF_COMISSION, STAFF_USERNAME, STAFF_PASSWORD,STAFF_REGISTER_DATE)";
        $query .= "VALUES (staff_id_seq.NEXTVAL,:manager,:name,:address,:email,:phone,:job,:salary,TO_DATE(:hire, 'yyyy/mm/dd'),:comm,:username,:password,SYSDATE)";
    }

    $stid = oci_parse($conn,$query);
    oci_bind_by_name($stid, ":name", $name);
    oci_bind_by_name($stid, ":address", $address);
    oci_bind_by_name($stid, ":email", $email);
    oci_bind_by_name($stid, ":username", $username);
    oci_bind_by_name($stid, ":password", $password);
    oci_bind_by_name($stid, ":phone", $phone);


    if($role == "member"){
        oci_bind_by_name($stid, ":status", $status);
    } else if ($role == "staff"){
        oci_bind_by_name($stid, ":manager", $manager);
        oci_bind_by_name($stid, ":job", $job);
        switch($job){
            case "manager":
                $salary = 4000;
                break;
            case "assistant":
                $salary = 3000;
                break;
            case "director":
                $salary = 5000;
                break;
            case "technician":
                $salary = 1500;
                break;
            case "staff":
                $salary = 100;
                break;     
            default:
                $salary = 10;
        }
        oci_bind_by_name($stid, ":salary", $salary);
        oci_bind_by_name($stid, ":comm", $comm);
        oci_bind_by_name($stid, ":hire", $hire);
    }

    oci_execute($stid, OCI_DEFAULT);
    // $data = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);
    oci_commit($conn);
    // var_dump($data);
    // echo oci_num_rows($stid);
    if(oci_num_rows($stid) > 0 ){   
        header("Location:login.php");
    } else {
        if($role == "member"){
            header("Location:member_register.php?error");
        } else if($role == "staff") {
            header("Location:staff_register.php?error");
        }
    }

}else{
    if($role == "member"){
        header("Location:member_register.php?error?Please Enter Email and Password");
    } else if($role == "staff") {
        header("Location:staff_register.php?error?Please Enter Email and Password");
    }
}


?>

