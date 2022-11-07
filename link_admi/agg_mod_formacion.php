<?php
//CONEXION CON LA BASE DE DATOS
include("../Conexion.php"); 

if(isset($_POST['Enviar']))
{
$Titulo_O=$_POST['Titulo_O'];
$Ano_G=$_POST['Ano_G'];
$Inst_Univ=$_POST['Inst_Univ'];
$Pais=$_POST['Pais'];
$CedulaID=$_POST['CedulaID'];
$status='Activo';

$insert = "INSERT INTO inventario.Formacion_E (`Titulo_O`, `Ano_G`, `Inst_Univ`, `Pais`, `CedulaID`,`status`) VALUES ('$Titulo_O','$Ano_G','$Inst_Univ','$Pais', '$CedulaID','$status')"; 

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