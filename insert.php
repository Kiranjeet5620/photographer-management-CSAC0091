<?php  
//Step1
$db = mysqli_connect('localhost','root','','photographymanagement')
or die('Error connecting to MySQL server.');

    $email = $_POST['email];
    $pass = $_POST['password'];
    $cpass=$_POST['cpassword'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];

    $sql="insert into  signup (email,password,fname,lname,dob,cpass) Values('$email','$pass',' $fname','$lname','$dob','$cpass') ";  
    
                if (mysqli_query($db, $sql)) {
                  echo "added 1 record";
              } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($db);
              }
  
  header("refresh:2; url=signup.html");

?>
