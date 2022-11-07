<?php
// Mostrar errores PHP (Desactivar en producción)
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir la libreria PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\SMTP;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

// Inicio
$mail = new PHPMailer(true);

try {
    // Configuracion SMTP
    $mail->SMTPDebug = SMTP::DEBUG_SERVER;                         // Mostrar salida (Desactivar en producción)
    $mail->isSMTP();                                               // Activar envio SMTP
    $mail->Host  = 'CONFIGURAR_SERVIDOR_SMTP';                     // Servidor SMTP
    $mail->SMTPAuth  = true;                                       // Identificacion SMTP
    $mail->Username  = 'CONFIGURAR_USUARIO_SMTP';                  // Usuario SMTP
    $mail->Password  = 'CONFIGURAR_CONTRASEÑA_SMTP';	          // Contraseña SMTP
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port  = 587;
    $mail->setFrom('hola@prueba.com', 'Tu nombre');                // Remitente del correo

    // Destinatarios
    $mail->addAddress('prueba@midominio.com', 'Nombre del destinario');  // Email y nombre del destinatario

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Asunto del correo';
    $mail->Body  = 'Contenido del correo <b>en HTML!</b>';
    $mail->AltBody = 'Contenido del correo en texto plano para los clientes de correo que no soporten HTML';
    $mail->send();
    echo 'El mensaje se ha enviado';
} catch (Exception $e) {
    echo "El mensaje no se ha enviado. Mailer Error: {$mail->ErrorInfo}";
}