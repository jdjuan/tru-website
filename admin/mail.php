<?php
// Include the PHPMailer library
require_once('../../vendor/phpmailer/phpmailer/PHPMailerAutoload.php');

// Passing 'true' enables exceptions.  This is optional and defaults to false.
$mailer = new PHPMailer(true);

$nombre = $_POST["nombre"];
$email = $_POST["email"];
$telefono = $_POST["telefono"];
$mensaje = $_POST["mensaje"];	

// Send a mail from Bilbo Baggins to Gandalf the Grey

// Set up to, from, and the message body.  The body doesn't have to be HTML; check the PHPMailer documentation for details.
$mailer->Sender = 'comercial.urbangreen@gmail.com';
$mailer->AddReplyTo('comercial.urbangreen@gmail.com', 'Web Urban Green');
$mailer->SetFrom('comercial.urbangreen@gmail.com', 'Web Urban Green');
$mailer->AddAddress('comercial.urbangreen@gmail.com');
$mailer->Subject = 'Contacto Web Urban Green ';
$mailer->MsgHTML('
	<p>Nombre: '.$nombre .'</p>
	<p>Email: '.$email .'</p>
	<p>Telefono: '.$telefono .'</p>
	<p>Mensaje: '.$mensaje .'</p>');

// Set up our connection information.
$mailer->IsSMTP();
$mailer->SMTPAuth = true;
$mailer->SMTPSecure = 'ssl';
$mailer->Port = 465;
$mailer->Host = 'smtp.gmail.com';
$config = parse_ini_file(dirname(__FILE__) . '/../../../mail.ini');
// $mailer->Username = "david.juanherrera@gmail.com";
// $mailer->Password = "oyihdcpyjoezevwt";
$mailer->Username = $config['username']."";
$mailer->Password = $config['password']."";

// // All done!
$mailer->Send();
header("Location: ../index.php?message=true");
?>