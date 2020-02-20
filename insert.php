<?php
//Step1
$db = mysqli_connect('localhost', 'root', '');
if (!$db) {
  echo 'Not connected to server';
}
if (!mysqli_select_db($db,'photographymanagement')) {
  echo 'Database not selected';
}
if (isset($_POST['submit'])) {

  $email = $_POST['email'];
  $pass = $_POST['password'];
  $cpass = $_POST['cpassword'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $dob = $_POST['dob'];

  $sql = "INSERT INTO signup (email,pass,cpass,fname,lname,dob) Values('$email','$pass','$cpass',' $fname','$lname','$dob') ";
  $result = mysqli_query($db, $sql);
  if (!empty($result)) {
    echo " inserted";
  } else {
    echo "something went wrong";
  }
}
