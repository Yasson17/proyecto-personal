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

  

  <link rel="stylesheet" href="./css/bootstrap.min.css">
  
  <main class="full-box main-container">
    <!-- barra lateral -->
    <section class="full-box nav-lateral">
      <div class="full-box nav-lateral-bg show-nav-lateral"></div>
      <div class="full-box nav-lateral-content">
        <figure class="full-box nav-lateral-avatar">
          <i class="far fa-times-circle show-nav-lateral"></i>
          <img src="./assets/avatar/es.png" class="img-fluid" alt="Avatar">
          <figcaption class="roboto-medium text-center" style="background: red;color:white;">
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

              <a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Usuarios <i class="fas fa-chevron-down"></i></a>
              <ul>
                
                <li>
                  <a href="lista_usuario.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de usuarios</a>
                </li>
                
              </ul>
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

$sentencia="SELECT * FROM inventario.Notificaciones WHERE status='Aprobado_S' OR CedulaID='".$consulta[0]."'";

    $resul=$conex->query($sentencia);
    
    foreach ($resul as $fila) 
    {
      $C_U=$fila['Cedula'];
    }

    if(isset($C_U))
      {
        echo "<a style='background:red;color:white;' href='Notificaciones/Index_reportesA.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones  </a>";
      }
      else
      {
      echo "<a href='Notificaciones/Index_reportesA.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones  </a>";
      }
      ?>


</li>
<li>
<a href="index_inhactivos.php" ><i class="fas fa-list fa-fw"></i>
    Lista de Inactivos</i>
                           </a>
                        
            
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
       <h2 style="color:black;" >SGDP ABAE<img style="background: red" src="./assets/avatar/logo.jpeg" class="img-fluid" alt="Avatar"></h2>
     </div>
    </div>
     
  </div>




    <!-- pagina central -->
    
    <section class="full-box page-content">
      <nav class="full-box navbar-info">
        <a href="#" class="float-left show-nav-lateral">
          <i class="fas fa-exchange-alt"></i>
        </a>
        <a href="#" class="btn-exit-system">Salir
          <i class="fas fa-power-off"></i> &nbsp;&nbsp;&nbsp;
        </a>
      </nav>
  
  	 
  		
     
  		<br>

  		<?php
      include "Conexion.php";
      $status='Inhactivo';

      $sentencia="SELECT * FROM administrador2.usuarios WHERE `status`='".$status."'";

      $resul=$conex->query($sentencia);
      

      $totalF=mysqli_num_rows($resul);
    if($totalF>0)
      {

echo "<center>";
     echo " <div class='container-fluid'>";
      echo "<h2>Usuarios Inactivos</h2>";
      echo "<br>";
      
       echo " <div class='table-responsive'>";
          echo "<table class='table table-dark table-sm'>";
           echo "<thead>";
               echo " <tr class='text-center roboto-medium' style='background:#5D6D7E;'>";
      
       echo " <th>Nombres y Apellidos</th>
        <th>Cedula</th>
        <th>Usuario</th>
        <th>Mostrar</th>
        <th>Reactivar</th>";
            echo "</tr>";
      echo "</thead>";


      foreach($resul as $filas)
      {

        echo "<tr style='background:white;' class='text-center roboto-medium' style='background:#5D6D7E;'>";
          echo "<td>"; echo $filas['nombre']; echo "</td>";
          echo "<td>"; echo $filas['ci']; echo "</td>";
          echo "<td>"; echo $filas['usuarios']; echo "</td>";

          echo "<td> <a href='consultaADMI.php?Cedula=".$filas['ci']."''><button type='button' class='btn btn-danger'>Mostrar</button></a> </td>";

          echo "<td> <a href='Rehabilitar.php?Cedula=".$filas['ci']."''><button type='button' class='btn btn-danger'>Reactivar</button></a> </td>";
      }

      echo "</table>";
      echo "</div>";
      echo "</div>";
        echo "</center>";

      }
else{
echo "<center>";
      echo "<h6>No hay usuarios Inactivos</h6>";

echo "</center>";
}
        
      ?>

   <br>
   <br>

    <br>
  	<br>
 

      <center>
  <a href="administrador.php"><button type="button" class='btn btn-succes' style="background:#ffe65d;color:#0a0a0a;" ><strong>Aceptar</strong></button></a>
</center>
       <br>
      <br>
  </section>
  </main>






  <script src="autojs/calcuEdadH.js" ></script>
  <script src="js/jquery-3.4.1.min.js" ></script>
  <script src="js/popper.min.js" ></script>
  <script src="js/jquery.mCustomScrollbar.concat.min.js" ></script>
  <script src="js/bootstrap-material-design.min.js" ></script>
  <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
  <script src="js/salir.js" ></script>
    <script src="js/jquery.backstretch.min.js"></script>
    <script src="js/scripts.js"></script>


</body>
</html>

<?php
}else{
    echo '<script> window.location="login.php"; </script>';
}
?>