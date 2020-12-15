<?php
 $title = "editpost";
 require_once 'db/conn.php';
 //require_once "includes/headers.php";
//get values from post opertion

if  (isset($_POST['submit'])) {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $gender = $_POST['gender'];

    $orig_file = $_FILES["avatar"]["tmp_name"];
    $ext = pathinfo($_FILES["avatar"]["name"], PATHINFO_EXTENSION);
    $target_dir = 'uploads/';
    $destination = "$target_dir$email.$ext";
    move_uploaded_file($orig_file, $destination);

    //call functionto insert and track is success or not
    $result = $crud->editCustomer($id, $fname, $lname, $email, $caddress, $gender, $avatar_path);

    if ($result) {
        header("location: viewrecords.php");
        include 'include/successmessage.php';
    } else {
        include 'include/errormessage.php';
        header('location : viewrecords.php');
    }
}
    ?>