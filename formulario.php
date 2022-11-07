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

  <script>

  function maxLengthCheck(object)
  {
    if (object.value.length > object.maxLength)
      object.value = object.value.slice(0, object.maxLength)
  }
</script>

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
              <a href="formulario.php" style="background:red; color:white; "><i class="fa fa-list fa-fw"></i> &nbsp; Datos Personales</a>
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
  <form action="Intro_P.php" method="post" enctype="multipart/form-data">
<div class="container-fluid">
  <div class='table-responsive'> 
          <table class='table table-dark table-sm'>
        
<br>
<br>
<center>
    <h2>Datos Personales</h2>
  </center>
    

        
            <div class="col-12 col-md-6">
  <div class="form-group">

       
   <thead>
    <tr class="text-center roboto-medium" style="background:#5D6D7E;">  
        <th> Nombres y Apellidos </th>
        <th> Cedula de Identidad </th>
        <th> Lugar de Nacimiento </th>
        <th> Fecha de Nacimiento </th>
        
    </tr>
        </thead>
<?php

if (empty($consulta[0])) {
  
 echo "<tr style='background:white;' class='text-center roboto-medium'>";  
        echo "<th> <input type='text'  name='Nombres' value='".$consulta[1]."'  class='form-control' required  > </th>";
         echo "<th> <input type='number'  oninput='maxLengthCheck(this)'  maxlength = '8' min = '7' name='Cedula' value='".$consulta[0]."'  class='form-control' required> </th>";

        echo "<th> <input type='text' name='Nacimiento' class='form-control' required > </th>";
       echo " <th><input type='date' id='Fecha_N' name='Fnacimiento' min='1940-01-01' max='2004-01-01' class='form-control' required></th>";
        
    echo"</tr>";

}

else{

 echo "<tr style='background:white;' class='text-center roboto-medium'>";  
        echo "<th> <input type='texto'  name='Nombres' value='".$consulta[1]."'  class='form-control' required  style='width:200px' readonly> </th>";
         echo "<th> <input type='VARCHAR' name='Cedula' value='".$consulta[0]."'  class='form-control' required readonly> </th>";

        echo "<th> <input type='VARCHAR' name='Nacimiento' class='form-control' required > </th>";
       echo " <th><input type='date' id='Fecha_N' name='Fnacimiento' min='1940-01-01' max='2004-01-01' class='form-control' required></th>";
        
    echo"</tr>";


}



?>
  

              <br>
              <br>
   <thead>
     <tr class="text-center roboto-medium" style="background:#5D6D7E;"> 
        <th> Edad </th>
        <th> Sexo </th>
        <th> Estado Civil </th>
        <th> Perfil Dominante </th>
        
    </tr>
        </thead>
         <tr style='background:white;' class='text-center roboto-medium'>  
        <th> <input type="number" id="edadh" name="Edad" class="form-control" required readonly> </th>
       

    <script src="autojs/calcuEdadH.js"></script>
        

        <th>
         <select name="Sexo" class="form-control" required >
<option value="">Seleccionar</option>
<option value="M">Masculino</option>
<option value="F">Femenino</option>
        </select> 
       </th>
        <th> 
            <select  name="EstadoC" class="form-control" required>
<option value="">Seleccionar</option>
<option value="Casado">Casado(a)</option>
<option value="Conyuge">Conyugue</option>
<option value="Anulado">Anulado</option>
<option value="Separado">Separado de Union Legal</option>
<option value="Separado">Separado de Union de Hecho</option>
<option value="viudo">Viudo(a)</option>
<option value="soltero">Soltero(a)</option>
        </select>
         </th>
        <th>
            <select name="Perfil" class="form-control" required >
