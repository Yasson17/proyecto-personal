<?php
    include '../Conexion.php';

$Cedu=$_POST['Ce'];
$GLOBALS['Cedu'] = $Cedu;

if(empty($_POST['Sede']))
{
        echo "<script type='text/javascript'>
            alert('No se encontaron datos a actualizar. Por favor agregue sus datos laborales.');
            window.location.href = '../Modificar.php?Cedula='+ $Cedu +'';
        </script>";
}
    


ModificarInstitucion($_POST['IDI'], $_POST['Fecha_ABAE'], $_POST['CargoI'], $_POST['Sede'], $_POST['Direccion_A'], $_POST['Unidad_A'], $_POST['Jefe_I'], $_POST['Fecha_Servicio'], $_POST['TotalA_Serv'], $_POST['CorreoE_Ins'], $_POST['Telefono_O_Ext'], $_POST['Familiares_ABAE'], $_POST['CorreoE_Ins'], $_POST['CedulaID']);


function ModificarInstitucion($IDI, $Fecha_ABAE, $CargoI, $Sede, $Direccion_A, $Unidad_A, $Jefe_I, $Fecha_Servicio, $TotalA_Serv, $CorreoE_Ins, $Telefono_O_Ext, $Familiares_ABAE, $NombresI, $CedulaID)
{
include'../Conexion.php';

foreach ($_POST['IDI'] as $IDI) 
{

    $Fecha_ABAE=mysqli_real_escape_string($conex, $_POST['Fecha_ABAE'][$IDI]);
    $CargoI=mysqli_real_escape_string($conex, $_POST['CargoI'][$IDI]);
    $Sede=mysqli_real_escape_string($conex, $_POST['Sede'][$IDI]);
    $Direccion_A=mysqli_real_escape_string($conex, $_POST['Direccion_A'][$IDI]);
    $Unidad_A=mysqli_real_escape_string($conex, $_POST['Unidad_A'][$IDI]);
    $Jefe_I=mysqli_real_escape_string($conex, $_POST['Jefe_I'][$IDI]);
    $Fecha_Servicio=mysqli_real_escape_string($conex, $_POST['Fecha_Servicio'][$IDI]);
    $TotalA_Serv=mysqli_real_escape_string($conex, $_POST['TotalA_Serv'][$IDI]);
    $CorreoE_Ins=mysqli_real_escape_string($conex, $_POST['CorreoE_Ins'][$IDI]);
    $Telefono_O_Ext=mysqli_real_escape_string($conex, $_POST['Telefono_O_Ext'][$IDI]);
    $Familiares_ABAE=mysqli_real_escape_string($conex, $_POST['Familiares_ABAE'][$IDI]);
    $NombresI=mysqli_real_escape_string($conex, $_POST['NombresI'][$IDI]);
    $CedulaID=mysqli_real_escape_string($conex, $_POST['CedulaID'][$IDI]);




$sentencia="UPDATE Inventario.Datos_I SET FechaI_ABAE= '".$Fecha_ABAE."', Cargo= '".$CargoI."', Sede= '".$Sede."', Direccion_A= '".$Direccion_A."', Unidad_A= '".$Unidad_A."', Jefe_I= '".$Jefe_I."', FechaI_Servicio= '".$Fecha_Servicio."', TotalA_Serv= '".$TotalA_Serv."', CorreoE_Ins= '".$CorreoE_Ins."', Telefono_O_Ext= '".$Telefono_O_Ext."', Familiares_ABAE= '".$Familiares_ABAE."', Nombres= '".$NombresI."' WHERE IDI='".$IDI."' ";
$resul=$conex->query($sentencia);

if($resul)

{   
    echo "<script type='text/javascript'>
    alert('Sus Datos Han Sido Actualizados');
    window.location.href = '../Modificar.php?Cedula='+ $CedulaID +'';
    </script>";
        }
}
}


?>