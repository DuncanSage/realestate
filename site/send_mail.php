<?php

//------------------------------------------------------------------------------------

//Send mail page from Andrew Green Modifed by me(Duncan Sage) to work with sessions, content filltering and more email settings.

//------------------------------------------------------------------------------------

//session_start();

include "opendb.php";


/*
Email addresses the form will be submitted to taken from database as well as header information for the email.
*/
$query  = "SELECT * FROM `test`.`dsage_webdetails`";

$result = mysqli_query($dbconn, $query);
$row = mysqli_fetch_array($result);

$webmaster_email = $row['emailone'];

$headers[] = 'MIME-Version: 1.0';
$headers[] = 'Content-type: text/html; charset=iso-8859-1';
$headers[] = 'X-Mailer: PHP/' . phpversion();
$headers[] = 'From: Allison Whaites';
$headers[] = 'To: ' . $webmaster_email;

/*
Adds the list of emails to be CCed to the header. Emails are stored in the database contact table.
*/
$cc = array();

while($row = mysqli_fetch_array($result))
{
$cc[] = $row['emailtwo'];
}

$headers[] = 'Cc: ' .implode(",", $cc);

$headers[] .= 'Reply-To: '.$webmaster_email."\r\n";

//echo join(', ', $headers);

/*
Sets the URLs of the formpage the last page visited.
*/
$feedback_page = $_SERVER['HTTP_REFERER'];


/*
This next bit loads the form field data into variables and filters the content.
If you add a form field, you will need to add it here.
*/
function stringRe($var)
{
	$var = str_replace("'", "''", $var);
	$var = str_replace("<?php", "", $var);
	$var = str_replace("?>", "", $var);
	return $var;
}

$firstname = stringRe($_POST['fname']);
$lastname = stringRe($_POST['lname']);
$emailaddress = stringRe($_POST['email']);
$phonenumber = stringRe($_POST['pnumber']);
$message = stringRe($_POST['message']);
$honeypot = $_POST['firstname'];

echo $_POST['fname'];
echo "<br>";
echo $firstname;

date_default_timezone_set('Australia/Sydney');
$date = date('d-m-Y H:i:s');

$subject = "Contact Form Message";

$msg = 
"First Name: " . $firstname . "\r\n" . 
"Last Name: " . $lastname . "\r\n" .
"Email: " . $emailaddress . "\r\n" . 
"Phone number: " . $phonenumber . "\r\n" .
"Comments: " . $message ;


// If the user tries to access this script directly, redirect them to the feedback form,
if (!isset($_REQUEST['email'])) {
	header( "Location: $feedback_page" );
	// echo "no email";
}

// If the honeypot form field is not empty, redirect with error.
elseif (!empty($honeypot)) {
	$_SESSION['re'] = 'error';
	//echo "spam";
}

// If the form fields are empty, redirect with error.
elseif (empty($firstname) || empty($lastname) || empty($emailaddress) || empty($message)) {
	$_SESSION['re'] = 'error';
	//echo "forms empty";
}

// If we passed all previous tests, send the email and store feilds in database then redirect to the thank you page.
else {

	mail($webmaster_email, $subject, $msg, implode("\r\n", $headers));

	$sql = "INSERT INTO `db730114064`.`dsage_webcontact`( `fname`, `lname`, `email`, `phone`, `message`, `dateadded`)
	 VALUES " . "  ('$firstname', '$lastname', '$emailaddress', '$phonenumber', '$message', '$date')";


	if (mysqli_query($dbconn, $sql)) {
    //echo "New record created successfully";
	} else {
    //echo "Error: " . $sql . "<br>" . mysqli_error($dbconn);
	}

	$_SESSION['re'] = 'succss';
	//header( "Location: $feedback_page" );
	echo "thank you";
}

mysqli_close($dbconn);
?>