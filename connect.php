<html>

<head>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>

<body style="background-color: #f1f1f1;">
    <?php
    include("config.php");
    // Starting the session, necessary 
    // for using session variables 
    session_start();

    // Declaring and hoisting the variables 

    $errors = array();
    $_SESSION['success'] = "";
    if (isset($_POST["submit"])) {

        if (!empty($_POST['username']) && !empty($_POST['password'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $sql = "SELECT * FROM user WHERE Email='$username' AND Password='$password'  ";
            $query = mysqli_query($db, $sql);
            $numrows = mysqli_num_rows($query);
            if ($numrows != 0) {
                while ($rows = mysqli_fetch_array($query)) {
                    $dbusername = $rows['Email'];
                    $dbpassword = $rows['Password'];
                    $access = $rows['AccessType'];
                    $fname = $rows['FirstName'];
                    $lname = $rows['LastName'];
                    $dob = $rows['Dob'];
                    $phone = $rows['Phone'];
                    $add = $rows['Address'];
                    $postal = $rows['PostalCode'];
                    $id = $rows['UserId'];
                }
                $_SESSION['username'] = $dbusername;
                $_SESSION['password'] = $dbpassword;
                $_SESSION['fname'] = $fname;
                $_SESSION['lname'] = $lname;
                $_SESSION['dob'] = $dob;
                $_SESSION['phone'] = $phone;
                $_SESSION['add'] = $add;
                $_SESSION['postal'] = $postal;
                $_SESSION['id'] = $id;

                if ($username == $dbusername && $password == $dbpassword && $access == '1') {

                    $_SESSION['username'] = $username;

                    /* Redirect browser */
                    header("Location: admin.php");
                } elseif ($username == $dbusername && $password == $dbpassword && $access == '3') {

                    header("Location: regularuser.php");
                } elseif ($username == $dbusername && $password == $dbpassword && $access == '2') {
                    $_SESSION['username'] = $username;
                    header("Location: elevated.php");
                }
            } else {

    ?>
                <div style="position:absolute;top:40%;right:40%;">

                    <div class='alert alert-danger'>
                        <a href="login.php" class="close" data-dismiss="alert">&times;</a>
                        <strong>Invalid! </strong>username or password!
                    </div>
                </div>
            <?php
            }
        } else {
            ?>
            <div style="position:absolute;top:40%;right:40%;">

                <div class='alert alert-warning'>
                    <a href="login.php" class="close" data-dismiss="alert">&times;</a>
                    All fields are required!
                </div>
            </div>
    <?php
        }
    }
    ?>
</body>

</html>