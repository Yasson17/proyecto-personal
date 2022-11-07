<?php
session_start();

if(isset($_SESSION['usuarios']))
 { 
    ?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Administrador</title>

    <!-- Normalize V8.0.1 -->
    <link rel="stylesheet" href="./css/normalize.css">

    <!-- Bootstrap V4.3 -->
    <link rel="stylesheet" href="./css/bootstrap.min.css">

<link rel="stylesheet" href="estilos/est.css" >
    <!-- Bootstrap Material Design V4.0 -->
    <link rel="stylesheet" href="./css/bootstrap-material-design.min.css">

    <!-- Font Awesome V5.9.0 -->
    <link rel="stylesheet" href="./css/all.css">

    <!-- Sweet Alerts V8.13.0 CSS file -->
    <link rel="stylesheet" href="./css/sweetalert2.min.css">

    <!-- Sweet Alert V8.13.0 JS file-->
    <script src="./js/sweetalert2.min.js" ></script>

    <!-- jQuery Custom Content Scroller V3.1.5 -->
    <link rel="stylesheet" href="./css/jquery.mCustomScrollbar.css">
    
    <!-- General Styles -->
    <link rel="stylesheet" href="./css/style_caja.css">
    <script type="text/javascript">

function mostrarPassw(){
        var cambio = document.getElementById("Password");
        if(cambio.type == "password"){
            cambio.type = "text";
            $('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
        }else{
            cambio.type = "password";
            $('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
        }
    }; 
    
</script>

</head>
<body>

<!-- estilo para la cabecera -->
<style type="text/css">


.header_logo{

  display:table-cell;
  text-align:center;
  vertical-align:middle;  
    border:white solid 1px;
    margin:0 0 0 2px;
    align-items: center;
    width: 10%;
     max-height:10%;
     min-height:10%;
}

.header img {
     max-height:10%;
     min-height:10%;
     width:10%;
}


</style>
    
<?php

$conexion=mysqli_connect('localhost','root','','administrador2');

  ?>


 <!-- php para mostrar nombre del administrador-->

  <?php

include ('Conex.php');

$mom= $_SESSION['usuarios'];

  function ConsultarUsuario($con)
  {
    include 'Conex.php';

    $conectado="SELECT * FROM administrador2.admi WHERE usuarios='".$con."' ";

    $resultado=$conex->query($conectado);

    foreach($resultado as $auxiliar)
    {

$aux=$auxiliar[2];
$aux1=$auxiliar[3];
   return[
$aux1,
$aux,
];
   
    }
   }
 $consulta=ConsultarUsuario($mom);
  
?>
    
<!-- Proceso para mostrar si tiene notificacion -->
<?php 

$cedl=$consulta[0];

  function totalFila($ced)
  {
    $host='localhost';
$username='root';
$password='';
$database='Administrador2';
$status='Activo';
$status2='Recibido';
$mis_enviados='Enviado';


    $conn = new mysqli($host,$username,$password,$database);

$notifi = "SELECT * FROM inventario.notificaciones WHERE status='Enviado' AND CedulaID='".$ced."'";
$notifi1 = "SELECT * FROM inventario.notificaciones WHERE status='Aprobado_S' OR status='Envio_C'";
;


if ($resulnoti=mysqli_query($conn,$notifi)){

$totalfilanoti=mysqli_num_rows($resulnoti);

}
if ($resulnoti1=mysqli_query($conn,$notifi1)){

$totalfilanoti1=mysqli_num_rows($resulnoti1);

}

$totalfilanoti=$totalfilanoti+$totalfilanoti1;


return[
$totalfilanoti,

];

}

$consulT=totalFila($cedl);

 ?>

    <!-- Proceso para mostrar foto de perfil -->
<?php 

$cedl=$consulta[0];

  function foto($ced)
  {
    $host='localhost';
$username='root';
$password='';
$database='Administrador2';
$status='Activo';
$status2='Recibido';
$mis_enviados='Enviado';


    $conn = new mysqli($host,$username,$password,$database);

$foto = "SELECT * FROM inventario.documentos WHERE CedulaID='".$ced."'";


if ($resulfoto=mysqli_query($conn,$foto)){

$totalfilfoto=mysqli_num_rows($resulfoto);

}


if ($totalfilfoto>0) {

foreach ($resulfoto as  $actfoto) {
  
$archivo=$actfoto['archivo'];
$departamento=$actfoto['departamento'];

if (empty($departamento)){

$nombre=$archivo;

}
   }


 
      }

else{

$nombre=0;

}
return[
$nombre,
];

}
$nombre= foto($cedl);

 ?>
    <link rel="stylesheet" href="./css/bootstrap.min.css">
  
  <main class="full-box main-container">
    <!-- barra lateral -->
    <section class="full-box nav-lateral">
      <div class="full-box nav-lateral-bg show-nav-lateral"></div>
      <div class="full-box nav-lateral-content">
        <figure class="full-box nav-lateral-avatar">
          <i class="far fa-times-circle show-nav-lateral"></i>
         <img src="<?php echo $nombre[0] ?>" class="img-fluid" alt="Avatar">
          <figcaption class="roboto-medium text-center" style="background: #CA1818;color:white;">
             <?php echo $consulta[1] ?> 

          </figcaption>
        </figure>
        <div class="full-box nav-lateral-bar"></div>
        <nav class="full-box nav-lateral-menu">
          <ul>
            <li>
              <a href="administrador.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Panel de Control</a>
            </li>


            <li>
              <a href="#" class="nav-btn-submenu"><i class="fas fa-pallet fa-fw"></i> &nbsp; Empleados <i class="fas fa-chevron-down"></i></a>
              <ul>
                
               <li>
                  <a href="lista_empleados.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Empleados</a>
                </li>
                
              </ul>
            </li>
<?php  
   echo"<li>
              <a href='#' class='nav-btn-submenu'><i class='fas fa-list fa-fw'></i> &nbsp; Solicitudes <i class='fas fa-chevron-down'></i></a>
              <ul>";
                   
?>
              <?php  
                 echo " <a href='Notificaciones/formu_reporte_vacaciones.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Reporte de Vacaciones  </a>";
              ?>
                
                <?php  
                 echo " <a href='Notificaciones/formulario_reposoA.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificacion de Reposo  </a>";
              ?>
              <?php  
                 echo " <a href='Notificaciones/formulario_constancia.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Constancia de Trabajo</a>";
              ?>
<li>
  <a href="#" class="nav-btn-submenu"><i class="fas fa-list fa-fw"></i> &nbsp; Formatos Vacios <i class="fas fa-chevron-down"></i></a>
   <ul>

                 <?php  
                 echo " <a href='reportes/Reporte_Vaca_vacio.php'><i class='fas fa-file fa-fw'></i> &nbsp;Vacaciones  </a>";
              ?>
                <?php  
                 echo " <a href='reportes/Reporte_Reposo_Vacio.php'><i class='fas fa-file fa-fw'></i> &nbsp;Reposo  </a>";
              ?>

</ul>

</li>


</ul>
</li>
<li>
            <?php  


    if($consulT[0]!=0)
      {
        echo "<a style='background:#CA1818;color:white;' href='Index_reportesA.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones  </a>";
      }
      else
      {
      echo "<a href='Index_reportesA.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones  </a>";
      }
      ?>



</li>
                        <li>
                             <a href="#" class="btn-exit-system">
                    <i class="fas fa-power-off"></i> Cerrar Sesion
                </a>
                        </li>
                        
                    </ul>
                </nav>
                <br>
            </div>
        </section>

<!-- Cabecera -->

<div class="header" style="text-align:right;">  
  <div class="header_logo">
     <div align="right">
       <h2 style="color:black;" >SGDP ABAE<img style="background: #CA1818" src="./assets/avatar/logo.jpeg" class="img-fluid" alt="Avatar"></h2>
     </div>
    </div>
     
  </div>


        <!-- pagina central -->
        
        <section class="full-box page-content">
            <nav class="full-box navbar-info">
                <a href="#" class="float-left show-nav-lateral">
                    <i class="fas fa-exchange-alt"></i>
                </a>
         <?php  

include("Conexion.php"); 

if(isset($_GET['Cedula']))
{
$Cedula=$_GET['Cedula'];
}


if ($Cedula==$consulta[0]) {
  
 echo "<a href='Modificar.php?Cedula=".$consulta[0]."'> <i class='fa fa-sync-alt'></i>&nbsp;Actualizacion de Datos  </a>";


}

        
?>
              
              
                &nbsp;&nbsp;&nbsp;&nbsp;<a href="#" class="btn-exit-system">Salir
                    <i class="fas fa-power-off"></i>&nbsp;&nbsp;&nbsp;&nbsp;
                </a>
            </nav>





<?php


include("Conexion.php"); 

if(isset($_GET['Cedula']))
{
$Cedula=$_GET['Cedula'];
}
$resul = $conex->query("SELECT * FROM inventario.Datos_P WHERE `Cedula` LIKE '$Cedula' ORDER BY `Cedula` DESC");

$totalF=mysqli_num_rows($resul);

if ($totalF>0)
{
    echo"<br>";
    echo"<center>";
echo"<h3>Datos Personales</h3>";
echo "</center>";
echo"<br>";
foreach ($resul as $fila)
{

$firma=$fila['Firma'];
if ($firma) {
$desF=explode('/', $firma);

if(empty($desF[2]))
{
  $firma=$desF[0].'/'.$desF[1]; 
}
else
{
$firma=$desF[1].'/'.$desF[2];     
}
}

echo "<div class='table-responsive'>";
                    echo "<table class='table table-dark table-sm'>";
                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Nombres y Apellidos</th>
                                <th>Cedula de Identidad</th>
                                <th>Lugar de Nacimiento</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Edad</th>
                                <th> Sexo</th>
                            </tr>";
                       echo"</thead>";


    echo "<tr>
    <td style='background:white;' class='text-center roboto-medium'>".$fila["Nombres"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Cedula"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Lugar_N"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Fecha_N"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Edad"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Sexo"]."</td></tr>";


                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Estado Civil</th>
                                <th>Derecho</th>
                                <th>Zurdo</th>
                                <th>Talla de Camisa</th>
                                <th>Talla de Pantalon</th>
                                <th> Talla de Calzado</th>
                            </tr>";
                       echo"</thead>";
echo " <tr>
<td style='background:white;' class='text-center roboto-medium'>".$fila["Estado_Civil"]."</td>".
"<td style='background:white;' class='text-center roboto-medium'>". $fila["Derecho"]."</td>".
"<td style='background:white;' class='text-center roboto-medium'>". $fila["Zurdo"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Talla_Camisa"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Talla_Pantalon"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Talla_Calzado"]."</td>"."</td>
    </tr>"; 

                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Estatura</th>
                                <th>Peso</th>
                                <th>Direccion de Domicilio</th>
                                <th>Estado</th>
                                <th>Municipio</th>
                                <th> Parroquia</th>
                            </tr>";
                       echo"</thead>";
    echo "<tr>
    <td style='background:white;' class='text-center roboto-medium'>".$fila["Estatura"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Peso"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Direccion_domicilio"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Estado"]."</td>"."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Municipio"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Parroquia"]."</td></tr>";

   
                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Telefono de Habitacion</th>
                                <th>Telefono Movil</th>
                                <th>Otro Numero</th>
                                <th>Correo Electronico</th>
                                <th>R.I.F</th>
                                <th> Nro. De Telefono en caso de emergencia</th>
                            </tr>";
                       echo"</thead>";

    echo "<tr>
    <td style='background:white;' class='text-center roboto-medium'>".$fila["Telefono_Habitacion"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Telefono_Movil"]."</td>"."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Otro_numero"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Correo_Elect"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["RIF"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Nro_Tlfn_Emergencia"]."</td>"."</td>
    </tr>";
    

                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Nombre de persona en caso de emergencia</th>
                                <th>Alergia a:</th>
                                <th>Tipo de sangre:</th>
                                <th>Padece alguna enfermedad cronica</th>
                                <th>Nombre del conyugue</th>
                                <th> Nro_Hijos</th>
                            </tr>";
                       echo"</thead>";


    echo "<tr>
    <td style='background:white;' class='text-center roboto-medium'>".$fila["Nombre_Tlfn_Emergencia"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["alergia_a"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Tipo_Sangre"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Padece_Enferm_Cronica"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Nombre_Conyuge"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Nro_Hijos"]."</td>
    </tr>";

                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Si esta embarazada indique:</th>
                                <th>Meses de gestacion</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>";
                       echo"</thead>";

 echo "<tr>
    <tr>
   
    <td style='background:white;' class='text-center roboto-medium'>".$fila["Si_Embarazo"]."</td>".
    "<td style='background:white;' class='text-center roboto-medium'>". $fila["Meses_Gestacion"]."</td>
    <td style='background:white;'></td>
    <td style='background:white;'></td>
    <td style='background:white;'></td>
    <td style='background:white;'></td>
    </tr>";


    echo "</table>";
    ?>
<center>
<img src="<?php echo $firma?>" width="10%"> <br>Firma Actual
</center>
<?php
echo "</div>";
}
}
   
