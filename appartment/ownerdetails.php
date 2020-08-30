<?php

$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$connect = new mysqli($servername, $username, $password,"ams");

// Check connection
if ($connect->connect_error) {
    die("Connection failed: " . $connect->connect_error);
}


	$sql1="SELECT doorno,fname,lname,mobile,email,flatno,father,mother,cadd FROM ownerdetails o,flat f WHERE f.ownerID=o.ownerID and o.type='owner'";

    $result1=$connect->query($sql1);
echo"<table cellpadding='10' border='1'>";
echo"<tr><td>doorno</td><td>fname</td><td>lname</td><td>mobile</td><td>email</td><td>flatno</td><td>father</td><td>father</td><td>mother</td><td>cadd</td>";
	while($row=mysqli_fetch_assoc($result1)){
    echo"<tr><td>{$row['doorno']}</td><td>{$row['fname']}</td><td>{$row['lname']}</td><td>{$row['mobile']}</td><td>{$row['email']}</td><td>{$row['flatno']}</td><td>{$row['father']}</td><td>{$row['father']}</td><td>{$row['mother']}</td><td>{$row['cadd']}</td>";

  }
echo"</table>";
?>
