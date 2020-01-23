<?php
require_once('tcpdf/tcpdf_import.php');

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetFont('cid0jp','', 18); 
$pdf->AddPage();
$style = array(
    'position' => '',
    'align' => 'C',
    'stretch' => false,
    'fitwidth' => true,
    'cellfitalign' => '',
    'border' => true,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);
$pdf->write1DBarcode('123456', 'C93', '', '', '', 18, 0.4, $style, 'N');
/*---------------- Your Code Start -----------------*/
$name = $_POST['name'];
$tel = $_POST['tel'];
$mail = $_POST['email'];
$address = $_POST['address'];
$rating = $_POST['rating'];
$wanted = $_POST['wanted'];
$html = <<<EOF
		<style type="text/css">
          table,th,td { border:1px solid black; }
		</style>
<table>
<tr>
	<td>Name</td>
	<td>$name</td>
	<td>電話：</td>
	<td colspan="2">$tel</td>
	<td>Email</td>
	<td colspan = "2">$mail</td>
</tr>
<tr>
	<td>Rating</td>
	<td>$rating</td>
	<td>地址：</td>
	<td colspan = "5">$address</td>
</tr>
<tr>
	<td>想要：</td>
	<td colspan = "7">$wanted</td>
</tr>

</table>
EOF;
/*---------------- Your Code End -------------------*/

$pdf->writeHTML($html);
$pdf->lastPage();
$pdf->Output('order.pdf', 'I');

