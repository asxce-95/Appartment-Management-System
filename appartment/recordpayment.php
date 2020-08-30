<!DOCTYPE html>
<?php include 'myconfig.php'; 
session_start();
function montht($mon)
{
    switch ($mon) {
    case 'Jan':
        return 1;
    case 'Feb':
        return 2;
    case 'March':
        return 3;
    case 'April':
        return 4;
    case 'May':
        return 5;
    case 'June':
        return 6;
    case 'July':
        return 7;
    case 'August':
        return 8;
    case 'Sept':
        return 9;
    case 'Oct':
        return 10;
    case 'Nov':
        return 11;
    case 'Dec':
        return 12;
    default:
	} 
}
function monthW($mon)
{
    switch ($mon) {
    case 1:
		return 'Jan';
    case 2:
        return 'Feb';
    case 3:
        return 'March';
    case 4:
        return 'April';
    case 5:
        return 'May';
    case 6:
        return 'June';
    case 7:
        return 'July';
    case 8:
        return 'August';
    case 9:
        return 'Sept';
    case 10:
        return 'Oct';
    case 11:
        return 'Nov';
    case 12:
        return 'Dec';
    default:
	} 
}
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

if(!(isset($_POST['recpay'])) )
{
	redirect("pay.php");
}



?>
<html lang="en">
  <head>
    <title>Akruti | payment</title>
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

var row = '<div class="input-group mb-3" id="tit"> <div class="input-group-prepend"> <label class="input-group-text" for="inputGroupSelect01">Payment Month </label> </div> <select class="custom-select"  name="ctype" id="inputGroupSelect01" > <option value="Jan">Jan</option> <option value="Feb">Feb</option> <option value="March">March</option> <option value="April">April</option> <option value="May">May</option> <option value="June">June</option> <option value="July">July</option> <option value="August">August</option> <option value="Sept">Sept</option> <option value="Oct">Oct</option> <option value="Nov">Nov</option> <option value="Dec">Dec</option></select> </div>';

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
          	<h2 class="text-center"><br>Please Fill required details</h2>
<?php	
//---------------PHP------------------	
$oid=$_POST['oid'];	
$ptype = $_POST['ptype'];
$sql2="SELECT * FROM ownerdetails WHERE ownerID='$oid'";
							  $result2=$connect->query($sql2);
							  $row2=$result2->fetch_assoc();
