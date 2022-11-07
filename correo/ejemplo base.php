<?php

$axu=$_GET['cedula'];
echo "$axu";
echo "hola";

// maervintalavera@gmail.com
?>

<?php


include ("../conex.php");

    $resulC = $conex->query("SELECT * FROM Administrador2.usuarios  ORDER BY `nombre` DESC")or die(mysql_error());


if ($resulC) {

    foreach ($resulC as $fila){

    		if ($fila["ci"]==$axu) {

                $dato=$fila["contrasena"];
                $dato2=$fila["ci"];
                $dato3=$fila["nombre"];
}
}
    echo "<tr> </tr>";
     echo "<br> </br>";
    echo $fila["ci"];
  
      echo "<br> </br>";
    echo "<td> </td>";

}

?>

<?php

   include ('../conex.php');

  

    $resulC = $conex->query("SELECT * FROM Administrador2.contra  ORDER BY `nombre` DESC")or die(mysql_error());


if ($resulC) {

    foreach ($resulC as $fila1){
    
       if ($fila1["ci"]==$dato2) {
  
                $dato1=$fila1["correo"];
}

}
    
}

?>
<?php

$body="Su nombre es:".$dato3 ."<br>Su contraseña para ingresar al sistema ABAE es :".$dato;
// Mostrar errores PHP (Desactivar en producción)
 ini_set('display_errors', 1);
 ini_set('display_startup_errors', 1);
 error_reporting(E_ALL);


// Incluir la libreria PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Inicio
$mail = new PHPMailer(true);

try {
    // Configuracion SMTP
    $mail->SMTPDebug = 2;                         // Mostrar salida (Desactivar en producción)
    $mail->isSMTP();                                               // Activar envio SMTP
    $mail->Host  = 'smtp.gmail.com';                     // Servidor SMTP
    $mail->SMTPAuth  = true;                                       // Identificacion SMTP
    $mail->Username  = 'elimerquevedo16@gmail.com';                  // Usuario SMTP
    $mail->Password  = 'gnwcerficykwqhln';	          // Contraseña SMTP
    $mail->SMTPSecure = 'tls';
    $mail->Port  = 587;
    $mail->setFrom('elimerquevedo16@gmail.com', 'Elimer Reyes');                // Remitente del correo
echo "$dato";
echo "$dato1";
    // Destinatarios
    $mail->addAddress("$dato1");  // Email y nombre del destinatario

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Recursos Humanos ABAE';
    $mail->Body  = $body ;
    $mail->AltBody = 'Contenido del correo en texto plano para los clientes de correo que no soporten HTML';
    $mail->send();
    echo 'El mensaje se ha enviado';
} catch (Exception $e) {
    echo 'El mensaje no se ha enviado. Mailer Error: {$mail->ErrorInfo}';
}
?>