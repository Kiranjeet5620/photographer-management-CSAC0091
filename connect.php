<?php  
$db = mysqli_connect('localhost','root','','photographymanagement')
or die('Error connecting to MySQL server.');
if(isset($_POST["submit"])){  
  
if(!empty($_POST['username']) && !empty($_POST['password'])) {  
    $username=$_POST['username'];  
    $password=$_POST['password'];  

    $sql="SELECT * FROM login WHERE username='$username' AND password='$password' ";  
    $query=mysqli_query($db,$sql);
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
    while($row=mysqli_fetch_assoc($query))  
    {  
    $dbusername=$row['username'];  
    $dbpassword=$row['password'];  
    }  
  
    if($username == $dbusername && $password == $dbpassword)  
    {  
    //session_start();  
    //$_SESSION['sess_user']=$username;  
  
    /* Redirect browser */  
    header("Location: admin.html");  
    }  
    } else {  
    echo "Invalid username or password!";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}
