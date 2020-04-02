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
          ?>
            <div style="position:absolute;top:40%;right:40%;">

                <div class='alert alert-warning'>
                    <a href="login.php" class="close" data-dismiss="alert">&times;</a>
                    Access Request Declined!
                </div>
            </div>
            
          <script type='text/javascript'>
            $(document).ready(function() {
              document.getElementById("rqstbtn").style.display = "none";
            });
          </script><?php
        }
        elseif ($status == 'Active') {
          ?>
            <div style="position:absolute;top:40%;right:40%;">

                <div class='alert alert-primary'>
                    <a href="login.php" class="close" data-dismiss="alert">&times;</a>
                    Access Request is pending Approval!
                </div>
            </div>
            
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
              ?>
              <div style="position:absolute;top:40%;right:40%;">
  
                  <div class='alert alert-primary'>
                      <a href="regularuser.php" class="close" data-dismiss="alert">&times;</a>
                      Access Request is pending Approval!
                  </div>
              </div>
              <?php ?>
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