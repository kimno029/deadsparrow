<?php
$db_con = pg_connect("host=localhost port=5432 dbname=deadsparrow user=dsdb password=TinTin99");

// $results = pg_query($db_con, "SELECT * FROM countries");
$results = pg_prepare($db_con, "apa", "SELECT * FROM countries WHERE id < $1");
$results = pg_execute($db_con, "apa", array("4"));
$num_rows = pg_num_rows($results);
for($i =0; $i < 5; $i++){
	$array = pg_fetch_object($results);
	if($array){
		$json = json_encode($array);
		echo "$json <br>";
		// foreach ($array as $key => $value) {
		// 	echo "$key : $value <br>";
		// }
	}
}

pg_close($db_con);
?>