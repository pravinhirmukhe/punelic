<?php

ob_start();
/*
  PLEASE READ CAREFULLY AND CHANGE VARIABLE BELOW.

  DISCLAIMER: THIS SCRIPT IS OFFERED AS IT IS WITHOUT ANY SUPPORT. USE OF SCRIPT IS SOLELY AT THE RISK OF USER.
 */
include './config.php';
$q = mysql_query("select * from agent_tbl where Id='" . $_GET['id'] . "'");
while ($r9 = mysql_fetch_array($q)) {
    $em = $r9['Email'];
}
$smtp_user = "test@i-mates.in";  // User name of smtp
$smtp_pass = "testtest";  // Password of smtp user

$to_address = $em; // Set an email address where you wish to send all inform filled in form
$from_address = "test@i-mates.in";  // Set an email address from where the mail is coming to receiver
// PLEASE DO NOT CHANGE ANYTHING BELOW THIS LINE IF YOU ARE NOT SURE WHAT YOU ARE DOING

require "email-3.php";

$message = "Name: " . $_POST["txtName"] . "<br/> Email: " . $_POST["txtEmail"] . "<br/> Conatct No.: " . $_POST["txtContact"] . "<br/> Message: " . $_POST["txtArea"];

$mail = new EMail;
$mail->Username = $smtp_user;
$mail->Password = $smtp_pass;

$mail->SetFrom($from_address, "Contact Form");  // Name is optional
// $mail->AddTo("self@mydomain.com","Self");	// Name is optional
$mail->AddTo($to_address);
$mail->Subject = "Form Filled Details";
$mail->Message = $message;

//Optional stuff
// $mail->AddCc("someother3@address.com","name 3"); 	// Set a CC if needed, name optional
$mail->ContentType = "text/html";          // Defaults to "text/plain; charset=iso-8859-1"
$mail->Headers['X-SomeHeader'] = 'abcde';  // Set some extra headers if required
$mail->ConnectTimeout = 30;  // Socket connect timeout (sec)
$mail->ResponseTimeout = 8;  // CMD response timeout (sec)

$success = $mail->Send();

// echo $success;
if ($success == "1") {
    header("Location: thank-you.php");
} else {
    echo "There was an error sending mail.";
}
?>


