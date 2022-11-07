<?php
	include 'Conexion.php';

	ModificarProducto($_POST['Estado_Civil'], $_POST['Talla_Camisa'], $_POST['Talla_Pantalon'], $_POST['Talla_Calzado'], $_POST['Estatura'], $_POST['Peso'], $_POST['Direccion_domicilio'], $_POST['Estado'], $_POST['Municipio'], $_POST['Parroquia'], $_POST['Telefono_Habitacion'], $_POST['Telefono_Movil'], $_POST['Otro_numero'], $_POST['Correo_Elect'], $_POST['Nro_Tlfn_Emergencia'], $_POST['Nombre_Tlfn_Emergencia'], $_POST['alergia_a'], $_POST['Padece_Enferm_Cronica'], $_POST['Nombre_Conyuge'], $_POST['Nro_Hijos'], $_POST['Si_Embarazo'], $_POST['Meses_Gestacion'], $_POST['Cedula']);

	function ModificarProducto($Estado_Civil, $Talla_Camisa, $Talla_Pantalon, $Talla_Calzado, $Estatura, $Peso, $Direccion_domicilio, $Estado, $Municipio, $Parroquia, $Telefono_Habitacion, $Telefono_Movil, $Otro_numero, $Correo_Elect, $Nro_Tlfn_Emergencia, $Nombre_Tlfn_Emergencia, $alergia_a, $Padece_Enferm_Cronica, $Nombre_Conyuge, $Nro_Hijos, $Si_Embarazo, $Meses_Gestacion, $Cedula)
	{
	include 'Conexion.php';

		$sentencia="UPDATE Inventario.Datos_P SET Estado_Civil= '".$Estado_Civil."', Talla_Camisa= '".$Talla_Camisa."', Talla_Pantalon= '".$Talla_Pantalon."', Talla_Calzado= '".$Talla_Calzado."', Estatura= '".$Estatura."', Peso= '".$Peso."', Direccion_domicilio= '".$Direccion_domicilio."', Estado= '".$Estado."', Municipio= '".$Municipio."', Parroquia= '".$Parroquia."', Telefono_Habitacion= '".$Telefono_Habitacion."', Telefono_Movil= '".$Telefono_Movil."', Otro_numero= '".$Otro_numero."', Correo_Elect= '".$Correo_Elect."', Nro_Tlfn_Emergencia = '".$Nro_Tlfn_Emergencia."', Nombre_Tlfn_Emergencia= '".$Nombre_Tlfn_Emergencia."', alergia_a= '".$alergia_a."', Padece_Enferm_Cronica= '".$Padece_Enferm_Cronica."', Nombre_Conyuge= '".$Nombre_Conyuge."', Nro_Hijos= '".$Nro_Hijos."', Si_Embarazo= '".$Si_Embarazo."', Meses_Gestacion= '".$Meses_Gestacion."' WHERE Cedula= '".$Cedula."' ";

		$resul=$conex->query($sentencia);
	
	}


ModificarHijos($_POST['IDH'], $_POST['Nom'], $_POST['Fecha_N'], $_POST['Edad'], $_POST['Cedu'], $_POST['Sexo'], $_POST['Grado_e'], $_POST['Camisa'], $_POST['Pantalon'], $_POST['Calzados'], $_POST['CedulaID']);


function ModificarHijos($IDH, $Nom, $Fecha_N, $Edad, $Cedu, $Sex, $Grado_e, $Camisa, $Pantalon, $Calzados, $CedulaID)
{
include'Conexion.php';

foreach ($_POST['IDH'] as $IDH) 
{

	$Nombres=mysqli_real_escape_string($conex, $_POST['Nom'][$IDH]);
    $Fecha_N=mysqli_real_escape_string($conex, $_POST['Fecha_N'][$IDH]);
    $Edad=mysqli_real_escape_string($conex, $_POST['Ed'][$IDH]);
    $Cedula=mysqli_real_escape_string($conex, $_POST['Cedu'][$IDH]);
    $Sexo=mysqli_real_escape_string($conex, $_POST['Sex'][$IDH]);
    $Grado_e=mysqli_real_escape_string($conex, $_POST['Grado_e'][$IDH]);
    $Camisa=mysqli_real_escape_string($conex, $_POST['Camisa'][$IDH]);
    $Pantalon=mysqli_real_escape_string($conex, $_POST['Pantalon'][$IDH]);
    $Calzados=mysqli_real_escape_string($conex, $_POST['Calzados'][$IDH]);
    $CedulaID=mysqli_real_escape_string($conex, $_POST['CedulaID'][$IDH]);




$sentencia="UPDATE Inventario.Datos_H SET Nombres= '".$Nombres."', Fecha_N= '".$Fecha_N."', Edad= '".$Edad."', Cedula= '".$Cedula."', Sexo= '".$Sexo."', Grado_e= '".$Grado_e."', Camisa= '".$Camisa."', Pantalon= '".$Pantalon."', Calzados= '".$Calzados."' WHERE IDH='".$IDH."' ";
$resul=$conex->query($sentencia);
}
}




