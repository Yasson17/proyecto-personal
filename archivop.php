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

$consulta = "SELECT * FROM inventario.documentos where IDdoc='".$ID."' ";

$result=$conex->query($consulta);

foreach ($result as  $filas) 
{
$datos=$filas['archivo'];
$tipo=$filas['tipo'];
}


?>

<?php
echo "
<div align='center'>
<iframe src='documentos/$datos' width='100%' height='760' frameborder='no'  frameborder='0'></iframe>
</div>";

?>
    </body>

</html>
