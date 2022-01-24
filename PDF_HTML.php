<?php

// composer require mpdf/mpdf

require_once __DIR__ . '/vendor/autoload.php';
class PDF_HTML extends \Mpdf\Mpdf
{
    function __construct(array $config = [])
    {
        //Call parent constructor
        parent::__construct($config);
    }
    // Cabecera de página
    function Header($content = '')
    {
        // Logo
        $this->Image('logo.png',10,12);
        //Linea vertical
        $this->Line(37,12,37,285);
        // Arial bold 15
        $this->SetFont('Arial','',8);
        $txt = iconv('utf-8', 'cp1252', 'Coordinación General');
        $this->WriteText(8.1,170,utf8_encode($txt));
        $this->WriteText(12.3,174,'de las Defensorias');

        $this->WriteText(21,185,'LIAS/AJHM');
        $this->WriteText(8,196,'Calle de los Derechos');
        $this->WriteText(23.5,200,'Humanos');
        $txt = iconv('utf-8', 'cp1252', 'No. 210, Col. América');
        $this->WriteText(8,204,utf8_encode($txt));
        $this->WriteText(21.5,208,'C.P. 68050 ');
        $this->WriteText(19,212,'Oaxaca,Oax.');
        $this->WriteText(15.5,220,'(951) 503 02 15');
        $this->WriteText(23,224,'503 02 20');
        $this->WriteText(23,228,'513 51 85');
        $this->WriteText(23,232,'513 51 91');
        $this->WriteText(23,236,'513 51 97');
        $this->WriteText(24.1,244,'Ext. 142.');
        $this->WriteText(12.5,254,'dhatencionvisita@');
        $this->WriteText(20,258,'hotmail.com');
        $this->WriteText(8,262,'visitaduria@derechos');
        $this->WriteText(9.5,266,'humanosoaxaca.org');
        $this->WriteText(5,270,'www.derechoshumanos');
        $this->WriteText(21.2,274,'oaxaca.org');
        //Legenda superior
        $this->SetFont('Arial','',6);
        $txt = iconv('utf-8', 'cp1252', '"2021, AÑO DEL RECONOCIMIENTO AL PERSONAL DE SALUD, POR LA LUCHA CONTRA EL VIRUS SARS-CoV2, COVID-19"');
        $this->WriteText(60,13,utf8_encode($txt));
        // Salto de línea
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','',8);
        // Número de página
        $this->Cell(0,10,'Página '.$this->PageNo().'/{nb}',0,0,'C');
    }
}

?>