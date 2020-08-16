<?php

require './PHPMailer/PHPMailerAutoload.php';
//$mail = new PHPMailer;

$email_address = "projectlooteratt01@gmail.com";
$email_pass = "AlphaGod123";
$contact_email = "contact@lucknowuniversity.com";

$mail = new PHPMailer(); // create a new object
$mail->IsSMTP(); // enable SMTP
$mail->SMTPDebug = 2; // debugging: 1 = errors and messages, 2 = messages only
$mail->SMTPAuth = true; // authentication enabled
$mail->SMTPSecure = 'tsl'; // secure transfer enabled REQUIRED for Gmail
$mail->Host = "smtp.gmail.com";
$mail->Port = 587;
$mail->IsHTML(true);
$mail->Username = $email_address;
$mail->Password = $email_pass;
$mail->SetFrom($email_address);
// $mail->AddReplyTo($contact_email, 'Lucknow University');
$mail->Subject = $_mail_subject;
$mail->Body = $_mail_body;
$mail->AddAddress($_mail_to);

 if(!$mail->Send()) {
    $email_status = "An Error Occured While Sending The Email!";
 } else {
    $mssg_status = "Email has been sent successfuly.";
 }
?>