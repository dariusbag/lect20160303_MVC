<?php
session_start();
require_once 'ip_dbconnect.php';

if(!isset($_SESSION['user'])){
    header("Location: ip_index.php");
}

// getting object
$res = mysqli_query($link, "SELECT user_name FROM users WHERE user_id=". $_SESSION['user']);

// getting associative array
$userRow = mysqli_fetch_assoc($res);
// var_dump($userRow);

require_once 'templates/ip_template_home.php';
echo "Home page, session started, do what you want <br />";
?>
