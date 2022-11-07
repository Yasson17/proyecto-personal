<?php
	include '../Conexion.php';

$Cedu=$_POST['Ce'];
$GLOBALS['Cedu'] = $Cedu;

if(empty($_POST['Nom']))
{
        echo "<script type='text/javascript'>
            alert('No se encontaron datos a actualizar, para agregar un nuevo hijo actualice sus datos personales (Número de Hijos).');
            window.location.href = '../Modificar_U.php?Cedula='+ $Cedu +'';
        </script>";

}

ModificarHijos($_POST['IDH'], $_POST['Nom'], $_POST['Fecha_N'], $_POST['Edad'], $_POST['Cedu'], $_POST['Sexo'], $_POST['Grado_e'], $_POST['Camisa'], $_POST['Pantalon'], $_POST['Calzados'], $_POST['CedulaID']);


function ModificarHijos($IDH, $Nom, $Fecha_N, $Edad, $Cedu, $Sexo, $Grado_e, $Camisa, $Pantalon, $Calzados, $CedulaID)
{
include'../Conexion.php';

foreach ($_POST['IDH'] as $IDH) 
{

	$Nombres=mysqli_real_escape_string($conex, $_POST['Nom'][$IDH]);
    $Fecha_N=mysqli_real_escape_string($conex, $_POST['Fecha_N'][$IDH]);
    $Edad=mysqli_real_escape_string($conex, $_POST['Edad'][$IDH]);
    $Cedula=mysqli_real_escape_string($conex, $_POST['Cedu'][$IDH]);
    $Sexo=mysqli_real_escape_string($conex, $_POST['Sexo'][$IDH]);
    $Grado_e=mysqli_real_escape_string($conex, $_POST['Grado_e'][$IDH]);
    $Camisa=mysqli_real_escape_string($conex, $_POST['Camisa'][$IDH]);
    $Pantalon=mysqli_real_escape_string($conex, $_POST['Pantalon'][$IDH]);
    $Calzados=mysqli_real_escape_string($conex, $_POST['Calzados'][$IDH]);
    $CedulaID=mysqli_real_escape_string($conex, $_POST['CedulaID'][$IDH]);




$sentencia="UPDATE Inventario.Datos_H SET Nombres= '".$Nombres."', Fecha_N= '".$Fecha_N."', Edad= '".$Edad."', Cedula= '".$Cedula."', Sexo= '".$Sexo."', Grado_e= '".$Grado_e."', Camisa= '".$Camisa."', Pantalon= '".$Pantalon."', Calzados= '".$Calzados."' WHERE IDH='".$IDH."' ";
$resul=$conex->query($sentencia);

if($resul)
        {   
            echo "<script type='text/javascript'>
            alert('Sus Datos Han Sido Actualizados');
            window.location.href = '../Modificar_U.php?Cedula='+ $CedulaID +'';
        </script>";
        }
}
}



?>