<?php
require 'himitsu/himitsu.php';
class UserFactory
{
	static public function loginOk($user_name, $given_pass){
		$con_string = Himitsu::getHimitsu();
		$db_con = pg_connect($con_string);
		pg_prepare($db_con, "check_password", "select password, salt FROM dsdb_user WHERE user_name = $1");


		$result = pg_execute($db_con, "check_password", array($user_name));
		$usr = pg_fetch_object($result);

		if($db_con){
			pg_close($db_con);
		}

		if($usr->password == crypt($given_pass, $usr->salt)){
			return TRUE;
		}else{
			return FALSE;
		}
	}

	static public function createUser($user_name, $usr_pass){
		$db_con = pg_connect($Himitsu::getHimitsu());
		if(!$db_con){
			echo "DB connection failed";
		}

		pg_prepare($db_con, "new_user", "insert into dsdb_user(user_name, password, salt) VALUES($1, $2, $3)");
		
		$salt = UserFactory::getNewSalt();
		
		$password = crypt($usr_pass, $salt);

		$results = pg_execute($db_con, "new_user", array($user_name, $password, $salt));

		if($db_con){
			pg_close($db_con);
		}

		if($results){
			return TRUE;
		}else{
			echo "Failed to execute query in createUser()";
		}
	}

	static private function getNewSalt(){
		return uniqid(mt_rand(), true);
	}

}

?>