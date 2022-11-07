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
$pdf->SetX(16);
$pdf->SetFont('Times','',12);
$pdf->Cell(60,7,'','1',0,'C',0);
$pdf->Cell(60,7,'','1',0,'C',0);
$pdf->Cell(60,7,'','1',1,'C',0);


$pdf->SetX(16);
$pdf->SetFont('Times','B',12);
$pdf->Cell(60,7,utf8_decode('Unidad de Adscripción'),'0',0,'C',0);
$pdf->Cell(60,7,utf8_decode('Supervisor Inmediato'),'0',0,'C',0);
$pdf->Cell(60,7,utf8_decode('Cargo:'),'0',1,'C',0);
$pdf->SetFont('Times','',12);
$pdf->SetX(16);
$pdf->Cell(60,10,'','1',0,'C',0);
$pdf->SetX(76);
$pdf->Cell(60,10,'','1',0,'C',0);
$pdf->Cell(60,10,'','1',1,'C',0);



$pdf->SetFont('Times','B',12);
$pdf->SetTextColor(255, 255, 255);//color de texto rgb
$pdf->SetX(16);
$pdf->Cell(180,7,utf8_decode('N° DE DIAS DE REPOSO'),'1',1,'C',1);
$pdf->SetTextColor(0, 0, 0);//color de texto rgb
$pdf->SetX(16);
$pdf->Cell(60,18,utf8_decode($pdf->Image('img/Cuadro.png',20,98,5)."De 1 hasta 3 Dias"),'1',0,'C',0);
$pdf->Cell(60,18,utf8_decode('Cantida de Dias Exactos'),'1',0,'C',0);  
$pdf->Cell(30,6,utf8_decode('DESDE:'),'LRT',0,'C',0);
$pdf->Cell(30,6,utf8_decode('HASTA:'),'LRT',1,'C',0);
$pdf->SetX(136);
$pdf->Cell(30,6,utf8_decode('dd/mm/aaaa'),'LRB',0,'C',0);
$pdf->Cell(30,6,utf8_decode('dd/mm/aaaa'),'LRB',1,'C',0);

$pdf->SetX(136);
$pdf->Cell(30,6,utf8_decode(''),'LRB',0,'C',0);
$pdf->Cell(30,6,utf8_decode(''),'LRB',1,'C',0);

$pdf->SetX(16);
$pdf->Cell(60,18,utf8_decode($pdf->Image('img/Cuadro.png',20,116,5)."Superior de 3 Dias"),'1',0,'C',0);
$pdf->Cell(60,18,utf8_decode('Cantida de Dias Exactos'),'1',0,'C',0);  
$pdf->Cell(30,6,utf8_decode('DESDE:'),'LRT',0,'C',0);
$pdf->Cell(30,6,utf8_decode('HASTA:'),'LRT',1,'C',0);
$pdf->SetX(136);
$pdf->Cell(30,6,utf8_decode('dd/mm/aaaa'),'LRB',0,'C',0);
$pdf->Cell(30,6,utf8_decode('dd/mm/aaaa'),'LRB',1,'C',0);

$pdf->SetX(136);
$pdf->Cell(30,6,utf8_decode(''),'LRB',0,'C',0);
$pdf->Cell(30,6,utf8_decode(''),'LRB',1,'C',0);

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
$pdf->Cell(90,8,utf8_decode('FIRMA Y SELLO:'),'LRB',0,'L',0);

$pdf->SetX(106);
$pdf->Cell(90,8,utf8_decode('FECHA:'),'LRB',1,'L',0);
$pdf->SetX(16);
$pdf->Cell(180,8,utf8_decode('OBSERVACIONES: '),'LRT',1,'L',0);

$pdf->SetX(16);
$pdf->Cell(180,4,'','LR',1,'C',0);

$pdf->SetFont('Times','B',11);
$pdf->SetX(16);
$pdf->Cell(9,9,$pdf->Image('img/Cuadro.png',18,221,5),'L',0,'C',0);
$pdf->Cell(171,9,utf8_decode('No aplica validación por parte del IVSS (solo aplica para casos de aquellos reposos hasta 3 dias)'),'R',1,'L',0);

$pdf->SetX(16);
$pdf->Cell(9,9,''.$pdf->Image('img/Cuadro.png',18,230,5),'L',0,'L',0);
$pdf->Cell(171,9,utf8_decode('Reposo validado IVSS'),'R',1,'L',0);

$pdf->SetX(16);
$pdf->Cell(9,9,''.$pdf->Image('img/Cuadro.png',18,239,5),'L',0,'L',0);
$pdf->Cell(171,9,utf8_decode('Por validar ante el IVSS'),'R',1,'L',0);

$pdf->SetX(16);
$pdf->Cell(9,9,''.$pdf->Image('img/Cuadro.png',18,248,5),'LB',0,'L',0);
$pdf->Cell(171,9,utf8_decode('Reposo Extemporáneo'),'BR',1,'L',0);

// cell(ancho, largo, contenido,borde?, salto de linea?)


$pdf->Output();
?>