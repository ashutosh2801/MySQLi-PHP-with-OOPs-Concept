<?php
function check_permission() {
	if(!isset($_SESSION['user_id'])) {
		header("Location: login.php");
		exit;
	}
}

function urlMap($name) {
	return $str = strtolower(preg_replace('/[^a-zA-Z0-9]+/', '-', $name));	
}
	
function check_login() {
	if(isset($_SESSION['user_id'])) {
		header("Location: index.php");
		exit;
	}
}

?>