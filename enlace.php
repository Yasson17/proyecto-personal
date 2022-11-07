<?php

session_start();


	include "conex.php";

$dato=$_POST['contrasena'];
$dato1=$_POST['usuario'];


$_SESSION['contrasena']  = $dato;
$_SESSION['usuarios'] = $dato1;
$_SESSION['instante'] = time();




// autentificacion para los usuarios
	if(isset($_POST['Ingresar']))
{

	$resulC = $conex->query("SELECT * FROM Administrador2.usuarios  ORDER BY `nombre` DESC")or die(mysql_error());


if ($resulC) {


	foreach ($resulC as $fila){
	
   
   if (($dato1==$fila["usuarios"]) && ($dato==$fila["contrasena"])){

    echo "<script type='text/javascript'>
	             window.location.href='usuario.php';
          </script>";
   }

}
    
}
}



// autentificacion para los administradores

	if(isset($_POST['Ingresar']))
{

	$resulC = $conex->query("SELECT * FROM Administrador2.admi  ORDER BY `nombre` DESC")or die(mysql_error());


if ($resulC) {


	foreach ($resulC as $fila){
	
    

   if (($dato1==$fila["usuarios"]) && ($dato==$fila["contrasena"])){

    echo "<script type='text/javascript'>
	             window.location.href='administrador.php';
          </script>";


   }
   
}
    
}
}


// autentificacion para los superadministradores

	if(isset($_POST['Ingresar']))
{

	$resulC = $conex->query("SELECT * FROM Administrador2.superadmi  ORDER BY `nombre` DESC")or die(mysql_error());


if ($resulC) {


	foreach ($resulC as $fila){
	
    

   if (($dato1==$fila["usuarios"]) && ($dato==$fila["contrasena"])){

    echo "<script type='text/javascript'>
	             window.location.href='superadmi/superadmi.php';
          </script>";


   }

   
}
    echo "<script type='text/javascript'>
	             alert('Datos ingresados incorrectamente');
	             window.location.href='login.php';
          </script>";
}
}


?>

