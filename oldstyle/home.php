<?php
echo 'Home test <br />';
// starting session
session_start();
echo 'Session: ', var_dump($_SESSION);

// connecting to database
include_once 'dbconnect.php';

// checking if session array is not set, redirecting to index
if(!isset($_SESSION['user'])){
	header("Location: index.php");
}

$res = mysql_query("SELECT * FROM users WHERE user_id = ". $_SESSION['user']);
$userRow = mysql_fetch_array($res);
var_dump($userRow);

// fetch all



include_once 'template_home.php';
?>
