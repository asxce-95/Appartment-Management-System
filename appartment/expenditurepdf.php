<?php
include 'myconfig.php'; 
session_start();
function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}

if(!(isset($_SESSION['login']) and $_SESSION['login']!=''))
{
	redirect("index.php");
}

$email=$_SESSION['login'];

	$sql1="SELECT * FROM ownerDetails WHERE email='$email'";
		
    $result1=$connect->query($sql1);
	
    
	$row=$result1->fetch_assoc();
 
?>
<?php
require('fpdf181/fpdf.php');

$pdf = new FPDF('p' ,'mm','A3');

$pdf->AddPage();
$pdf->SetFont('Arial','',11);
$pdf->Cell(270 ,8,'AKRUTI APPARTMENT',1,1,'C');
$pdf->Cell(270 ,4,'',1,1,'C');
$pdf->Cell(270, 8,'Receipts and Payments Account for the month of November',1,1,'C');
$pdf->Cell(270 ,4,'',1,1,'C');

$pdf->Cell(75 ,8,'Receipts',1,0,'C');
$pdf->Cell(30 ,8,'Amount',1,0,'C');
$pdf->Cell(30 ,8,'Amount',1,0,'C');
$pdf->Cell(75 ,8,'Payments',1,0,'C');
$pdf->Cell(30 ,8,'Amount',1,0,'C');
$pdf->Cell(30 ,8,'Amount',1,1,'C');

$pdf->Cell(270 ,4,'',1,1,'C');


$sql1="SELECT * from expenditure";
$result1=$connect->query($sql1);
$k=0;
$totalpay=0;
while($row=mysqli_fetch_assoc($result1))
{
  $totalpay=$totalpay+$row['payment'];
  if($k==0){
  $pdf->Cell(75 ,8,'Opening Balance:',1,0);
  $pdf->Cell(30 ,8,'',1,0,'R');
  $pdf->Cell(30 ,8,'',1,0,'R');
  $pdf->Cell(75 ,8,$row['name'],1,0);
  $pdf->Cell(30 ,8,$row['payment'],1,0,'R');
  $pdf->Cell(30 ,8,'',1,1,'R');
}
elseif($k==1){
$pdf->Cell(75 ,8,'cash in hand:main',1,0);
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(75 ,8,$row['name'],1,0);
$pdf->Cell(30 ,8,$row['payment'],1,0,'R');
$pdf->Cell(30 ,8,'',1,1,'R');
}
elseif($k==2){
$pdf->Cell(75 ,8,'vijaya bank fixed deposit:',1,0);
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(75 ,8,$row['name'],1,0);
$pdf->Cell(30 ,8,$row['payment'],1,0,'R');
$pdf->Cell(30 ,8,'',1,1,'R');
}
elseif($k==3){
$pdf->Cell(75 ,8,'vijayabank:SB 15955',1,0);
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(75 ,8,$row['name'],1,0);
$pdf->Cell(30 ,8,$row['payment'],1,0,'R');
$pdf->Cell(30 ,8,'',1,1,'R');
}
elseif($k==4){
$pdf->Cell(75 ,8,'Building repair instalments',1,0);
$pdf->Cell(30 ,8,'435673',1,0,'R');
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(75 ,8,$row['name'],1,0);
$pdf->Cell(30 ,8,$row['payment'],1,0,'R');
$pdf->Cell(30 ,8,'',1,1,'R');
}elseif($k==5){
$pdf->Cell(75 ,8,'maintainance charges',1,0);
$pdf->Cell(30 ,8,'270876',1,0,'R');
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(75 ,8,$row['name'],1,0);
$pdf->Cell(30 ,8,$row['payment'],1,0,'R');
$pdf->Cell(30 ,8,'',1,1,'R');
}
else{
  $pdf->Cell(75 ,8,'',1,0);
  $pdf->Cell(30 ,8,'',1,0,'R');
  $pdf->Cell(30 ,8,'',1,0,'R');
  $pdf->Cell(75 ,8,$row['name'],1,0);
  $pdf->Cell(30 ,8,$row['payment'],1,0,'R');
  $pdf->Cell(30 ,8,'',1,1,'R');
}
$k=$k+1;
}
$pdf->Cell(75 ,8,'',1,0);
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(75 ,8,'',1,0);
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(30 ,8,$totalpay,1,1,'R');

