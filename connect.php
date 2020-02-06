<!DOCTYPE HTML>
<html>
<body>
<?php 
 include("config.php"); 
 session_start(); //always start a session in the beginning 
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{ 
 if (empty($_POST['username']) || empty($_POST['password'])) //Validating inputs using PHP code 
 { 
 echo 
 "Incorrect username or password"; //
 header("location:login.html");//You will be sent to Login.php for re-login 
 } 
 else{
 $Username = $_POST["username"]; // as the method type in the form is "post" we are using $_POST otherwise it would be $_GET[] 
 $Password = $_POST["password"]; 
 $query="SELECT username, password FROM login WHERE username = $Username and password='$Password'"; //Fetching all the records with input credentials
 $res=mysqli_query($query);
 //Compare if the database has username and password entered by the user. Password has to be decrypted while comparing.
 if (!empty($res)) 
 {
 $_SESSION['username']=$inUsername; //Storing the username value in session variable so that it can be retrieved on other pages
 header("location:admin.html"); // user will be taken to profile page
 }
 else
 {
    echo "Incorrect username or password"; 
  
 } 
 } 
       ?>
 </body> 
 </html>