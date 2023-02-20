<?php

session_start(); 
$emp=$_SESSION['emp1'];

$t1=$_POST['theory1'];
$t2=$_POST['theory2'];
$t3=$_POST['theory3'];
$t4=$_POST['theory4'];
$t5=$_POST['theory5'];
$t6=$_POST['theory6'];



if($t1!='nill' && $t2!='nill' && $t3!='nill' && $t4!='nill' && $t5!='nill' && $t6!='nill')
{
if($t1!=$t2 && $t1!=$t3 && $t1!=$t4 && $t1!=$t5 && $t1!=$t6 && $t2!=$t3 && $t2!=$t4 &&  $t2!=$t5 && $t2!=$t6 && $t3!=$t4 && $t3!=$t5 && $t3!=$t6 && $t4!=$t5 && $t4!=$t6 && $t5!=$t6)
{

$con = mysqli_connect("localhost","root","","csv_db") or die ( "could not connect".mysqli_error());
$query="update faculty set theory1='$t1',theory2='$t2',theory3='$t3',theory4='$t4',theory5='$t5',theory6='$t6' where emp_id=$emp";
$result=mysqli_query($con,$query);
if(!$result)
{
echo "cannot be stored into the database";
}
else
{
echo '<script type="text/javascript">window.location.href="sendemail.php";</script>';
}


}
else
{
echo '<script type="text/javascript">alert("There are two/more courses with same course details !"); window.location.href="registration.html";</script>';
}
}
?>