?>
  
                            <tr>
                           
                                <th><br><br></th>
                            </tr>
                

<?php
include("Conexion.php"); 

if(isset($_GET['Cedula']))
{


$CedulaID=$_GET['Cedula'];

}

$resul = $conex->query("SELECT * FROM inventario.Datos_H WHERE CedulaID='".$CedulaID."'");

$totalF=mysqli_num_rows($resul);
if ($totalF>0)
{
    echo "<br>";
echo"<center>";
echo"<h3>Datos De Hijos</h3>";
echo "</center>"; 
echo "<br>";
foreach ($resul as $fila)
{

echo "<div class='table-responsive'>";
                    echo "<table class='table table-dark table-sm'>";
                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Nombres y Apellidos</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Edad</th>
                                <th>Cedula de Identidad</th>
                                <th>Sexo</th>
                                <th> Grado de Estudio</th>
                            </tr>";
                       echo"</thead>";

 echo "<tr>
    <th style='background:white;' class='text-center roboto-medium'>". $fila["Nombres"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Fecha_N"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>".$fila["Edad"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Cedula"]."</th>"."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Sexo"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Grado_e"]."</th>
    </tr>";




                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Talla de Camisa</th>
                                <th>Talla de Pantalon</th>
                                <th>Talla de Calzados</th>
                                <th>Cedula de Identidad</th>
                                <th>Sexo</th>
                                <th> Grado de Estudio</th>
                            </tr>";
                       echo"</thead>";



                         echo "
    <th style='background:white;' class='text-center roboto-medium'>".$fila["Camisa"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Pantalon"]."</th>"."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Calzados"]."</th>
    <th style='background:white;'></th>
    <th style='background:white;'></th>
    <th style='background:white;'></th>
    </tr>";
 echo "</table>";
