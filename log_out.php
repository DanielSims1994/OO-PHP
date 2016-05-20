<?php

$logOut = new session_finish();
$logOut->log_out();

class session_finish{

	public function log_out(){
		session_start();
		$_SESSION = array();
		session_destroy(); 
		header('Location: http://localhost/website_OO/index.php');
	}
}
?>