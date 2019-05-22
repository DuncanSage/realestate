<head>
	<?php
	/* Sets title due to current PHP file name */

	$filename = basename($_SERVER['PHP_SELF'],'.php');

	if ($filename == "index") 
	{
		echo "<title>Allison Whaites - Home</title>";
	}
	else if ($filename == "teammember") 
	{
		echo '<title> About - ' .$row['fname']. ' ' .$row['lname']. '</title>';
	}
	else if ($filename == "details") 
	{
		echo '<title>About -' .$row['streetnumber'].' '.$row['streetname']. '</title>';
		echo "<link rel='stylesheet' href='css/animate.css'/><link rel='stylesheet' href='css/owl.carousel.css'/><link rel='stylesheet' href='css/magnific-popup.css'/>";
	}
	else 
	{
		echo '<title>Allison Whaites - ' .ucwords($filename). '</title>';
	}
		
?>

	<meta charset="UTF-8">
	<meta name="description" content="Allison Whaites Real Estate">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- Favicon -->   
	<link href="img/favicon.ico" rel="shortcut icon"/>

	<!-- Stylesheets -->
	<link rel="stylesheet" href="css/bootstrap.min.css"/>

	<!-- font awesome -->
	<!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous"> -->
	<!-- <script src="js/all.min.js"></script> -->

	<link rel="stylesheet" href="css/style.css"/>
	<link rel="stylesheet" href="css/mystyle.css"/>

	<!--[if lt IE 9]>
	  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->

</head>
