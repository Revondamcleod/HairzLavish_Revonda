<?php
$title = "View Record";
// require_once 'includes/auth_check.php';
require_once 'db/conn.php';
require_once "include/header.php";

//get Customer by Id
if (!isset($_GET['id'])) {
    include 'include/errormessage.php';
    header('location : viewrecords.php');
} else {
    $id = $_GET['id'];
    $result = $crud->getCustomerDetails($id);
    // include 'include/successmessage.php';
?>
<br/>
    <div class="row">
        <div class="col">
            <!-- 1 of 3 -->
        </div>
        <div class="col-xl">
            <div class="card" style="width: 30rem;" >
            <div> <img class="rounded-circle" src="<?php echo empty ($result['profile_pic']) ? 'uploads/blank.png' : $result['profile_pic']; ?>" width="120&quot;" height="120&quot;"/></div>
                <div class="card-body">
                    <h2 class="card-title"><?php echo $result['firstname'] . ' ' .   $result['lastname'] ?></h2>
                    <h4 class="card-subtitle "><?php echo $result['name'] ?></h4>
                    <h5 class="card-text">Address: <?php echo $result['cus_address'] ?></h5>
                    <h5 class="card-text">Email Address: <?php echo $result['email_address'] ?></h5>
                   
                    <br />
                    <a href="viewrecords.php" class=" btn btn-info">Back To List </a>
                    <a href="edit.php?id=<?php echo $result['customer_id'] ?>" class=" btn btn-warning">Edit </a>
                    <a onclick="return confirm('Are you Sure you want to Delete this Record')" href="delete.php?id=<?php echo $result['customer_id'] ?>" class=" btn btn-danger">Delete </a>
                </div>
            </div>
        </div>
        <div class="col">
            <!-- 3 of 3 -->
        </div>
    </div>




<?php } ?>


<hr />
<br />

<?php require_once "include/footer.php"; ?>