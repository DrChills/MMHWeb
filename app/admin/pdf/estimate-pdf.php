<?php
// GET CUST ORDER VARIABLES
$strSQL = "SELECT * FROM custorder WHERE orderref='$orderref'";
$rs = mysql_query($strSQL);
while($row = mysql_fetch_array($rs)) {
$email = $row['email'];
$subtotal = $row['subtotal'];
$eventdate = $row['eventdate'];
$postcode = $row["postcode"];
$username = $row['username'];
$vat = $row['vat'];
$total = $row['total'];
$deposit = 0.2;
$deposittotal = ($total * $deposit); 
$dateofsub = $row['estimatedate']; 
}
$pound = utf8_decode("£");
define('FPDF_FONTPATH', 'pdf/fpdf17/font/');
require_once 'pdf/fpdf17/fpdf.php';
$pdf = new FPDF('P', 'cm', 'A4');
$pdf->open();
$pdf->AddPage();
$pdf->SetMargins(1,1,1,1);
$pdf->SetFont('helvetica',  '', 16);
$pdf->SetTextColor(100,100,100);
$pdf->Image('http://midlandsmarqueehire.com/assets/img/emailimages/midlands-marquee-hire-logo.png', 17.5, 1.3, 2.8, 0.5);
$pdf->Cell(0, 2, 'Estimate',0, 0, 'L');
$pdf->Ln(0.7);
$pdf->SetFont('helvetica',  '', 10);
$pdf->SetTextColor(150,150,150);
$pdf->Cell(0, 2, 'Roden House',0, 0, 'R');
$pdf->Ln(0.5);
$pdf->Cell(0, 2, 'Roden Street',0, 0, 'R');
$pdf->Ln(0.5);
$pdf->Cell(0, 2, 'Nottingham',0, 0, 'R');
$pdf->Ln(0.5);
$pdf->Cell(0, 2, 'NG3 1JH',0, 0, 'R');
$pdf->Ln(0.5);
$pdf->Cell(0, 2, 'Tel: 07572018955',0, 0, 'R');
$pdf->Ln(0.5);
$pdf->Cell(0, 2, 'Email: info@midlandsmarqueehire.com',0, 0, 'R');
$pdf->Ln(0.5);
$pdf->Cell(0, 2, 'Date of estimate:' . date("d/m/y") ,0, 0, 'R');
$pdf->Ln(0.5);
$pdf->SetFont('helvetica',  '', 11);
$pdf->SetTextColor(150,150,150);
$pdf->Cell(2, 2, 'Name: ' ,0, 0, 'L');
$pdf->SetTextColor(30,30,30);
$pdf->Cell(3, 2,  $username ,0, 0, 'L');
$pdf->Ln(0.6);
$pdf->SetTextColor(150,150,150);
$pdf->Cell(2, 2, 'Email: ' ,0, 0, 'L');
$pdf->SetTextColor(30,30,30);
$pdf->Cell(3, 2,  $email ,0, 0, 'L');
$pdf->Ln(0.6);
$pdf->SetTextColor(150,150,150);
$pdf->Cell(2, 2, 'Hire Date:',0, 0, 'L');
$pdf->SetTextColor(30,30,30);
$pdf->Cell(3, 2,   $eventdate ,0, 0, 'L');
$pdf->Ln(0.6);
$pdf->SetTextColor(150,150,150);
$pdf->Cell(2, 2, 'Postcode:' ,0, 0, 'L');
$pdf->SetTextColor(30,30,30);
$pdf->Cell(3, 2,  $postcode,0, 0, 'L');
$pdf->Ln(0.6);
$pdf->Ln(1);
$header = array('Item', 'Cost', 'QTY', 'Total');
$data = array();
$strSQL = "SELECT * FROM orderdetails WHERE orderref='$orderref' AND qty AND visible='y'";
$rs = mysql_query($strSQL);
while($row = mysql_fetch_array($rs)) {
  array_push($data,array ($row['product'], iconv("UTF-8", "ISO-8859-1", "£").$row['hireprice'], $row['qty'], iconv("UTF-8", "ISO-8859-1", "£").$row['total']));
};
$pdf->SetFont('helvetica',  '', 10);
$pdf->SetTextColor(30,30,30);
$pdf->SetFillColor(300,300,300);
$pdf->SetTextColor(200);
$pdf->SetDrawColor(200,200,200);
$pdf->SetLineWidth(0.001);
$w=array(10,3,3,3);
for($i=0;$i<count($header);$i++)
$pdf->Cell($w[$i],0.6,$header[$i],1,0,'C',true);
$pdf->Ln();
$pdf->SetFillColor(250,250,250);
$pdf->SetTextColor(0);
$pdf->SetFont('');
//Data
$fill=false;
foreach($data as $row){
if ($row[2] != '') {
$pdf->Cell($w[0],0.5,$row[0],'LR',0,'L',$fill);
$pdf->Cell($w[1],0.5,$row[1],'LR',0,'L',$fill);
$pdf->Cell($w[2],0.5,$row[2],'LR',0,'L',$fill);
$pdf->Cell($w[3],0.5,$row[3],'LR',0,'L',$fill);
$pdf->Ln();
$fill=!$fill;
}
}
$pdf->Cell(array_sum($w),0,'','T');
$pdf->SetFont('helvetica',  '', 12);
$pdf->SetTextColor(30,30,30);
$pdf->Ln(0.5);
$pdf->Cell(0, 2, 'Subtotal: ' . $pound . $subtotal,0, 0, 'R');
$pdf->Ln(0.7);
$pdf->Cell(0, 2, 'VAT: ' . $pound . $vat,0, 0, 'R');
$pdf->Ln(0.7);
$pdf->SetFont('helvetica',  '', 14);
$pdf->SetTextColor(30,30,30);
$pdf->Cell(0, 2, 'Total: ' . $pound . $total,0, 0, 'R');
$pdf->Ln(1);
$pdf->SetFont('helvetica',  '', 10);
$pdf->SetTextColor(30,30,30);
$pdf->Cell(0, 2, 'Please remember we also offer a price guarantee:',0, 0, 'C');
$pdf->Ln(0.5);
$pdf->Cell(0, 2, 'We will beat any written quotation for a same-size marquee by 10%.',0, 0, 'C');
$pdf->Ln(0.7);
$pdf->SetDrawColor(188,188,188);
$pdf->Line(50, 45, 210-50, 45); // 50mm from each edge
$pdf->Ln(0.7);
$pdf->Cell(0, 2, 'Delivery to site, equipment set up and removal are included in quotation as standard.',0, 0, 'C');
$pdf->Ln(0.7);
$pdf->Cell(0, 2, 'Quotations are valid for 30 days from date. A 10% deposit is required to secure bookings.',0, 0, 'C');
$pdf->Ln(0.7);
$pdf->SetDrawColor(188,188,188);
$pdf->Line(50, 45, 210-50, 45); // 50mm from each edge
$pdf->Ln(0.7);
$pdf->Cell(0, 2, 'Thank you for contacting Midlands Marquee Hire',0, 0, 'C');
$pdf->Output('customer-estimates/MidlandsMarqueeHire-Estimate-' . $user . '-' . $dateofsub . '.pdf','F');
//$pdf->Output();
?>