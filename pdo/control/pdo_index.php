<?php
require_once '../pdo_connect/pdo_connect.php';
require_once '../view/pdo_view_index.php';

session_start();

if(isset($_SESSION['user'])){
	header("Location: ../control/pdo_home.php");
}

// checking if form submitted
if(isset($_POST['btn-login'])){
	// getting email and password from form
	$email =  $_POST['email']; //mysql_real_escape_string($_POST['email']);
	$upass = md5($_POST['pass']); //mysql_real_escape_string($_POST['pass']);
	// trim spaces here
	
	// getting user name from db as object
	$userData = $connectPDO->prepare("SELECT user_id, user_name, user_pass FROM users WHERE user_email = '$email'");
	$userData->execute();

	// converting object to two-dimensional array
	$userData = $userData->fetchAll();
	
	if(empty($userData)){
		echo 'Set the data';
	}else{
		if($upass != $userData[0]['user_pass']){
			echo 'Wrong username or password <br />';
		}else{
			// retrieving one-dimensional array
			$userData = $userData[0];
			$_SESSION['user'] = $userData['user_id'];

			header("Location: ../control/pdo_home.php");
		}
	}

	
}
?>