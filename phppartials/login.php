<!DOCTYPE html>
<html>
<head>
	<meta encoding="UTF-8" />
</head>
<body>
<?php
ini_set('display_errors', 'on');
//
require '../UserFactory.php';

if(isset($_GET['logout'])){
	if(strtolower($_GET['logout']) == "true"){
		session_destroy();
		$username = "";
		$is_logged_in = FALSE;

		echo "Session killed 11";
	}
	
}else{
	if(session_status() == PHP_SESSION_NONE){
		session_start();
	}
	if(!isset($_SESSION['username']) && !isset($_SESSION['is_logged_in'])){
		if(isset($_POST['handle']) && isset($_POST['password'])){
			$username = $_POST['handle'];
			$password = $_POST['password'];

			if(UserFactory::loginOk($username, $password)){
				echo "<h1>User : $username logged in</h1>";
				$_SESSION['username'] = $username;
				$_SESSION['is_logged_in'] = TRUE;
			}else{
				echo "<h2>Password errors</h2>";
			}
		}
	}else{
		$username = $_SESSION['username'];
		$is_logged_in = TRUE;
		echo "<h1>User : $username logged in: ".var_export($is_logged_in, true)." </h1>";
	}
}
?>
<style>
	input {
		width: 100px;
	}
	.thin-border{
		width: 300px;
		border: solid 1px black;
	}
</style>
<div class="thin-border">

<?php
	if (!isset($is_logged_in)){
		echo '<form method="POST" action="?login=true"> <input name="handle" placeholder="username"> </input> <input name="password" type="password" placeholder="password"/> <button type="submit" >Go!</button> </form>';
	}else{
		echo 'Logged in as ';
		echo $username;
		echo ' <a href="?logout=true">logout</a>';
	}

?>
</div>

</body>
</html>