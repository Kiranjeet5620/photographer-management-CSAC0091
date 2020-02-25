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
    $access = $_POST['acc'];
    $phone = $_POST['phno'];
    $depart = $_POST['deprt'];
    $adddress = $_POST['add'];
    $postal = $_POST['pcode'];
    
    $sql = "INSERT INTO USER (Email,Password,FirstName,LastName,Dob,AccessType,Phone,Department,Address,PostalCode) 
                     Values('$email','$pass','$fname','$lname','$dob','$access','$phone','$depart','$adddress','$postal') ";
    $result = mysqli_query($db, $sql);
    if (!empty($result)) {
        echo "User added successfully";
    } else {
        echo "something went wrong";
    }
}
