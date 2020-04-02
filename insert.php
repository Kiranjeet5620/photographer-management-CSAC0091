<html>
<head>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    
</head>
<body style="background-color: #f1f1f1;">
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
    ?>
            <div style="position:absolute;top:40%;right:40%;">

                <div class='alert alert-success'>
                    <a href="login.php" class="close" data-dismiss="alert">&times;</a>
                    Signed up Successfully!
                </div>
            </div>
            <?php
  } else {
    ?>
            <div style="position:absolute;top:40%;right:40%;">

                <div class='alert alert-danger'>
                    <a href="signup.php" class="close" data-dismiss="alert">&times;</a>
                    Something went wrong!
                </div>
            </div>
            <?php
  }
}
else {
  ?>
            <div style="position:absolute;top:40%;right:40%;">

                <div class='alert alert-warning'>
                    <a href="login.php" class="close" data-dismiss="alert">&times;</a>
                    Password doesn't match!
                </div>
            </div>
            <?php
}
}
?>
</body>
</html>

