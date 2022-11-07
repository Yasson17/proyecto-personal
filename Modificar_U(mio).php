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
    <title> SESION</title>

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

<?php

$conexion=mysqli_connect('localhost','root','','administrador2');

  ?>


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
    
   <link rel="stylesheet" href="css/bootstrap.min.css">
  
  <main class="full-box main-container" >
    <!-- barra lateral -->
    <section class="full-box nav-lateral" >
      <div class="full-box nav-lateral-bg show-nav-lateral"></div>
      <div class="full-box nav-lateral-content">
        <figure class="full-box nav-lateral-avatar">
          <i class="far fa-times-circle show-nav-lateral"></i>
          <img src="<?php echo $nombre[0] ?>" class="img-fluid" alt="Avatar">
           <figcaption class="roboto-medium text-center" style="background:#ca1818">
             <?php echo $consulta[0] ?> 

          </figcaption>
        </figure>
        <div class="full-box nav-lateral-bar"></div>
        <nav class="full-box nav-lateral-menu">
          <ul>
            <li>
              <a href="usuario.php" ><i class="fab fa-dashcube fa-fw"></i> &nbsp; Inicio </a>
            </li>

            <li>
              <a href="#" class="nav-btn-submenu"><i class="fas fa-user fa-fw"></i> &nbsp; Mis Datos ABAE <i class="fas fa-chevron-down"></i></a>
              <ul>
                

<?php  
                 echo " <a href='consultaUSU.php?Cedula=$consulta[1]'><i class='fas fa-list fa-fw'></i> &nbsp;Mis Datos  </a>";
              ?>
                
                      <?php  
                 echo " <a href='Modificar_U.php?Cedula=$consulta[1]'><i class='fas fa-list fa-fw'></i> &nbsp;Actualizacion de datos  </a>";
              ?>
                
              </ul>
            </li>
                     
<?php  


          echo"<li>
              <a href='#' class='nav-btn-submenu'><i class='fas fa-list fa-fw'></i> &nbsp; Solicitudes <i class='fas fa-chevron-down'></i></a>
              <ul>";
      
      ?>
              <?php  
                 echo " <a href='Notificaciones/formu_reporte_vacacionesU.php?Cedula=$consulta[1]'><i class='fas fa-file fa-fw'></i> &nbsp;Reporte de Vacaciones  </a>";
              ?>
                
                <?php  
                 echo " <a href='Notificaciones/formulario_reposoU.php?Cedula=$consulta[1]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificacion de Reposo  </a>";
              ?>

              <?php  
                 echo " <a href='Notificaciones/formulario_constanciaU.php?Cedula=$consulta[1]'><i class='fas fa-file fa-fw'></i> &nbsp;Constancia de Trabajo</a>";
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

