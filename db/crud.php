<?php

class crud
{
    //private database object\
    private $db;

    function __construct($conn)
    {
        $this->db = $conn;
    }

    //function to insert a new record into the attendee database
    public function insertCustomer($fname, $lname, $email, $address, $gender, $avatar_path)
    {
        try {
            //define all sql statemnet to be execution
            $sql = "INSERT INTO `customer` ( `firstname`, `lastname`, `email_address`, `cus_address`, `gender_id`, `profile_pic`) VALUES (:fname, :lname, :email, :address,:gender,:avatar_path)";
            //prepare the sql statement for execution
            $stmt = $this->db->prepare($sql);
            //biind all placeholderto the actual values
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            $stmt->bindparam(':email', $email);
            $stmt->bindparam(':address', $address);
            $stmt->bindparam(':gender', $gender);
            $stmt->bindparam(':avatar_path', $avatar_path);

            //Execute Statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }


    public function editCustomer($id, $fname, $lname, $email, $caddress, $gender, $avatar_path)
    {
        try {
            $sql = "UPDATE `customer` SET `firstname`=:fname,`lastname`=:lname,`email`=:email,`customer_address`=:caddress,`gender_id`=:gender,`profile_pic`=:avatar_path
            WHERE `custid` =:id";

            $stmt = $this->db->prepare($sql);
            //biind all placeholderto the actual values
            $stmt->bindparam(':id', $id);
            $stmt->bindparam(':fname', $fname);
            $stmt->bindparam(':lname', $lname);
            // $stmt->bindparam(':email', $email);
            $stmt->bindparam(':caddress', $caddress);
            $stmt->bindparam(':gender', $gender);
            //Execute Statement
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function gettCustomer()
    {
        try {
            $sql = "SELECT * FROM `customer` a inner join `genders` g on a.gender_id = g.gender_id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getCustomerDetails($id)
    {
        try {
            $sql = "SELECT * FROM `customer` a inner join `genders` g on a.gender_id = g.gender_id WHERE `customer_id` =:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function deletCustomer($id)
    {

        try {
            $sql = "DELETE FROM `customer` WHERE `custid` =:id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getGender()
    {
        try {
            $sql = "SELECT * FROM `genders`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getGendeById($id)
    {
        try {
            $sql = "SELECT * FROM genders WHERE gender_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function checkCustomerEmail($email){
        try {
            $sql = "SELECT COUNT(*) as num FROM customer WHERE email_address = :email";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':email', $email);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

}

