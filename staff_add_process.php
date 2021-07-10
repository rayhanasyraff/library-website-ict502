<?php

// include('includes/header.php');
include('includes/connect.php');
require('helper.php');
session_start();
// error variable.
$error = array();
$_SESSION['add'] = $_REQUEST['add'];
$add = $_SESSION['add'];

// echo "hello";
// echo $add;

if($add == "book") {
    $ISBN = validate_input_text($_POST['ISBN']);
    if (empty($ISBN)){
        $error[] = "You forgot to enter your ISBN";
    }
    
    $title = validate_input_text($_POST['title']);
    if (empty($title)){
        $error[] = "You forgot to enter your book title";
    }
    
    $author = validate_input_text($_POST['author']);
    if (empty($author)){
        $error[] = "You forgot to enter your book author id";
    }
    
    $publisher = validate_input_text($_POST['publisher']);
    if (empty($publisher)){
        $error[] = "You forgot to enter your book publisher id";
    }
    
    $category = validate_input_text($_POST['category']);
    if (empty($category)){
        $error[] = "You forgot to enter your book category";
    }

    $publish = validate_input_text($_POST['publish-date']);
    if (empty($publish)){
        $error[] = "You forgot to enter your book publish date";
    }

    $price= validate_input_text($_POST['price']);
    if (empty($price)){
        $error[] = "You forgot to enter your book price";
    }

    $rack = validate_input_text($_POST['rack-num']);
    if (empty($rack)){
        $error[] = "You forgot to enter your book rack number";
    }
    
    $arrival = validate_input_text($_POST['arrival-date']);
    if (empty($arrival)){
        $error[] = "You forgot to enter your book arrival date";
    }
    
}

// var_dump($error);
// $files = $_FILES['profileUpload'];
// $profileImage = upload_profile('./assets/profile/', $files);
// echo $hire;
if(empty($error)){
    // register a new user
    // $hash_pass = password_hash($password, PASSWORD_DEFAULT);
    // $expire = "SYSDATE+365";
    // $register = "SYSDATE";
    // $status = "Active";
    // $comm = 0;
    if($add == "book") {
        $query = "INSERT INTO BOOKS(ISBN , AUTHOR_ID , PUBLISHER_ID , BOOK_TITLE , BOOK_CATEGORY , BOOK_PUBLISH_DATE , BOOK_PRICE , RACK_NUM , ARRIVAL_DATE , BOOK_STATUS)";
        $query .= "VALUES (:isbn,TO_NUMBER(:author, '99999'), TO_NUMBER(:publisher, '99999'), :title, :category ,TO_DATE(:publish, 'yyyy/mm/dd'), TO_NUMBER(:price, '99999'), TO_NUMBER(:rack, '99999'), TO_DATE(:arrival, 'yyyy/mm/dd'), 'Available')";
    }

    $stid = oci_parse($conn,$query);
    oci_bind_by_name($stid, ":isbn", $ISBN);
    oci_bind_by_name($stid, ":author", $author);
    oci_bind_by_name($stid, ":publisher", $publisher);
    oci_bind_by_name($stid, ":title", $title);
    oci_bind_by_name($stid, ":category", $category);
    oci_bind_by_name($stid, ":publish", $publish);
    oci_bind_by_name($stid, ":price", $price);
    oci_bind_by_name($stid, ":rack", $rack);
    oci_bind_by_name($stid, ":arrival", $arrival);


    // if($role == "member"){
    //     oci_bind_by_name($stid, ":status", $status);
    // } else if ($role == "staff"){
    //     oci_bind_by_name($stid, ":manager", $manager);
    //     oci_bind_by_name($stid, ":job", $job);
    //     switch($job){
    //         case "manager":
    //             $salary = 4000;
    //             break;
    //         case "assistant":
    //             $salary = 3000;
    //             break;
    //         case "director":
    //             $salary = 5000;
    //             break;
    //         case "technician":
    //             $salary = 1500;
    //             break;
    //         case "staff":
    //             $salary = 100;
    //             break;     
    //         default:
    //             $salary = 10;
    //     }
    //     oci_bind_by_name($stid, ":salary", $salary);
    //     oci_bind_by_name($stid, ":comm", $comm);
    //     oci_bind_by_name($stid, ":hire", $hire);
    // }

    oci_execute($stid, OCI_DEFAULT);
    // $data = oci_fetch_array($stid, OCI_RETURN_NULLS+OCI_ASSOC);
    // oci_commit($conn);
    // var_dump($data);
    if(oci_num_rows($stid) > 0 ){
        oci_commit($conn);   
        header("Location:staff_library.php");
    } else {
        echo oci_num_rows($stid);
    }

} else {
    if($role == "member"){
        header("Location:member_register.php?error?Please Enter Email and Password");
    } else if($role == "staff") {
        header("Location:staff_register.php?error?Please Enter Email and Password");
    }
}


?>

