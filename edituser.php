<html>

<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style="background-color: #f1f1f1;">

    <?php
    //Step1
    include("config.php");

    
    session_start();
    echo $_SESSION['username'];
    $id = $_SESSION['id'];
    if (isset($_POST['submit'])) {

        $email = $_POST['email'];
        $pass = $_POST['password'];
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $dob = $_POST['Dob'];
        // $access =$_POST['acc'];
        $phone = $_POST['phone'];
        //$depart = $_POST['deprt'];
        $address = $_POST['address'];
        $postal = $_POST['postal'];

        $sql = "UPDATE user SET Email='$email',Password='$pass',FirstName='$fname',
            LastName='$lname',Dob='$dob',Phone='$phone',
            Address='$address',PostalCode='$postal'  where UserId='$id'; ";
        $result = mysqli_query($db, $sql);
        if (!empty($result)) {
    ?>
            <div style="position:absolute;top:40%;right:40%;">

                <div class='alert alert-success'>
                    <a href="elevated.php" class="close" data-dismiss="alert">&times;</a>
                    User edited successfully.
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