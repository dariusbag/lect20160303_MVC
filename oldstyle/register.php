<?php
echo 'Register test <br />';
// starting session
session_start();
echo 'Session: ', var_dump($_SESSION);

// connecting to database
include_once 'dbconnect.php';

// checking if session array has value, redirecting to home
if(isset($_SESSION['user']) != ""){
	header("Location: home.php");
}
// checking if form submitted
var_dump($_POST);
if(isset($_POST['btn-signup'])){
	// getting email and password from form
	$uname = $_POST['uname']; //mysql_real_escape_string($_POST['uname']);
	$email = $_POST['email']; //mysql_real_escape_string($_POST['email']);
	// md5();
	$upass = $_POST['pass']; //mysql_real_escape_string($_POST['pass']);
	// trim spaces here
	
	// checking if email exists
	$query = "SELECT user_email FROM users WHERE user_email='$email'";
	$result = mysql_query($query);
	
	$count = mysql_num_rows($result);
	// if $count == 0, then insert new line into database
	if ($count != 0){
		echo 'E-mail address allready exists';
	}else{
		if(mysql_query("INSERT INTO users(user_name, user_email, user_pass) VALUES('$uname', '$email', '$upass')")){
			echo 'Registered user: '. $uname .', email: '. $email;
		}else{
			echo 'Could not register';
		}
	}
}
// if $_SESSION and $_POST are empty return to form
include_once 'template_register.php';
?>