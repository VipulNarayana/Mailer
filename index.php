<?php
// psr4 autoloading
require 'vendor/autoload.php';
// PHPMailer 
require 'vendor/PHPMailerAutoload.php';

$mailer=new PHPMailer;
// Enable SMTP
$mailer->IsSMTP();   
// Authentication enabled
$mailer->SMTPAuth = true;  

$mailer->SMTPSecure = 'tls'; 
$mailer->SMTPAutoTLS = false;
// Choose SMTP Host
$mailer->Host = 'smtp.gmail.com';
$mailer->Port = 587;
$mailer->Username	='yourusername';
$mailer->Password	='yourpassword';
$mailer->setFrom('youremail');
$mailer->isHTML(true);

// Referencing mailer.php using psr4 autoloading
$mail =new Project\Mail\Mailer($mailer);
// Passing to a function in Mailer.php
$mail->send('app/views/email/welcome.php',['name'=>'xyz'],function($m){
	$m->to('random@example.com');
	$m->subject('Welcome!');
});

