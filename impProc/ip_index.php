<?php
session_start();
require_once 'ip_dbconnect.php';

if(isset($_SESSION['user']) != ""){
    header("Location: ip_home.php");
}

// checking if form submitted
if(isset($_POST['btn-login'])){
	// getting email and password from form
	$email = mysqli_real_escape_string($link, $_POST['email']);
	$upass = md5(mysqli_real_escape_string($link, $_POST['pass']));
	// trim spaces here

    echo $email .'<br />';
    echo $upass .'<br />';
    
    // getting object
    $result = mysqli_query($link,"SELECT user_id, user_name, user_pass FROM users WHERE user_email = '$email'");    
    // var_dump($result);
    
    // getting array
    $row = mysqli_fetch_assoc($result); //mysql_fetch_array
	var_dump($row);
    
    $count = mysqli_num_rows($result); //should be 1
	var_dump($count);
    
    	if($count == 1 && $row['user_pass'] == $upass){
		$_SESSION['user'] = $row['user_id'];
		header("Location: ip_home.php");
	}else{
		echo 'Wrong username/password ';
	}
}

require_once 'templates/ip_template_index.php';
?>