<?php  

include '../Conexion.php';
include '../Conex.php';

if(isset($_POST['Enviar']))
{
$Cedula=$_POST['Cedula'];
$Nombres=$_POST['Nombres'];
$Supervisor=$_POST['Supervisor'];
$CargoS=$_POST['CargoS'];
$Dias=$_POST['Dias'];
$Fecha_IR=$_POST['Fecha_IR'];
$Supervisor=$_POST['Supervisor'];
$status='Enviado';
$Tipo=$_POST['Tipo'];



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
$insert = "INSERT INTO inventario.Notificaciones (`Cedula`, `Nombres`, `Supervisor`, `CargoS`, `Periodo`, `Fecha_IV`, `Tipo`, `CedulaID`, `status`) VALUES ('$Cedula','$Nombres','$Supervisor','$CargoS', '$Dias', '$Fecha_IR', '$Tipo', '$CedulaID', '$status')"; 

$resul= $conex->query($insert);

 if(isset($_POST['ad']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Datos Enviados Exitosamente.');
    window.location.href='../Notificaciones/formulario_reposoA.php?Cedula=$se';
</script>";

 }
 if(isset($_POST['sup']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Datos Enviados Exitosamente.');
    window.location.href='../Notificaciones/formulario_reposoSu.php?Cedula=$se';
</script>";

 }
 if($resul)
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Datos Enviados Exitosamente.');
    window.location.href='../Notificaciones/formulario_reposoU.php?Cedula=$se';
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
    window.location.href='../Notificaciones/formulario_reposoA.php?Cedula=$se';
</script>";

 }
 else if(isset($_POST['sup']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formulario_reposoSu.php?Cedula=$se';
</script>";

 }
 else
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formulario_reposoU.php?Cedula=$se';
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
    window.location.href='../Notificaciones/formulario_reposoA.php?Cedula=$se';
</script>";

 }
 else if(isset($_POST['sup']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formulario_reposoSu.php?Cedula=$se';
</script>";

 }
 else
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formulario_reposoU.php?Cedula=$se';
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
    window.location.href='../Notificaciones/formulario_reposoA.php?Cedula=$se';
</script>";

 }
 else if(isset($_POST['sup']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formulario_reposoSu.php?Cedula=$se';
</script>";

 }
 else
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formulario_reposoU.php?Cedula=$se';
</script>";

 }

    
}

}


if(isset($_POST['FilmarS']))
{
$se=$_POST['sin'];

if (isset($_POST['IDnoti'])) 
{
$IDnoti=$_POST['IDnoti'];
}

$status='Aprobado_S';

$Cedula=$_POST['Cedula'];


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
if(isset($_POST['super']))
{
    //Redireccionando
    echo "<script type='text/javascript'>
   alert('Datos Enviados Exitosamente.');
    window.location.href='../Notificaciones/Index_reportesV.php?Cedula=$se';
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
$CargoS=$_POST['CargoS'];
$Fecha_IR=$_POST['Fecha_IR'];



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
    window.location.href='../Notificaciones/formulario_reposoA.php?Cedula=$se';
</script>";

 }
 else if(isset($_POST['sup']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formulario_reposoSu.php?Cedula=$se';
</script>";

 }
 else
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formulario_reposoU.php?Cedula=$se';
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
    window.location.href='../Notificaciones/formulario_reposoA.php?Cedula=$se';
</script>";

 }
 else if(isset($_POST['sup']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formulario_reposoSu.php?Cedula=$se';
</script>";

 }
 else
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formulario_reposoU.php?Cedula=$se';
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
    window.location.href='../Notificaciones/formulario_reposoA.php?Cedula=$se';
</script>";

 }
 else if(isset($_POST['sup']))
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formulario_reposoSu.php?Cedula=$se';
</script>";

 }
 else
 {
    $se=$Cedula;
    //Redireccionando
 echo "<script type='text/javascript'>
   alert('Supervisor no encontrado, por favor verifique sus datos.');
    window.location.href='../Notificaciones/formulario_reposoU.php?Cedula=$se';
</script>";

 }

    
}



if (isset($_POST['IDnoti'])) 
{
$IDnoti=$_POST['IDnoti'];
}



if(isset($_POST['F']))
{

$status='Inhabilitado';


$sentencia="UPDATE Inventario.Notificaciones SET status= '".$status."' WHERE IDnoti='".$IDnoti."' ";
$resul=$conex->query($sentencia);
}

if(isset($_POST['super']))
{
    $Fecha_IR=$_POST['Fecha_IR'];
}
else
{
$desinicio = explode('-', $Fecha_IR);
$Fecha_IR=$desinicio[2].'-'.$desinicio[1].'-'.$desinicio[0];
}