$sentencia="SELECT * FROM inventario.Notificaciones WHERE status='Enviado' AND CedulaID='".$consulta[1]."' ";
$GLOBALS['C_U'] = $C_U;
    $resul=$conex->query($sentencia);
    
    foreach ($resul as $fila) 
    {
      $C_U=$fila['Cedula'];
    }


    if(isset($C_U))
      {
        echo "<li> <a style='background:red;color:white;' href='Notificaciones/Index_reportesV.php?Cedula=$consulta[1]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones  </a></li>";
      }
      else
      {
      echo "<li><a href='Notificaciones/Index_reportesV.php?Cedula=$consulta[1]'><i class='fas fa-file fa-fw'></i> &nbsp;Notificaciones</a></li>";
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
                 echo " <a href='modificar_usuario.php?Cedula=$consulta[1]'><i class='fas fa-user-cog'></i> &nbsp;Actualizar Contraseña   </a>";
              ?>

         &nbsp; &nbsp; &nbsp;<a href="#" class="btn-exit-system">Salir
          <i class="fas fa-power-off"></i>&nbsp; &nbsp; &nbsp;
        </a>
      </nav>


<!-- contenido de la pagina  -->
<center>
      <?php
  include 'Conexion.php';

  $Cedula=$_GET['Cedula'];
  $GLOBALS['C'] = $Cedula;

   include 'Conexion.php';

    $sentencia="SELECT * FROM inventario.Datos_P WHERE Cedula='".$Cedula."' ";
    $resul=$conex->query($sentencia);
     $totalF=mysqli_num_rows($resul);
    if($totalF>0)
    {
echo"<br>";
    echo"<center>";
echo"<h2>Actualizacion de Datos del Trabajador</h2>";
echo "</center>";

 echo "<form action='link_usu/Act_P.php' method='post'>";
    foreach($resul as $fila)
    {

$firma=$fila['Firma'];
if ($firma) {
$desF=explode('/', $firma);

if(empty($desF[2]))
{
  $firma=$desF[0].'/'.$desF[1]; 
}
else
{
$firma=$desF[1].'/'.$desF[2];     
}
}

echo "<div class='table-responsive'>";
                    echo "<table class='table table-dark table-sm'>";
                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Nombres y Apellidos</th>
                                <th>Cedula de Identidad</th>
                                <th>Lugar de Nacimiento</th>
                                <th>Fecha de Nacimiento</th>
                            </tr>";
                       echo"</thead>";

 echo"<tr style='background:white;' class='text-center roboto-medium'>
    <th> <input type='text' style='width:200px' id='Nombres' name='Nombres' value= '".$fila['Nombres'] ."' readonly> </th>
        <th> <input type='VARCHAR' id='cedulap' name='Cedula' value='".$fila['Cedula']."' readonly> </th>
        <th>   <input type='text' id='Lugar_N' name='Lugar_N' value='".$fila['Lugar_N']."' readonly> </th>
        <th> <input type='date' id='Fecha_N' name='Fe_N' value='". $fila['Fecha_N']."' readonly> </th>
        
    </tr>";


                 echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>Estado Civil</th>
                                <th>Derecho</th>
                            </tr>";
                       echo"</thead>";

 echo"<tr style='background:white;' class='text-center roboto-medium'>
    <th> <input type='int' id='edadh' name='Edadp' value= '".$fila['Edad'] ."'> </th>
        <th> <input type='text' id='Sexo' name='Se' value='".$fila['Sexo']."' readonly> </th>
        <th>   <select id='Estado_Civil' name='Estado_Civil' value='".$fila['Estado_Civil']."' style='width:200px'>
<option name=''>Selecionar</option>
<option value='Casado'>Casado(a)</option>
<option value='Conyuge'>Conyugue</option>
<option value='Anulado'>Anulado</option>
<option value='Separado'>Separado de union legal</option>
<option value='Separado'>Separado de union de hecho</option>
<option value='viudo'>Viudo(a)</option>
<option value='soltero'>Soltero(a)</option>

        </select>  </th>


        <th> <input type='text' id='Derecho' name='Derecho' value='". $fila['Derecho']."' readonly> </th>
        
    </tr>";
echo"<script src='autojs_usu/calcuEdadH.js'></script>";

              echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Zurdo</th>
                                <th>Talla de Camisa</th>
                                <th>Talla de Pantalon</th>
                                <th>Talla de Calzado</th>
                            </tr>";
                       echo"</thead>";

echo"<tr style='background:white;' class='text-center roboto-medium'>
    <th> <input type='text' readonly id='Zurdo' name='Zurdo' value= '".$fila['Zurdo'] ."'> </th>
        <th> <input type='VARCHAR' id='Talla_Camisa' name='Talla_Camisa' value='".$fila['Talla_Camisa']."'> </th>

        <th><input type='int' id='Talla_Pantalon' name='Talla_Pantalon' value='".$fila['Talla_Pantalon']."' > </th>
        <th> <input type='int' id='Talla_Calzado' name='Talla_Calzado' value='". $fila['Talla_Calzado']."' > </th>
        
    </tr>";

                 echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Estatura</th>
                                <th>Peso</th>
                                <th>Direccion Domicilio</th>
                                <th>Estado</th>
                            </tr>";
                       echo"</thead>";

echo"<tr style='background:white;' class='text-center roboto-medium'>
    <th> <input type='VARCHAR' id='Estatura' name='Estatura' value= '".$fila['Estatura'] ."'> </th>
        <th> <input type='VARCHAR' id='Peso' name='Peso' value='".$fila['Peso']."'> </th>
        <th><input type='VARCHAR' id='Direccion_domicilio' name='Direccion_domicilio' value='".$fila['Direccion_domicilio']."' > </th>
        <th> <input type='VARCHAR' id='Estado' name='Estado' value='". $fila['Estado']."' > </th>
        
    </tr>";


               echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Municipio</th>
                                <th>Parroquia</th>
                                <th>Telefono de Habitacion</th>
                                <th>Telefono Movil</th>
                            </tr>";
                       echo"</thead>";

echo"<tr style='background:white;' class='text-center roboto-medium'>
    <th> <input type='VARCHAR' id='Municipio' name='Municipio' value= '".$fila['Municipio'] ."'> </th>
        <th> <input type='VARCHAR' id='Parroquia' name='Parroquia' value='".$fila['Parroquia']."'> </th>
        <th><input type='VARCHAR' id='Telefono_Habitacion' name='Telefono_Habitacion' value='".$fila['Telefono_Habitacion']."' > </th>
        <th> <input type='VARCHAR' id='Telefono_Movil' name='Telefono_Movil' value='". $fila['Telefono_Movil']."' > </th>
        
    </tr>";
    

               echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Otro Numero</th>
                                <th>Correo Electronico</th>
                                <th>R.I.F</th>
                                <th>Nro en Caso de Emergencia</th>
                            </tr>";
                       echo"</thead>";


echo"<tr style='background:white;' class='text-center roboto-medium'>
    <th> <input type='VARCHAR' id='Otro_numero' name='Otro_numero' value= '".$fila['Otro_numero'] ."'> </th>
        <th> <input type='email' id='Correo_Elect' name='Correo_Elect' value='".$fila['Correo_Elect']."'> </th>
        <th><input type='VARCHAR' readonly id='RIF' name='RIF' value='".$fila['RIF']."' > </th>
        <th> <input type='VARCHAR' readonly id='Nro_Tlfn_Emergencia' name='Nro_Tlfn_Emergencia' value='". $fila['Nro_Tlfn_Emergencia']."' > </th>
        
    </tr>";

                  echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Nombre de Persona en Caso de Emergencia</th>
                                <th>Alergia a:</th>
                                <th>Tipo de Sangre</th>
                                <th>Padece alguna Enfermedad Cronica</th>
                            </tr>";
                       echo"</thead>";


echo"<tr style='background:white;' class='text-center roboto-medium'>
    <th> <input type='text' id='Nombre_Tlfn_Emergencia' name='Nombre_Tlfn_Emergencia' value= '".$fila['Nombre_Tlfn_Emergencia'] ."'> </th>
        <th> <input type='VARCHAR' id='alergia_a' name='alergia_a' value='".$fila['alergia_a']."' > </th>
        <th><input type='VARCHAR' readonly id='Tipo_Sangre' name='Tipo_Sangre' value='".$fila['Tipo_Sangre']."'> </th>
        <th> <input type='VARCHAR' readonly id='Padece_Enferm_Cronica' name='Padece_Enferm_Cronica' value='". $fila['Padece_Enferm_Cronica']."'  > </th>
        
    </tr>";

            echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Nombre del Conyugue</th>
                                <th>Numero de Hijos</th>
                                <th>Si esta Embarazada</th>
                                <th>Meses de Gestacion</th>
                            </tr>";
                       echo"</thead>";


echo"<tr style='background:white;' class='text-center roboto-medium'>
    <th> <input type='VARCHAR' id='Nombre_Conyuge' name='Nombre_Conyuge' value= '".$fila['Nombre_Conyuge'] ."'> </th>
        <th> <input type='int' id='Nro_Hijos' name='Nro_Hijos' value='".$fila['Nro_Hijos']."'> </th>

       <script src='autojs_usu/Redireccion_agghijos.js'></script>

<th>   <select id='Si_Embarazo' name='Si_Embarazo' value='".$fila['Si_Embarazo']."' style='width:200px'>
<option name=''>Selecionar</option>         
<option value='si' >si</option>
<option value='no'>no</option>
        </select>  
        </th>

        <th> <input type='int' id='Meses_Gestacion' name='Meses_Gestacion' value='". $fila['Meses_Gestacion']."' > </th>
        
</tr>";





echo"<br><br>";
echo"<table>";
    ?>
<img src="<?php echo $firma?>" width="10%"> <br>Firma Actual
<?php
echo"</table>";
echo"</table>";
echo"</div>";
    }
echo"<table>";
echo"<br>";
echo"<br>";
    echo"<button type='submit' class='btn btn-success' style='background:#ffe65d;color:#0a0a0a;'><strong>Guardar Cambios</strong></button>";
    echo"</table>";
echo"</form>";
  
}

?>
      

<br>
<br>
<br>
      



<?php
//ACTUALIZACION DE LOS DATOS HIJOS

    include 'Conexion.php';

    $CedulaID=$_GET['Cedula'];
   
    $status='Activo';
    $sentencia="SELECT * FROM inventario.Datos_H WHERE CedulaID='".$CedulaID."' and status='".$status."' ";

    $resul=$conex->query($sentencia);
 $totalF=mysqli_num_rows($resul);
    if($totalF>0)
    {
echo"<br><br>";
    echo"<center>";
echo"<h2>Datos de Hijos</h2>";
echo "</center>";
echo"<br><br>";
      echo " <form action='link_usu/Act_H.php' method='post'>";
    while ($actualiH = $resul->fetch_array(MYSQLI_BOTH))
    {

 echo"<input type='hidden' name='IDH[]' value='".$actualiH['IDH']."' >";


echo "<div class='table-responsive'>";
                    echo "<table class='table table-dark table-sm'>";
                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Nombres y Apellidos</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Edad</th>
                                <th>Cedula</th>
                            </tr>";
                       echo"</thead>";
 
    echo"<tr style='background:white;' class='text-center roboto-medium'>
      <th><input type='text' id='Nom[".$actualiH['IDH']."]' name='Nom[".$actualiH['IDH']."]' value='".$actualiH['Nombres']."' readonly></th>

      <th><input type='date' id='Fecha_N[".$actualiH['IDH']."]' name='Fecha_N[".$actualiH['IDH']."]' value='".$actualiH['Fecha_N']."' readonly></th>
      

      <th><input type='int' id='Edad[".$actualiH['IDH']."]' name='Edad[".$actualiH['IDH']."]' value='".$actualiH['Edad']."' ></th>
      
      <th><input type='number' id='Cedu[".$actualiH['IDH']."]' name='Cedu[".$actualiH['IDH']."]' value='".$actualiH['Cedula']."' readonly></th>

      </tr>";


echo "<thead>";
     echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>  
     <th> Sexo</th>
    <th> Grado de Estudio </th>
        <th> Talla de Camisa</th>
        <th> Talla de Pantalon </th>
    </tr>";
echo"</thead>";


       echo"<tr style='background:white;' class='text-center roboto-medium'>
      <th><input type='text' name='Sexo[".$actualiH['IDH']."]' readonly value='".$actualiH['Sexo']."' ></th>";

      echo"<th><input type='text' name='Grado_e[".$actualiH['IDH']."]' value='".$actualiH['Grado_e']."'></th>";

      echo"<th><input type='VARCHAR' name='Camisa[".$actualiH['IDH']."]' value='".$actualiH['Camisa']."'></th>";

      echo"<th><input type='int' name='Pantalon[".$actualiH['IDH']."]' value='".$actualiH['Pantalon']."'></th></tr>";
    

      echo "<thead>";
     echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>  
     <th> Talla de Calzado</th>
        <th></th>
        <th></th>
        <th></th>
    </tr>";
echo"</thead>";


       echo"<tr style='background:white;' class='text-center roboto-medium'>
      <th><input type='int' name='Calzados[".$actualiH['IDH']."]' value='".$actualiH['Calzados']."'></th>
      <th><input type='hidden' name='CedulaID[".$actualiH['IDH']."]' value='".$actualiH['CedulaID']."' ></th>
      <th><input type='hidden' name='Ce' value='".$C."' ></th>
        <th></th></tr>";
    

    echo"</table>
    </div>";
    }
    echo"<table>";
 echo "<tr><th><br/><button type='submit' class='btn btn-success' style='background:#ffe65d;color:#0a0a0a;'><strong>Guardar Cambios</strong></button></th></tr>";
 echo"</table>";


echo"</form>";
    }

?>


<?php

//ACTUALIZACION DE LOS DATOS NUCLEO FAMILIAR

include 'Conexion.php';

    $CedulaID=$_GET['Cedula'];
    $status='Activo';
   
    $sentencia="SELECT * FROM inventario.Nucleo_F WHERE CedulaID='".$CedulaID."' and status='".$status."' ";

    $resul=$conex->query($sentencia);
 $totalF=mysqli_num_rows($resul);
 
      echo"<br><br>";
    echo"<center>";
echo"<h2>Nucleo Familiar: (incluir hijos sin limites de edad)</h2>";
echo "</center>";
echo"<br><br>";
    if ($totalF>0) 
    {
         echo " <form action='link_usu/Act_Nu.php'method='post'>";
      
    while ($actualiN = $resul->fetch_array(MYSQLI_BOTH))
    {

  echo"<input type='hidden' name='IDN[]' value='".$actualiN['IDN']."' >";

echo "<div class='table-responsive'>";
                    echo "<table class='table table-dark table-sm'>";
                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Parentesco</th>
                                <th>Nombres</th>
                                <th>Apellidos</th>
                                <th>Cedula</th>
                            </tr>";
                       echo"</thead>";

 echo"<tr style='background:white;' class='text-center roboto-medium'> 
  <th> <input type='VARCHAR' name='Parentesco[".$actualiN['IDN']."]' value='".$actualiN['Parentesco']."' readonly> </th>
    <th> <input type='text' name='NombresN[".$actualiN['IDN']."]' value='".$actualiN['Nombres']."' readonly> </th>
     <th>  <input type='text' name='ApellidosN[".$actualiN['IDN']."]' value='".$actualiN['Apellidos']."' readonly> </th>
     <th> <input type=' VARCHAR'  name='CedulaN[".$actualiN['IDN']."]' value='".$actualiN['Cedula']."' readonly> </th></tr>";


                    echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Fecha de Nacimiento</th>
                                <th>Edad</th>
                                <th>Sexo</th>
                                <th>Estado Civil</th>
                            </tr>";
                       echo"</thead>";




echo"<tr style='background:white;' class='text-center roboto-medium'> 
  <th> <input type='date' name='Fecha_NN[".$actualiN['IDN']."]' value='".$actualiN['Fecha_N']."' readonly> </th>
  <th> <input type='int' id='Edad' name='EdadN[".$actualiN['IDN']."]' value='".$actualiN['Edad']."'> </th>
        
        <th> <input type='text' name='SexoN[".$actualiN['IDN']."]' value='".$actualiN['Sexo']."' readonly> </th>
         <th>   <select id='Estado_CN[]' name='Estado_CN[".$actualiN['IDN']."]' value='".$actualiN['Estado_C']."' style='width:200px' >
<option name=''>Selecionar</option>
<option value='Casado'>Casado(a)</option>
<option value='Conyuge'>Conyugue</option>
<option value='Anulado'>Anulado</option>
<option value='Separado'>Separado de union legal</option>
<option value='Separado'>Separado de union de hecho</option>
<option value='viudo'>Viudo(a)</option>
<option value='soltero'>Soltero(a)</option>

</select>  </th>
       
</tr>";


                    echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Grado de Instruccion</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>";
                       echo"</thead>";


echo"<tr style='background:white;' class='text-center roboto-medium'>  
   
        <th> <input type='VARCHAR' name='Grado_I[".$actualiN['IDN']."]' value='".$actualiN['Grado_I']."' </th>
<th><input type='hidden' name='CedulaID[".$actualiN['IDN']."]' value='".$actualiN['CedulaID']."' ></th> 

<th><input type='hidden' name='Ce' value='".$C."' ></th>

  <th></th>
  </tr>";

echo "</table>
</div>";


}

echo "<table>";
 echo "<tr><th><button type='submit' class='btn btn-success' style='background:#ffe65d;color:#0a0a0a;'><strong>Guardar Cambios</strong></button></th>
</tr>";

echo "</table>";
echo"</form>";

    }
    
echo"<button type='button' class='btn btn-succes' style='background:#000077; color:white;' data-toggle='modal' data-target='#Agregar'>
    Agregar Familiar
</button>";


?>

<br>
<br>
<br>

<?php

//ACTUALIZACION DE LOS DATOS NIVEL ACADEMICO

include 'Conexion.php';

    $CedulaID=$_GET['Cedula'];
    $status='Activo';

    $sentencia="SELECT * FROM inventario.Nivel_A WHERE CedulaID='".$CedulaID."' and status='".$status."' ";

    $resul=$conex->query($sentencia);
     $totalF=mysqli_num_rows($resul);

      echo"<br><br>";
    echo"<center>";
echo"<h2>Nivel Academico (hacer mención de todas las carreras)</h2>";
echo "</center>
      <br>";

    if ($totalF>0) 
    {
echo"<form action='link_usu/Act_Ni.php' method='post'>";

    
    while ($actualiA = $resul->fetch_array(MYSQLI_BOTH))
    {
echo"<input type='hidden' name='IDA[]' value='".$actualiA['IDA']."' >";
 

echo "<div class='table-responsive'>";
                    echo "<table class='table table-dark table-sm'>";
                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Especializacion</th>
                                <th>Titulo obtenido</th>
                                <th>Año de graduado</th>
                                <th>Instituto/Universidad</th>
                            </tr>";
                       echo"</thead>";


echo"<tr style='background:white;' class='text-center roboto-medium'>    
  <th> <input type='VARCHAR' name='Especializacion[".$actualiA['IDA']."]' value='".$actualiA['Especializacion']."' readonly> </th>
    <th> <input type='VARCHAR' name='Titulo_O[".$actualiA['IDA']."]' value='".$actualiA['Titulo_O']."' readonly> </th>
     <th>  <input type='date' name='Ano_G[".$actualiA['IDA']."]' value='".$actualiA['Ano_G']."' readonly> </th>
     <th> <input type='VARCHAR' name='Inst_Univ[".$actualiA['IDA']."]' value='".$actualiA['Inst_Univ']."' readonly> </th>
    </tr>";


             echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Observaciones</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>";
                       echo"</thead>";




echo"<tr style='background:white;' class='text-center roboto-medium'> 
  <th> <input type='VARCHAR' name='Observaciones[".$actualiA['IDA']."]' value='".$actualiA['Observaciones']."' readonly> </th>
<th><input type='hidden' name='CedulaID[".$actualiA['IDA']."]' value='".$actualiA['CedulaID']."' ></th>

<th><input type='hidden' name='Ce' value='".$C."' ></th>
<th></th>
</tr>";

echo"</table> 
</div>";

}

echo"</form>";
}
 
 echo"<button type='button' class='btn btn-succes' style='background:#000077; color:white;' data-toggle='modal' data-target='#NivelA'>
    Agregar Nivel Academico
</button>";

?>
<br>
<br>
<br>



<?php
//ACTUALIZACION DE LOS DATOS FORMACION EN EL EXTERIOR

include 'Conexion.php';

    $CedulaID=$_GET['Cedula'];
    $status='Activo';
    $sentencia="SELECT * FROM inventario.Formacion_E WHERE CedulaID='".$CedulaID."' and status='".$status."' ";

    $resul=$conex->query($sentencia);
    $totalF=mysqli_num_rows($resul);

      echo"<br><br>";
    echo"<center>";
echo"<h2>Formación en el Exterior</h2>";
echo "</center>
      <br>";
    if ($totalF>0) 
    {
 echo " <form action='link_usu/Act_F.php' method='post'>";
    
    while ($actualiF = $resul->fetch_array(MYSQLI_BOTH))
    {
  echo"<input type='hidden' name='IDF[]' value='".$actualiF['IDF']."' >";

echo "<div class='table-responsive'>";
                    echo "<table class='table table-dark table-sm'>";
                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Titulo Obtenido</th>
                                <th>Año de Graduado</th>
                                <th>Instituto/Universidad</th>
                                <th>Pais</th>
                            </tr>";
                       echo"</thead>";


echo"<tr style='background:white;' class='text-center roboto-medium'> 
 
    <th> <input type='VARCHAR' name='Titulo_OF[".$actualiF['IDF']."]' value='".$actualiF['Titulo_O']."' readonly> </th>
     <th>  <input type='VARCHAR' name='Ano_GF[".$actualiF['IDF']."]' value='".$actualiF['Ano_G']."' readonly> </th>
     <th> <input type='VARCHAR' name='Inst_UnivF[".$actualiF['IDF']."]' value='".$actualiF['Inst_Univ']."' readonly> </th>
     <th> <input type='VARCHAR' name='Pais[".$actualiF['IDF']."]' value='".$actualiF['Pais']."' readonly> </th>
    </tr>";

    echo"<tr><th><input type='hidden' name='CedulaID[".$actualiF['IDF']."]' value='".$actualiF['CedulaID']."' ></th>

<th><input type='hidden' name='Ce' value='".$C."' ></th> 
<th></th>
<th></th>

    </tr>";

echo"</table> 
</div>";

}

echo"</form>";
}

echo"<button type='button' class='btn btn-succes' style='background:#000077; color:white;' data-toggle='modal' data-target='#formacion'>
    Agregar Formación
</button>";
?>

<br>
<br>
<br>

<?php
//ACTUALIZACION DE LOS DATOS EXPERIENCIA LABORAL EN LA ADMINISTRACION PUBLICA

include 'Conexion.php';

    $CedulaID=$_GET['Cedula'];
    $status='Activo';
    $sentencia="SELECT * FROM inventario.Experiencia_L WHERE CedulaID='".$CedulaID."' and status='".$status."' ";

    $resul=$conex->query($sentencia);
     $totalF=mysqli_num_rows($resul);

      echo"<br><br>";
    echo"<center>";
echo"<h2>Experiencia Laboral en la Administracion Publica</h2>";
echo "</center>
      <br>";
    if ($totalF>0) 
    {
 echo " <form action='link_usu/Act_Exp.php' method='post'> 
      <br>";
    
    while ($actualiE = $resul->fetch_array(MYSQLI_BOTH))
    {

  echo"<input type='hidden' name='IDE[]' value='".$actualiE['IDE']."' >";

echo "<div class='table-responsive'>";
                    echo "<table class='table table-dark table-sm'>";
                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Organismo</th>
                                <th>Fecha de Ingreso</th>
                                <th>Fecha de Egreso</th>
                                <th>Cargo</th>
                            </tr>";

echo"<tr style='background:white;' class='text-center roboto-medium'> 
   
  <th> <input type='VARCHAR' name='Organismo[".$actualiE['IDE']."]' value='".$actualiE['Organismo']."' readonly> </th>
    <th> <input type='date' name='Fecha_I[".$actualiE['IDE']."]' value='".$actualiE['Fecha_I']."' readonly> </th>
     <th>  <input type='date' name='Fecha_E[".$actualiE['IDE']."]' value='".$actualiE['Fecha_E']."' readonly> </th>
     <th> <input type='VARCHAR' name='Cargo[".$actualiE['IDE']."]' value='".$actualiE['Cargo']."' readonly> </th>
    </tr>";



            echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Posee Antecedentes de Servicio</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>";


echo"<tr style='background:white;' class='text-center roboto-medium'> 
    
      <th> <input type='VARCHAR' name='Antecedentes_S[".$actualiE['IDE']."]' value='".$actualiE['Antecedentes_S']."'> </th>

<th><input type='hidden' name='CedulaID[".$actualiE['IDE']."]' value='".$actualiE['CedulaID']."' ></th>

<th><input type='hidden' name='Ce' value='".$C."' ></th>
<th></th>

    </tr>";

echo"</table> 
</div>";

}


echo "<table>";
 echo "<tr><th><button type='submit' class='btn btn-success' style='background:#ffe65d;color:#0a0a0a;'><strong>Guardar Cambios</strong></button>&nbsp;&nbsp;&nbsp;
</th></tr>";
 echo "</table>";
echo"</form>";

}

echo"<button type='button' class='btn btn-succes' style='background:#000077; color:white;' data-toggle='modal' data-target='#expe'>
    Agregar Experiencia
</button>";
?>

<br>
<br>
<br>

<?php


//ACTUALIZACION DE LOS DATOS LABORALES DE LA INSTITUCION

    include 'Conexion.php';

    $CedulaID=$_GET['Cedula'];
    $status='Activo';

    $sentencia="SELECT * FROM inventario.Datos_I WHERE CedulaID='".$CedulaID."' and status='".$status."' ";

    $resul=$conex->query($sentencia);
$totalF=mysqli_num_rows($resul);

    if($totalF>0)
    {

       echo"<br><br>";
    echo"<center>";
echo"<h2>Datos Laborales de la Institución</h2>";
echo "</center>
      <br>";
 echo " <form action='link_usu/Act_I.php' method='post'> 
      <br>";

    
    while ($actualiI = $resul->fetch_array(MYSQLI_BOTH))
    {
    
    echo"<input type='hidden' name='IDI[]' value='".$actualiI['IDI']."' >";


echo "<div class='table-responsive'>";
                    echo "<table class='table table-dark table-sm'>";
                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Fecha de Ingreso en ABAE</th>
                                <th>Cargo</th>
                                <th>Sede</th>
                                <th>Direccion de Adscripcion</th>
                            </tr>";
 echo "</thead>";

echo"<tr style='background:white;' class='text-center roboto-medium'> 
  <th> <input type='date' readonly name='Fecha_ABAE[".$actualiI['IDI']."]' value='".$actualiI['FechaI_ABAE']."'> </th>
    <th> <input type='VARCHAR' readonly name='CargoI[".$actualiI['IDI']."]' value='".$actualiI['Cargo']."' > </th>
     <th>  <input type='VARCHAR' readonly name='Sede[".$actualiI['IDI']."]' value='".$actualiI['Sede']."'> </th>
     <th> <input type='VARCHAR' name='Direccion_A[".$actualiI['IDI']."]' value='".$actualiI['Direccion_A']."'> </th>
    </tr>";


                echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Unidad de Adscripcion</th>
                                <th>Jefe Inmediato</th>
                                <th>Fecha de Inicio de Servicio en la Administracion Publica </th>
                                <th>Total Años de Servicios</th>
                            </tr>";

echo "</thead>";

echo"<tr style='background:white;' class='text-center roboto-medium'>   
      <th> <input type='VARCHAR' readonly name='Unidad_A[".$actualiI['IDI']."]' value='".$actualiI['Unidad_A']."'> </th>
         <th> <input type='VARCHAR' name='Jefe_I[".$actualiI['IDI']."]' value='".$actualiI['Jefe_I']."'> </th>
          <th> <input type='date' readonly name='Fecha_Servicio[".$actualiI['IDI']."]' value='".$actualiI['FechaI_Servicio']."'> </th>
           <th> <input type='number' name='TotalA_Serv[".$actualiI['IDI']."]' value='".$actualiI['TotalA_Serv']."'> </th>
    </tr>";

                    echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Correo Electronico Institucional</th>
                                <th>Telefono de Oficina</th>
                                <th>Posee Familiares en ABAE (SI/NO) </th>
                                <th>Indique Nombres y Apellidos</th>
                            </tr>";
echo "</thead>";



echo"<tr style='background:white;' class='text-center roboto-medium'>   
   
        <th> <input type='VARCHAR' name='CorreoE_Ins[".$actualiI['IDI']."]' value='".$actualiI['CorreoE_Ins']."'> </th>
         <th> <input type='VARCHAR' name='Telefono_O_Ext[".$actualiI['IDI']."]' value='".$actualiI['Telefono_O_Ext']."'> </th>
          <th> <input type='VARCHAR' name='Familiares_ABAE[".$actualiI['IDI']."]' value='".$actualiI['Familiares_ABAE']."'> </th>
           <th> <input type='VARCHAR' name='NombresI[".$actualiI['IDI']."]' value='".$actualiI['Nombres']."'> </th>
    </tr>";

  echo "<thead>";
                            echo "<tr  style='background:white;'>
                                <th></th>
                                <th></th>
                                <th> </th>
                                <th></th>
                            </tr>";

echo "</thead>";



     echo"<tr style='background:white;'><th><input type='hidden' name='CedulaID[".$actualiI['IDI']."]' value='".$actualiI['CedulaID']."' ></th>
<th><input type='hidden' style='background:white;' name='Ce' value='".$C."' ></th>
<th></th>
<th></th>
     </tr>";


echo"</table> 
</div>";
    
    }

echo "<table>";
 echo "<tr><th><button type='submit' class='btn btn-success' style='background:#ffe65d;color:#0a0a0a;'><strong>Guardar Cambios</strong></button>&nbsp;&nbsp;&nbsp;

</th></tr>";
echo "</table>";
echo"</form>";

}

?>
<br>
<br>
<br>

<?php

//ACTUALIZACION DE LOS DATOS EN CASO DE SER PERSONAL EN COMISION DE SERVICIO (CIVIL O MILITAR)

    include 'Conexion.php';
    $CedulaID=$_GET['Cedula'];
    $status='Activo';

    $sentencia="SELECT * FROM inventario.Datos_M WHERE CedulaID='".$CedulaID."' and status='".$status."' ";

    $resul=$conex->query($sentencia);
$totalF=mysqli_num_rows($resul);

echo"<br><br>";
    echo"<center>";
echo"<h2>En Caso de ser Personal en Comisión de Servicio (Civil o Militar)</h2>";
echo "</center>
      <br>";
    if($totalF>0)
    {
 echo " <form action='link_usu/Act_C.php' method='post'> 
      <br>";
    

    while ($actualiC = $resul->fetch_array(MYSQLI_BOTH))
    {
    
    echo"<input type='hidden' name='IDM[]' value='".$actualiC['IDM']."' >";


echo "<div class='table-responsive'>";
                    echo "<table class='table table-dark table-sm'>";
                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Fecha de Inicio de Servicio en la Administracion Publica</th>
                                <th>Años de Servicios</th>
                                <th>Instituto, Ente, o Componente de Procedencia</th>
                                <th>Rango Militar</th>
                            </tr>";

echo"<tr style='background:white;' class='text-center roboto-medium'>   
  
  <th> <input type='date' name='FechaI_ServicioC[".$actualiC['IDM']."]' value='".$actualiC['FechaI_Servicio']."' readonly> </th>
    <th> <input type='number' name='Ano_S[".$actualiC['IDM']."]' value='".$actualiC['Ano_S']."'> </th>
     <th>  <input type='VARCHAR' name='Institu_P[".$actualiC['IDM']."]' value='".$actualiC['Institu_P']."' readonly> </th>
     <th> <input type='VARCHAR' name='Rango_M[".$actualiC['IDM']."]' value='".$actualiC['Rango_M']."'> </th>
    </tr>";


                   echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Tiempo de la Comision de Servicio</th>
                                <th> Fecha de Inicio de la Comision de Servicio</th>
                                <th>Fecha de Culminacion de la Comision de Servicio</th>
                                <th></th>
                            </tr>";


echo"<tr style='background:white;' class='text-center roboto-medium'>   
   
   
        <th> <input type='VARCHAR' name='TiempoC_S[".$actualiC['IDM']."]' value='".$actualiC['TiempoC_S']."' readonly> </th>
        <th> <input type='date' name='FechaI_Ser[".$actualiC['IDM']."]' value='".$actualiC['FechaI_Ser']."' readonly> </th>
        <th> <input type='date' name='FechaC_Ser[".$actualiC['IDM']."]' value='".$actualiC['FechaC_Ser']."' readonly> </th>
        <th> <input type='hidden' name='CedulaID[".$actualiC['IDM']."]' value='".$actualiC['CedulaID']."' readonly> </th>
        <th><input type='hidden' name='Ce' value='".$C."' ></th>
    </tr>";

      echo "</table>";
     echo "</div>";
    }
    

echo "<table>";
 echo "<tr><th><button type='submit' class='btn btn-success' style='background:yellow;color:black;'>Guardar Cambios</button>&nbsp;&nbsp;

 </th></tr>";
 echo "</table>";
echo"</form>";
}
echo"<button type='button' class='btn btn-succes' style='background:#000077; color:white;' data-toggle='modal' data-target='#comision'>
    Comision de Servicio
</button>";

?>

<br>
<br>
<br>


<?php

    //ACTUALIZACION DE OTROS DATOS

    include 'Conexion.php';
    $CedulaID=$_GET['Cedula'];
    $status='Activo';
    
    $sentencia="SELECT * FROM inventario.Otros WHERE CedulaID='".$CedulaID."' and status='".$status."' ";

    $resul=$conex->query($sentencia);
$totalF=mysqli_num_rows($resul);

    if($totalF>0)
    {

echo"<br><br>";
    echo"<center>";
echo"<h2>Otros Datos</h2>";
echo "</center>
      <br>";
 echo " <form action='link_usu/Act_Otros.php' method='post'> 
      <br>";
    

    while ($actualiO = $resul->fetch_array(MYSQLI_BOTH))
    {

 echo"<input type='hidden' name='IDO[]' value='".$actualiO['IDO']."' >";

echo "<div class='table-responsive'>";
                    echo "<table class='table table-dark table-sm'>";
                        echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Facebook</th>
                                <th>Twitter</th>
                                <th>Instagram</th>
                                <th>Otros</th>
                            </tr>";
echo "</thead>";

echo"<tr style='background:white;' class='text-center roboto-medium'>   
    
    <th> <input type='VARCHAR' name='Facebook[".$actualiO['IDO']."]' value='".$actualiO['Facebook']."'> </th>
        <th> <input type='VARCHAR' name='Twitter[".$actualiO['IDO']."]' value='".$actualiO['Twitter']."'> </th>
        <th>   <input type='VARCHAR' name='Instagram[".$actualiO['IDO']."]' value='".$actualiO['Instagram']."'> </th>
        <th> <input type='VARCHAR' name='Otros[".$actualiO['IDO']."]' value='".$actualiO['Otros']."'> </th>
</tr>";

                 echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Posee Carnet de la Patria</th>
                                <th>Cogido del Carnet de la Patria</th>
                                <th>Serial del Carnet de la Patria</th>
                                <th>Beneficios que Percibe por el Carnet de la Patria</th>
                            </tr>";
echo "</thead>";

echo"<tr style='background:white;' class='text-center roboto-medium'>   
    
    <th> <input type='text' readonly name='Carnet_P[".$actualiO['IDO']."]' value='".$actualiO['Carnet_P']."' > </th>
        <th> <input type='number' name='Codigo_C[".$actualiO['IDO']."]' value='".$actualiO['Codigo_C']."'> </th>
        <th> <input type='number' name='Serial_C[".$actualiO['IDO']."]' value='".$actualiO['Serial_C']."'> </th>
        <th> <input type= 'VARCHAR' name='Beneficios_P[".$actualiO['IDO']."]' value='".$actualiO['Beneficios_P']."'> </th>
</tr>";
        
                      echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Posee Carnet del PSUV</th>
                                <th>Cogido del Carnet del PSUV</th>
                                <th>Serial del Carnet del PSUV</th>
                                <th>Beneficios que Percibe por el Carnet del PSUV</th>
                            </tr>";
                            echo "</thead>";

echo"<tr style='background:white;' class='text-center roboto-medium'>   
      
    <th> <input type='text' name='Carnet_PSUV[".$actualiO['IDO']."]' value='".$actualiO['Carnet_PSUV']."'> </th>
        <th> <input type='number' name='Codigo_P[".$actualiO['IDO']."]' value='".$actualiO['Codigo_P']."'> </th>
        <th> <input type='number' name='Serial_P[".$actualiO['IDO']."]' value='".$actualiO['Serial_P']."'> </th>
        <th> <input type='VARCHAR' name='Beneficios_PP[".$actualiO['IDO']."]' value='".$actualiO['Beneficios_PP']."'> </th>
</tr>";

                     echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Pertenece a Algun Partido Politico</th>
                                <th>Pertenece a Algun Movimiento Social</th>
                                <th>Pertenece a Alguna Comuna o Consejo Comunal</th>
                                <th>Es Usted Vocero en Alguna Comuna o Consejo Comunal</th>
                            </tr>";
                            echo "</thead>";

echo"<tr style='background:white;' class='text-center roboto-medium'>   
  
    <th> <input type='text' name='Partido_P[".$actualiO['IDO']."]' value='".$actualiO['Partido_P']."'> </th>
        <th> <input type='VARCHAR' name='Mov_S[".$actualiO['IDO']."]' value='".$actualiO['Mov_S']."'> </th>
        <th>   <input type='VARCHAR' name='Comuna[".$actualiO['IDO']."]' value='".$actualiO['Comuna']."'> </th>
        <th> <input type='text' name='Vocero[".$actualiO['IDO']."]' value='".$actualiO['Vocero']."'> </th>
</tr>";
        
                 echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th>Recibe el Beneficio de la Caja Clap</th>
                                <th>Posee Vivienda Propia Alquilada o Familiar</th>
                                <th>Tipo de Vivienda</th>
                                <th>Posee Vehiculo Propio</th>
                            </tr>";
                            echo "</thead>";

echo"<tr style='background:white;' class='text-center roboto-medium'>   
  
    <th> <input type='text' name='Caja_Clap[".$actualiO['IDO']."]' value='".$actualiO['Caja_Clap']."'> </th>
        <th>  <input type='text' name='Vivienda[".$actualiO['IDO']."]' value='".$actualiO['Vivienda']."'> </th>
        <th>  <input type='text' name='Tipo_V[".$actualiO['IDO']."]' value='".$actualiO['Tipo_V']."'> </th>
        <th> <input type='text' name='Vehiculo[".$actualiO['IDO']."]' value='".$actualiO['Vehiculo']."'> </th>
</tr>";

                echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th> Tipo de Vehiculo</th>
                                <th> Utiliza el Transporte Publico</th>
                                <th> Indique Cual</th>
                                <th>Describa Brevemente la Ruta que Utiliza Para Trasladarse al Lugar de Trabajo</th>
                            </tr>";
echo "</thead>";

echo"<tr style='background:white;' class='text-center roboto-medium'>   
 
    <th> <input type='VARCHAR' name='Tipo_Veh[".$actualiO['IDO']."]' value='".$actualiO['Tipo_Veh']."'> </th>
        <th> <input type='text' name='Transporte_P[".$actualiO['IDO']."]' value='".$actualiO['Transporte_P']."'> </th>
        <th>  <input type='VARCHAR' name='Cual[".$actualiO['IDO']."]' value='".$actualiO['Cual']."'> </th>
        <th>  <input type='VARCHAR' name='Descrip_R[".$actualiO['IDO']."]' value='".$actualiO['Descrip_R']."'> </th>

</tr>";

                     echo "<thead>";
                            echo "<tr class='text-center roboto-medium' style='background:#5D6D7E;'>
                                <th> Practica Algun deporte o Actividad Cultural (INDIQUE)</th>
                                <th></th>
                                <th></th>
                                <th></th>
                            </tr>";
                            echo "</thead>";

echo"<tr style='background:white;' class='text-center roboto-medium'>   
   
    <th> <input type='VARCHAR' name='Depor_Cult[".$actualiO['IDO']."]' value='".$actualiO['Depor_Cult']."'> </th>
    <th><input type='hidden' name='CedulaID[".$actualiO['IDO']."]' value='".$actualiO['CedulaID']."' ></th>
    <th><input type='hidden' name='Ce' value='".$C."' ></th>
    <th></th>
</tr>";

 echo "</table>";
 echo "</div>";

}
  
echo "<table>";
 echo "<tr><th><button type='submit' class='btn btn-success' style='background:#ffe65d;color:#0a0a0a;'><strong>Guardar Cambios</strong></button>&nbsp;&nbsp;

</th></tr>";
 echo "</table>";
echo"</form>";
}
?>

</center>
</section>
</main>

<!-- modal para agregar familiar -->

<div class="modal" id="Agregar" tabindex="-1" role="dialog" >
 
      <div class="modal-dialog modal-lg" >
        <div class="modal-content">
        <div class="modal-header" style="background:#000077; color: white;">
          <legend></i> &nbsp; Agregar Familiar </legend>
                   
        </div>
                  

          <form method="post" action="link_usu/agg_mod_familiar_Ind.php">

                      <div class="modal-body">
                         
               <fieldset>
            
            
<div class="container-fluid">
  <div class='table-responsive'> 
          <table class='table table-dark table-sm'>
         

    
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

         <tr style='background: white; width:200px' class='text-center roboto-medium'>     
        <th>
         <select name="Parentesco">
<option name="">Seleccionar</option>
<option value="esposo">Esposo(a)</option>
<option value="hijo">Hijo(a)</option>
<option value="padre">Padre</option>
<option value="madre">Madre</option>
<option value="abuelo">Abuelo(a)</option>
<option value="sobrino">Sobrino(a)</option>
<option value="tio">Tio(a)</option>
        </select> 
    </th>
        <th> <input type="texto" name="Nombres"> </th>
        <th> <input type="texto" name="Apellidos"> </th>
        <th> <input type="VARCHAR" name="Cedula"> </th>
        
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

          <th> <input type="date" id="Fecha_N" name="Fecha_N"> </th>
        <th> <input type="number" id="edadh" name="Edad"> </th>
        <th> 

         <script src="autojs_usu/calcuEdadH.js"></script>

            <select name="Sexo" style='width:200px'>
<option name="">Seleccionar</option>
<option value="M">Masculino</option>
<option value="F">Femenino</option>
        </select>
         </th>
        <th> 
            <select name="Estado_C" style='width:200px'>
<option name="">Seleccionar</option>
<option value="casado">Casado(a)</option>
<option value="conyuge">Conyugue</option>
<option value="anulado">Anulado</option>
<option value="separado">Separado de Union Legal</option>
<option value="separado">Separado de Union de Hecho</option>
<option value="viudo">Viudo(a)</option>
<option value="soltero">Soltero(a)</option>
        </select> 
    </th>
        
    </tr>
          

    <thead>
     <tr class="text-center roboto-medium" style="background:#5D6D7E;">
      <th> Grado de Instruccion </th>
      <th></th>
      <th></th>
      <th></th>
</tr>
        </thead>  
        
      
         <tr style='background:white;' class='text-center roboto-medium'> 
       <th>  <input type="VARCHAR" name="Grado_I"> </th>
        <th></th>
        <th></th>
        <th></th>
         </tr> 
        

        </div>
</div>
</table>
</div>
         <input type="hidden" name="CedulaID" value="<?php echo $CedulaID?>" readonly><br>
       
          </fieldset>

                    </div>

               <div class="modal-footer">
                <button type="reset" class="btn btn-raised btn-secondary btn-sm"  style="background:#CA1818;color:white"></i> &nbsp; LIMPIAR</button>
                    &nbsp;&nbsp; <input type="submit"  value="Guardar y Continuar" name="Enviar" style="background:#000077;color:white; ">
                   </div>  

                     </form>

            
            </div>
          </div>
        </div>
     


<!-- modal para agregar nivel academico -->

<div class="modal" id="NivelA" tabindex="-1" role="dialog" >
 
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header" style="background:#000077; color: white;">
          <legend> &nbsp; Nivel Academico </legend>
                   
        </div>
                  

          <form method="post" action="link_usu/agg_mod_nivel.php">

                      <div class="modal-body">
                         
               <fieldset>
      
<div class="container-fluid">
  <div class='table-responsive'> 
          <table class='table table-dark table-sm'>
         

 <div class="col-12 col-md-6">
  <div class="form-group">

   <thead>
     <tr class="text-center roboto-medium" style="background:#5D6D7E;"> 
         <th> Especializacion </th>
        <th> Titulo Obtenido </th>
        <th> Año de Graduado </th>
        <th> Instituto/Universidad </th>
       
        
     </tr>
        </thead>



         <tr style='background:white;' class='text-center roboto-medium'> 
  
          <th> <input type="VARCHAR" name="Especializacion"> </th>
        <th> <input type="VARCHAR" name="Titulo_O"> </th>
        <th> <input type="date" name="Ano_G"> </th>
        <th> <input type="VARCHAR" name="Inst_Univ"> </th>
        
        </tr>

         <thead>
     <tr class="text-center roboto-medium" style="background:#5D6D7E;"> 
  <th> Observaciones </th>
 <th></th>
 <th></th>
 <th></th>
        
     </tr>
        </thead>

 <tr style='background:white;' class='text-center roboto-medium'> 
  
    <th>  <input type="VARCHAR" name="Observaciones"> </th>
<th></th>
<th></th>
<th></th>
    </tr>
        
         <input type="hidden" name="CedulaID" value="<?php echo $CedulaID?>" readonly><br>
</table>
</div>
       </div>
          </fieldset>


                    </div>

               <div class="modal-footer">
                <button type="reset" class="btn btn-raised btn-secondary btn-sm"  style="background:#CA1818;color:white"> &nbsp; LIMPIAR</button>
                    &nbsp;&nbsp; <input type="submit"  value="Guardar y Continuar" name="Enviar" style="background:#000077;color:white; ">
                   </div>  

                     </form>

            
            </div>
          </div>
        </div>
     

<!-- modal para agregar formacion en el exterior -->

<div class="modal" id="formacion" tabindex="-1" role="dialog" >
 
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header" style="background:#000077; color: white;">
          <legend> &nbsp; Formacion en el Exterior </legend>
                   
        </div>
                  

          <form method="post" action="link_usu/agg_mod_formacion.php">

                      <div class="modal-body">
                         
               <fieldset>
      
<div class="container-fluid">
  <div class='table-responsive'> 
          <table class='table table-dark table-sm'>
         
   <thead>
     <tr class="text-center roboto-medium" style="background:#5D6D7E;"> 
         <th> Titulo Obtenido </th>
        <th> Año de Graduado </th>
        <th> Instituto/Universidad </th>
        <th> Pais </th>
       
        
     </tr>
        </thead>



         <tr style='background:white;' class='text-center roboto-medium'> 
  
           <th> <input type="VARCHAR" name="Titulo_O"> </th>
        <th> <input type="date" name="Ano_G"> </th>
        <th> <input type="VARCHAR" name="Inst_Univ"> </th>
        <th>  <input type="VARCHAR" name="Pais"></th>
        
        </tr>
        
         <input type="hidden" name="CedulaID" value="<?php echo $CedulaID?>" readonly>
</table>
</div>
       </div>
          </fieldset>


                    </div>

               <div class="modal-footer">
                <button type="reset" class="btn btn-raised btn-secondary btn-sm"  style="background:#CA1818;color:white"> &nbsp; LIMPIAR</button>
                    &nbsp;&nbsp; <input type="submit"  value="Guardar y Continuar" name="Enviar" style="background:#000077;color:white; ">
                   </div>  

                     </form>

            
            </div>
          </div>
        </div>
     

<!-- modal para agregar experiencia en la administracion publica -->

<div class="modal" id="expe" tabindex="-1" role="dialog" >
 
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header" style="background:#000077; color: white;">
          <legend> &nbsp; Experiencia en administracion Publica </legend>
                    
        </div>
                  

          <form method="post" action="link_usu/agg_mod_experiencia.php">

                      <div class="modal-body">
                         
               <fieldset>
      
<div class="container-fluid">
  <div class='table-responsive'> 
          <table class='table table-dark table-sm'>
         
   <thead>
     <tr class="text-center roboto-medium" style="background:#5D6D7E;"> 
         <th> Organismos</th>
        <th> Fecha de Ingreso </th>
        <th> Fecha de Egreso </th>
        <th> Cargo </th>
       
        
     </tr>
        </thead>



         <tr style='background:white;' class='text-center roboto-medium'> 
  
            <th> <input type="VARCHAR" name="Organismo"> </th>
        <th> <input type="date" name="Fecha_I"> </th>
        <th> <input type="date" name="Fecha_E"> </th>
        <th>  <input type="VARCHAR" name="Cargo"> </th>
        
        </tr>
        
<thead>
     <tr class="text-center roboto-medium" style="background:#5D6D7E;">
        <th> Posee Antecedentes de Servicios </th>
        <th></th>
        <th></th>
        <th></th>
    </tr>

   <tr style='background:white;' class='text-center roboto-medium'> 
   
        <th> 
            <select name="Antecedentes_S" style="width: 200px">
<option name="">Seleccionar</option>
<option value="si">SI</option>
<option value="no">NO</option>
        </select>
         </th>
         <th></th>
         <th></th>
         <th></th>

    </tr>


         <input type="hidden" name="CedulaID" value="<?php echo $CedulaID?>" readonly>
</table>
</div>
       </div>
          </fieldset>


                    </div>

               <div class="modal-footer">
                <button type="reset" class="btn btn-raised btn-secondary btn-sm"  style="background:#CA1818;color:white"> &nbsp; LIMPIAR</button>
                    &nbsp;&nbsp; <input type="submit"  value="Guardar y Continuar" name="Enviar" style="background:#000077;color:white; ">
                   </div>  

                     </form>

            
            </div>
          </div>
        </div>


<!-- modal para agregar comision de servicio -->

<div class="modal" id="comision" tabindex="-1" role="dialog" >
 
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
        <div class="modal-header" style="background:#000077; color: white;">
          <legend> &nbsp; Comision de Servicio </legend>
                    
        </div>
                  

          <form method="post" action="link_usu/agg_mod_comision.php">

                      <div class="modal-body">
                         
               <fieldset>
      
<div class="container-fluid">
  <div class='table-responsive'> 
          <table class='table table-dark table-sm'>
         
   <thead>
     <tr class="text-center roboto-medium" style="background:#5D6D7E;"> 
        <th> Fecha de Inicio en la Administracion Publica</th>
        <th> Años de Servicios </th>
        <th> Instituto/Ente/Componente de Procedencia </th>
        <th> Rango Militar </th>
       
        
     </tr>
        </thead>



         <tr style='background:white;' class='text-center roboto-medium'> 
  
            <th> <input type="date" id="Fecha_N" name="FechaI_Servicio"> </th>
        <th> <input type="number" id="edadh" name="Ano_S"> </th>
        <th> <input type="varchar" name="Institu_P"> </th>
        <th>  <input type="varchar" name="Rango_M"> </th>
          <script src="autojs/calcuEdadH.js"></script>
        </tr>
        
<thead>
     <tr class="text-center roboto-medium" style="background:#5D6D7E;">
      <th> Tiempo de Comision de Servicios </th>
        <th> Fecha de Inicio de la Comision de Servicio </th>
        <th> Fecha de culminacion de la Comision de Servicio </th>
        <th></th>
    </tr>

   <tr style='background:white;' class='text-center roboto-medium'> 
   
        <th> <input type="varchar" name="TiempoC_S"> </th>
        <th> <input type="date" name="FechaI_Ser"> </th>
        <th> <input type="date" name="FechaC_Ser"> </th>
         <th></th>

    </tr>


         <input type="hidden" name="CedulaID" value="<?php echo $CedulaID?>" readonly>
</table>
</div>
       </div>
          </fieldset>


                    </div>

               <div class="modal-footer">
                <button type="reset" class="btn btn-raised btn-secondary btn-sm"  style="background:#CA1818;color:white"> &nbsp; LIMPIAR</button>
                    &nbsp;&nbsp; <input type="submit"  value="Guardar y Continuar" name="Enviar" style="background:#000077;color:white; ">
                   </div>  

                     </form>

            
            </div>
          </div>
        </div>
     

<script src="autojs_usu/calcuEdadH.js" ></script>
<script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.backstretch.min.js"></script>
        <script src="js/scripts.js"></script>    
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