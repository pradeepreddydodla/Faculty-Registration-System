<?php 
$theory=$_POST['theory'];
$id=$_POST['id'];
$con = mysqli_connect("localhost","root","","csv_db") or die ( "could not connect".mysqli_error());


if(isset($_POST['db']) || $theory!='select' || $id!=NULL)
{
if ($theory!='select')
{
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=theorybased.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('empid', 'Name'));
mysql_connect('localhost', 'root', '');
mysql_select_db('csv_db');
$rows = mysql_query("SELECT emp_id,Name FROM faculty where 
  theory1='$theory' OR 
  theory2='$theory' OR 
  theory3='$theory' OR 
  theory4='$theory' OR 
  theory5='$theory' OR 
  theory6='$theory'");

while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);
  
  }

 
 if($id!=NULL)
 {
 header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Idbased.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('emp_id', 'Name', 'theory1','theory2','theory3','theory4','theory5','theory6'));
mysql_connect('localhost', 'root', '');
mysql_select_db('csv_db');
$rows = mysql_query("SELECT emp_id,Name,theory1,theory2,theory3,theory4,theory5,theory6 FROM faculty where emp_id='".$id."'");
while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);

  
  }
  
  if(isset($_POST['db']))
 {
  header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=Compltefacultylist.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('emp_id', 'Name', 'theory1','theory2','theory3','theory4','theory5','theory6'));

mysql_connect('localhost', 'root', '');
mysql_select_db('csv_db');
$rows = mysql_query('SELECT emp_id,Name,theory1,theory2,theory3,theory4,theory5,theory6 FROM faculty where theory1 <> "empty" ');

// loop over the rows, outputting them
while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);
  }
  
    }
  else
  {
  echo '<script type="text/javascript">alert("select any one of the follwing methods !"); window.location.href="admin.html";</script>';
  }

?>
