<?php
/*
PLEASE READ CAREFULLY AND CHANGE VARIABLE BELOW.

DISCLAIMER: THIS SCRIPT IS OFFERED AS IT IS WITHOUT ANY SUPPORT. USE OF SCRIPT IS SOLELY AT THE RISK OF USER.
*/

$smtp_user = "test@i-mates.in";		// User name of smtp
$smtp_pass = "testtest";		// Password of smtp user

$to_address = "info@i-mates.in"; // Set an email address where you wish to send all inform filled in form
$from_address = "test@i-mates.in";	// Set an email address from where the mail is coming to receiver


// PLEASE DO NOT CHANGE ANYTHING BELOW THIS LINE IF YOU ARE NOT SURE WHAT YOU ARE DOING

require "email-2.php";

$message = "Name: ".$_POST["name"]."<br/> Address: ".$_POST["address"]."<br/> Email: ".$_POST["email"]. "<br/> Contact No.: ".$_POST["conatct_no"]."<br/> Education Qualification: ".$_POST["education"]."<br/> Present Occupation: ".$_POST["education-2"]."<br/> Message: ".$_POST["message"];

$mail = new EMail;
$mail->Username = $smtp_user;
$mail->Password = $smtp_pass;

$mail->SetFrom($from_address,"Contact Form");		// Name is optional
// $mail->AddTo("self@mydomain.com","Self");	// Name is optional
$mail->AddTo($to_address);
$mail->Subject = "Form Filled Details";
$mail->Message = $message;

//Optional stuff
// $mail->AddCc("someother3@address.com","name 3"); 	// Set a CC if needed, name optional
$mail->ContentType = "text/html";        		// Defaults to "text/plain; charset=iso-8859-1"
$mail->Headers['X-SomeHeader'] = 'abcde';		// Set some extra headers if required
$mail->ConnectTimeout = 30;		// Socket connect timeout (sec)
$mail->ResponseTimeout = 8;		// CMD response timeout (sec)

$success = $mail->Send();

// echo $success;
if ($success == "1") {header("Location: thank-you.php");} else {echo "There was an error sending mail.";}

?>
