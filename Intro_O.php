<?php
//CONEXION CON LA BASE DE DATOS
include("Conexion.php"); 

if(isset($_POST['Enviar']))
{
$Facebook=$_POST['Facebook'];
$Twitter=$_POST['Twitter'];
$Instagram=$_POST['Instagram'];
$Otros=$_POST['Otros'];
$Carnet_P=$_POST['Carnet_P'];
$Codigo_C=$_POST['Codigo_C'];
$Serial_C=$_POST['Serial_C'];
$Beneficios_P=$_POST['Beneficios_P'];
$Carnet_PSUV=$_POST['Carnet_PSUV'];
$Codigo_P=$_POST['Codigo_P'];
$Serial_P=$_POST['Serial_P'];
$Beneficios_PP=$_POST['Beneficios_PP'];
$Partido_P=$_POST['Partido_P'];
$Mov_S=$_POST['Mov_S'];
$Comuna=$_POST['Comuna'];
$Vocero=$_POST['Vocero'];
$Caja_Clap=$_POST['Caja_Clap'];
$Vivienda=$_POST['Vivienda'];
$Tipo_V=$_POST['Tipo_V'];
$Vehiculo=$_POST['Vehiculo'];
$Tipo_Veh=$_POST['Tipo_Veh'];
$Transporte_P=$_POST['Transporte_P'];
$Cual=$_POST['Cual'];
$Descrip_R=$_POST['Descrip_R'];
$Depor_Cult=$_POST['Depor_Cult'];
$CedulaID=$_POST['CedulaID'];
$status=$_POST['status'];



$llen="SELECT * FROM inventario.otros WHERE CedulaID='".$CedulaID."' ";

$ESTA=$conex->query($llen);

$total=mysqli_num_rows($ESTA);

    if($total==0)
{

$insert = "INSERT INTO inventario.Otros (`Facebook`, `Twitter`, `Instagram`, `Otros`, `Carnet_P`, `Codigo_C`, `Serial_C`, `Beneficios_P`, `Carnet_PSUV`, `Codigo_P`, `Serial_P`, `Beneficios_PP`, `Partido_P`, `Mov_S`, `Comuna`, `Vocero`, `Caja_Clap`, `Vivienda`, `Tipo_V`, `Vehiculo`, `Tipo_Veh`, `Transporte_P`, `Cual`, `Descrip_R`, `Depor_Cult`, `CedulaID`, `status`) VALUES ('$Facebook','$Twitter','$Instagram','$Otros','$Carnet_P','$Codigo_C','$Serial_C','$Beneficios_P','$Carnet_PSUV','$Codigo_P', 'Serial_P', '$Beneficios_PP','$Partido_P','$Mov_S','$Comuna','$Vocero','$Caja_Clap','$Vivienda','$Tipo_V','$Vehiculo','$Tipo_Veh','$Transporte_P','$Cual','$Descrip_R','$Depor_Cult', '$CedulaID', '$status')"; 

$resul= $conex->query($insert);

session_start();

$conectado=$_SESSION['usuarios'];

$conec="SELECT * FROM administrador2.usuarios WHERE usuarios='".$conectado."' ";

    $res=$conex->query($conec);

$totalF=mysqli_num_rows($res);
    if($totalF>0)
{

 	//Redireccionando si es usuario
    echo "<script type='text/javascript'>
	window.location.href='usuario.php';
</script>";
 }


$conectado=$_SESSION['usuarios'];

$conec="SELECT * FROM administrador2.admi WHERE usuarios='".$conectado."' ";

    $res=$conex->query($conec);

$totalF=mysqli_num_rows($res);
    if($totalF>0)
{

  //Redireccionando si es usuario
    echo "<script type='text/javascript'>
  window.location.href='administrador.php';
</script>";
 }


else{

//Redireccionando si es administrador
    echo "<script type='text/javascript'>
window.location.href='superadmi/superadmi.php';
</script>";



}
}




else
{

session_start();

$conectado=$_SESSION['usuarios'];

$conec="SELECT * FROM administrador2.usuarios WHERE usuarios='".$conectado."' ";

    $res=$conex->query($conec);

$totalF=mysqli_num_rows($res);
    if($totalF>0)
{

  //Redireccionando si es usuario
    echo "<script type='text/javascript'>
      alert('Otros Datos Ya Se Encuentran Registrados');
  window.location.href='usuario.php';
</script>";
 }


$conectado=$_SESSION['usuarios'];

$conec="SELECT * FROM administrador2.admi WHERE usuarios='".$conectado."' ";

    $res=$conex->query($conec);

$totalF=mysqli_num_rows($res);
    if($totalF>0)
{

  //Redireccionando si es usuario
    echo "<script type='text/javascript'>
      alert('Otros Datos Ya Se Encuentran Registrados');
  window.location.href='administrador.php';
</script>";
 }


else{

//Redireccionando si es administrador
    echo "<script type='text/javascript'>
    alert('Otros Datos Ya Se Encuentran Registrados');
window.location.href='superadmi/superadmi.php';
</script>";



}
}



}

