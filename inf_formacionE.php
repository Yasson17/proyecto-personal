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
              <a href="inf_formacionE.php" style="background:red;color:white; "><i  class="fa fa-list fa-fw"></i> &nbsp; Formacion en el Exterior</a>
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
              <a href="inf_otros.php" style="color:white; "><i  class="fa fa-list fa-fw"></i> &nbsp; Otros Datos</a>
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
  <form action="Intro_F.php" method="post">
<div class="container-fluid">
  <div class='table-responsive'> 
          <table class='table table-dark table-sm'>
        

<center>
    <h2>Formacion en el Exterior</h2>
  </center>
    

        
            <div class="col-12 col-md-6">
  <div class="form-group">
	 <thead>
       <tr class="text-center roboto-medium" style="background:#5D6D7E;">   
        <th> Titulo Obtenido </th>
        <th> Año de Graduado </th>
        <th> Instituto/Universidad </th>
        <th> Pais </th>
        
    </tr>
</thead>

    <tr style='background:white;' class='text-center roboto-medium'>  
        <th> <input type="VARCHAR" name="Titulo_O" class="form-control"> </th>
        <th> <input type="date" name="Ano_G" class="form-control"> </th>
        <th> <input type="VARCHAR" name="Inst_Univ" class="form-control"> </th>
        <th>  
<select name="Pais" class="form-control">
  
