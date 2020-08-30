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
//echo "Connected successfully";
session_start();
if(!(isset($_SESSION['login']) and $_SESSION['login']!=''))
{
	redirect("index.php");
}

$email=$_SESSION['login'];
if(!isset($_POST['oid'])){
	redirect("home.php");
}
$oid=$_POST['oid'];

$sql1="SELECT * FROM ownerDetails WHERE ownerID='$oid'";
		
    $result2=$connect->query($sql1);
	
    
	$row2=$result2->fetch_assoc();

	$sql1="SELECT * FROM ownerDetails WHERE ownerID='$email'";
		
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
  </head>
  <body>
    
    
   <!---NAV------> 
<?php
include 'nav.inc.php';
?>
    <!-- END nav -->


		<section class="ftco-section contact-section">
      <div class="container">


        <div class="row block-9 justify-content-center mb-5">
          <div class="col-md-8 mb-md-5">
          	<h2 class="text-center">Please edit the required details</h2>
            <form action="oedit.php" method="post" class="bg-light p-5 contact-form">
              <div class="form-group">
                <input class="form-control" placeholder="Flat Number" pattern="[0-9]{2}" name="flatno" type="text" value="<?php echo $row2['flatno']; ?>" class="validate" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="First Name" pattern="[A-Za-Z]+" name="fname" type="text" value="<?php echo $row2['fname']; ?>" class="validate" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Last Name" pattern="[A-Za-Z]+" name="lname" type="text" value="<?php echo $row2['lname']; ?>" class="validate" required>
              </div>
              <div class="form-group">
                <input class="form-control" placeholder="Father's Name" pattern="[A-Za-Z]+" name="father" type="text" value="<?php echo $row2['father']; ?>" class="validate" required>
              </div>
			  <div class="form-group">
                <input class="form-control" placeholder="Mother's Name" pattern="[A-Za-Z]+" name="mother" type="text" value="<?php echo $row2['mother']; ?>" class="validate" required>
              </div>
			  <div class="form-group">
                <input class="form-control" placeholder="Occupation" pattern="[A-Za-Z]+" name="occ" type="text" value="<?php echo $row2['occ']; ?>" class="validate" >
              </div>
			  
			   <div class="form-group">
                <input type="hidden" name="oid" type="text" value="<?php echo $oid; ?>" >
              </div>
				  <div class="form-group">
					<input class="form-control" id="1" placeholder="Communication Address" pattern="[A-Za-Z]+" name="cadd" type="text" value="<?php echo $row2['cadd']; ?>" class="validate" required>
				  </div>
			  
                                
				  <div class="form-group">
					<input class="form-control" id="2" placeholder="Permannant Address" pattern="[A-Za-Z]+" name="padd" type="text" value="<?php echo $row2['padd']; ?>" class="validate" required>
				  </div>
				  
	<!--------------
			 <div class="form-group">
				<label>Recent Photo</label>
                <input class="form-control"  name="photo" type="file"  class="validate" >				
              </div>
			 <div class="form-group">
				<label>ID Proof</label>
                <input class="form-control"  name="idproof" type="file"  class="validate" >				
              </div>
			  <!--?php if($row['type']=="owner") { ?>
			 <div class="form-group">
				<label>Copy of Sale Deed</label>
                <input class="form-control"  name="sale" type="file"  class="validate" >				
              </div>
			  <!---?php } else { ?>
           <div class="form-group">
				<label>Permanant ID proof</label>
                <input class="form-control"  name="perm" type="file"  class="validate" >				
              </div>
			  
			  <!---?php } ?>
     ------->
          
              <div class="form-group">
                <input type="submit" value="Submit"  type="submit" id="button"  name="submit" class="btn btn-primary py-3 px-5">
              </div>
            </form>
			
<?php

