<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
<?php
include 'Conexion.php';
      
$ID=$_GET['ID'];
$Ced=$_GET['Cedula'];
$t=$_GET['t'];
$consulta = "SELECT * FROM inventario.documentos where IDdoc='".$ID."' ";

$result=$conex->query($consulta);

foreach ($result as  $filas) 
{
$datos=$filas['archivo'];
$tipo=$filas['tipo'];
}


?>
             
<?php

if($t=='ad')
{
echo "<div align='center'>
<iframe src='documentos/$datos' width='100%' height='760' frameborder='no'  frameborder='0'></iframe>
</div>";

echo "<script type='text/javascript'>
    alert('El Documento a Sido Descargado Exitosamente.');
    window.location.href='lista_doc.php?Cedula='+$Ced+'';
    </script>";
}
else
{
	echo "<div align='center'>
<iframe src='documentos/$datos' width='100%' height='760' frameborder='no'  frameborder='0'></iframe>
</div>";

echo "<script type='text/javascript'>
    alert('El Documento a Sido Descargado Exitosamente.');
    window.location.href='superadmi/lista_asistencias.php?Cedula='+$Ced+'';
    </script>";
}

?>

    </body>

</html>
