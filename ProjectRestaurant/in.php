<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
      body{
        background-image:url(https://laurent.qodeinteractive.com/wp-content/uploads/2019/12/home-4-rev-sl-img-1.jpg) ;
        background-size: cover;
        background-repeat: no-repeat;
       
      }
      .regi{
        backdrop-filter: blur(10px);
        box-shadow: 20px 25px 45px rgba(0,0,0,0.1); 
        border:3px solid rgba(255,255,255,0.1);
        border-radius: 20px;
        width:500px;

      }
      .reg{
        min-height:98vh;
      }

      .regist input,button{
        width:50%;
        border-radius: 5px;
      }
      
      html {
          overflow: hidden;
          height: 100%;
      }

      .arrow{
        position: absolute;
        top:10px;
        left:10px;
        position:fixed;
      }

    </style>
     
      </head>

    <body>
      <section id="reg" class="reg d-flex align-items-center w-100">
        <div class="container py-5 py-lg-5 py-md-5 py-sm-5 px-lg-5 ">
            <div class="row py-5 py-lg-5 py-md-5 py-sm-5 px-lg-5 " >
              <div class="col-12 d-flex flex-column align-items-center justify-content-center px-lg-5">  
                <div class="regi w-xxl-50  w-xl-50  w-lg-50  w-md-100  w-sm-100  w-100">

                  <h1 class="fw-bold display-6 px-lg-5" style="color: #E6B325; text-align: center;" >Register here</h1>
                  <span class="arrow"><a style=" text-decoration: none;" href="/OmSaiRamHotel/index.html">
                    <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36" fill="#E6B325" class="bi bi-arrow-left" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M15 8a.5.5 0 0 0-.5-.5H2.707l3.147-3.146a.5.5 0 1 0-.708-.708l-4 4a.5.5 0 0 0 0 .708l4 4a.5.5 0 0 0 .708-.708L2.707 8.5H14.5A.5.5 0 0 0 15 8"/>
                    </svg>
                  </a></span>
                <form action="in.php"  method="post"  class="d-flex flex-column align-items-center regist">
                  <input  class="m-sm-2 m-xxl-2 m-xl-2 m-lg-2 m-md-2 m-2"  type="text" placeholder="First Name" id="name1" name="name1">                   
                  <input  class="m-sm-2 m-xxl-2 m-xl-2 m-lg-2 m-md-2 m-2" type="text" placeholder="Last Name" id="name2" name="name2"> 
                  <input  class="m-sm-2 m-xxl-2 m-xl-2 m-lg-2 m-md-2 m-2" type="text" placeholder="Email" id="mail1" name="mail1">
                  <input  class="m-sm-2 m-xxl-2 m-xl-2 m-lg-2 m-md-2 m-2" type="text" placeholder="Contact"  name="contact1">
                  <button style="background-color:black; border-color: #E6B325; color:white; font-size:large;" onclick="ab1()">Sign Up</button>
                </form>
                </div>
                
              </div>
            </div>
        </div>
       </section>   
       <script src="myscripts.js"></script>
    </body>
</html>


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