echo "</div>";

}
}
?>
                
                            <tr>
                           
                                <th><br><br></th>
                            </tr>
                        
<?php
include("Conexion.php"); 

if(isset($_GET['Cedula']))
{


$CedulaID=$_GET['Cedula'];

}

$resul = $conex->query("SELECT * FROM inventario.Nucleo_F WHERE CedulaID='".$CedulaID."'");
$totalF=mysqli_num_rows($resul);
if ($totalF>0)
{
    echo "<br>";
 echo"<center>";
echo"<h3>Nucleo Familiar</h3>";
echo "</center>";
 echo "<br>";
foreach ($resul as $fila)
{

echo "<div class='table-responsive'>";
                    echo "<table class='table table-dark table-sm'>";
                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Parentesco</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Cedula de Identidad</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Edad</th>
                            </tr>";
                       echo"</thead>";



 echo "<tr>
    <th style='background:white;' class='text-center roboto-medium'>". $fila["Parentesco"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Nombres"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>".$fila["Apellidos"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Cedula"]."</th>"."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Fecha_N"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Edad"]."</th>
    <tr>";



                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Sexo</th>
                                <th>Estado Civil</th>
                                <th>Grado de Instruccion</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>";
                       echo"</thead>";
    echo "<tr>
    <th style='background:white;' class='text-center roboto-medium'>".$fila["Sexo"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Estado_C"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Grado_I"]."</th>
    <th style='background:white;'></th>
    <th style='background:white;'></th>
    <th style='background:white;'></th>
    </tr >";
echo "</table>";
echo "</div>";

}
}
?>

                            <tr>
                                <th><br><br></th>
                            </tr>
