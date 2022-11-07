<?php

$estado='Inhactivo';
$GLOBALS['status'] = $estado;


ModificarUSU($_GET['Cedula'], $status);

function ModificarUSU($Cedula, $status)
{
include 'Conexion.php';

	$Del="UPDATE administrador2.usuarios SET status= '".$status."' WHERE ci= '".$Cedula."' ";
	$resul=$conex->query($Del);
	
}

ModificarADMI($_GET['Cedula'], $status);

function ModificarADMI($Cedula, $status)
{
include 'Conexion.php';

	$Del="UPDATE administrador2.admi SET status= '".$status."' WHERE ci= '".$Cedula."' ";
	$resul=$conex->query($Del);

}

ModificarDatosP($_GET['Cedula'], $status);

function ModificarDatosP($Cedula, $status)
{
include 'Conexion.php';

	$Del="UPDATE Inventario.Datos_P SET status= '".$status."' WHERE Cedula= '".$Cedula."' ";
	$resul=$conex->query($Del);
}

ModificarHijos($_GET['Cedula'], $status);

function ModificarHijos($Cedula, $status)
{
include'Conexion.php';

	$Del="UPDATE Inventario.Datos_H SET status= '".$status."' WHERE CedulaID='".$Cedula."' ";
	$resul=$conex->query($Del);
}

Modificarnucleo($_GET['Cedula'], $status);

function Modificarnucleo($Cedula, $status)
{
include'Conexion.php';

	$Del="UPDATE Inventario.Nucleo_F SET status= '".$status."' WHERE CedulaID='".$Cedula."' ";
	$resul=$conex->query($Del);
}

ModificarNivelA($_GET['Cedula'], $status);

function ModificarNivelA($Cedula, $status)
{
include'Conexion.php';

	$Del="UPDATE Inventario.Nivel_A SET status= '".$status."' WHERE CedulaID='".$Cedula."' ";
	$resul=$conex->query($Del);
}


ModificarFormacion($_GET['Cedula'], $status);

function ModificarFormacion($Cedula, $status)
{
include'Conexion.php';

	$Del="UPDATE Inventario.Formacion_E SET status= '".$status."' WHERE CedulaID='".$Cedula."' ";
	$resul=$conex->query($Del);
}

ModificarExperiencia($_GET['Cedula'], $status);

function ModificarExperiencia($Cedula, $status)
{
include'Conexion.php';

	$Del="UPDATE Inventario.Experiencia_L SET status= '".$status."' WHERE CedulaID='".$Cedula."' ";
	$resul=$conex->query($Del);
}

ModificarInstitucion($_GET['Cedula'], $status);

function ModificarInstitucion($Cedula, $status)
{
include'Conexion.php';

	$Del="UPDATE Inventario.Datos_I SET status= '".$status."' WHERE CedulaID='".$Cedula."' ";
	$resul=$conex->query($Del);
}

ModificarComision($_GET['Cedula'], $status);

function ModificarComision($Cedula, $status)
{
include'Conexion.php';

	$Del="UPDATE Inventario.Datos_M SET status= '".$status."' WHERE CedulaID='".$Cedula."' ";
	$resul=$conex->query($Del);
}

ModificarOtros($_GET['Cedula'], $status);

function ModificarOtros($Cedula, $status)
{
include'Conexion.php';

	$Del="UPDATE Inventario.Otros SET status= '".$status."' WHERE CedulaID='".$Cedula."' ";
	$resul=$conex->query($Del);
}

if (isset($_GET['ad'])) 
{
	echo "<script type='text/javascript'>
    alert('Datos Inhabilitados Exitosamente.');
    window.location.href='superadmi/lista_admi.php';
	</script>";
}
else
{
	echo "<script type='text/javascript'>
    alert('Datos Inhabilitados Exitosamente.');
    window.location.href='lista_usuario.php';
	</script>";
}
?>


