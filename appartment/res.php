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

global $code;

  // when form submits

    if(isset($_POST['reset'])){
	
	$code = $_POST['code'];
	$sql1="SELECT `email` from reset WHERE `code` = '$code' ";
		
        $result1=$connect->query($sql1);
	
    $password = md5($_POST['password']);
    $confirm  = md5($_POST['confirm']);
    if($password!=$confirm){
        echo "Password Don't matches !";
        exit();
    }
	$row=$result1->fetch_assoc();
    $email = $row['email'];

    $updatePass = mysqli_query($connect,"UPDATE `ownerDetails` SET password = '$confirm' where email = '$email'");
    if($updatePass){
        $query = mysqli_query($connect,"DELETE FROM reset where code = '$code' ");
        exit('Password Updated, Please Login with the New Password');
    }
    else{
        exit('Something went wrong');
    }


}
if(!isset($_GET['code'])){

    echo "There is No Code there !!!";
}

if(isset($_GET['code'])){
    $code = $_GET['code'];
	
}

// make sure there is row in the table that matches that passed code 
$findEmail = mysqli_query($connect,"SELECT `email` from reset WHERE `code` = '$code' ");


if(mysqli_num_rows($findEmail)==0){    // if no row found

    echo "<h2 class = 'text text-center'>No Record regarding this email !</h2>";
    exit();
}



?>

<html lang="en">
  <head>
    <title>Akruti | Sign Up</title>
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
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Akruti</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item "><a href="index.php" class="nav-link">Home</a></li>
	          <li class="nav-item active"><a href="signup.php" class="nav-link">Sign Up</a></li>
	          <li class="nav-item "><a href="login.php" class="nav-link">Login</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->



		<section class="ftco-section contact-section">
      <div class="container">


        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-8 mb-md-5">
          	<h2 class="text-center">Enter OTP sent on your email address</h2>
            <form action="verification.php" method='post' class="bg-light p-5 contact-form">
              <div class="form-group">
                <input class="form-control" placeholder="Enter Password" type="password" class="form-control" name="password" id="password2" onkeyup="checkPass();" required>
              </div>
            <div class="form-group">
                <input class="form-control" placeholder="Confirm Password" type="password" class="form-control" name="confirm" id="confirm2" onkeyup="checkPass();" required>
              </div>
          
              <div class="form-group">
                <input value="Submit" type="submit" id="button"  name="otpp"  class="btn btn-primary py-3 px-5">
              </div>
            </form>
			
  
          
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