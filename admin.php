<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    td {
      padding-right: 15px;
      padding-bottom: 5px;
      text-align: right;
    }

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

    h3 {
      position: absolute;
      left: 700px;
      top: 300px;
    }

    .btns {
      text-align: right;
    }

    #table {
      border: 1px solid black;
      width: 50%;
      font-size: 20px;
      text-align: center;
    }

    form {
      position: absolute;
      left: 380px;
    }

    .button_group {
      border-radius: 0%;
      margin: -2px;
      border: 1px solid black;

    }

    #search {
      background-color: gray;
      border-radius: 4px;
    }

    #table1 {
      border-collapse: collapse;
      border-spacing: 0;
      border: 1px solid gray;
    }

    #table1 th {
      border: 1px solid gray;
      text-align: left;
      padding: 8px;
    }

    #table1 td {
      border: 1px solid gray;
      text-align: left;
      padding: 8px;
    }

    #table-scroll {
      height: 200px;
      overflow: auto;
      margin-top: 20px;
      position: relative;
    }

    #table1 tr:nth-child(even) {
      background-color: lightgray
    }
  </style>
</head>

<body>

  <h1>PHOTOGRAPHER MANAGEMENT</h1>
  <a id="logout" href="login.html">Logout</a>

  <div class="tab">
    <button class="tablinks" onclick="openCity(event, 'welcome')" id="defaultOpen">Welcome</button>
    <button class="tablinks" onclick="openCity(event, 'myprofile')">My Profile</button>
    <button class="tablinks" onclick="openCity(event, 'users')">Users</button>
    <button class="tablinks" onclick="openCity(event, 'accessrequests')">Access Requests</button>
  </div>

  <div id="welcome" class="tabcontent">
    <h3>Welcome Administrator</h3>
  </div>

  <div id="myprofile" class="tabcontent">
    <h2>Add User</h2>
    <form method="POST" action="adduser.php">
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
          <td> <input type="text" name="fname"></td>
        </tr>
        <tr>
          <td>Last name</td>
          <td> <input type="text" name="lname"></td>
        </tr>
        <tr>
          <td>Date of birth</td>
          <td><input type="date" name="dob"></td>
        </tr>
        <tr>
          <td>Access Type</td>
          <td><select name="acc">
              <?php
              include('config.php');
              $sql = mysqli_query($db, "SELECT * FROM access");

              while ($row = $sql->fetch_assoc()) {
                echo '<option value=" ' . $row['A_id'] . ' "> ' . $row['AccessType'] . ' </option>';
              }
              ?>
            </select>
          </td>
        </tr>
        <tr>
          <td>Phone number</td>
          <td> <input type="text" name="phno"></td>
        </tr>
        <tr>
          <td>Department</td>
          <td><select name="deprt">
              <?php
              include('config.php');
              $sql = mysqli_query($db, "SELECT * FROM department");

              while ($row = $sql->fetch_assoc()) {
                echo '<option value=" ' . $row['D_id'] . ' "> ' . $row['DepartmentName'] . ' </option>';
              }
              ?>
            </select></td>

        </tr>
        <tr>
          <td>Address</td>
          <td> <input type="text" name="add"></td>
        </tr>
        <tr>
          <td>Postal Code</td>
          <td> <input type="text" name="pcode"></td>
        </tr>
        <tr>
          <td><input id="button" type="submit" name="submit" value="Save"></td>
          <td><input id="button" type="button" value="Cancel"></td>
        </tr>
      </table>
    </form>
  </div>

  <div id="users" class="tabcontent">
    <h2>Users</h2>
    <div class="btns">
      <button><i class="fa fa-plus-circle"></i> Create</button>&nbsp;&nbsp;&nbsp;
      <button><i class="fa fa-eye"></i> View</button>&nbsp;&nbsp;&nbsp;
      <button><i class="fa fa-pencil"></i> Edit</button>&nbsp;&nbsp;&nbsp;
      <button><i class="fa fa-close"></i> Delete</button>
    </div>
    <div>
      <table>
        <tr>
          <td>
          <td>Department</td>
          <td><select name="">
              <option value="Technology">All</option>
              <option value="Portrait Photography">Portrait Photography</option>
              <option value="Technology">Technology</option>
              <option value="Fashion Photography">Fashion Photography</option>
              <option value="Sports Photography">Sports Photography</option>
              <option value="Wildlife Photography">Wildlife Photography</option>
            </select></td>
          </td>
          <td>
            <div class="searchbox">
              <div class="search-container">

                <input type="text" name="search">
                <button>Search</button>
              </div>
            </div>
          </td>
        </tr>
      </table>
    </div>
    <div id="table-scroll" style="width:527px;">
      <table id="table1">

        <tr>
          <th><input type="checkbox"></th>
          <th>User_ID</th>
          <th>First_Name</th>
          <th>Last_Name</th>
          <th>Access_Type</th>
          <th>Department</th>

        </tr>
        <?php 
        include('config.php');
        $query="Select*from user where AccessType=3";
        $res=mysqli_query($db,$query);
        if(mysqli_num_rows($res)>0){

        while($row=mysqli_fetch_array($res)){
        
        echo "<tbody>";
         echo "<tr>";
           echo "<td></td>";
            echo "<td>".$row['UserId']."</td>";
            echo "<td>".$row['FirstName']."</td>";
            echo "<td>".$row['LastName']."</td>";
            echo "<td>".$row['AccessType']."</td>";
            echo "<td>".$row['Department']."</td>";
            echo "</tr>";
            echo "</tbody>";
        }
      }
?>
          
        
      </table>
    </div>
  </div>

  <div id="accessrequests" class="tabcontent">
    <h2>Access Requests</h2>
    <div class="btns">
      <button class="btn"><i class="fa fa-plus-circle"></i> Create</button>&nbsp;&nbsp;&nbsp;
      <button class="btn"><i class="fa fa-eye"></i> View</button>&nbsp;&nbsp;&nbsp;
      <button class="btn"><i class="fa fa-pencil"></i> Edit</button>&nbsp;&nbsp;&nbsp;
      <button class="btn"><i class="fa fa-close"></i> Delete</button>
    </div>
    <div>
      <table>
        <tr>
          <td>
          <td>Department</td>
          <td><select name="">
              <option value="Technology">All</option>
              <option value="Portrait Photography">Portrait Photography</option>
              <option value="Technology">Technology</option>
              <option value="Fashion Photography">Fashion Photography</option>
              <option value="Sports Photography">Sports Photography</option>
              <option value="Wildlife Photography">Wildlife Photography</option>
            </select></td>
          </td>
          <td>
            <div class="searchbox">
              <div class="search-container">

                <input type="text" name="search">
                <button id="search">Search</button>
              </div>
            </div>
          </td>
          <td>
            <div><button class="button_group">Approve</button>
              <button class="button_group">Decline</button></div>
          </td>
        </tr>
      </table>
    </div>

    <div id="table-scroll" style="width:565px;">
      <table id="table1">

        <tr>
          <th><input type="checkbox"></th>
          <th>Request_ID</th>
          <th>First_Name</th>
          <th>Last_Name</th>
          <th>Department</th>
          <th>Request_Status</th>

        </tr>
        <tbody>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>

          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td><input type="checkbox"></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
          </tr>
        </tbody>
      </table>
    </div>

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