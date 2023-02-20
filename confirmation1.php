<?php
//getting the emp1 value through session from validation.php
session_start(); 
$emp=$_SESSION['emp1'];
?>
<!DOCTYPE html>
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
			<h2><u>Registered Courses</u></h2>
			<h3>Employee Id : <span style="font-size:14pt;"><?php echo $emp;?></span></h3>
			
	</div>
	<div class="col-md-6">
	<h3>Theory Subjects</h3>
	<?php 
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
			?>
			<i><?php echo "-".$theory1[0];?><br/></i>
			<i><?php echo "-".$theory2[0];?><br/></i>
			<i><?php echo "-".$theory3[0];?><br/></i>
			<i><?php echo "-".$theory4[0];?><br/></i>
			<i><?php echo "-".$theory5[0];?><br/></i>
			<i><?php echo "-".$theory6[0];?><br/></i>
				</div>

	
	</div>
	
	<div class="col-md-offset-3 col-md-6">
	<div class="text-center content" style="margin-top:50px;">
	<h1>Thank You</h1>
	<h3>Your Response has been Successfully Updated</h3>
	
	</div>
	  <p class="text-right"><a href="developed.html">Developed By</a></p>
	</div>
	
	
	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
