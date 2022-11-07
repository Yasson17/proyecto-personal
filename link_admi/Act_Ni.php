<?php
	include '../Conexion.php';

$Cedu=$_POST['Ce'];
$GLOBALS['Cedu'] = $Cedu;

if(empty($_POST['Especializacion']))
{
        echo "<script type='text/javascript'>
            alert('No se encontaron datos a actualizar. Por favor agregue sus datos de nivel acádemico.');
            window.location.href = '../Modificar.php?Cedula='+ $Cedu +'';
        </script>";
}
    
	

ModificarNivelA($_POST['IDA'], $_POST['Especializacion'], $_POST['Titulo_O'], $_POST['Ano_G'], $_POST['Inst_Univ'], $_POST['Observaciones'], $_POST['CedulaID']);


function ModificarNivelA($IDA, $Especializacion, $Titulo_O, $Ano_G, $Inst_Univ, $Observaciones, $CedulaID)
{
include'../Conexion.php';

foreach ($_POST['IDA'] as $IDA) 
{

	$Especializacion=mysqli_real_escape_string($conex, $_POST['Especializacion'][$IDA]);
	$Titulo_O=mysqli_real_escape_string($conex, $_POST['Titulo_O'][$IDA]);
    $Ano_G=mysqli_real_escape_string($conex, $_POST['Ano_G'][$IDA]);
    $Inst_Univ=mysqli_real_escape_string($conex, $_POST['Inst_Univ'][$IDA]);
    $Observaciones=mysqli_real_escape_string($conex, $_POST['Observaciones'][$IDA]);
    $CedulaID=mysqli_real_escape_string($conex, $_POST['CedulaID'][$IDA]);




$sentencia="UPDATE Inventario.Nivel_A SET Especializacion= '".$Especializacion."', Titulo_O= '".$Titulo_O."', Ano_G= '".$Ano_G."', Inst_Univ= '".$Inst_Univ."', Observaciones= '".$Observaciones."' WHERE IDA='".$IDA."' ";
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