<?php
//CONEXION CON LA BASE DE DATOS
include("../Conexion.php"); 

if(isset($_POST['Enviar']))
{
$Organismo=$_POST['Organismo'];
$Fecha_I=$_POST['Fecha_I'];
$Fecha_E=$_POST['Fecha_E'];
$Cargo=$_POST['Cargo'];
$Antecedentes_S=$_POST['Antecedentes_S'];
$CedulaID=$_POST['CedulaID'];
$status='Activo';

$insert = "INSERT INTO inventario.Experiencia_L (`Organismo`, `Fecha_I`, `Fecha_E`, `Cargo`, `Antecedentes_S`, `CedulaID`,`status`) VALUES ('$Organismo','$Fecha_I','$Fecha_E','$Cargo','$Antecedentes_S', '$CedulaID','$status')"; 

$resul= $conex->query($insert);

 if($resul)
 {
 	//Redireccionando
    echo "<script type='text/javascript'>
    alert('Sus Datos Han Sido Agregados Exitosamente.');
    window.location.href = '../Modificar.php?Cedula='+ $CedulaID +'';
    </script>";
 }
 }


?>