<?php
include("Conexion.php"); 

if(isset($_GET['Cedula']))
{


$CedulaID=$_GET['Cedula'];

}

$resul = $conex->query("SELECT * FROM inventario.Nivel_A WHERE CedulaID='".$CedulaID."'");
$totalF=mysqli_num_rows($resul);
if ($totalF>0)
{
    echo "<br>";
    echo"<center>";
echo"<h3>Ninel Academico</h3>";
echo "</center>";
echo "<br>";
foreach ($resul as $fila)
{


echo "<div class='table-responsive'>";
                    echo "<table class='table table-dark table-sm'>";
                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Especializacion</th>
                                <th>Titulo Obtenido</th>
                                <th>Año de Graduado</th>
                                <th>Instituto/Universidad</th>
                                <th>Observaciones</th>
                                <th></th>
                            </tr>";
                       echo"</thead>";

 echo "<tr>
    <th style='background:white;' class='text-center roboto-medium'>". $fila["Especializacion"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Titulo_O"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>".$fila["Ano_G"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Inst_Univ"]."</th>"."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Observaciones"]."</th>
    <th style='background:white;'></th>
    </tr>";

echo "</table>";
echo "</div>";    

}
}
?>
                              <tr>
                           
                                <th><br><br></th>
                            </tr>

