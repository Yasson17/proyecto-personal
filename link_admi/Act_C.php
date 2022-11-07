<?php
    include '../Conexion.php';

$Cedu=$_POST['Ce'];
$GLOBALS['Cedu'] = $Cedu;

if(empty($_POST['FechaI_ServicioC']))
{
        echo "<script type='text/javascript'>
            alert('No se encontaron datos a actualizar. Por favor agregue sus datos de comisión´de servicio.');
            window.location.href = '../Modificar.php?Cedula='+ $Cedu +'';
        </script>";
}
ModificarComision($_POST['IDM'], $_POST['FechaI_ServicioC'], $_POST['Ano_S'], $_POST['Institu_P'], $_POST['Rango_M'], $_POST['TiempoC_S'], $_POST['FechaI_Ser'], $_POST['CedulaID']);


function ModificarComision($IDM, $FechaI_ServicioC, $Ano_S, $Institu_P, $Rango_M, $TiempoC_S, $FechaI_Ser, $CedulaID)
{
include'../Conexion.php';

foreach ($_POST['IDM'] as $IDM) 
{

    $FechaI_ServicioC=mysqli_real_escape_string($conex, $_POST['FechaI_ServicioC'][$IDM]);
    $Ano_S=mysqli_real_escape_string($conex, $_POST['Ano_S'][$IDM]);
    $Institu_P=mysqli_real_escape_string($conex, $_POST['Institu_P'][$IDM]);
    $Rango_M=mysqli_real_escape_string($conex, $_POST['Rango_M'][$IDM]);
    $TiempoC_S=mysqli_real_escape_string($conex, $_POST['TiempoC_S'][$IDM]);
    $FechaI_Ser=mysqli_real_escape_string($conex, $_POST['FechaI_Ser'][$IDM]);
    $CedulaID=mysqli_real_escape_string($conex, $_POST['CedulaID'][$IDM]);



$sentencia="UPDATE Inventario.Datos_M SET FechaI_Servicio= '".$FechaI_ServicioC."', Ano_S= '".$Ano_S."', Institu_P= '".$Institu_P."', Rango_M= '".$Rango_M."', TiempoC_S= '".$TiempoC_S."', FechaI_Ser= '".$FechaI_Ser."' WHERE IDM='".$IDM."' ";
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