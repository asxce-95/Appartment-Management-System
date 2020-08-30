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

$pdf = new FPDF('p' ,'mm','A4');

$pdf->AddPage();
$pdf->SetFont('Arial','',11);
$pdf->Cell(190 ,8,'AKRUTI APPARTMENT',0,1,'C');
$pdf->Cell(190, 8,'Mumbai',0,1,'C');
$pdf->Cell(190 ,4,'',0,1,'C');
$pdf->Cell(190 ,4,'',0,1,'C');
$pdf->Cell(190 ,4,'',0,1,'C');

$sql1="SELECT * from letter WHERE lid='".$_GET['lid']."'";
$result1=$connect->query($sql1);
$row=mysqli_fetch_assoc($result1);

$pdf->Cell(65 ,8,'RefNo:   '.$row['referenceno'],0);
$pdf->Cell(85,8,$row['datetoday'],0,1,'R');
$pdf->Cell(190 ,4,'',0,1,'C');
$pdf->Cell(190 ,4,'',0,1,'C');
$pdf->Cell(190 ,4,'',0,1,'C');
$pdf->Cell(190 ,4,'',0,1,'C');

$pdf->Cell(190 ,4,'To,',0,1);
$pdf->Cell(190 ,4,$row['ownername'],0,1);
$pdf->Cell(190 ,4,$row['flatno'],0,1);
$pdf->Cell(190 ,8,'AKRUTI APPARTMENT',0,1);
$pdf->Cell(190, 8,'Mumbai',0,1);

$pdf->Cell(190 ,4,'',0,1,'C');
$pdf->Cell(190 ,4,'',0,1,'C');

$pdf->Cell(10 ,4,'Sub:',0,0);
$pdf->Cell(180 ,4,$row['subject'],0,1);


$pdf->Cell(190 ,4,'',0,1,'C');
$pdf->Cell(190 ,4,'',0,1,'C');

$pdf->Cell(190 ,4,'Dear Sir/Madam,',0,1);


$pdf->MultiCell(190 ,5,'        '.$row['letter'],0,1);

$pdf->Cell(190 ,4,'Kindly acknowledge the same. Thanking You.',0,1);
$pdf->Cell(190 ,4,'',0,1,'C');

$pdf->Cell(190 ,4,'Yours sincerely,',0,1);

$pdf->Cell(190 ,4,'',0,1,'C');
$pdf->Cell(190 ,4,'',0,1,'C');

$pdf->Cell(190 ,4,'Managing Committee',0,1);



$pdf->Output();
?>
