<?php



//CONEXION CON LA BASE DE DATOS
 include("conex.php"); 

//CTREACION DE LA BASE DE DATOS
$resul=$conex->query('CREATE DATABASE Administrador2');     

//CREACION DE LA TABLA usuarios 
$resul = $conex->query('CREATE TABLE `Administrador2`.`usuarios` ( `usuarios` VARCHAR(100) NOT NULL ,`contrasena` VARCHAR(100) NOT NULL,`nombre` VARCHAR(100) NOT NULL,`ci` VARCHAR(100) NOT NULL,  `status` text(10) NOT NULL,PRIMARY KEY (`usuarios`)) ENGINE = InnoDB');

//CREACION DE LA TABLA administrador
$resul = $conex->query('CREATE TABLE `Administrador2`.`admi` ( `usuarios` VARCHAR(100) NOT NULL ,`contrasena` VARCHAR(100) NOT NULL,`nombre` VARCHAR(100) NOT NULL,`ci` VARCHAR(100) NOT NULL, `status` text(10) NOT NULL, PRIMARY KEY (`usuarios`)) ENGINE = InnoDB');

//CREACION DE LA TABLA superadministrador
$resul = $conex->query('CREATE TABLE `Administrador2`.`superadmi` ( `usuarios` VARCHAR(100) NOT NULL ,`contrasena` VARCHAR(100) NOT NULL,`nombre` VARCHAR(100) NOT NULL,`ci` VARCHAR(100) NOT NULL, `status` text(10) NOT NULL, PRIMARY KEY (`usuarios`)) ENGINE = InnoDB');


echo"<script type='text/javascript'>
	window.location.href='BDyT.php';
</script>";

?>




 <?php

$usuario='ABAEsup';
$contrasena='qwerty';
$nombre='';
$ci='';
$status='Activo';

$insert = "INSERT INTO Administrador2.superadmi(`usuarios`,`contrasena`,`nombre`,`ci`,`status`) VALUES ('$usuario','$contrasena','$nombre','$ci','$status')"; 

$resul= $conex->query($insert);

if ($resul) {

 echo"<script type='text/javascript'>
     alert('Administrador Agregado Correctamente');
      </script>";
             }


 ?>