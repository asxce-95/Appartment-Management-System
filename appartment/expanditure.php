<!DOCTYPE html>
<!DOCTYPE html>
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
<html lang="en">
  <head>
    <title>Akruti | Expenditure</title>
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



		<section class="ftco-section contact-section">
      <div class="container">


        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-8 mb-md-5">
          	<h2 class="text-center">Payment!</h2>
            <form action="expanditure.php" method="post" class="bg-light p-5 contact-form">
              <div>
                <select name="month">
                <option value="jan">jan</option>
                <option value="feb">feb</option>
                <option value="march">march</option>
                <option value="april">april</option>
                <option value="may">may</option>
                <option value="june">june</option>
                <option value="july">july</option>
                <option value="aug">august</option>
                <option value="sep">sept</option>
                <option value="oct">oct</option>
                <option value="nov">nov</option>
                <option value="dec">dec</option>

              </select>
            </br>
          </br>
              </div>
              <div class="form-group">
                <input  class="form-control" id="entername"    name="entername"  placeholder="Enter name" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" id="payment"  name="payment"  placeholder="Payment" required>
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
  //$email = $_POST['email'];
  //$pass = $_POST['pass'];
  $month = $_POST['month'];
  $entername = $_POST['entername'];
  $payment=$_POST['payment'];

  /*$sql="SELECT ownerID FROM flat WHERE doorNo='$una'";
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
        $n=$row['ownerID'];*/
        $sql1="INSERT into expenditure (month,name,payment,status) VALUES ('$month','$entername','$payment','0')";
        //echo $sql1;
        $result1=$connect->query($sql1);
        ?>
        <script>
        alert("payment is send for approval");
        </script>

<?php
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
