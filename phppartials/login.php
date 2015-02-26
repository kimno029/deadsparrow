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
</form>
</div>