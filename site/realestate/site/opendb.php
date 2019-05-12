<?php 
$dbhost = 'db730114064.db.1and1.com';    // name of MySQL server 
$dbuser = 'dbo730114064';
$dbpass = 'AdvancedWebSandPit2020';   
$dbname = 'db730114064';


$dbconn = new mysqli($dbhost, $dbuser, $dbpass , $dbname) ;


if (mysqli_connect_errno()) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	// echo "working";

session_start();
?>