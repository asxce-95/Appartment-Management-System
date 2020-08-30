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
    <title>Akruti | Complaints</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  
  <script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
    
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
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="home.php">Akruti</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
				<li class="nav-item "><a href="home.php" class="nav-link">Home</a></li>
				
				<?php if($row['type']!="owner") { ?>
				<li class="nav-item "><a href="tenant.php" class="nav-link">Flat Owner Details</a></li>
				<?php } ?>
				
				
				<li class="nav-item active">
					<a href="" class="nav-link" class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Complaints</a>
					<div class='dropdown'>
					  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
						<a class="dropdown-item" href="complaint.php">New Complaint</a>
						<a class="dropdown-item" href="viewcomplaint.php">View Complaint</a>
						<?php if($row['type']!="owner") { ?>
							<a class="dropdown-item" href="viewallC.php">View All Complaints</a>
						<?php } ?>
					  </div>
					  </div>
				  </li>
				
				<?php if($row['type']!="tenant") { ?>
				<li class="nav-item "><a href="tenant.php" class="nav-link">Tenant Details</a></li>
				<?php } ?>
	          <li class="nav-item "><a href="editdetails.php" class="nav-link">Edit Profile</a></li>
	          <li class="nav-item "><a href="logout.php" class="nav-link">Logout</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->



		<section class="ftco-section contact-section">
      <div class="container">


        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-8 mb-md-5">
          	<h2 class="text-center"><br>Your complaint</h2>
				<div class="container">
				 
				  <input class="form-control" id="myInput" type="text" placeholder="Search..">
				  <br>
				  <table class="table table-bordered table-striped">
					<thead>
					  <tr>
						<th>Complaint ID</th>
						<th>Type</th>
						<th>Description</th>
						<th>Date & Time</th>
						<th>Status</th>
					  </tr>
					</thead>
						<?	
//---------------PHP------------------		
						$sql1="SELECT * FROM complaint WHERE ownerID='".$row['ownerID']."'";
							  $result1=$connect->query($sql1);
							  $num1= $result1->num_rows;
							  if($num==0)
							  {
								?> <h5>No Complaints<h5><?php 
							  }
							  else
							  {
							   while($row1=$result1->fetch_assoc())
								{ 
//---------------PHP------------------		
							?>
					<tbody id="myTable">
					  <tr>
						<td><?php echo $row1['cid'] ?></td>
						<td><?php echo $row1['ctype'] ?></td>
						<td><?php echo $row1['cd'] ?></td>
						<td><?php echo $row1['cdate'] ?></td>
						<td><?php echo $row1['status'] ?></td>
					  </tr>
					  
					</tbody>
				  </table>
				  
				  <p>Note that we start the search in tbody, to prevent filtering the table headers.</p>
				</div>
			
 <?php      

if(isset($_POST['submit']))
{
	
  $cowner = $_POST['ownerID'];
  $cemail = $_POST['email'];
  $mob = $_POST['mob'];
  $cd= $_POST['cd'];
  $ctype= $_POST['ctype'];
  $cdate=date('Y-m-d H:i:s a');;
  $sql="INSERT INTO `complaint`(`ctype`,`cdate`, `cd`, `ownerID`,`status`) VALUES ('$ctype','$cdate','$cd','$cowner','In Progress')";
  $result=$connect->query($sql);
  if($result==TRUE)
  {
    $m="Complaint Registered";
	echo "<script language='javascript'> alert('$m'); </script>";
	header("Refresh:0;url=index.php");
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