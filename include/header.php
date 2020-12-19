<?php
include_once 'include/session.php' ?>?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=<php, initial-scale=1.0">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="css/styles.min.css">
  <link rel="stylesheet" href="css/sitestyles.css">

  <link rel="stylesheet" href="css/styles2.css">
  <title><?php echo "HairzLavish_Revonda-" . "$title" ?></title>
</head>

<body>
  <div class="container">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="index.php">HairzLavish</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-item nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link " href="about.php">About Us <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link " href="product.php">Products <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link " href="contact.php">Contact <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link" href="Privacy.php">Privacy Policy <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-item nav-link" href="viewrecords.php">View Attendees</a>
          </li>

        
        </ul>

        </form>
          <form class="form-inline my-2 my-lg-0" action="register.php">
            <button class="btn btn-outline-primary my-2 my-sm-0" type="submit">Sign Up</button>
          </form>

        <?php
        if (!isset($_SESSION['userid'])) {
          
        ?> <form class="form-inline my-2 my-lg-0" action="login.php">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log In</button>
         
        <?php } else { ?>

          <form class="form-inline my-2 my-lg-0" action="logout.php">
          <spam style="color: white;">Hello <?php echo $_SESSION['username'] ?>!   .</spam><br/>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Log out</button>
          </form>
        <?php } ?> -->

      </div>
    </nav>
