<?php
$con=pg_connect("host=localhost dbname=pest user=root");
$qry="select * from product";
$a=pg_query($con,$qry);
echo"<table border=1>";
$i=0;
while($b=pg_fetch_row($a))
{
echo"<tr><td>$b[$i]</td></tr>";
$i=$i+1;
}
?>

