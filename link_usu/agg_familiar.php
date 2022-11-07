<?php
session_start();

if(isset($_SESSION['usuarios']))
 { 
  include '../Conexion.php';

  function ConsultarProducto($Con)
  {
    include '../Conexion.php';

    $sentencia="SELECT * FROM inventario.Datos_H WHERE CedulaID ORDER BY IDH DESC LIMIT 1 ";
    $resul=$conex->query($sentencia);
    foreach($resul as $fila)
    {
    return [
    $fila['Nombres'],
    $fila['Cedula'],
    $fila['Fecha_N'],
    $fila['Edad'],
    $fila['Sexo'],
    $fila['Grado_e'],
    $fila['CedulaID'],
    ];
    }

  }

  $consulta=ConsultarProducto($_GET['Cedula']);
if($consulta[4]=='M')
{
  $Parentesco='Hijo';
}
else
{
  $Parentesco='Hija';
}


$descomN = explode(' ', $consulta[0]);

if(isset($descomN[0]))
{
$Nom1=$descomN[0];
}
else
{
  $Nom1='';
}

if(isset($descomN[1]))
{
$Nom2=$descomN[1];
}
else
{
  $Nom2='';
}

if(isset($descomN[2]))
{
$Ape1=$descomN[2]; 
}
else
{
  $Ape1='';
}

if(isset($descomN[3]))
{
$Ape2=$descomN[3]; 
}
else
{
  $Ape2='';
}

$GLOBALS['Nom1'] = $Nom1;
$GLOBALS['Nom2'] = $Nom2;
$GLOBALS['Ape1'] = $Ape1;
$GLOBALS['Ape2'] = $Ape2;

$status='Activo';
$GLOBALS['status'] = $status;
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

   $consul=ConsultarUsuario($mom);
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

             <?php echo $consul[0] ?> 

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
    <form action="agg_mod_familiar.php" method="post">
       <div class="container-fluid">
  <div class='table-responsive'> 
          <table class='table table-dark table-sm'>
         
<br>
<br>
<br>
<br>

         <center>
    <h2>Datos Del Nucleo Familiar</h2>
  </center>
    
 <div class="col-12 col-md-6">
  <div class="form-group">

   <thead>
     <tr class="text-center roboto-medium" style="background:#5D6D7E;"> 
        <th> Parentesco </th>
        <th> Nombres </th>
        <th> Apellidos </th>
        <th> Cedula de Identidad </th>
        
     </tr>
        </thead>

         <tr style='background:white;' class='text-center roboto-medium'>    
        <th><input type="texto" name="Parentesco" value="<?php echo $Parentesco ?>"></th>
        <th> <input type="texto" name="Nombres" value="<?php echo $Nom1?> <?php echo $Nom2?>"> </th>
        <th> <input type="texto" name="Apellidos" value="<?php echo $Ape1?> <?php echo $Ape2?>"> </th>
        <th> <input type="VARCHAR" name="Cedula" value="<?php echo $consulta[1] ?>"> </th>
        
    </tr>


<thead>
     <tr class="text-center roboto-medium" style="background:#5D6D7E;"> 
        <th> Fecha de Nacimiento </th>
        <th> Edad </th>
        <th> Sexo </th>
        <th> Estado Civil</th>
        
    </tr>
        </thead>
        
       <tr style='background:white;' class='text-center roboto-medium'> 
        <th> <input type="date" id="Fecha_N" name="Fecha_N" value="<?php echo $consulta[2] ?>"> </th>
        <th> <input type="number" id="edadh" name="Edad" value="<?php echo $consulta[3] ?>"> </th>
         
        <th> <input type="texto"  name="Sexo" value="<?php echo $consulta[4] ?>"> </th>
        
        <th> 
<select name="Estado_C">
<option name=""></option>
<option value="casado">Casado(a)</option>
<option value="conyuge">Conyugue</option>
<option value="anulado">Anulado</option>
<option value="separado">Separado de union legal</option>
<option value="separado">Separado de union de hecho</option>
<option value="viudo">Viudo(a)</option>
<option value="soltero">Soltero(a)</option>
        </select> 
    </th>
        
    </tr>
          <script src="../autojs/calcuEdadH.js"></script>

    <thead>
     <tr class="text-center roboto-medium" style="background:#5D6D7E;">
      <th> Grado de Instruccion </th>
      <th></th>
      <th></th>
      <th></th>
</tr>
        </thead>  
        
      
         <tr style='background:white;' class='text-center roboto-medium'> 
        <th>  <input type="VARCHAR" name="Grado_I" value="<?php echo $consulta[5] ?>"> </th>
        <th></th>
        <th></th>
        <th></th>
         </tr> 
        

        </div>
</div>
</table>
</div>
         <input type="hidden" name="CedulaID" value="<?php echo $consulta[6]?>" readonly><br>
         <input type="hidden" name="status" value="<?php echo $status?>" readonly><br>
     <input type="hidden" name="status" value="<?php echo $status?>" readonly class="form-control">

   
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