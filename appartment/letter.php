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
//echo "Connected successfully";

if(isset($_POST['submit']))
{
    
  $oid = $_POST['oid'];
   $orr=explode('-',$oid);
  $owner = $orr[1];
  $oid = $orr[0];
  $sub = $_POST['sub'];
  $date= $_POST['date'];
  $address = $_POST['address'];
  $flatno = $_POST['flatno'];
  $referenceno = $_POST['referenceno'];
  $email = $_POST['email'];
  $letter = $_POST['letter'];
  
  
  $sql="INSERT INTO letter (ownername,ownerID,subject,datetoday,address,flatno,referenceno,email,letter) VALUES (?,?,?,?,?,?,?,?,?)";

if($stmt = mysqli_prepare($connect, $sql)){
         // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssssss", $param_owner,$param_oid,$param_sub, $param_date,$param_address,$param_flatno, $param_referenceno,$param_email,$param_letter);
            
            // Set parameters
            $param_owner = $owner;
            $param_oid = $oid;
            $param_sub = $sub;
      $param_date = $date;
      $param_address = $address;
            $param_flatno = $flatno;
      $param_referenceno = $referenceno;
      $param_email = $email;
            $param_letter = $letter;
      
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                $m="letter Sent for Approval";
				echo "<script language='javascript'> alert('$m'); </script>";
				redirect("home.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
      }
?>
<html lang="en">
  <head>
    <style> 
</style>
   
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
            <h2 class="text-center">Enter Letter Details</h2>
            <form action="#" method="post" class="bg-light p-5 contact-form" id="letterform">
              <div class="input-group mb-3" >
					<div class="input-group-prepend">
					<label class="input-group-text" for="inputGroupSelect01">Select Owner</label>
					</div>

					<select class="custom-select"  name="oid" id="inputGroupSelect01" >
					<?php	
					//---------------PHP------------------		
											$sql2="SELECT * FROM ownerdetails WHERE ownerID<>'No Owner' AND type<>'tenant' AND status='Active'";
												  $result2=$connect->query($sql2);
												  $num2= $result2->num_rows;
												  if($num2==0)
												  {
													?> <h5>No Owner<h5><?php 
												  }
												  else
												  {
												   while($row2=$result2->fetch_assoc())
													{ 
					//---------------PHP------------------		
					?>
					<option value="<?php echo $row2['ownerID'].'-'.$row2['fname'].' '.$row2['lname'] ?>"><?php echo $row2['fname']." ".$row2['lname'] ?></option>
					
             
												  <?php } } ?>

					</select>
              </div>
              <div class="form-group">
                <input id="" class="form-control" placeholder="Subject" name="sub" type="text" required>
              </div>
              <div class="form-group">
                <input id="" class="form-control" placeholder="Date" value="<?php echo date('d-m-Y') ?>" name="date" type="text" readonly>
              </div>
              <div class="form-group">
                <input id="" class="form-control" placeholder="Address" name="address" type="text" required>
              </div>
              <div class="form-group">
                <input id="" class="form-control" placeholder="Flat no" name="flatno" type="text" required>
              </div>
              <div class="form-group">
                <input id="" class="form-control" placeholder="Reference no" name="referenceno" type="text" required>
              </div>
              <div class="form-group">
                <input id="" class="form-control" placeholder="Email" name="email" type="text" required>
              </div>

            <h2>Type letter here</h2>
          <textarea rows="7" cols="86" name="letter" form="letterform"></textarea>


              <div class="form-group">
                <input type="submit" value="Submit"  type="submit" id="button"  name="submit" class="btn btn-primary py-3 px-5">
                
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