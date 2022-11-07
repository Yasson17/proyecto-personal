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

    $Cargo=$fila['Cargo'];
    $Unidad_A=$fila['Unidad_A'];
     
}
}
?>


<?php
if (isset($_GET['IDnoti'])) 
{
  $IDnoti=$_GET['IDnoti'];

$sentencia="SELECT * FROM inventario.Notificaciones WHERE status='Respondido' or IDnoti='".$IDnoti."' ";
$res=$conex->query($sentencia);


if (isset($res))
{
foreach ($res as $fila)
{
  if (($fila['status']=='general') && ($fila['IDnoti']==$IDnoti))
  {
  $Descripcion=$fila['Descripcion'];
  $estadog=$fila['status'];
  }
  else if (($fila['status']=='Menviado') && ($fila['IDnoti']==$IDnoti)) 
  {
  $Descripcion=$fila['Descripcion'];
  $estado=$fila['status'];
  }
  else if ($fila['status']=='Respondido')
  {
    $estador=$fila['status'];
    if (($IDnoti==$fila['IDnoti']) && ($IDnoti==$fila['CedulaID'])) 
    {
    $Descripcion=$fila['Descripcion'];
    }
    else if(($IDnoti!=$fila['IDnoti']) && ($IDnoti==$fila['CedulaID'])) 
    {
    $Respuesta=$fila['Descripcion'];
    $IDno=$fila['IDnoti'];
    }
  }
}

}
}
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
    
    <!-- estilo general -->
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



  <!-- php para mostrar nombre del usuario -->
  <?php

include '../Conex.php';

$mom= $_SESSION['usuarios'];

  function ConsultarUsuario($con)
  {
    include '../Conex.php';

    $conectado="SELECT * FROM administrador2.usuarios WHERE usuarios='".$con."' ";

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

   $consulta=ConsultarUsuario($mom);
?>

<!-- Proceso para mostrar foto de perfil -->
<?php 

$cedl=$consulta[1];

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
else{

$nombre=0;

}

   }
 
      }


return[
$nombre,
];

}
$nombre= foto($cedl);

 ?>


<link rel="stylesheet" href="../css/bootstrap.min.css">
  
  <main class="full-box main-container" >
    <!-- barra lateral -->
    <section class="full-box nav-lateral" >
      <div class="full-box nav-lateral-bg show-nav-lateral"></div>
      <div class="full-box nav-lateral-content">
        <figure class="full-box nav-lateral-avatar">
          <i class="far fa-times-circle show-nav-lateral"></i>
          <img src="../<?php echo $nombre[0] ?>" class="img-fluid" alt="Avatar">
          <figcaption class="roboto-medium text-center" style="background:#ca1818">

             <?php echo $consulta[0] ?> 

          </figcaption>
        </figure>
        <div class="full-box nav-lateral-bar"></div>
        <nav class="full-box nav-lateral-menu">
          <ul>
            <li>
              <a href="../usuario.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Inicio</a>
            </li>

            <li>
              <a href="#" class="nav-btn-submenu"><i class="fas fa-user fa-fw"></i> &nbsp; Mis Datos ABAE <i class="fas fa-chevron-down"></i></a>
              <ul>
                

<?php  
                 echo " <a href='../consultaUSU.php?Cedula=$consulta[1]'><i class='fas fa-list fa-fw'></i> &nbsp;Mis Datos  </a>";
              ?>
                
                      <?php  
                 echo " <a href='../Modificar_U.php?Cedula=$consulta[1]'><i class='fas fa-list fa-fw'></i> &nbsp;Actualizacion de datos  </a>";
              ?>
                
              </ul>
            </li>
                     
<?php  


          echo"<li>
              <a href='#' class='nav-btn-submenu'><i class='fas fa-list fa-fw'></i> &nbsp; Solicitudes <i class='fas fa-chevron-down'></i></a>
              <ul>";
      
      ?>
              <?php  
                 echo " <a href='formu_reporte_vacacionesU.php?Cedula=$consulta[1]'><i class='fas fa-file fa-fw'></i> &nbsp;Reporte de Vacaciones  </a>";
              ?>
                
                <?php  
                 echo " <a href='formulario_reposoU.php?Cedula=$consulta[1]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificacion de Reposo  </a>";
              ?>

              <?php  
                 echo " <a href='formulario_constanciaU.php?Cedula=$consulta[1]'><i class='fas fa-file fa-fw'></i> &nbsp;Constancia de Trabajo</a>";
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

</li>

</ul>


<?php  

