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
            while ($rows = mysqli_fetch_assoc($query)) {
                $dbusername = $rows['Email'];
                $dbpassword = $rows['Password'];
                $access = $rows['AccessType'];
            }
            
            if ($username == $dbusername && $password == $dbpassword && $access == '1') {
                session_start();
                $_SESSION['username'] = $username;

                /* Redirect browser */
                header("Location: admin.html");
            } elseif ($username == $dbusername && $password == $dbpassword && $access == '3') {
                session_start();
                $_SESSION['username'] = $username;
                $_SESSION['id']=$id;
                $_SESSION['fname']=$row['FirstName'];
                header("Location: regularuser.php");
            } elseif ($username == $dbusername && $password == $dbpassword && $access == '2') {
                session_start();
                $_SESSION['username'] = $username;
                header("Location: elevated.php");
            }
        } else {
            echo "Invalid username or password!";
        }
    } else {
        echo "All fields are required!";
    }
}