Modificarnucleo($_POST['IDN'], $_POST['Parentesco'], $_POST['NombresN'], $_POST['ApellidosN'], $_POST['CedulaN'], $_POST['Fecha_NN'], $_POST['SexoN'], $_POST['Estado_CN'], $_POST['Grado_I'], $_POST['CedulaID']);


function Modificarnucleo($IDN, $Parentesco, $NombresN, $ApellidosN, $CedulaN, $Fecha_NN, $SexoN, $Estado_CN, $Grado_I, $CedulaID)
{
include'Conexion.php';

foreach ($_POST['IDN'] as $IDN) 
{

	$Parentesco=mysqli_real_escape_string($conex, $_POST['Parentesco'][$IDN]);
	$NombresN=mysqli_real_escape_string($conex, $_POST['NombresN'][$IDN]);
    $ApellidosN=mysqli_real_escape_string($conex, $_POST['ApellidosN'][$IDN]);
    $CedulaN=mysqli_real_escape_string($conex, $_POST['CedulaN'][$IDN]);
    $Fecha_NN=mysqli_real_escape_string($conex, $_POST['Fecha_NN'][$IDN]);
    $EdadN=mysqli_real_escape_string($conex, $_POST['EdadN'][$IDN]);
    $SexoN=mysqli_real_escape_string($conex, $_POST['SexoN'][$IDN]);
    $Estado_CN=mysqli_real_escape_string($conex, $_POST['Estado_CN'][$IDN]);
    $Grado_I=mysqli_real_escape_string($conex, $_POST['Grado_I'][$IDN]);
    $CedulaID=mysqli_real_escape_string($conex, $_POST['CedulaID'][$IDN]);




$sentencia="UPDATE Inventario.Nucleo_F SET Parentesco= '".$Parentesco."', Nombres= '".$NombresN."', Apellidos= '".$ApellidosN."', Cedula= '".$CedulaN."', Fecha_N= '".$Fecha_NN."', Edad= '".$EdadN."', Sexo= '".$SexoN."', Estado_C= '".$Estado_CN."', Grado_I= '".$Grado_I."' WHERE IDN='".$IDN."' ";
$resul=$conex->query($sentencia);
}
}



ModificarNivelA($_POST['IDA'], $_POST['Especializacion'], $_POST['Titulo_O'], $_POST['Ano_G'], $_POST['Inst_Univ'], $_POST['Observaciones'], $_POST['CedulaID']);


function ModificarNivelA($IDA, $Especializacion, $Titulo_O, $Ano_G, $Inst_Univ, $Observaciones, $CedulaID)
{
include'Conexion.php';

foreach ($_POST['IDA'] as $IDA) 
{

	$Especializacion=mysqli_real_escape_string($conex, $_POST['Especializacion'][$IDA]);
	$Titulo_O=mysqli_real_escape_string($conex, $_POST['Titulo_O'][$IDA]);
    $Ano_G=mysqli_real_escape_string($conex, $_POST['Ano_G'][$IDA]);
    $Inst_Univ=mysqli_real_escape_string($conex, $_POST['Inst_Univ'][$IDA]);
    $Observaciones=mysqli_real_escape_string($conex, $_POST['Observaciones'][$IDA]);
    $CedulaID=mysqli_real_escape_string($conex, $_POST['CedulaID'][$IDA]);




$sentencia="UPDATE Inventario.Nivel_A SET Especializacion= '".$Especializacion."', Titulo_O= '".$Titulo_O."', Ano_G= '".$Ano_G."', Inst_Univ= '".$Inst_Univ."', Observaciones= '".$Observaciones."' WHERE IDA='".$IDA."' ";
$resul=$conex->query($sentencia);
}
}




