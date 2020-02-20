<?php
//Step1
$db = mysqli_connect('localhost', 'root', '','photographymanagement');


if (isset($_POST['submit'])) {

  $email = $_POST['email'];
  $pass = $_POST['password'];
  $cpass = $_POST['cpassword'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $dob = $_POST['dob'];

  if($pass==$cpass){
  $sql = "INSERT INTO USER (Email,Password,CPassword,FirstName,LastName,Dob) Values('$email','$pass','$cpass','$fname','$lname','$dob') ";
  $result = mysqli_query($db, $sql);
  if (!empty($result)) {
    echo " Thank you! Signed Up successfully";
  } else {
    echo "   something went wrong";
  }
}
else {
  echo "   password doen't match";
}
}
