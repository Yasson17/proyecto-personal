<?php  
	$conex = new mysqli("localhost", "root", "");

	if (mysqli_connect_errno()) {
    printf("Conexion fallida: %s", mysqli_connect_error());
    exit();
}
?>