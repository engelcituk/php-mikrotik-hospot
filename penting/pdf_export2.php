<?php 
ini_set( "display_errors", 0);

require_once '../dompdf/autoload.php';

include_once "./vendor/autoload.php";
use Dompdf\Dompdf;
$dompdf = new Dompdf();
ob_start();
$html=file_get_contents( 'http://localhost:8888/mikrotik/penting/plantilla.php' );

//$html = ob_get_clean();
$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->render();
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
echo $dompdf->output();

  
