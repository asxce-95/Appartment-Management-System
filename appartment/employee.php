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
	redirect("index.php") ;
}

$email=$_SESSION['login'];

	$sql1="SELECT * FROM ownerDetails WHERE email='$email'";
		
    $result1=$connect->query($sql1);
	
    
	$row=$result1->fetch_assoc();


?>
<html lang="en">
  <head>
    <title>Akruti | Employee Details</title>
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
	  <script>  function copy()
{
if(check.checked==true){
document.getElementById('2').value=
document.getElementById('1').value
}
else{
document.getElementById('2').value=""
}
}
</script>
  </head>
  <body>
    
	   <!---NAV------> 
<?php
include 'nav.inc.php';
?>
    
 



		<section class="ftco-section contact-section">
      <div class="container">


        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-8 mb-md-5">
          	<h2 class="text-center">Please fill the required details</h2>
            <form action="employee.php" method="post" enctype="multipart/form-data" class="bg-light p-5 contact-form">
 																															            
              <div class="form-group">																							
                <input class="form-control" placeholder="First Name" pattern="[A-Za-Z]+" name="fname" type="text" class="validate" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Last Name" pattern="[A-Za-Z]+" name="lname" type="text"  class="validate" required>
              </div>
              
			 
			  
			  
				  <div class="form-group">
					<input class="form-control" id="1" placeholder="Communication Address" pattern="[A-Za-Z]+" name="cadd" type="text"  class="validate" required>
				  </div>
				  <div class="form-group">
					<label>Permannant Address Same As Above</label>
					<input class="form-control" type="checkbox" value="" id="check"  onClick="copy();"  >
				  </div>
			  
                                
				  <div class="form-group">
					<input class="form-control" id="2" placeholder="Permannant Address" pattern="[A-Za-Z]+" name="padd" type="text"  class="validate" required>
				  </div>
			  <div class="form-group">
                <input type="text" class="form-control" id="mob" pattern="[987][0-9]{9}" name="mob" type="text" class="validate" placeholder="Mobile" required>
              </div>
              <div class="form-group">
					<input class="form-control" id="2" placeholder="Role" pattern="[A-Za-Z]+" name="Role" type="text"  class="validate" required>
				  </div>
			  
			
		
          
              <div class="form-group">
                <input type="submit" value="Submit"  type="submit" id="button"  name="submit" class="btn btn-primary py-3 px-5">
              </div>
<?php              if(isset($_POST['submit']))
			{    $f=$_POST['fname'];
				 $l=$_POST['lname'];	
				 $t=$_POST['cadd'];
				 $p=$_POST['padd'];
				 $m=$_POST['mob'];
				 $r=$_POST['Role'];
				
				$sql="INSERT INTO `employee`(`fname`, `lname`, `comm_addr`, `perm_addr`, `mobile_no`, `Role`)VALUES('$f','$l','$t','$p','$m','$r')";
						
			 $result1=$connect->query($sql);
 						$m="Details Updated Successfully";
						echo "<script language='javascript'> alert('$m'); </script>";
						redirect("home.php");
 
			}?>

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
   