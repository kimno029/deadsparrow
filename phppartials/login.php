<?php
//
require '../UserFactory.php';
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
			$_SESSION['is_logged_in'] = $password;
		}else{
			echo "<h2>Password errors</h2>";
		}
	}
}else{
	$username = $_SESSION['username'];
	$is_logged_in = $_SESSION['is_logged_in'];
	echo "<h1>User : $username logged in: $is_logged_in </h1>";
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
<form method="POST" href="#">
	<input name="handle" placeholder="username"> </input>
	<input name="password" type="password" placeholder="password"/>
	<button type="submit">Go!</button>
	<a href=".?logout=true">logout</a>
</form>
</div>