<?php  
//Step1
$db = mysqli_connect('localhost','root','','photographymanagement')
or die('Error connecting to MySQL server.');
if(isset($_POST['submit'])){
    $email = $_POST["email"];
    $pass = $_POST["password"];
    $cpass=$_POST["cpassword"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $dob = $_POST["dob"];

    $sql="insert into  signup(email,password,fname,lname,dob,cpass) Values($email,$pass, $fname,$lname,$dob,$cpass) ";  
    $result = mysqli_query($db,$sql);
    echo "1 record added";
  }
  else{
  echo "errorrrrrrrrrr";
  }
  mysqli_close($db);

?>

<html>
 <head>
 </head>
 <body>
 <h1>PHP connect to MySQL scmmcslmkdcms</h1>
</body>
</html>