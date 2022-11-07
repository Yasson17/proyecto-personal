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
  <title>Registro</title>

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

<br>
<br>
<br>
      <!-- php para mostrar nombre del usuario o administrador-->

  <?php

include ('conexion.php');


$mom= $_SESSION['usuarios'];

$conec="SELECT * FROM administrador2.usuarios WHERE usuarios='".$mom."' ";

    $res=$conex->query($conec);

$totalF=mysqli_num_rows($res);
    if($totalF>0)
{


  function ConsultarUsuari($con)
  {
    include 'conexion.php';

    $conectado="SELECT * FROM administrador2.usuarios WHERE usuarios='".$con."' ";

    $resultado=$conex->query($conectado);

    foreach($resultado as $auxiliar)
    {

$aux=$auxiliar['nombre'];
$cedu=$auxiliar['ci'];
   return[

$cedu,$aux,
];
   
    }
   }
 $consulta=ConsultarUsuari($mom);
  
}

$conecta="SELECT * FROM administrador2.superadmi WHERE usuarios='".$mom."' ";

    $resp=$conex->query($conecta);

$total=mysqli_num_rows($resp);
    if($total>0){

 function ConsultarUsuario($con)
  {
    include 'conexion.php';

    $conectado="SELECT * FROM administrador2.superadmi WHERE usuarios='".$con."' ";

    $resultado=$conex->query($conectado);

    foreach($resultado as $auxiliar)
    {

$aux=$auxiliar['nombre'];
$cedu=$auxiliar['ci'];
   return[

$cedu,$aux,
];
   
    }
   }
 $consulta=ConsultarUsuario($mom);

    }

$sql="SELECT * FROM administrador2.admi WHERE usuarios='".$mom."' ";

    $respues=$conex->query($sql);

$tot=mysqli_num_rows($respues);
    if($tot>0)

