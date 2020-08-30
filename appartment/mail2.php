<?php
$servername = "localhost";
$username = "root";
$password = "ase";

// Create connection
$connect = new mysqli($servername, $username, $password,"ams");

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 
//echo "Connected successfully";

//date_default_timezone_set('Etc/UTC');
require 'PHPMailer/PHPMailerAutoload.php';
//Create a new PHPMailer instance
$mail = new PHPMailer;
//Tell PHPMailer to use SMTP
$mail->isSMTP();
//Enable SMTP debugging
// 0 = off (for production use)
// 1 = client messages
// 2 = client and server messages
$mail->SMTPDebug = 0;
//Ask for HTML-friendly debug output
//$mail->Debugoutput = 'html';
//Set the hostname of the mail server
$mail->Host = 'smtp.gmail.com';
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->SMTPAuth = true;
$mail->Username = "amsdonotreply1@gmail.com";
$mail->Password = "Nutter@Tools";
$mail->setFrom('amsdonotreply1@gmail.com', 'AMS');
$mail->addReplyTo('amsdonotreply1@gmail.com', 'AMS');
$mail->addAddress('asehitesh@gmail.com', '');
$mail->Subject = 'Password';
$mail->msgHTML('Click Here');

if (!$mail->send()) {
    echo "Mailer Error: " . $mail->ErrorInfo;
} else {
    echo "Message sent!";
   
}

?>
