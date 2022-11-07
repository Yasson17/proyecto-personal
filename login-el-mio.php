<?php  

session_start();

session_destroy();
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
   <link rel="stylesheet" href="css/bootstrap.min.css">

	<title>Iniciar Sesion</title> 

<!-- estilo de la caja del login -->
	<link rel="stylesheet" href="estilos/estilo_login.css" >

	<!-- Bootstrap Material Design V4.0 para el estilo -->
	<link rel="stylesheet" href="./css/bootstrap-material-design.min.css">

	<!-- Font Awesome V5.9.0 para los iconos-->
	<link rel="stylesheet" href="./css/all.css">

	<!-- estilo del login-->
	<link rel="stylesheet" href="./css/style.css">

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

    <img class="avatar" src="imagen/logo.jpeg">

    <h1> Iniciar Sesion</h1>

	<form action="enlace.php"  method="post"> 
		
	<div>
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
  		<path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"/>
		</svg>
		<input  type="text" name="usuario" placeholder="Usuario" class="placeholder col-10 placeholder-lg bg-default" class="form-username form-control" id="form-username" required>
		</div>

		<div>
		<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-key" viewBox="0 0 16 16">
  		<path d="M0 8a4 4 0 0 1 7.465-2H14a.5.5 0 0 1 .354.146l1.5 1.5a.5.5 0 0 1 0 .708l-1.5 1.5a.5.5 0 0 1-.708 0L13 9.207l-.646.647a.5.5 0 0 1-.708 0L11 9.207l-.646.647a.5.5 0 0 1-.708 0L9 9.207l-.646.647A.5.5 0 0 1 8 10h-.535A4 4 0 0 1 0 8zm4-3a3 3 0 1 0 2.712 4.285A.5.5 0 0 1 7.163 9h.63l.853-.854a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.646-.647a.5.5 0 0 1 .708 0l.646.647.793-.793-1-1h-6.63a.5.5 0 0 1-.451-.285A3 3 0 0 0 4 5z"/>
  		<path d="M4 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/> 
		</svg>
        <input ID="txtPassword" type="Password" name="contrasena" placeholder="Contraseña" class="placeholder col-8 placeholder-lg bg-default" class="form-password form-control" id="form-password" required>
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
                  

          <form method="post" action="registrar.php">

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
	<div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content ">
	    	<div class="modal-header" style="background:#000022; color: white;">
	    		<legend><i class="fas fa-user"></i> &nbsp;  ¿olvidastes tu contraseña? </legend>
                    
	    	</div>
                  

          <form method="post" action="base2.php">

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
               	<button type="reset" class="btn btn-raised btn-secondary btn-sm"  style="background:#CA1818;:white"><i class="fas fa-paint-roller"></i> &nbsp; LIMPIAR</button>
                    &nbsp;&nbsp; <button class="btn btn-succes" type="submit" name="enviar" value="enviar" style="background:#ffe65d;color:black">
                     	enviar
                     </button>
                   </div>  

                     </form>
            
            </div>
          </div>
        </div>
     

</main>
<?php include ('includes/footer.php');?>

 <script src="js/jquery-3.4.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.backstretch.min.js"></script>
        <script src="js/scripts.js"></script>

</body>

</html>

