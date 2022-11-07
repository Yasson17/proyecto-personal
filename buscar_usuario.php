<?php
session_start();

if(isset($_SESSION['usuarios']))
 { 
    ?>

<?php

$conexion=mysqli_connect('localhost','root','','administrador2');

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
  
  <div class="header" style="text-align:right;">  
  <div class="header_logo">
     <div align="right">
       <h2 style="color:black;" >SGDP ABAE<img style="background: #CA1818" src="./assets/avatar/logo.jpeg" class="img-fluid" alt="Avatar"></h2>
     </div>
    </div>
     
  </div>

  <section class="full-box page-content">
      <nav class="full-box navbar-info">
        <a href="#" class="float-left show-nav-lateral">
          <i class="fas fa-exchange-alt" ></i>
        </a>
         <?php  
                 echo " <a href='modificar_admi.php?Cedula=$consulta[0]'><i class='fas fa-user-cog'></i> &nbsp;Actualizar Contraseña  </a>";
              ?>
      &nbsp; &nbsp; &nbsp;  <a href="#" class="btn-exit-system">Salir
          <i class="fas fa-power-off"></i>
        </a>&nbsp; &nbsp; &nbsp;
      </nav>


        <!-- contenido de la pagina --> 

                        
                        <!-- proceso para mostrar el resultado de la buscqueda -->
                        
<?php

include("Conexion.php"); 

if(isset($_POST['Buscar']))
{
$datos=$_POST['datos'];
echo"<br>";
echo"<br>";
echo"<center>";
echo "<h4>Resultado de Busqueda Para $datos:</h4>";
echo"<center>";

echo"<br>";
echo"<br>";

}

$resulC = $conex->query("SELECT * FROM inventario.datos_p WHERE  Nombres LIKE '%$datos%' OR Cedula LIKE '%$datos%'");

$totalF=mysqli_num_rows($resulC);
    if($totalF>0)
{
  foreach ($resulC as $filas)
      {
        $muestra=$filas['status'];
      }
  
if ($muestra=='Activo') 
    {

echo"<div class='container-fluid'>";
                echo"<div class='table-responsive'>";
                    echo"<table class='table table-dark table-sm >";
                      echo"  <thead>";
                            echo"<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Nombres y Apellidos</th>
                                <th>Cedula de Identidad</th>
                                <th>Telefono</th>
                                <th>Correo Electronico</th>
                                <th>Mostrar</th>
                            </tr>";
                        echo"  </thead>";


foreach ($resulC as $filas)
      {
        $muestra=$filas['status'];

        if ($muestra=='Activo') 
        {
        echo "<tr class=' roboto-medium' style='background:white;color:black;'>";
          echo "<td >"; echo $filas['Nombres']; echo "</td>";
          echo "<td >"; echo $filas['Cedula']; echo "</td>";
          echo "<td >"; echo $filas['Telefono_Movil']; echo "</td>";
          echo "<td>"; echo $filas['Correo_Elect']; echo "</td>";
         
          echo "<td style='background:white;'>  <a href='consultaADMI.php?Cedula=".$filas['Cedula']."'> <button type='btn btn-success' style='border-color:white;background:white'> <i class='fa fa-eye' style='color:blue'></i> </button></a> </td>";
          }
      }

      echo"</table>";
                echo"</div>";
      }
  else{

echo"<center>";
echo "<h6>No Se Encontraron Resultados Para $datos:</h6>";
echo"<br>";
echo"<br>";

echo"</center>";

    }
  }
  else{

echo"<center>";
echo "<h6>No Se Encontraron Resultados Para $datos:</h6>";
echo"<br>";
echo"<br>";

echo"</center>";

  }
                        ?>
                
                    
                    <center>
  <a href="lista_empleados.php"><button type="button" class='btn btn-succes' style="background:#ffe65d;color:#0a0a0a;" ><strong>Aceptar</strong></button></a>
</center>
            
            </div>

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
