<!DOCTYPE html>
<?php include 'myconfig.php'; 
session_start();
if(!(isset($_SESSION['login']) and $_SESSION['login']!=''))
{
	header("Location: index.php");
}

$email=$_SESSION['login'];

	$sql1="SELECT * FROM ownerDetails WHERE email='$email'";
		
    $result1=$connect->query($sql1);
	
    
	$row=$result1->fetch_assoc();

?>
<html lang="en">
  <head>
    <title>Akruti | Payments</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,600,700,800,900&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
	  <script>

     function copy()
     {

var row = '<div class="input-group mb-3" id="tit"> <div class="input-group-prepend"> <label class="input-group-text" for="inputGroupSelect01">Payment Period </label> </div> <select class="custom-select"  name="period" id="inputGroupSelect01" > <option value="1">Monthly</option> <option value="3">Quaterly : 3 Months</option> <option value="6">Half Year : 6 Months</option> <option value="12">Anually : 12 Months</option></select> </div>';

         $("#t").append(row);

}
 function copy1()
     {


         $("#tit").remove();
         document.getElementById('am').value='10000';

}


    </script>
  </head>
  <body>
    
   <!---NAV------> 
<?php
include 'nav.inc.php';
?>
    <!-- END nav -->

		<section class="ftco-section contact-section">
      <div class="container">


        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-8 mb-md-5">
          	<h2 class="text-center"><br>Pay</h2>


             <form action="newrecordpayment.php" method="post" enctype="multipart/form-data" class="bg-light p-5 contact-form" id="treasurer">
            <div class="form-group" id="t">
<div class="input-group mb-3" >
<div class="input-group-prepend">
<label class="input-group-text" for="inputGroupSelect01">Payment Type</label>
</div>
<select class="custom-select"  name="ptype" id="inputGroupSelect01" >
<option value="OMF" onClick="copy1();">One time society membership fee</option>
<option value="MMC" id="che" onClick="copy();">Monthly maintenance charges (MMC)</option>
<option value="OSD" onClick="copy1();">one time society deposit</option>

<!---option value="MMC" >Monthly maintenance charges (MMC)</option>
<option value="OMF" >One time society membership fee</option>
<option value="OSD">One time society deposit</option--->
</select>
              </div>
          </div>
            <div class="form-group" id="t">
<div class="input-group mb-3" >
<div class="input-group-prepend">
<label class="input-group-text" for="inputGroupSelect01">Select Owner</label>
</div>

<select class="custom-select"  name="oid" id="inputGroupSelect01" >

<option value="<?php echo $row['ownerID'] ?>"><?php echo $row['fname']." ".$row['lname'] ?></option>

							

</select>
              </div>
          </div>
 <div class="form-group">
                <input type="submit" value="Submit"  type="submit" id="button"  name="recpay" class="btn btn-primary py-3 px-5">
              </div>
              </div>
         
             
            </form>


			
 <?php   
if(isset($_POST['submit2']))
{
  $cowner = $_POST['ownerID'];
  $cid = $_POST['cid'];
  $status = $_POST['status'];
  $mob = $_POST['mob'];
  $cd= $_POST['cd'];
  $ctype= $_POST['ctype'];
  $udate=date('d-m-Y H:i:s a');
  //$sql="INSERT INTO `complaint`(`ctype`,`cdate`, `cd`, `ownerID`,`mob`,`status`) VALUES ('$ctype','$cdate','$cd','$cowner','$mob','In Progress')";
  $sql="UPDATE `complaint` SET `udate`='$udate',`ctype`='$ctype',`cd`='$cd',`ownerID`='$cowner',`mob`='$mob',`status`='$status' WHERE cid='$cid'";
 // echo $sql;
  $result=$connect->query($sql);
  if($result==TRUE)
  {
    $m="Complaint Updated";
	echo "<script language='javascript'> alert('$m'); </script>";
  }
}  

if(isset($_POST['submit']))
{
	
  $cowner = $_POST['ownerID'];
  $mob = $_POST['mob'];
  $cd= $_POST['cd'];
  $ctype= $_POST['ctype'];
  $cdate=date('d-m-Y H:i:s a');;
  $sql="INSERT INTO `complaint`(`ctype`,`cdate`, `cd`, `ownerID`,`mob`,`status`) VALUES ('$ctype','$cdate','$cd','$cowner','$mob','In Progress')";
  $result=$connect->query($sql);
  if($result==TRUE)
  {
    $m="Complaint Registered";
	echo "<script language='javascript'> alert('$m'); </script>";
  }
// else
 /* {
   while($row=$result->fetch_assoc())
    {
        $n=$row['ownerID'];
		
        $sql1="SELECT * FROM ownerDetails WHERE ownerID='$n' AND mobile='$mob' AND email='$email'";
		
        $result1=$connect->query($sql1);
        $num1= $result1->num_rows;
        if($num1==0)
        {
           ?> <h5>Error<h5><?php
        }
        else
        {
					
			$ottp = rand(11111,99999);
			//date_default_timezone_set('Etc/UTC');
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
				$mail->addAddress($email, '');
				$mail->Subject = 'Check your OTP';
				$msgg="Your otp is ".$ottp.".";
				$mail->msgHTML($msgg);

				if (!$mail->send()) {
					echo "Mailer Error: " . $mail->ErrorInfo;
				} else {
						session_start();
						$_SESSION['myotp']=$ottp;
						$_SESSION['mail']=$email;
						header("Location: verification.php");
				   
				}
         
        }
  }
}*/
}

 
?>
          
          </div>
        </div>
     
      </div>
    </section>

   
   
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
    
  </body>
</html>