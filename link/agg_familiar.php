<?php
session_start();

if(isset($_SESSION['usuarios']))
 { 
  include '../Conexion.php';

  function ConsultarProducto($Con)
  {
    include '../Conexion.php';

    $sentencia="SELECT * FROM inventario.Datos_H WHERE Cedula='".$Con."' ORDER BY IDH DESC LIMIT 1 ";
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
    $fila['IDH'],
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

    $conectado="SELECT * FROM administrador2.superadmi WHERE usuarios='".$con."' ";

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



<!-- Proceso para mostrar foto de perfil -->

<?php 

$cedl=$consul[0];

 
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


          </figcaption>
        </figure>
        <div class="full-box nav-lateral-bar"></div>
        <nav class="full-box nav-lateral-menu">
          <ul>
            <li>
              <a href="../superadmi/superadmi.php"><i class="fab fa-dashcube fa-fw"></i> &nbsp; Panel de Control</a>
            </li>

            <li>
              <a href="#" class="nav-btn-submenu"><i class="fas fa-user-secret fa-fw"></i> &nbsp; Administradores <i class="fas fa-chevron-down"></i></a>
              <ul>
                <li>
                  <a href="../superadmi/lista_admi.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Administradores</a>
                </li>
                
              </ul>
            </li>
                     <li>

              <a href="#" class="nav-btn-submenu"><i class="fas fa-users fa-fw"></i> &nbsp; Usuarios <i class="fas fa-chevron-down"></i></a>
              <ul>
                
                <li>
                  <a href="../superadmi/lista_usuario.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de usuarios</a>
                </li>
                
              </ul>
            </li>

            <li>
              <a href="#" class="nav-btn-submenu"><i class="fas fa-pallet fa-fw"></i> &nbsp; Empleados <i class="fas fa-chevron-down"></i></a>
              <ul>
                
                <li>
                  <a href="../superadmi/lista_empleados.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Empleados</a>
                </li>
                
              </ul>
            </li>

 <?php  
   echo"<li>
              <a href='#' class='nav-btn-submenu'><i class='fas fa-list fa-fw'></i> &nbsp; Solicitudes <i class='fas fa-chevron-down'></i></a>
              <ul>";
                   
?>
              <?php  
                 echo " <a href='formu_reporte_vacacionesSu.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Reporte de Vacaciones  </a>";
              ?>
                
                <?php  
                 echo " <a href='formulario_reposoSu.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificacion de Reposo  </a>";
              ?>

              <?php  
                 echo " <a href='formulario_constanciaSu.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Constancia de Trabajo</a>";
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

$sentencia="SELECT * FROM inventario.Notificaciones WHERE status='Aprobado_S' OR CedulaID='".$consulta[0]."'";

    $resul=$conex->query($sentencia);
    
    foreach ($resul as $fila) 
    {
      $C_U=$fila['Cedula'];
    }

    if(isset($C_U))
      {
        echo "<a style='background:#CA1818;color:white;' href='Index_reportesS.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones  </a>";
      }
      else
      {
      echo "<a href='Index_reportesS.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones  </a>";
      }
      ?>


</li>
<li>
                            <a href="../superadmi/index_inhactivos.php" ><i class="fas fa-list fa-fw"></i>
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


         <?php  

               
      echo "&nbsp; &nbsp; &nbsp;  <a href='#' class='btn-exit-system'>Salir
          <i class='fas fa-power-off'></i>&nbsp; &nbsp; &nbsp;
        </a>";
     
      

              ?>
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
    <button type='submit' class='btn btn-succes' value="Guardar y Continuar" name="Enviar" style='background:#ffe65d;color:#0a0a0a;'><strong>Guardar y Continuar</strong></button>";

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