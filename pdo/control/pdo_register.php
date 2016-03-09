<?php
require_once '../pdo_connect/pdo_connect.php';
session_start();

if(isset($_SESSION['user'])){
    // echo 'You are connected, go to <a href="../control/pdo_home.php">Home</a>';
	header("Location: ../control/pdo_home.php");
}

// checking if form submitted
if(!isset($_POST['btn-signup'])){
        echo 'Enter data';
    }else{
	// getting email and password from form
	$uname =  $_POST['uname'];
	$email =  $_POST['email'];
	$upass = md5($_POST['pass']);
	// trim spaces here
   
    // checking if email exsists
    // getting user name from db as object
	$userData = $connectPDO->prepare("SELECT user_email FROM users WHERE user_email='$email'");
	$userData->execute();

	// converting object to two-dimensional array
	$userData = $userData->fetchAll();
    
    if(!empty($userData)){
        echo 'Email allready exists';
    }else{
        $insertData = $connectPDO->prepare("INSERT INTO users (user_name, user_email, user_pass) VALUES (?, ?, ?)");
        $insertData->execute(array($uname, $email, $upass));
    }
}

require_once '../view/pdo_view_register.php';
?>