<option value="">Seleccionar</option> 
<option value="Afganistán">Afganistán</option>
<option value="Albania">Albania</option>
<option value="Alemania">Alemania</option>
<option value="Andorra">Andorra</option>
<option value="Angola">Angola</option>
<option value="Anguilla">Anguilla</option>
<option value="Antártida">Antártida</option>
<option value="Antigua y Barbuda">Antigua y Barbuda</option>
<option value="Antillas Holandesas">Antillas Holandesas</option>
<option value="Arabia Saudí">Arabia Saudí</option>
<option value="Argelia">Argelia</option>
<option value="Argentina">Argentina</option>
<option value="Armenia">Armenia</option>
<option value="Aruba">Aruba</option>
<option value="Australia">Australia</option>
<option value="Austria">Austria</option>
<option value="Azerbaiyán">Azerbaiyán</option>
<option value="Bahamas">Bahamas</option>
<option value="Bahrein">Bahrein</option>
<option value="Bangladesh">Bangladesh</option>
<option value="Barbados">Barbados</option>
<option value="Bélgica">Bélgica</option>
<option value="Belice">Belice</option>
<option value="Benin">Benin</option>
<option value="Bermudas">Bermudas</option>
<option value="Bielorrusia">Bielorrusia</option>
<option value="Birmania">Birmania</option>
<option value="Bolivia">Bolivia</option>
<option value="Bosnia y Herzegovina">Bosnia y Herzegovina</option>
<option value="Botswana">Botswana</option>
<option value="Brasil">Brasil</option>
<option value="Brunei">Brunei</option>
<option value="Bulgaria">Bulgaria</option>
<option value="Burkina Faso">Burkina Faso</option>
<option value="urundi">Burundi</option>
<option value="Bután">Bután</option>
<option value="Cabo Verde">Cabo Verde</option>
<option value="Camboya">Camboya</option>
<option value="Camerún">Camerún</option>
<option value="Canadá">Canadá</option>
<option value="Chad">Chad</option>
<option value="Chile">Chile</option>
<option value="China">China</option>
<option value="Chipre">Chipre</option>
<option value="Ciudad del Vaticano (Santa Sede)">Ciudad del Vaticano (Santa Sede)</option>
<option value="Colombia">Colombia</option>
<option value="Comores">Comores</option>
<option value=">Congo">Congo</option>
<option value="Congo">Congo, República Democrática del</option>
<option value="Corea">Corea</option>
<option value="Corea del Norte">Corea del Norte</option>
<option value="Costa de Marfíl">Costa de Marfíl</option>
<option value="Costa Rica">Costa Rica</option>
<option value="Croacia (Hrvatska)">Croacia (Hrvatska)</option>
<option value="Cuba">Cuba</option>
<option value="Dinamarca">Dinamarca</option>
<option value="Djibouti">Djibouti</option>
<option value="Dominica">Dominica</option>
<option value="Ecuador">Ecuador</option>
<option value="Egipto">Egipto</option>
<option value="El Salvador">El Salvador</option>
<option value="Emiratos Árabes Unidos">Emiratos Árabes Unidos</option>
<option value="Eritrea">Eritrea</option>
<option value="Eslovenia">Eslovenia</option>
<option value="España">España</option>
<option value="Estados Unidos">Estados Unidos</option>
<option value="Estonia">Estonia</option>
<option value="Etiopía">Etiopía</option>
<option value="Fiji">Fiji</option>
<option value="Filipinas">Filipinas</option>
<option value="Finlandia">Finlandia</option>
<option value="Francia">Francia</option>
<option value="Gabón">Gabón</option>
<option value="Gambia">Gambia</option>
<option value="Georgia">Georgia</option>
<option value="Ghana">Ghana</option>
<option value="Gibraltar">Gibraltar</option>
<option value="Granada">Granada</option>
<option value="Grecia">Grecia</option>
<option value="Groenlandia">Groenlandia</option>
<option value="Guadalupe">Guadalupe</option>
<option value="Guam">Guam</option>
<option value="Guatemala">Guatemala</option>
<option value="Guayana">Guayana</option>
<option value="Guayana Francesa">Guayana Francesa</option>
<option value="Guinea">Guinea</option>
<option value="Guinea Ecuatorial">Guinea Ecuatorial</option>
<option value="Guinea-Bissau">Guinea-Bissau</option>
<option value="Haití">Haití</option>
<option value="Honduras">Honduras</option>
<option value="Hungría">Hungría</option>
<option value="India">India</option>
<option value="Indonesia">Indonesia</option>
<option value="Irak">Irak</option>
<option value="Irán">Irán</option>
<option value="Irlanda">Irlanda</option>
<option value="Isla Bouvet">Isla Bouvet</option>
<option value="Isla de Christmas">Isla de Christmas</option>
<option value="Islandia">Islandia</option>
<option value=">Islas Caimán">Islas Caimán</option>
<option value="Islas CooK">Islas Cook</option>
<option value="Islas de Cocos o Keeling">Islas de Cocos o Keeling</option>
<option value="Islas Faroe">Islas Faroe</option>
<option value="HIslas Heard y McDonald">Islas Heard y McDonald</option>
<option value="Islas Malvinas">Islas Malvinas</option>
<option value="Islas Marianas del Norte">Islas Marianas del Norte</option>
<option value="Islas Marshall">Islas Marshall</option>
<option value="Islas menores de Estados Unidos">Islas menores de Estados Unidos</option>
<option value="Israel">Israel</option>
<option value="Italia">Italia</option>
<option value="Jamaica">Jamaica</option>
<option value="Japón">Japón</option>
<option value="Jordania">Jordania</option>
<option value="Kazajistán">Kazajistán</option>
<option value="Kenia">Kenia</option>
<option value="Kirguizistán">Kirguizistán</option>
<option value="Kiribati">Kiribati</option>
<option value="Kuwait">Kuwait</option>
<option value="Laos">Laos</option>
<option value="Lesotho">Lesotho</option>
<option value="Letonia">Letonia</option>
<option value="Líbano<">Líbano</option>
<option value="Liberia">Liberia</option>
<option value="Libia">Libia</option>
<option value="Liechtenstein">Liechtenstein</option>
<option value="Lituania">Lituania</option>
<option value="Luxemburgo">Luxemburgo</option>
<option value="Malí">Malí</option>
<option value="Malta">Malta</option>
<option value="Marruecos">Marruecos</option>
<option value="Martinica">Martinica</option>
<option value="Mauricio">Mauricio</option>
<option value="Mauritania">Mauritania</option>
<option value="Mayotte">Mayotte</option>
<option value="México">México</option>
<option value="Micronesia">Micronesia</option>
<option value="Moldavia">Moldavia</option>
<option value="Mongolia">Mongolia</option>
<option value="Mozambique">Mozambique</option>
<option value="Namibia">Namibia</option>
<option value="Nepal">Nepal</option>
<option value="Nicaragua">Nicaragua</option>
<option value="Níger">Níger</option>
<option value="Nigeria">Nigeria</option>
<option value="Niue">Niue</option>
<option value="Norfolk">Norfolk</option>
<option value="Noruega">Noruega</option>
<option value="Nueva Caledonia">Nueva Caledonia</option>
<option value="Nueva Zelanda">Nueva Zelanda</option>
<option value="Omán">Omán</option>
<option value="Países Bajos">Países Bajos</option>
<option value="Panamá">Panamá</option>
<option value="Papúa Nueva Guinea">Papúa Nueva Guinea</option>
<option value="Paquistán">Paquistán</option>
<option value="Paraguay">Paraguay</option>
<option value="Perú">Perú</option>
<option value="Pitcairn">Pitcairn</option>
<option value="Polinesia Francesa">Polinesia Francesa</option>
<option value="Polonia">Polonia</option>
<option value="Portugal">Portugal</option>
<option value="Puerto Rico">Puerto Rico</option>
<option value="Qatar">Qatar</option>
<option value="Reino Unido">Reino Unido</option>
<option value="República Centroafricana">República Centroafricana</option>
<option value="República Checa">República Checa</option>
<option value="República de Sudáfrica">República de Sudáfrica</option>
<option value="República Dominicana">República Dominicana</option>
<option value="República Eslovaca">República Eslovaca</option>
<option value="Rumania">Rumania</option>
<option value="Rusia">Rusia</option>
<option value="Sahara Occidental">Sahara Occidental</option>
<option value="Saint Kitts y Nevis">Saint Kitts y Nevis
</option>
<option value="Samoa">Samoa</option>
<option value="Samoa American">Samoa Americana</option>
<option value="San Marino">San Marino</option>
<option value="San Vicente y Granadinas">San Vicente y Granadinas</option>
<option value="Santa Helena">Santa Helena</option>
<option value="Santa Lucía">Santa Lucía</option>
<option value="Santo Tomé y Príncipe">Santo Tomé y Príncipe</option>
<option value="Senegal">Senegal</option>
<option value="Seychelles">Seychelles</option>
<option value="Sierra Leona">Sierra Leona</option>
<option value="Singapur">Singapur</option>
<option value="Siria">Siria</option>
<option value="Somalia">Somalia</option>
<option value="Sri Lanka">Sri Lanka</option>
<option value="St Pierre y Miquelon<">St Pierre y Miquelon</option>
<option value="Suazilandia">Suazilandia</option>
<option value="Sudán">Sudán</option>
<option value="Suecia">Suecia</option>
<option value="Suiza">Suiza</option>
<option value="Surinam">Surinam</option>
<option value="Tailandia">Tailandia</option>
<option value="Taiwán">Taiwán</option>
<option value="Tanzania">Tanzania</option>
<option value="Tayikistán">Tayikistán</option>
<option value="Territorios franceses del Sur">Territorios franceses del Sur</option>
<option value="Timor Oriental">Timor Oriental</option>
<option value="Togo">Togo</option>
<option value="Tonga">Tonga</option>
<option value="Trinidad y Tobago">Trinidad y Tobago</option>
<option value="Túnez">Túnez</option>
<option value="Turkmenistán">Turkmenistán</option>
<option value="Turquía">Turquía</option>
<option value="Tuvalu">Tuvalu</option>
<option value="Ucrania">Ucrania</option>
<option value="Uganda">Uganda</option>
<option value="Uruguay">Uruguay</option>
<option value="Uzbekistán">Uzbekistán</option>
<option value="Vanuatu">Vanuatu</option>
<option value="Venezuela">Venezuela</option>
<option value="Vietnam">Vietnam</option>
<option value="Yemen">Yemen</option>
<option value="Yugoslavia">Yugoslavia</option>
<option value="Zambia">Zambia</option>
<option value="Zimbabue">Zimbabue</option>
</select>
         </th>
    </tr>

<br/>


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

    <button type='submit' class='btn btn-succes' value="Guardar y Continuar" name="Enviar" style='background:#ffe65d;color:#0a0a0a;'><strong>Guardar y Continuar</strong></button>&nbsp; &nbsp;

 <button type='submit' class='btn btn-succes'  value="Guardar y registrar otro" name="otro" style='background:#000077;color:white;'>Guardar y Registrar Otro</button>&nbsp; &nbsp;

 <button type='submit' class='btn btn-succes' value="No Registrar" name="No" style='background:#CA1818;color:white;'>No Registrar</button>&nbsp; &nbsp;


</tr>

     </table>
     
    </form>




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