<?php
//Step1
include("config.php");

echo "hi";
session_start();
echo $_SESSION['username'];
$id=$_SESSION['id'];
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $pass = $_POST['password'];
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $dob = $_POST['Dob'];
   // $access =$_POST['acc'];
    $phone = $_POST['phone'];
    //$depart = $_POST['deprt'];
    $address = $_POST['address'];
    $postal = $_POST['postal'];
    
    $sql = "UPDATE user SET Email='$email',Password='$pass',FirstName='$fname',
            LastName='$lname',Dob='$dob',Phone='$phone',
            Address='$address',PostalCode='$postal'  where UserId='$id'; ";
    $result = mysqli_query($db, $sql);
    if (!empty($result)) {
        echo "User edited successfully";
    } else {
        echo mysqli_error($sql);
    }
}
