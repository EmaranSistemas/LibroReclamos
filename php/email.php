<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require 'vendor/autoload.php';

//Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

//echo "init cofig";

try {
    $mail->isSMTP();
    $mail->Host = 'mail.emaransac.com';
    $mail->SMTPAuth = true;
    $mail->Username = "admin@emaransac.com";
    $mail->Password = 'Aji.30111918';
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;


    $mail->setFrom('sistemas@emaransac.com', 'Tu Nombre');
    //$mail->addAddress('sistemas@emaransac.com', 'Destinatario');
    $mail->addAddress('sistemas.emaransac@gmail.com', 'Destinatario');

    $mail->isHTML(true);                                  //Set email format to HTML
    $mail->Subject = 'Here is the subject';
    $mail->Body    = 'This is the HTML message body <b>in bold!</b>';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    $mail->send();
    echo 'Message has been sent';
} catch (Exception $e) {
    echo 'Message could not be sent!!!';
}
