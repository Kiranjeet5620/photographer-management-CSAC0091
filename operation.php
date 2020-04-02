<html>
<head>
    
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    
</head>
<body style="background-color: #f1f1f1;">
<?php
include('config.php');

if (isset($_POST['Del'])) { //to run PHP script on submit

    if (!empty($_POST['checkbox'])) {
        // Loop to store and display values of individual checked checkbox.
        echo "selected";
        foreach ($_POST['checkbox'] as $selected) {
            echo $selected . "</br>";
            $sql = "DELETE FROM user WHERE RequestId='$selected'";
            $query = mysqli_query($db, $sql);
            ?>
            <div style="position:absolute;top:40%;right:40%;">

                <div class='alert alert-success'>
                    <a href="admin.php" class="close" data-dismiss="alert">&times;</a>
                    User deleted.
                </div>
            </div>
            <?php
        }
    }
}

if (isset($_POST['Approve'])) { //to run PHP script on submit
    if (!empty($_POST['checkbox'])) {
        // Loop to store and display values of individual checked checkbox.
        echo "selected";
        foreach ($_POST['checkbox'] as $selected) {
            echo $selected . "</br>";
            $sql = "UPDATE user SET ReqStatus='Approved' WHERE RequestId='$selected'";
            $query = mysqli_query($db, $sql);
            ?>
            <div style="position:absolute;top:40%;right:40%;">

                <div class='alert alert-success'>
                    <a href="admin.php" class="close" data-dismiss="alert">&times;</a>
                    Access Approved.
                </div>
            </div>
            <?php
        }
    }
}
if (isset($_POST['Decline'])) { //to run PHP script on submit
    if (!empty($_POST['checkbox'])) {
        // Loop to store and display values of individual checked checkbox.
        echo "selected";
        foreach ($_POST['checkbox'] as $selected) {
            echo $selected . "</br>";
            $sql = "UPDATE user SET ReqStatus='Declined' WHERE RequestId='$selected'";
            $query = mysqli_query($db, $sql);
            ?>
            <div style="position:absolute;top:40%;right:40%;">

                <div class='alert alert-warning'>
                    <a href="admin.php" class="close" data-dismiss="alert">&times;</a>
                    Access Declined!
                </div>
            </div>
            <?php
        }
    }
}
?>
</body>
</html>
