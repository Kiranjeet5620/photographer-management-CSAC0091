<?php
include("config.php");
// Starting the session, to use and 
// store data in session variable 
session_start();
echo $_SESSION['username'];
echo $_SESSION['id'];
// If the session variable is empty, this  
// means the user is yet to login 
// User will be sent to 'login.php' page 
// to allow the user to login 
if (!isset($_SESSION['username'])) {
  $_SESSION['msg'] = "You have to log in first";
  header('location: login.php');
}

// Logout button will destroy the session, and 
// will unset the session variables 
// User will be headed to 'login.php' 
// after loggin out 
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="style.css">
  <link rel="stylesheet" type="text/css" href="sort.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <!-- table sorter links below-->
 
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> 
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.9.1/jquery.tablesorter.min.js">
  </script>
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

    #myTable {
      border-collapse: collapse;
      border-spacing: 0;
      border: 1px solid gray;
    }

    #myTable th {
      border: 1px solid gray;
      text-align: left;
      padding: 8px;
    }

    #myTable td {
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

    #myTable tr:nth-child(even) {
      background-color: lightgray
    }

    a:link,
    a:visited,
    a:hover,
    a:active {
      color: #000;
      text-decoration: none;
    }

    th a.sort-by {
      padding-right: 17px;
      position: relative;
    }

    a.sort-by:before,
    a.sort-by:after {
      border: 4px solid transparent;
      content: "";
      display: block;
      height: 0;
      right: 5px;
      top: 50%;
      position: absolute;
      width: 0;
    }

    a.sort-by:before {
      border-bottom-color: #666;
      margin-top: -9px;
    }

    a.sort-by:after {
      border-top-color: #666;
      margin-top: 1px;
    }

    th a,
    td a {
      display: block;
      width: 100%;
    }

    #opr {
      position: relative;
      left: -2px;
    }
  </style>
  <script>
    $(document).ready(function() {
      $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function() {
          $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
      });
    });
  </script>

  <script>
    $(function() {
      $("#myTable").tablesorter({
        widgets: ['zebra', "filter"],
        widgetOptions: {
          filter_functions: {

            function(e, n, f, i, $r, c, data) {
              return e === f;
            },

          }
        }

      });
    });
  </script>



</head>

<body>

  <h1>PHOTOGRAPHER MANAGEMENT</h1>
  <a id="logout" href="login.php">Logout</a>

  <div class="tab">
    <button class="tablinks" onclick="openTab(event, 'welcome')" id="defaultOpen">Welcome</button>
    <button class="tablinks" onclick="openTab(event, 'myprofile')">My Profile</button>
    <button class="tablinks" onclick="openTab(event, 'users')">Users</button>

  </div>

  <div id="welcome" class="tabcontent">
    <h3>Welcome Elevated Access User</h3>
  </div>

  <div id="myprofile" class="tabcontent">
    <h2>Edit User</h2>
    <form method='POST' action="edituser.php">
      <table>
        <tr>
          <td>Email Address</td>
          <td><input type="email" name="email" value=" <?php echo $_SESSION['username']; ?>"></td>
        </tr>
        <tr>
          <td>Password</td>
          <td><input type="text" name="password" value="<?php echo $_SESSION['password']; ?>"></td>
        </tr>
        <tr>
          <td>First name</td>
          <td> <input type="text" name="firstname" value="<?php echo $_SESSION['fname']; ?>"></td>
        </tr>
        <tr>
          <td>Last name</td>
          <td> <input type="text" name="lastname" value="<?php echo $_SESSION['lname']; ?>"></td>
        </tr>
        <tr>
          <td>Date of birth</td>
          <td><input type="date" name="Dob" value="<?php echo $_SESSION['dob']; ?>"></td>
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
          <td> <input type="text" name="phone" value="<?php echo $_SESSION['phone']; ?>"></td>
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
          <td> <input type="text" name="address" value="<?php echo $_SESSION['add']; ?>"></td>
        </tr>
        <tr>
          <td>Postal Code</td>
          <td> <input type="text" name="postal" value="<?php echo $_SESSION['postal']; ?>"></td>
        </tr>
        <tr>
          <td><input id="button" type="submit" name="submit" value="Edit"></td>
        </tr>
      </table>
    </form>
  </div>

  <div id="users" class="tabcontent">
    <h2>Users</h2>
    <div class="btns">
      <button class="btn"><i class="fa fa-eye"></i> View</button>&nbsp;&nbsp;&nbsp;
      <button class="btn"><i class="fa fa-pencil"></i> Edit</button>&nbsp;&nbsp;&nbsp;
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

                <input id="myInput" type="text" name="search" placeholder="Search..">

              </div>
            </div>
          </td>
        </tr>
      </table>
    </div>
    <div id="table-scroll" style="width:600px;">
      <table id="myTable" class='tablesorter tablesorter-default'>
      <tr class="tablesorter-headerRow">
          <th class="tablesorter-header" data-column="0"><div class="tablesorter-header-inner"><input type="checkbox"></div></th>
		 <!--<script>
		  document.getElementById("hide").style.visibility='hidden';
		  </script>-->
          <th class="tablesorter-header" data-column="1"><div class="tablesorter-header-inner">User_Id</div></th>
          <th class="tablesorter-header" data-column="2"><div class="tablesorter-header-inner">First_Name</div></th>
          <th class="tablesorter-header" data-column="3"><div class="tablesorter-header-inner">Last_Name</div></th>
          <th class="tablesorter-header" data-column="4"><div class="tablesorter-header-inner">Access_Type</div></th>
          <th class="tablesorter-header" data-column="5"><div class="tablesorter-header-inner">Department</div></th>

        </tr>
        <?php
        include('config.php');
        $query = "SELECT * FROM `user`inner join 
        access inner join Department on user.AccessType=access.A_id AND user.Department=Department.D_id";
        $res = mysqli_query($db, $query);
        if (mysqli_num_rows($res) > 0) {

          while ($row = mysqli_fetch_array($res)) {

            echo "<tbody id='table-scroll'>";
            echo "<tr>";

            echo "<td><input type='checkbox' ></td>";

            echo "<td>" . $row['UserId'] . "</td>";
            echo "<td>" . $row['FirstName'] . "</td>";
            echo "<td>" . $row['LastName'] . "</td>";
            echo "<td>" . $row['AccessType'] . "</td>";
            echo "<td>" . $row['DepartmentName'] . "</td>";
            echo "</tr>";
            echo "</tbody>";
          }
        }
        ?>


      </table>
    </div>
  </div>
  <script>
    function openTab(evt, eventName) {
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