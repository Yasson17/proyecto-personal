<?php
//CONEXION CON LA BASE DE DATOS
include("Conexion.php"); 

session_start();

$usu=$_SESSION['usuarios'];

if(isset($_POST['Enviar']))
{

$rutaservidor='imagen';
$rutatemporal=$_FILES['image']['tmp_name'];
$nombreimagen=$_FILES['image']['name'];
$rutadestino=$rutaservidor.'/'.$nombreimagen;
move_uploaded_file($rutatemporal,$rutadestino);

$Nombres=$_POST['Nombres'];
$Cedula=$_POST['Cedula'];
$Nacimiento=$_POST['Nacimiento'];
$Fnacimiento=$_POST['Fnacimiento'];
$Edad=$_POST['Edad'];
$Sexo=$_POST['Sexo'];
$EstadoC=$_POST['EstadoC'];


$rutaser='imagen';
$rutatemp='logo.jpeg';
$rutadesti=$rutaser.'/'.$rutatemp;
move_uploaded_file($rutatemp,$rutadesti);


$inserta="INSERT INTO inventario.documentos(archivo,CedulaID)
values ('".$rutadesti."','".$Cedula."')";

 $res=$conex->query($inserta);


if($_POST['Perfil']=="D")   
{
    $Derecho="X";
	$Zurdo=" ";
}
else
{
    $Derecho=" ";
	$Zurdo="X";
}

$TallaC=$_POST['TallaC'];
$TallaP=$_POST['TallaP'];
$TallaZ=$_POST['TallaZ'];
$Estatura=$_POST['Estatura'];
$Peso=$_POST['Peso'];
$DireccionD=$_POST['DireccionD'];
$Estado=$_POST['Estado'];
$Municipio=$_POST['Municipio'];
$Parroquia=$_POST['Parroquia'];
$TelefonoH=$_POST['TelefonoH'];
$TelefonoM=$_POST['TelefonoM'];
$OtroN=$_POST['OtroN'];
$Correo=$_POST['Correo'];
$Rif=$_POST['Rif'];
$TelefonoE=$_POST['TelefonoE'];
$NombresE=$_POST['NombresE'];
$Alergia=$_POST['Alergia'];
$Sangre=$_POST['Sangre'];
$Cronica=$_POST['Cronica'];
$NombreC=$_POST['NombreC'];
$NumeroH=$_POST['NumeroH'];
$Embarazo=$_POST['Embarazo'];
$Meses=$_POST['Meses'];
$rutadestino;
$status='Activo';


$lleno="SELECT * FROM inventario.datos_p WHERE Cedula='".$Cedula."' ";

$dado=$conex->query($lleno);

$totalF=mysqli_num_rows($dado);

    if($totalF==0)
{

$insert = "INSERT INTO inventario.datos_p (`Nombres`, `Cedula`, `Lugar_N`, `Fecha_N`, `Edad`, `Sexo`, `Estado_Civil`, `Derecho`, `Zurdo`, `Talla_Camisa`, `Talla_Pantalon`, `Talla_Calzado`, `Estatura`, `Peso`, `Direccion_domicilio`, `Estado`, `Municipio`, `Parroquia`, `Telefono_Habitacion`, `Telefono_Movil`, `Otro_numero`, `Correo_Elect`, `RIF`, `Nro_Tlfn_Emergencia`, `Nombre_Tlfn_Emergencia`, `alergia_a`, `Tipo_Sangre`, `Padece_Enferm_Cronica`, `Nombre_Conyuge`, `Nro_Hijos`, `Si_Embarazo`, `Meses_Gestacion`,`Firma`, `status`) VALUES ('$Nombres','$Cedula','$Nacimiento','$Fnacimiento','$Edad','$Sexo','$EstadoC','$Derecho','$Zurdo','$TallaC','$TallaP','$TallaZ','$Estatura','$Peso','$DireccionD','$Estado','$Municipio','$Parroquia','$TelefonoH','$TelefonoM','$OtroN','$Correo','$Rif','$TelefonoE','$NombresE','$Alergia','$Sangre','$Cronica','$NombreC','$NumeroH','$Embarazo','$Meses','$rutadestino', '$status')"; 

$resul= $conex->query($insert);






$con="SELECT * FROM administrador2.superadmi WHERE ci='".$Cedula."' ";

$aux=$conex->query($con);

$totalF=mysqli_num_rows($aux);
    if($totalF==0)
{


$insertarsuper = "UPDATE Administrador2.superadmi SET nombre='".$Nombres."', ci='".$Cedula."'  WHERE usuarios='".$usu."'"; 

$resultado= $conex->query($insertarsuper);
}


 if($resul)
 {
 	//Redireccionando
    if($NumeroH>0)
    {
    echo"<script type='text/javascript'>
 		window.location.href='inf_hijos.php';
  		</script>";
    }

    else{ 
    	echo"<script type='text/javascript'>
 	window.location.href='inf_nucleofamili.php';
  		</script>";
    }

 }

}


else
{

 if($NumeroH>0)
    {
    echo"<script type='text/javascript'>
    alert('Sus Datos Personales Ya Se Encuentran Registrados');
        window.location.href='inf_hijos.php';
        </script>";
    }

    else{ 
        echo"<script type='text/javascript'>
          alert('Sus Datos Personales Ya Se Encuentran Registrados');
    window.location.href='inf_nucleofamili.php';
        </script>";
    }



}
}


?>