<option value="">Seleccionar</option>
<option value="D">Derecho</option>
<option value="Z">Zurdo</option>
        </select>
    </th>
        </tr>
        <thead>
        <tr class="text-center roboto-medium" style="background:#5D6D7E;">   
        <th> Talla de Camisa </th>
        <th> Talla de Pantalon </th>
        <th> Talla de Calzado </th>
        <th> Estatura </th>
        
    </tr>
        </thead>
         <tr style='background:white;' class='text-center roboto-medium'>  
        <th> <input type="VARCHAR" name="TallaC" class="form-control"> </th>
        <th> <input type="number" name="TallaP" class="form-control"> </th>
        <th> <input type="number" name="TallaZ" class="form-control"> </th>
        <th> <input type="VARCHAR" name="Estatura" class="form-control"> </th>
        
    </tr>

    <thead>
   <tr class="text-center roboto-medium" style="background:#5D6D7E;">   
        <th> Peso </th>
        <th> Dirección de Domicilio </th>
        <th> Estado </th>
        <th> Municipio </th>
        
    </tr>
        </thead>
         <tr style='background:white;' class='text-center roboto-medium' required>  
        <th> <input type="VARCHAR" name="Peso" class="form-control"> </th>
        <th> <input type="VARCHAR" name="DireccionD" class="form-control"> </th>
        <th>  <input type="VARCHAR" name="Estado" class="form-control"> </th>
        <th> <input type="VARCHAR" name="Municipio" class="form-control"> </th>
        
    </tr>
        <thead>
          <tr class="text-center roboto-medium" style="background:#5D6D7E;">   
        <th> Parroquia </th>
        <th style="width: 200px"> Telefonos de Habitación </th>
        <th> Telefono Movil </th>
        <th> Otro Numero </th>
        
    </tr>
        </thead>
         <tr style='background:white;' class='text-center roboto-medium'>  
        <th> <input type="VARCHAR" name="Parroquia" class="form-control"></th>

 <th><select style="padding: 1px; width: 60px" name="num1" class="form-group" required>
          <option value="">Selec.</option>
          <option value="0242">0242</option>
          <option value="0212">0212</option>
          <option value="0251">0251</option>
          <option value="0241">0241</option>
          <option value="0243">0243</option>
        </select> 
        <input type="number" name="TelefonoH" oninput="maxLengthCheck(this)"  maxlength = "7" min = "7" class="form-group" style="padding: 2px;width: 100px" required > </th>


 <th><select style="padding: 1px; width: 60px" name="num2" class="form-group" required>
           <option value="">Selec.</option>
          <option value="0416">0416</option>
          <option value="0426">0426</option>
          <option value="0412">0412</option>
          <option value="0414">0414</option>
          <option value="0424">0424</option>
        </select> 
        <input type="number" name="TelefonoM" oninput="maxLengthCheck(this)"  maxlength = "7" min = "7" class="form-group" style="padding: 2px;" required > </th>

 <th><select style="padding: 1px; width: 60px" name="num3" class="form-group" required>
           <option value="">Selec.</option>
          <option value="0416">0416</option>
          <option value="0426">0426</option>
          <option value="0412">0412</option>
          <option value="0414">0414</option>
          <option value="0424">0424</option>
        </select> 
        <input type="number" name="OtroN" oninput="maxLengthCheck(this)"  maxlength = "7" min = "7" class="form-group" style="padding: 2px; " required > </th>

        
    </tr>
