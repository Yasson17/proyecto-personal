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
    $Correo_Elect=$fila['Correo_Elect'];
}
}



if (isset($_GET['I'])) 
{
	if($_GET['Tipo']=='sup')
	{
  echo "<script type='text/javascript'>
      alert('ESPERANDO RESPUESTA DE RECURSOS HUMANOS.');
      window.location.href='Index_reportesS.php?Cedula=$Cedula';
    </script>";
	}
	else
	{
		echo "<script type='text/javascript'>
      alert('ESPERANDO RESPUESTA DE RECURSOS HUMANOS.');
      window.location.href='Index_reportesV.php?Cedula=$Cedula';
    </script>";
	}
}
else if (isset($_GET['Apro_C'])) 
{
	if($_GET['Tipo']=='sup')
	{
  echo "<script type='text/javascript'>
      alert('LA CONSTANCIA DE TRABAJO HA SIDO ENVIADA A SU CORREO.');
      window.location.href='Index_reportesS.php?Cedula=$Cedula';
    </script>";
	}
	else
	{
		echo "<script type='text/javascript'>
      alert('LA CONSTANCIA DE TRABAJO HA SIDO ENVIADA A SU CORREO.');
      window.location.href='Index_reportesV.php?Cedula=$Cedula';
    </script>";
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

    $FechaI_ABAE=$fila['FechaI_ABAE'];
    $TotalA_Serv=$fila['TotalA_Serv']; 
    $Unidad_A=$fila['Unidad_A']; 
    $Cargo=$fila['Cargo'];
     
}
}
?>
<?php
$senten="SELECT * FROM inventario.datos_p WHERE Cedula='".$Cedula."' ";
    $res=$conex->query($senten);
    if ($res)
{
foreach ($res as $fila)
{

    $Telefono_Movil=$fila['Telefono_Movil'];

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
    $Descripcion=$fila['Descripcion'];
    $status=$fila['status'];

     
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

$cedu,$aux,
];
   
    }
   }

   $consul=ConsultarUsuario($mom);
?>

<!-- Proceso para mostrar si tiene notificacion -->
<?php 

$cedl=$consul[0];

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

$cedl=$consul[0];

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

             <?php echo $consul[1] ?> 

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


    if($consulT[0]!=0)
      {
        echo "<a style='background:#CA1818;color:white;' href='Index_reportesA.php?Cedula=$consul[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones  </a>";
      }
      else
      {
      echo "<a href='Index_reportesA.php?Cedula=$consul[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones  </a>";
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

       <h2 style="color:black;" >Solicitud de Constancia ABAE<img src="../assets/avatar/logo.jpeg" class="img-fluid" alt="Avatar"></h2>

     </div>
    </div>
     
  </div>

 <!-- pagina central -->
    
    <section class="full-box page-content" >
      <nav class="full-box navbar-info" >
        <a href="#" class="float-left show-nav-lateral">
          <i class="fas fa-exchange-alt" ></i>
        </a>
            
         <?php  

                 echo " <a href='../modificar_admi.php?Cedula=$consul[0]'><i class='fas fa-user-cog'></i> &nbsp;Actualizar Contraseña </a>";

      echo "&nbsp; &nbsp; &nbsp;  <a href='#' class='btn-exit-system'>Salir
          <i class='fas fa-power-off'></i>&nbsp; &nbsp; &nbsp;
        </a>";
     
      

              ?>
      </nav>
  



     <center> 
    <form method="post" action="validarc.php">
       <div class="container-fluid">
  <div class='table-responsive'> 
          <table class='table table-red table-sm'>
         
<br>
  <center>
  <h2>Datos Del Solicitante</h2>
  </center>
    
 <div class="col-12 col-md-6">
  <div class="form-group">

   <thead>
     <tr class="text-center roboto-medium" style="background:#5D6D7E;"> 
        <th> Nombres y Apellidos </th>
        <th> Cedula de Identidad</th>
        <th>Unidad de Adscripción</th>
        <th> Cargo </th>
     
        
     </tr>
        </thead>

         <tr style='background:white;' class='text-center roboto-medium'>    
        <th><input type="texto" name="Nombres" value="<?php echo $Nombres ?>" style="width:200px" readonly></th>
        <th> <input type="texto" name="Cedula" value="<?php echo $Cedula?>"readonly> </th>
        <th> <input type="texto" name="Unidad_A" value="<?php echo $Unidad_A?>" readonly> </th>
        <th> <input type="texto" name="Cargo" value="<?php echo $Cargo?>"readonly> </th>
        
    </tr>
 

     <center>
   <thead>
        <th><br></th>
        <th></th>
        <th></th>
        <th></th>
      <tr class="text-center roboto-little" style="background:#5D6D7E;" > 
        <th>Correo Electronico</th>
        <th>Numero de Telefono</th>
        <th></th>
        <th></th>

     
     </tr>

        </thead>

     </center>   
         <tr style='background:white;' class='text-center roboto-medium'>    

        <th> <input value="<?php echo $Correo_Elect?>"readonly> </th>
        <th><input type="number" name="telefono" value="<?php echo $Telefono_Movil ?>" readonly></th>

        <th><input type="hidden" name="IDnoti" value="<?php echo $IDnoti ?>" readonly></th>
        
        <th>  </th>
        <th>  </th>

        
    </tr>


        </thead>

           <table><thead> <tr class="text-center roboto-little" style="background:#5D6D7E; color: white;"><th>Descripción de la Solicitud</th></tr></thead></table>

        <br>

    <center>
     <table> 
      <textarea name="Descripcion" id="Descripcion" rows="5" cols="50"  readonly><?php echo $Descripcion?></textarea>
      </table>
        <tr> <th> </th>    
        <th></th>
        <th></th>
        <th></th>

        </tr>
     </center>   
     
        </div>
</div>
<?php

if (isset($_GET['I'])) 
{
  echo "<script type='text/javascript'>
      alert('ESPERANDO RESPUESTA DE RECURSOS HUMANOS.');
      window.location.href='Index_reportesV.php?Cedula=$Cedula';
    </script>";
}
else if (isset($_GET['Apro_C'])) 
{
  echo "<script type='text/javascript'>
      alert('LA CONSTANCIA DE TRABAJO HA SIDO ENVIADA A SU CORREO.');
      window.location.href='Index_reportesV.php?Cedula=$Cedula';
    </script>";
}
else if (isset($_GET['No_C'])) 
{
  echo "<script type='text/javascript'>
      alert('SU CONSTANCIA DE TRABAJO NO HA SIDO APROBADA.');
      window.location.href='Index_reportesV.php?Cedula=$Cedula';
    </script>";
}
else
{
  
  echo"<center>
  <button type='submit' class='btn btn-succes' name='ok' style='background:#ffe65d;color:#0a0a0a;' ><strong>Aprobar Constancia</strong></button>&nbsp; &nbsp;


</center>';
</table>
</div>
   
</div>
    </form> 
<h5><strong>NOTA: ENVIAR LA CONSTANCIA DE TRABAJO AL CORREO ELECTRONICO DEL SOLICITANTE Y LUEGO APROBAR.</strong></h5>";
}
?>
      </center>
         <br>
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