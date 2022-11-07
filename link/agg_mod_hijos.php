<?php
//CONEXION CON LA BASE DE DATOS
include("../Conexion.php"); 

if(isset($_POST['Enviar']))
{
$Nombres=$_POST['Nombres'];
$Fecha_N=$_POST['Fecha_N'];
$Edad=$_POST['Edad'];
$CedulaH=$_POST['Cedula'];
$Sexo=$_POST['Sexo'];
$Grado_e=$_POST['Grado_e'];
$Camisa=$_POST['Camisa'];
$Pantalon=$_POST['Pantalon'];
$Calzado=$_POST['Calzado'];
$CedulaID=$_POST['CedulaID'];
$status='Activo';


$insert = "INSERT INTO inventario.Datos_H (`Nombres`, `Fecha_N`, `Edad`, `Cedula`, `Sexo`, `Grado_e`, `Camisa`, `Pantalon`, `Calzados`, `CedulaID`,`status`) VALUES ('$Nombres','$Fecha_N','$Edad','$CedulaH','$Sexo','$Grado_e','$Camisa','$Pantalon','$Calzado', '$CedulaID', '$status')"; 

$resul= $conex->query($insert);

if($resul)
{
 	//Redireccionando
        echo "<script type='text/javascript'>
	window.location.href = 'agg_familiar.php?Cedula='+ $CedulaH +'';
	</script>";
}

}


?>