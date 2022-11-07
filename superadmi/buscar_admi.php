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
  <title>SUPERadministrador</title>

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

include ('../Conex.php');

$mom= $_SESSION['usuarios'];

  function ConsultarUsuario($con)
  {
    include '../Conex.php';

    $conectado="SELECT * FROM administrador2.superadmi WHERE usuarios='".$con."' ";

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
  
<!-- Proceso para mostrar notificaciones -->
<?php 

$cedl=$consulta[0];

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

$administradores="SELECT * FROM administrador2.admi WHERE status='".$status."'";

$usuarios="SELECT * FROM administrador2.usuarios WHERE status='".$status."'";

$empleados="SELECT * FROM inventario.datos_p WHERE status='".$status."'";

$doc="SELECT * FROM inventario.documentos WHERE status='".$status2."'";

$doc1="SELECT * FROM inventario.documentos WHERE CedulaID='".$ced."' and status='".$mis_enviados."'";


if ($resulnoti=mysqli_query($conn,$notifi)){

$totalfilanoti=mysqli_num_rows($resulnoti);

}

if ($resulnoti1=mysqli_query($conn,$notifi1)){

$totalfilanoti1=mysqli_num_rows($resulnoti1);

}

$totalfilanoti=$totalfilanoti+$totalfilanoti1;


if ($resuladmi=mysqli_query($conn,$administradores)){
  

$totalfiladmi=mysqli_num_rows($resuladmi);

}


if ($resulusu=mysqli_query($conn,$usuarios)){
  

$totalfilausu=mysqli_num_rows($resulusu);

}

if ($resulemple=mysqli_query($conn,$empleados)){
  

$totalfilaemple=mysqli_num_rows($resulemple);

}

if ($resuldoc=mysqli_query($conn,$doc)){
  

$totalfiladoc=mysqli_num_rows($resuldoc);

}

if ($resuldoc1=mysqli_query($conn,$doc1)){
  

$totalfiladoc1=mysqli_num_rows($resuldoc1);

}

$numdoc=$totalfiladoc+$totalfiladoc1;

return[
$totalfilanoti,$totalfiladmi,$totalfilausu,
$totalfilaemple,$numdoc,
];

}

$consul=totalFilas($cedl);

 ?>

  <!-- Proceso para mostrar foto de perfil -->

<?php 

$cedl=$consulta[0];

 
    $host='localhost';
$username='root';
$password='';
$database='Administrador2';
$status='Activo';
$status2='Recibido';
$mis_enviados='Enviado';


    $conn = new mysqli($host,$username,$password,$database);

$foto = "SELECT * FROM inventario.documentos WHERE CedulaID='".$cedl."'";


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

$nombre='assets/avatar/es.png';  
}

  
 ?>

<link rel="stylesheet" href="../css/bootstrap.min.css">
  
  <main class="full-box main-container">
    <!-- barra lateral -->
    <section class="full-box nav-lateral">
      <div class="full-box nav-lateral-bg show-nav-lateral"></div>
      <div class="full-box nav-lateral-content">
        <figure class="full-box nav-lateral-avatar">
          <i class="far fa-times-circle show-nav-lateral"></i>
          <img src="../<?php echo $nombre ?>" class="img-fluid" alt="Avatar">
          <figcaption class="roboto-medium text-center" style="background: #CA1818;color:white;">


             <?php echo $consulta[1] ?> 

          </figcaption>
        </figure>
        <div class="full-box nav-lateral-bar"></div>
        <nav class="full-box nav-lateral-menu">
          <ul>
            <li>
              <a href="superadmi.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Panel de Control</a>
            </li>

            <li>
              <a href="#" class="nav-btn-submenu"><i class="fas fa-user-secret fa-fw"></i> &nbsp; Administradores <i class="fas fa-chevron-down"></i></a>
              <ul>
                <li>
                  <a href="lista_admi.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Administradores</a>
                </li>
                
              </ul>
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
                 echo " <a href='../Notificaciones/formu_reporte_vacacionesSu.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Reporte de Vacaciones  </a>";
              ?>
                
                <?php  
                 echo " <a href='../Notificaciones/formulario_reposoSu.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificacion de Reposo  </a>";
              ?>

              <?php  
                 echo " <a href='../Notificaciones/formulario_constanciaSu.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Constancia de Trabajo</a>";
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


    if($consul[0]!=0)
      {
        echo "<a style='background:#CA1818;color:white;' href='../Notificaciones/Index_reportesS.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones  </a>";
      }
      else
      {
      echo "<a href='../Notificaciones/Index_reportesS.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones  </a>";
      }
      ?>



