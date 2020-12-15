<?php 
        $title = "Edit";
        require_once 'include/auth_check.php';
        require_once 'db/conn.php';
        require_once "include/header.php";

        //get all Gender
$result = $crud->getGender();

        if(!isset($_GET['id']))
        {
           
        }else{
            $id = $_GET['id'];
            $customer = $crud->getcustomerDetails($id); 
?>

<h1 class="text-center">Edit Record</h1>


    <form method="post" action="editpost.php">
    <input type="hidden" name="id" value=" <?php echo $customer['customer_id'] ?>" />

    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" value="<?php echo $customer['firstname'] ?>" id="firstname"
            name="firstname" >
    </div>

    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $customer['lastname'] ?>" id="lastname"
            name="lastname" >
    </div>

    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" value="<?php echo $customer['email_address'] ?>" id="email" name="email"
            aria-describedby="emailHelp" readonly>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="address">Address</label>
        <input required type="text" class="form-control" value="<?php echo $customer['cus_address'] ?>" id="address" name="address" >
    </div>

    <div class="form-group">
        <label for="gender">Gender</label>
        <select class="form-control" id="gender" name="gender">
            <?php while ($r =$result->fetch(PDO::FETCH_ASSOC)) {?>
            <option value="<?php echo $r['gender_id']; ?>" <?php if($r['gender_id']== 
             $customer['gender_id']) echo 'selected'?>>
                <?php echo $r['name']; ?>
            </option>
            <?php } ?>
        </select>
    </div>


    <div class="custom-file">
                <input type="file" accept="image/*" class="custom-file-input" value="<?php echo  $customer['avatar_path'] ?> id="avatar" name="avatar" style="background-color: rgb(253, 249, 5); color: black">
                <label class="custom-file-label" for="avatar" >Choose file</label>
                <small id="avatar" class="form-text text-danger">File Upload is Optional.</small>         
            </div>

              
    <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
    <a href="viewrecords.php"class=" btn btn-danger btn-block">Cancel </a>
    
</form>
   

<?php }?>
<hr />
<br />

<?php require_once "include/footer.php";?>