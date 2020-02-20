<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">

  <style>
    * {
      box-sizing: border-box
    }


    /* Style the tab */
    .tab {
      float: left;
      border: 1px solid #ccc;
      background-color: #f1f1f1;
      width: 15%;
      height: 570px;
    }

    /* Style the buttons inside the tab */
    .tab button {
      display: block;
      background-color: inherit;
      color: black;
      padding: 20px 15px;
      width: 100%;
      border: none;
      outline: none;
      text-align: left;
      cursor: pointer;
      transition: 0.3s;
      font-size: 17px;


    }


    /* Change background color of buttons on hover */
    .tab button:hover {
      background-color: #ddd;
    }

    /* Create an active/current "tab button" class */
    .tab button.active {
      background-color: #ccc;
    }

    /* Style the tab content */
    .tabcontent {
      float: left;
      padding: 0px 12px;
      border: 1px solid #ccc;
      width: 85%;
      border-left: none;
      height: 570px;
    }

    #rqstbtn {
      border-radius: 5px;
      position: relative;
      left: 700px;
      top: 100px;
    }

    form {
      position: absolute;
      left: 380px;
    }

    #display {

      position: absolute;
      right: 200px;
      top: 45%;
    }
  </style>
</head>

<body>

  <h1>PHOTOGRAPHER MANAGEMENT</h1>
  <a id="logout" href="login.html">Logout</a>

  <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'welcome')" id="defaultOpen">Welcome</button>
    <button class="tablinks" onclick="openCity(event, 'myprofile')">My Profile</button>
  </div>

  <div id="welcome" class="tabcontent">
    <h3>Welcome Regular Access User</h3><br>
  </div>

  <div id="myprofile" class="tabcontent">
    <h2>User Profile</h2>
    <button id="rqstbtn" onclick="myFunction()">Request Elevated Access</button>
    <p id="display"></p>

    <script>
      function myFunction() {
        document.getElementById("display").innerHTML = "Access Request is Pending Approval";
        document.getElementById("rqstbtn").style.display = "none";
      }
    </script>
    <form>
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
          <td>First name</td>
          <td> <input type="text" name="firstname"></td>
        </tr>
        <tr>
          <td>Last name</td>
          <td> <input type="text" name="lastname"></td>
        </tr>
        <tr>
          <td>Date of birth</td>
          <td><input type="date" name="DateofBirth" style="width:173px;"></td>
        </tr>
        <tr>
          <td>Access Type</td>
          <td><select name="" style="width:172px;">
              <option value="Administrator">Administrator</option>
              <option value="Management">Management</option>
              <option value="Photographer">Photographer</option>
            </select></td>
        </tr>
        <tr>
          <td>Phone number</td>
          <td> <input type="tel" name="phoneno"></td>
        </tr>
        <tr>
          <td>Department</td>
          <td><select name="" style="width:172px;">
              <option value="Portrait Photography">Portrait Photography</option>
              <option value="Technology">Technology</option>
              <option value="Fashion Photography">Fashion Photography</option>
              <option value="Sports Photography">Sports Photography</option>
              <option value="Wildlife Photography">Wildlife Photography</option>
            </select></td>
        </tr>
        <tr>
          <td>Address</td>
          <td> <input type="text" name="lastname"></td>
        </tr>
        <tr>
          <td>Postal Code</td>
          <td> <input type="text" name="lastname"></td>
        </tr>
        <tr>
          <td><input id="button" type="button" value="Edit"></td>
        </tr>
      </table>
    </form>

  </div>

  <div id="users" class="tabcontent">
    <h5>Users</h5>

  </div>


  <script>
    function openCity(evt, eventName) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablinks");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
      }
      document.getElementById(eventName).style.display = "block";
      evt.currentTarget.className += " active";
    }

    // Get the element with id="defaultOpen" and click on it
    document.getElementById("defaultOpen").click();
  </script>

</body>

</html>