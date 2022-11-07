<?php
include('../Conexion.php');
$Cedula=$_GET['Cedula'];
$IDdoc=$_GET['IDdoc'];

	$Del="DELETE FROM Inventario.documentos WHERE IDdoc='".$IDdoc."'";

$resul=$conex->query($Del);


if ($resul) 
{
    	echo "<script type='text/javascript'>
    	alert('Documento Eliminado Exitosamente.');
    	window.location.href='lista_asistencias.php?Cedula=$Cedula';
		</script>";


}

?>


