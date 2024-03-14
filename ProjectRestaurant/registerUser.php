<?php

$firstname=$_POST['name1'];
$lastname=$_POST['name2'];
$mail=$_POST['mail1']; 
$contact=$_POST['contact1'];



if(!empty($firstname) || !empty($mail) || !empty($contact)){	
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
	$SELECT = "SELECT mail from registeredUser where mail = ? Limit 1";
	$INSERT = "INSERT into registeredUser (firstName, lastName, mail,contact) values (?, ?, ?,?)";
	
	$stmt = $con->prepare($SELECT);
	$stmt->bind_param("s", $mail);
	$stmt->execute();
	$stmt->bind_result($mail);
	$stmt->store_result();
	$rnum = $stmt->num_rows;
	
	if($rnum==0){
		$stmt->close();
		$stmt = $con->prepare($INSERT);
		$contact = $con->real_escape_string($contact);
		$stmt->bind_param("sssd", $firstname,$lastname,$mail,$contact);
		$stmt->execute();
		echo "<script>alert('Registered successfully');</script>";
		
	}else{
		echo "<script>alert('some already registered');</script>";
		
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