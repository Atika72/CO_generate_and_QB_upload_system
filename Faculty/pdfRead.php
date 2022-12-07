<?php
require_once "./dompdf/autoload.inc.php";
use Dompdf\Dompdf;
require "./dompdf/autoload.inc.php";
 $file_name = $_GET['name'];
$dompdf = new Dompdf();
ob_start();
require('print.php');
$html = ob_get_contents();
ob_get_clean();
$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream('a.pdf', ['Attachment' => false]);

// $dompdf = new DOMPDF();
// $files = glob("./pdf/include/*.php");
// foreach ($files as $file)
// include_once($file);
// ob_start();
// require('print.php');
// $html = ob_get_contents();
// ob_get_clean();
// $dompdf->loadhtml($html);

// $file_name = $_GET['name'];

// $dompdf->render();
// $output = $dompdf->output();
// file_put_contents("./pdf/ " . $file_name . ".pdf", $output);