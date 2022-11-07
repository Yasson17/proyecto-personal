
<?php

try 
{

include("Conexion.php");

$resul=$conex->query('CREATE DATABASE inventario');    
//CREACION DE LA TABLA DATOS_P (DATOS DEL PERSONAL)
$resul = $conex->query('CREATE TABLE `inventario`.`Datos_P` ( `ID` int(100) NOT NULL AUTO_INCREMENT, `Nombres` text(100) NOT NULL,`Cedula` int(20) NOT NULL,`Lugar_N` VARCHAR(100) NOT NULL, `Fecha_N` date NOT NULL, `Edad` int(5) NOT NULL, `Sexo` text(20) NOT NULL, `Estado_Civil` text(20) NOT NULL, `Derecho` text(1) NOT NULL, `Zurdo` text(1) NOT NULL, `Talla_Camisa` text(10) NOT NULL, `Talla_Pantalon` int(2) NOT NULL, `Talla_Calzado` int(2) NOT NULL, `Estatura` VARCHAR(10) NOT NULL, `Peso` VARCHAR(10) NOT NULL, `Direccion_domicilio` VARCHAR(100) NOT NULL, `Estado` VARCHAR(100) NOT NULL, `Municipio` VARCHAR(100) NOT NULL, `Parroquia` VARCHAR(100) NOT NULL, `Telefono_Habitacion` VARCHAR(100) NOT NULL, `Telefono_Movil` VARCHAR(100) NOT NULL, `Otro_numero` VARCHAR(100) NOT NULL, `Correo_Elect` VARCHAR(100) NOT NULL, `RIF` VARCHAR(20) NOT NULL, `Nro_Tlfn_Emergencia` VARCHAR(100) NOT NULL, `Nombre_Tlfn_Emergencia` text(100) NOT NULL, `alergia_a` VARCHAR(100) NOT NULL, `Tipo_Sangre` VARCHAR(10) NOT NULL, `Padece_Enferm_Cronica` VARCHAR(100) NOT NULL, `Nombre_Conyuge` VARCHAR(100) NOT NULL, `Nro_Hijos` int(5) NOT NULL, `Si_Embarazo` text(2) NOT NULL, `Meses_Gestacion` VARCHAR(50) NOT NULL, `Firma` LONGBLOB NOT NULL, `status` text(10) NOT NULL, PRIMARY KEY (`ID`)) ENGINE = InnoDB');


//CREACION DE LA TABLA DATOS_H (DATOS DE LOS HIJOS)
$resul = $conex->query('CREATE TABLE `inventario`.`Datos_H` (`IDH` int(100) NOT NULL AUTO_INCREMENT, `Nombres` text(100) NOT NULL, `Fecha_N` date NOT NULL, `Edad` int(5) NOT NULL, `Cedula` int(20) NOT NULL, `Sexo` text(10) NOT NULL, `Grado_e` VARCHAR(100) NOT NULL, `Camisa` VARCHAR(10) NOT NULL, `Pantalon` int(10) NOT NULL, `Calzados` int(10) NOT NULL,`CedulaID` int(20) NOT NULL, `status` text(10) NOT NULL, PRIMARY KEY (`IDH`)) ENGINE = InnoDB');

//CREACION DE LA TABLA NUCLEO_F (DATOS DEL NUCLEO FAMILIAR)

$resul = $conex->query('CREATE TABLE `inventario`.`Nucleo_F` ( `IDN` int(100) NOT NULL AUTO_INCREMENT, `Parentesco` text(100) NOT NULL,`Nombres` text(100) NOT NULL,`Apellidos` text(100) NOT NULL, `Cedula` int(20) NOT NULL, `Fecha_N` date NOT NULL, `Edad` int(5) NOT NULL, `Sexo` text(10) NOT NULL, `Estado_C` text(20) NOT NULL, `Grado_I` VARCHAR(20) NOT NULL,`CedulaID` int(20) NOT NULL, `status` text(10) NOT NULL, PRIMARY KEY (`IDN`)) ENGINE = InnoDB');


//CREACION DE LA TABLA NIVEL_A (DATOS DEL NIVEL ACADEMICO)
$resul = $conex->query('CREATE TABLE `inventario`.`Nivel_A` ( `IDA` int(100) NOT NULL AUTO_INCREMENT, `Especializacion` VARCHAR(100) NOT NULL,`Titulo_O` VARCHAR(100) NOT NULL,`Ano_G` date NOT NULL, `Inst_Univ` VARCHAR(100) NOT NULL, `Observaciones` VARCHAR(200) NOT NULL,`CedulaID` int(20) NOT NULL, `status` text(10) NOT NULL, PRIMARY KEY (`IDA`)) ENGINE = InnoDB');


//CREACION DE LA TABLA FORMACION_E (DATOS DE FORMACION EN EL EXTERIOR)
$resul = $conex->query('CREATE TABLE `inventario`.`Formacion_E` ( `IDF` int(100) NOT NULL AUTO_INCREMENT, `Titulo_O` VARCHAR(100) NOT NULL,`Ano_G` date NOT NULL, `Inst_Univ` VARCHAR(100) NOT NULL, `Pais` VARCHAR(100) NOT NULL,`CedulaID` int(20) NOT NULL, `status` text(10) NOT NULL, PRIMARY KEY (`IDF`)) ENGINE = InnoDB');


//CREACION DE LA TABLA EXPERINECIA_L (DATOS DE EXPERIENCIA LABORAL EN ADMINISTRACION PUBLICA)
$resul = $conex->query('CREATE TABLE `inventario`.`Experiencia_L` ( `IDE` int(100) NOT NULL AUTO_INCREMENT, `Organismo` VARCHAR(100) NOT NULL,`Fecha_I` date NOT NULL,`Fecha_E` date NOT NULL, `Cargo` VARCHAR(100) NOT NULL, `Antecedentes_S` VARCHAR(100) NOT NULL,`CedulaID` int(20) NOT NULL, `status` text(10) NOT NULL, PRIMARY KEY (`IDE`)) ENGINE = InnoDB');


//CREACION DE LA TABLA DATOS_I (DATOS LABORAL DE LA INSTITUCION) 
$resul = $conex->query('CREATE TABLE `inventario`.`Datos_I` ( `IDI` int(100) NOT NULL AUTO_INCREMENT,`FechaI_ABAE` date NOT NULL,`Cargo` VARCHAR(100) NOT NULL,`Sede` VARCHAR(100) NOT NULL, `Direccion_A` VARCHAR(100) NOT NULL, `Unidad_A` VARCHAR(200) NOT NULL, `Jefe_I` VARCHAR(200) NOT NULL, `FechaI_Servicio`date NOT NULL, `TotalA_Serv` int(10) NOT NULL, `CorreoE_Ins` VARCHAR(100) NOT NULL, `Telefono_O_Ext` VARCHAR(100) NOT NULL, `Familiares_ABAE` VARCHAR(20) NOT NULL, `Nombres` VARCHAR(200) NOT NULL,`CedulaID` int(20) NOT NULL, `status` text(10) NOT NULL, PRIMARY KEY (`IDI`)) ENGINE = InnoDB');


//CREACION DE LA TABLA PERSONAL_M (DATOS EN CASO DE SER PERSONAL EN COMISION DE SERVICIO (CIVIL O MILITAR))
$resul = $conex->query('CREATE TABLE `inventario`.`Datos_M` ( `IDM` int(100) NOT NULL AUTO_INCREMENT, `FechaI_Servicio` date NOT NULL,`Ano_S` int(10) NOT NULL,`Institu_P` VARCHAR(100) NOT NULL, `Rango_M` VARCHAR(100) NOT NULL, `TiempoC_S` VARCHAR(20) NOT NULL, `FechaI_Ser` date NOT NULL, `FechaC_Ser` date NOT NULL,`CedulaID` int(20) NOT NULL, `status` text(10) NOT NULL, PRIMARY KEY (`IDM`)) ENGINE = InnoDB');


//CREACION DE LA TABLA OTROS)
$resul = $conex->query('CREATE TABLE `inventario`.`Otros` ( `IDO` int(100) NOT NULL AUTO_INCREMENT, `Facebook` VARCHAR(100) NOT NULL,`Twitter` VARCHAR(100) NOT NULL,`Instagram` VARCHAR(100) NOT NULL, `Otros` VARCHAR(100) NOT NULL, `Carnet_P` text(10) NOT NULL, `Codigo_C` int(10), `Serial_C` int(10) NOT NULL, `Beneficios_P` VARCHAR(100) NOT NULL, `Carnet_PSUV` text(10) NOT NULL, `Codigo_P` VARCHAR(11) NOT NULL, `Serial_P` int(10) NOT NULL, `Beneficios_PP` VARCHAR(100) NOT NULL, `Partido_P` VARCHAR(100) NOT NULL, `Mov_S` VARCHAR(100) NOT NULL, `Comuna` text(10) NOT NULL, `Vocero` text(10) NOT NULL, `Caja_Clap` text(10) NOT NULL, `Vivienda` text(20) NOT NULL, `Tipo_V` text(20) NOT NULL, `Vehiculo` text(10) NOT NULL, `Tipo_Veh` VARCHAR(20) NOT NULL, `Transporte_P` text(10) NOT NULL, `Cual` VARCHAR(20) NOT NULL, `Descrip_R` VARCHAR(100) NOT NULL, `Depor_Cult` VARCHAR(20) NOT NULL,`CedulaID` int(20) NOT NULL, `status` text(10) NOT NULL, PRIMARY KEY (`IDO`)) ENGINE = InnoDB');


//CREACION DE LA TABLA NOTIFICACIONES
$resul = $conex->query('CREATE TABLE `inventario`.`Notificaciones` (`IDnoti` int(100) NOT NULL AUTO_INCREMENT, `Cedula` int(20) NOT NULL, `Nombres` text(100) NOT NULL, `Supervisor` VARCHAR(100) NOT NULL, `CargoS` VARCHAR(100) NOT NULL, `Periodo` int(5) NOT NULL, `Fecha_IV` date NOT NULL, `Tipo` text(50) NOT NULL, `CedulaID` int(20) NOT NULL, `status` text(20) NOT NULL, `Descripción` VARCHAR(200) NOT NULL, PRIMARY KEY (`IDnoti`)) ENGINE = InnoDB');

//CREACION DE LA TABLA de documentos
$resul = $conex->query('CREATE TABLE `inventario`.`documentos` (`IDdoc` int(100) NOT NULL AUTO_INCREMENT,  `archivo` longblob NOT NULL, `observaciones` VARCHAR(1000) NOT NULL,`departamento` VARCHAR(100) NOT NULL,`fecha` date NOT NULL, `CedulaID` int(20) NOT NULL, `status` text(20) NOT NULL, `tipo` VARCHAR(20) NOT NULL, PRIMARY KEY (`IDdoc`)) ENGINE = InnoDB');


        }catch (PDOException $e) 
        {
         echo "Error al intentar conectar a la base de datos: " . $e->getMessage();
        }

echo"<script type='text/javascript'>
	window.location.href='login.php';
</script>";

?>