<?php
	include '../Conexion.php';

$rutaservidor='../imagen';
$rutatemporal=$_FILES['image']['tmp_name'];
$nombreimagen=$_FILES['image']['name'];
$rutadestino=$rutaservidor.'/'.$nombreimagen;
move_uploaded_file($rutatemporal,$rutadestino);
    
	ModificarProducto($_POST['Nombres'], $_POST['Lugar_N'], $_POST['Fe_N'], $_POST['Edadp'], $_POST['Se'], $_POST['Estado_Civil'], $_POST['Derecho'], $_POST['Zurdo'], $_POST['Talla_Camisa'], $_POST['Talla_Pantalon'], $_POST['Talla_Calzado'], $_POST['Estatura'], $_POST['Peso'], $_POST['Direccion_domicilio'], $_POST['Estado'], $_POST['Municipio'], $_POST['Parroquia'], $_POST['Telefono_Habitacion'], $_POST['Telefono_Movil'], $_POST['Otro_numero'], $_POST['Correo_Elect'], $_POST['RIF'], $_POST['Nro_Tlfn_Emergencia'], $_POST['Nombre_Tlfn_Emergencia'], $_POST['alergia_a'], $_POST['Tipo_Sangre'], $_POST['Padece_Enferm_Cronica'], $_POST['Nombre_Conyuge'], $_POST['Nro_Hijos'], $_POST['Si_Embarazo'], $_POST['Meses_Gestacion'], $rutadestino, $_POST['Cedula']);

	function ModificarProducto($Nombres, $Lugar_N, $Fecha_N, $Edad, $Sexo, $Estado_Civil, $Derecho, $Zurdo, $Talla_Camisa, $Talla_Pantalon, $Talla_Calzado, $Estatura, $Peso, $Direccion_domicilio, $Estado, $Municipio, $Parroquia, $Telefono_Habitacion, $Telefono_Movil, $Otro_numero, $Correo_Elect,$RIF, $Nro_Tlfn_Emergencia, $Nombre_Tlfn_Emergencia, $alergia_a, $Tipo_Sangre, $Padece_Enferm_Cronica, $Nombre_Conyuge, $Nro_Hijos, $Si_Embarazo, $Meses_Gestacion, $rutadestino, $Cedula)
	{
	include '../Conexion.php';

		$sentencia="UPDATE Inventario.Datos_P SET Nombres= '".$Nombres."', Lugar_N= '".$Lugar_N."', Fecha_N= '".$Fecha_N."', Edad= '".$Edad."', Sexo= '".$Sexo."', Estado_Civil= '".$Estado_Civil."', Derecho= '".$Derecho."', Zurdo= '".$Zurdo."', Talla_Camisa= '".$Talla_Camisa."', Talla_Pantalon= '".$Talla_Pantalon."', Talla_Calzado= '".$Talla_Calzado."', Estatura= '".$Estatura."', Peso= '".$Peso."', Direccion_domicilio= '".$Direccion_domicilio."', Estado= '".$Estado."', Municipio= '".$Municipio."', Parroquia= '".$Parroquia."', Telefono_Habitacion= '".$Telefono_Habitacion."', Telefono_Movil= '".$Telefono_Movil."', Otro_numero= '".$Otro_numero."', Correo_Elect= '".$Correo_Elect."', RIF= '".$RIF."', Nro_Tlfn_Emergencia = '".$Nro_Tlfn_Emergencia."', Nombre_Tlfn_Emergencia= '".$Nombre_Tlfn_Emergencia."', alergia_a= '".$alergia_a."', Tipo_Sangre='".$Tipo_Sangre."', Padece_Enferm_Cronica= '".$Padece_Enferm_Cronica."', Nombre_Conyuge= '".$Nombre_Conyuge."', Nro_Hijos= '".$Nro_Hijos."', Si_Embarazo= '".$Si_Embarazo."', Meses_Gestacion= '".$Meses_Gestacion."', Firma= '".$rutadestino."' WHERE Cedula= '".$Cedula."' ";

		$resul=$conex->query($sentencia);
        
        if(isset($_POST['sup']))
        {	

        echo "<script type='text/javascript'>
            alert('Sus Datos Personales Han Sido Actualizados');
            window.location.href = '../Modificar.php?Cedula='+ $Cedula +'';
            </script>";
  
        }

        if($resul)
        {	

        echo "<script type='text/javascript'>
            alert('Sus Datos Personales Han Sido Actualizados');
            window.location.href = '../Modificar.php?Cedula='+ $Cedula +'';
            </script>";
  
        }
	}


?>