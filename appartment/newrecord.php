 <?php include 'myconfig.php'; 
session_start();

function montht($mon)
{
    switch ($mon) {
    case 'Jan':
        return 1;
    case 'Feb':
        return 2;
    case 'March':
        return 3;
    case 'April':
        return 4;
    case 'May':
        return 5;
    case 'June':
        return 6;
    case 'July':
        return 7;
    case 'August':
        return 8;
    case 'Sept':
        return 9;
    case 'Oct':
        return 10;
    case 'Nov':
        return 11;
    case 'Dec':
        return 12;
    default:
	} 
}
function monthW($mon)
{
    switch ($mon) {
    case 1:
		return 'Jan';
    case 2:
        return 'Feb';
    case 3:
        return 'March';
    case 4:
        return 'April';
    case 5:
        return 'May';
    case 6:
        return 'June';
    case 7:
        return 'July';
    case 8:
        return 'August';
    case 9:
        return 'Sept';
    case 10:
        return 'Oct';
    case 11:
        return 'Nov';
    case 12:
        return 'Dec';
    default:
	} 
}
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




if(isset($_POST['paymmc']))
{
  $cowner = $_POST['oiid'];
  $rem = $_POST['rem'];
  $month = $_POST['monn'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $flatno = $_POST['flatno'];
  $mop = $_POST['mop'];
  $year = $_POST['yearr'];
  $per = $_POST['per'];
  $amt = $_POST['amt'];
  $cm=date('m');
  $cy =date('Y');
  
  $cdate=date('d-m-Y H:i:s a');
  //echo $rem;
  //echo $month;
  //echo monthW($cm - $rem+1);
  
  while($rem){
	  
	  if($year < $cy){
	 $mmm=$cm - $rem+1+12;
	$mm=monthW($mmm);
	  }
	  else{
		  
	 $mmm=$cm - $rem+1;
	$mm=monthW($mmm);
	  }
	
 // echo $mm;
 if($rem==1){
 $amtt=1000;
 }else{
	 $amtt=1010;
 }
  $sql="INSERT INTO `maintenance`(`ownerID`, `fname`, `lname`, `flatno`, `period`, `month` ,`year`, `amount`, `mop`,date) 
		VALUES 
		('$cowner','$fname','$lname','$flatno','$per','$mm','$year','$amtt','$mop','$cdate')";
   // echo $sql;
   
  $result=$connect->query($sql);
  
	  if($mmm==12)
	  {
		  $year++;
	  }
  $rem--;
  
  }
  if($result==TRUE)
  {
    $m="Payment Recorded";
	echo "<script language='javascript'> alert('$m'); </script>";
	header("Refresh:0;url=newpay.php");
  }
}
else if(isset($_POST['mmcq']))
{
  $cowner = $_POST['oiid'];
  $rem = $_POST['rem'];
  $rem1 = $_POST['rem1'];
  $month = $_POST['monn'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $flatno = $_POST['flatno'];
  $mop = $_POST['mop'];
  $year = $_POST['yearr'];
  $per = $_POST['per'];
  $amt = $_POST['amt'];
  $cm=date('m');
  $cy =date('Y');
  
  $cdate=date('d-m-Y H:i:s a');
  //echo $rem;
  //echo $month;
  //echo monthW($cm - $rem+1);
  $monp = montht($month);
  for($i=0;$i<$rem;$rem--){
	  
	 if($cy < $year)
	  $mmm = fmod($monp+1,12);
	else
		$mmm = $monp+1;
	  
	  $mm=monthW($mmm);
	  $monp++;
	   if($rem1<=1){
		 $amtt=1000;
		}else{
			$amtt=1010;
		}
		 $sql="INSERT INTO `maintenance`(`ownerID`, `fname`, `lname`, `flatno`, `period`, `month` ,`year`, `amount`, `mop`,date) 
		VALUES 
		('$cowner','$fname','$lname','$flatno','$per','$mm','$year','$amtt','$mop','$cdate')";
   // echo $sql;
   
  $result=$connect->query($sql);
  
	  if($mmm==12)
	  {
		  $year++;
	  }
  $rem1--;
		
	
		 
  }
  

  if($result==TRUE)
  {
    $m="Payment Recorded";
	echo "<script language='javascript'> alert('$m'); </script>";
	header("Refresh:0;url=newpay.php");
  }
}
else if(isset($_POST['payomf']))
{
  $cowner = $_POST['oiid'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $flatno = $_POST['flatno'];
  $mop = $_POST['mop'];
  $per = $_POST['per'];
  $amt = $_POST['amt'];
  $fac = $_POST['fac'];
  $year=date('Y');
  $cm=date('m');
  
  $cdate=date('d-m-Y H:i:s a');
  //echo $rem;
  //echo $month;
  //echo monthW($cm - $rem+1);
  
 
  $sql="INSERT INTO `membership`(`ownerID`, `fname`, `lname`, `flatno`, `period`, `amount`, `mop`, `facility`,date) 
		VALUES 
		('$cowner','$fname','$lname','$flatno','$per','$amt','$mop','$fac','$cdate')";
   // echo $sql;
   
  $result=$connect->query($sql);

  
  if($result==TRUE)
  {
    $m="Payment Recorded";
	echo "<script language='javascript'> alert('$m'); </script>";
	header("Refresh:0;url=newpay.php");
  }
}
else if(isset($_POST['payosd']))
{
  $cowner = $_POST['oiid'];
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $flatno = $_POST['flatno'];
  $mop = $_POST['mop'];
  $amt = $_POST['amt'];
  
  $cdate=date('d-m-Y H:i:s a');
  //echo $rem;
  //echo $month;
  //echo monthW($cm - $rem+1);
  
 
  $sql="INSERT INTO `deposit`(`date`, `ownerID`, `flatno`, `fname`, `lname`, `damt`, `mop`)
		VALUES 
		('$cdate','$cowner','$flatno','$fname','$lname','$amt','$mop')";
   // echo $sql;
   
  $result=$connect->query($sql);

  
  if($result==TRUE)
  {
    $m="Payment Recorded";
	echo "<script language='javascript'> alert('$m'); </script>";
	header("Refresh:0;url=newpay.php");
  }
}      

?>