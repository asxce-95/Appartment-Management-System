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
$pdf->Cell(190 ,5,'',0,1,'C');
$pdf->Cell(190 ,5,'',0,1,'C');
$pdf->Cell(190 ,5,'',0,1,'C');


$pdf->Cell(20 ,5,'TranID',1,0);
$pdf->Cell(55,5,'Date',1,0);
$pdf->Cell(55 ,5,'OwnerID ',1,0);
$pdf->Cell(20 ,5,'Amount',1,0);
$pdf->Cell(20 ,5,'Description',1,0);
$pdf->Cell(20 ,5,'Status',1,1);

$sql1="SELECT * FROM `maintenance` WHERE tid='".$_GET['tid']."'";
$result1=$connect->query($sql1);
while($row=$result1->fetch_assoc()){

  $pdf->Cell(20 ,5,$row['tid'],1,0);
  $pdf->Cell(55,5,$row['adate'],1,0);
  $pdf->Cell(55 ,5,$row['ownerID'],1,0);
  $pdf->Cell(20 ,5,$row['amt'],1,0);
  $pdf->Cell(20 ,5,$row['dd'],1,0);
  $pdf->Cell(20 ,5,$row['status'],1,1);
}


$filename="Due.pdf";
$pdf->Output($filename,'F');

	
	require 'PHPMailer/PHPMailerAutoload.php';
				//Create a new PHPMailer instance
				$mail = new PHPMailer;
				//Tell PHPMailer to use SMTP
				$mail->isSMTP();
				//Enable SMTP debugging
				// 0 = off (for production use)
				// 1 = client messages
				// 2 = client and server messages
				$mail->SMTPDebug = 0;
				//Ask for HTML-friendly debug output
				//$mail->Debugoutput = 'html';
				//Set the hostname of the mail server
				$mail->Host = 'smtp.gmail.com';
				$mail->Port = 465;
				$mail->SMTPSecure = 'ssl';
				$mail->SMTPAuth = true;
				$mail->Username = "amsdonotreply1@gmail.com";
				$mail->Password = "Nutter@Tools";
				$mail->setFrom('amsdonotreply1@gmail.com', 'Akruti');
				$mail->addReplyTo('amsdonotreply1@gmail.com', 'AMS');
				$mail->addAddress($_GET['mail1'], '');
				$mail->Subject = 'Akruti: You have new Notice';
				$msgg="PFA, the required letter";
				$mail->msgHTML($msgg);
				$mail->addAttachment('Due.pdf');

				if (!$mail->send()) {
					echo "Mailer Error: " . $mail->ErrorInfo;
				} else {
						redirect('adddue.php');
				   
				}
	
?>
