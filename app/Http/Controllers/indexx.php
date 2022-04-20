<?php
require_once 'dompdf/dompdf/autoload.inc.php';
use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml("<h1>bonjour</h1>");
$dompdf->setPaper('A4','landscape');
$dompdf->render();
$dompdf->stream();