<?php

require_once "vendor/autoload.php";

$mail = new PHPMailer;

//Enable SMTP debugging.
$mail->SMTPDebug = 3;
//Set PHPMailer to use SMTP.
$mail->isSMTP();
//Set SMTP host name
$mail->Host = "smtp.gmail.com";
//Set this to true if SMTP host requires authentication to send email
$mail->SMTPAuth = true;
//Provide username and password
$mail->Username = "usuario@gmail.com";
$mail->Password = "password";
//If SMTP requires TLS encryption then set it
$mail->SMTPSecure = "tls";
//Set TCP port to connect to
$mail->Port = 587;

$mail->From = "suCorreo";
$mail->FromName = "suNombre";

$mail->addAddress("correoDestino", "NombreDestino");

$mail->isHTML(false);

$mail->Subject = "Nuevo mensaje del sitio web";
$mail->Body = "Nombre =" .$_POST["name"]. "\r\n".
              "Correo=".$_POST["email"]."\r\n".
              "Mensaje=" .$_POST["message"];

if(!$mail->send())
{
    //echo "Mailer Error: " . $mail->ErrorInfo;
}
else
{
    //echo "Message has been sent successfully";
}

header('Location: index.php');
