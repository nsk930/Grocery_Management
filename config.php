
<?php 

$dbs['db_host'] = "localhost";

$dbs['db_user'] = "root";

$dbs['db_pass'] = "";

$dbs['db_name'] = "grocery_mart";



foreach($dbs as $key => $value){

	

	define(strtoupper($key), $value);

	

}



$db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);



?>

