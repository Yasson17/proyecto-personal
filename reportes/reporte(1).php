<?php  

include '../Conexion.php';
include '../Conex.php';
if(isset($_POST['Enviar']))
{
$Cedula=$_POST['Cedula'];
$Nombres=$_POST['Nombres'];
$Supervisor=$_POST['Supervisor'];
$CargoS=$_POST['CargoS'];
$Periodo=$_POST['Periodo'];
$Fecha_IV=$_POST['Fecha_IV'];

$Supervisor=$_POST['Supervisor'];
$Tipo=$_POST['Tipo'];
$status='Enviado';




$conn = new mysqli('localhost','root','','inventario');
if(isset($Supervisor))
{
$dsu = explode(' ', $Supervisor);
if(isset($dsu[1]))
{

$Busqueda ="SELECT * FROM inventario.Datos_P WHERE Nombres LIKE '%$dsu[0]%$dsu[1]%' ";


if ($resulbus=mysqli_query($conn,$Busqueda))
{
    $resulveri=mysqli_num_rows($resulbus);
}

if ($resulveri>0) 
{
    $dsu = explode(' ', $Supervisor);

$Busqueda ="SELECT * FROM inventario.Datos_P WHERE Nombres LIKE '%$dsu[0]%$dsu[1]%' ";
$resul= $conex->query($Busqueda);
foreach ($resul as $fila) 
{
    $CedulaID=$fila['Cedula'];

}
$insert = "INSERT INTO inventario.Notificaciones (`Cedula`, `Nombres`, `Supervisor`, `CargoS`, `Periodo`, `Fecha_IV`, `Tipo`, `CedulaID`, `status`) VALUES ('$Cedula','$Nombres','$Supervisor','$CargoS', '$Periodo', '$Fecha_IV', '$Tipo', '$CedulaID', '$status')"; 

$resul= $conex->query($insert);

 if(isset($_POST['ad']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Datos Enviados Exitosamente.');
    window.location.href='../Notificaciones/formu_reporte_vacaciones.php?Cedula=$se';
</script>";

 }
 if(isset($_POST['sup']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Datos Enviados Exitosamente.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesSu.php?Cedula=$se';
</script>";

 }
 if($resul)
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Datos Enviados Exitosamente.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesU.php?Cedula=$se';
</script>";

 }

}
//ELSE SE RESUELVERI
else
{

    if(isset($_POST['ad']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacaciones.php?Cedula=$se';
</script>";

 }
 else if(isset($_POST['sup']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesSu.php?Cedula=$se';
</script>";

 }
 else
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesU.php?Cedula=$se';
</script>";

 }

    
}

}
//ELSE DE DSU
else
{

    if(isset($_POST['ad']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacaciones.php?Cedula=$se';
</script>";

 }
 else if(isset($_POST['sup']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesSu.php?Cedula=$se';
</script>";

 }
 else
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesU.php?Cedula=$se';
</script>";

 }

    
}

}
//ELSE DE SUPERVISOR
else
{

    if(isset($_POST['ad']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacaciones.php?Cedula=$se';
</script>";

 }
 else if(isset($_POST['sup']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesSu.php?Cedula=$se';
</script>";

 }
 else
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesU.php?Cedula=$se';
</script>";

 }

    
}

}



if(isset($_POST['FilmarS']))
{

$status='Aprobado_S';

$Cedula=$_POST['Cedula'];

 if (isset($_POST['IDnoti'])) 
 {
    $IDnoti=$_POST['IDnoti'];
 }

$sentencia="UPDATE Inventario.Notificaciones SET status= '".$status."' WHERE IDnoti='".$IDnoti."' ";
$resul=$conex->query($sentencia);

 if(isset($_POST['s']))
 {
    $se=$Cedula;
    //Redireccionando
    echo "<script type='text/javascript'>
   alert('Datos Enviados Exitosamente.');
    window.location.href='../Notificaciones/Index_reportesS.php?Cedula=$se';
</script>";
    
 }
 if($resul)
 {
    $se=$Cedula;
    //Redireccionando
    echo "<script type='text/javascript'>
   alert('Datos Enviados Exitosamente.');
    window.location.href='../Notificaciones/Index_reportesV.php?Cedula=$se';
</script>";
    
 }

}

else{

if(isset($_POST['Filmar']))
{

$status='Inhabilitado';

$Cedula=$_POST['Cedula'];

if (isset($_POST['IDnoti'])) 
{
$IDnoti=$_POST['IDnoti'];
}


$sentencia="UPDATE Inventario.Notificaciones SET status= '".$status."' WHERE IDnoti='".$IDnoti."' ";
$resul=$conex->query($sentencia);


 if($resul)
 {
    $se=$Cedula;
    //Redireccionando
    echo "<script type='text/javascript'>
   alert('Datos Enviados Exitosamente.');
    window.location.href='../Notificaciones/Index_reportesA.php?Cedula=$se';
</script>";
    
 }

}
}



  if(isset($_POST['Gene']))
{	
$Cedula=$_POST['Cedula'];
$Nombres=$_POST['Nombres'];
$Supervisor=$_POST['Supervisor'];



$conn = new mysqli('localhost','root','','inventario');

if(isset($Supervisor))
{
$dsu = explode(' ', $Supervisor);
if(isset($dsu[1]))
{

$Busqueda ="SELECT * FROM inventario.Datos_P WHERE Nombres LIKE '%$dsu[0]%$dsu[1]%' ";


if ($resulbus=mysqli_query($conn,$Busqueda))
{
    $resulveri=mysqli_num_rows($resulbus);
}

if ($resulveri==0) 
{
    if(isset($_POST['ad']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacaciones.php?Cedula=$se';
</script>";

 }
 else if(isset($_POST['sup']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesSu.php?Cedula=$se';
</script>";

 }
 else
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesU.php?Cedula=$se';
</script>";

 }

    
}

}
//ELSE DE DSU
else
{

    if(isset($_POST['ad']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacaciones.php?Cedula=$se';
</script>";

 }
 else if(isset($_POST['sup']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesSu.php?Cedula=$se';
</script>";

 }
 else
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesU.php?Cedula=$se';
</script>";

 }

    
}

}
//ELSE DE SUPERVISOR
else
{

    if(isset($_POST['ad']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacaciones.php?Cedula=$se';
</script>";

 }
 else if(isset($_POST['sup']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesSu.php?Cedula=$se';
</script>";

 }
 else
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesU.php?Cedula=$se';
</script>";

 }

    
}







if(isset($_POST['IDnoti']))
   {
    $IDnoti=$_POST['IDnoti'];
   }

$CargoS=$_POST['CargoS'];
$Periodo=$_POST['Periodo'];

if(isset($_POST['F']))
{

$status='Inhabilitado';


$sentencia="UPDATE Inventario.Notificaciones SET status= '".$status."' WHERE IDnoti='".$IDnoti."' ";
$resul=$conex->query($sentencia);

    
 }


if($Periodo==1)
{
    $Periodo=20;
}
else
{
    $Periodo=41;
}

$Fecha_IV=$_POST['Fecha_IV'];


if(isset($_POST['super']))
{

$dsu = explode(' ', $Supervisor);

$Busqueda ="SELECT * FROM inventario.Datos_P WHERE Nombres LIKE '%$dsu[0]%$dsu[1]%' ";

$resul= $conex->query($Busqueda);

foreach ($resul as $fila) 
{
	$FirmaSu=$fila['Firma'];

			if ($FirmaSu) 
			{
			$desF=explode('/', $FirmaSu);

			if(isset($desF[2]))
			{
				$FirmaSu=$desF[0].'/'.$desF[1].'/'.$desF[2];    	
			}
			else
			{
				$FirmaSu='../'.$desF[0].'/'.$desF[1];	
			}
			} 
   

}

}
else
{
	$FirmaSu='../imagen/blanco.png';
}



if(isset($_POST['recur']))
{
$Aprobado='img/Aprobado.png';
$Reprobado='img/Cuadro.png';
$enviarCedu=$_POST['enviarCedu'];
$CedulaID=$_POST['CedulaID'];

$dsu = explode(' ', $Supervisor);

$Busqueda ="SELECT * FROM inventario.Datos_P WHERE Cedula='".$CedulaID."' ";

$resul= $conex->query($Busqueda);

foreach ($resul as $fila) 
{
    $FirmaSu=$fila['Firma'];
    
            if ($FirmaSu) 
            {
            $desF=explode('/', $FirmaSu);

            if(isset($desF[2]))
            {
                $FirmaSu=$desF[0].'/'.$desF[1].'/'.$desF[2];        
            }
            else
            {
                $FirmaSu='../'.$desF[0].'/'.$desF[1];   
            }
            } 
   

}

$BusquedaAdmi ="SELECT * FROM inventario.Datos_P WHERE Cedula='".$enviarCedu."' ";

$resul= $conex->query($BusquedaAdmi);

foreach ($resul as $fila) 
{
    $FirmaAd=$fila['Firma'];

            if ($FirmaAd) 
            {
            $desF=explode('/', $FirmaAd);

            if(isset($desF[2]))
            {
                $FirmaAd=$desF[0].'/'.$desF[1].'/'.$desF[2];        
            }
            else
            {
                $FirmaAd='../'.$desF[0].'/'.$desF[1];   
            }
            } 
   

}

}
else
{
    $Aprobado='img/Cuadro.png';
    $Reprobado='img/Cuadro.png';
    $FirmaAd='../imagen/blanco.png';
}



$seleccion="SELECT * FROM inventario.Datos_P WHERE Cedula='".$Cedula."' ";
$result=$conex->query($seleccion);    
    if($result)
    {
    	foreach ($result as $fila) 
    	{
    		$firma=$fila['Firma'];
			if ($firma) 
			{
			$desF=explode('/', $firma);

			if(isset($desF[2]))
			{
				$firmaU=$desF[0].'/'.$desF[1].'/'.$desF[2];    	
			}
			else
			{
				$firmaU='../'.$desF[0].'/'.$desF[1];	
			}
			} 
   
    	}
    }




}




  if(isset($_POST['GeneR']))
{   
$Cedula=$_POST['Cedula'];
$Nombres=$_POST['Nombres'];
$Supervisor=$_POST['Supervisor'];

$CargoS=$_POST['CargoS'];

$conn = new mysqli('localhost','root','','inventario');

if(isset($Supervisor))
{
$dsu = explode(' ', $Supervisor);
if(isset($dsu[1]))
{

$Busqueda ="SELECT * FROM inventario.Datos_P WHERE Nombres LIKE '%$dsu[0]%$dsu[1]%' ";


if ($resulbus=mysqli_query($conn,$Busqueda))
{
    $resulveri=mysqli_num_rows($resulbus);
}

if ($resulveri==0) 
{
    if(isset($_POST['ad']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacaciones.php?Cedula=$se';
</script>";

 }
 else if(isset($_POST['sup']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesSu.php?Cedula=$se';
</script>";

 }
 else
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesU.php?Cedula=$se';
</script>";

 }

    
}

}
//ELSE DE DSU
else
{

    if(isset($_POST['ad']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacaciones.php?Cedula=$se';
</script>";

 }
 else if(isset($_POST['sup']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesSu.php?Cedula=$se';
</script>";

 }
 else
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesU.php?Cedula=$se';
</script>";

 }

    
}

}
//ELSE DE SUPERVISOR
else
{

    if(isset($_POST['ad']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacaciones.php?Cedula=$se';
</script>";

 }
 else if(isset($_POST['sup']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesSu.php?Cedula=$se';
</script>";

 }
 else
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formu_reporte_vacacionesU.php?Cedula=$se';
</script>";

 }

    
}



if(isset($_POST['IDnoti']))
{
$IDnoti=$_POST['IDnoti'];
}

if (isset($_POST['No'])) 
{
$status='No';

$sentencia="UPDATE Inventario.Notificaciones SET status= '".$status."' WHERE IDnoti='".$IDnoti."' ";
$resul=$conex->query($sentencia);
}


$Periodo=$_POST['Periodo'];

if($Periodo==1)
{
    $Periodo=20;
}
else
{
    $Periodo=41;
}

$Fecha_IV=$_POST['Fecha_IV'];


if(isset($_POST['super']))
{

$dsu = explode(' ', $Supervisor);

$Busqueda ="SELECT * FROM inventario.Datos_P WHERE Nombres LIKE '%$dsu[0]%$dsu[1]%' ";

$resul= $conex->query($Busqueda);

foreach ($resul as $fila) 
{
    $FirmaSu=$fila['Firma'];

            if ($FirmaSu) 
            {
            $desF=explode('/', $FirmaSu);

            if(isset($desF[2]))
            {
                $FirmaSu=$desF[0].'/'.$desF[1].'/'.$desF[2];        
            }
            else
            {
                $FirmaSu='../'.$desF[0].'/'.$desF[1];   
            }
            } 
   

}

}
else
{
    $FirmaSu='../imagen/blanco.png';
}



if(isset($_POST['recur']))
{
$Aprobado='img/Cuadro.png';
$Reprobado='img/Reprobado.png';
$enviarCedu=$_POST['enviarCedu'];
$CedulaID=$_POST['CedulaID'];

$dsu = explode(' ', $Supervisor);

$Busqueda ="SELECT * FROM inventario.Datos_P WHERE Cedula='".$CedulaID."' ";

$resul= $conex->query($Busqueda);

foreach ($resul as $fila) 
{
    $FirmaSu=$fila['Firma'];
    
            if ($FirmaSu) 
            {
            $desF=explode('/', $FirmaSu);

            if(isset($desF[2]))
            {
                $FirmaSu=$desF[0].'/'.$desF[1].'/'.$desF[2];        
            }
            else
            {
                $FirmaSu='../'.$desF[0].'/'.$desF[1];   
            }
            } 
   

}


$BusquedaAdmi ="SELECT * FROM inventario.Datos_P WHERE Cedula='".$enviarCedu."' ";

$resul= $conex->query($BusquedaAdmi);

foreach ($resul as $fila) 
{
    $FirmaAd=$fila['Firma'];

            if ($FirmaAd) 
            {
            $desF=explode('/', $FirmaAd);

            if(isset($desF[2]))
            {
                $FirmaAd=$desF[0].'/'.$desF[1].'/'.$desF[2];        
            }
            else
            {
                $FirmaAd='../'.$desF[0].'/'.$desF[1];   
            }
            }
   

}

}
else
{
    $Aprobado='img/Cuadro.png';
    $Reprobado='img/Cuadro.png';
    $FirmaAd='../imagen/blanco.png';
}



$seleccion="SELECT * FROM inventario.Datos_P WHERE Cedula='".$Cedula."' ";
$result=$conex->query($seleccion);    
    if($result)
    {
        foreach ($result as $fila) 
        {
            $firma=$fila['Firma'];
            if ($firma) 
            {
            $desF=explode('/', $firma);

            if(isset($desF[2]))
            {
                $firmaU=$desF[0].'/'.$desF[1].'/'.$desF[2];     
            }
            else
            {
                $firmaU='../'.$desF[0].'/'.$desF[1];    
            }
            } 
   
        }
    }




}


$Exp=act($Cedula);
function act($ced)
{
include '../Conexion.php';

    $sentencia="SELECT * FROM inventario.Experiencia_L WHERE CedulaID='".$ced."' ";
    $resul=$conex->query($sentencia);
    if ($resul)
{
foreach ($resul as $fila)
{
return [
    $fila['Organismo'],
    $fila['Fecha_I'],
    $fila['Fecha_E'],

];


}
}
else
{
    foreach ($resul as $fila)
    {
    return [
    $fila[' '],
    $fila[' '],
    $fila[' '],

    ];
    }
} 
}

if(isset($Exp[0]))
{
$descomI = explode('-', $Exp[1]);
$anoI[0]=$descomI[0];
$mesI[0]=$descomI[1];
$diaI[0]=$descomI[2]; 

$descomE = explode('-', $Exp[2]);
$anoE[0]=$descomE[0];
$mesE[0]=$descomE[1];
$diaE[0]=$descomE[2];  
}
else
{
$Exp[0]='';
$anoI[0]='';
$mesI[0]='';
$diaI[0]=''; 

$anoE[0]='';
$mesE[0]='';
$diaE[0]='';
}

if(isset($Exp[3]))
{
$descomI = explode('-', $Exp[4]);
$anoI[1]=$descomI[0];
$mesI[1]=$descomI[1];
$diaI[1]=$descomI[2]; 

$descomE = explode('-', $Exp[5]);
$anoE[1]=$descomE[0];
$mesE[1]=$descomE[1];
$diaE[1]=$descomE[2];  
}
else
{
$Exp[3]='';
$anoI[1]='';
$mesI[1]='';
$diaI[1]=''; 

$anoE[1]='';
$mesE[1]='';
$diaE[1]='';
}






$Ins=Insti($Cedula);

function Insti($ced)
{
include '../Conexion.php';

 $sentencia="SELECT * FROM inventario.Datos_I WHERE CedulaID='".$ced."' ";

    $resul=$conex->query($sentencia);
    if ($resul)
{
foreach ($resul as $fila)
{
return
[
    $fila['FechaI_ABAE'],
    $fila['TotalA_Serv'], 
    $fila['Unidad_A'], 
    $fila['Cargo'], 
];
}


}
}
$descom = explode('-', $Ins[0]);
$anoA=$descom[0];
$mesA=$descom[1];
$diaA=$descom[2];


    
function sumasdiasemana($fecha,$dias)
{
    $datestart= strtotime($fecha);

    $diasemana = date('N',$datestart);
    $totaldias = $diasemana+$dias;
    $findesemana = intval( $totaldias/5) *2 ; 

    $diasabado = $totaldias % 5 ; 
   
    if ($diasabado==6) $findesemana++;
    if ($diasabado==0) $findesemana=$findesemana-2;
 
    $total = (($dias+$findesemana) * 86400)+$datestart ;

    return $fechafinal = date('d-m-Y', $total);
}

$Calculo=$Periodo;
//FECHA DE INICIO
$desinicio = explode('-', $Fecha_IV);
$Idia=$desinicio[2];
$Imes=$desinicio[1];
$Iano=$desinicio[0];

//2022 enero
if(($Idia==1) && ($Imes==1) && ($Iano==2022))
{
	if ($Calculo==20) 
	{
		$Calculo=20;
	}
	else
	{
		$Calculo=43;
	}
}
else if(($Idia==2) && ($Imes==1) && ($Iano==2022))
{
    if ($Calculo==20) 
    {
        $Calculo=19;
    }
    else
    {
        $Calculo=42;
    }
}
else if(($Idia>=3) && ($Imes==1) && ($Iano==2022) && ($Calculo==41))
{
	$Calculo=43; 
}
//2022 febrero
else if(($Idia>=1) && ($Imes==2) && ($Iano==2022) && ($Calculo==20))
{
	$Calculo=22; 
}
else if(($Idia<=17) && ($Imes==2) && ($Iano==2022) && ($Calculo==41))
{
	$Calculo=43; 
    $CalculoR=44;
}
else if(($Idia>17) && ($Imes==2) && ($Iano==2022) && ($Calculo==41))
{
	$Calculo=44; 
}
//2022 marzo
else if(($Idia>=1) && ($Imes==3) && ($Iano==2022) && ($Calculo==41))
{
	$Calculo=44; 
}
else if(($Idia==18) && ($Imes==3) && ($Iano==2022) && ($Calculo==20))
{
	$Calculo=22; 
    $CalculoR=23;
}
else if( (($Idia>=1)&&($Idia<17)) && ($Imes==3) && ($Iano==2022) && ($Calculo==20))
{
    $Calculo=20; 
}
else if(($Idia==17) && ($Imes==3) && ($Iano==2022) && ($Calculo==20))
{
    $Calculo=20; 
    $CalculoR=22; 
}
else if(($Idia==18) && ($Imes==3) && ($Iano==2022) && ($Calculo==20))
{
    $Calculo=20; 
    $CalculoR=21; 
}
else if(($Idia==19) && ($Imes==3) && ($Iano==2022) && ($Calculo==20))
{
	$Calculo=23; 
}
else if(($Idia==20) && ($Imes==3) && ($Iano==2022) && ($Calculo==20))
{
    $Calculo=22; 
}
else if(($Idia>20) && ($Imes==3) && ($Iano==2022) && ($Calculo==20))
{
    $Calculo=23; 
}
//2022 abril
else if(($Idia<=14) && ($Imes==4) && ($Iano==2022) && ($Calculo==41))
{
	$Calculo=44; 
}
else if(($Idia==15) && ($Imes==4) && ($Iano==2022) && ($Calculo==41))
{
	$Calculo=43; 
}
else if( (($Idia>15)&&($Idia<=19)) && ($Imes==4) && ($Iano==2022) && ($Calculo==41))
{
    if($Idia==16)
    {
     $Calculo=42;
    } 
    else if($Idia==17)
    {
     $Calculo=41; 
    }
    else
    {
    $Calculo=42;
    }
}
else if(($Idia<14) && ($Imes==4) && ($Iano==2022) && ($Calculo==20))
{
	$Calculo=23; 
}
else if(($Idia==18) && ($Imes==4) && ($Iano==2022) && ($Calculo==20))
{
	$Calculo=21; 
}
else if(($Idia==28) && ($Imes==4) && ($Iano==2022) && ($Calculo==41))
{
    $Calculo=41; 
    $CalculoR=42; 
}
else if(($Idia>=29) && ($Imes==4) && ($Iano==2022) && ($Calculo==41))
{
	$Calculo=42; 
}
//2022 mayo
else if(($Idia<6) && ($Imes==5) && ($Iano==2022) && ($Calculo==41))
{
    $Calculo=42;  
}
else if(($Idia==6) && ($Imes==5) && ($Iano==2022) && ($Calculo==41))
{
    $Calculo=42; 
    $CalculoR=43; 
}
else if(($Idia==7) && ($Imes==5) && ($Iano==2022) && ($Calculo==41))
{
    $Calculo=44; 
}
else if(($Idia>8) && ($Imes==5) && ($Iano==2022) && ($Calculo==41))
{
	$Calculo=43; 
}
else if( (($Idia>1)&&($Idia<9)) && ($Imes==5) && ($Iano==2022) && ($Calculo==41))
{
	$Calculo=42; 
}
else if(($Idia==27) && ($Imes==5) && ($Iano==2022) && ($Calculo==20))
{
    $Calculo=20; 
    $CalculoR=21; 
}
else if(($Idia>=30) && ($Imes==5) && ($Iano==2022) && ($Calculo==20))
{
	$Calculo=21; 
}
//2022 junio
else if( ($Idia<=6) && ($Imes==6) && ($Iano==2022) && ($Calculo==20))
{
    if($Idia==6)
    {
    $Calculo=21; 
	$CalculoR=22; 
    }
    else if($Idia==5)
    {
    $Calculo=20; 
    $CalculoR=21; 
    }
    else if($Idia==4)
    {
    $Calculo=21; 
    $CalculoR=22; 
    }
    else
    {
    $Calculo=21; 
    }
}
else if( (($Idia>=1)&&($Idia<=24)) && ($Imes==6) && ($Iano==2022) && ($Calculo==41))
{
	$Calculo=43; 
}
else if(($Idia>24) && ($Imes==6) && ($Iano==2022) && ($Calculo==41))
{
	$Calculo=42; 
}
else if( (($Idia>6)&&($Idia<=24)) && ($Imes==6) && ($Iano==2022) && ($Calculo==20))
{
	$Calculo=22; 
}
else if(($Idia>24) && ($Imes==6) && ($Iano==2022) && ($Calculo==20))
{
	$Calculo=21; 
}
//2022 julio
else if(($Idia<=5) && ($Imes==7) && ($Iano==2022) && ($Calculo==41))
{
	$Calculo=42; 
}
else if(($Idia<=5) && ($Imes==7) && ($Iano==2022) && ($Calculo==20))
{
	$Calculo=21; 
}
//2022 octubre
else if(($Idia<=12) && ($Imes==10) && ($Iano==2022) && ($Calculo==41))
{
	$Calculo=42; 
}
else if(($Idia<=12) && ($Imes==10) && ($Iano==2022) && ($Calculo==20))
{
	$Calculo=21; 
}
//2022 diciembre
else if(($Idia==23) && ($Imes==12) && ($Iano==2022) && ($Calculo==41))
{
    $Calculo=41;
    $CalculoR=43;
}
else if(($Idia==24) && ($Imes==12) && ($Iano==2022) && ($Calculo==41))
{
    $Calculo=43; 
}
else if(($Idia==25) && ($Imes==12) && ($Iano==2022) && ($Calculo==41))
{
    $Calculo=42; 
}
else if(($Idia>=26) && ($Imes==12) && ($Iano==2022) && ($Calculo==41))
{
	$Calculo=43; 
}

//2023 enero
else if(($Idia==1) && ($Imes==1) && ($Iano==2023) && ($Calculo==41))
{
	$Calculo=44; 
}
else if(($Idia>=2) && ($Imes==1) && ($Iano==2023) && ($Calculo==41))
{
	$Calculo=43; 
}
else if(($Idia==1) && ($Imes==1) && ($Iano==2023) && ($Calculo==20))
{
	$Calculo=21; 
}
else if( (($Idia>=2)&&($Idia<24)) && ($Imes==1) && ($Iano==2023) && ($Calculo==20))
{
    if($Idia==23)
    {
        $Calculo=20;
        $CalculoR=22;
    }
    else
    {

	$Calculo=20; 
    }
}
else if(($Idia>24) && ($Imes==1) && ($Iano==2023) && ($Calculo==20))
{
	$Calculo=23; 
}
//2023 febrero
else if( (($Idia>=1)&&($Idia<=20)) && ($Imes==2) && ($Iano==2023) && ($Calculo==20))
{
	$Calculo=22; 
}
else if(($Idia==21) && ($Imes==2) && ($Iano==2023) && ($Calculo==20))
{
	$Calculo=21; 
}
else if(($Idia>21) && ($Imes==2) && ($Iano==2023) && ($Calculo==20))
{
	$Calculo=20; 
}
else if( (($Idia>=1)&&($Idia<7)) && ($Imes==2) && ($Iano==2023) && ($Calculo==41))
{
    if($Idia==6)
    {
        $Calculo=43;
        $CalculoR=45;
    }
    else if($Idia==5)
    {
        $Calculo=42;
        $CalculoR=45;

    }
    else if($Idia==4)
    {
        $Calculo=43;
        $CalculoR=45;

    }
    else
    {
    $Calculo=43; 
    } 
}
else if( (($Idia>=7)&&($Idia<21)) && ($Imes==2) && ($Iano==2023) && ($Calculo==41))
{
	$Calculo=45; 
}
else if(($Idia==21) && ($Imes==2) && ($Iano==2023) && ($Calculo==41))
{
	$Calculo=44; 
}
else if( (($Idia>21)&&($Idia>28)) && ($Imes==2) && ($Iano==2023) && ($Calculo==41))
{
	$Calculo=43; 
}
else if(($Idia==28) && ($Imes==2) && ($Iano==2023) && ($Calculo==41))
{
    $Calculo=44; 
}
//2023 marzo
else if( (($Idia>=1)&&($Idia<10)) && ($Imes==3) && ($Iano==2023) && ($Calculo==20))
{
    if($Idia==9)
    {
        $Calculo=20;
        $CalculoR=22;
        
    }
    else
    {
    $Calculo=20; 
    }  
}
else if( (($Idia>=10)&&($Idia<21)) && ($Imes==3) && ($Iano==2023) && ($Calculo==20))
{
    if($Idia==20)
    {
        $Calculo=22;
        $CalculoR=21; 
    }
    else
    {
    $Calculo=22; 
    }  
}
else if(($Idia>=21) && ($Imes==3) && ($Iano==2023) && ($Calculo==20))
{    
    if($Idia==29)
    {
        $Calculo=23;
        $CalculoR=24; 
    }
    else if($Idia==30)
    {
	$Calculo=24; 
    } 
    else if($Idia==31)
    {
    $Calculo=24; 
    }
    else
    {
        $Calculo=23;
    }
}
else if(($Idia>=1) && ($Imes==3) && ($Iano==2023) && ($Calculo==41))
{
    
	$Calculo=45; 

}
//2023 abril
else if(($Idia<=6) && ($Imes==4) && ($Iano==2023) && ($Calculo==41))
{
	$Calculo=44; 
}
else if(($Idia==7) && ($Imes==4) && ($Iano==2023) && ($Calculo==41))
{
	$Calculo=43; 
}
else if( (($Idia>7)&&($Idia<=19)) && ($Imes==4) && ($Iano==2023) && ($Calculo==41))
{
	$Calculo=42; 
}
else if(($Idia>=29) && ($Imes==4) && ($Iano==2023) && ($Calculo==41))
{
	$Calculo=42; 
}
else if(($Idia<=6) && ($Imes==4) && ($Iano==2023) && ($Calculo==20))
{
	$Calculo=23; 
}
else if(($Idia==7) && ($Imes==4) && ($Iano==2023) && ($Calculo==20))
{
	$Calculo=22; 
}
else if( (($Idia>7)&&($Idia<=19)) && ($Imes==4) && ($Iano==2023) && ($Calculo==20))
{
	$Calculo=21; 
}
//2023 mayo
else if(($Idia==1) && ($Imes==5) && ($Iano==2023) && ($Calculo==41))
{
    $Calculo=42; 
}
else if( (($Idia>1)&&($Idia<=9)) && ($Imes==5) && ($Iano==2023) && ($Calculo==41))
{
    if($Idia==9)
    {
        $Calculo=41;
        $CalculoR=42; 
    }
    else
    {
    $Calculo=41; 
    } 
}
else if( (($Idia>9)&&($Idia<26)) && ($Imes==5) && ($Iano==2023) && ($Calculo==41))
{
    $Calculo=42; 
}
else if(($Idia>=26) && ($Imes==5) && ($Iano==2023) && ($Calculo==41))
{
    $Calculo=43; 
}
else if(($Idia==1) && ($Imes==5) && ($Iano==2023) && ($Calculo==20))
{
    $Calculo=21; 
}
else if(($Idia>1) && ($Imes==5) && ($Iano==2023) && ($Calculo==20))
{
	$Calculo=20; 
}
//2023 junio
else if(($Idia>=1) && ($Imes==6) && ($Iano==2023) && ($Calculo==41))
{
	$Calculo=43; 
}
else if(($Idia<=7) && ($Imes==6) && ($Iano==2023) && ($Calculo==20))
{
    if ($Idia==7) 
    {
    $Calculo=20; 
	$CalculoR=21; 
    }
    else
    {
    $Calculo=20; 
    }
}
else if( (($Idia==8)) && ($Imes==6) && ($Iano==2023) && ($Calculo==20))
{
	$Calculo=21; 
}
else if(($Idia==23) && ($Imes==6) && ($Iano==2023) && ($Calculo==20))
{
    $Calculo=21; 
    $CalculoR=22; 
    
}
else if(($Idia>=24) && ($Imes==6) && ($Iano==2023) && ($Calculo==20))
{
	$Calculo=22; 
}
//2023 julio
else if(($Idia<=5) && ($Imes==7) && ($Iano==2023) && ($Calculo==41))
{
	$Calculo=43; 
}
else if( (($Idia>5)&&($Idia<=24)) && ($Imes==7) && ($Iano==2023) && ($Calculo==41))
{
    $Calculo=42; 
}
else if(($Idia<=5) && ($Imes==7) && ($Iano==2023) && ($Calculo==20))
{
	$Calculo=22; 
}
else if( (($Idia>5)&&($Idia<=24)) && ($Imes==7) && ($Iano==2023) && ($Calculo==20))
{
    $Calculo=21; 
}
//2023 octubre
else if(($Idia<=12) && ($Imes==10) && ($Iano==2023) && ($Calculo==41))
{
	$Calculo=42; 
}
else if(($Idia<=12) && ($Imes==10) && ($Iano==2023) && ($Calculo==20))
{
	$Calculo=21; 
}
else if(($Idia==29) && ($Imes==10) && ($Iano==2023) && ($Calculo==41))
{
    $Calculo=41; 
    $CalculoR=42; 
    
}
else if(($Idia>=30) && ($Imes==10) && ($Iano==2023) && ($Calculo==41))
{
	$Calculo=42; 
}
//2023 noviembre
else if(($Idia==27) && ($Imes==11) && ($Iano==2023) && ($Calculo==20))
{
    $Calculo=20; 
    $CalculoR=21; 
    
}
else if(($Idia>=28) && ($Imes==11) && ($Iano==2023) && ($Calculo==20))
{
	$Calculo=21; 
}
else if(($Idia>=3) && ($Imes==11) && ($Iano==2023) && ($Calculo==41))
{
	$Calculo=43; 
}
else if(($Idia==2) && ($Imes==10) && ($Iano==2023) && ($Calculo==41))
{
    $Calculo=42; 
    $CalculoR=43; 
    
}
else if(($Idia<3) && ($Imes==11) && ($Iano==2023) && ($Calculo==41))
{
	$Calculo=42; 
}
//2023 diciembre
else if(($Idia==1) && ($Imes==12) && ($Iano==2023) && ($Calculo==20))
{
	$Calculo=21; 
}
else if(($Idia>=1) && ($Imes==12) && ($Iano==2023) && ($Calculo==20))
{
	$Calculo=22; 
}
else if(($Idia<=25) && ($Imes==12) && ($Iano==2023) && ($Calculo==41))
{
	$Calculo=43; 
}
else if(($Idia>=26) && ($Imes==12) && ($Iano==2023) && ($Calculo==41))
{
	$Calculo=43; 
}

//2024 enero
else if(($Idia==1) && ($Imes==1) && ($Iano==2024))
{
	if ($Calculo==20) 
	{
		$Calculo=21;
	}
	else
	{
		$Calculo=42;
	}
}
else if(($Idia>=3) && ($Imes==1) && ($Iano==2024) && ($Calculo==41))
{
	$Calculo=43; 
}
//2024 febrero
else if(($Idia>=1) && ($Imes==2) && ($Iano==2024) && ($Calculo==20))
{
	$Calculo=22; 
}
else if(($Idia<=17) && ($Imes==2) && ($Iano==2024) && ($Calculo==41))
{
	$Calculo=43; 
}
else if(($Idia>17) && ($Imes==2) && ($Iano==2024) && ($Calculo==41))
{
	$Calculo=44; 
}
//2024 marzo
else if(($Idia>=1) && ($Imes==3) && ($Iano==2024) && ($Calculo==41))
{
	$Calculo=44; 
}
else if(($Idia==18) && ($Imes==3) && ($Iano==2024) && ($Calculo==20))
{
	$Calculo=22; 
}
else if(($Idia>18) && ($Imes==3) && ($Iano==2024) && ($Calculo==20))
{
	$Calculo=23; 
}
//2024 abril
else if(($Idia<=14) && ($Imes==4) && ($Iano==2024) && ($Calculo==41))
{
	$Calculo=44; 
}
else if(($Idia==15) && ($Imes==4) && ($Iano==2024) && ($Calculo==41))
{
	$Calculo=43; 
}
else if( (($Idia>15)&&($Idia<=19)) && ($Imes==4) && ($Iano==2024) && ($Calculo==41))
{
	$Calculo=42; 
}
else if(($Idia<14) && ($Imes==4) && ($Iano==2024) && ($Calculo==20))
{
	$Calculo=23; 
}
else if(($Idia==18) && ($Imes==4) && ($Iano==2024) && ($Calculo==20))
{
	$Calculo=21; 
}
else if(($Idia>=29) && ($Imes==4) && ($Iano==2024) && ($Calculo==41))
{
	$Calculo=42; 
}
//2024 mayo
else if(($Idia>8) && ($Imes==5) && ($Iano==2024) && ($Calculo==41))
{
	$Calculo=43; 
}
else if( (($Idia>1)&&($Idia<9)) && ($Imes==5) && ($Iano==2024) && ($Calculo==41))
{
	$Calculo=42; 
}
else if(($Idia>=30) && ($Imes==5) && ($Iano==2024) && ($Calculo==20))
{
	$Calculo=21; 
}
//2024 junio
else if( (($Idia>=1)&&($Idia<=24)) && ($Imes==6) && ($Iano==2024) && ($Calculo==41))
{
	$Calculo=43; 
}
else if(($Idia>24) && ($Imes==6) && ($Iano==2024) && ($Calculo==41))
{
	$Calculo=42; 
}
else if( (($Idia<=6)&&($Idia<24)) && ($Imes==6) && ($Iano==2024) && ($Calculo==20))
{
	$Calculo=21; 
}
else if( (($Idia>6)&&($Idia<=24)) && ($Imes==6) && ($Iano==2024) && ($Calculo==20))
{
	$Calculo=22; 
}
else if(($Idia>24) && ($Imes==6) && ($Iano==2024) && ($Calculo==20))
{
	$Calculo=21; 
}
//2024 julio
else if(($Idia<=5) && ($Imes==7) && ($Iano==2024) && ($Calculo==41))
{
	$Calculo=42; 
}
else if(($Idia<=5) && ($Imes==7) && ($Iano==2024) && ($Calculo==20))
{
	$Calculo=21; 
}
//2024 octubre
else if(($Idia<=12) && ($Imes==10) && ($Iano==2024) && ($Calculo==41))
{
	$Calculo=42; 
}
else if(($Idia<=12) && ($Imes==10) && ($Iano==2024) && ($Calculo==20))
{
	$Calculo=21; 
}
//2024 diciembre
else if(($Idia>=26) && ($Imes==12) && ($Iano==2024) && ($Calculo==41))
{
	$Calculo=43; 
}
else
{
    if ($Calculo==20) 
    {
        $Calculo=20;
    }
    else
    {
        $Calculo=41;
    }
}


//FECHA DE CULMINACIÓN
 
$Culmina = sumasdiasemana($Fecha_IV,$Calculo-1);

//FECHA DE REINTEGRO

if(isset($CalculoR))
{
$R = sumasdiasemana($Fecha_IV,$CalculoR);
$DesR=explode('-', $R);
$DR=$DesR[0];


$R=date("l $DR");

$DesR=explode(' ', $R);
$DR=$DesR[0];
//FECHA DE REINTEGRO EN CASO DE SER DIA VIERNES
    if ($DR=='Friday') 
    {
        $sumarDias=$CalculoR+2;
        $Reingreso = sumasdiasemana($Fecha_IV,$sumarDias);
    }
    else
    {
        $Reingreso = sumasdiasemana($Fecha_IV,$CalculoR);
    }
}
else
{
$R = sumasdiasemana($Fecha_IV,$Calculo);
$DesR=explode('-', $R);
$DR=$DesR[0];

$R=date("l $DR");

$DesR=explode(' ', $R);
$DR=$DesR[0];
//FECHA DE REINTEGRO EN CASO DE SER DIA VIERNES
    if ($DR=='Friday') 
    {
        $sumarDias=$Calculo+2;
        $Reingreso = sumasdiasemana($Fecha_IV,$sumarDias);
    }
    else
    {
        $Reingreso = sumasdiasemana($Fecha_IV,$Calculo);
    }
}





$desculmina = explode('-', $Culmina);
$Cdia=$desculmina[0];
$Cmes=$desculmina[1];
$Cano=$desculmina[2];


$desreingreso = explode('-', $Reingreso);
$Rdia=$desreingreso[0];
$Rmes=$desreingreso[1];
$Rano=$desreingreso[2];




?>



<?php

require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->Image('img/logoabae.jpg',20,16,13);
    $this->SetFont('Times','B',20);
    $this->setXY(16,16);
    $this->Cell(180,12,utf8_decode('Solicitud de Vacaciones'),'0',1,'C',0);
    // cell(ancho, largo, contenido,borde?, salto de linea?)
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-22.7);
    // Arial italic 8
    $this->SetFont('Times','B',10);
    // Número de página
    $this->SetX(75);
    $this->SetFillColor(155, 157, 158);
    $this->Cell(66,5,'Original-Unidad de Recursos Humanos',0,0,'C',1);
}
}

// Creación del objeto de la clase heredada
$pdf = new PDF();//hacemos una instancia de la clase
$pdf->AliasNbPages();
$pdf->AddPage();//añade l apagina / en blanco
$pdf->SetMargins(10,10,10);
$pdf->SetAutoPageBreak(true,20);//salto de pagina automatico
$pdf->SetX(16);
$pdf->SetFont('Times','B',12);
$pdf->Cell(180,7,utf8_decode(''),'B',1,'R',0);


$pdf->SetX(16);
$pdf->SetFillColor(33, 87, 146);//color de fondo rgb
$pdf->SetTextColor(255, 255, 255);//color de texto rgb
$pdf->SetDrawColor(0, 0, 0);//color de linea  rgb
$pdf->SetFont('Times','B',12);
$pdf->Cell(180,7,'1) Datos del Funcionario Solicitante','1',1,'C',1);

$pdf->SetX(16);
$pdf->SetTextColor(0, 0, 0);//color de texto rgb
$pdf->SetFont('Times','B',12);
$pdf->Cell(60,7,'Nombre y Apellido','0',0,'C',0);
$pdf->Cell(60,7,'Cedula de Identidad','0',0,'C',0);
$pdf->Cell(60,7,'Cargo:','0',1,'C',0);
$pdf->SetX(76);
$pdf->SetFont('Times','',12);
$pdf->Cell(60,7,utf8_decode($Cedula),'0',0,'C',0);
$pdf->Cell(60,7,utf8_decode($Ins[3]),'0',0,'C',0);
$pdf->SetX(16);
$pdf->MultiCell(60,5.8,utf8_decode($Nombres),0,'C');


$pdf->SetX(16);
$pdf->SetFont('Times','B',12);
$pdf->Cell(60,7,utf8_decode('Unidad de Adscripción'),'0',0,'C',0);
$pdf->Cell(60,7,utf8_decode('Supervisor Inmediato'),'0',0,'C',0);
$pdf->Cell(60,7,utf8_decode('Cargo:'),'0',1,'C',0);
$pdf->SetFont('Times','',12);
$pdf->SetX(16);
$pdf->Cell(60,8,utf8_decode($Ins[2]),'0',0,'C',0);
$pdf->SetX(76);
$pdf->Cell(60,8,utf8_decode($Supervisor),'0',0,'C',0);
$pdf->MultiCell(60,8,utf8_decode($CargoS),0,'C');


$pdf->SetFont('Times','B',12);
$pdf->SetX(16);
$pdf->Cell(63,27,utf8_decode('Fecha de Ingreso a la Institución'),'1',0,'C',0);
$pdf->SetTextColor(255, 255, 255);//color de texto rgb
$pdf->Cell(15,18,utf8_decode('Día'),'1',0,'C',1);
$pdf->Cell(15,18,utf8_decode('Mes'),'1',0,'C',1);
$pdf->Cell(20,18,utf8_decode('Año'),'1',0,'C',1);   
$pdf->Cell(67,9,utf8_decode('Periodo Vacacional:'),'LRT',1,'C',1);
$pdf->SetX(129);
$pdf->Cell(67,9,utf8_decode('Días a Disfrutar:'),'LRB',1,'C',1);

$pdf->SetTextColor(0, 0, 0);//color de texto rgb
$pdf->SetX(79);
$pdf->Cell(15,7,utf8_decode($diaA),'1',0,'C',0);
$pdf->Cell(15,7,utf8_decode($mesA),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode($anoA),'1',0,'C',0);
$pdf->Cell(67,7,utf8_decode($Periodo),'1',1,'C',0);


$pdf->SetTextColor(255, 255, 255);//color de texto rgb
$pdf->SetX(16);
$pdf->Cell(180,7,utf8_decode('2) Antigüedad en la Administracion Pública Nacional'),'1',1,'C',1);
$pdf->SetX(16);
$pdf->Cell(75,15,utf8_decode('Institución'),'1',0,'C',1);
$pdf->Cell(52.5,8,utf8_decode('Fecha de Ingreso'),'1',0,'C',1);
$pdf->Cell(52.5,8,utf8_decode('Fecha de Egreso'),'1',1,'C',1);


$pdf->SetX(91);
$pdf->Cell(17.5,7 ,utf8_decode('Día'),'1',0,'C',1);
$pdf->Cell(17.5,7,utf8_decode('Mes'),'1',0,'C',1);
$pdf->Cell(17.5,7,utf8_decode('Año'),'1',0,'C',1);
$pdf->Cell(17.5,7,utf8_decode('Día'),'1',0,'C',1);
$pdf->Cell(17.5,7,utf8_decode('Mes'),'1',0,'C',1);
$pdf->Cell(17.5,7,utf8_decode('Año'),'1',1,'C',1);


$pdf->SetX(16);
$pdf->SetTextColor(0, 0, 0);//color de texto rgb
$pdf->Cell(75,7,utf8_decode($Exp[0]),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode($diaI[0]),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode($mesI[0]),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode($anoI[0]),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode($diaE[0]),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode($mesE[0]),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode($anoE[0]),'1',1,'C',0);


$pdf->SetX(16);
$pdf->Cell(75,7,utf8_decode($Exp[3]),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode($diaI[1]),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode($mesI[1]),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode($anoI[1]),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode($diaE[1]),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode($mesE[1]),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode($anoE[1]),'1',1,'C',0);


$pdf->SetX(16);
$pdf->Cell(75,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode(''),'1',1,'C',0);


$pdf->SetX(16);
$pdf->Cell(75,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(17.5,7,utf8_decode(''),'1',1,'C',0);


$pdf->SetTextColor(255, 255, 255);//color de texto rgb
$pdf->SetX(16);
$pdf->Cell(60,7,utf8_decode('Fecha Inicio'),'1',0,'C',1);
$pdf->Cell(60,7,utf8_decode('Fecha Culminación'),'1',0,'C',1);
$pdf->Cell(60,7,utf8_decode('Fecha de Reintegro'),'1',1,'C',1);


$pdf->SetTextColor(0, 0, 0);//color de texto rgb
$pdf->SetX(16);
$pdf->Cell(20,7,utf8_decode('Día'),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode('Mes'),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode('Año'),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode('Día'),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode('Mes'),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode('Año'),'1',0,'C',0);
$pdf->Cell(20,7 ,utf8_decode('Dia'),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode('Mes'),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode('Año'),'1',1,'C',0);


$pdf->SetX(16);
$pdf->Cell(20,7,utf8_decode($Idia),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode($Imes),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode($Iano),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode($Cdia),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode($Cmes),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode($Cano),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode($Rdia),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode($Rmes),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode($Rano),'1',1,'C',0);


$pdf->SetX(16);
$pdf->Cell(90,7,utf8_decode('Funcionario Solicitante:'),'1',0,'C',0);
$pdf->Cell(90,7,utf8_decode('Jefe de la Unidad Solicitante:'),'1',1,'C',0);


$pdf->SetX(16);
$pdf->Cell(90,25,utf8_decode($pdf->Image($firmaU,45,175,30,18)),'LRT',0,'C',0);
$pdf->Cell(90,20,utf8_decode($pdf->Image($FirmaSu,136,175,30,18)),'LRT',1,'C',0);
$pdf->SetX(16);
$pdf->Cell(90,8,utf8_decode('FIRMA:'),'LRB',0,'C',0);
$pdf->Cell(90,8,utf8_decode('FIRMA Y SELLO:'),'LRB',1,'C',0);


$pdf->SetTextColor(255, 255, 255);//color de texto rgb
$pdf->SetX(16);
$pdf->Cell(180,8,utf8_decode('4) SOLO PARA USO DE RECURSOS HUMANOS'),'1',1,'C',1);

$pdf->SetTextColor(0, 0, 0);//color de texto rgb
$pdf->SetX(16);
$pdf->Cell(90,7,utf8_decode('Solicitud Valida por Recursos Humanos'),'1',0,'C',0);
$pdf->Cell(90,7,utf8_decode('Recibido por:'),'1',1,'C',0);

$pdf->SetX(106);
$pdf->Cell(90,14,utf8_decode(''),'LRT',0,'C',0);

$pdf->SetX(16);
$pdf->Cell(90,14,'SI'.$pdf->Image($Aprobado,35,220,5),'LR',1,'L',0);


$pdf->SetX(16);
$pdf->Cell(90,14,utf8_decode('NO ').$pdf->Image($Reprobado,35,234,5),'LRB',0,'L',0);


$pdf->Cell(90,8,utf8_decode($pdf->Image($FirmaAd,136,218.5,30,18)),'LR',1,'C',0);
$pdf->SetX(106);
$pdf->Cell(90,6,utf8_decode('FIRMA Y SELLO:'),'LRB',1,'C',0);
$pdf->SetX(16);
$pdf->Cell(180,8,utf8_decode('Observaciones: '),'LRT',1,'C',0);
$pdf->SetX(16);
$pdf->Cell(180,17,utf8_decode(''),'LRB',0,'C',0);


// cell(ancho, largo, contenido,borde?, salto de linea?)


$pdf->Output();
?>