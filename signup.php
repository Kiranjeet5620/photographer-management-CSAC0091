<html>
<title>
  photographermanagement
</title>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <h1>PHOTOGRAPHER MANAGEMENT</h1>

  <style>
    td {
      padding-right: 15px;
      padding-bottom: 5px;
      text-align: right;
    }

    #capcha {
      background-color: #F2F2F2;
      border: 1px solid #F2F2F2;
      position: absolute;
      right: 800px;
      top: 60px;
    }

    #mainCaptcha {
      background-color: #AAAAAA;
      border-radius: 5px;
      height: 30px;
      width: 80px;
    }
  </style>
  <script type="text/javascript">
    function generateCaptcha() {
      var alpha = new Array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
      var i;
      for (i = 0; i < 4; i++) {
        var a = alpha[Math.floor(Math.random() * alpha.length)];
        var b = alpha[Math.floor(Math.random() * alpha.length)];
        var c = alpha[Math.floor(Math.random() * alpha.length)];
        var d = alpha[Math.floor(Math.random() * alpha.length)];
      }
      var code = a + '' + b + '' + '' + c + '' + d;
      document.getElementById("mainCaptcha").value = code
    }

    function CheckValidCaptcha() {
      var string1 = removeSpaces(document.getElementById('mainCaptcha').value);
      var string2 = removeSpaces(document.getElementById('txtInput').value);
      if (string1 == string2) {
        document.getElementById('success').innerHTML = "Form is validated Successfully";
        //alert("Form is validated Successfully");
        return true;
      } else {
        document.getElementById('error').innerHTML = "Please enter a valid captcha.";
        //alert("Please enter a valid captcha.");
        return false;

      }
    }

    function removeSpaces(string) {
      return string.split(' ').join('');
    }
  </script>
</head>

<body>
  <div class="container">
    <form  action="insert.php" method="POST">
      <table>
        <tr>
          <td>Email Address</td>
          <td><input type="email" name="email"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="password" name="password"></td>
        </tr>
        <tr>
          <td>Confirm Password</td>
          <td><input type="password" name="cpassword"></td>
        </tr>
        <tr>
          <td>First name</td>
          <td> <input type="text" name="fname"></td>
        </tr>
        <tr>
          <td>Last name</td>
          <td> <input type="text" name="lname"></td>
        </tr>
        <tr>
          <td>Date of birth</td>
          <td><input type="date" name="dob" style="width: 172px"></td>
        </tr>

        <tr>
          <td></td>
          <td><input id="button" type="submit" name="submit" value="submit"></td>
        </tr>
      </table>
      
    </form>
    <div id="capcha">
      <i><b> Captcha</b> </i> </br>
      <input type="text" id="mainCaptcha" readonly="readonly">
      <input type="button" id="refresh" value="Refresh" onclick="generateCaptcha();" /></br>
      <input type="text" id="txtInput" size="17" /></br></br>
      <input id="Button1" type="button" value="Check" onclick="CheckValidCaptcha();" /></br>
      <span id="error" style="color:red"></span>
      <span id="success" style="color:green"></span>
    </div>
  </div>
</body>

</html>