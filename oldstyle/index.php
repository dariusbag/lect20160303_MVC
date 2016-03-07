<?php
echo 'Index test <br />';
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
if(isset($_POST['btn-login'])){
	// getting email and password from form
	$email = $_POST['email']; //mysql_real_escape_string($_POST['email']);
	$upass = $_POST['pass']; //mysql_real_escape_string($_POST['pass']);
	// trim spaces here
	
	$res = mysql_query("SELECT user_id, user_name, user_pass FROM users WHERE user_email = '$email'");
	$row = mysql_fetch_array($res);
	var_dump($row);
	$count = mysql_num_rows($res); //should be 1
	var_dump($count);
	
	if($count == 1 && $row['user_pass'] == $upass){
		$_SESSION['user'] = $row['user_id'];
		header("Location: home.php");
	}else{
		echo 'Wrong username/password';
	}
}

// if $_SESSION and $_POST are empty return to form
include_once 'template_index.php';
?>