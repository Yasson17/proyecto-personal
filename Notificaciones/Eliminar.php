<?php
include('../Conexion.php');
$Cedula=$_GET['Cedula'];
$IDnoti=$_GET['IDnoti'];

if(isset($_GET['Tipo']))
{    
$Tipo=$_GET['Tipo'];
}

	$Del="DELETE FROM Inventario.Notificaciones WHERE IDnoti='".$IDnoti."'";

$resul=$conex->query($Del);

if ($resul) 
{
	if($Tipo=='admin')
    {
    	echo "<script type='text/javascript'>
    	alert('Notificación Eliminada Exitosamente.');
    	window.location.href='Index_reportesA.php?Cedula=$Cedula';
		</script>";
    }
    else if($Tipo=='sup')
    {
        echo "<script type='text/javascript'>
        alert('Notificación Eliminada Exitosamente.');
        window.location.href='Index_reportesS.php?Cedula=$Cedula';
        </script>";
    }
    else
    {
    	echo "<script type='text/javascript'>
    	alert('Notificación Eliminada Exitosamente.');
    	window.location.href='Index_reportesV.php?Cedula=$Cedula';
		</script>";
    }

}

?>


