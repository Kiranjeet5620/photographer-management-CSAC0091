<?php  
include("config.php");
if(isset($_POST["submit"])){  
  
if(!empty($_POST['username']) && !empty($_POST['password'])) {  
    $username=$_POST['username'];  
    $password=$_POST['password'];  

    $sql="SELECT * FROM user WHERE Email='$username' AND Password='$password'  ";  
    $query=mysqli_query($db,$sql);
    $numrows=mysqli_num_rows($query);  
    if($numrows!=0)  
    {  
        while($rows=mysqli_fetch_assoc($query))  
        {  
        $dbusername=$rows['Email'];  
        $dbpassword=$rows['Password']; 
        $access=$rows['AccessType'];
        }  
  
        if($username == $dbusername && $password == $dbpassword && $access=='1')  
        {  
        //session_start();  
        //$_SESSION['sess_user']=$username;  
    
        /* Redirect browser */  
        header("Location: admin.php");  
        }  
        elseif($username == $dbusername && $password == $dbpassword && $access=='3')  
        {  
        header("Location: regularuser.php");  
        } 
        elseif($username == $dbusername && $password == $dbpassword && $access=='2')  
        {  
        header("Location: elevated.php");  
        }   
    } 
    else {  
    echo "Invalid username or password!";  
    }  
  
} else {  
    echo "All fields are required!";  
}  
}
