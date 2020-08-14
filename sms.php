<?php
$to = "ppranjalmishra@gmail.com";
$subject = "Hello World";
$message = "Please verify your email address.";
$headers = "From: 14sarthi@gmail.com";

if(mail($to, $subject, $message, $headers)){
    echo "Email sent!";
}else{
    echo "Email failed!";
}
?>