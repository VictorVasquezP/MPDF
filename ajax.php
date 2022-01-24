<?php

// composer require mpdf/mpdf
require('PDF_HTML.php');

// if (isset($_POST['text'])) {
$pdf = new PDF_HTML();
$pdf->allow_charset_conversion = true;
$pdf->charset_in = 'iso-8859-4';
$pdf->AddPage();
//oficio
$pdf->SetFont('Arial', 'B', 11);
$pdf->WriteText(112, 24, 'OFICIO:');
$pdf->SetFont('Arial', '', 11);
$pdf->WriteText(128, 24, '9877');
//expediente
$pdf->SetFont('Arial', 'B', 11);
$pdf->WriteText(112, 30, 'EXPEDIENTE:');
$pdf->SetFont('Arial', '', 11);
$pdf->WriteText(139, 30, 'DDHPO/1901/(01)/OAX/2019 ');
//asunto
$pdf->SetFont('Arial', 'B', 11);
$pdf->WriteText(112, 36, 'ASUNTO:');
$pdf->SetFont('Arial', '', 11);
$txt = iconv('utf-8', 'cp1252', 'SE INFORMA.');
$pdf->WriteText(131, 36, utf8_encode($txt));
//fecha
$pdf->SetFont('Arial', '', 11);
$txt = iconv('utf-8', 'cp1252', 'OAXACA DE JUÁREZ, OAX., A 16 DE JUNIO DE');
$pdf->WriteText(112, 42, utf8_encode($txt));
$pdf->WriteText(113, 48, '2021');

/* Datos */
$pdf->SetFont('Arial', 'B', 11);
$txt = iconv('utf-8', 'cp1252', 'LIC. XXXXXX XXXXXXX XXXXXXX XXXXXXXX.');
$pdf->WriteText(40, 60, utf8_encode($txt));
$txt = iconv('utf-8', 'cp1252', 'DIRECTOR DE ASUNTOS JURÍDICOS DE LOS ');
$pdf->WriteText(40, 66, utf8_encode($txt));
$pdf->WriteText(40, 72, 'SERVICIOS DE SALUD DE OAXACA.');
$pdf->WriteText(40, 78, 'P R E S E N T E.');

//cuerpo del contenido
$pdf->Ln(45);
$pdf->SetFont('Arial', '', 10);
if (isset($_POST['text'])) {
    $html = $_POST['text'];
    $pdf->WriteHTML('<div style="width:90%;margin-left:94px">' . $html . '</div>');
}
return $pdf->Output();
// }

?>