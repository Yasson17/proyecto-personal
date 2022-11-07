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
  <title>SESION</title>

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
  

  <!-- php para mostrar nombre del usuario -->
  <?php

include 'Conex.php';

$mom= $_SESSION['usuarios'];

  function ConsultarUsuario($con)
  {
    include 'Conex.php';

    $conectado="SELECT * FROM administrador2.usuarios WHERE usuarios='".$con."' ";

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

   $consulta=ConsultarUsuario($mom);
?>


<!-- Proceso para mostrar notificaciones -->
<?php 

$cedl=$consulta[1];

  function totalFilas($ced)
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

$consul=totalFilas($cedl);

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


<link rel="stylesheet" href="css/bootstrap.min.css">
  
  <main class="full-box main-container" >
    <!-- barra lateral -->
    <section class="full-box nav-lateral" >
      <div class="full-box nav-lateral-bg show-nav-lateral"></div>
      <div class="full-box nav-lateral-content">
        <figure class="full-box nav-lateral-avatar">
          <i class="far fa-times-circle show-nav-lateral"></i>
          <img src="<?php echo $nombre[0] ?>" class="img-fluid" alt="Avatar">
          <figcaption class="roboto-medium text-center" style="background: #CA1818">

             <?php echo $consulta[1] ?> 

          </figcaption>
        </figure>
        <div class="full-box nav-lateral-bar"></div>
        <nav class="full-box nav-lateral-menu">
          <ul>
            <li>
              <a href="usuario.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Inicio</a>
            </li>

            <li>
              <a href="#" class="nav-btn-submenu"><i class="fas fa-user fa-fw"></i> &nbsp; Mis Datos ABAE <i class="fas fa-chevron-down"></i></a>
              <ul>
                

<?php  
                 echo " <a href='consultaUSU.php?Cedula=$consulta[0]'><i class='fas fa-list fa-fw'></i> &nbsp;Mis Datos  </a>";
              ?>
                
                   <?php  
                 echo " <a href='Modificar_U.php?Cedula=$consulta[0]'><i class='fas fa-list fa-fw'></i> &nbsp;Actualizacion de datos  </a>";
              ?>
                
              </ul>
            </li>
                     
<?php  


          echo"<li>
              <a href='#' class='nav-btn-submenu'><i class='fas fa-list fa-fw'></i> &nbsp; Solicitudes <i class='fas fa-chevron-down'></i></a>
              <ul>";
      
      ?>
              <?php  
                 echo " <a href='Notificaciones/formu_reporte_vacacionesU.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Reporte de Vacaciones  </a>";
              ?>
                
                <?php  
                 echo " <a href='Notificaciones/formulario_reposoU.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificacion de Reposo  </a>";
              ?>

              <?php  
                 echo " <a href='Notificaciones/formulario_constanciaU.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Constancia de Trabajo</a>";
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

</li>

</ul>


<?php  

$sentencia="SELECT * FROM inventario.Notificaciones WHERE status='Enviado' AND CedulaID='".$consulta[0]."' ";
$GLOBALS['C_U'] = $C_U;
    $resul=$conex->query($sentencia);
    
    foreach ($resul as $fila) 
    {
      $C_U=$fila['Cedula'];
    }


    if(isset($C_U))
      {
        echo "<li><a style='background:#CA1818;color:white;' href='Notificaciones/Index_reportesV.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones  </a>";
      }
      else
      {
      echo "<li><a href='Notificaciones/Index_reportesV.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones  </a>";
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

 <div class="header" style="text-align:right;">
   
  <div class="header_text">
    
  </div>
  <div class="header_logo">
     <div align="right">
       
       <h2 style="color:black;" >SGDP ABAE<img src="./assets/avatar/logo.jpeg" class="img-fluid" alt="Avatar"></h2>
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
                 echo " <a href='modificar_usuario.php?Cedula=$consulta[0]'><i class='fas fa-user-cog'></i> &nbsp;Actualizar Contraseña  </a>";
              ?>

         &nbsp; &nbsp; &nbsp;<a href="#" class="btn-exit-system">Salir
          <i class="fas fa-power-off"></i>&nbsp; &nbsp; &nbsp;
        </a>
      </nav>

<br>
<br>
<center>
<h2>Actualizar Contraseña </h2>
</center>
<br>
<br>

<form action="update_usuario.php" method="post">
 <center>
      <div class="container-fluid">

<div class="col-12 col-md-6">
			

                  <label><strong> Antigua Contraseña</strong></label>
<br>
				 <div class="input-group">
                                <input ID="Password" type="Password" name="antigua" Class="form-control">
                                <button id="show_password" class="btn btn-success" type="button" onclick="mostrarPassw()" style="color:#000022;"> 
                                <span class="fa fa-eye-slash icon"></span> </button>
                                </div>
						
					</div>

<br>
<br>

<div class="col-12 col-md-6">
		

                  <label><strong> Nueva Contraseña</strong></label>
<br>
				 <div class="input-group">
                                <input ID="Password" type="Password" name="nueva" Class="form-control">
                                <button id="show_password" class="btn btn-success" type="button" onclick="mostrarPassw()" style="color:#000022;"> 
                                <span class="fa fa-eye-slash icon"></span> </button>
                                </div>
					
					</div>

<input type="hidden" name="ci" value="<?php echo $consulta[0]?>" readonly >

        </div>
        </center>
    <br>
    <br>
      <center>
        <div class="container-fluid">
<button href="update_usuario.php" class="btn btn-primary" value="1" name="A" style="background:#ffe65d;color:#0a0a0a;" ><strong>Actualizar</strong> </button>&nbsp;&nbsp;&nbsp;

<button href="update_usuario.php" class="btn btn-primary" value="2" name="A" style="background:#CA1818;color:white"> &nbsp;Cancelar</button>

</div>
</form>


</center>
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
