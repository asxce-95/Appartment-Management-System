<!DOCTYPE html>
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
?>
<html lang="en">
  <head>
    <title>Akruti | Login</title>
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
	          <li class="nav-item "><a href="signup.php" class="nav-link">Sign Up</a></li>
	          <li class="nav-item active"><a href="login.php" class="nav-link">Login</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->



		<section class="ftco-section contact-section">
      <div class="container">


        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-8 mb-md-5">
          	<h2 class="text-center">Login!</h2>
            <form action="login.php" method="post" class="bg-light p-5 contact-form">
              
             <div class="form-group">
                <input id="doorNo" class="form-control" placeholder="Door Number" pattern="[0-9][-][NSWE][-][0-9]{2}[-][0-9]{3}[/][0-9]{2}" name="una" type="text" class="validate" required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" id="pass"  name="pass"  class="validate" placeholder="Password" required>
              </div>
          
              <div class="form-group">
                <input type="submit" value="Submit"  type="submit" id="button"  name="submit" class="btn btn-primary py-3 px-5">
              </div>
            </form>
			

          
          </div>
        </div>
     
      </div>
	    <?php      

if(isset($_POST['submit']))
{
  $una = $_POST['una'];
  $pass = $_POST['pass'];
  $sql="SELECT ownerID FROM flat WHERE doorNo='$una'";
  $result=$connect->query($sql);
  $num= $result->num_rows;
  if($num==0)
  {
    ?> <h5>Error<h5><?php 
  }
  else
  {
   while($row=$result->fetch_assoc())
    {
        $n=$row['ownerID'];
        $sql1="SELECT * FROM ownerDetails WHERE ownerID='$n' AND password='$pass' AND status='Active'";
        $result1=$connect->query($sql1);
        $num1= $result1->num_rows;
        if($num1==0)
        {
           ?> <h5>Error<h5><?php
        }
        else
        {
			$row2=$result1->fetch_assoc();
          session_start();
          $_SESSION['login']=$row2['email'];
          header("Location: home.php");
        }
  }
}
}
?>
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