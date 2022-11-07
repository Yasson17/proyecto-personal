<?php
	include '../Conexion.php';

	ModificarProducto($_GET['Cedula'], $_GET['Nro_Hijos']);

	function ModificarProducto($Cedu, $Nro_Hijos)
	{
	include '../Conexion.php';
        $GLOBALS['Cedu'] = $Cedu;

		$sentencia="UPDATE Inventario.Datos_P SET Nro_Hijos= '".$Nro_Hijos."' WHERE Cedula= '".$Cedu."' ";

		$resul=$conex->query($sentencia);
        
        if($resul)
        {
        echo "<script>
        window.location.href = 'agg_hijos.php?Cedula='+ $Cedu +'';
        </script>";
        }

    }
?>
