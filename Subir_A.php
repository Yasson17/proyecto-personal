<?php

Ascender_usuario($_GET['Cedula']);

function Ascender_usuario($Cedula)
{
include 'Conexion.php';

$sql="SELECT * FROM administrador2.usuarios WHERE `ci`= '".$Cedula."'";
$result=mysqli_query($conex,$sql);

foreach($result as $filas)
{
	$usuarios=$filas['usuarios'];
    $contrasena=$filas['contrasena'];
    $nombre=$filas['nombre'];
    $ci=$filas['ci'];
    $status=$filas['status'];
}


$ascenso="INSERT INTO Administrador2.admi (`usuarios`,`contrasena`,`nombre`,`ci`,`status`) VALUES ('$usuarios','$contrasena','$nombre','$ci','$status')";
$resul=mysqli_query($conex,$ascenso);

$Del="DELETE FROM administrador2.usuarios WHERE `ci`= '".$Cedula."'";
$result=mysqli_query($conex,$Del);
}

echo "<script type='text/javascript'>
    alert('Nuevo Administrador Agregado.');
    window.location.href='superadmi/lista_usuario.php';
</script>";

?>