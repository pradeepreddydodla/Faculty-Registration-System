<?php
if(isset($_POST['emp-id'])&&isset($_POST['password'])!=0)
{
$emp=$_POST['emp-id'];
$pass=$_POST['password'];
session_start();
$_SESSION['emp1'] = $emp;

if(strcmp($emp,'admin')==0)
{
if(strcmp($pass,'adminpass')==0)
{
echo '<script type="text/javascript">window.location.href="admin.html";</script>';
}
}

else
{  
if(preg_match('/^[0-9]{5}$/',$emp))
 {
  if(preg_match('/^[a-zA-Z0-9 !@#$%&.,]/',$pass))
  {
  $con = mysqli_connect("localhost","root","","csv_db") or die ( "coulnt connect".mysqli_error());
  $sql="SELECT theory1 FROM faculty where emp_id='$emp'";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_array($result,MYSQLI_NUM);
  if($row[0]=='empty')
  {
  $sql="SELECT * FROM faculty where emp_id='$emp'";
  $result=mysqli_query($con,$sql);
  $row=mysqli_fetch_array($result,MYSQLI_NUM);
  if($row[0]==0)
    echo '<script type="text/javascript">alert("Enter correct credentials!"); window.location.href="index.html";</script>';
  else
  {
  if(strcmp($pass,'sitevit')==0)
	header("location: registration.html");
	//<a href='updation.php?var=$emp'>Data link</a>
  else
	echo '<script type="text/javascript">alert("Enter correct credentials!"); window.location.href="index.html";</script>';
  }
  }
  else
  echo '<script type="text/javascript">alert("You have already given your course details!"); window.location.href="index.html";</script>';
  }
else
 
echo '<script type="text/javascript">alert("Enter Valid credentials!"); window.location.href="index.html";</script>';
}
else

echo '<script type="text/javascript">alert("Enter Valid credentials!"); window.location.href="index.html";</script>';
}
}
	?>

