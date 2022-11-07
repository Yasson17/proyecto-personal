<?php
	include '../Conexion.php';

$Cedu=$_POST['Ce'];
$GLOBALS['Cedu'] = $Cedu;

if(empty($_POST['Titulo_OF']))
{
        echo "<script type='text/javascript'>
            alert('No se encontaron datos a actualizar, por favor agregue su nueva formación.');
            window.location.href = '../superadmi/ModificarSUP.php?Cedula='+ $Cedu +'';
        </script>";
}

ModificarFormacion($_POST['IDF'], $_POST['Titulo_OF'], $_POST['Ano_GF'], $_POST['Inst_UnivF'], $_POST['Pais'], $_POST['CedulaID']);


function ModificarFormacion($IDF, $Titulo_OF, $Ano_GF, $Inst_UnivF, $Pais, $CedulaID)
{
include'../Conexion.php';

foreach ($_POST['IDF'] as $IDF) 
{

	$Titulo_OF=mysqli_real_escape_string($conex, $_POST['Titulo_OF'][$IDF]);
	$Ano_GF=mysqli_real_escape_string($conex, $_POST['Ano_GF'][$IDF]);
    $Inst_UnivF=mysqli_real_escape_string($conex, $_POST['Inst_UnivF'][$IDF]);
    $Pais=mysqli_real_escape_string($conex, $_POST['Pais'][$IDF]);
    $CedulaID=mysqli_real_escape_string($conex, $_POST['CedulaID'][$IDF]);




$sentencia="UPDATE Inventario.Formacion_E SET Titulo_O= '".$Titulo_OF."', Ano_G= '".$Ano_GF."', Inst_Univ= '".$Inst_UnivF."', Pais= '".$Pais."' WHERE IDF='".$IDF."' ";
$resul=$conex->query($sentencia);

if($resul)
        {   
            echo "<script type='text/javascript'>
            alert('Sus Datos Han Sido Actualizados');
            window.location.href = '../superadmi/ModificarSUP.php?Cedula='+ $CedulaID +'';
        </script>";
        }

}
}


?>