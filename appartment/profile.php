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
	header("Location: index.php");
}

$email=$_SESSION['login'];

	$sql1="SELECT * FROM ownerDetails WHERE email='$email'";
		
    $result1=$connect->query($sql1);
	
    
	$row=$result1->fetch_assoc();
	
if($row['num']==1){
?>
<html lang="en">
  <head>
    <title>Akruti | Profile</title>
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
    <!-- END nav -->
    
 <?php
 if(isset($_GET['oid']) && $row['type']!='owner'){
	 $oid = $_GET['oid'];
	 $sql1="SELECT * FROM ownerDetails WHERE ownerID='$oid'";
		
    $result3=$connect->query($sql1);
	
	$row3=$result3->fetch_assoc();
	
	$sql2="SELECT * FROM flat WHERE ownerID='".$row3['ownerID']."'";
	//	echo $sql2;
    $result4=$connect->query($sql2);
    
	$row4=$result4->fetch_assoc();
 
 ?>

    <section class="ftco-section ftco-no-pb">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(upload/<?php echo "Photo_".$row3['email']; ?>.jpg);">
					</div>
					<div class="col-md-6 wrap-about py-md-5 ftco-animate">
	          <div class="heading-section p-md-5">
	            <h2 class="mb-4"> <?php echo $row3['fname']." ".$row3['lname']; ?></h2>

	            <p>
				Door No. : <?php echo $row4['doorNo']?><br>
				Flat No. : <?php echo $row3['flatno']?><br>
				Full Name : <?php echo $row3['fname']." ".$row3['lname']; ?><br>
				Father's Name : <?php echo $row3['father']?><br>
				Mother's Name : <?php echo $row3['mother']?><br>
				Communication Address : <?php echo $row3['cadd']?><br>
				Permannant Address : <?php echo $row3['padd']?><br>
				Mobile Number : <?php echo $row3['mobile']?><br>
				Email ID: <?php echo $row3['email']?><br>
				Occupation : <?php echo $row3['occ']?><br>
				<a href="upload/<?php echo "Id_".$row3['email'].".jpg" ?>">ID Proof</a> <br>
				<a href="upload/<?php echo "Sale_".$row3['email'].".jpg" ?>">Copy of Sale Deed</a><br>
				</div>
					</div>
				</div>
			</div>
		</section>

<?php
 }
 else{
	 echo "<h5>You Are Not Authorized</h5>";
 }
 ?>

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
<?php

}
else
	header("Location: filldetails.php");
?>
  </body>
</html>