<?php include ('conexion.php');


$rutaservidor="documentos";
$archivo=$_FILES['doc']['name'];
$tipo=$_FILES['doc']['type'];
$ruta=$_FILES['doc']['tmp_name'];
$destino="documentos/".$archivo;

$observacion=$_POST['observaciones'];
$departa=$_POST['departamento'];
$cedula=$_POST['ci'];
$fecha=$_POST['fecha'];
$status=$_POST['status'];

copy($ruta,$destino);



$insertar="INSERT INTO inventario.documentos(archivo, observaciones, departamento, fecha, CedulaID, status, tipo)
values ('".$archivo."', '".$observacion."', '".$departa."','".$fecha."', '".$cedula."', '".$status."', '".$tipo."')";

 $resul=$conex->query($insertar);

if($resul){

if ($status=='Enviado') {
 	
 
echo "<script type='text/javascript'>
    alert('Archivo Agregado Correctamente');
    window.location.href='administrador.php';
</script>";
} 	
else
{
echo "<script type='text/javascript'>
    alert('Archivo Agregado Correctamente');
    window.location.href='superadmi/superadmi.php';
</script>";


}

	}
?>