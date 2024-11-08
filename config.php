<?php
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function configMailer() {
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; 
    $mail->SMTPAuth = true;
    $mail->Username = '@gmail.com'; // Tu email
    $mail->Password = ''; // Tu contraseña
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    return $mail;
}
?>
