<?php
// Include the PHPMailer library
require_once('../vendor/phpmailer/phpmailer/PHPMailerAutoload.php');

// Passing 'true' enables exceptions.  This is optional and defaults to false.
$mailer = new PHPMailer(true);

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];	

// Send a mail from Bilbo Baggins to Gandalf the Grey

// Set up to, from, and the message body.  The body doesn't have to be HTML; check the PHPMailer documentation for details.
$mailer->Sender = 'trucontacto@gmail.com';
$mailer->AddReplyTo('trucontacto@gmail.com', 'Tru Digital Media');
$mailer->SetFrom('trucontacto@gmail.com', 'True Digital Media');
$mailer->AddAddress('david.juanherrera@gmail.com');
// $mailer->AddAddress('hola@trudigitalmedia.co');
$mailer->Subject = 'Contacto Tru Digital Media ';
$mailer->MsgHTML('
	<p>Nombre: '.$nombre .'</p>
	<p>Email: '.$email .'</p>
	<p>Telefono: '.$telefono .'</p>
	<p>Mensaje: '.$mensaje .'</p>');

// Set up our connection information.
$mailer->IsSMTP();
$mailer->SMTPAuth = true;
$mailer->SMTPSecure = 'tls';
$mailer->Port = 587;
$mailer->Host = 'smtp.gmail.com';
$config = parse_ini_file(dirname(__FILE__) . '/../../mail.ini');
$mailer->SMTPDebug = 2; 
$mailer->Username = $config['username']."";
$mailer->Password = $config['password']."";
// echo $config['username']."";
// echo $config['password']."";
// // All done!
$mailer->Send();
// header("Location: ../index.php?message=true");
?>