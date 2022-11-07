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
$totalfilanoti,
$totalfilaemple,$numdoc,
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
   }


 
      }

else{

$nombre='imagen/logo.jpeg';

}
return[
$nombre,
];

}
$nombre= foto($cedl);

 ?>

	
<link rel="stylesheet" href="./css/bootstrap.min.css">
  
  <main class="full-box main-container">
    <!-- barra lateral -->
    <section class="full-box nav-lateral">
      <div class="full-box nav-lateral-bg show-nav-lateral"></div>
      <div class="full-box nav-lateral-content">
        <figure class="full-box nav-lateral-avatar">
          <i class="far fa-times-circle show-nav-lateral"></i>
          <img src="<?php echo $nombre[0] ?>" class="img-fluid" alt="Avatar">

          <figcaption class="roboto-medium text-center">

          <button type="btn-success" class="btn btn-success" style="color:white"> <a data-toggle="modal" data-target="#foto" >Actualizar Foto de Perfil
        </a></button>
            </figcaption>
          <figcaption class="roboto-medium text-center" style="background: #CA1818;color:white;">


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
              <a href="#" class="nav-btn-submenu"><i class="fas fa-pallet fa-fw"></i> &nbsp; Empleados <i class="fas fa-chevron-down"></i></a>
              <ul>
                
                <li>
                  <a href="lista_empleados.php"><i class="fas fa-clipboard-list fa-fw"></i> &nbsp; Lista de Empleados </a>
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


    if($consul[0]!=0)
      {
        echo "<a style='background:#CA1818;color:white;' href='Notificaciones/Index_reportesA.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones  </a>";
      }
      else
      {
      echo "<a href='Notificaciones/Index_reportesA.php?Cedula=$consulta[0]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones  </a>";
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



  

  <section class="full-box page-content">
      <nav class="full-box navbar-info">
        <a href="#" class="float-left show-nav-lateral">
          <i class="fas fa-exchange-alt" ></i>
        </a>



         <?php  

     echo " <a href='Notificaciones/interacciona.php?Cedula=$consulta[0]'><i class='fab fa-dashcube fa-fw'></i> &nbsp;Solicitud Directa &nbsp; &nbsp; &nbsp;</a>";

                 echo " <a href='modificar_admi.php?Cedula=$consulta[0]'><i class='fas fa-user-cog'></i> &nbsp;Actualizar Contraseña</a>";

      echo "&nbsp; &nbsp; &nbsp;  <a href='#' class='btn-exit-system'>Salir
          <i class='fas fa-power-off'></i>&nbsp; &nbsp; &nbsp;
        </a>";
                 

              ?>
      </nav>
			


<!-- Proceso para encontrar el departamento a quien pertenece -->
<?php 

$CEDU=$consulta[0];
  function dep($es)
  {
$host='localhost';
$username='root';
$password='';
$database='Administrador2';

    $conn = new mysqli($host,$username,$password,$database);

$contenido = "SELECT * FROM inventario.datos_i WHERE CedulaID='".$es."'";

 $resul=mysqli_query($conn,$contenido);
       foreach($resul as $auxili)
    {

$dep=$auxili;
   return[
$dep['Unidad_A']
];
   
    }

}

$departamen=dep($CEDU);
 ?>

<br>
      <br>
    <center>
<h2><i class="fab fa-dashcube fa-fw"></i> Panel de Control  </h2>
</center>
      
      <br>
      <br>

			<!-- Contenedores -->
			<div class="full-box tile-container">

            


				<?php  


    if($consul[0]!=0)
      {
        echo "<a href='Notificaciones/Index_reportesA.php' class='tile' style='background:red;color:black;'>
          <div class='tile-tittle'>Notificaciones</div>
          <div class='tile-icon'>
            <i class='fas fa-users fa-fw'></i>
            <p> $consul[0] </p>
          </div>
        </a>";
      }
      else
      {
      echo "<a href='Notificaciones/Index_reportesA.php' class='tile' style='background:white;color:black;'>
          <div class='tile-tittle'>Notificaciones</div>
          <div class='tile-icon'>
            <i class='fas fa-users fa-fw'></i>
            <p> $consul[0] </p>
          </div>
        </a>";
      
      }
      ?>

<?php  
                 echo " <a href='ConsultaADMI.php?Cedula=$consulta[0]' class='tile'> ";
              ?>
              <div class="tile-tittle">Mis Datos</div>
          <div class="tile-icon" >
            <i class="fas fa-file fa-fw" style="color: black"></i>
            <p style="color: black">ABAE</p>
          </div>
       <?php echo " </a>";?>



				
                     <a href="lista_empleados.php" class="tile" style="background:white;color:black;">
					<div class="tile-tittle">Empleados</div>	
					<div class="tile-icon">
						<i class="fas fa-pallet fa-fw"></i>
						<p><?php echo $consul[1] ?> </p>
					</div>
				</a>

     <a data-toggle='modal' data-target='#subir' class="tile" style="background:white;color:black;">
          <div class="tile-tittle">Importar</div>
          <div class="tile-icon">
            <i class="fas fa-clipboard-list fa-fw"></i>
            <p>Documentos</p>
          </div>
        </a>

        <a href="lista_doc.php" class="tile" style="background:white;color:black;">
          <div class="tile-tittle">Documentos</div>
          <div class="tile-icon">
            <i class="fas fa-list fa-fw"></i>
            <p><?php echo $consul[2] ?> </p>
          </div>
        </a>
                   
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

			</div>
			

		</section>
	</main>
	
  <!-- modal para subir documento -->
<main class="container-fluid">
<div class="modal" id="subir" tabindex="-1" role="dialog" >
 
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header" style="background:#000077; color: white;">
          <legend><i class="fas fa-clipboard-list"></i> &nbsp; Enviar Documento </legend>
                    
        </div>
                  

          <form method="post" action="intro_doc.php" enctype="multipart/form-data">

                      <div class="modal-body">
                         
            <fieldset>
            
            

            <div class="container-fluid">

              <div class="row">

                <div class="col-12 col-md-6">

                  <div class="form-group">
          <label class="bmd-label-floating" > Agregar Documento</label>
          <input  type="file" name="doc" id="doc" required="required" class="form-control">
          </div>
          </div>

            <div class="col-12 col-md-6">
           <div class="form-group">
 <label class="bmd-label-floating" align="text-center"> Fecha</label>
<input type="DATE" name="fecha" id="fecha" required="required"  class="form-control">
</div>
          </div>

          <div class="col-12 col-md-6">
          <div class="form-group">
                 
          <label class="bmd-label-floating" align="text-center"> observaciones</label>
            <textarea name="observaciones" id="observaciones" required="required" rows="15" cols="40" class="form-control"></textarea>

            

              <input type="hidden" name="ci" id="ci" value="<?php echo $consulta[0] ?> " readonly>


              <input type="hidden" name="departamento" id="departamento" value="<?php echo $departamen[0] ?> " readonly>

<input type="hidden" name="status" id="status" value="Enviado" readonly>

            </div>
          </div>

          
          </fieldset>

                    </div>

               <div class="modal-footer">
                <button type="reset" class="btn byn-succes"  style="background:#CA1818;color:white"> &nbsp; LIMPIAR</button>
                    &nbsp;&nbsp;
  <button type='submit' class='btn btn-succes' value="Enviar Archivo" name="Enviar" style='background:#ffe65d;color:#0a0a0a;'><strong>Enviar Archivo</strong></button>
                     
                   </div>  


                     </form>

            
            </div>
          </div>
        </div>
     
</main>
	

<!-- ventana modal -->

<div id="foto" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background:#CA1818;color:white" >
        <h5 class="modal-title"><legend style="color: black"><i class="fas fa-image"></i> &nbsp; Actualizar Foto de Perfil</legend></h5>
        
      </div>

      <form method="post" action="intro_foto.php" enctype="multipart/form-data">
      <div class="modal-body">
        
<fieldset>
            
            <div class="container-fluid">

              <div class="row">

                <div class="col-12 col-md-6">

                  <div >
          <label> Foto de perfil </label>
        <input type="FILE" name="image" id="image" required="required" class="form-control">
          </div>

           <input type="hidden" name="ci" id="ci" value="<?php echo $consulta[0] ?> " readonly>

<input type="hidden" name="redireccion" id="redireccion" value="admi" readonly>

          </div>
            </div>

          </div>
          
            
          </fieldset>




      </div>

      <div class="modal-footer">
        
        <button class="btn btn-success" type="submit" style="background:#ffe65d;color:black"> &nbsp;
                     <strong>Subir Foto</strong> 
                     </button>
      </div>
      </form>
    </div>
  </div>
</div> 


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
