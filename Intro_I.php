<?php
//CONEXION CON LA BASE DE DATOS
include("Conexion.php"); 

if(isset($_POST['Enviar']))
{
$FechaI_ABAE=$_POST['FechaI_ABAE'];
$Cargo=$_POST['Cargo'];
$Sede=$_POST['Sede'];
$Direccion_A=$_POST['Direccion_A'];
$Unidad_A=$_POST['Unidad_A'];
$Jefe_I=$_POST['Jefe_I'];
$FechaI_Servicio=$_POST['FechaI_Servicio'];
$TotalA_S=$_POST['TotalA_S'];
$CorreoE_Ins=$_POST['CorreoE_Ins'];
$num1=$_POST['num1'];
$Telefono_O_Ext=$_POST['Telefono_O_Ext'];

$Telefono_O_Ext=$num1.$Telefono_O_Ext;

$Familiares_ABAE=$_POST['Familiares_ABAE'];
$Nombres=$_POST['Nombres'];
$CedulaID=$_POST['CedulaID'];
$status=$_POST['status'];


$llen="SELECT * FROM inventario.Datos_I WHERE CedulaID='".$CedulaID."' ";

$ESTA=$conex->query($llen);

$total=mysqli_num_rows($ESTA);

    if($total==0)
{


$insert = "INSERT INTO inventario.Datos_I (`FechaI_ABAE`, `Cargo`, `Sede`, `Direccion_A`, `Unidad_A`, `Jefe_I`, `FechaI_Servicio`, `TotalA_Serv`, `CorreoE_Ins`, `Telefono_O_Ext`, `Familiares_ABAE`, `Nombres`, `CedulaID`, `status`) VALUES ('$FechaI_ABAE','$Cargo','$Sede','$Direccion_A','$Unidad_A','$Jefe_I','$FechaI_Servicio','$TotalA_S','$CorreoE_Ins','$Telefono_O_Ext','$Familiares_ABAE','$Nombres', '$CedulaID', '$status')"; 

$resul= $conex->query($insert);

 if($resul)
 {
 	//Redireccionando
    echo "<script type='text/javascript'>
	window.location.href='inf_comision.php';
</script>";
 }
}


else
{

echo"<script type='text/javascript'>
    alert('Sus Datos de la Institucion Ya Se Encuentran Registrados');
 	window.location.href='inf_comision.php';
  		</script>";

}

}
?>