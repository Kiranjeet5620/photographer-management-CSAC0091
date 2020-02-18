<?php
$email = $_POST['email'];
$pass = $_POST['password'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$dob = $_POST['dob'];
if (!empty($email) || !empty($pass) || !empty($fname) || !empty($lname) || !empty($dob) ) {
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbname = "photographymanagement";
    //create connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbname);
    if (mysqli_connect_error()) {
     die('Connect Error('. mysqli_connect_errno().')'. mysqli_connect_error());
    } else {
     $SELECT = "SELECT Email From user Where email = ? Limit 1";
     $INSERT = "INSERT Into user (UserId,Email, Password, FirstName, LastName, Dob, AccessType,Phone,
     Department,Address,PostalCode) values(?, ?, ?, ?, ?, ?,?,?,?,?,?)";
     //Prepare statement
     $stmt = $conn->prepare($SELECT);
     $stmt->bind_param("s", $email);
     $stmt->execute();
     $stmt->bind_result($email);
     $stmt->store_result();
     $rnum = $stmt->num_rows;
     if ($rnum==0) {
      $stmt->close();
      $stmt = $conn->prepare($INSERT);
      $stmt->bind_param("ssssii", $email, $pass, $fname, $lname, $dob);
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