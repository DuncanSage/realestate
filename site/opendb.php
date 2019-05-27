<?php 
if (strpos($_SERVER['HTTP_HOST'], 'lhost') >0){
//echo '<p>localhost database......</p>';
$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "test";

}else if (strpos($_SERVER['HTTP_HOST'], 'it.info') >0){
//echo '<p>cvit........</p>';
$dbhost = '';	// name of MySQL server 
$dbuser = '';	// your database username
$dbpass = '';   // your database password
$dbname = '';	// your database name

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
