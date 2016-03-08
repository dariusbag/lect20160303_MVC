<?php
session_start();
require_once 'ip_dbconnect.php';

// checking if session array has value, redirecting to home
if(isset($_SESSION['user']) != ""){
	header("Location: ip_home.php");
}

if(isset($_POST['btn-signup'])){
	$uname = mysqli_real_escape_string($link, $_POST['uname']);
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$upass = md5(mysqli_real_escape_string($link, $_POST['pass']));
	// trim spaces here
	
	// checking if email egsists
	// getting object
    $result = mysqli_query($link, "SELECT user_email FROM users WHERE user_email = '$email'");
	
	$count = mysqli_num_rows($result); //if $count == 1, email exists
	
	// if $count == 0, insert new line into database
	if($count != 0){
		echo 'Email allready exists, try another.';
	}else{
		if(mysqli_query($link, "INSERT INTO users (user_name, user_email, user_pass) VALUES ('$uname', '$email', '$upass')")){
			echo "User registered";
		}else{
			echo 'Could not register';
		}
	}
}

require_once 'templates/ip_template_register.php';
?>