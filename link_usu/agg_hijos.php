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

  <?php

$CedulaID=$_GET['Cedula'];
 include ("../Conex.php");

$mom= $_SESSION['usuarios'];

  function ConsultarUsuario($con)
  {
    include ("../Conex.php");

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


<link rel="stylesheet" href="../css/bootstrap.min.css">
  
  <main class="full-box main-container" >
    <!-- barra lateral -->
    <section class="full-box nav-lateral" >
      <div class="full-box nav-lateral-bg show-nav-lateral"></div>
      <div class="full-box nav-lateral-content">
        <figure class="full-box nav-lateral-avatar">
          <i class="far fa-times-circle show-nav-lateral"></i>
          <img src="../assets/avatar/logo.jpeg" class="img-fluid" alt="Avatar">
          <figcaption class="roboto-medium text-center">

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
                     
            <li>
              <a href="#" class="nav-btn-submenu"><i class="fas fa-file fa-fw"></i> &nbsp; Solicitudes <i class="fas fa-chevron-down"></i></a>
              <ul>
              

              <?php  
                 echo " <a href='../reportes/reporte.php?Cedula=$consulta[1]'><i class='fas fa-list fa-fw'></i> &nbsp;Reporte de Vacaciones  </a>";
              ?>
                
                <?php  
                 echo " <a href='../reportes/Reposo.php?Cedula=$consulta[1]'><i class='fas fa-list fa-fw'></i> &nbsp;Notificacion de Reposo  </a>";
              ?>
<li>
  <a href="#" class="nav-btn-submenu"><i class="fas fa-file fa-fw"></i> &nbsp; Formatos Vacios <i class="fas fa-chevron-down"></i></a>
   <ul>

                 <?php  
                 echo " <a href='../reportes/Reporte_Vaca_vacio.php'><i class='fas fa-list fa-fw'></i> &nbsp;Vacaciones  </a>";
              ?>
                <?php  
                 echo " <a href='../reportes/Reporte_Reposo_Vacio.php'><i class='fas fa-list fa-fw'></i> &nbsp;Reposo  </a>";
              ?>

    </ul>

</li>
              </ul>

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

     

 <!-- pagina central -->
    
    <section class="full-box page-content" >
      <nav class="full-box navbar-info" >
        <a href="#" class="float-left show-nav-lateral">
          <i class="fas fa-exchange-alt" style="background: yellow"></i>
        </a>
            <?php  
                 echo " <a href='../modificar_usuario.php?Cedula=$consulta[1]'><i class='fas fa-user-cog'></i> &nbsp;Actualizar Usuario  </a>";
              ?>

         &nbsp; &nbsp; &nbsp;<a href="#" class="btn-exit-system">Salir
          <i class="fas fa-power-off"></i>&nbsp; &nbsp; &nbsp;
        </a>
      </nav>


<center>
  <form action="agg_mod_hijos.php" method="post">
<div class="container-fluid">
  <div class='table-responsive'> 
          <table class='table table-dark table-sm'>
        

<br>
<br>
<br>
<br>

<center>
    <h2>Datos De Hijos</h2>
  </center>
    

        
            <div class="col-12 col-md-6">
  <div class="form-group">

  
  
<thead>
     <tr class="text-center roboto-medium" style="background:#5D6D7E;"> 
        <th> Nombres y Apellidos </th>
        <th> Fecha de Nacimiento </th>
        <th> Edad </th>
        <th> Cedula de Identidad </th>
        
    </tr>
        </thead>
         <tr style='background:white;' class='text-center roboto-medium'>  
        <th> <input type="texto" name="Nombres" class="form-control"> </th>
        <th> <input type="date" id="Fecha_N" name="Fecha_N" class="form-control"> </th>
        <th> <input type="text" id="edadh" name="Edad" class="form-control"> </th>
        <th> <input type="VARCHAR" name="Cedula" class="form-control"> </th>

        <script src="../autojs_usu/calcuEdadH.js"></script>
        
    </tr>
<thead>
<tr class="text-center roboto-medium" style="background:#5D6D7E;">  
        <th> Sexo </th>
        <th> Grado escolar/semestre </th>
        <th> Talla de Camisa </th>
        <th> Talla de Pantalon </th>
        
    </tr>
        </thead>
         <tr style='background:white;' class='text-center roboto-medium'>  
        <th> 
            <select name="Sexo" class="form-control">
<option name=""></option>
<option value="M">Masculino</option>
<option value="F">Femenino</option>
        </select> 
    </th>
        <th> <input type="VARCHAR" name="Grado_e" class="form-control"> </th>
        <th> <input type="VARCHAR" name="Camisa" class="form-control"> </th>
        <th> <input type="number" name="Pantalon" class="form-control"> </th>
        
    </tr>
<thead>
    <tr class="text-center roboto-medium" style="background:#5D6D7E;">  
        <th> Talla de Calzado </th>
        <th>  </th>
        <th>  </th>
        <th>  </th>
        
    </tr>
        </thead>
         <tr style='background:white;' class='text-center roboto-medium'>  

        <th>  <input type="number" name="Calzado" class="form-control"> </th>
        <th>  </th>
        <th>  </th>
        <th>  </th>
    </tr>

    <thead>
    <tr style='background:white;' class='text-center roboto-medium'>
      <th>
      <input type="hidden" name="CedulaID" value="<?php echo $CedulaID?>" readonly class="form-control">
</th>
    <th></th>
<th></th>
<th></th>
    </tr>
</thead>
</div>
</div>
</table>
</div>
       <table> 
<tr>
  <br>
        <input type="submit"  value="Guardar y Continuar" name="Enviar" style="background:yellow;color:black; ">&nbsp; &nbsp;
</tr>

     </table>
        </div>
    </form> 
      </center>


  </section>
</main>
<script src="../jquery/jquery-3.3.1.min.js"></script>    
    <script src="../popper/popper.min.js"></script>      
    <script src="../bootstrap4/js/bootstrap.min.js"></script>    
    <script src="../jqueryUI/jquery-ui-1.12.1/jquery-ui.min.js"></script>  
    <script src="./codigo.js"></script>       
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