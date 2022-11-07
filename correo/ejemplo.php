<?php
   include ('../Conexion.php');
   include ('../conex.php');

  if(isset($_POST['enviar']))
{

$correo=$_POST['correo'];

$conn = new mysqli('localhost','root','','inventario');
$con = new mysqli('localhost','root','','Administrador2');

    $resulC="SELECT * FROM inventario.Datos_P  WHERE Correo_Elect='".$correo."' ";

if ($resul=mysqli_query($conn,$resulC))
{
    $res=mysqli_num_rows($resul);
}

if ($res>0)
{
    foreach ($resul as $fila) 
    {
    $dato1=$fila["Correo_Elect"];
    $dato=$fila["Cedula"];
    }

    //BUSQUEDA EN USUARIO
    $resulC=("SELECT * FROM Administrador2.usuarios  WHERE ci='".$dato."' ");

    if ($resul=mysqli_query($con,$resulC))
    {
        $res=mysqli_num_rows($resul);
    }

    if ($res>0)
    {
        foreach ($resul as $fila) 
        {
            $dato2=$fila["contrasena"];
            $dato3=$fila["usuarios"];
        }
    }
    
    else if ($res==0)
    {
    //BUSQUEDA EN USUARIO
    $resulC=("SELECT * FROM Administrador2.admi  WHERE ci='".$dato."' ");

    if ($resul=mysqli_query($con,$resulC))
    {
        $res=mysqli_num_rows($resul);
    }

    if ($res>0)
    {
        foreach ($resul as $fila) 
        {
            $dato2=$fila["contrasena"];
            $dato3=$fila["usuarios"];
        }
    }
    }


    else if ($res==0)
    {
    //BUSQUEDA EN SUPERADMI
    $resulC=("SELECT * FROM Administrador2.superadmi  WHERE ci='".$dato."' ");

    if ($resul=mysqli_query($con,$resulC))
    {
        $res=mysqli_num_rows($resul);
    }

    if ($res>0)
    {
        foreach ($resul as $fila) 
        {
            $dato2=$fila["contrasena"];
            $dato3=$fila["usuarios"];
        }
    }
    }
    else
    {
       echo "<script type='text/javascript'>
        alert('Correo Invalido, Por Favor Verifique sus Datos.');
        window.location.href='../login.php?';
        </script>";
    }

}
}
if($res==0)
{
  echo "<script type='text/javascript'>
   alert('Correo Invalido, Por Favor Verifique sus Datos.');
    window.location.href='../login.php?';
</script>";
}


?>



<?php

$body="Su Usuario es:".$dato3 ."<br>Su Contraseña  :".$dato2;
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
    $mail->SMTPDebug = 0;                         // Mostrar salida (Desactivar en producción)
    $mail->isSMTP();                                               // Activar envio SMTP
    $mail->Host  = 'smtp.gmail.com';                     // Servidor SMTP
    $mail->SMTPAuth  = true;                                       // Identificacion SMTP
    $mail->Username  = 'elimerquevedo16@gmail.com';                  // Usuario SMTP
    $mail->Password  = 'gnwcerficykwqhln';	          // Contraseña SMTP
    $mail->SMTPSecure = 'tls';
    $mail->Port  = 587;
    $mail->setFrom('elimerquevedo16@gmail.com', 'Elimer Reyes');                // Remitente del correo

    // Destinatarios
    $mail->addAddress("$dato1");  // Email y nombre del destinatario

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Recursos Humanos ABAE';
    $mail->Body  = $body ;
    $mail->AltBody = 'Contenido del correo en texto plano para los clientes de correo que no soporten HTML';
    $mail->send();
   echo "<script type='text/javascript'>
                 alert('Su Contraseña sera enviada a su correo');
                 window.location.href='../login.php';
          </script>";
} catch (Exception $e) {
   
     echo "<script type='text/javascript'>
                 alert('Correo Invalido, Por Favor Verifique sus Datos.');
                 window.location.href='../login.php';
          </script>";

}
?>