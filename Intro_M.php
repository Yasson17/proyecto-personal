<?php
//CONEXION CON LA BASE DE DATOS
include("Conexion.php"); 

if(isset($_POST['Enviar']))
{
$FechaI_Servicio=$_POST['FechaI_Servicio'];
$Ano_S=$_POST['Ano_S'];
$Institu_P=$_POST['Institu_P'];
$Rango_M=$_POST['Rango_M'];
$TiempoC_S=$_POST['TiempoC_S'];
$FechaI_Ser=$_POST['FechaI_Ser'];
$FechaC_Ser=$_POST['FechaC_Ser'];
$CedulaID=$_POST['CedulaID'];
$status=$_POST['status'];


$insert = "INSERT INTO inventario.Datos_M (`FechaI_Servicio`, `Ano_S`, `Institu_P`, `Rango_M`, `TiempoC_S`, `FechaI_Ser`, `FechaC_Ser`, `CedulaID`, `status`) VALUES ('$FechaI_Servicio','$Ano_S','$Institu_P','$Rango_M','$TiempoC_S','$FechaI_Ser','$FechaC_Ser', '$CedulaID', '$status')"; 

$resul= $conex->query($insert);

 if($resul)
 {
 	//Redireccionando
    echo "<script type='text/javascript'>
	window.location.href='inf_otros.php';
</script>";
 }

}


if(isset($_POST['No']))
{
 	//Redireccionando
    echo "<script type='text/javascript'>
	window.location.href='inf_otros.php';
</script>";
 }
?>