$Fecha_cambio=$Fecha_IR;
$Dias=$_POST['Dias'];

if ($Dias>3) 
{
    $Aprobado='img/Aprobado.png';
    $Reprobado='img/Cuadro.png';


    $Fecha_IRS=$Fecha_cambio;
    $Fecha_cambio='';

}
else
{
    $Reprobado='img/Aprobado.png';
    $Aprobado='img/Cuadro.png';
    $Fecha_IRS='';
    
}

if(isset($_POST['super']))
{

$dsu = explode(' ', $Supervisor);

if(isset($dsu[2]))
{
    $Busqueda ="SELECT * FROM inventario.Datos_P WHERE Nombres LIKE '%$dsu[0]%$dsu[1]%' ";
}
else
{
    $Busqueda ="SELECT * FROM inventario.Datos_P WHERE Nombres LIKE '%$dsu[0]%$dsu[1]%' ";
}
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
$Reprobado='img/Aprobado.png';
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
$Fecha_IR=$_POST['Fecha_IR'];

if (isset($_POST['IDnoti'])) 
{
$IDnoti=$_POST['IDnoti'];
}



if (isset($_POST['No'])) 
{
$status='No';

$sentencia="UPDATE Inventario.Notificaciones SET status= '".$status."' WHERE IDnoti='".$IDnoti."' ";
$resul=$conex->query($sentencia);

}



if(isset($_POST['super']))
{
    $Fecha_IR=$_POST['Fecha_IR'];
}
else
{
$desinicio = explode('-', $Fecha_IR);
$Fecha_IR=$desinicio[2].'-'.$desinicio[1].'-'.$desinicio[0];
}

$Fecha_cambio=$Fecha_IR;
$Dias=$_POST['Dias'];

if ($Dias>3) 
{
    $Aprobado='img/Aprobado.png';
    $Reprobado='img/Cuadro.png';


    $Fecha_IRS=$Fecha_cambio;
    $Fecha_cambio='';

}
else
{
    $Reprobado='img/Aprobado.png';
    $Aprobado='img/Cuadro.png';
    $Fecha_IRS='';
    
}



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
$Reprobado='img/Aprobado.png';
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

if($Exp)
{
$descomI = explode('-', $Exp[1]);
$anoI=$descomI[0];
$mesI=$descomI[1];
$diaI=$descomI[2]; 

$descomE = explode('-', $Exp[2]);
$anoE=$descomE[0];
$mesE=$descomE[1];
$diaE=$descomE[2];  
}
else
{
$anoI='';
$mesI='';
$diaI=''; 

$anoE='';
$mesE='';
$diaE='';
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
 
    $total = ($dias * 86400)+$datestart ;

    return $fechafinal = date('d-m-Y', $total);
}


//FECHA DE CULMINACIÓN
$Culmina = sumasdiasemana($Fecha_IR,$Dias);

if ($Dias>3) 
{
    $Fecha_fin=$Culmina;
    $Culmina='';
}
else
{
    $Fecha_fin='';
}




?>



<?php


require('fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    $this->Image('img/membrete.png',7,0,213);
    $this->Image('img/logoabae.jpg',16,16,13);
    $this->SetFont('Times','B',20);
    $this->setXY(17,16);
    $this->MultiCell(180,12,utf8_decode('Notificación de Reposo Médico y/o Certificado de Incapacidad'),0,'C');
    // cell(ancho, largo, contenido,borde?, salto de linea?)
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-30);
    // Arial italic 8
    $this->SetFont('Times','B',10);
    // Número de página
    $this->SetX(75);
    $this->SetFillColor(155, 157, 158);
    $this->Cell(66,5,'',0,0,'C',0);
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
$pdf->Cell(180,7,'DATOS DEL TRABAJADOR','1',1,'C',1);

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
$pdf->SetTextColor(255, 255, 255);//color de texto rgb
$pdf->SetX(16);
$pdf->Cell(180,7,utf8_decode('N° DE DIAS DE REPOSO'),'1',1,'C',1);
$pdf->SetTextColor(0, 0, 0);//color de texto rgb
$pdf->SetX(16);
$pdf->Cell(60,18,utf8_decode($pdf->Image($Reprobado,20,96,5)."De 1 hasta 3 Dias"),'1',0,'C',0);
$pdf->Cell(60,18,utf8_decode('Cantida de Dias Exactos'),'1',0,'C',0);  
$pdf->Cell(30,6,utf8_decode('DESDE:'),'LRT',0,'C',0);
$pdf->Cell(30,6,utf8_decode('HASTA:'),'LRT',1,'C',0);
$pdf->SetX(136);
$pdf->Cell(30,6,utf8_decode('dd/mm/aaaa'),'LRB',0,'C',0);
$pdf->Cell(30,6,utf8_decode('dd/mm/aaaa'),'LRB',1,'C',0);

$pdf->SetX(136);
$pdf->Cell(30,6,utf8_decode($Fecha_cambio),'LRB',0,'C',0);
$pdf->Cell(30,6,utf8_decode($Culmina),'LRB',1,'C',0);

$pdf->SetX(16);
$pdf->Cell(60,18,utf8_decode($pdf->Image($Aprobado,20,114,5)."Superior de 3 Dias"),'1',0,'C',0);
$pdf->Cell(60,18,utf8_decode('Cantida de Dias Exactos'),'1',0,'C',0);  
$pdf->Cell(30,6,utf8_decode('DESDE:'),'LRT',0,'C',0);
$pdf->Cell(30,6,utf8_decode('HASTA:'),'LRT',1,'C',0);
$pdf->SetX(136);
$pdf->Cell(30,6,utf8_decode('dd/mm/aaaa'),'LRB',0,'C',0);
$pdf->Cell(30,6,utf8_decode('dd/mm/aaaa'),'LRB',1,'C',0);

$pdf->SetX(136);
$pdf->Cell(30,6,utf8_decode($Fecha_IRS),'LRB',0,'C',0);
$pdf->Cell(30,6,utf8_decode($Fecha_fin),'LRB',1,'C',0);

$pdf->SetX(16);
$pdf->Cell(90,7,utf8_decode('TRABAJADOR:'),'1',0,'C',0);
$pdf->Cell(90,7,utf8_decode('SUPERVISOR INMEDIATO:'),'1',1,'C',0);

$pdf->SetX(16);
$pdf->Cell(90,25,utf8_decode(''),'LRT',0,'C',0);
$pdf->Cell(90,20,utf8_decode(''),'LRT',1,'C',0);
$pdf->SetX(16);
$pdf->Cell(90,8,utf8_decode('FIRMA:'),'LRB',0,'L',0);
$pdf->Cell(90,8,utf8_decode('FIRMA:'),'LRB',1,'L',0);


$pdf->SetTextColor(255, 255, 255);//color de texto rgb
$pdf->SetX(16);
$pdf->Cell(180,8,utf8_decode('SOLO PARA USO DE RECURSOS HUMANOS'),'1',1,'C',1);


$pdf->SetTextColor(0, 0, 0);//color de texto rgb
$pdf->SetX(16);
$pdf->Cell(180,8,utf8_decode('RECIBIDO POR:'),'1',1,'L',0);

$pdf->SetX(16);
$pdf->Cell(90,20,utf8_decode(''),'LR',0,'C',0);
$pdf->Cell(90,20,utf8_decode(''),'LR',1,'C',0);

$pdf->SetX(16);
$pdf->Cell(90,8,utf8_decode('FIRMA Y SELLO:'),'LRB',0,'C',0);

$pdf->SetX(106);
$pdf->Cell(90,8,utf8_decode('FECHA:'),'LRB',1,'C',0);
$pdf->SetX(16);
$pdf->Cell(180,8,utf8_decode('OBSERVACIONES: '),'LRT',1,'L',0);

$pdf->SetX(16);
$pdf->Cell(180,4,'','LR',1,'C',0);

$pdf->SetFont('Times','B',11);
$pdf->SetX(16);
$pdf->Cell(9,9,$pdf->Image('img/Cuadro.png',18,219,5),'L',0,'C',0);
$pdf->Cell(171,9,utf8_decode('No aplica validación por parte del IVSS (solo aplica para casos de aquellos reposos hasta 3 dias)'),'R',1,'L',0);

$pdf->SetX(16);
$pdf->Cell(9,9,''.$pdf->Image('img/Cuadro.png',18,228,5),'L',0,'L',0);
$pdf->Cell(171,9,utf8_decode('Reposo validado IVSS'),'R',1,'L',0);

$pdf->SetX(16);
$pdf->Cell(9,9,''.$pdf->Image('img/Cuadro.png',18,237,5),'L',0,'L',0);
$pdf->Cell(171,9,utf8_decode('Por validar ante el IVSS'),'R',1,'L',0);

$pdf->SetX(16);
$pdf->Cell(9,9,''.$pdf->Image('img/Cuadro.png',18,246,5),'LB',0,'L',0);
$pdf->Cell(171,9,utf8_decode('Reposo Extemporáneo'),'BR',1,'L',0);

$pdf->Image($firmaU,50,135,30,18);
$pdf->Image($FirmaSu,138,135,30,18);
$pdf->Image($FirmaAd,50,178.5,30,18);

// cell(ancho, largo, contenido,borde?, salto de linea?)


$pdf->Output();
?>