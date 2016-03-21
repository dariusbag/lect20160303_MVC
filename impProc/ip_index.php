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
    
    // getting object
    $result = mysqli_query($link, "SELECT user_id, user_pass FROM users WHERE user_email = '$email' AND user_pass = '$upass'");

    if(mysqli_num_rows($result) == 1) {
        // getting array
        $row = mysqli_fetch_assoc($result); //mysql_fetch_array
        $_SESSION['user'] = $row['user_id'];
        header("Location: ip_home.php");
    } else {
        echo 'Wrong username/password ';
    }
    
}

require_once 'templates/ip_template_index.php';
?>
