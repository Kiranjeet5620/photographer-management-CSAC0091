<?php
//Step1
 $db = mysqli_connect('localhost','root','','photographymanagement')
 or die('Error connecting to MySQL server.');
 if(isset($_POST['submit'])){
    $email = $_POST['email];
    $pass = $_POST['password'];
    $cpass=$_POST['cpassword'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
 
    $sql="insert into signup (email,pass,cpass,fname,lname,dob) Values('$email','$pass','$cpass',' $fname','$lname','$dob') ";  
    $query=(mysqli_query($db, $sql);
                if ($query) {
                  echo "added 1 record";
              } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($db);
              }
  
  header(Location: regularuser.html);
  }
?>
