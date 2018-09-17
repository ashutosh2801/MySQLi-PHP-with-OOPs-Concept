<?php
require_once('Inc/Config.php');
require_once('Controller/DBController.php');
require_once('Model/User.php');
require_once('Inc/Functions.php');

$user_model = new User();
if(isset($_POST['login'])) {
	
	extract($_POST);
	
	$values = array('email'=>$email, 'password'=>md5($password), 'status'=>1);
	$result = $user_model->getByAttributes($values);
	
	if ($result) {
		$_SESSION['user_id'] = $result->ID;
		header('Location: Index.php');
		exit;
	} else {
			$_SESSION['msg'] = 'Invalid email or password!';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Login  :: <?php echo SITENAME; ?></title>
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
.danger { padding:5px; background:#F00; color:#fff; margin-bottom:10px; }
</style>
</head>
<body>
<div id="main_container">
  <h2>Login</h2>
  <?php 
  if(!empty($_SESSION['msg'])) { 
    echo '<div class="danger">'.$_SESSION['msg'].'</div>';
    $_SESSION['msg']='';
  }
  ?>
  <div class="login-form">
    <form action="Login.php" method="post">
      <input type="text" name="email" required="" placeholder="Email" oninvalid="setCustomValidity('Please enter email address!')" onchange="try{setCustomValidity('')}catch(e){}" onkeypress="validate(event)">
      <input type="password" name="password" required="" placeholder="******"  oninvalid="setCustomValidity('Please enter password!')" onchange="try{setCustomValidity('')}catch(e){}" onkeypress="validate(event)">
      <input type="submit" name="login" value="LOGIN">
    </form>
  </div>

  <h5><a href="Registration.php">Create an account?</a></h5>
</div>
<div class="developed">Developed By: <a target="_blank" href="<?php echo SITEURL; ?>">Advanced Code Finder</a></div>
<script>
function validate(evt) {
	var theEvent = evt || window.event;

	// Handle paste
	if (theEvent.type === 'paste') {
		key = event.clipboardData.getData('text/plain');
	} else {
		// Handle key press
		var key = theEvent.keyCode || theEvent.which;
		key = String.fromCharCode(key);
	}
	var regex = /[A-Za-z0-9!@#$&()-.]|\./;
	if( !regex.test(key) ) {
	theEvent.returnValue = false;
	if(theEvent.preventDefault) theEvent.preventDefault();
	}
}
</script>
</body>
</html>