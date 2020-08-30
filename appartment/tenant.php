<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "ase";

// Create connection
$connect = new mysqli($servername, $username, $password,"ams");

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
} 
//echo "Connected successfully";
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
    <title>Akruti | Tenant Details</title>
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
    

<?php

$sql2="SELECT * FROM ownerDetails WHERE tid='".$row['ownerID']."'";
		
    $result2=$connect->query($sql2);
  $num= $result2->num_rows;
  if($num==0)
  {
    ?> <h5>You Dont have any tenant<h5><?php 
  }
  else
  {
   while($row2=$result2->fetch_assoc())
    {

?>

    <section class="ftco-section ftco-no-pb">
			<div class="container">
				<div class="row no-gutters">
					<div class="col-md-6 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(upload/<?php echo "Photo_".$row2['email']; ?>.jpg);">
					</div>
					<div class="col-md-6 wrap-about py-md-5 ftco-animate">
	          <div class="heading-section p-md-5">
	            <h2 class="mb-4"><?php echo $row2['fname']." ".$row2['lname']." "; ?></h2><h6 class="mb-4"><a href="edittenant.php?tidd=<?php echo $row2['ownerID'] ?>">Edit</a></h6>

	            <p>
				Flat No. : <?php echo $row2['flatno']?><br>
				Father's Name : <?php echo $row2['father']?><br>
				Mother's Name : <?php echo $row2['mother']?><br>
				Communication Address : <?php echo $row2['cadd']?><br>
				Mobile Number : <?php echo $row2['mobile']?><br>
				Email ID: <?php echo $row2['email']?><br>
				Occupation : <?php echo $row2['occ']?><br>
				Vehicle Reg : <?php echo $row2['vr']?><br>
				<a href="upload/<?php echo "ID_".$row2['email'].".jpg" ?>">ID Proof</a> <br>
				<a href="upload/<?php echo "Perm_".$row2['email'].".jpg" ?>">Permanant Address Proof</a><br>
				</div>
					</div>
				</div>
			</div>
		</section>
	<?php } 
	
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