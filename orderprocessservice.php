<?php

$sname=$_GET['sname'];

$con=pg_connect("host=localhost dbname=pest user=root");
$qry="select * from service where sname='$sname'";
$b=pg_query($con,$qry);
while($a=pg_fetch_assoc($b))
{
//echo"$a[pid]<br>";

$str=$a['sdescription'].":".$a['warrenty'].":".$a['amt'];

echo "$str";
//echo"$a[description]<br>";
//echo"$a[quentity]<br>";
//echo"$a[warrenty]<br>";
//echo"$a[amt_per_unit]<br>";
}
?>




