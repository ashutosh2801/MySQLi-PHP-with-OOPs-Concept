<?php
require_once('Inc/Config.php');
require_once('Controller/DBController.php');
require_once('Model/User.php');
require_once('Inc/Functions.php');
check_permission();
session_destroy();
unset($_SESSION);
header('Location: Login.php');
exit;
?>