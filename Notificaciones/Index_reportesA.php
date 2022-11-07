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
    <link rel="stylesheet" href="../css/normalize.css">

    <!-- Bootstrap V4.3 -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

<link rel="stylesheet" href="../estilos/est.css" >
    <!-- Bootstrap Material Design V4.0 -->
    <link rel="stylesheet" href="../css/bootstrap-material-design.min.css">

    <!-- Font Awesome V5.9.0 -->
    <link rel="stylesheet" href="../css/all.css">

    <!-- Sweet Alerts V8.13.0 CSS file -->
    <link rel="stylesheet" href="../css/sweetalert2.min.css">

    <!-- Sweet Alert V8.13.0 JS file-->
    <script src="../js/sweetalert2.min.js" ></script>

    <!-- jQuery Custom Content Scroller V3.1.5 -->
    <link rel="stylesheet" href="../css/jquery.mCustomScrollbar.css">
    
    <!-- General Styles -->
    <link rel="stylesheet" href="../css/style_caja.css">

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

include ('../Conex.php');

$mom= $_SESSION['usuarios'];

  function ConsultarUsuario($con)
  {
    include '../Conex.php';

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
 
<link rel="stylesheet" href="../css/bootstrap.min.css">
  
  <main class="full-box main-container">
    <!-- barra lateral -->
    <section class="full-box nav-lateral">
      <div class="full-box nav-lateral-bg show-nav-lateral"></div>
      <div class="full-box nav-lateral-content">
        <figure class="full-box nav-lateral-avatar">
          <i class="far fa-times-circle show-nav-lateral"></i>
          <img src="../<?php echo $nombre[0] ?>" class="img-fluid" alt="Avatar">
          <figcaption class="roboto-medium text-center" style="background: #CA1818;color:white;">


             <?php echo $consulta[1] ?> 

          </figcaption>
        </figure>
        <div class="full-box nav-lateral-bar"></div>
        <nav class="full-box nav-lateral-menu">
          <ul>
            <li>
              <a href="../administrador.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Panel de Control</a>
            </li>



            <li>
              <a href="#" class="nav-btn-submenu"><i class="fas fa-pallet fa-fw"></i> &nbsp; Empleados <i class="fas fa-chevron-down"></i></a>
              <ul>
                
                <li>
                  <a href="../lista_empleados.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Empleados</a>
                </li>
                
              </ul>
            </li>

<?php  
   echo"<li>
              <a href='#' class='nav-btn-submenu'><i class='fas fa-list fa-fw'></i> &nbsp; Solicitudes <i class='fas fa-chevron-down'></i></a>
              <ul>";
                   
?>
              <?php  
                 echo " <a href='formu_reporte_vacaciones.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Reporte de Vacaciones  </a>";
              ?>
                
                <?php  
                 echo " <a href='formulario_reposoA.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificacion de Reposo  </a>";
              ?>
              <?php  
                 echo " <a href='formulario_constancia.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Constancia de Trabajo</a>";
              ?>
<li>
  <a href="#" class="nav-btn-submenu"><i class="fas fa-list fa-fw"></i> &nbsp; Formatos Vacios <i class="fas fa-chevron-down"></i></a>
   <ul>

                 <?php  
                 echo " <a href='../reportes/Reporte_Vaca_vacio.php'><i class='fas fa-file fa-fw'></i> &nbsp;Vacaciones  </a>";
              ?>
                <?php  
                 echo " <a href='../reportes/Reporte_Reposo_Vacio.php'><i class='fas fa-file fa-fw'></i> &nbsp;Reposo  </a>";
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
   
  <div class="header_text">
    
  </div>
  <div class="header_logo">
     <div align="right">
       <h2 style="color:black;" >SGDP ABAE<img src="../assets/avatar/logo.jpeg" class="img-fluid" alt="Avatar"></h2>
     </div>
    </div>
     
  </div>



  

  <section class="full-box page-content">
      <nav class="full-box navbar-info">
        <a href="#" class="float-left show-nav-lateral">
          <i class="fas fa-exchange-alt" ></i>
        </a>

<!-- php para mostrar si el administrador ha registrado los datos o no-->
<?php 
include '../conexion.php';
$ci=$consulta[0];
$ti='admin';

   $cons="SELECT * FROM inventario.Datos_P WHERE Cedula='".$ci."' ";
    $resul=$conex->query($cons);
   $totalF=mysqli_num_rows($resul);
    if($totalF==0)
    {


 echo " <a href='../formulario.php?Cedula=$consulta[0]'><i class='fas fa-clipboard-list'></i> &nbsp;Registro de Datos</a> &nbsp; &nbsp; &nbsp;";

$_SESSION['datos']=2;
    }

?>

         <?php  

                 echo " <a href='../modificar_admi.php?Cedula=$consulta[0]'><i class='fas fa-user-cog'></i> &nbsp;Actualizar Contraseña </a>";

      echo "&nbsp; &nbsp; &nbsp;  <a href='#' class='btn-exit-system'>Salir
          <i class='fas fa-power-off'></i>&nbsp; &nbsp; &nbsp;
        </a>";
     
      

              ?>
     </nav>

  
     
      
     
      <br>
      <br>

      <?php
      include "../Conexion.php";
      $sentencia="SELECT * FROM inventario.Notificaciones WHERE `status`= 'Aprobado_S' OR `status`= 'Menviado' OR CedulaID='".$consulta[0]."'";


      $resul=$conex->query($sentencia);
      
    if($resul)
      {

      echo "<center>";
      echo " <div class='container-fluid'>";
      echo "<h2>Solicitudes Recientes</h2>";
      echo "<br>";
      
      echo " <div class='table-responsive'>";
      echo "<table class='table table-dark table-sm'>";
      echo "<thead>";
      echo " <tr class='text-center roboto-medium' style='background:#5D6D7E;'>";
      

      echo " <th>Nombres y Apellidos</th>
        <th>Cedula de Identidad</th>
        <th>Periodo (s)</th>
        <th>Fecha de Inicio</th>
        <th>Tipo de Solicitud</th>
        <th>Estado</th>
        <th>Mostrar</th>
        <th>Eliminar</th>
        ";
      echo "</tr>";
      echo "</thead>";


      foreach($resul as $filas)
      {
        $status=$filas['status'];
        $CedulaID=$filas['CedulaID'];


        if(($filas['status']=='Menviado') && ($filas['Cedula']==$consulta[0]))
        {
         echo "<tr style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'>";
          echo "<td>"; echo $filas['Nombres']; echo "</td>";
          echo "<td>"; echo $filas['Cedula']; echo "</td>";
          echo "<td>"; echo ""; echo "</td>"; 
          echo "<td>"; echo ""; echo "</td>";
          echo "<td>"; echo $filas['Tipo']; echo "</td>";

          echo "<td>"; echo "Esperando Respuesta."; echo "</td>";

          echo "<td style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'> <a href=interacciona.php?Cedula=".$filas['Cedula']."&IDnoti=".$filas['IDnoti']." '><button type='button' class='btn btn-danger'>Mostrar</button></a> </td>";

          echo "<td style='background:white;'> <a href='Eliminar.php?Cedula=".$consulta[0]."&IDnoti=".$filas['IDnoti']."&Tipo=".$ti."'><button type='btn btn-success' class='btn btn-danger'><i class='fa fa-trash' style='color:red'></i></button></a> </td>";
          }

      else if((($status=='Aprobado_S')&&($CedulaID==$consulta[0])) || (($status=='Enviado')&&($CedulaID==$consulta[0])) || ($status=='Aprobado_S'))
      {
        echo "<tr style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'>";
          echo "<td>"; echo $filas['Nombres']; echo "</td>";
          echo "<td>"; echo $filas['Cedula']; echo "</td>";

          if($filas['Tipo']=='Vacaciones')
          {
            echo "<td>"; echo $filas['Periodo']; echo "</td>";
          }
          else
          {
            echo "<td>"; echo $filas['Periodo']." Dias"; echo "</td>"; 
          }

          echo "<td>"; echo $filas['Fecha_IV']; echo "</td>";
          echo "<td>"; echo $filas['Tipo']; echo "</td>";

          
            echo "<td>"; echo "Esperando su Aprobación."; echo "</td>";
          

          if($filas['Tipo']=='Vacaciones')
          {
          echo "<td style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'> <a href='Aprobación_RRHH.php?Cedula=".$filas['Cedula']."&IDnoti=".$filas['IDnoti']."'><button type='button' class='btn btn-danger'>Mostrar</button></a> </td>";
          }
          else
          {
            echo "<td style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'> <a href='Aprobación_RRRHH.php?Cedula=".$filas['Cedula']."&IDnoti=".$filas['IDnoti']."'><button type='button' class='btn btn-danger'>Mostrar</button></a> </td>";
          }

          echo "<td style='background:white;'> <a href='Eliminar.php?Cedula=".$consulta[0]."&IDnoti=".$filas['IDnoti']."&Tipo=".$ti."'><button type='btn btn-success' class='btn btn-danger'><i class='fa fa-trash' style='color:red'></i></button></a> </td>";
        }
        
      }

      echo "</table>";
      echo "</div>";
      echo "</div>";
        echo "</center>";

      }
        
      ?>

   <br>
   <br>


<?php
      include "../Conexion.php";
      $sentencia="SELECT * FROM inventario.Notificaciones WHERE `status`= 'Inhabilitado' OR `status`= 'Respondido' OR `status`= 'Apro_C'";


      $resul=$conex->query($sentencia);
      
        if($resul)
      {

      echo "<center>";
      echo " <div class='container-fluid'>";
      echo "<h2>Solicitudes Aprobadas</h2>";
      echo "<br>";
      
      echo " <div class='table-responsive'>";
      echo "<table class='table table-dark table-sm'>";
      echo "<thead>";
      echo " <tr class='text-center roboto-medium' style='background:#5D6D7E;'>";
      

      echo " <th>Nombres y Apellidos</th>
        <th>Cedula de Identidad</th>
        <th>Periodo (s)</th>
        <th>Fecha de Inicio</th>
        <th>Tipo de Solicitud</th>
        <th>Estado</th>
        <th>Mostrar</th>
        <th>Eliminar</th>
        ";
      echo "</tr>";
      echo "</thead>";


      foreach($resul as $filas)
      {
        $status=$filas['status'];
        $Ce=$filas['Cedula'];

      if(($filas['Cedula']==$consulta[0]) && ($filas['CedulaID']==$filas['IDnoti']))
        {
         echo "<tr style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'>";
          echo "<td>"; echo $filas['Nombres']; echo "</td>";
          echo "<td>"; echo $filas['Cedula']; echo "</td>";
          echo "<td>"; echo "No Disponible"; echo "</td>"; 
          echo "<td>"; echo "No Disponible"; echo "</td>";
          echo "<td>"; echo $filas['Tipo']; echo "</td>";

          echo "<td>"; echo "Mensaje Respondido."; echo "</td>";

          echo "<td style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'> <a href=interacciona.php?Cedula=".$filas['Cedula']."&IDnoti=".$filas['IDnoti']." '><button type='button' class='btn btn-danger'>Mostrar</button></a> </td>";

          echo "<td style='background:white;'> <a href='Eliminar.php?Cedula=".$consulta[0]."&IDnoti=".$filas['IDnoti']."&Tipo=".$ti."'><button type='btn btn-success' class='btn btn-danger'><i class='fa fa-trash' style='color:red'></i></button></a> </td>";
          }

        if($filas['status']=='Apro_C')
        {
         echo "<tr style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'>";
          echo "<td>"; echo $filas['Nombres']; echo "</td>";
          echo "<td>"; echo $filas['Cedula']; echo "</td>";
          echo "<td>"; echo "No Disponible"; echo "</td>"; 
          echo "<td>"; echo "No Disponible"; echo "</td>";
          echo "<td>"; echo $filas['Tipo']; echo "</td>";

          echo "<td>"; echo "Aprobada por RRHH"; echo "</td>";

          echo"<td style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'> <a href='Aprobación_C.php?Cedula=".$filas['Cedula']."&IDnoti=".$filas['IDnoti']."'><button type='button' class='btn btn-danger'>Mostrar</button></a> </td>";

          echo "<td style='background:white;'> <a href='Eliminar.php?Cedula=".$consulta[0]."&IDnoti=".$filas['IDnoti']."&Tipo=".$ti."'><button type='btn btn-success' class='btn btn-danger'><i class='fa fa-trash' style='color:red'></i></button></a> </td>";
          }
          if($filas['status']=='Inhabilitado')
          {


        echo "<tr style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'>";
          echo "<td>"; echo $filas['Nombres']; echo "</td>";
          echo "<td>"; echo $filas['Cedula']; echo "</td>";


            echo "<td>"; echo $filas['Periodo']; echo "</td>";

          echo "<td>"; echo $filas['Fecha_IV']; echo "</td>";
          echo "<td>"; echo $filas['Tipo']; echo "</td>";
          
            echo "<td>"; echo "Aprobado por RRHH"; echo "</td>";
          

          if($filas['Tipo']=='Vacaciones')
          {
          echo "<td style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'> <a href='Aprobación_RRHH.php?Cedula=".$filas['Cedula']."&IDnoti=".$filas['IDnoti']."'><button type='button' class='btn btn-danger'>Mostrar</button></a> </td>";
          }
          else
          {
            echo "<td style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'> <a href='Aprobación_RRRHH.php?Cedula=".$filas['Cedula']."&IDnoti=".$filas['IDnoti']."'><button type='button' class='btn btn-danger'>Mostrar</button></a> </td>";
          }

          echo "<td style='background:white;'> <a href='Eliminar.php?Cedula=".$consulta[0]."&IDnoti=".$filas['IDnoti']."&Tipo=".$ti."'><button type='btn btn-success' class='btn btn-danger'><i class='fa fa-trash' style='color:red'></i></button></a> </td>";
          }
      }

      echo "</table>";
      echo "</div>";
      echo "</div>";
        echo "</center>";

      }
        
      ?>


 <br>
   <br>

<?php
      include "../Conexion.php";
      $sentencia="SELECT * FROM inventario.Notificaciones WHERE `status`= 'Envio_C'";


      $resul=$conex->query($sentencia);
      
    if($resul)
      {

      echo "<center>";
      echo " <div class='container-fluid'>";
      echo "<h2>Solicitudes para Constancias de Trabajo</h2>";
      echo "<br>";
      
      echo " <div class='table-responsive'>";
      echo "<table class='table table-dark table-sm'>";
      echo "<thead>";
      echo " <tr class='text-center roboto-medium' style='background:#5D6D7E;'>";
      

      echo " <th>Nombres y Apellidos</th>
        <th>Cedula de Identidad</th>
        <th>Tipo de Solicitud</th>
        <th>Descripción</th>
        <th>Estado</th>
        <th>Mostrar</th>
        <th>Eliminar</th>
        ";
      echo "</tr>";
      echo "</thead>";


      foreach($resul as $filas)
      {
        $status=$filas['status'];
        $CedulaID=$filas['CedulaID'];

      if($status=='Envio_C')
      {
        echo "<tr style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'>";
          echo "<td>"; echo $filas['Nombres']; echo "</td>";
          echo "<td>"; echo $filas['Cedula']; echo "</td>";

            echo "<td>"; echo $filas['Tipo']; echo "</td>"; 

          echo "<td>"; echo $filas['Descripcion']; echo "</td>";

          
            echo "<td>"; echo "Esperando su Aprobación"; echo "</td>";
          


            echo "<td style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'> <a href='Aprobación_C.php?Cedula=".$filas['Cedula']."&IDnoti=".$filas['IDnoti']."'><button type='button' class='btn btn-danger'>Mostrar</button></a> </td>";


          echo "<td style='background:white;'> <a href='Eliminar.php?Cedula=".$consulta[0]."&IDnoti=".$filas['IDnoti']."&Tipo=".$ti."'><button type='btn btn-success' class='btn btn-danger'><i class='fa fa-trash' style='color:red'></i></button></a> </td>";
        }
        
      }

      echo "</table>";
      echo "</div>";
      echo "</div>";
        echo "</center>";

      }
        
      ?>

<br>
   <br>



<?php
      include "../Conexion.php";
      $sentencia="SELECT * FROM inventario.Notificaciones WHERE `status`= 'general'";

      $resulo=$conex->query($sentencia);
      
    if($resulo)
      {

      echo "<center>";
      echo " <div class='container-fluid'>";
      echo "<h2>Notificaciones General Enviadas</h2>";
      echo "<br>";
      
      echo " <div class='table-responsive'>";
      echo "<table class='table table-dark table-sm'>";
      echo "<thead>";
      echo " <tr class='text-center roboto-medium' style='background:#5D6D7E;'>";
      

      echo " <th>Nombres y Apellidos</th>
        <th>Cedula de Identidad</th>
        <th>Tipo de Solicitud</th>
        <th>Descripción</th>
        <th>Estado</th>
        <th>Mostrar</th>
        ";
      echo "</tr>";
      echo "</thead>";


      foreach($resulo as $filas)
      {
        $status=$filas['status'];
        $Ce=$filas['Cedula'];
        if($status=='general')
        {
         echo "<tr style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'>";
          echo "<td>"; echo $filas['Nombres']; echo "</td>";
          echo "<td>"; echo $filas['Cedula']; echo "</td>";
          echo "<td>"; echo "NOTIFICACIÓN GENERAL"; echo "</td>"; 
          echo "<td>"; echo $filas['Tipo']; echo "</td>";

          echo "<td>"; echo "Enviada a Todo el Personal"; echo "</td>";

          echo "<td style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'> <a href=interacciona.php?Cedula=".$filas['Cedula']."&IDnoti=".$filas['IDnoti']." '><button type='button' class='btn btn-danger'>Mostrar</button></a> </td>";
          }
          }

      echo "</table>";
      echo "</div>";
      echo "</div>";
        echo "</center>";

      }
        
      ?>


 <br>
   <br>

<?php
      include "../Conexion.php";
      $sentencia="SELECT * FROM inventario.Notificaciones WHERE `status`= 'No' OR `status`= 'No_C'";


      $resul=$conex->query($sentencia);
      
        if($resul)
      {

      echo "<center>";
      echo " <div class='container-fluid'>";
      echo "<h2>Solicitudes No Aprobadas</h2>";
      echo "<br>";
      
      echo " <div class='table-responsive'>";
      echo "<table class='table table-dark table-sm'>";
      echo "<thead>";
      echo " <tr class='text-center roboto-medium' style='background:#5D6D7E;'>";
      

      echo " <th>Nombres y Apellidos</th>
        <th>Cedula de Identidad</th>
        <th>Periodo (s)</th>
        <th>Fecha de Inicio</th>
        <th>Tipo de Solicitud</th>
        <th>Estado</th>
        <th>Mostrar</th>
        <th>Eliminar</th>
        ";
      echo "</tr>";
      echo "</thead>";


      foreach($resul as $filas)
      {
        if($filas['status']=='No')
        {
         echo "<tr style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'>";
          echo "<td>"; echo $filas['Nombres']; echo "</td>";
          echo "<td>"; echo $filas['Cedula']; echo "</td>";

          if($filas['Tipo']=='Vacaciones')
          {
            echo "<td>"; echo $filas['Periodo']; echo "</td>";
          }
          else
          {
            echo "<td>"; echo $filas['Periodo']." Dias"; echo "</td>"; 
          }

          echo "<td>"; echo $filas['Fecha_IV']; echo "</td>";
          echo "<td>"; echo $filas['Tipo']; echo "</td>";

            echo "<td>"; echo "No Aprobada por RRHH"; echo "</td>";

          if($filas['Tipo']=='Vacaciones')
          {
          echo "<td style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'> <a href='Aprobación_RRHH.php?Cedula=".$filas['Cedula']."&IDnoti=".$filas['IDnoti']."'><button type='button' class='btn btn-danger'>Mostrar</button></a> </td>";
          }
          else
          {
            echo "<td style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'> <a href='Aprobación_RRRHH.php?Cedula=".$filas['Cedula']."&IDnoti=".$filas['IDnoti']."'><button type='button' class='btn btn-danger'>Mostrar</button></a> </td>";
          }

          echo "<td style='background:white;'> <a href='Eliminar.php?Cedula=".$consulta[0]."&IDnoti=".$filas['IDnoti']."&Tipo=".$ti."'><button type='btn btn-success' class='btn btn-danger'><i class='fa fa-trash' style='color:red'></i></button></a> </td>";
      }

      if($filas['status']=='No_C')
        {
         echo "<tr style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'>";
          echo "<td>"; echo $filas['Nombres']; echo "</td>";
          echo "<td>"; echo $filas['Cedula']; echo "</td>";
          echo "<td>"; echo "No Disponible"; echo "</td>"; 
          echo "<td>"; echo "No Disponible"; echo "</td>";
          echo "<td>"; echo $filas['Tipo']; echo "</td>";

          echo "<td>"; echo "No Aprobada por RRHH"; echo "</td>";

          echo "<td style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'> <a href='Aprobación_C.php?Cedula=".$filas['Cedula']."&IDnoti=".$filas['IDnoti']."'><button type='button' class='btn btn-danger'>Mostrar</button></a> </td>";

          echo "<td style='background:white;'> <a href='Eliminar.php?Cedula=".$consulta[0]."&IDnoti=".$filas['IDnoti']."&Tipo=".$ti."'><button type='btn btn-success' class='btn btn-danger'><i class='fa fa-trash' style='color:red'></i></button></a> </td>";
          }
        }
      

      echo "</table>";
      echo "</div>";
      echo "</div>";
        echo "</center>";
      }

      
        
      ?>      


   <br>
   <br>

    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
 


       <br>
      <br>
  </section>
  </main>




	<script src="../autojs/calcuEdadH.js" ></script>
	<script src="../js/jquery-3.4.1.min.js" ></script>
	<script src="../js/popper.min.js" ></script>
	<script src="../js/jquery.mCustomScrollbar.concat.min.js" ></script>
	<script src="../js/bootstrap-material-design.min.js" ></script>
	<script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
	<script src="../js/salir.js" ></script>
    <script src="../js/jquery.backstretch.min.js"></script>
    <script src="../js/scripts.js"></script>


</body>
</html>

<?php
}else{
    echo '<script> window.location="login.php"; </script>';
}
?>