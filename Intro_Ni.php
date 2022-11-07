<?php
//CONEXION CON LA BASE DE DATOS
include("Conexion.php"); 

if(isset($_POST['Enviar']))
{
$Especializacion=$_POST['Especializacion'];
$Titulo_O=$_POST['Titulo_O'];
$Ano_G=$_POST['Ano_G'];
$Inst_Univ=$_POST['Inst_Univ'];
$Observaciones=$_POST['Observaciones'];
$CedulaID=$_POST['CedulaID'];
$status=$_POST['status'];


$insert = "INSERT INTO inventario.Nivel_A (`Especializacion`, `Titulo_O`, `Ano_G`, `Inst_Univ`, `Observaciones`, `CedulaID`, `status`) VALUES ('$Especializacion', '$Titulo_O', '$Ano_G', '$Inst_Univ', '$Observaciones', '$CedulaID', '$status')"; 

$resul= $conex->query($insert);

 if($resul)
 {
 	//Redireccionando
    echo "<script type='text/javascript'>
	window.location.href='inf_formacionE.php';
</script>";
 }

}

if(isset($_POST['otro']))
{
$Especializacion=$_POST['Especializacion'];
$Titulo_O=$_POST['Titulo_O'];
$Ano_G=$_POST['Ano_G'];
$Inst_Univ=$_POST['Inst_Univ'];
$Observaciones=$_POST['Observaciones'];
$CedulaID=$_POST['CedulaID'];


$insert = "INSERT INTO inventario.Nivel_A (`Especializacion`, `Titulo_O`, `Ano_G`, `Inst_Univ`, `Observaciones`, `CedulaID`) VALUES ('$Especializacion', '$Titulo_O', '$Ano_G', '$Inst_Univ', '$Observaciones', '$CedulaID')"; 

$resul= $conex->query($insert);

 if($resul)
 {
 	//Redireccionando
    echo "<script type='text/javascript'>
	window.location.href='inf_nivelA.php';
</script>";
 }

}
?>