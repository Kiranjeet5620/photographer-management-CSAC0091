<?php  
include("config.php");
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $email = $_GET["email"];
    $pass = $_GET["password"];
    $fname = $_GET["fname"];
    $lname = $_GET["lname"];
    $dob = $_GET["dob"];
    $sql="insert into  user(Email,Password,FirstName,LastName,Dob) Values('".$email. " ',
    ' " .$pass. " ',' " . $fname. " ',' " .$lname. " ',' " .$dob. " ') ";  
    $result = mysqli_query($conn,$sql);
    echo "1 record added";
  }
  echo "errorrrrrrrrrr";
?>