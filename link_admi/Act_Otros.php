<?php
    include '../Conexion.php';

$Cedu=$_POST['Ce'];
$GLOBALS['Cedu'] = $Cedu;

if(empty($_POST['Tipo_V']))
{
        echo "<script type='text/javascript'>
            alert('No se encontaron datos a actualizar. Por favor agregue sus nuevos datos.');
            window.location.href = '../Modificar.php?Cedula='+ $Cedu +'';
        </script>";
}


ModificarOtros($_POST['IDO'], $_POST['Facebook'], $_POST['Twitter'], $_POST['Instagram'], $_POST['Otros'], $_POST['Carnet_P'], $_POST['Codigo_C'], $_POST['Serial_C'], $_POST['Beneficios_P'], $_POST['Carnet_PSUV'], $_POST['Codigo_P'], $_POST['Serial_P'], $_POST['Beneficios_PP'], $_POST['Partido_P'], $_POST['Mov_S'], $_POST['Comuna'], $_POST['Vocero'], $_POST['Caja_Clap'], $_POST['Vivienda'], $_POST['Tipo_V'], $_POST['Vehiculo'], $_POST['Tipo_Veh'], $_POST['Transporte_P'], $_POST['Cual'], $_POST['Descrip_R'], $_POST['Depor_Cult'], $_POST['CedulaID']);


function ModificarOtros($IDO, $Facebook, $Twitter, $Instagram, $Otros, $Carnet_P, $Codigo_C, $Serial_C, $Beneficios_P, $Carnet_PSUV, $Codigo_P, $Serial_P, $Beneficios_PP,  $Partido_P, $Mov_S, $Comuna, $Vocero, $Caja_Clap, $Vivienda, $Tipo_V, $Vehiculo, $Tipo_Veh, $Transporte_P, $Cual, $Descrip_R, $Depor_Cult, $CedulaID)
{
include'../Conexion.php';

foreach ($_POST['IDO'] as $IDO) 
{

    $Facebook=mysqli_real_escape_string($conex, $_POST['Facebook'][$IDO]);
    $Twitter=mysqli_real_escape_string($conex, $_POST['Twitter'][$IDO]);
    $Instagram=mysqli_real_escape_string($conex, $_POST['Instagram'][$IDO]);
    $Otros=mysqli_real_escape_string($conex, $_POST['Otros'][$IDO]);
    $Carnet_P=mysqli_real_escape_string($conex, $_POST['Carnet_P'][$IDO]);
    $Codigo_C=mysqli_real_escape_string($conex, $_POST['Codigo_C'][$IDO]);
    $Serial_C=mysqli_real_escape_string($conex, $_POST['Serial_C'][$IDO]);
    $Beneficios_P=mysqli_real_escape_string($conex, $_POST['Beneficios_P'][$IDO]);
    $Carnet_PSUV=mysqli_real_escape_string($conex, $_POST['Carnet_PSUV'][$IDO]);
    $Codigo_P=mysqli_real_escape_string($conex, $_POST['Codigo_P'][$IDO]);
    $Serial_P=mysqli_real_escape_string($conex, $_POST['Serial_P'][$IDO]);
    $Beneficios_PP=mysqli_real_escape_string($conex, $_POST['Beneficios_PP'][$IDO]);
    $Partido_P=mysqli_real_escape_string($conex, $_POST['Partido_P'][$IDO]);
    $Mov_S=mysqli_real_escape_string($conex, $_POST['Mov_S'][$IDO]);
    $Comuna=mysqli_real_escape_string($conex, $_POST['Comuna'][$IDO]);
    $Vocero=mysqli_real_escape_string($conex, $_POST['Vocero'][$IDO]);
    $Caja_Clap=mysqli_real_escape_string($conex, $_POST['Caja_Clap'][$IDO]);
    $Vivienda=mysqli_real_escape_string($conex, $_POST['Vivienda'][$IDO]);
    $Tipo_V=mysqli_real_escape_string($conex, $_POST['Tipo_V'][$IDO]);
    $Vehiculo=mysqli_real_escape_string($conex, $_POST['Vehiculo'][$IDO]);
    $Tipo_Veh=mysqli_real_escape_string($conex, $_POST['Tipo_Veh'][$IDO]);
    $Transporte_P=mysqli_real_escape_string($conex, $_POST['Transporte_P'][$IDO]);
    $Cual=mysqli_real_escape_string($conex, $_POST['Cual'][$IDO]);
    $Descrip_R=mysqli_real_escape_string($conex, $_POST['Descrip_R'][$IDO]);
    $Depor_Cult=mysqli_real_escape_string($conex, $_POST['Depor_Cult'][$IDO]);
    $CedulaID=mysqli_real_escape_string($conex, $_POST['CedulaID'][$IDO]);



$sentencia="UPDATE Inventario.Otros SET Facebook= '".$Facebook."', Twitter= '".$Twitter."', Instagram= '".$Instagram."', Otros= '".$Otros."', Carnet_P= '".$Carnet_P."', Codigo_C= '".$Codigo_C."', Serial_C= '".$Serial_C."', Beneficios_P= '".$Beneficios_P."', Carnet_PSUV= '".$Carnet_PSUV."', Codigo_P= '".$Codigo_P."', Serial_P= '".$Serial_P."', Beneficios_PP= '".$Beneficios_PP."', Partido_P= '".$Partido_P."', Mov_S= '".$Mov_S."', Comuna= '".$Comuna."', Vocero= '".$Vocero."', Caja_Clap= '".$Caja_Clap."', Vivienda= '".$Vivienda."', Tipo_V= '".$Tipo_V."', Vehiculo= '".$Vehiculo."', Tipo_Veh= '".$Tipo_Veh."', Transporte_P= '".$Transporte_P."', Cual= '".$Cual."', Descrip_R= '".$Descrip_R."', Depor_Cult= '".$Depor_Cult."' WHERE IDO='".$IDO."' ";

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