<html>
<head>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    
</head>
<body style="background-color: #f1f1f1;">

<?php
//Step1
include("config.php");


if (isset($_POST['submit'])) {

    $email = $_POST['email'];
    $pass = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $dob = $_POST['dob'];
    $access =$_POST['acc'];
    $phone = $_POST['phno'];
    $depart = $_POST['deprt'];
    $address = $_POST['add'];
    $postal = $_POST['pcode'];
    
    $sql = "INSERT INTO user (Email,Password,FirstName,LastName,Dob,AccessType,Phone,Department,Address,PostalCode) 
                     Values('$email','$pass','$fname','$lname','$dob','$access','$phone','$depart','$address','$postal') ";
    $result = mysqli_query($db, $sql);
    if (!empty($result)) {
        ?>
        <div style="position:absolute;top:40%;right:40%;">

            <div class='alert alert-success'>
                <a href="admin.php" class="close" data-dismiss="alert">&times;</a>
                User added successfully.
            </div>
        </div>
        <?php
    } else {
        echo mysqli_error($sql);
    }
}
?>
</body>
</html>
