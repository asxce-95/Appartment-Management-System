<!DOCTYPE html>
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
if(!(isset($_SESSION['login']) and $_SESSION['login']!=''))
{
	redirect("home.php") ;
}

$email=$_SESSION['login'];

	$sql1="SELECT * FROM ownerDetails WHERE email='$email'";
		
    $result1=$connect->query($sql1);
	
    
	$row=$result1->fetch_assoc();



?>
<html lang="en">
  <head>
    <title>Akruti | Register</title>
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
          	<h2 class="text-center">Register Owner details</h2>
			
			<?php 
				if($row['type']=="secretary"){
			?>
            <form action="register.php" method="post" class="bg-light p-5 contact-form">
              <div class="form-group">
                <input id="doorNo" class="form-control" placeholder="Door Number" pattern="[0-9][-][NSWE][-][0-9]{2}[-][0-9]{3}[/][0-9]{2}" name="doorNo" type="text" class="validate" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="email" type="email" class="validate" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" name="email"  placeholder="Your Email" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="mob" pattern="[987][0-9]{9}" name="mob" type="text" class="validate" placeholder="Mobile" required>
              </div>
          
              <div class="form-group">
                <input type="submit" value="Submit"  type="submit" id="button"  name="reg" class="btn btn-primary py-3 px-5">
              </div>
            </form>
			<?php 
				}
				else{
						 echo "<h5>You Are Not Authorized</h5>";
				}
			?>
			
 <?php      

if(isset($_POST['reg']))
{
	
  $doorNo = $_POST['doorNo'];
  $email = $_POST['email'];
  $mob = $_POST['mob'];
  
  $emailr=explode('@',$email);
  
  $sql="INSERT INTO `ownerdetails` (`ownerID`, `mobile`, `email`,`type`,`status`) VALUES ('".$emailr[0]."', '$mob', '$email','owner','Pending')";
  $result=$connect->query($sql);
    $sql="INSERT INTO `flat` (`doorNo`, `ownerID`) VALUES ('$doorNo','".$emailr[0]."')";
  $result=$connect->query($sql);
  
  $m="Owner Registered";
	echo "<script language='javascript'> alert('$m'); </script>";
	redirect("home.php");
 /* if($num==0)
  {
    ?> <h5>Error<h5><?php 
  }
  else
  {
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