{

  function ConsultarUsu($con)
  {
    include 'Conex.php';

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
 $consulta=ConsultarUsu($mom);
  
}




?>


<?php

include"Conexion.php";

$seleccion="SELECT * FROM inventario.Datos_p WHERE Cedula ORDER BY id DESC LIMIT 1";

$resul=$conex->query($seleccion);

foreach ($resul as $fila) 
{
  $CedulaID=$fila['Cedula'];
}

$status='Activo';

?>


<?php

include"Conexion.php";

$seleccion="SELECT * FROM inventario.Datos_p WHERE Cedula ORDER BY id DESC LIMIT 1";

$resul=$conex->query($seleccion);

foreach ($resul as $fila) 
{
  $CedulaID=$fila['Cedula'];
}

$status='Activo';

?>

 <link rel="stylesheet" href="./css/bootstrap.min.css">
  
  <main class="full-box main-container">

    <!-- barra lateral -->
    <section class="full-box nav-lateral">
      <div class="full-box nav-lateral-bg show-nav-lateral"></div>
      <div class="full-box nav-lateral-content">
        <figure class="full-box nav-lateral-avatar">
          <i class="far fa-times-circle show-nav-lateral"></i>
          <img src="./assets/avatar/logo.jpeg" class="img-fluid" alt="Avatar">
          <figcaption class="roboto-medium text-center">

             <?php echo $consulta[1] ?> 

          </figcaption>
        </figure>
        <div class="full-box nav-lateral-bar"></div>
        <nav class="full-box nav-lateral-menu">
          <ul>
                    <?php 


$dato=$_SESSION['datos'];

if ($dato==3) {
  
  echo"<li>
              <a href='usuario.php' style='color:white; '><i class='fab fa-dashcube fa-fw'></i> &nbsp; INICIO</a>
            </li>";

}

else
{

 echo"<li>
              <a href='superadmi/superadmi.php' style='color:white; '><i class='fab fa-dashcube fa-fw'></i> &nbsp; INICIO</a>
            </li>";

}

             ?>
          

          <li>
              <a href="formulario.php" style=" color:white; "><i class="fa fa-list fa-fw"></i> &nbsp; Datos Personales</a>
            </li>

             <li>
              <a href="inf_hijos.php" style="color:white; "><i  class="fa fa-list fa-fw"></i> &nbsp; Datos De Hijos</a>
            </li>
           
              <li>
              <a href="inf_nucleofamili.php" style="color:white; "><i  class="fa fa-list fa-fw"></i> &nbsp; Nucleo Familiar</a>
            </li>
           
           <li>
              <a href="inf_nivelA.php" style="color:white; "><i  class="fa fa-list fa-fw"></i> &nbsp; Nivel Academico</a>
            </li>

               <li>
              <a href="inf_formacionE.php" style="color:white; "><i  class="fa fa-list fa-fw"></i> &nbsp; Formacion en el Exterior</a>
            </li>

           <li>
              <a href="inf_expe.php" style="color:white; "><i  class="fa fa-list fa-fw"></i> &nbsp; Experiencia Administracion P</a>
            </li>

            <li>
              <a href="inf_lab.php" style="color:white; "><i  class="fa fa-list fa-fw"></i> &nbsp; Datos Institucion</a>
            </li>

               <li>
             <a href="inf_comision.php" style="color:white; "><i  class="fa fa-list fa-fw"></i> &nbsp;  Comision de Servicio (C/M)</a>
            </li>

              <li>
              <a href="inf_otros.php" style="background:red;color:white; "><i  class="fa fa-list fa-fw"></i> &nbsp; Otros Datos</a>
            </li>


              <li>
               <a href='#' class='btn-exit-system'><i class='fas fa-power-off'></i> &nbsp; &nbsp;
      Salir
          &nbsp;
            </li>


          </ul>
        </nav>
        <br>
      </div>
    </section>


    <section class="full-box page-content">
      <nav class="full-box navbar-info">
        <a href="#" class="float-left show-nav-lateral">
          <i class="fas fa-exchange-alt"></i>
        </a>

        </nav>




<center>
  <form action="Intro_O.php" method="post">
<div class="container-fluid">
  <div class='table-responsive'> 
          <table class='table table-dark table-sm'>
        
<br>
<center>
    <h2>Otros Datos</h2>
  </center>
    

        
            <div class="col-12 col-md-6">
  <div class="form-group">
  
	    <thead>
       <tr class="text-center roboto-medium" style="background:#5D6D7E;"> 
        <th> Facebook</th>
        <th> Twiter</th>
        <th> Instagram</th>
        <th>Otros</th>
        
    </tr>
     </thead>

    <tr style='background:white;' class='text-center roboto-medium'>  
        <th> <input type="varchar" name="Facebook" class="form-control"> </th>
        <th> <input type="varchar" name="Twitter" class="form-control"> </th>
        <th> <input type="varchar" name="Instagram" class="form-control"> </th>
        <th> <input type="varchar" name="Otros" class="form-control"> </th>
    </tr>

         <thead>
              <tr class="text-center roboto-medium" style="background:#5D6D7E;">  
        <th> Posee Carnet de la Patria</th>
        <th> Cogido del Carnet de la Patria</th>
        <th> Serial del Carnet de la Patria</th>
        <th>Beneficios que Percibe por el Carnet de la Patria</th>
        
    </tr>
    </thead>

     <tr style='background:white;' class='text-center roboto-medium'>   
        <th> <select name="Carnet_P" class="form-control" required>
          <option value="">Seleccionar</option> 
<option value="si">Si</option>
<option value="no">No</option>
        </select>
         </th>
        <th>  <input type="varchar" name="Codigo_C" class="form-control"> </th>
        <th> <input type="varchar" name="Serial_C" class="form-control"></th>
        <th> <input type="varchar" name="Beneficios_P" class="form-control"> </th>
    </tr>
<thead>
        <tr class="text-center roboto-medium" style="background:#5D6D7E;"> 
        <th> Posee Carnet del PSUV</th>
        <th> Cogido del Carnet del PSUV</th>
        <th> Serial del Carnet del PSUV</th>
        <th>Beneficios que Percibe por el Carnet del PSUV</th>
        
    </tr>
    </thead>

     <tr style='background:white;' class='text-center roboto-medium'>  
        <th> <select name="Carnet_PSUV" class="form-control" required>
  <option value="">Seleccionar</option> 
<option value="si">Si</option>
<option value="no">No</option>
        </select>
         </th>
        <th>   <input type="varchar" name="Codigo_P" class="form-control"> </th>
        <th>  <input type="varchar" name="Serial_P" class="form-control"> </th>
        <th> <input type="varchar" name="Beneficios_PP" class="form-control"> </th>
    </tr>
 
 <thead>
<tr class="text-center roboto-medium" style="background:#5D6D7E;">  
        <th> Pertenece a Algún Partido Politico</th>
        <th> Pertenece a Algún Movimiento Social</th>
        <th> Pertenece a Alguna Comuna o Consejo Comunal</th>
        <th>Es Usted Vocero en Alguna Comuna o Consejo Comunal</th>
        
    </tr>
</thead>


    <tr style='background:white;' class='text-center roboto-medium'>  
        <th> <input type="varchar" name="Partido_P" class="form-control"> </th>
        <th>   <input type="varchar" name="Mov_S" class="form-control"> </th>
        <th>  <input type="varchar" name="Comuna" class="form-control"> </th>
        <th> <input type="varchar" name="Vocero" class="form-control"> </th>
    </tr>

<thead>
<tr class="text-center roboto-medium" style="background:#5D6D7E;">   
        <th>Recibe el Beneficio de la Caja Clap</th>
        <th> Posee Vivienda Propia Alquilada o Familiar</th>
        <th> Tipo de Vivienda</th>
        <th> Posee Vehiculo Propio</th>
        
    </tr>
    </thead>

    <tr style='background:white;' class='text-center roboto-medium'> 
        <th> 
            <select name="Caja_Clap" class="form-control">
   <option value="">Seleccionar</option>           
<option value="si">Si</option>
<option value="no">No</option>
        </select>
         </th>
        <th>   
         <select name="Vivienda" class="form-control">
 <option value="">Seleccionar</option>         
<option value="propia">Propia</option>
<option value="alquilada">Alquilada</option>
<option value="familiar">Familiar</option>
        </select> 
    </th>
        <th>  <input type="varchar" name="Tipo_V" class="form-control"> </th>
        <th>
            <select name="Vehiculo" class="form-control">
    <option value="">Seleccionar</option>             
<option value="SI">Si</option>
<option value="NO">No</option>
        </select>
    </th>
       </tr>

       <thead>
      <tr class="text-center roboto-medium" style="background:#5D6D7E;"> 
        <th> Tipo de Vehiculo</th>
        <th> Utiliza el Transporte Publico</th>
        <th> Indique Cual</th>
        <th>Describa Brevemente la Ruta que Utiliza Para Trasladarse al Lugar de Trabajo</th>
        
    </tr>
    </thead>

     <tr style='background:white;' class='text-center roboto-medium'>  

        <th> <input type="varchar" name="Tipo_Veh" class="form-control"> </th>
        <th>
           <select name="Transporte_P" class="form-control">
<option value="">Seleccionar</option> 
<option value="SI">Si</option>
<option value="NO">No</option>
        </select>
    </th>
        <th>   <input type="varchar" name="Cual" class="form-control"> </th>
        <th>   <input type="varchar" name="Descrip_R" class="form-control"> </th>
    </tr>

<thead>
<tr class="text-center roboto-medium" style="background:#5D6D7E;">
  <th> Practica Algún Deporte o Actividad Cultural (Indique) </th>
  <th></th>
  <th></th>
  <th></th>
 </tr>
 </thead>
 
<tr style='background:white;' class='text-center roboto-medium'>
  <th><input type="varchar" name="Depor_Cult" class="form-control"></th>
 <th></th>
  <th></th>
  <th></th>

 </tr>


      <thead>
       <tr style='background:white;'> 
        <th> <input type="hidden" name="CedulaID" value="<?php echo $CedulaID?>" readonly></th>
    
        <th><input type="hidden" name="status" value="<?php echo $status?>" readonly></th>
        <th></th>
        <th></th>

      </tr>

</thead>

<table> 
<tr>
  <br>

   <button type='submit' class='btn btn-succes' value="Guardar y Finalizar Registro" name="Enviar" style='background:#ffe65d;color:#0a0a0a;'><strong>Guardar y Finalizar Registro</strong></button>&nbsp; &nbsp;



</tr>

     </table>

    </form>

      </center>
    
    
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