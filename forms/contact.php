<?php

error_reporting(E_ALL ^ E_NOTICE ^ E_DEPRECATED ^ E_STRICT);

require_once "Mail.php";

$host = "smtp-relay.sendinblue.com";
$username = "shomee@Live.com";
$password = "majyUX08Vg9ZhF2E";
$port = "587";
$to = "seskirjeh@gmail.com";
$email_from = $_POST["email"];
$name = $_POST["name"];
$email_subject = $_POST["subject"];
$email_body = $_POST["message"];

$headers = array ('From' => $email_from, 'Name' => $name, 'To' => $to, 'Subject' => $email_subject);
$smtp = Mail::factory('smtp', array ('host' => $host, 'port' => $port, 'auth' => true, 'username' => $username, 'password' => $password));
$mail = $smtp->send($to, $headers, $email_body);


if (PEAR::isError($mail)) {
echo("<p>" . $mail->getMessage() . "</p>");
} else {
echo "OK";
}
?>