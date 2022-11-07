<?php
	include '../Conexion.php';

$Cedulaant=$_GET['Cedulaant'];
$Cedulaact=$_GET['Cedulaact'];

ModificarProducto($_GET['Cedulaant'], $_GET['Cedulaact']);

function ModificarProducto($Cedulaant, $Cedulaact)
{
include '../Conexion.php';

$sentencia="UPDATE Inventario.Datos_P SET Cedula= '".$Cedulaact."' WHERE Cedula= '".$Cedulaant."' ";
$resul=$conex->query($sentencia);
}

ModificarHijos($_GET['Cedulaant'], $_GET['Cedulaact']);

function ModificarHijos($Cedulaant, $Cedulaact)
{
include'../Conexion.php';

$sentencia="UPDATE Inventario.Datos_H SET CedulaID= '".$Cedulaact."' WHERE CedulaID= '".$Cedulaant."' ";
$resul=$conex->query($sentencia);
}

Modificarnucleo($_GET['Cedulaant'], $_GET['Cedulaact']);

function Modificarnucleo($Cedulaant, $Cedulaact)
{
include'../Conexion.php';

$sentencia="UPDATE Inventario.Nucleo_F SET CedulaID= '".$Cedulaact."' WHERE CedulaID= '".$Cedulaant."' ";
$resul=$conex->query($sentencia);
}

ModificarNivelA($_GET['Cedulaant'], $_GET['Cedulaact']);

function ModificarNivelA($Cedulaant, $Cedulaact)
{
include'../Conexion.php';

$sentencia="UPDATE Inventario.Nivel_A SET CedulaID= '".$Cedulaact."' WHERE CedulaID= '".$Cedulaant."' ";
$resul=$conex->query($sentencia);
}

ModificarFormacion($_GET['Cedulaant'], $_GET['Cedulaact']);

function ModificarFormacion($Cedulaant, $Cedulaact)
{
include'../Conexion.php';

$sentencia="UPDATE Inventario.Formacion_E SET CedulaID= '".$Cedulaact."' WHERE CedulaID= '".$Cedulaant."' ";
$resul=$conex->query($sentencia);
}

ModificarExperiencia($_GET['Cedulaant'], $_GET['Cedulaact']);

function ModificarExperiencia($Cedulaant, $Cedulaact)
{
include'../Conexion.php';

$sentencia="UPDATE Inventario.Experiencia_L SET CedulaID= '".$Cedulaact."' WHERE CedulaID= '".$Cedulaant."' ";
$resul=$conex->query($sentencia);
}

ModificarInstitucion($_GET['Cedulaant'], $_GET['Cedulaact']);

function ModificarInstitucion($Cedulaant, $Cedulaact)
{
include'../Conexion.php';

$sentencia="UPDATE Inventario.Datos_I SET CedulaID= '".$Cedulaact."' WHERE CedulaID= '".$Cedulaant."' ";
$resul=$conex->query($sentencia);
}

ModificarComision($_GET['Cedulaant'], $_GET['Cedulaact']);

function ModificarComision($Cedulaant, $Cedulaact)
{
include'../Conexion.php';

$sentencia="UPDATE Inventario.Datos_M SET CedulaID= '".$Cedulaact."' WHERE CedulaID= '".$Cedulaant."' ";
$resul=$conex->query($sentencia);
}

ModificarOtros($_GET['Cedulaant'], $_GET['Cedulaact']);

function ModificarOtros($Cedulaant, $Cedulaact)
{
include'../Conexion.php';

$sentencia="UPDATE Inventario.Otros SET CedulaID= '".$Cedulaact."' WHERE CedulaID= '".$Cedulaant."' ";

$resul=$conex->query($sentencia);
}

Modificarnoti($_GET['Cedulaant'], $_GET['Cedulaact']);

function Modificarnoti($Cedulaant, $Cedulaact)
{
include'../Conexion.php';

$sentencia="UPDATE Inventario.Notificaciones SET Cedula= '".$Cedulaact."' WHERE Cedula= '".$Cedulaant."' ";

$resul=$conex->query($sentencia);
}

Modificarnotii($_GET['Cedulaant'], $_GET['Cedulaact']);

function Modificarnotii($Cedulaant, $Cedulaact)
{
include'../Conexion.php';

$sentencia="UPDATE Inventario.Notificaciones SET CedulaID= '".$Cedulaact."' WHERE CedulaID= '".$Cedulaant."' ";

$resul=$conex->query($sentencia);
}

Modificardoc($_GET['Cedulaant'], $_GET['Cedulaact']);

function Modificardoc($Cedulaant, $Cedulaact)
{
include'../Conexion.php';

$sentencia="UPDATE Inventario.documentos SET CedulaID= '".$Cedulaact."' WHERE CedulaID= '".$Cedulaant."' ";

$resul=$conex->query($sentencia);
}

Modificarsup($_GET['Cedulaant'], $_GET['Cedulaact']);

function Modificarsup($Cedulaant, $Cedulaact)
{
include'../Conexion.php';

$sentencia="UPDATE administrador2.superadmi SET  ci= '".$Cedulaact."' WHERE ci= '".$Cedulaant."' ";

$resul=$conex->query($sentencia);
}

Modificaradmi($_GET['Cedulaant'], $_GET['Cedulaact']);

function Modificaradmi($Cedulaant, $Cedulaact)
{
include'../Conexion.php';

$sentencia="UPDATE administrador2.admi SET  ci= '".$Cedulaact."' WHERE ci= '".$Cedulaant."' ";

$resul=$conex->query($sentencia);
}

Modificarusu($_GET['Cedulaant'], $_GET['Cedulaact']);

function Modificarusu($Cedulaant, $Cedulaact)
{
include'../Conexion.php';

$sentencia="UPDATE administrador2.usuarios SET ci= '".$Cedulaact."' WHERE ci= '".$Cedulaant."' ";

$resul=$conex->query($sentencia);
}


echo "<script type='text/javascript'>
alert('Sus Datos Personales Han Sido Actualizados');
window.location.href='ModificarSUP.php?Cedula='+ $Cedulaact +'';
</script>";

?>