<thead>
       <tr class="text-center roboto-medium" style="background:#5D6D7E;"> 

        <th> Correo Electronico Personal </th>
        <th> R.I.F </th>
        <th> Nro. de Telefono en Caso de Emergencia</th>
        <th> Nombre de Persona en Caso de Emergencia</th>
        
    </tr>
        </thead>

         <tr style='background:white;' class='text-center roboto-medium'>  
        <th> <input type="email" pattern="[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@[a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{1,5}" name="Correo" class="form-control" required > </th>
        <th> <input  type="VARCHAR" name="Rif" class="form-control" required >  </th>
        
        <th><select style="padding: 1px; width: 60px" name="num4" class="form-group" required>
          <option value="">Selec.</option>
          <option value="0416">0416</option>
          <option value="0426">0426</option>
          <option value="0412">0412</option>
          <option value="0414">0414</option>
          <option value="0424">0424</option>
        </select> 
        <input type="number" name="TelefonoE" oninput="maxLengthCheck(this)"  maxlength = "7" min = "7" class="form-group" style="padding: 2px; " required > </th>

        <th> <input type="text" name="NombresE" class="form-control" required > </th>
        
    </tr>
        
        <thead>
       <tr class="text-center roboto-medium" style="background:#5D6D7E;">
         
        <th> Alergia a</th>
        <th> Tipo de Sangre </th>
        <th> Padece Alguna Enfermedad Cronica: (Indique) </th>
        <th> Nombre del Conyugue </th>
        
    </tr>
         </thead>

         <tr style='background:white;' class='text-center roboto-medium'>  
        <th> <input type="VARCHAR" name="Alergia" class="form-control"> </th>
        <th>  
            <select name="Sangre" class="form-control" required>
<option value="">Seleccionar</option>
<option value="O-">O-</option>
<option value="O+">O+</option>
<option value="A-">A-</option>
<option value="A+">A+</option>
<option value="B-">B-</option>
<option value="B+">B+</option>
<option value="AB-">AB-</option>
<option value="AB+">AB+</option>
        </select> 
    </th>
        <th>  <input type="VARCHAR" name="Cronica" class="form-control" > </th>
        <th> <input type="texto"  name="NombreC" class="form-control" > </th>
        
    </tr>
       
     <thead>
        <tr class="text-center roboto-medium" style="background:#5D6D7E;">

        <th> Nro. de Hijos </th>
        <th> Si Esta Embarazada Indique:  </th>
        <th> Meses de Gestación </th>
        <th> Firma Personal </th>
    </tr>
         </thead>

         <tr style='background:white;' class='text-center roboto-medium'>  
        <th> <input type="number" name="NumeroH" class="form-control" required> </th>
        <th>  
            <select name="Embarazo" class="form-control" > 
<option value="">Seleccionar</option>        
<option value="si" >Si</option>
<option value="no">No</option>a
        </select>
         </th>

        <th>  <input type="number" name="Meses" class="form-control"> </th> 
        
        <th>  <input type="file" name="image" size="100%" class="form-control" required> </th> 

        </tr>
    

 <thead>
        <tr style='background:white;'>
          <th>
            <input type="hidden" name="CedulaID" value="<?php echo $CedulaID?>" readonly class="form-control"><th>
            

        
          <th><input type="hidden" name="status" value="<?php echo $status?>" readonly class="form-control"><th>
</tr>
         </thead>
       

     
        <table>     


<tr>
  <th>

    <button type='submit' class='btn btn-succes' value="Guardar y Continuar" name="Enviar" style='background:#ffe65d;color:#0a0a0a;'><strong>Guardar y Continuar</strong></button>

       
</table>

</form> 
</center>

<center>
<table>
<h5> Para la Firma Digital, Debe Subir una Imagen de la Misma.   
<button style="background:white; color:#000022 ;" data-toggle="modal" data-target="#Format">
    ¡EJEMPLO!
</button></h5>
</table>
</center>
    
<!-- modal del formato de la firma -->
<div class="modal" id="Format" tabindex="-1" role="dialog" >
 
<div class="modal-dialog modal-lg">
 <div class="modal-content">
<div class="modal-header" style="background:white; color: white;">
         
</div>
                  
<div class="modal-body">
<center> <h1>Formato de la firma</i></h1></center>
<center>
<img src="imagen/Firma.jpg" alt="Formato de la Firma" width="50%" />

<h5>La imagen debe estar en un formato de 4:3 y la firma debe estar lo mas cerca posible a los bordes limites de la foto. <br> RECOMENDACIÓN: Tomar la foto de la firma, luego recortarla al formato mencionado, reducirle el peso y luego subirla.</h5>

</center>                                                                    

</div>

</div>
</div>
</div>   
   
</br>   
</br>   
</br>   
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
