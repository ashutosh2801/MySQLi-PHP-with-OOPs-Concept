<?php
require_once('Inc/Config.php');
require_once('Controller/DBController.php');
require_once('Model/User.php');
require_once('Inc/Functions.php');
check_permission();

$model = new User();
if ((int)$_SESSION['user_id']) {
	$result = $model->getById($_SESSION['user_id']);
} else {
	$msg = 'Invalid ID!';
	header('Location: error.php?msg='.$msg);
	exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Registration  :: <?php echo SITENAME; ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="" />
<style>
body{ font-family:Arial, Helvetica, sans-serif; font-size:13px; }
a { color:#000; } 
#main_container { margin:50px auto; width:400px; background:#f5f5f5; padding:15px; }
#main_container h2 { text-align:center }
#main_container .login-form input[type=text],
#main_container .login-form input[type=password] { padding:5px; background:#fff; display:block; width:96%; border:1px solid #666; margin-bottom:15px; }
#main_container .login-form input[type=submit] { padding:5px; background:#ccc; border:1px solid #666; }
.developed {font-size:13px; color:#666; position:fixed; bottom:20px; }
</style>
</head>
<body>
<div id="main_container">
  <h2>Dashboard</h2>
  
  <div class="login-form">
    Welcome <strong><?php echo $result->Name; ?></strong> | <a href="Logout.php">Logout</a>
  </div>
</div>
<div class="developed">Developed By: <a target="_blank" href="<?php echo SITEURL; ?>">Advanced Code Finder</a></div>
</body>
</html>