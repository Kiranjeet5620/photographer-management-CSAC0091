<?php
$email = $_POST['email'];
$password=$_POST['password'];
$cpassword=$_POST['cpassword'];
$fname = $_POST['fname'];
$lname=$_POST['lname'];
$dob=$_POST['dob'];
if (!empty($email) || !empty($password) || !empty($cpassword) || !empty($fname) || !empty($lname) || !empty($dob)) {
 $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "photographymanagement";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $INSERT = "INSERT Into user (email, password, cpassword, fname, lname, dob) values(?, ?, ?, ?, ?, ?)";
     //Prepare statement
    
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("bb", $email, $password, $cpassword, $fname, $lname, $dob);
      $stmt->execute();
      echo "New record inserted sucessfully";
     } else {
      echo "Someone already register using this email";
     }
     $stmt->close();
     $conn->close();
    }
} else {
 echo "All field are required";
 die();
}
?>