$pdf->Cell(75 ,8,'',1,0);
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(75 ,8,'closing balence',1,0);
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(30 ,8,'',1,1,'R');

$pdf->Cell(75 ,8,'',1,0);
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(75 ,8,'cash in hand:main',1,0);
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(30 ,8,'',1,1,'R');

$pdf->Cell(75 ,8,'',1,0);
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(75 ,8,'vijaya bank fixed deposit:',1,0);
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(30 ,8,'',1,1,'R');

$pdf->Cell(75 ,8,'',1,0);
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(75 ,8,'vijayabank:SB 15955',1,0);
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(30 ,8,'',1,1,'R');

$pdf->Cell(75 ,8,'Total',1,0);
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(75 ,8,'Total',1,0);
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(30 ,8,'',1,1,'R');

$pdf->Cell(270 ,4,'',1,1,'C');

$pdf->Cell(270, 8,'Income and expenditure account for mounth of',1,1,'C');
$pdf->Cell(270 ,4,'',1,1,'C');

$pdf->Cell(75 ,8,'Expenditure',1,0,'C');
$pdf->Cell(30 ,8,'Amount',1,0,'C');
$pdf->Cell(30 ,8,'Amount',1,0,'C');
$pdf->Cell(75 ,8,'Income',1,0,'C');
$pdf->Cell(30 ,8,'Amount',1,0,'C');
$pdf->Cell(30 ,8,'Amount',1,1,'C');

$pdf->Cell(270 ,4,'',1,1,'C');

$sql1="SELECT * from expenditure WHERE status='1'";
$result1=$connect->query($sql1);
$l=0;
$totalp=0;
while($row=mysqli_fetch_assoc($result1))
{
  $totalp=$totalp+$row['payment'];
if($l==0){
  $pdf->Cell(75 ,8,$row['name'],1,0);
  $pdf->Cell(30 ,8,$row['payment'],1,0,'R');
  $pdf->Cell(30 ,8,'',1,0,'R');
  $pdf->Cell(75 ,8,'maintainance charge',1,0);
  $pdf->Cell(30 ,8,'234562',1,0,'R');
  $pdf->Cell(30 ,8,'',1,1,'R');
}
elseif($l==1){
  $pdf->Cell(75 ,8,$row['name'],1,0);
  $pdf->Cell(30 ,8,$row['payment'],1,0,'R');
  $pdf->Cell(30 ,8,'',1,0,'R');
  $pdf->Cell(75 ,8,'Excess of exp over income',1,0);
  $pdf->Cell(30 ,8,'234562',1,0,'R');
  $pdf->Cell(30 ,8,'',1,1,'R');
}
else{
  $pdf->Cell(75 ,8,$row['name'],1,0);
  $pdf->Cell(30 ,8,$row['payment'],1,0,'R');
  $pdf->Cell(30 ,8,'',1,0,'R');
  $pdf->Cell(75 ,8,'',1,0);
  $pdf->Cell(30 ,8,'',1,0,'R');
  $pdf->Cell(30 ,8,'',1,1,'R');

}
$l=$l+1;
}
$pdf->Cell(75 ,8,'',1,0);
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(30 ,8,$totalp,1,0,'R');
$pdf->Cell(75 ,8,'',1,0);
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(30 ,8,'',1,1,'R');

$pdf->Cell(75 ,8,'Total',1,0);
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(75 ,8,'Total',1,0);
$pdf->Cell(30 ,8,'',1,0,'R');
$pdf->Cell(30 ,8,'',1,1,'R');

$pdf->Output();
?>
