<?php 
require '../vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;

$html2pdf = new Html2Pdf();

//Recoger la vista a imprimir
ob_start();
require_once 'pdf.php';
$html = ob_get_clean(); 

$html2pdf->writeHTML($html);
$html2pdf->output('pdfGenerado.pdf');

?>