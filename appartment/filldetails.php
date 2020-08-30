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

?>
<html lang="en">
  <head>
    <title>Akruti | Edit Details</title>
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
    
	  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.php">Akruti</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="home.php" class="nav-link">Home</a></li>
	          <li class="nav-item "><a href="filldetails.php" class="nav-link">Edit Profile</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->



		<section class="ftco-section contact-section">
      <div class="container">


        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-8 mb-md-5">
          	<h2 class="text-center">Please edit the required details</h2>
            <form action="filldetails.php" method="post" enctype="multipart/form-data" class="bg-light p-5 contact-form">
              <div class="form-group">
                <input class="form-control" placeholder="Flat Number" pattern="[0-9]{2}" name="flatno" type="text" value="<?php echo $row['flatno']; ?>" class="validate" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="First Name" pattern="[A-Za-Z]+" name="fname" type="text" value="<?php echo $row['fname']; ?>" class="validate" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Last Name" pattern="[A-Za-Z]+" name="lname" type="text" value="<?php echo $row['lname']; ?>" class="validate" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Father's Name" pattern="[A-Za-Z]+" name="father" type="text" value="<?php echo $row['father']; ?>" class="validate" required>
              </div>
			  <div class="form-group">
                <input class="form-control" placeholder="Mother's Name" pattern="[A-Za-Z]+" name="mother" type="text" value="<?php echo $row['mother']; ?>" class="validate" required>
              </div>
			  <div class="form-group">
                <input class="form-control" placeholder="Occupation" pattern="[A-Za-Z]+" name="occ" type="text" value="<?php echo $row['occ']; ?>" class="validate" >
              </div>
			  <?php if($row['type']!="tenant") { ?>
			  
				  <div class="form-group">
					<input class="form-control" id="1" placeholder="Communication Address" pattern="[A-Za-Z]+" name="cadd" type="text" value="<?php echo $row['cadd']; ?>" class="validate" required>
				  </div>
				  <div class="form-group">
					<label>Permannant Address Same As Above</label>
					<input class="form-control" type="checkbox" value="" id="check"  onClick="copy();"  >
				  </div>
			  
                                
				  <div class="form-group">
					<input class="form-control" id="2" placeholder="Permannant Address" pattern="[A-Za-Z]+" name="padd" type="text" value="<?php echo $row['padd']; ?>" class="validate" required>
				  </div>
				  
			  <?php } else {?>
			  
				  <div class="form-group">
					<input class="form-control" id="2" placeholder="Vehile Registration/ Enter '-' if not present" pattern="[A-Za-Z]+" name="vr" type="text" value="<?php echo $row['vr']; ?>" class="validate" required>
				  </div>
			  <?php } ?>
			 <div class="form-group">
				<label>Recent Photo</label>
                <input class="form-control"  name="photo" type="file"  class="validate" required>				
              </div>
			 <div class="form-group">
				<label>ID Proof</label>
                <input class="form-control"  name="idproof" type="file"  class="validate" required>				
              </div>
			  <?php if($row['type']!="tenant") { ?>
			 <div class="form-group">
				<label>Copy of Sale Deed</label>
                <input class="form-control"  name="sale" type="file"  class="validate" required>				
              </div>
			  <?php } else { ?>
           <div class="form-group">
				<label>Permanant ID proof</label>
                <input class="form-control"  name="perm" type="file"  class="validate" required>				
              </div>
			  
			  <?php } ?>
          
              <div class="form-group">
                <input type="submit" value="Submit"  type="submit" id="button"  name="submit" class="btn btn-primary py-3 px-5">
              </div>
            </form>
			
<?php

if(isset($_POST['submit']))
			{
				
				
			$target_dir = "upload/";

			$name = $_FILES['photo']['name'];
			$temp = $_FILES['photo']['tmp_name'];
			$name="Photo_";
			$name.=$row['email'];
			$imageFileType = strtolower(pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION));
			$target_file = $target_dir . $name .".".$imageFileType;	
			move_uploaded_file($temp,$target_file);

			$name = $_FILES['idproof']['name'];
			$temp = $_FILES['idproof']['tmp_name'];
			$name="Id_";
			$name.=$row['email'];
			$imageFileType = strtolower(pathinfo($_FILES['idproof']['name'],PATHINFO_EXTENSION));
			$target_file = $target_dir . $name .".".$imageFileType;	
			move_uploaded_file($temp,$target_file);
			
			if($row['type']!="tenant"){
						$name = $_FILES['sale']['name'];
						$temp = $_FILES['sale']['tmp_name'];
						$name="Sale_";
						$name.=$email;
						$imageFileType = strtolower(pathinfo($_FILES['sale']['name'],PATHINFO_EXTENSION));
						$target_file = $target_dir . $name .".".$imageFileType;	
						move_uploaded_file($temp,$target_file);
					
						$sql="UPDATE `ownerdetails` SET `fname`='".$_POST['fname']."',
						`lname`='".$_POST['lname']."',`flatno`='".$_POST['flatno']."',`father`='".$_POST['father']."',`mother`='".$_POST['mother']."',`occ`='".$_POST['occ']."',
						`cadd` ='".$_POST['cadd']."',`padd`='".$_POST['padd']."' , num='1' WHERE `email`='$email'";
						
			}
			else {
				$name = $_FILES['perm']['name'];
						$temp = $_FILES['perm']['tmp_name'];
						$name="Perm_";
						$name.=$email;
						$imageFileType = strtolower(pathinfo($_FILES['perm']['name'],PATHINFO_EXTENSION));
						$target_file = $target_dir . $name .".".$imageFileType;	
						move_uploaded_file($temp,$target_file);
					
						$sql="UPDATE `ownerdetails` SET `fname`='".$_POST['fname']."',
						`lname`='".$_POST['lname']."',`flatno`='".$_POST['flatno']."',`father`='".$_POST['father']."',`mother`='".$_POST['mother']."',`occ`='".$_POST['occ']."',
						`cadd` ='Akruti Heights, Hiranandani',vr='".$_POST['vr']."' , num='1' WHERE `email`='$email'";
			}
			 $result1=$connect->query($sql);
 						$m="Details Updated Successfully";
						echo "<script language='javascript'> alert('$m'); </script>";
 
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