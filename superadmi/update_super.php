<?php

	include '../Conexion.php';


$A=$_POST['A'];


if ($A=='1') {
	
	$cedu=$_POST['ci'];
$nueva=$_POST['nueva'];
    $antigua=$_POST['antigua'];

	$consul="SELECT * FROM  administrador2.superadmi WHERE ci='".$cedu."' ";
$res=$conex->query($consul);
	foreach ($res as $fila) {
$a=$fila['usuarios'];
$b=$fila['contrasena'];
$c=$fila['nombre'];
$d=$fila['ci'];

	}

	if ($b==$antigua) {

		$senten="UPDATE administrador2.superadmi SET  contrasena= '".$nueva."' WHERE ci= '".$cedu."' ";

	$result=$conex->query($senten);

if ($result) {
	
echo "<script type='text/javascript'>
    alert('Datos Modificado exitosamente');
    window.location.href='superadmi.php';
</script>";

}
	

}

else{
echo "<script type='text/javascript'>
    alert('Antigua Contraseña Incorrecta');
   window.location.href='modificar_super.php?Cedula=$cedu';
</script>";

}
}

else{

echo "<script type='text/javascript'>
    window.location.href='superadmi.php';
</script>";


}
?>