if($ptype=='MMC'){
	
	//$month=$_POST['month'];
	
	
$sql2="SELECT  * FROM maintenance WHERE ownerID='$oid' ORDER BY tid DESC";
$period=$_POST['period'];
					if($period==1){
							  $result3=$connect->query($sql2);
							  $num3= $result3->num_rows;
							  //echo $sql2;
							  
							  if($num3==0){
								  $rem=1;
								  $yrrr=Date('Y');
								  $curr_month=date('m');
								  $month=monthW($curr_month-1);
								$amt=1000;
							  }
							  else{
								  $curr_month=date('m');
								  $curr_year=date('Y');
								  $row3=$result3->fetch_assoc();
								  $yrrr=$row3['year'];
								  if($row3['year']>$curr_year)
								  {
										$m="Already Paid the Maintence";
										echo "<script language='javascript'> alert('$m'); </script>";
										redirect("pay.php");
								  }
								  else if(montht($row3['month'])>=$curr_month)
								  {
									$m="Already Paid the Maintence";
										echo "<script language='javascript'> alert('$m'); </script>";
										redirect("pay.php");
								    
								  }
								 
								  //echo $row3['year'];
								  if($row3['year']<$curr_year){
									  
								  //echo $row3['year'];
									  $month=$row3['month'];
									  
									  $rem=$curr_month-montht($month) + 12 ;
									  $amt=1000*$rem + 10*($rem-1);
								  }
								  else{
									  
									  $month=$row3['month'];
									  
									  $rem=$curr_month-montht($month);
									  $amt=1000*$rem + 10*($rem-1);
								  }
								  
								 
							  }
							  
							  
					
	
	?>
	
	  <form action="record.php" method="post" enctype="multipart/form-data" class="bg-light p-5 contact-form" id="treasurer">
            
              <div class="form-group">
                <input class="form-control" placeholder="Flat Number" pattern="[0-9]{2}" value="<?php echo $row2['flatno'] ?>" name="flatno" type="text"  class="validate" readonly>
              </div>
			<div class="form-group">
                <input  value="<?php echo $oid ?>" name="oiid" type="hidden" >
              </div>
			<div class="form-group">
                <input  value="<?php echo $yrrr ?>" name="yearr" type="hidden" >
              </div>
			<div class="form-group">
                <input  value="<?php echo $month ?>" name="monn" type="hidden" >
              </div>
			<div class="form-group">
                <input  value="<?php echo $rem ?>" name="rem" type="hidden" >
              </div>
			  
			<div class="form-group">
                <input  value="1" name="per" type="hidden" >
              </div>
			  
              <div class="form-group">
                <input class="form-control" placeholder="First Name" pattern="[A-Za-Z]+" value="<?php echo $row2['fname'] ?>" name="fname" type="text" valu  class="validate" readonly>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Last Name" pattern="[A-Za-Z]+" name="lname" value="<?php echo $row2['lname'] ?>" type="text"  class="validate" readonly>
              </div>
              <div class="form-group">
              <div class="input-group-prepend">
</div>
                <input class="form-control" placeholder="Amount" name="amt" value="<?php echo $amt ?>" id="am" type="text"  class="validate" readonly>
              </div>
             <div class="input-group mb-3">
<div class="input-group-prepend">
<label class="input-group-text" for="inputGroupSelect01">Payment Mode</label>
</div>
<select class="custom-select"  name="mop" id="inputGroupSelect01">
<option value="Cash">Cash</option>
<option value="Check">Check</option>
<option value="DD">Demand Draft</option>

</select>
              </div>
         
              <div class="form-group">
                <input type="submit" value="Submit"  type="submit" id="button"  name="paymmc" class="btn btn-primary py-3 px-5">
              </div>
            </form>
	<?php
					}
					else if($period==3 ||$period==6 || $period==12){
							  $result3=$connect->query($sql2);
							  $num3= $result3->num_rows;
							  //echo $sql2;
							  
							  $rem=$period;
							  if($num3==0){
								  $curr_month=date('m');
								  $yrrr=date('Y');
								  $month=monthW($curr_month-1);
								$amt=1000*$rem;
								
								  $row3=$result3->fetch_assoc();
							  }
							  else{
								  $curr_month=date('m');
								  $curr_year=date('Y');
								  $row3=$result3->fetch_assoc();
								   if($row3['year']>$curr_year)
								  {
										$m="Already Paid the Maintence";
										echo "<script language='javascript'> alert('$m'); </script>";
										redirect("pay.php");
								  }
								  else if(montht($row3['month'])>=$curr_month)
								  {
									$m="Already Paid the Maintence";
										echo "<script language='javascript'> alert('$m'); </script>";
										redirect("pay.php");
								    
								  }
								  if($row3['year']<$curr_year){
									  $month=$row3['month'];
									  
									  $rem1=$curr_month-montht($month) + 12 ;
									  $amt=1000*$rem + 10*($rem1-1);
								  }
								  else{
									  
									  $month=$row3['month'];
									  
									  $rem1=$curr_month-montht($month);
									  
									  $amt=1000*$rem + 10*($rem1-1);
								  }
								  
								  $yrrr=$row3['year'];
								  
								 
							  }
					
	
	?>
	
	  <form action="record.php" method="post" enctype="multipart/form-data" class="bg-light p-5 contact-form" id="treasurer">
            
              <div class="form-group">
                <input class="form-control" placeholder="Flat Number" pattern="[0-9]{2}" value="<?php echo $row2['flatno'] ?>" name="flatno" type="text"  class="validate" readonly>
              </div>
			<div class="form-group">
                <input  value="<?php echo $oid ?>" name="oiid" type="hidden" >
              </div>
			<div class="form-group">
                <input  value="<?php echo $yrrr ?>" name="yearr" type="hidden" >
              </div>
			<div class="form-group">
                <input  value="<?php echo $month ?>" name="monn" type="hidden" >
              </div>
			<div class="form-group">
                <input  value="<?php echo $rem ?>" name="rem" type="hidden" >
              </div>
			  
			<div class="form-group">
                <input  value="<?php echo $rem1 ?>" name="rem1" type="hidden" >
              </div>
			  
			<div class="form-group">
                <input  value="<?php echo $period ?>" name="per" type="hidden" >
              </div>
			  
              <div class="form-group">
                <input class="form-control" placeholder="First Name" pattern="[A-Za-Z]+" value="<?php echo $row2['fname'] ?>" name="fname" type="text" valu  class="validate" readonly>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Last Name" pattern="[A-Za-Z]+" name="lname" value="<?php echo $row2['lname'] ?>" type="text"  class="validate" readonly>
              </div>
              <div class="form-group">
              <div class="input-group-prepend">
</div>
                <input class="form-control" placeholder="Amount" name="amt" value="<?php echo $amt ?>" id="am" type="text"  class="validate" readonly>
              </div>
             <div class="input-group mb-3">
<div class="input-group-prepend">
<label class="input-group-text" for="inputGroupSelect01">Payment Mode</label>
</div>
<select class="custom-select"  name="mop" id="inputGroupSelect01">
<option value="Cash">Cash</option>
<option value="Check">Check</option>
<option value="DD">Demand Draft</option>

</select>
              </div>
         
              <div class="form-group">
                <input type="submit" value="Submit"  type="submit" id="button"  name="mmcq" class="btn btn-primary py-3 px-5">
              </div>
            </form>
	<?php
					}
					
} else if($ptype=='OMF'){
	$cr=date('Y');
	$amt=2500;
	//$month=$_POST['month'];
	
	
/*$sql2="SELECT  * FROM membership WHERE ownerID='$oid' ORDER BY tid DESC";

							  $result3=$connect->query($sql2);
							  $num3= $result3->num_rows;
							  //echo $sql2;
							  if($num3==0){
								  $rem=1;
								  $curr_month=date('m');
								  $month=monthW($curr_month-1);
								$amt=1000;
							  }
							  else{
								  
							  $row3=$result3->fetch_assoc();
								  $curr_month=date('m');
								  $month=$row3['month'];
								  
								  $rem=$curr_month-montht($month);
								  $amt=1000*$rem + 10*($rem-1);
								  
								 
							  }*/
	
	?>
	
	  <form action="record.php" method="post" enctype="multipart/form-data" class="bg-light p-5 contact-form" id="treasurer">
                <div class="input-group mb-3">
						<div class="input-group-prepend">
						<label class="input-group-text" for="inputGroupSelect01">Membership type</label>
						</div>
						<select class="custom-select"  name="fac" id="inputGroupSelect01">
						<option value="Gym">Gym Membership</option>
						<option value="Swiming">Swiming Pool</option>

						</select>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Flat Number" pattern="[0-9]{2}" value="<?php echo $row2['flatno'] ?>" name="flatno" type="text"  class="validate" readonly>
              </div>
			<div class="form-group">
                <input  value="<?php echo $oid ?>" name="oiid" type="hidden" >
              </div>
	
			  
			<div class="form-group">
                <input  value="<?php echo $cr ?>" name="per" type="hidden" >
              </div>
			  
              <div class="form-group">
                <input class="form-control" placeholder="First Name" pattern="[A-Za-Z]+" value="<?php echo $row2['fname'] ?>" name="fname" type="text" valu  class="validate" readonly>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Last Name" pattern="[A-Za-Z]+" name="lname" value="<?php echo $row2['lname'] ?>" type="text"  class="validate" readonly>
              </div>
              <div class="form-group">
              <div class="input-group-prepend">
</div>
                <input class="form-control" placeholder="Amount" name="amt" value="<?php echo $amt ?>" id="am" type="text"  class="validate" readonly>
              </div>
			  
             <div class="input-group mb-3">
<div class="input-group-prepend">
<label class="input-group-text" for="inputGroupSelect01">Payment Mode</label>
</div>
<select class="custom-select"  name="mop" id="inputGroupSelect01">
<option value="Cash">Cash</option>
<option value="Check">Check</option>
<option value="DD">Demand Draft</option>

</select>
              </div>
         
              <div class="form-group">
                <input type="submit" value="Pay"  type="submit" id="button"  name="payomf" class="btn btn-primary py-3 px-5">
              </div>
            </form>
	<?php
}
else if($ptype=='OSD'){
	$cr=date('Y');
	$amt=50000;
	//$month=$_POST['month'];
	
	
/*$sql2="SELECT  * FROM membership WHERE ownerID='$oid' ORDER BY tid DESC";

							  $result3=$connect->query($sql2);
							  $num3= $result3->num_rows;
							  //echo $sql2;
							  if($num3==0){
								  $rem=1;
								  $curr_month=date('m');
								  $month=monthW($curr_month-1);
								$amt=1000;
							  }
							  else{
								  
							  $row3=$result3->fetch_assoc();
								  $curr_month=date('m');
								  $month=$row3['month'];
								  
								  $rem=$curr_month-montht($month);
								  $amt=1000*$rem + 10*($rem-1);
								  
								 
							  }*/
	
	?>
	
	  <form action="record.php" method="post" enctype="multipart/form-data" class="bg-light p-5 contact-form" id="treasurer">
            
              <div class="form-group">
                <input class="form-control" placeholder="Flat Number" pattern="[0-9]{2}" value="<?php echo $row2['flatno'] ?>" name="flatno" type="text"  class="validate" readonly>
              </div>
			<div class="form-group">
                <input  value="<?php echo $oid ?>" name="oiid" type="hidden" >
              </div>
	
              <div class="form-group">
                <input class="form-control" placeholder="First Name" pattern="[A-Za-Z]+" value="<?php echo $row2['fname'] ?>" name="fname" type="text" valu  class="validate" readonly>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Last Name" pattern="[A-Za-Z]+" name="lname" value="<?php echo $row2['lname'] ?>" type="text"  class="validate" readonly>
              </div>
              <div class="form-group">
              <div class="input-group-prepend">
</div>
                <input class="form-control" placeholder="Amount" name="amt" value="<?php echo $amt ?>" id="am" type="text"  class="validate" readonly>
              </div>
			  
             <div class="input-group mb-3">
<div class="input-group-prepend">
<label class="input-group-text" for="inputGroupSelect01">Payment Mode</label>
</div>
<select class="custom-select"  name="mop" id="inputGroupSelect01">
<option value="Cash">Cash</option>
<option value="Check">Check</option>
<option value="DD">Demand Draft</option>

</select>
              </div>
         
              <div class="form-group">
                <input type="submit" value="Pay"  type="submit" id="button"  name="payosd" class="btn btn-primary py-3 px-5">
              </div>
            </form>
	<?php
}

								
//---------------PHP------------------		
?>

            
              </div>
         
             


			
 <?php  

if(isset($_POST['submit']))
{
	
  $cowner = $_POST['ownerID'];
  $mob = $_POST['mob'];
  $cd= $_POST['cd'];
  $ctype= $_POST['ctype'];
  $cdate=date('d-m-Y H:i:s a');
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