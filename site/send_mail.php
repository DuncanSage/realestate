<?php


//------------------------------------------------------------------------------------

//Send mail page from Andrew Green Modifed by me(Duncan Sage) to work with sessions

//------------------------------------------------------------------------------------

session_start();

include "opendb.php";

	if (!$dbconn) {
    die("Connection failed: " . mysqli_connect_error());
	}

/*
Email addresses the form will be submitted to taken from database.
*/

$query  = "SELECT * FROM `db730114064`.`dsage_webdetails`";

$result = mysqli_query($dbconn, $query);
$row = mysqli_fetch_array($result);

$webmaster_email = $row['emailone'];

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'X-Mailer: PHP/' . phpversion();
//$headers[] = 'From: Allison Whaites';
$headers[] = 'To:' . $webmaster_email;

$cc = array();

while($row = mysqli_fetch_array($result))
{
$cc[] = $row['emailtwo'];
}

$headers[] = 'Cc:' .implode(",", $cc);

//$headers .= 'Bcc: bronte.wake@tafensw.edu.au' . "\r\n";
//$headers .= 'Reply-To: '.$webmaster_email."\r\n" .


//echo implode("\r\n", $headers);

/*
This bit sets the URLs of the supporting pages.
If you change the names of any of the pages, you will need to change the values here.
*/
//$feedback_page = "feedback_form.html";

$feedback_page = $_SERVER['HTTP_REFERER'];


//$error_page = "contact.php?re=error";
//$thankyou_page = "contact.php?re=succss";

/*
This next bit loads the form field data into variables.
If you add a form field, you will need to add it here.
*/
$firstname = $_POST['fname'];
$lastname = $_POST['lname'];
$emailaddress = $_POST['email'];
$phonenumber = $_POST['pnumber'];
$message = $_POST['message'];
$honeypot = $_POST['firstname'];

date_default_timezone_set('Australia/Sydney');
$date = date('d-m-Y H:i:s');

$subject = "Contact Form Message";

$msg = 
"First Name: " . $firstname . "\r\n" . 
"Last Name: " . $lastname . "\r\n" .
"Email: " . $emailaddress . "\r\n" . 
"Phone number: " . $phonenumber . "\r\n" .
"Comments: " . $message ;
/*
Filter message content
*/
$message = str_replace("'", "''", $_REQUEST['message']);

/*
The following function checks for email injection.
Specifically, it checks for carriage returns - typically used by spammers to inject a CC list.
*/
function isInjected($str) {
	$injections = array('(\n+)',
	'(\r+)',
	'(\t+)',
	'(%0A+)',
	'(%0D+)',
	'(%08+)',
	'(%09+)'
	);
	$inject = join('|', $injections);
	$inject = "/$inject/i";
	if(preg_match($inject,$str)) {
		return true;
	}
	else {
		return false;
	}
}

// If the user tries to access this script directly, redirect them to the feedback form,
if (!isset($_REQUEST['email'])) {
	header( "Location: $feedback_page" );
	// echo "no email";
}

// If the form fields are empty, redirect to the error page.
elseif (!empty($honeypot)) {
	$_SESSION['re'] = 'error';
	header( "Location: $feedback_page" );
	//header( "Location: $error_page" );
	// echo "spam";
}

// If the form fields are empty, redirect to the error page.
elseif (empty($firstname) || empty($lastname) || empty($emailaddress) || empty($message)) {
	$_SESSION['re'] = 'error';
	header( "Location: $feedback_page" );
	//header( "Location: $error_page" );
	//echo "forms empty";
}

/* 
If email injection is detected, redirect to the error page.
If you add a form field, you should add it here.
*/
elseif ( isInjected($emailaddress) || isInjected($firstname) || isInjected($phonenumber) || isInjected($lastname)) {
 	$_SESSION['re'] = 'error';
 	header( "Location: $feedback_page" );
 	//header( "Location: $error_page" );
	//echo "tried to inject";
}

// If we passed all previous tests, send the email then redirect to the thank you page.
else {

	mail($webmaster_email, $subject, $msg, implode("\r\n", $headers));

	$sql = "INSERT INTO `db730114064`.`dsage_webcontact`( `fname`, `lname`, `email`, `phone`, `message`, `dateadded`) VALUES " .
		"  ('$firstname', '$lastname', '$emailaddress', '$phonenumber', '$message', '$date')";

	if (mysqli_query($dbconn, $sql)) {
    //echo "New record created successfully";
	} else {
    //echo "Error: " . $sql . "<br>" . mysqli_error($dbconn);
	}

	$_SESSION['re'] = 'succss';
	header( "Location: $feedback_page" );

	//header( "Location: $thankyou_page" );
	// echo "thank you";
}

mysqli_close($dbconn);
?>