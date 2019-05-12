<?php 
if (strpos($_SERVER['HTTP_HOST'], 'lhost') >0){
//echo '<p>localhost database......</p>';
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "test";

}else if (strpos($_SERVER['HTTP_HOST'], 'it.info') >0){
//echo '<p>cvit........</p>';
$dbhost = 'db730114064.db.1and1.com';    // name of MySQL server 
$dbuser = 'dbo730114064';
$dbpass = 'AdvancedWebSandPit2020';   
$dbname = 'db730114064';

}

// Create connection
$dbconn = new mysqli($dbhost, $dbuser, $dbpass , $dbname) ;
// Check connection
if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
}else{
	//echo 'a okay';
}

session_start();
?>
