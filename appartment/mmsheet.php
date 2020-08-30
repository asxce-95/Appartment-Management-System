<?php

include 'myconfig.php'; 


?>
<?php
require('fpdf181/fpdf.php');

$pdf = new FPDF('p' ,'mm','A3');

$pdf->AddPage();
$pdf->SetFont('Arial','',11);
$pdf->Cell(280 ,8,'AKRUTI APPARTMENT',0,1,'C');
$pdf->Cell(280, 8,'Mumbai',0,1,'C');
$pdf->Cell(280 ,5,'Monthly Maintenance Charges Received Statement For the Financial Year',0,1,'C');
$pdf->Cell(280 ,5,'Consolidated Month-wise Maintennance Charges received statements',0,1,'C');
$pdf->Cell(280 ,5,'',0,1,'C');


$pdf->Cell(18 ,5,'Flatno',1,0);
$pdf->Cell(28,5,'Owner name',1,0);
$pdf->Cell(18 ,5,'april',1,0);
$pdf->Cell(18 ,5,'may',1,0);
$pdf->Cell(18 ,5,'june',1,0);
$pdf->Cell(18 ,5,'july',1,0);
$pdf->Cell(18 ,5,'aug',1,0);
$pdf->Cell(18 ,5,'sept',1,0);
$pdf->Cell(18 ,5,'oct',1,0);
$pdf->Cell(18 ,5,'nov',1,0);
$pdf->Cell(18 ,5,'dec',1,0);
$pdf->Cell(18 ,5,'jan',1,0);
$pdf->Cell(18 ,5,'feb',1,0);
$pdf->Cell(18 ,5,'march',1,0);
$pdf->Cell(18 ,5,'Total',1,1);


$sql1="SELECT * FROM `maintenance` order by fname ASC";
$result1=$connect->query($sql1);
$temp="";
$t=0;
while($row=$result1->fetch_assoc())
{
  $k=$row['ownerID'];

  $sql2="SELECT * FROM `maintenance` WHERE ownerID='$k'";
  $result2=$connect->query($sql2);
  $april=0;
  $may=0;
  $june=0;
  $july=0;
  $aug=0;
  $sept=0;
  $oct=0;
  $nov=0;
  $dec=0;
  $jan=0;
  $feb=0;
  $mar=0;
$total=0;

while($row1=$result2->fetch_assoc())
{

  if($row1['month']=='April' && $row1['year']=='2019'){
    $april=$row1['amount'];

	$total=$total+$row1['amount'];
  }
  if($row1['month']=='May'  && $row1['year']=='2019'){
    $may=$row1['amount'];
	$total=$total+$row1['amount'];
	
  }if($row1['month']=='June'  && $row1['year']=='2019'){
    $june=$row1['amount'];
	$total=$total+$row1['amount'];

  }if($row1['month']=='July'  && $row1['year']=='2019'){
    $july=$row1['amount'];
	$total=$total+$row1['amount'];

  }if($row1['month']=='August'  && $row1['year']=='2019'){
    $aug=$row1['amount'];
	$total=$total+$row1['amount'];

  }if($row1['month']=='Sept'  && $row1['year']=='2019'){
    $sept=$row1['amount'];
	$total=$total+$row1['amount'];

  }if($row1['month']=='Oct'  && $row1['year']=='2019'){
    $oct=$row1['amount'];
	$total=$total+$row1['amount'];

  }if($row1['month']=='Nov'  && $row1['year']=='2019'){
    $nov=$row1['amount'];
	$total=$total+$row1['amount'];

  }if($row1['month']=='Dec'){
    $dec=$row1['amount'];
	$total=$total+$row1['amount'];

  }if($row1['month']=='Jan'){
    $jan=$row1['amount'];
	$total=$total+$row1['amount'];

  }if($row1['month']=='Feb'){
    $feb=$row1['amount'];
	$total=$total+$row1['amount'];

  }if($row1['month']=='March'){
    $mar=$row1['amount'];
	$total=$total+$row1['amount'];
  }

}
if($row['fname']!=$temp)
{
$pdf->Cell(18 ,5,$row['flatno'],1,0);
$pdf->Cell(28,5,$row['fname'],1,0);
$pdf->Cell(18 ,5,$april,1,0);
$pdf->Cell(18 ,5,$may,1,0);
$pdf->Cell(18 ,5,$june,1,0);
$pdf->Cell(18 ,5,$july,1,0);
$pdf->Cell(18 ,5,$aug,1,0);
$pdf->Cell(18 ,5,$sept,1,0);
$pdf->Cell(18 ,5,$oct,1,0);
$pdf->Cell(18 ,5,$nov,1,0);
$pdf->Cell(18 ,5,$dec,1,0);
$pdf->Cell(18 ,5,$jan,1,0);
$pdf->Cell(18 ,5,$feb,1,0);
$pdf->Cell(18 ,5,$mar,1,0);
$pdf->Cell(18 ,5,$total,1,1);
$temp=$row['fname'];

$t=$t+$total;
}
}
$pdf->Cell(18 ,5,'',1,0);
$pdf->Cell(28,5,'',1,0);
$pdf->Cell(18 ,5,'',1,0);
$pdf->Cell(18 ,5,'',1,0);
$pdf->Cell(18 ,5,'',1,0);
$pdf->Cell(18 ,5,'',1,0);
$pdf->Cell(18 ,5,'',1,0);
$pdf->Cell(18 ,5,'',1,0);
$pdf->Cell(18 ,5,'',1,0);
$pdf->Cell(18 ,5,'',1,0);
$pdf->Cell(18 ,5,'',1,0);
$pdf->Cell(18 ,5,'',1,0);
$pdf->Cell(18 ,5,'',1,0);
$pdf->Cell(18 ,5,'',1,0);
$pdf->Cell(18 ,5,$t,1,1);
ob_end_clean();
$pdf->Output();
?>
