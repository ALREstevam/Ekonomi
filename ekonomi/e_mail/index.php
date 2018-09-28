<?php

//É PRECISO ATIVAR O OPENSSL NO PHP.INI


require_once ("phpmailer/class.phpmailer.php");
include ("phpmailer/class.smtp.php");





$mail = new PHPMailer();
$mail->isSMTP();
$mail->SMTPAuth = true;
//$mail->setLanguage('pt');


$from = 'andre-zzz@hotmail.com';
$fromName = 'Ekonomi';

$host       = 'smtp.live.com';
$username   = 'andre-zzz@hotmail.com';
$password   = 'torchwood42';
$port       = 587;
$secure     = 'tls';


$mail->Host         =   $host;
$mail->SMTPAuth     =   true;
$mail->Username     =   $username;
$mail->Password     =   $password;
$mail->Port         =   $port;
$mail->SMTPSecure   =   $secure;






$mail->From = $from;
$mail->FromName = $fromName;
$mail->addReplyTo($from, $fromName);

$mail->addAddress('andre97luiz@gmail.com','André Luiz');

$mail->isHTML(true);
$mail->CharSet = 'utf-8';
$mail->WordWrap = 70;


$mail->Subject = 'Redefinição de senha do Ekonomi';

$mail->Body = 'eita <b>eita</b> eita';
$mail->AltBody = 'eita eita eita';


$send = $mail->Send();

if($send){
    echo'E-mail enviado com sucesso!';
}
else{
    echo'Erro : '.$mail->ErrorInfo;
}

?>