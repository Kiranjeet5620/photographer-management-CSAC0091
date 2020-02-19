<?php  
//Step1
$db = mysqli_connect('localhost','root','','photographymanagement')
or die('Error connecting to MySQL server.');


    $sql="insert into  signup(email,password,fname,lname,dob,cpass) Values('kiran@gmail.com','123','kkk','ddd','sss','112') ";  
    
                if (mysqli_query($db, $sql)) {
                  echo "inserted";
              } else {
                  echo "Error: " . $sql . "<br>" . mysqli_error($db);
              }
  }
  else{
  echo "errorrrrrrrrrr";
  }
  mysqli_close($db);

?>
<html>
 <head>
 </head>
 <body>
 <h1>zxdcfgvbh</h1>
</body>
</html>

<html>
 <head>
 </head>
 <body>
 <h1>PHP connect to MySQL scmmcslmkdcms</h1>
</body>
</html>