<?php
//
require '../UserFactory.php';
if(session_status() == PHP_SESSION_NONE){
	session_start();
}
if($_POST['handle'] && $_POST['password']){
	$username = $_POST['handle'];
	$password = $_POST['password'];

	if(UserFactory::loginOk($username, $password)){
		echo "<h1>User : $username logged in</h1>";
	}else{
		echo "<h2>Password errors</h2>";
	}
}
?>

<form method="POST" href="#">
	<label>Username</label>
	<input name="handle" default="user"> </input>
	<label>Password</label>
	<input name="password" type="password" />
	<button type="submit">Go!</button>
</form>