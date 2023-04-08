<?php

use Dompdf\Dompdf;

function generatePdf($html)
{
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);

    // (Optional) Setup the paper size and orientation
    $dompdf->setPaper('A4', 'landscape');

    // Render the HTML as PDF
    $dompdf->render();

    // Output the generated PDF to Browser
    $dompdf->stream('Tabel Samsat Map JR', ['Attachment' => false]);
}
