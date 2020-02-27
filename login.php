
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
                        <span><i class="fa fa-eye-slash" aria-hidden="true" id="password"></i></span>

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