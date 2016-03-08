<?php
session_start();

// if(!isset($_SESSION['user'])){
	// header("Location: ip_index.php");
// }

// if(isset($_SESSION['user']) != ""){
	// header("Location: ip_home.php");
// }

if(isset ($_GET['logout'])){
	session_destroy();
	unset($_SESSION['user']);
    mysqli_close($link); // ?????????????????????
	header("Location: ip_index.php");
}


?>