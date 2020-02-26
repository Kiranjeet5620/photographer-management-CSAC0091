<?php 

// Starting the session, necessary 
// for using session variables 
session_start(); 

// Declaring and hoisting the variables 
$username = ""; 
$email = ""; 
$errors = array(); 
$_SESSION['success'] = ""; 

// DBMS connection code -> hostname, 
// username, password, database name 
include("config.php");


// User login 
if (isset($_POST['login_user'])) { 
	
	// Data sanitization to prevent SQL injection 
	$username = mysqli_real_escape_string($db, $_POST['username']); 
	$password = mysqli_real_escape_string($db, $_POST['password']); 

	// Error message if the input field is left blank 
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	} 
	if (empty($password)) { 
		array_push($errors, "Password is required"); 
	} 

	// Checking for the errors 
	if (count($errors) == 0) { 
		
		// Password matching 
		$password = md5($password); 
		
		$query = "SELECT * FROM users WHERE username= 
				'$username' AND password='$password'"; 
		$results = mysqli_query($db, $query); 

		// $results = 1 means that one user with the 
		// entered username exists 
		if (mysqli_num_rows($results) == 1) { 
			
			// Storing username in session variable 
			$_SESSION['username'] = $username; 
			
			// Welcome message 
			$_SESSION['success'] = "You have logged in!"; 
			
			// Page on which the user is sent 
			// to after logging in 
			header('location: index.php'); 
		} 
		else { 
			
			// If the username and password doesn't match 
			array_push($errors, "Username or password incorrect"); 
		} 
	} 
} 

?> 