ModificarFormacion($_POST['IDF'], $_POST['Titulo_OF'], $_POST['Ano_GF'], $_POST['Inst_UnivF'], $_POST['Pais'], $_POST['CedulaID']);


function ModificarFormacion($IDF, $Titulo_OF, $Ano_GF, $Inst_UnivF, $Pais, $CedulaID)
{
include'Conexion.php';

foreach ($_POST['IDF'] as $IDF) 
{

	$Titulo_OF=mysqli_real_escape_string($conex, $_POST['Titulo_OF'][$IDF]);
	$Ano_GF=mysqli_real_escape_string($conex, $_POST['Ano_GF'][$IDF]);
    $Inst_UnivF=mysqli_real_escape_string($conex, $_POST['Inst_UnivF'][$IDF]);
    $Pais=mysqli_real_escape_string($conex, $_POST['Pais'][$IDF]);
    $CedulaID=mysqli_real_escape_string($conex, $_POST['CedulaID'][$IDF]);




$sentencia="UPDATE Inventario.Formacion_E SET Titulo_O= '".$Titulo_OF."', Ano_G= '".$Ano_GF."', Inst_Univ= '".$Inst_UnivF."', Pais= '".$Pais."' WHERE IDF='".$IDF."' ";
$resul=$conex->query($sentencia);
}
}




ModificarExperiencia($_POST['IDE'], $_POST['Organismo'], $_POST['Fecha_I'], $_POST['Fecha_E'], $_POST['Cargo'], $_POST['Antecedentes_S'], $_POST['CedulaID']);


function ModificarExperiencia($IDE, $Organismo, $Fecha_I, $Fecha_E, $Cargo, $Antecedentes_S, $CedulaID)
{
include'Conexion.php';

foreach ($_POST['IDE'] as $IDE) 
{

    $Organismo=mysqli_real_escape_string($conex, $_POST['Organismo'][$IDE]);
    $Fecha_I=mysqli_real_escape_string($conex, $_POST['Fecha_I'][$IDE]);
    $Fecha_E=mysqli_real_escape_string($conex, $_POST['Fecha_E'][$IDE]);
    $Cargo=mysqli_real_escape_string($conex, $_POST['Cargo'][$IDE]);
    $Antecedentes_S=mysqli_real_escape_string($conex, $_POST['Antecedentes_S'][$IDE]);
    $CedulaID=mysqli_real_escape_string($conex, $_POST['CedulaID'][$IDE]);




$sentencia="UPDATE Inventario.Experiencia_L SET Organismo= '".$Organismo."', Fecha_I= '".$Fecha_I."', Fecha_E= '".$Fecha_E."', Cargo= '".$Cargo."', Antecedentes_S= '".$Antecedentes_S."' WHERE IDE='".$IDE."' ";
$resul=$conex->query($sentencia);
}
}



ModificarInstitucion($_POST['IDI'], $_POST['Fecha_ABAE'], $_POST['CargoI'], $_POST['Sede'], $_POST['Direccion_A'], $_POST['Unidad_A'], $_POST['Jefe_I'], $_POST['Fecha_Servicio'], $_POST['TotalA_Serv'], $_POST['CorreoE_Ins'], $_POST['Telefono_O_Ext'], $_POST['Familiares_ABAE'], $_POST['CorreoE_Ins'], $_POST['CedulaID']);


