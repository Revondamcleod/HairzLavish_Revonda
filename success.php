<?php
$title = "success";
require_once "include/header.php";
require_once "db/conn.php";
require_once "sendemail.php";

if (isset($_POST['submit'])) {
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

    $check_email = $crud->checkCustomerEmail($email);
  
    if ($check_email['num'] > 0) {
        echo "Sorry! The email you entered is already taken. <a href='javascript:history.go(-1)'>Please try another</a>.";
    } else {
        //call functionto insert and track is success or not
        $isSuccess = $crud->insertCustomer($fname, $lname, $email, $address, $gender, $destination);
        $GenderName = $crud->getGendeById($gender);

        if ($isSuccess) {
            SendEmail::SendMail($email, 'Welcome to IT Conference 2020', 'Dear ' . $fname . ' '.$lname.',<br><br>This letter is the confirmation of your reservation for the Annual Conference held by the International Computer Association.<br/>This year the conference would be from April 6, 2010, to April 8, 2010.<br/><br/>You have a reserved seat in all the four workshops for the treatment of substance abuse.<br><br/>For any further queries, feel free to write to us or give us a call.<br/><br>Regards. <br/><br>IT Conference Team<br>');

            include 'includes/successmessage.php';
        } else {
            include 'includes/errormessage.php';
            header('location : viewrecords.php');
        }
    }
}
?>


       
<div class="card" style="width: 30rem;">
        <div> <img class="rounded-circle" src="<?php echo $destination ?>" width="120&quot;" height="120&quot;"/></div>
            <div class="card-body" style="color: black; font-size: 20px;">
                <h2 class="card-title"><?php echo $_POST['firstname'] . ' ' . $_POST['lastname'] ?></h2>
                <!-- <h4 class="card-subtitle mb-2 text-muted"><?php echo $GenderName['gender'] ?></h4> -->
                <h5 class="card-text">Address : <?php echo $_POST['address'] ?></h5>
                                        <h5 class="card-text">Email Address: <?php echo $_POST['email'] ?></h5>
                <a href="#" class="card-link">Card link</a>
                <a href="#" class="card-link">Another link</a>
            </div>
        </div>


<hr />
<br />

<?php require_once "include/footer.php"; ?>