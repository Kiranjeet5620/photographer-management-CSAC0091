<?php
include('connect.php');

?>
<!DOCTYPE html>

<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="style.css">
    <style></style>
</head>

<body>
    <h1>PHOTOGRAPHER MANAGEMENT</h1>
    <div class="container">
        <form method ="POST" action="connect.php"> 
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
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td> <input id="button" name="submit" type="submit" value="Log in"></input>&nbsp;&nbsp;&nbsp;&nbsp;
                        <input id="button" type="button" onclick="location.href='signup.html';" value="Sign up" ></input></td>
                </tr>
            </table>

        </form>
    </div>

</body>

</html>