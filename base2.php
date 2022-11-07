<?php



//CONEXION CON LA BASE DE DATOS
 include("conex.php"); 

//CTREACION DE LA BASE DE DATOS
$resul=$conex->query('CREATE DATABASE Administrador2');     

//CREACION DE LA TABLA D_PERSONAL (DATOS DEL PERSONAL)
$resul = $conex->query('CREATE TABLE `Administrador2`.`usuarios` ( `usuarios` VARCHAR(100) NOT NULL ,`contrasena` VARCHAR(100) NOT NULL,`nombre` VARCHAR(100) NOT NULL,`ci` VARCHAR(100) NOT NULL,  `status` text(10) NOT NULL,PRIMARY KEY (`usuarios`)) ENGINE = InnoDB');

//CREACION DE LA TABLA D_PERSONAL (DATOS DEL PERSONAL)
$resul = $conex->query('CREATE TABLE `Administrador2`.`admi` ( `usuarios` VARCHAR(100) NOT NULL ,`contrasena` VARCHAR(100) NOT NULL,`nombre` VARCHAR(100) NOT NULL,`ci` VARCHAR(100) NOT NULL, `status` text(10) NOT NULL, PRIMARY KEY (`usuarios`)) ENGINE = InnoDB');

//CREACION DE LA TABLA D_PERSONAL (DATOS DEL PERSONAL)
$resul = $conex->query('CREATE TABLE `Administrador2`.`contra` ( `correo` VARCHAR(100) NOT NULL ,`telefono` VARCHAR(100) NOT NULL,`nombre` VARCHAR(100) NOT NULL,`ci` VARCHAR(100) NOT NULL, `status` text(10) NOT NULL, PRIMARY KEY (`correo`)) ENGINE = InnoDB');
?>

<?php
include("conex.php"); 
if(isset($_POST['enviar']))
{

$nombre=$_POST['nombre'];
$ci=$_POST['ci'];
$usuario=$_POST['telefono'];
$contrasena=$_POST['correo'];

$insert = "INSERT INTO Administrador2.contra(`correo`,`telefono`,`nombre`,`ci`) VALUES ('$contrasena','$usuario','$nombre','$ci')"; 


$resul= $conex->query($insert);
 if($resul)
 {
 	echo "Todo bien todo legal";
 	echo "<script type='text/javascript'>
    alert('Su contrasena se estara enviando a su correo');
               window.location.href='correo/ejemplo.php?cedula='+$ci+'';
          </script>";
 }

}

?>


<?php
echo"<script type='text/javascript'>
	window.location.href='BDyT.php';
</script>";

?>

<?php

$usuario='ABAE123';
$contrasena='RUcw.654';
$nombre='Luis Jesus Martinez Soto';
$ci='27926464';
$status='Activo';

$insert = "INSERT INTO Administrador2.admi(`usuarios`,`contrasena`,`nombre`,`ci`,`status`) VALUES ('$usuario','$contrasena','$nombre','$ci','$status')"; 

$resul= $conex->query($insert);

if ($resul) {

 echo"<script type='text/javascript'>
     alert('Administrador Agregado Correctamente');
      </script>";
             }


 ?>