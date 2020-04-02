<?php
      include("config.php");
      $sqll = "SELECT * FROM user WHERE ReqStatus='Approved'or ReqStatus='Declined' or ReqStatus='Active' ";
      $query1 = mysqli_query($db, $sqll);
      $numrows = mysqli_num_rows($query1);
      if ($numrows != 0) {
        while ($rows = mysqli_fetch_array($query1)) {
          $status = $rows['ReqStatus'];
        }
        echo $status;
        if ($status == 'Approved') {
          echo "Access request Approved"; ?>
          <script type='text/javascript'>
            $(document).ready(function() {
              document.getElementById("rqstbtn").style.display = "none";
            });
          </script><?php
        } 
        elseif ($status == 'Declined') {
          echo "Access request Declined"; ?>
          <script type='text/javascript'>
            $(document).ready(function() {
              document.getElementById("rqstbtn").style.display = "none";
            });
          </script><?php
        }
        elseif ($status == 'Active') {
          echo "Access Request is Pending Approval!"; ?>
          <script type='text/javascript'>
            $(document).ready(function() {
              document.getElementById("rqstbtn").style.display = "none";
            });
          </script><?php
        }
      }
      else{
          $id = $_SESSION['id'];
          $r = 'R00' . $id;
          
          if (isset($_POST['req'])) {
            $sql = "UPDATE user SET RequestId='$r', ReqStatus='Active' where UserId='$id' ";
            $result = mysqli_query($db, $sql);
            if (!empty($result)) {
            echo "Access Request is Pending Approval!"; ?>
            <script type='text/javascript'>
              $(document).ready(function() {
                document.getElementById("rqstbtn").style.display = "none";
              });
            </script><?php
            }
          } 
          else {
            echo mysqli_error($sql);
          }         
      }