function ModificarInstitucion($IDI, $Fecha_ABAE, $CargoI, $Sede, $Direccion_A, $Unidad_A, $Jefe_I, $Fecha_Servicio, $TotalA_Serv, $CorreoE_Ins, $Telefono_O_Ext, $Familiares_ABAE, $NombresI, $CedulaID)
{
include'Conexion.php';

foreach ($_POST['IDI'] as $IDI) 
{

    $Fecha_ABAE=mysqli_real_escape_string($conex, $_POST['Fecha_ABAE'][$IDI]);
    $CargoI=mysqli_real_escape_string($conex, $_POST['CargoI'][$IDI]);
    $Sede=mysqli_real_escape_string($conex, $_POST['Sede'][$IDI]);
    $Direccion_A=mysqli_real_escape_string($conex, $_POST['Direccion_A'][$IDI]);
    $Unidad_A=mysqli_real_escape_string($conex, $_POST['Unidad_A'][$IDI]);
    $Jefe_I=mysqli_real_escape_string($conex, $_POST['Jefe_I'][$IDI]);
    $Fecha_Servicio=mysqli_real_escape_string($conex, $_POST['Fecha_Servicio'][$IDI]);
    $TotalA_Serv=mysqli_real_escape_string($conex, $_POST['TotalA_Serv'][$IDI]);
    $CorreoE_Ins=mysqli_real_escape_string($conex, $_POST['CorreoE_Ins'][$IDI]);
    $Telefono_O_Ext=mysqli_real_escape_string($conex, $_POST['Telefono_O_Ext'][$IDI]);
    $Familiares_ABAE=mysqli_real_escape_string($conex, $_POST['Familiares_ABAE'][$IDI]);
    $NombresI=mysqli_real_escape_string($conex, $_POST['NombresI'][$IDI]);
    $CedulaID=mysqli_real_escape_string($conex, $_POST['CedulaID'][$IDI]);




$sentencia="UPDATE Inventario.Datos_I SET FechaI_ABAE= '".$Fecha_ABAE."', Cargo= '".$CargoI."', Sede= '".$Sede."', Direccion_A= '".$Direccion_A."', Unidad_A= '".$Unidad_A."', Jefe_I= '".$Jefe_I."', FechaI_Servicio= '".$Fecha_Servicio."', TotalA_Serv= '".$TotalA_Serv."', CorreoE_Ins= '".$CorreoE_Ins."', Telefono_O_Ext= '".$Telefono_O_Ext."', Familiares_ABAE= '".$Familiares_ABAE."', Nombres= '".$NombresI."' WHERE IDI='".$IDI."' ";
$resul=$conex->query($sentencia);
}
}




ModificarComision($_POST['IDM'], $_POST['FechaI_ServicioC'], $_POST['Ano_S'], $_POST['Institu_P'], $_POST['Rango_M'], $_POST['TiempoC_S'], $_POST['FechaI_Ser'], $_POST['FechaC_Ser']);


function ModificarComision($IDM, $FechaI_ServicioC, $Ano_S, $Institu_P, $Rango_M, $TiempoC_S, $FechaI_Ser, $FechaC_Ser)
{
include'Conexion.php';

foreach ($_POST['IDM'] as $IDM) 
{

    $FechaI_ServicioC=mysqli_real_escape_string($conex, $_POST['FechaI_ServicioC'][$IDM]);
    $Ano_S=mysqli_real_escape_string($conex, $_POST['Ano_S'][$IDM]);
    $Institu_P=mysqli_real_escape_string($conex, $_POST['Institu_P'][$IDM]);
    $Rango_M=mysqli_real_escape_string($conex, $_POST['Rango_M'][$IDM]);
    $TiempoC_S=mysqli_real_escape_string($conex, $_POST['TiempoC_S'][$IDM]);
    $FechaI_Ser=mysqli_real_escape_string($conex, $_POST['FechaI_Ser'][$IDM]);
    $FechaC_Ser=mysqli_real_escape_string($conex, $_POST['FechaC_Ser'][$IDM]);



$sentencia="UPDATE Inventario.Datos_M SET FechaI_Servicio= '".$FechaI_ServicioC."', Ano_S= '".$Ano_S."', Institu_P= '".$Institu_P."', Rango_M= '".$Rango_M."', TiempoC_S= '".$TiempoC_S."', FechaI_Ser= '".$FechaI_Ser."', FechaC_Ser= '".$FechaC_Ser."' WHERE IDM='".$IDM."' ";
$resul=$conex->query($sentencia);
}
}




ModificarOtros($_POST['IDO'], $_POST['Facebook'], $_POST['Twitter'], $_POST['Instagram'], $_POST['Otros'], $_POST['Carnet_P'], $_POST['Codigo_C'], $_POST['Serial_C'], $_POST['Beneficios_P'], $_POST['Carnet_PSUV'], $_POST['Codigo_P'], $_POST['Serial_P'], $_POST['Beneficios_PP'], $_POST['Partido_P'], $_POST['Mov_S'], $_POST['Comuna'], $_POST['Vocero'], $_POST['Caja_Clap'], $_POST['Vivienda'], $_POST['Tipo_V'], $_POST['Vehiculo'], $_POST['Tipo_Veh'], $_POST['Transporte_P'], $_POST['Cual'], $_POST['Descrip_R'], $_POST['Depor_Cult']);


