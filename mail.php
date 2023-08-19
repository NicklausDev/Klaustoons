<?php 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';

function send_mail($recipient, $subject, $message){

    $mail = new PHPMailer();
    $mail->isSMTP();

    $mail->SMTPDebug    = 0;
    $mail->SMTPAuth     = TRUE;
    $mail->SMTPSecure   = "tls";
    $mail->Port         = 587;
    $mail->Host         = "mail.klaustoons.co.ke";
    $mail->Username     = "info@klaustoons.co.ke" ;
    $mail->Password     = "Klaustoons@2023##";  

    $mail->isHTML(true);
    $mail->addAddress($recipient, "Hello Stranger");
    $mail->setFrom("nicklauswandera@gmail.com", "Klaustoons");
    $mail->Subject = $subject;
    $content = $message;

    $mail->msgHTML($content);
    
    if (!$mail->Send()) {
        echo "Error While Sending Email. Try Again";
        return false;
    } else {
        echo "Success";
        return true;
    }
}



?>