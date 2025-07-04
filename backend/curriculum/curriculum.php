<?php
ob_start();

if(isset($_GET['language'])){

    $language = $_GET['language'];

    $languagesPath = 'languages';
    if($language == 'ita'){
        require $languagesPath . '/ita.php';
    
    }else if($language == 'esp'){
        require $languagesPath . '/esp.php';
    
    }else if($language == 'eng'){
        require $languagesPath . '/eng.php';
    }

    require 'html.php';


}else{
    echo "<div style='width:90%; padding:20px; margin:0 auto; background-color:rgb(203, 77, 77); color:white; font-size:35px; text-align:center; font-weight:bold; border-radius:10px;'> Errore nel caricare il curriculum </div>";
}

$html = ob_get_clean();  

require_once 'dompdf/autoload.php';

$publicPath = realpath(__DIR__); 

use Dompdf\Dompdf;
use Dompdf\Options;

$options = new Options();
$options->set('isRemoteEnabled', true);
$options->setChroot($publicPath); 
$options->set('defaultPaperSize', 'A4');
$options->set('isHtml5ParserEnabled', true);

$dompdf = new Dompdf($options);
$dompdf->loadHtml($html);
$dompdf->setPaper('letter');
$dompdf->render();

require '../env.php';

$dompdf->stream($name_pdf, array('Attachment' => $pdfAttachment));
