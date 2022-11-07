<?php

include '../Conexion.php';

$Cedu=$_POST['Ce'];
$GLOBALS['Cedu'] = $Cedu;

if(empty($_POST['Organismo']))
{
        echo "<script type='text/javascript'>
            alert('No se encontaron datos a actualizar. Por favor agregue sus datos de experiencia laboral.');
            window.location.href = '../Modificar_U.php?Cedula='+ $Cedu +'';
        </script>";
}


ModificarExperiencia($_POST['IDE'], $_POST['Organismo'], $_POST['Fecha_I'], $_POST['Fecha_E'], $_POST['Cargo'], $_POST['Antecedentes_S'], $_POST['CedulaID']);


function ModificarExperiencia($IDE, $Organismo, $Fecha_I, $Fecha_E, $Cargo, $Antecedentes_S, $CedulaID)
{
include'../Conexion.php';

foreach ($_POST['IDE'] as $IDE) 
{

    $Organismo=mysqli_real_escape_string($conex, $_POST['Organismo'][$IDE]);
    $Fecha_I=mysqli_real_escape_string($conex, $_POST['Fecha_I'][$IDE]);
    $Fecha_E=mysqli_real_escape_string($conex, $_POST['Fecha_E'][$IDE]);
    $Cargo=mysqli_real_escape_string($conex, $_POST['Cargo'][$IDE]);
    $Antecedentes_S=mysqli_real_escape_string($conex, $_POST['Antecedentes_S'][$IDE]);
    $CedulaID=mysqli_real_escape_string($conex, $_POST['CedulaID'][$IDE]);




$sentencia="UPDATE Inventario.Experiencia_L SET Organismo= '".$Organismo."', Fecha_I= '".$Fecha_I."', Fecha_E= '".$Fecha_E."', Cargo= '".$Cargo."', Antecedentes_S= '".$Antecedentes_S."' WHERE IDE='".$IDE."' ";
$resul=$conex->query($sentencia);

if ($resul) 
{
    echo "<script type='text/javascript'>
    alert('Sus Datos Han Sido Actualizados');
    window.location.href = '../Modificar_U.php?Cedula='+ $CedulaID +'';
    </script>";
}
}
}


?>