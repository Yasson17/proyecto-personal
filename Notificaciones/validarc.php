<?php
	include '../Conexion.php';
	
	if(isset($_POST['ok']))
	{

	$IDnoti=$_POST['IDnoti'];
	$se=$_POST['Cedula'];

	$validar="UPDATE Inventario.notificaciones SET status='Apro_C' WHERE IDnoti= '".$IDnoti."' ";

	$resul=$conex->query($validar);
	if($resul)
 	{
    //Redireccionando
    echo "<script type='text/javascript'>
    alert('La Constancia de Trabajo a Sido Aprobada.');
    window.location.href='Index_reportesA.php?Cedula=$se';
	</script>";
  	}
	
	}
	else
	{

	$IDnoti=$_POST['IDnoti'];
	$se=$_POST['Cedula'];

	$validar="UPDATE Inventario.notificaciones SET status='No_C' WHERE IDnoti= '".$IDnoti."' ";

	$resul=$conex->query($validar);
	if($resul)
 	{
    //Redireccionando
    echo "<script type='text/javascript'>
    alert('La Constancia de Trabajo No Fue Aprobada.');
    window.location.href='Index_reportesA.php?Cedula=$se';
	</script>";
  	}
  }

?>