</li>
              <li>
                            <a href="index_inhactivos.php" ><i class="fas fa-list fa-fw"></i>
                     Lista de Inactivos</i>
                           </a>
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
       <h2 style="color:black;" >SGDP ABAE<img style="background: red" src="../assets/avatar/logo.jpeg" class="img-fluid" alt="Avatar"></h2>
     </div>
    </div>
     
  </div>
        
    


    <!-- pagina central -->
    
    <section class="full-box page-content">
      <nav class="full-box navbar-info">
        <a href="#" class="float-left show-nav-lateral">
          <i class="fas fa-exchange-alt" ></i>
        </a>

               <?php echo"<a href='modificar_super.php?Cedula=$consulta[0]'><i class='fas fa-user-cog'></i> &nbsp;Actualizar Contraseña &nbsp;&nbsp; </a>";
               ?>

        <a href="#" class="btn-exit-system">Salir
          <i class="fas fa-power-off"></i>
        </a>
      </nav>
  


        <!-- contenido de la pagina --> 

                        
                        <!-- proceso para mostrar el resultado de la buscqueda -->
                        
<?php

$host='localhost';
$username='root';
$password='';
$database='Administrador2';



    $cone = new mysqli($host,$username,$password,$database);


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

$cons ="SELECT * FROM Administrador2.admi WHERE  nombre LIKE '%$datos%' OR ci LIKE '%$datos%'";


if ($resulti=mysqli_query($cone,$cons)){

$tot=mysqli_num_rows($resulti);

}


if ($tot>0)

{

echo"<div class='container-fluid'>";
                echo"<div class='table-responsive'>";
                    echo"<table class='table table-dark table-sm >";
                      echo"  <thead>";
                            echo"<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                          <th>Usuario</th>
                <th>Contraseña</th>
                <th>Nombres y Apellidos</th>
                <th>Cedula de Identidad</th>
                <th>Cambiar Contraseña</th>
                <th>Mostrar</th>
                <th>Desactivar</th>
                <th>Descender</th>
                            </tr>";
                        echo"  </thead>";


foreach ($resulti as $filas)
      {
       echo "<tr class='text-center roboto-medium'>";
          echo "<td style='background:white;'>"; echo $filas['usuarios']; echo "</td>";
          echo "<td style='background:white;'>"; echo $filas['contrasena']; echo "</td>";
          echo "<td style='background:white;'>"; echo $filas['nombre']; echo "</td>";
          echo "<td style='background:white;'>"; echo $filas['ci']; echo "</td>";
         
          echo "<td style='background:white;'>  <a href='modificar_super.php?Cedula=".$filas['ci']."'> <button type='btn btn-success'  style='border-color:white;background:white'> <i class='fas fa-sync-alt' style='color:green;'></i> </button></a> </td>";

echo "<td style='background:white;'> <a href='consultaSUP.php?Cedula=".$filas['ci']."'> <button type='btn btn-success' style='border-color:white;background:white'> <i class='fa fa-eye' style='color:blue'></i> </button></a> </td>";


echo"<td style='background:white;'><button type='button' style='border-color:white;background:white' data-toggle='modal' data-target='#elim'><i class='fa fa-trash' style='color:red'></i>
</button></td>";


echo "<td style='background:white;'>  <a href='../Bajar_U.php?Cedula=".$filas['ci']."'> <button type='btn btn-success' style='border-color:white;background:white'> <i class='fas fa-exchange-alt' style='color:red'></i> </button></a> </td>";
        echo "</tr>";
          
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
                        ?>
                
                    
                    <center>
  <a href="lista_admi.php"><button type="button" class='btn btn-succes' style="background:#ffe65d;color:#0a0a0a;" ><strong>Aceptar</strong></button></a>
</center>
            
            </div>

        </section>
    </main>
    
<script src="../autojs_usu/calcuEdadH.js" ></script>
<script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.backstretch.min.js"></script>
        <script src="../js/scripts.js"></script>    
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
    echo '<script> window.location="login.php"; </script>';
}
?>
