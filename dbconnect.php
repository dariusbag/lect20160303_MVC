<?php
///////////////////////////////////////////////////////
error_reporting(  E_ALL & ~E_DEPRECATED & ~ E_NOTICE );

// connecting to database old style
if(!mysql_connect("localhost", "root", "")){
	die('not connected --> ' .mysql_error());///////////////////
}

// checking if database exists
if(!mysql_select_db("darius")){
	die('selection problem--> ' .mysql_error());
}

?>