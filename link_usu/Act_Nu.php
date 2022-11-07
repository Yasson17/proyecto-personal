<?php
	include '../Conexion.php';


$Cedu=$_POST['Ce'];
$GLOBALS['Cedu'] = $Cedu;

if(empty($_POST['NombresN']))
{
        echo "<script type='text/javascript'>
            alert('No se encontaron datos a actualizar, por favor agregue un nuevo familiar.');
            window.location.href = '../Modificar_U.php?Cedula='+ $Cedu +'';
        </script>";
}

      

Modificarnucleo($_POST['IDN'], $_POST['Parentesco'], $_POST['NombresN'], $_POST['ApellidosN'], $_POST['CedulaN'], $_POST['Fecha_NN'], $_POST['SexoN'], $_POST['Estado_CN'], $_POST['Grado_I'], $_POST['CedulaID']);


function Modificarnucleo($IDN, $Parentesco, $NombresN, $ApellidosN, $CedulaN, $Fecha_NN, $SexoN, $Estado_CN, $Grado_I, $CedulaID)
{
include'../Conexion.php';

foreach ($_POST['IDN'] as $IDN) 
{

    
	$Parentesco=mysqli_real_escape_string($conex, $_POST['Parentesco'][$IDN]);
	$NombresN=mysqli_real_escape_string($conex, $_POST['NombresN'][$IDN]);
    $ApellidosN=mysqli_real_escape_string($conex, $_POST['ApellidosN'][$IDN]);
    $CedulaN=mysqli_real_escape_string($conex, $_POST['CedulaN'][$IDN]);
    $Fecha_NN=mysqli_real_escape_string($conex, $_POST['Fecha_NN'][$IDN]);
    $EdadN=mysqli_real_escape_string($conex, $_POST['EdadN'][$IDN]);
    $SexoN=mysqli_real_escape_string($conex, $_POST['SexoN'][$IDN]);
    $Estado_CN=mysqli_real_escape_string($conex, $_POST['Estado_CN'][$IDN]);
    $Grado_I=mysqli_real_escape_string($conex, $_POST['Grado_I'][$IDN]);
    $CedulaID=mysqli_real_escape_string($conex, $_POST['CedulaID'][$IDN]);




$sentencia="UPDATE Inventario.Nucleo_F SET Parentesco= '".$Parentesco."', Nombres= '".$NombresN."', Apellidos= '".$ApellidosN."', Cedula= '".$CedulaN."', Fecha_N= '".$Fecha_NN."', Edad= '".$EdadN."', Sexo= '".$SexoN."', Estado_C= '".$Estado_CN."', Grado_I= '".$Grado_I."' WHERE IDN='".$IDN."' ";
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