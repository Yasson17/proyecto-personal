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
$pdf->Cell(180,7,utf8_decode(''),'',1,'R',0);


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
$pdf->Cell(60,7,'Cargo:',0,1,'C',0);
$pdf->SetX(16);
$pdf->SetFont('Times','',12);
$pdf->Cell(60,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(60,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(60,7,utf8_decode(''),'1',1,'C',0);


$pdf->SetX(16);
$pdf->SetFont('Times','B',12);
$pdf->Cell(60,7,utf8_decode('Unidad de Adscripción'),'0',0,'C',0);
$pdf->Cell(60,7,utf8_decode('Supervisor Inmediato'),'0',0,'C',0);
$pdf->Cell(60,7,utf8_decode('Cargo:'),'0',1,'C',0);
$pdf->SetFont('Times','',12);
$pdf->SetX(76);
$pdf->Cell(60,15,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(60,15,utf8_decode(''),'1',0,'C',0);
$pdf->SetX(16);
$pdf->MultiCell(60,15,utf8_decode(''),1,'C');


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
$pdf->Cell(15,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(15,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(67,7,utf8_decode(''),'1',1,'C',0);


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
$pdf->Cell(20,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),'1',0,'C',0);
$pdf->Cell(20,7,utf8_decode(''),'1',1,'C',0);


$pdf->SetX(16);
$pdf->Cell(90,7,utf8_decode('Funcionario Solicitante:'),'1',0,'C',0);
$pdf->Cell(90,7,utf8_decode('Jefe de la Unidad Solicitante:'),'1',1,'C',0);


$pdf->SetX(16);
$pdf->Cell(90,25,utf8_decode(''),'LRT',0,'C',0);
$pdf->Cell(90,20,utf8_decode(''),'LRT',1,'C',0);
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
$pdf->Cell(90,12.5,utf8_decode(''),'LRT',0,'C',0);

$pdf->SetX(16);
$pdf->Cell(90,12.5,'SI'.$pdf->Image('img/Cuadro.png',35,230,5),'LR',1,'L',0);


$pdf->SetX(16);
$pdf->Cell(90,12.5,utf8_decode('NO ').$pdf->Image('img/Cuadro.png',35,243,5),'LRB',0,'L',0);


$pdf->Cell(90,4.5,utf8_decode(''),'LR',1,'C',0);
$pdf->SetX(106);
$pdf->Cell(90,8,utf8_decode('FIRMA Y SELLO:'),'LRB',1,'C',0);
$pdf->SetX(16);
$pdf->Cell(180,8,utf8_decode('Observaciones: '),'LRT',1,'C',0);
$pdf->SetX(16);
$pdf->Cell(180,17,utf8_decode(''),'LRB',0,'C',0);


// cell(ancho, largo, contenido,borde?, salto de linea?)


$pdf->Output();
?>