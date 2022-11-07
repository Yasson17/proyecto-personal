<?php  

session_start();

session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
   <link rel="stylesheet" href="../css/bootstrap.min.css">

	<title>Iniciar Sesion</title> 

<!-- estilo de la caja del login -->
	<link rel="stylesheet" href="../estilos/estilo_login.css" >

	<!-- Bootstrap Material Design V4.0 para el estilo -->
	<link rel="stylesheet" href="../css/bootstrap-material-design.min.css">

	<!-- Font Awesome V5.9.0 para los iconos-->
	<link rel="stylesheet" href="../css/all.css">

	<!-- estilo del login-->
	<link rel="stylesheet" href="../css/style.css">

<script type="text/javascript">

function mostrarPassword(){
		var cambio = document.getElementById("txtPassword");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	}; 
	
</script>

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
<style type="text/css">
	html {
  min-height: 100%;
  position: relative;
}
body {
  margin: 0;
  margin-bottom: 40px;
}
footer {
  background-color: black;
  position: absolute;
  bottom: 0;
  width: 100%;
  height: 40px;
  color: white;
}
</style>
</head>

<body>

	

	<div class="login">

    <img class="avatar" src="../imagen/logo.jpeg">

    <h1> Iniciar Sesion</h1>

	<form action="../enlace.php"  method="post"> 

		<label for="usuario" class="fas fa-user-secret"> Usuario </label>
		<input  type="text" name="usuario" class="form-username form-control" id="form-username" required>

		<label for="contrasena" class="fas fa-key"> Cotraseña </label>
		 <div class="input-group">
                                <input ID="txtPassword" type="Password" name="contrasena" class="form-password form-control" id="form-password" required>
                                <button id="show_password" class="btn btn-success" type="button" onclick="mostrarPassword()" style="color: white;"> 
                                <span class="fa fa-eye-slash icon"></span> </button>
                                </div>
<br>
		<input type="submit" name="Ingresar" value="Ingresar">
<br>	 

	</form>
<p>
<button class="btn btn-succes" style="background:white; color:#000022 ;border-radius:20px;" data-toggle="modal" data-target="#registroUSU">
	  ¡Registrarse!
</button>

<button class="btn btn-succes" style="background:white; color:#000022 ;border-radius:20px;" data-toggle="modal" data-target="#registrocontra">
	  ¿olvidastes tu contraseña?
</button>
	
</p>



</div>

<main class="container">

<div class="modal" id="registroUSU" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	    	<div class="modal-header" style="background:#000022; color: white;">
	    		<legend><i class="fas fa-user"></i> &nbsp; Registrar Usuario </legend>
                    
	    	</div>
                  

          <form method="post" action="../registrar.php">

                      <div class="modal-body">
                      	 
		           <fieldset>
						
						

						<div class="container-fluid">

							<div class="row">

								<div class="col-12 col-md-6">

									<div class="form-group">
					<label class="bmd-label-floating" > Nombres y Apellidos</label>
					<input type="VARCHAR" name="nombre" required="required" class="form-control">
					</div>
					</div>

					<div class="col-12 col-md-6">
					<div class="form-group">
                    <label   class="bmd-label-floating"> Cedula de Identidad</label>
						<input type="VARCHAR" name="ci"  required="required" class="form-control" >
						</div>
					</div>

          <div class="col-12 col-md-6">
			<div class="form-group">
                  <label   class="bmd-label-floating">Usuario</label>

				<input type="text-center" name="usu" class="form-control" >
						</div>
					</div>

         <div class="col-12 col-md-6">
			<div class="form-group">

                  <label   class="bmd-label-floating">Contraseña</label>

				 <div class="input-group">
                                <input ID="Password" type="Password" name="contra" Class="form-control">
                                <button id="show_password" class="btn btn-success" type="button" onclick="mostrarPassw()" style="color:#000022;"> 
                                <span class="fa fa-eye-slash icon"></span> </button>
                                </div>
						</div>
					</div>
						</div>
						</div>
					</fieldset>

                    </div>

               <div class="modal-footer">
               	<button type="reset" class="btn btn-raised btn-secondary btn-sm"  style="background:yellow;:white"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
                    &nbsp;&nbsp; <button class="btn btn-succes" type="submit" name="Registrarse" value="Registrarse" style="background:red;color:white">
                     	Registrar
                     </button>
                   </div>  

                     </form>
            
            </div>
          </div>
        </div>
     

</main>


<main class="container">

<div class="modal" id="registrocontra" tabindex="-1" role="dialog" aria-labelledby="tituloVentana" aria-hidden="true">
	<div class="modal-dialog" role="document">
	    <div class="modal-content">
	    	<div class="modal-header" style="background:#000022; color: white;">
	    		<legend><i class="fas fa-user"></i> &nbsp;  ¿olvidastes tu contraseña? </legend>
                    
	    	</div>
                  

          <form method="post" action="../base2.php">

                      <div class="modal-body">
                      	 
		           <fieldset>
						
						

						<div class="container-fluid">

							<div class="row">

								<div class="col-12 col-md-6">

									<div class="form-group">
					<label class="bmd-label-floating" > Nombres y Apellidos</label>
					<input type="VARCHAR" name="nombre" required="required" class="form-control">
					</div>
					</div>

					<div class="col-12 col-md-6">
					<div class="form-group">
                    <label   class="bmd-label-floating"> Cedula de Identidad</label>
						<input type="VARCHAR" name="ci"  required="required" class="form-control" >
						</div>
					</div>

          <div class="col-12 col-md-6">
			<div class="form-group">
                  <label   class="bmd-label-floating">telefono</label>

				<input type="text-center" name="telefono" class="form-control" >
						</div>
					</div>

						<div class="col-12 col-md-6">
					<div class="form-group">
                    <label   class="bmd-label-floating"> Correo</label>
						<input type="VARCHAR" name="correo"  required="required" class="form-control" >
						</div>
					</div>

       
						</div>
						</div>
					</fieldset>

                    </div>

               <div class="modal-footer">
               	<button type="reset" class="btn btn-raised btn-secondary btn-sm"  style="background:yellow;:white"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
                    &nbsp;&nbsp; <button class="btn btn-succes" type="submit" name="enviar" value="enviar" style="background:red;color:white">
                     	enviar
                     </button>
                   </div>  

                     </form>
            
            </div>
          </div>
        </div>
     

</main>
<?php include ('../includes/footer.php');?>
 <script src="../js/jquery-3.4.1.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/jquery.backstretch.min.js"></script>
        <script src="../js/scripts.js"></script>

</body>

</html>