<?php
include("Conexion.php"); 

if(isset($_GET['Cedula']))
{


$CedulaID=$_GET['Cedula'];

}

$resul = $conex->query("SELECT * FROM inventario.Formacion_E WHERE CedulaID='".$CedulaID."'");

$totalF=mysqli_num_rows($resul);
if ($totalF>0)
{
    echo "<br>";
echo"<center>";
echo"<h3>Formacion en el Exterior</h3>";
echo "</center>";
echo "<br>";
foreach ($resul as $fila)
{

echo "<div class='table-responsive'>";
                    echo "<table class='table table-dark table-sm'>";
                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Titulo Obtenido</th>
                                <th>Año de Graduado</th>
                                <th>Instituto/Universidad</th>
                                <th>Instituto/Universidad</th>
                                <th>Pais</th>
                                <th></th>
                            </tr>";
                       echo"</thead>";
 echo "<tr>
    <th style='background:white;' class='text-center roboto-medium'>". $fila["Titulo_O"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Ano_G"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>".$fila["Inst_Univ"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Pais"]."</th>
    <th style='background:white;'></th>
    <th style='background:white;'></th>
    </tr>";

echo "</table>";
echo "</div>"; 

}
}
?>

                            <tr>
                           
                                <th><br><br></th>
                            </tr>
<?php
include("Conexion.php"); 

if(isset($_GET['Cedula']))
{


$CedulaID=$_GET['Cedula'];

}

$resul = $conex->query("SELECT * FROM inventario.Experiencia_L WHERE CedulaID='".$CedulaID."'");

$totalF=mysqli_num_rows($resul);
if ($totalF>0)
{
   echo "<br>";
 echo"<center>";
echo"<h3>Experiencia Laboral en la Administracion Publica</h3>";
echo "</center>";
echo "<br>";
foreach ($resul as $fila)
{


echo "<div class='table-responsive'>";
                    echo "<table class='table table-dark table-sm'>";
                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Organismo</th>
                                <th>Fecha de Ingreso</th>
                                <th>Fecha de Egreso</th>
                                <th>Cargo</th>
                                <th>Posee Antecedentes de Servicio</th>
                                <th></th>
                            </tr>";
                       echo"</thead>";

 echo "<tr>
    <th style='background:white;' class='text-center roboto-medium'>". $fila["Organismo"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Fecha_I"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>".$fila["Fecha_E"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Cargo"]."</th>"."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Antecedentes_S"]."</th>
    <th style='background:white;'></th>
     </tr>";

     echo "</table>";
echo "</div>"; 
}
}
?>

                            <tr>
                           
                                <th><br><br></th>
                            </tr>
            
<?php
include("Conexion.php"); 

if(isset($_GET['Cedula']))
{


$CedulaID=$_GET['Cedula'];

}

$resul = $conex->query("SELECT * FROM inventario.Datos_I WHERE CedulaID='".$CedulaID."'");

