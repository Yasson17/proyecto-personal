<?php
session_start();

if(isset($_SESSION['usuarios']))
 { 
  include '../Conexion.php';

 if(isset($_GET['Cedula']))
{
$Cedula=$_GET['Cedula'];
}

    $sentencia="SELECT * FROM inventario.Datos_P WHERE Cedula='".$Cedula."' ";
    $resul=$conex->query($sentencia);
    if ($resul)
{
foreach ($resul as $fila)
{

    $Nombres=$fila['Nombres'];
}
}

?>

<?php
$senten="SELECT * FROM inventario.Datos_I WHERE CedulaID='".$Cedula."' ";
    $res=$conex->query($senten);
    if ($res)
{
foreach ($res as $fila)
{

    $Unidad_A=$fila['Unidad_A']; 
    $Cargo=$fila['Cargo'];
     
}
}
?>

<?php
$IDnoti=$_GET['IDnoti'];
$sentencia="SELECT * FROM inventario.Notificaciones WHERE IDnoti='".$IDnoti."' ";
    $res=$conex->query($sentencia);
    if ($res)
{
foreach ($res as $fila)
{
    $Supervisor=$fila['Supervisor'];
    $CargoS=$fila['CargoS'];
    $Dias=$fila['Periodo'];
    $Fecha_IV=$fila['Fecha_IV'];
     
}
}
?>



<?php


function sumasdiasemana($fecha,$dias)
{
    $datestart= strtotime($fecha);

    $diasemana = date('N',$datestart);
    $totaldias = $diasemana+$dias;
 
    $total = ($dias * 86400)+$datestart ;

    return $fechafinal = date('d-m-Y', $total);
}


//FECHA DE CULMINACIÓN
$Culmina = sumasdiasemana($Fecha_IV,$Dias);



$desinicio = explode('-', $Fecha_IV);
$Fecha_IV=$desinicio[2].'-'.$desinicio[1].'-'.$desinicio[0];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  
  <title>ABAE</title>


<!-- Normalize V8.0.1 -->
    <link rel="stylesheet" href="../css/normalize.css">

    <!-- Bootstrap V4.3 -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

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
    
    <!-- estilo general -->
    <link rel="stylesheet" href="../css/style_caja.css">
  


</head>

<body>

  <?php

 include ("../Conex.php");

$mom= $_SESSION['usuarios'];

  function ConsultarUsuario($con)
  {
    include ("../Conex.php");

    $conectado="SELECT * FROM administrador2.admi WHERE usuarios='".$con."' ";

    $resultado=$conex->query($conectado);

    foreach($resultado as $auxiliar)
    {

$aux=$auxiliar[2];
$cedu=$auxiliar[3];
   return[

$aux,$cedu,
];
   
    }
   }

   $consul=ConsultarUsuario($mom);
?>

<link rel="stylesheet" href="../css/bootstrap.min.css">
  
  <main class="full-box main-container">
    <!-- barra lateral -->
    <section class="full-box nav-lateral">
      <div class="full-box nav-lateral-bg show-nav-lateral"></div>
      <div class="full-box nav-lateral-content">
        <figure class="full-box nav-lateral-avatar">
          <i class="far fa-times-circle show-nav-lateral"></i>
          <img src="../assets/avatar/logo.jpeg" class="img-fluid" alt="Avatar">
          <figcaption class="roboto-medium text-center" style="background: #CA1818;color:white;">

             <?php echo $consul[0] ?> 

          </figcaption>
        </figure>
        <div class="full-box nav-lateral-bar"></div>
        <nav class="full-box nav-lateral-menu">
          <ul>
            <li>
              <a href="../administrador.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Panel de Control</a>
            </li>

                     <li>

              <a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Usuarios <i class="fas fa-chevron-down"></i></a>
              <ul>
                
                <li>
                  <a href="../lista_usuario.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de usuarios</a>
                </li>
                
              </ul>
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
                 echo " <a href='formu_reporte_vacaciones.php?Cedula=$Cedula'><i class='fas fa-file fa-fw'></i> &nbsp;Reporte de Vacaciones  </a>";
              ?>
                
                <?php  
                 echo " <a href='formulario_reposoA.php?Cedula=$Cedula'><i class='fas fa-file fa-fw'></i> &nbsp;Notificacion de Reposo  </a>";
              ?>

              <?php  
                 echo " <a href='formulario_constancia.php?Cedula=$Cedula'><i class='fas fa-file fa-fw'></i> &nbsp;Constancia de Trabajo</a>";
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

$sentencia="SELECT * FROM inventario.Notificaciones WHERE status='Aprobado_S' OR CedulaID='".$Cedula."'";

    $resul=$conex->query($sentencia);
    
    foreach ($resul as $fila) 
    {
      $C_U=$fila['Cedula'];
    }

    if(isset($C_U))
      {
        echo "<a style='background:red;color:white;' href='Index_reportesA.php?Cedula=$Cedula'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones  </a>";
      }
      else
      {
      echo "<a href='Index_reportesA.php?Cedula=$Cedula'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones  </a>";
      }
      ?>



</li>
<li>
<a href="../index_inhactivos.php" ><i class="fas fa-list fa-fw"></i>
    Lista de Inactivos</i>
                           </a>
                        </li>
            <li>
              <a href="#" class="btn-exit-system">
          <i class="fas fa-power-off"> Cerrar Sesion</i>
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

 <!-- pagina central -->
    
    <section class="full-box page-content" >
      <nav class="full-box navbar-info" >
        <a href="#" class="float-left show-nav-lateral">
          <i class="fas fa-exchange-alt" style="background: yellow"></i>
        </a>
            
         &nbsp; &nbsp; &nbsp;<a href="#" class="btn-exit-system">Salir
          <i class="fas fa-power-off"></i>&nbsp; &nbsp; &nbsp;
        </a>
      </nav>
  



     <center> 
    <form action="../reportes/Reposo.php" method="post">
       <div class="container-fluid">
  <div class='table-responsive'> 
          <table class='table table-red table-sm'>
         
<br>
  <center>
  <h2>Datos y Periodo de Reposo Del Solicitante</h2>
  </center>
    
 <div class="col-12 col-md-6">
  <div class="form-group">

   <thead>
     <tr class="text-center roboto-medium" style="background:#5D6D7E;"> 
        <th> Nombres y Apellidos </th>
        <th> Cedula de Identidad</th>
        <th> Cargo </th>
        <th> Unidad de Adscripción</th>
     
        
     </tr>
        </thead>

         <tr style='background:white;' class='text-center roboto-medium'>    
        <th><input type="texto" name="Nombres" value="<?php echo $Nombres ?>"readonly></th>
        <th> <input type="texto" name="Cedula" value="<?php echo $Cedula?>"readonly> </th>
        <th> <input type="texto" name="Cargo" value="<?php echo $Cargo?>"readonly> </th>
        <th> <input type="texto" name="Unidad_A" value="<?php echo $Unidad_A?>" readonly> </th>
        
    </tr>
 

     <center>
   <thead>
        <th><br></th>
        <th></th>
        <th></th>
        <th></th>
      <tr class="text-center roboto-little" style="background:#5D6D7E;" > 
        <th>Supervisor Inmediato</th>
        <th>Cargo</th>
        <th>N° de Dias de Reposo  </th>
        <th>Fecha de Inicio</th>
     
     </tr>

        </thead>

     </center>   
         <tr style='background:white;' class='text-center roboto-medium'>    

        <th><input type="texto" name="Supervisor" value="<?php echo $Supervisor?>" readonly></th>
        <th> <input type="texto" name="CargoS" value="<?php echo $CargoS?>" readonly> </th>
        <th> <input type="texto" name="Dias" value="<?php echo $Dias?>" readonly> </th>
        <th> <input type="texto" name="Fecha_IR" value="<?php echo $Fecha_IV?>" readonly> </th>

        
    </tr>



     <center>
   <thead>
        <th><br></th>
        <th></th>
        <th></th>
        <th></th>
      <tr class="text-center roboto-little" style="background:#5D6D7E;" > 
        <th>Fecha de Culminación</th>
        <th></th>
        <th></th>
        <th></th>

     </tr>

        </thead>

     </center>   
         <tr style='background:white;' class='text-center roboto-medium'>    
        <th> <input name="Culmina" value="<?php echo $Culmina?>" readonly> </th>
        <th></th>

        <th></th>
         </th>

        <th></th>
        
        <th></th>

    <th> <input type="hidden" name="sin" value="<?php echo $consulta[1]?>" readonly> </th>

         </th>
        
    </tr>

        <th> <input type="hidden" name="CedulaID" value="<?php echo $CedulaID?>" readonly> </th>
        
        <th> <input type="hidden" name="super" value="supervi" readonly> </th>

        <th> <input type="hidden" name="recur" value="recur" readonly> </th>
        <th> <input type="hidden" name="F" value="F" readonly> </th>

        <th> <input type="hidden" name="enviarCedu" value="<?php echo $consul[1]?>" readonly> </th>
        
        <th> <input type="hidden" name="IDnoti" value="<?php echo $IDnoti?>" readonly> </th>
        <th> <input type="hidden" name="No" value="No" readonly> </th>

         </th>
        
    </tr>

 
     
        </div>
</div>
</table>
</div>
       <h5>PARA APROBAR LA SOLICITUD PRESIONE "Validar Solicitud", SI NO DESEA APROBAR PRESIONE "No Validar Solicitud"</h5>
   
<table> 
<tr>
  <br>
        <button type="submit" class='btn btn-succes' value="Validar Solicitud" name="Gene" style="background:#ffe65d;color:#0a0a0a;" ><strong>Validar Solicitud</strong></button>&nbsp; &nbsp;

        <button type="submit" class='btn btn-succes' value="No Validar Solicitud" name="GeneR" style="background:#000077;color:white;" ><strong>No Validar Solicitud</strong></button>&nbsp; &nbsp;

</tr>

     </table>
</div>
    </form> 
      </center>

         <br>
   <br>

    <br>
    <br>
    <br>
  	<br>
     <br>
  	<br>   
  	<br>    <br>
  	<br>
       <br>
      </section>
</main>
  
<script src="../jquery/jquery-3.3.1.min.js"></script>    
    <script src="../popper/popper.min.js"></script>      
    <script src="../bootstrap4/js/bootstrap.min.js"></script>    
    <script src="../jqueryUI/jquery-ui-1.12.1/jquery-ui.min.js"></script>  
    <script src="../codigo.js"></script>       
  <script src="../js/jquery.mCustomScrollbar.concat.min.js" ></script>
  <script src="../js/bootstrap-material-design.min.js" ></script>
  <script>$(document).ready(function() { $('body').bootstrapMaterialDesign(); });</script>
  <script src="../js/salir.js" ></script>
  
</body>
</html>

<?php
}else{
    echo '<script> window.location="../login.php"; </script>';
}
?>