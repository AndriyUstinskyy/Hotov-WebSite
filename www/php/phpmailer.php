<?php

$email = trim($_POST['email']);
$name =trim($_POST['name']);
$message = idn_to_utf8(trim($_POST['message']));
$tel = trim($_POST["phone"]);

$from = ''.$name.'';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'phpmailer/Exception.php';
require 'phpmailer/PHPMailer.php';
require 'phpmailer/SMTP.php';
$mail = new PHPMailer(true);


//Server settings
$mail->SMTPDebug = 0;
$mail->isSMTP();
$mail->Host       = 'smtp.gmail.com';
$mail->SMTPAuth   = true;
$mail->Username   = '';
$mail->Password   = '';
$mail->SMTPSecure = 'ssl';
$mail->Port       = 465;

//Recipients
$mail->setFrom($email, 'WebSite');
$mail->addAddress('', 'Hotov guest');
$mail->addAddress('', 'Hotov guest');
// Content
$mail->isHTML(true);
$mail->Subject = 'hotov';
$mail->Body    = $message . '<hr/>' . $tel . ' - ' . $name . '<hr/>' . $email;

$mail->send();