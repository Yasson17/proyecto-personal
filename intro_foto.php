<?php include ('conexion.php');


$rutaservidor='imagen';
$rutatemporal=$_FILES['image']['tmp_name'];
$nombreimagen=$_FILES['image']['name'];
$rutadestino=$rutaservidor.'/'.$nombreimagen;
move_uploaded_file($rutatemporal,$rutadestino);


$cedula=$_POST['ci'];
$redireccion=$_POST['redireccion'];



$insertar="UPDATE inventario.documentos SET archivo='".$rutadestino."' WHERE CedulaID='".$cedula."' ";

 $resul=$conex->query($insertar);

if($resul){

if ($redireccion=='usuario') {
 	
 
echo "<script type='text/javascript'>
    alert('Foto Actualizada Correctamente');
    window.location.href='usuario.php';
</script>";
} 	
else if ($redireccion=='admi') {

echo "<script type='text/javascript'>
    alert('Foto Actualizada Correctamente');
    window.location.href='administrador.php';
</script>";


}
else

{
echo "<script type='text/javascript'>
    alert('Archivo Agregado Correctamente');
    window.location.href='superadmi/superadmi.php';
</script>";


}

	}
?>