<?php  

include '../Conexion.php';

$_SESSION['fecha']=time();

if(isset($_POST['Enviar']))
{
$Cedula=$_POST['Cedula'];
$Descripcion=$_POST['Descripcion'];
$Nombres=$_POST['Nombres'];
$Tipo=$_POST['Tipo'];
$status='Envio_C';


$insert = "INSERT INTO inventario.Notificaciones (`Cedula`, `Nombres`, `Tipo`, `status`, `Descripcion`) VALUES ('$Cedula','$Nombres', '$Tipo', '$status', '$Descripcion')"; 

$resul= $conex->query($insert);

 if(isset($_POST['ad']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Datos Enviados Exitosamente.');
    window.location.href='Formulario_constancia.php?Cedula=$se';
</script>";

 }
 else if(isset($_POST['sup']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Datos Enviados Exitosamente.');
    window.location.href='Formulario_constanciaSu.php?Cedula=$se';
</script>";

 }
else
 {
    $se=$Cedula;
   //Redireccionando
 echo "<script type='text/javascript'>
   alert('Datos Enviados Exitosamente.');
    window.location.href='Formulario_constanciaU.php?Cedula=$se';
</script>";
 }

}



if(isset($_POST['Int']))
{
$Nombres=$_POST['Nombres'];
$Cedula=$_POST['Cedula'];
$Descripcion=$_POST['Descripcion'];
$Tipo=$_POST['Tipo'];

if(isset($_POST['sup']))
{
$Tipo=$_POST['Tipo'];
$ID=$_POST['IDnoti'];
$status='Respondido';

$consulta= "UPDATE  inventario.Notificaciones SET status='".$status."', CedulaID='".$ID."' WHERE IDnoti='".$ID."'";

$consulta= $conex->query($consulta);

$insert = "INSERT INTO inventario.Notificaciones (`Nombres`, `Cedula`, `Tipo`, `CedulaID`, `status`, `Descripcion`) VALUES ('$Nombres', '$Cedula', '$Tipo', '$ID', '$status', '$Descripcion')"; 

$consul= $conex->query($insert);
}
else if(isset($_POST['ad']))
{
$status='Menviado';

$insert = "INSERT INTO inventario.Notificaciones (`Nombres`, `Cedula`, `Tipo`, `status`, `Descripcion`) VALUES ('$Nombres', '$Cedula', '$Tipo', '$status', '$Descripcion')"; 

$resul= $conex->query($insert);
}
else
{
$status='Menviado';

$insert = "INSERT INTO inventario.Notificaciones (`Nombres`, `Cedula`, `Tipo`, `status`, `Descripcion`) VALUES ('$Nombres', '$Cedula', '$Tipo', '$status', '$Descripcion')"; 

$resul= $conex->query($insert);
}




 if(isset($_POST['ad']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Datos Enviados Exitosamente.');
    window.location.href='interacciona.php?Cedula=$se';
</script>";

 }
 else if(isset($_POST['sup']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Datos Enviados Exitosamente.');
    window.location.href='Index_reportesS.php?Cedula=$se';
</script>";

 }
else
 {
    $se=$Cedula;
   //Redireccionando
 echo "<script type='text/javascript'>
   alert('Datos Enviados Exitosamente.');
    window.location.href='interaccionau.php?Cedula=$se';
</script>";

 }

}





if(isset($_POST['gene']))
{
$Nombres=$_POST['Nombres'];
$Cedula=$_POST['Cedula'];
$Descripcion=$_POST['Descripcion'];
$Tipo=$_POST['Tipo'];
$status='general';


$insert = "INSERT INTO inventario.Notificaciones (`Nombres`, `Cedula`, `Tipo`, `status`, `Descripcion`) VALUES ('$Nombres', '$Cedula', '$Tipo', '$status', '$Descripcion')"; 

$resul= $conex->query($insert);


if($resul)
{
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Notificación Enviada Exitosamente.');
    window.location.href='interaccionas.php?Cedula=$se';
</script>";
}

}



?>