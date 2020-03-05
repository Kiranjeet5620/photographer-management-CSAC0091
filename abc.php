<?php
if (isset($_POST['ASC']))
{
$asc_query="SELECT * FROM users ORDER BY User_Id ASC";
$result = executeQuery($asc_query);
}
elseif(isset($_POST['DESC']))
{
$desc_query="SELECT * FROM users ORDER BY User_Id DESC";
$result = executeQuery($desc_query);
}
else{
$default_query = "SELECT * FROM users";
$result=executeQuery($desc_query);
}
function executeQuery($query)
{
$connect = mysqli_connect('localhost', 'root', '','photographymanagement');
$result=mysqli_query($connect,$query);
return $result;
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <style>
    *  {
    -moz-box-sizing: border-box;
    -o-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
}
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 50%;
            border: 1px solid #ddd;
        }

        th,
        td {
            border: 1px solid #ddd;
            text-align: left;
            padding: 8px;
        }

        #table-scroll {
            height: 200px;
            width: 610px;
            overflow: auto;
            margin-top: 20px;
            position: relative;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2
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

    </style>
</head>

<body>

    <div id="table-scroll">
        <table id="table">

            <tr>
                <th><input type="checkbox"></th>
                <th scope="col"><a href="#" class="sort-by">User_Id</a></th>
                 <th scope="col"><a href="#" class="sort-by" >First_Name</th>
                <th scope="col"><a href="#" class="sort-by"  >Last_Name</th>
               <th scope="col"><a href="#" class="sort-by">Access_Type</th>
                 <th scope="col"><a href="#" class="sort-by">Department</th>

            </tr>
            <tbody>
            <?php while($row = mysqli_fetch_array($result)):?>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>fgdfgwh</td>
                    <td>gfsgxhd</td>
                    <td>bcjfj</td>
                    <td>hjdhh</td>
                    <td>cjhjkfdks</td>

                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td>ndbwbh</td>
                    <td>bnm</td>
                   <td>oiuhgf</td>
                   <td>oijhg</td>
                    <td>fghjk</td>

                </tr>
                <tr>
                    <td><input type="checkbox"></td>
        <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                  <td><?php echo $row[0];?></td>
                </tr>
                <tr>
                    <td><input type="checkbox"></td>
                    <td><?php echo $row[0];?></td>
                 <td><?php echo $row[0];?></td>
                    <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                </tr>
                 <tr>
                    <td><input type="checkbox"></td>
        <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                  <td><?php echo $row[0];?></td>
                </tr>
                 <tr>
                    <td><input type="checkbox"></td>
        <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                  <td><?php echo $row[0];?></td>
                </tr>
                 <tr>
                    <td><input type="checkbox"></td>
        <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                  <td><?php echo $row[0];?></td>
                </tr>
                 <tr>
                    <td><input type="checkbox"></td>
        <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                  <td><?php echo $row[0];?></td>
                </tr>
                 <tr>
                    <td><input type="checkbox"></td>
        <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                  <td><?php echo $row[0];?></td>
                </tr>
                 <tr>
                    <td><input type="checkbox"></td>
        <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                   <td><?php echo $row[0];?></td>
                  <td><?php echo $row[0];?></td>
                </tr>
                <?php endwhile;?>
            </tbody>
        </table>
    </div>


</body>

</html>