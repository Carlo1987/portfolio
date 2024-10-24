<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

$mail = new PHPMailer(true);

require '../header.php';

$data = json_decode($json);
$error = [ "status" => false , "message"=>"Error sending the email"];

 
if(!empty($json)){
 
    try{

    require 'structure_email.php';

    $email_object = $data->object;
    $email_from = $data->email;
    $message = $data->message;
    
    $mail->setFrom($mail_hostinger, 'Email lavoro');

    $mail->addAddress($my_email);  

    $mail->isHTML(true); 

    $mail->Subject = "Email ricevuta da $email_object";   

    $mail->AltBody = 'testo email non supportato';

  
    $mail->Body = "
    <h4 style='padding-top:10px;'> Email ricevuta da: $email_from </h4>
    <hr>
    <h4> Testo messaggio: </h4>
    <p> $message </p>";

    $mail->send(); 

    $result = [ "status" => true , "message"=>"send" ];
   
   }catch(Exception $e){
     $result = "$error: $e";
   }  
 

}else{
    $result = $error;
}   

echo json_encode($result); 