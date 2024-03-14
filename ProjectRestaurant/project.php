<?php

$name=$_POST['name'];
$mail=$_POST['mail'];
$cont=$_POST['contact']; 
$birth=$_POST['birth'];
$person=$_POST['person'];
$occ=$_POST['occ'];
$gst=$_POST['gst'];
$total=$_POST['tot'];


if(!empty($name) || !empty($mail) || !empty($cont)  ){	
$host="localhost";
$dbusername="root";
$dbpassword="123456789";
$dbname="reg1";	
$con = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if(mysqli_connect_error()){
	die('CONNECT ERROR ('.mysqli_connect_error().')'
	.mysqli_connect_error());
}
else{
	$SELECT = "SELECT mail from booking2 where mail = ? Limit 1";
	$INSERT = "INSERT into booking2 (name, mail, contact,vistingDate,noOfPerson,occasion, gst, total) values (?, ?, ?,?, ?, ?,?, ?)";
	
	$stmt = $con->prepare($SELECT);
	$stmt->bind_param("s", $mail);
	$stmt->execute();
	$stmt->bind_result($mail);
	$stmt->store_result();
	$rnum = $stmt->num_rows;
	
	if($rnum==0){
		$stmt->close();
		$stmt = $con->prepare($INSERT);
		$contact = $con->real_escape_string($cont);
		$stmt->bind_param("ssdsssss", $name,$mail,$contact,$birth,$person,$occ, $gst, $total);
		$stmt->execute();
		echo "<script>alert('Booked successfully');</script>";
		
	}else{
		echo "<script>alert('some already booked');</script>";
		
	}
	$stmt->close();
	$con->close();
}	
}
else{
	echo "all field required";
	die();
}

?>