$totalF=mysqli_num_rows($resul);
if ($totalF>0)
{
   echo "<br>";
 echo"<center>";
echo"<h3>Datos Laborales en la Institucion</h3>";
echo "</center>";
echo "<br>";
foreach ($resul as $fila)
{


echo "<div class='table-responsive'>";
                    echo "<table class='table table-dark table-sm'>";
                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Fecha de Ingreso en ABAE</th>
                                <th>Cargo</th>
                                <th>Sede</th>
                                <th>Direccion de Adscripcion</th>
                                <th>Unidad de Adscripcion</th>
                                <th>Jefe Inmediato</th>
                            </tr>";
                       echo"</thead>";
 echo "<tr>
    <th style='background:white;' class='text-center roboto-medium'>". $fila["FechaI_ABAE"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Cargo"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>".$fila["Sede"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Direccion_A"]."</th>"."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Unidad_A"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Jefe_I"]."</th>
    </tr>";

            echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Fecha de Inicio de Servicio en la Administracion Publica</th>
                                <th>Total Años de Servicios</th>
                                <th>Correo Electronico Institucional</th>
                                <th>Telefono de Oficina/EXT</th>
                                <th>Posee Familiares en ABAE</th>
                                <th>Indique Nombres y Apellidos</th>
                            </tr>";
                       echo"</thead>";
 echo "<tr>
    <th style='background:white;' class='text-center roboto-medium'>".$fila["FechaI_Servicio"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["TotalA_Serv"]."</th>"."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["CorreoE_Ins"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Telefono_O_Ext"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>".$fila["Familiares_ABAE"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Nombres"]."</th>"."</th>
    </tr>";


 echo "</table>";
echo "</div>"; 

}
}
?>
                            <tr>
                           
                                <th><br><br></th>
                            </tr>
                       
<?php
include("Conexion.php"); 

if(isset($_GET['Cedula']))
{


$CedulaID=$_GET['Cedula'];

}

$resul = $conex->query("SELECT * FROM inventario.Datos_M WHERE CedulaID='".$CedulaID."'");

$totalF=mysqli_num_rows($resul);
if ($totalF>0)
{
echo "<br>";
       echo"<center>";
echo"<h3>En Caso de ser Personal en Comision de Servicio (Civil o Militar)</h3>";
echo "</center>";
echo "<br>";
foreach ($resul as $fila)
{


    
echo "<div class='table-responsive'>";
                    echo "<table class='table table-dark table-sm'>";
                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Fecha de Inicio de Servicio en la Administracion Publica</th>
                                <th>Años de Servicios</th>
                                <th>Instituto, Ente o Componente de Procedencia</th>
                                <th>Rango Militar</th>
                                <th>Tiempo de la Comision de Servicio</th>
                                <th>Fecha de Inicio de la Comision de Servicio</th>
                            </tr>";
                       echo"</thead>";
 echo "<tr>
    <th style='background:white;' class='text-center roboto-medium'>". $fila["FechaI_Servicio"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Ano_S"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>".$fila["Institu_P"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Rango_M"]."</th>"."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["TiempoC_S"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["FechaI_Ser"]."</th>
    </tr>";

                     echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Fecha de Culminacion de la Comision de Servicio</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>";
                       echo"</thead>";
    echo "<tr>
    <th style='background:white;' class='text-center roboto-medium'>".$fila["FechaC_Ser"]."</th> </th>
    <th style='background:white;'></th>
    <th style='background:white;'></th>
    <th style='background:white;'></th>
    <th style='background:white;'></th>
    <th style='background:white;'></th>    
    </tr>";

echo "</table>";
echo "</div>";

}
}
?>
                            <tr>
                           
                                <th><br><br></th>
                            </tr>

<?php
include("Conexion.php"); 

if(isset($_GET['Cedula']))
{


$CedulaID=$_GET['Cedula'];

}

$resul = $conex->query("SELECT * FROM inventario.Otros WHERE CedulaID='".$CedulaID."'");

