<?php
	session_start();

	$_SESSION = array();
	session_destroy(); 
	
	header('Location: http://localhost/Site_2/index.php');
?>