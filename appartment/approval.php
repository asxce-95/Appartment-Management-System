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
    <title>Akruti | Approval</title>
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
        <?php
$sql1="SELECT * from expenditure WHERE status='0'";
$result1=$connect->query($sql1);
$k=0;
?>

  <div class="container">
  <table class="table table-hover">
  <thead>
      <tr>
        <th>Transaction ID</th>
        <th>Name</th>
        <th>Payment</th>
      </tr>
    </thead>
    <?php
while($row=mysqli_fetch_assoc($result1))
{
  echo"<tr><td>{$row['transactionid']}</td><td>{$row['name']}</td><td>{$row['payment']}</td></tr>";
  $k=1;
}

echo " </tbody>";
echo "</table>";
echo "</div>";

?>

<?php
if($k==0)
{
  ?>
  <h2  align="center">All the payment are approved</h2>
  <?php
}
else{
  ?>
<form action="approval.php" method="post">
    <div class="container">
      <input type="hidden" name='xyz' value="bbb">
      <input   type="submit" value="Approve payment" name="submit" class="btn btn-primary">
    </div>
  </form>
<?php
}
if(isset($_POST['submit']))
{
  //echo "ss";
  //$email = $_POST['email'];
  //$pass = $_POST['pass'];


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
        $sql1="UPDATE expenditure SET status='1' WHERE status='0'";
        //echo $sql1;
        $result1=$connect->query($sql1);
	$m="Payment Approved Successfully";
	echo "<script language='javascript'> alert('$m'); </script>";
	redirect("home.php");
        ?>
        

<?php

//echo"done";
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
