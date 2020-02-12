<!DOCTYPE html>
<html>

<head>
    <title>Table with database</title>
</head>

<body>
    <table>
        <tr>
            <th>User ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Access Type</th>
            <th>Department</th>
        </tr>
        <?php
        $conn = mysqli_connect("localhost", "root", "", "photographymanagement");
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        $sql = "SELECT UserId,FirstName,LastName,AccessType,Department FROM user";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["UserId"] . "</td><td>" . $row["FirstName"] . "</td><td>" . $row["LastName"] . "</td><td>"
                    . $row["AccessType"] . "</td><td>" . $row["Department"] .  "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }
        $conn->close();
        ?>
    </table>
</body>

</html>