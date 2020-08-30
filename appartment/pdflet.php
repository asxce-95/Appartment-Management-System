
<?php

include 'myconfig.php'; 
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

session_start();
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

$filename="letter.pdf";
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
				$mail->addAddress($_GET['mail'], '');
				$mail->Subject = 'Akruti: You have new Notice';
				$msgg="PFA, the required letter";
				$mail->msgHTML($msgg);
				$mail->addAttachment('letter.pdf');

				if (!$mail->send()) {
					echo "Mailer Error: " . $mail->ErrorInfo;
				} else {
						redirect('applett.php');
				   
				}
	
?>
