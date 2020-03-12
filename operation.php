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
            echo "deleted user successfully";
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
            echo "Access APPROVED ";
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
            echo "Access DECLINED ";
        }
    }
}