$totalF=mysqli_num_rows($resul);
if ($totalF>0)
{
         echo "<br>";
      echo"<center>";
echo"<h3>Otros</h3>";
echo "</center>";
echo "<br>";
foreach ($resul as $fila)
{

echo "<div class='table-responsive'>";
                    echo "<table class='table table-dark table-sm'>";
                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Facebook</th>
                                <th>Twiter</th>
                                <th>Instagram</th>
                                <th>Otros</th>
                                <th>Posee Carnet de la Patria</th>
                                <th>Codigo del Carnet de la Patria</th>
                            </tr>";
                       echo"</thead>";

 echo "<tr>
    <th style='background:white;' class='text-center roboto-medium'>". $fila["Facebook"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Twitter"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>".$fila["Instagram"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Otros"]."</th>"."</th>
    <th style='background:white;' class='text-center roboto-medium'>". $fila["Carnet_P"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Codigo_C"]."</th>
    </tr>";

                 echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Serial del Carnet de la Patria</th>
                                <th>Beneficios que Percibe</th>
                                <th>Posee Carnet del PSUV</th>
                                <th>Codigo del Carnet del PSUV</th>
                                <th>Serial del Carnet del PSUV</th>
                                <th>Beneficios que Percibe</th>
                            </tr>";
                       echo"</thead>";

 echo "<tr>
    <th style='background:white;' class='text-center roboto-medium'>".$fila["Serial_C"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>".$fila["Beneficios_P"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Carnet_PSUV"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Codigo_P"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>".$fila["Serial_P"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>".$fila["Beneficios_PP"]."</th>
    </tr>";

                    echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Pertenece a Algun Partido Politico</th>
                                <th>Pertenece a Algun Movimiento Social</th>
                                <th>Pertenece a Alguna Comuna o Consejo Comunal</th>
                                <th>Es Usted Vocero en Alguna Comuna o Consejo Comunal</th>
                                <th>Recibe Beneficios de la Caja CLAP</th>
                                <th>Posee Vivienda Propia Alquilada o Familiar</th>
                            </tr>";
                       echo"</thead>";

 echo "<tr>
    <th style='background:white;' class='text-center roboto-medium'>". $fila["Partido_P"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Mov_S"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>".$fila["Comuna"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>".$fila["Vocero"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Caja_Clap"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Vivienda"]."</th>
</tr>";

                 echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Tipo de Vivienda</th>
                                <th>Posee Vehiculo Propio</th>
                                <th>Tipo de Vehiculo</th>
                                <th>Utiliza Transporte Publico</th>
                                <th>Indique Cual</th>
                                <th>Describa Brevemente la Ruta que Utiliza Para Trasladarse al Lugar de Trabajo</th>
                            </tr>";
                       echo"</thead>";
 echo "<tr>
    <th style='background:white;' class='text-center roboto-medium'>".$fila["Tipo_V"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>".$fila["Vehiculo"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Tipo_Veh"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>". $fila["Transporte_P"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>".$fila["Cual"]."</th>".
    "<th style='background:white;' class='text-center roboto-medium'>".$fila["Descrip_R"]."</th>
    </tr >";

      echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Practica Algun Deporte o Actividad Cultural</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>";
                       echo"</thead>";
 echo "<tr>
 <
    <th style='background:white;' class='text-center roboto-medium'>". $fila["Depor_Cult"]."</th>
    <th style='background:white;'></th>
    <th style='background:white;'></th>
    <th style='background:white;'></th>
    <th style='background:white;'></th>
    <th style='background:white;'></th>
    </tr>";


       echo "</table>";
    echo "</div>";                     
}
}
?>

               <center>
  <a href="administrador.php"><button type="button" class='btn btn-succes' style="background:#ffe65d;color:#0a0a0a;" ><strong>Aceptar</strong></button></a>
</center>      <br>
                <br>
                <br>
                <br>
                <br>
                <br>
        </section>
     </main>





<script src="jquery/jquery-3.3.1.min.js"></script>      
    <script src="popper/popper.min.js"></script>            
    <script src="bootstrap4/js/bootstrap.min.js"></script>      
    <script src="jqueryUI/jquery-ui-1.12.1/jquery-ui.min.js"></script>  
    <script src="codigo.js"></script>       
    <script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
    <script src="js/bootstrap-material-design.min.js" ></script>
    <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
    <script src="js/salir.js" ></script>
    
</body>
</html>

<?php
}else{
    echo '<script> window.location="login.php"; </script>';
}
?>