if(isset($_POST['submit']))
			{
				$sql="UPDATE `ownerdetails` SET `fname`='".$_POST['fname']."',
					`lname`='".$_POST['lname']."',`flatno`='".$_POST['flatno']."',`father`='".$_POST['father']."',`mother`='".$_POST['mother']."',`occ`='".$_POST['occ']."',
					`cadd` ='".$_POST['cadd']."',`padd`='".$_POST['padd']."' , num='1' WHERE `ownerID`='".$_POST['oid']."'";

			 $result1=$connect->query($sql);
 						$m="Details Updated Successfully";
						echo "<script language='javascript'> alert('$m'); </script>";
						redirect("viewallO.php");
			}
				
		/*		echo '1';
			$name = $_FILES['photo']['name'];
			$temp = $_FILES['photo']['tmp_name'];
			$name="Photo_";
			$name.=$email;
			echo $name;
			echo $temp;
			move_uploaded_file($temp,"upload/".$name);

			$name = $_FILES['idproof']['name'];
			$temp = $_FILES['idproof']['tmp_name'];
			$name="Id_";
			$name.=$email;
			move_uploaded_file($temp,"".$name);


			$name = $_FILES['sale']['name'];
			$temp = $_FILES['sale']['tmp_name'];
			$name="Sale_";
			$name.=$email;
			move_uploaded_file($temp,"".$name); */
			
			
			//$imageFileType1 = strtolower(pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION));
			//$imageFileType2 = strtolower(pathinfo($_FILES['idproof']['name'],PATHINFO_EXTENSION));
			//$imageFileType3 = strtolower(pathinfo($_FILES['sale']['name'],PATHINFO_EXTENSION));
			
	/*		
			
							
			$target_dir = "upload/";
if(isset($_FILES['photo']['name'])){
			$name = $_FILES['photo']['name'];
			$temp = $_FILES['photo']['tmp_name'];
			$name="Photo_";
			$name.=$row['email'];
			$imageFileType = strtolower(pathinfo($_FILES['photo']['name'],PATHINFO_EXTENSION));
			$target_file = $target_dir . $name .".".$imageFileType;	
			move_uploaded_file($temp,$target_file);
}
if(isset($_FILES['idproof']['name'])){
			$name = $_FILES['idproof']['name'];
			$temp = $_FILES['idproof']['tmp_name'];
			$name="Id_";
			$name.=$row['email'];
			$imageFileType = strtolower(pathinfo($_FILES['idproof']['name'],PATHINFO_EXTENSION));
			$target_file = $target_dir . $name .".".$imageFileType;	
			move_uploaded_file($temp,$target_file);
}
if($row['type']=="owner"){			
		if(isset($_FILES['sale']['name'])){
					$name = $_FILES['sale']['name'];
					$temp = $_FILES['sale']['tmp_name'];
					$name="Sale_";
					$name.=$email;
					$imageFileType = strtolower(pathinfo($_FILES['sale']['name'],PATHINFO_EXTENSION));
					$target_file = $target_dir . $name .".".$imageFileType;	
					move_uploaded_file($temp,$target_file);
		}			
					
					$sql="UPDATE `ownerdetails` SET `fname`='".$_POST['fname']."',
					`lname`='".$_POST['lname']."',`flatno`='".$_POST['flatno']."',`father`='".$_POST['father']."',`mother`='".$_POST['mother']."',`occ`='".$_POST['occ']."',
					`cadd` ='".$_POST['cadd']."',`padd`='".$_POST['padd']."' , num='1' WHERE `email`='$email'";
}
else
{
	if(isset($_FILES['perm']['name'])){
						$name = $_FILES['perm']['name'];
						$temp = $_FILES['perm']['tmp_name'];
						$name="Perm_";
						$name.=$email;
						$imageFileType = strtolower(pathinfo($_FILES['perm']['name'],PATHINFO_EXTENSION));
						$target_file = $target_dir . $name .".".$imageFileType;	
						move_uploaded_file($temp,$target_file);
	}		
						$sql="UPDATE `ownerdetails` SET `fname`='".$_POST['fname']."',
						`lname`='".$_POST['lname']."',`flatno`='".$_POST['flatno']."',`father`='".$_POST['father']."',`mother`='".$_POST['mother']."',`occ`='".$_POST['occ']."',
						`cadd` ='Akruti Heights, Hiranandani',vr='".$_POST['vr']."' , num='1' WHERE `email`='$email'";
}
			 $result1=$connect->query($sql);
 						$m="Details Updated Successfully";
						echo "<script language='javascript'> alert('$m'); </script>";
}

*/

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