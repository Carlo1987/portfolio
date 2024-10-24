<?php

require '../private.php';


$mail->isSMTP();
$mail->Host = $email['host'];
$mail->SMTPAuth = true;
$mail->Username = $email['username'];
$mail->Password = $email['password'];
/* $mail->SMTPSecure = 'ssl'; */
$mail->Port = $email['port'];
  

$mail_hostinger = "carlo87_dev@carloloidev.com";
$my_email = "carlo_loi87@yahoo.it";