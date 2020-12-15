<?php
$title = "View Records";
require_once "include/header.php";
require_once 'include/auth_check.php';
require_once 'db/conn.php';


//get all Customer
$result = $crud->gettCustomer();
?>

<h1 class="text-center"><strong>Registered Customers</strong> </h1>
<div class="row">
    <div class="col">
        <!-- 1 of 3 -->
    </div>
    <div class="col-10">
        <table class="table">
            <tr>
                <th>#</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Actions</th>
            </tr>
            <?php while ($r = $result->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td><?php echo $r['customer_id'] ?></td>
                    <td><?php echo $r['firstname'] ?></td>
                    <td><?php echo $r['lastname'] ?></td>
                    <td><?php echo $r['name'] ?></td>
                    <td>
                        <a href="view.php?id=<?php echo $r['customer_id'] ?>" class=" btn btn-primary">View </a>
                        <a href="edit.php?id=<?php echo $r['customer_id'] ?>" class=" btn btn-warning">Edit </a>
                        <a onclick="return confirm('Are you Sure you want to Delete this Record')" href="delete.php?id=<?php echo $r['customer_id'] ?>" class=" btn btn-danger">Delete </a>
                    </td>
                </tr>
            <?php } ?>

        </table>
    </div>
    <div class="col">
        <!-- 3 of 3 -->
    </div>
</div>



<hr />
<br />

<?php require_once "include/footer.php"; ?>