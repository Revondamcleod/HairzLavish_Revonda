<?php
 $title = "editpost";
 require_once "include/header.php";
 require_once 'db/conn.php';

//get values from post opertion
if (isset($_POST['submit'])) {
    $id =$_POST['id'];
    $fname =$_POST['firstname'];
    $lname =$_POST['lastname'];
    $email =$_POST['email'];
    $address =$_POST['address'];
    $gender =$_POST['gender'];

    $orig_file = $_FILES["avatar"]["tmp_name"];
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'uploads/';
    $destination ="$target_dir$email.$ext";
    move_uploaded_file($orig_file,$destination);

    $result = $crud->editCustomer($id, $fname, $lname, $email, $address, $gender, $destination);
    
    if ($result) {
        header("location: viewrecords.php");
        include 'include/successmessage.php';
    } else {
        include 'include/errormessage.php';
        header('location : viewrecords.php');
    }
}
    ?>