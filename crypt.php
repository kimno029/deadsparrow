<?php
echo "<h1>Crypt github</h1>";
// var_dump(mcrypt_create_iv(22, MCRYPT_DEV_RANDOM));

function getNewSalt(){
	return uniqid(mt_rand(), true);
}

// NEW USER
/*
$db_con = pg_connect("host=localhost port=5432 user=postgres dbname=deadsparrow password=bombom");
if(!$db_con){
	echo "DB connection failed";
}else{
	echo "<h2> Connection true </h2>";
	pg_prepare($db_con, "new_user", "insert into dsdb_user(user_name, password, salt) VALUES($1, $2, $3)");
	$user_name = "angus";
	$salt = getNewSalt();
	$usr_pass = "katt";
	$password = crypt($usr_pass, $salt);

	$results = pg_execute($db_con, "new_user", array($user_name, $password, $salt));

	echo "$results <br />";

	if($results){
		var_dump($results);
	}else{
		echo "Failed to execute query";
	}
}*/

require 'UserFactory.php';
$user_name = 'angus';
$given_pass = 'katt';

if(UserFactory::loginOk($user_name, $given_pass)){
	echo "Login ok";
}else{
	echo "Login failed";
}



// pg_prepare($db_con, "check_password", "select password, salt FROM dsdb_user WHERE user_name = $1");
// $user_name = 'angus';
// $given_pass = 'katt';

// $result = pg_execute($db_con, "check_password", array($user_name));

// $usr = pg_fetch_object($result);

// if($usr->password == crypt($given_pass, $usr->salt)){
// 	echo("<h2> Login OK </h2>");
// }else{
// 	echo("FFAILEdDD");
// }

// if($db_con){
// 	pg_close($db_con);
// }


// $options = [
// 	'cost' => 11,
// 	// 'salt' => mcrypt_create_iv(22, MCRYPT_DEV_RANDOM),
// ];


// echo(password_hash('123456', PASSWORD_BCRYPT, $options))."<br />";
// echo(password_hash('123456', PASSWORD_BCRYPT, $options))."<br />";
// echo(password_hash('123456', PASSWORD_BCRYPT, $options))."<br />";

// echo "<h2>crypt()</h2>";

// $salt = getSalt();
// echo(crypt('123456',$salt))."<br />";
// echo(crypt('123456',$salt))."<br />";
// echo(crypt('123456',$salt))."<br />";

?>