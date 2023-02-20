<?php

$con = mysqli_connect("localhost","root","","csv_db") or die ( "could not connect".mysqli_error());


header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=data.csv');

// create a file pointer connected to the output stream
$output = fopen('php://output', 'w');

// output the column headings
fputcsv($output, array('Column 1', 'Column 2', 'Column 3'));

// fetch the data
mysql_connect('localhost', 'root', '');
mysql_select_db('csv_db');
$rows = mysql_query('SELECT emp_id,Name,theory1,theory2,theory3,theory4,theory5,theory6 FROM faculty');

// loop over the rows, outputting them
while ($row = mysql_fetch_assoc($rows)) fputcsv($output, $row);
?>