$sentencia="SELECT * FROM inventario.Notificaciones WHERE status='Enviado' AND CedulaID='".$consulta[1]."' ";
$GLOBALS['C_U'] = $C_U;
    $resul=$conex->query($sentencia);
    
    foreach ($resul as $fila) 
    {
      $C_U=$fila['Cedula'];
    }


    if(isset($C_U))
      {
        echo "<li><a style='background:#CA1818;color:white;' href='Index_reportesV.php?Cedula=$consulta[1]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones  </a>";
      }
      else
      {
      echo "<li><a href='Index_reportesV.php?Cedula=$consulta[1]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones  </a>";
      }

      ?>
                
              



                        </li>
                        
                        <li>
                                <a href="#" class="btn-exit-system">
                    <i class="fas fa-power-off"></i> Cerrar Sesion
                </a>
                 </li>
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
          <i class="fas fa-exchange-alt"></i>
        </a>
            
         &nbsp; &nbsp; &nbsp;<a href="#" class="btn-exit-system">Salir
          <i class="fas fa-power-off"></i>&nbsp; &nbsp; &nbsp;
        </a>
      </nav>
     <center> 
    <form action="Gconstancia.php" method="post">
       <div class="container-fluid">
  <div class='table-responsive'> 
          <table class='table table-red table-sm'>
         
<br>
  <center>
  <h2>Solicitud Directa</h2>
  </center>
    
 <div class="col-12 col-md-6">
  <div class="form-group">

   <thead>
     <tr class="text-center roboto-medium" style="background:#5D6D7E;"> 
        <th> Nombres y Apellidos </th>
        <th> Cedula de Identidad</th>
        <th> Cargo </th>
        <th> Unidad de Adscripción </th>
     
        
     </tr>
        </thead>

         <tr style='background:white;' class='text-center roboto-medium'>    
        <th><input type="texto" name="Nombres" value="<?php echo $Nombres ?>" style="width:200px"  readonly></th>
        <th> <input type="texto" name="Cedula" value="<?php echo $Cedula?>" readonly> </th>
        <th> <input type="texto" value="<?php echo $Cargo?>" readonly> </th>
        <th> <input type="VARCHAR" value="<?php echo $Unidad_A ?>" readonly> </th>
        <input type="hidden" name="usu" value="usu" required>
        <input type="hidden" name="Tipo" value="Solicitud Directa" required>
        
    </tr>
 


<?php
if((isset($estador)=='Respondido') && isset($IDno)==$IDnoti)
{

  echo "
          <table></br><thead> <tr class='text-center roboto-little' style='background:#5D6D7E; color: white;'>

            <th><input style='background: #5D6D7E; border: 0; width:90px' name='Tipo' readonly> </th>
            <th>Solicitud Recibida</th>

            <th><input style='background: #5D6D7E; border: 0; width:265px' name='Tipo' readonly> </th>
            

        
            <th>Respuesta</th>
            <th><input style='background: #5D6D7E; border: 0; width:152px' name='Tipo' readonly> </th>
          </tr></thead></table>
        
</br>
       

    <center>
     <table> 
      <textarea style='resize: none; border-color: black;' name='Descripcion' rows='5' cols='50' readonly required>$Descripcion</textarea>

      <input type='' type='hidden' style='border: 0; width:3px' readonly>


      <textarea style='resize: none; border-color: black;' name='Descripcion' rows='5' cols='50' readonly>$Respuesta</textarea>
      </table>
</br>
<h5><strong>Respuesta a su Solicitud.</strong></h5>



";

}
else{
          echo"<table><thead> <tr class='text-center roboto-little' style='background:#5D6D7E; color: white;'><th>Descripción de la Solicitud</th></tr></thead></table>




        <br>

    <center>
     <table> 
";

if(isset($estado)=='Menviado')
{
      echo"<textarea style='resize: none; border-color: black;' name='Descripcion' rows='5' cols='50' readonly>$Descripcion</textarea>
      </table>";
}
else if(isset($estadog)=='general')
{
      echo"<textarea style='resize: none; border-color: black;' name='Descripcion' rows='5' cols='50' readonly>$Descripcion</textarea>
      </table>";
}
else
{
  echo "<textarea style='resize: none; border-color: black;' name='Descripcion' rows='8' cols='80' placeholder='Por favor describa detalladamente su solicitud.' required></textarea>
      </table>";
}

  echo "    </table>
        <tr> <th> </th>    
        <th></th>
        <th></th>
        <th></th>

        </tr>
     </center>   


        

        </div>
</div>
</table>
</div>
   
<table> 
<tr>
  <br>
   <center>";


if(isset($estado)=='Menviado')
{  
  echo "<h5><strong>Esperando Respuesta Para su Solicitud.</strong></h5>";
}
else if(isset($estadog)=='general')
{  
  echo "<h5><strong>Notificacion General de Importancia.</strong></h5>";
}
else
{
  echo"
  <button type='submit' class='btn btn-succes' value='Enviar Solicitud' name='Int' style='background:#ffe65d;color:#0a0a0a;'><strong>Enviar Solicitud</strong></button>";

}
}
?>
</center>
</tr>

     </table>
</div>
    </form> 
      </br>
      </br>
      </br>
      </br>
      </br>
      </br>
      </br>
      </br>
      </br>
      </br>
      </br>
      </center>
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