function ModificarOtros($IDO, $Facebook, $Twitter, $Instagram, $Otros, $Carnet_P, $Codigo_C, $Serial_C, $Beneficios_P, $Carnet_PSUV, $Codigo_P, $Serial_P, $Beneficios_PP,  $Partido_P, $Mov_S, $Comuna, $Vocero, $Caja_Clap, $Vivienda, $Tipo_V, $Vehiculo, $Tipo_Veh, $Transporte_P, $Cual, $Descrip_R, $Depor_Cult)
{
include'Conexion.php';

foreach ($_POST['IDO'] as $IDO) 
{

    $Facebook=mysqli_real_escape_string($conex, $_POST['Facebook'][$IDO]);
    $Twitter=mysqli_real_escape_string($conex, $_POST['Twitter'][$IDO]);
    $Instagram=mysqli_real_escape_string($conex, $_POST['Instagram'][$IDO]);
    $Otros=mysqli_real_escape_string($conex, $_POST['Otros'][$IDO]);
    $Carnet_P=mysqli_real_escape_string($conex, $_POST['Carnet_P'][$IDO]);
    $Codigo_C=mysqli_real_escape_string($conex, $_POST['Codigo_C'][$IDO]);
    $Serial_C=mysqli_real_escape_string($conex, $_POST['Serial_C'][$IDO]);
    $Beneficios_P=mysqli_real_escape_string($conex, $_POST['Beneficios_P'][$IDO]);
    $Carnet_PSUV=mysqli_real_escape_string($conex, $_POST['Carnet_PSUV'][$IDO]);
    $Codigo_P=mysqli_real_escape_string($conex, $_POST['Codigo_P'][$IDO]);
    $Serial_P=mysqli_real_escape_string($conex, $_POST['Serial_P'][$IDO]);
    $Beneficios_PP=mysqli_real_escape_string($conex, $_POST['Beneficios_PP'][$IDO]);
    $Partido_P=mysqli_real_escape_string($conex, $_POST['Partido_P'][$IDO]);
    $Mov_S=mysqli_real_escape_string($conex, $_POST['Mov_S'][$IDO]);
    $Comuna=mysqli_real_escape_string($conex, $_POST['Comuna'][$IDO]);
    $Vocero=mysqli_real_escape_string($conex, $_POST['Vocero'][$IDO]);
    $Caja_Clap=mysqli_real_escape_string($conex, $_POST['Caja_Clap'][$IDO]);
    $Vivienda=mysqli_real_escape_string($conex, $_POST['Vivienda'][$IDO]);
    $Tipo_V=mysqli_real_escape_string($conex, $_POST['Tipo_V'][$IDO]);
    $Vehiculo=mysqli_real_escape_string($conex, $_POST['Vehiculo'][$IDO]);
    $Tipo_Veh=mysqli_real_escape_string($conex, $_POST['Tipo_Veh'][$IDO]);
    $Transporte_P=mysqli_real_escape_string($conex, $_POST['Transporte_P'][$IDO]);
    $Cual=mysqli_real_escape_string($conex, $_POST['Cual'][$IDO]);
    $Descrip_R=mysqli_real_escape_string($conex, $_POST['Descrip_R'][$IDO]);
    $Depor_Cult=mysqli_real_escape_string($conex, $_POST['Depor_Cult'][$IDO]);



$sentencia="UPDATE Inventario.Otros SET Facebook= '".$Facebook."', Twitter= '".$Twitter."', Instagram= '".$Instagram."', Otros= '".$Otros."', Carnet_P= '".$Carnet_P."', Codigo_C= '".$Codigo_C."', Serial_C= '".$Serial_C."', Beneficios_P= '".$Beneficios_P."', Carnet_PSUV= '".$Carnet_PSUV."', Codigo_P= '".$Codigo_P."', Serial_P= '".$Serial_P."', Beneficios_PP= '".$Beneficios_PP."', Partido_P= '".$Partido_P."', Mov_S= '".$Mov_S."', Comuna= '".$Comuna."', Vocero= '".$Vocero."', Caja_Clap= '".$Caja_Clap."', Vivienda= '".$Vivienda."', Tipo_V= '".$Tipo_V."', Vehiculo= '".$Vehiculo."', Tipo_Veh= '".$Tipo_Veh."', Transporte_P= '".$Transporte_P."', Cual= '".$Cual."', Descrip_R= '".$Descrip_R."', Depor_Cult= '".$Depor_Cult."' WHERE IDO='".$IDO."' ";

$resul=$conex->query($sentencia);
}
}

echo "<script type='text/javascript'>
    alert('Producto Modificado exitosamente');
    window.location.href='administrador.php';
</script>";

?>