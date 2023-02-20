<?php

//getting the emp1 value through session from validation.php
session_start(); 
$emp=$_SESSION['emp1'];
$con = mysqli_connect("localhost","root","","csv_db") or die ( "couln't connect".mysqli_error());

//getting and storing the theory column from faculty
			$query="select theory1 from faculty where emp_id=$emp";
			$t1=mysqli_query($con,$query);
			$theory1=mysqli_fetch_array($t1,MYSQLI_NUM);

			$query="select theory2 from faculty where emp_id=$emp";
			$t2=mysqli_query($con,$query);
			$theory2=mysqli_fetch_array($t2,MYSQLI_NUM);

			$query="select theory3 from faculty where emp_id=$emp";
			$t3=mysqli_query($con,$query);
			$theory3=mysqli_fetch_array($t3,MYSQLI_NUM);

			$query="select theory4 from faculty where emp_id=$emp";
			$t4=mysqli_query($con,$query);
			$theory4=mysqli_fetch_array($t4,MYSQLI_NUM);

			$query="select theory5 from faculty where emp_id=$emp";
			$t5=mysqli_query($con,$query);
			$theory5=mysqli_fetch_array($t5,MYSQLI_NUM);
			
			$query="select theory6 from faculty where emp_id=$emp";
			$t6=mysqli_query($con,$query);
			$theory6=mysqli_fetch_array($t6,MYSQLI_NUM);


			
		if($theory1[0]!="empty")
  {

//getting the email id from the database
$query="select email_id from faculty where emp_id=$emp";
$email=mysqli_query($con,$query);
$email_id=mysqli_fetch_array($email,MYSQLI_NUM);

//sending mail to the maid id with the registered courses details
$to=$email_id[0];
$subject='Fall Semester 2017-2018 Course Registration confirmation';
$message='Greetings From SITE, VIT university,
          The courses you have registered for Fall Semester 2017-2018 are: 
		  Theory :'.$theory1[0].' , '.$theory2[0].' , '.$theory3[0].' , '.$theory4[0].' , '.$theory5[0].', '.$theory6[0];
$headers='From: sitevitsjt@gmail.com' . "\r\n" .
          'Reply-To: sitevitsjt@gmail.com' . "\r\n" .
		  'MIME-Version: 1.0'. "\r\n" .
		  'Cc: jasmine@vit.ac.in' . "\r\n".
		  'Content-type: text/plain; charset=iso-8859-1; name=Course_Registered' . "\r\n".
		  'X-Mailer: PHP/' . phpversion();
if(mail($to, $subject, $message, $headers))
 echo '<script type="text/javascript">window.location.href="confirmation1.php";</script>';
else
 echo '<script type="text/javascript">window.location.href="mailfail.html";</script>';
 }
 else{
 ?>
 <html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Confirmation</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<style>
	*{
		margin:0;
		padding:0;
	}
	body{
		background-image:url(images/bg.jpg);
		background-size:cover;
	}
	
	</style>

  </head>
  <body>
  
	<div class="container">
	
	<div class="col-md-offset-3 col-md-6">
	<div class="empid" style="margin-top:65px;">
			<h2><u>Unauthorized entry!!!!!!!</u></h2>
			<br/>
			<a href="index.html"><h3>Go To Home Page</h3></a></div></div></div>
			</body>
			</html>
 <?php
 }
?>