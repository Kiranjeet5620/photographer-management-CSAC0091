<?php  
include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $dob = $_POST["dob"];
    $sql="insert into  user(Email,Password,FirstName,LastName,Dob) Values($email,$pass, $fname,$lname,$dob) ";  
    $result = mysqli_query($conn,$sql);
    echo "1 record added";
  }
  echo "errorrrrrrrrrr";
?>
