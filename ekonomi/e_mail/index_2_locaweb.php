<?php

// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
require("phpmailer/class.phpmailer.php");

// Inicia a classe PHPMailer
$mail = new PHPMailer();


$mail->IsSMTP(); // Define que a mensagem ser� SMTP
//$mail->Host = "localhost"; // Endere�o do servidor SMTP (caso queira utilizar a autentica��o, utilize o host smtp.seudom�nio.com.br)
$mail->SMTPAuth = true; // Usar autentica��o SMTP (obrigat�rio para smtp.seudom�nio.com.br)
$mail->Username = 'andre-zzz@hotmail.com'; // Usu�rio do servidor SMTP (endere�o de email)
$mail->Password = 'torchwood42'; // Senha do servidor SMTP (senha do email usado)

// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->From = "seu@e-mail.com.br"; // Seu e-mail
$mail->Sender = "seu@e-mail.com.br"; // Seu e-mail
$mail->FromName = "Locaweb"; // Seu nome

// Define os destinat�rio(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->AddAddress('andre97luiz@gmail.com', 'Teste Locaweb');
$mail->AddAddress('e-mail@destino2.com.br');
//$mail->AddCC('ciclano@site.net', 'Ciclano'); // Copia
//$mail->AddBCC('fulano@dominio.com.br', 'Fulano da Silva'); // C�pia Oculta

$mail->Port         =   '587';
$mail->SMTPSecure   =   'tsl';
$mail->Host         =   'smtp.live.com';












// Define os dados t�cnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->IsHTML(true); // Define que o e-mail ser� enviado como HTML
//$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)

// Define a mensagem (Texto e Assunto)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
$mail->Subject  = "Mensagem Teste"; // Assunto da mensagem
$mail->Body = 'Este � o corpo da mensagem de teste, em HTML!
 <IMG src="http://seudom�nio.com.br/imagem.jpg" alt=":)"   class="wp-smiley"> ';
$mail->AltBody = 'Este � o corpo da mensagem de teste, em Texto Plano! \r\n
<IMG src="http://seudom�nio.com.br/imagem.jpg" alt=":)"  class="wp-smiley"> ';

// Define os anexos (opcional)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
//$mail->AddAttachment("/home/login/documento.pdf", "novo_nome.pdf");  // Insere um anexo

// Envia o e-mail
$enviado = $mail->Send();

// Limpa os destinat�rios e os anexos
$mail->ClearAllRecipients();
$mail->ClearAttachments();

// Exibe uma mensagem de resultado
if ($enviado) {
    echo "E-mail enviado com sucesso!";
} else {
    echo "N�o foi poss�vel enviar o e-mail.

";
    echo "Informa��es do erro:
" . $mail->ErrorInfo;
}

?>