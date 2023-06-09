<?php if (!defined('BASEPATH')) exit('No direct script access allowed');
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Extend the TCPDF class to create custom Header and Footer
class MYPDF extends TCPDF
{

	function __construct()
	{
		parent::__construct();
	}

	//Page header
	public function Header()
	{
		// Logo
		$image_file = 'assets/images/logo_ipctpk.png';
		$this->Image($image_file, 155, 10, 40, '', 'png', '', 'T', false, 300, '', false, false, 0, false, false, false);

		$bMargin = $this->getBreakMargin();
		// get current auto-page-break mode
		$auto_page_break = $this->AutoPageBreak;
		// disable auto-page-break
		$this->SetAutoPageBreak(false, 0);
		// restore auto-page-break status
		$this->SetAutoPageBreak($auto_page_break, $bMargin);
		// set the starting point for the page content
		$this->setPageMark();
	}

	// Page footer
	public function Footer()
	{
		$this->SetFont('times', 'B', 8);
		$this->SetY(-60);
		$this->SetX(0);
		$this->Cell(200, 100, '', 0, false, 'R', 0, '', 0, false, 'T', 'M');
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
$pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Andre');
$pdf->SetTitle('Laporan Penjualan');
$pdf->SetSubject('KD PENGETAHUAN');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

// set header and footer fonts
$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

// set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

// set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

// set some language-dependent strings (optional)
if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
	require_once(dirname(__FILE__) . '/lang/eng.php');
	$pdf->setLanguageArray($l);
}

// ---------------------------------------------------------

// set font
// $pdf->SetFont('times', 'BI', 12);
$pdf->SetFont('times');

// add a page
// $pdf->AddPage();
$pdf->AddPage('L', 'F4');

ob_start();
// print_r($data);die();

$header = '<table>';
$header .= '
		<tr style="text-align: center;">
			<th style="text-align: center;"><h3><b>ARKATAMA STORE</b></h3></th>
		</tr>
		';

$header .= '</table>';
$pdf->WriteHTMLCell($w = '', $h = '', $x = 20, $y = 10, $header, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);

$table_title = '<table>';
$table_title .= '
		<tr>
			<th style="padding: 0px; text-align: center; font-size: 16px;">
				<b>Laporan Penjualan<br> ' . $tgl_awal . ' s/d ' . $tgl_akhir . '</b>
			</th>
		</tr>
		<tr>
			<th style="padding:150px; text-align: center;">
			</th>
		</tr>
		';

$table_title .= '</table>';
$pdf->WriteHTMLCell($w = '', $h = '', $x = 20, $y = 20, $table_title, $border = 0, $ln = 1, $fill = 0, $reseth = true, $align = '', $autopadding = true);


$tabel = '<table style="padding:3px;">';
$tabel .= '
		<tr>
			<th style="border:1px solid #000; width:50px;"><b>No. </b></th>
			<th style="border:1px solid #000; width:170px;"><b>Tgl. Transaksi</b></th>
			<th style="border:1px solid #000; width:150px;"><b>No. Transaksi</b></th>
			<th style="border:1px solid #000; width:100px;"><b>Ekspedisi</b></th>
			<th style="border:1px solid #000; width:250px;"><b>Paket</b></th>
			<th style="border:1px solid #000; width:200px;"><b>Total Transaksi</b></th>
			<th style="border:1px solid #000; width:150px;"><b>Status</b></th>
		</tr>';

$no = 1;
$sum_total = 0;
foreach ($data_penjualan as $row) {
	$sum_total = $sum_total + $row->total_bayar;
	$tabel .= '
						<tr>
							<th style="border:1px solid #000; text-align: center;">' . $no . '</th>
							<th style="border:1px solid #000; text-align: center;">' . $row->tgl_pemesanan . '</th>
							<th style="border:1px solid #000; text-align: center;">' . $row->no_order . '</th>
							<th style="border:1px solid #000; text-align: center;">' . $row->kurir . '</th>
							<th style="border:1px solid #000; text-align: center;">' . $row->jenis_ongkir . '</th>
              				<th style="border:1px solid #000; text-align: right;">Rp ' . number_format($row->total_bayar, 0, ',', '.') . '</th>
							<th style="border:1px solid #000; text-align: right;">' . $row->status . '</th>
						</tr>
					';
	$no++;
}

$tabel .= '
			<tr>
				<th style="border:1px solid #000; text-align: center;" colspan="5"><b> Total </b></th>
				<th style="border:1px solid #000; text-align: right;"><b> Rp ' . number_format($sum_total, 0, ',', '.') . ' </b></th>
				<th style="border:1px solid #000; text-align: center;"></th>
			</tr>
		';

$tabel .= '</table>';
$pdf->WriteHTMLCell(0, 0, '', '40', $tabel, 0, 1, 0, true, 'C', true);



$pdf->lastPage();

// ---------------------------------------------------------
ob_clean();

$pdf->Output('Laporan Penjualan.pdf', 'I');
//============================================================+
// END OF FILE
//============================================================+
