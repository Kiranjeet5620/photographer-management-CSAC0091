<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="pass.js"></script>
    
    <style>
        span {
            position: absolute;
            right: 15px;
            transform: translate(0, -50%);
            top: 50%;
            cursor: pointer;
        }

        .fa {
            font-size: 20px;
            color: #7a797e;
        }
    </style>
</head>

<body>
    <h1>PHOTOGRAPHER MANAGEMENT</h1>
    <div class="container">
        <form method="POST" action="connect.php">
            <table>
                <tr>
                    <td>
                        <label for="Username"> Username </label>
                    </td>
                    <td>
                        <input id="Username" type="text" name="username" value=""></input>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="Password"> Password </label>
                    </td>
                    <td>
                        <input id="Password" type="password" name="password" value=""></input>
                        <!--<span><i class="fa fa-eye-slash" aria-hidden="true" id="password"></i></span>-->
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td> <input id="button" name="submit" type="submit" value="Log in"></input>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input id="button" type="button" onclick="location.href='signup.php';" value="Sign up"></input></td>
                </tr>
            </table>

        </form>
    </div>

</body>

</html>
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
                $id=$rows['UserId'];
            }
            $_SESSION['username'] = $dbusername;
            $_SESSION['password'] = $dbpassword;
            $_SESSION['fname'] = $fname;
            $_SESSION['lname'] = $lname;
            $_SESSION['dob'] = $dob;
            $_SESSION['phone'] = $phone;
            $_SESSION['add'] = $add;
            $_SESSION['postal'] = $postal;
            $_SESSION['id']=$id;

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
            header("Location: login.php");
            ?>
            <div style="position:absolute;top:50%;right:50%">
            <div class='alert alert-primary'>Incorrect username or password!</div>
        </div>
            <?php
        }
    } else {
        echo "All fields are required!";
    }
}
?>