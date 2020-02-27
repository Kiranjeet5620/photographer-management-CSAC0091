<?php
//Step1
include("config.php");

echo "hi";
if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $pass = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $access =$_POST['acc'];
    $phone = $_POST['phno'];
    $depart = $_POST['deprt'];
    $address = $_POST['add'];
    $postal = $_POST['pcode'];
    
    $sql = "UPDATE user SET Email='$email' where;
    $result = mysqli_query($db, $sql);
    if (!empty($result)) {
        echo "User edited successfully";
    } else {
        echo mysqli_error($sql);
    }
}
