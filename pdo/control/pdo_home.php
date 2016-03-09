<?php
require_once '../pdo_connect/pdo_connect.php';
require_once '../view/pdo_view_home.php';

session_start();

if(!isset($_SESSION['user'])){
	header("Location: ../control/pdo_index.php");
}

// getting user name from db as object
$userName = $connectPDO->prepare("SELECT user_name FROM users WHERE user_id = ". $_SESSION['user']);
$userName->execute();
// converting object to two-dimensional array
$userName = $userName->fetchAll();
// retrieving one-dimensional array
$userName = $userName[0];
// getting value from array and making it a string
$userName = $userName['user_name'];
echo $userName;


?>
