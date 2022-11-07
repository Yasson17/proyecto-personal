<?php
//CONEXION CON LA BASE DE DATOS
include("../Conexion.php"); 

if(isset($_POST['Enviar']))
{
$Parentesco=$_POST['Parentesco'];
$Nombres=$_POST['Nombres'];
$Apellidos=$_POST['Apellidos'];
$Cedula=$_POST['Cedula'];
$Fecha_N=$_POST['Fecha_N'];
$Edad=$_POST['Edad'];
$Sexo=$_POST['Sexo'];
$Estado_C=$_POST['Estado_C'];
$Grado_I=$_POST['Grado_I'];
$CedulaID=$_POST['CedulaID'];
$status='Activo';

$insert = "INSERT INTO inventario.Nucleo_F (`Parentesco`, `Nombres`, `Apellidos`, `Cedula`, `Fecha_N`, `Edad`, `Sexo`, `Estado_C`, `Grado_I`, `CedulaID`,`status`) VALUES ('$Parentesco', '$Nombres', '$Apellidos', '$Cedula', '$Fecha_N','$Edad','$Sexo','$Estado_C','$Grado_I', '$CedulaID', '$status')"; 

$resul= $conex->query($insert);

  if($resul)
 {
 	//Redireccionando
    echo "<script type='text/javascript'>
    alert('Datos Agregados con Exito');
	window.location.href = '../superadmi/ModificarSUP.php?Cedula='+ $CedulaID +'';
	</script>";
 }

}

?>
