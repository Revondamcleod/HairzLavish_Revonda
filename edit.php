<?php 
        $title = "Edit";
        require_once "include/header.php";
        // require_once 'includes/auth_check.php';
        require_once 'db/conn.php';

        //get all Specialties
        $result = $crud->getGender();

        if(!isset($_GET['id']))
        {
            //echo 'Error';
            include 'includes/errormessage.php';
            header('location : viewrecords.php');
        }else{
            $id = $_GET['id'];
            $customer = $crud->getCustomerDetails($id); 
?>

<h1 class="text-center">Edit Record</h1>


    <form method="post" action="editpost.php">
    <input type="hidden" name="id" value=" <?php echo $customer['customer_id'] ?>" />

    <div class="form-group">
        <label for="firstname">First Name</label>
        <input type="text" class="form-control" value="<?php echo $customer['firstname'] ?>" id="firstname"
            name="firstname">
    </div>

    <div class="form-group">
        <label for="lastname">Last Name</label>
        <input type="text" class="form-control" value="<?php echo $customer['lastname'] ?>" id="lastname"
            name="lastname" >
    </div>

    
    <div class="form-group">
        <label for="email">Email Address</label>
        <input type="email" class="form-control" value="<?php echo  $customer['email_address'] ?>" id="email" name="email"
            aria-describedby="emailHelp" readonly>
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>

    <div class="form-group">
        <label for="address">Customer Address</label>
        <input type="text" class="form-control" value="<?php echo $customer['cus_address'] ?>" id="address" name="address"
           >
    </div>

    <div class="form-group">
        <label for="gender">Gender</label>
        <select class="form-control" id="gender" name="gender"
        >
            <?php while ($r =$result->fetch(PDO::FETCH_ASSOC)) {?>
            <option value="<?php echo $r['gender_id']; ?>" <?php if($r['gender_id']== 
           $customer['gender_id']) echo 'selected'?>>
                <?php echo $r['name']; ?>
            </option>
            <?php } ?>
        </select>
    </div>


   
    <div class="custom-file">
                <input type="file" accept="image/*" class="custom-file-input" value="<?php echo $customer['profile_pic'] ?> id="avatar" name="avatar" style="background-color: rgb(253, 249, 5); color: black">
                <label class="custom-file-label" for="avatar" >Choose file</label>
                <small id="avatar" class="form-text text-danger">File Upload is Optional.</small>         
            </div>

              <br/>
              <br>
              <br>
    <button type="submit" name="submit" class="btn btn-success btn-block">Save Changes</button>
  
    
</form>
   

<?php }?>
<hr />
<br />

<?php require_once "include/footer.php";?>