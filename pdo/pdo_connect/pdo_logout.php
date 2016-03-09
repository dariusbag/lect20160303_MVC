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
	// header("Location: ../index.php");
	$connectPDO = null;
}
echo 'Session closed';
?>
<div id="toIndex">
	<a href="../control/pdo_index.php">To index</a>
</div>
