<?php


$host='localhost';
$username='root';
$password='';
$database='Administrador2';

$conn = new mysqli($host,$username,$password,$database);  

if(isset($_POST['Registrarse']))
{

$nombre=$_POST['nombre'];
$ci=$_POST['ci'];
$usuario=$_POST['usu'];
$contrasena=$_POST['contra'];

$usua = "SELECT * FROM Administrador2.usuarios WHERE `usuarios` LIKE '$usuario'";

$cedu="SELECT * FROM Administrador2.usuarios WHERE `ci` LIKE '$ci'";

if ($resulU=mysqli_query($conn,$usua)){

$totalfilausu=mysqli_num_rows($resulU);

}

if ($resulCed=mysqli_query($conn,$cedu)){
  

$totalfilacedu=mysqli_num_rows($resulCed);

}

if (($totalfilausu>0) || ($totalfilacedu>0)){
  
echo "<script type='text/javascript'>
    alert('Administrador Ya Se Encuentra Registrado');
               window.location.href='login.php';
          </script>";

}

else {

$status='Activo';

 include 'conexion.php';
$rutaser='imagen';
$rutatemp='logo.jpeg';
$rutadesti=$rutaser.'/'.$rutatemp;
move_uploaded_file($rutatemp,$rutadesti);

$inserta="INSERT INTO inventario.documentos(archivo,CedulaID)
values ('".$rutadesti."','".$ci."')";

 $res=$conex->query($inserta);


$insert = "INSERT INTO Administrador2.usuarios(`usuarios`,`contrasena`,`nombre`,`ci`,`status`) VALUES ('$usuario','$contrasena','$nombre','$ci','$status')"; 


$resul= $conn->query($insert);
 
if ($resul) {

 echo"<script type='text/javascript'>
     alert('Usuario Registrado Correctamente');
    window.location.href='usuario.php';
      </script>";
             }


             session_start();
             $_SESSION['usuarios']=$usuario;
             $_SESSION['datos']=1;
             
}
}

?>



<?php

$host='localhost';
$username='root';
$password='';
$database='Administrador2';

$conn = new mysqli($host,$username,$password,$database); 

if(isset($_POST['registrar']))
{
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];
$nombre=$_POST['nombre'];
$ci=$_POST['ci'];


$usu = "SELECT * FROM Administrador2.admi WHERE `usuarios` LIKE '$usuario'";

$cedu="SELECT * FROM Administrador2.admi WHERE `ci` LIKE '$ci'";

if ($resulU=mysqli_query($conn,$usu)){

$totalfilausu=mysqli_num_rows($resulU);

}

if ($resulC=mysqli_query($conn,$cedu)){
  

$totalfilacedu=mysqli_num_rows($resulC);

}

if (($totalfilausu>0) || ($totalfilacedu>0)){
  
echo "<script type='text/javascript'>
    alert('Administrador Ya Se Encuentra Registrado');
               window.location.href='lista_admi.php';
          </script>";

}


else {
$status='Activo';
$insert = "INSERT INTO Administrador2.admi(`usuarios`,`contrasena`,`nombre`,`ci`,`status`) VALUES ('$usuario','$contrasena','$nombre','$ci','$status')"; 

$resul= $conn->query($insert);

if ($resul) {

 echo"<script type='text/javascript'>
     alert('Administrador Agregado Correctamente');
    window.location.href='lista_admi.php';
      </script>";
             }

}

  }    

?>