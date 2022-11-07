<?php
//CONEXION CON LA BASE DE DATOS
include("Conexion.php"); 

if(isset($_POST['Enviar']))
{
$Titulo_O=$_POST['Titulo_O'];
$Ano_G=$_POST['Ano_G'];
$Inst_Univ=$_POST['Inst_Univ'];
$Pais=$_POST['Pais'];
$CedulaID=$_POST['CedulaID'];
$status=$_POST['status'];


$insert = "INSERT INTO inventario.Formacion_E (`Titulo_O`, `Ano_G`, `Inst_Univ`, `Pais`, `CedulaID`, `status`) VALUES ('$Titulo_O','$Ano_G','$Inst_Univ','$Pais', '$CedulaID', '$status')"; 

$resul= $conex->query($insert);

 if($resul)
 {
 	//Redireccionando
    echo "<script type='text/javascript'>
	window.location.href='inf_expe.php';
</script>";
    
 }

}


if(isset($_POST['otro']))
{
$Titulo_O=$_POST['Titulo_O'];
$Ano_G=$_POST['Ano_G'];
$Inst_Univ=$_POST['Inst_Univ'];
$Pais=$_POST['Pais'];
$CedulaID=$_POST['CedulaID'];



$insert = "INSERT INTO inventario.Formacion_E (`Titulo_O`, `Ano_G`, `Inst_Univ`, `Pais`, `CedulaID`) VALUES ('$Titulo_O','$Ano_G','$Inst_Univ','$Pais', '$CedulaID')"; 

$resul= $conex->query($insert);

 if($resul)
 {
 	//Redireccionando
    echo "<script type='text/javascript'>
	window.location.href='inf_formacionE.php';
</script>";
 }

}

if(isset($_POST['No']))
{
 	//Redireccionando
    echo "<script type='text/javascript'>
	window.location.href='inf_expe.php';
</script>";
    
 }


?>