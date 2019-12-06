<?php

$pname=$_GET['pname'];

$con=pg_connect("host=localhost dbname=pest user=root");
$qry="select * from product where pname='$pname'";
$b=pg_query($con,$qry);
while($a=pg_fetch_assoc($b))
{
//echo"$a[pid]<br>";

$str=$a['description'].":".$a['amt_per_unit'].":".$a['warrenty'];

echo "$str";
//echo"$a[description]<br>";
//echo"$a[quentity]<br>";
//echo"$a[warrenty]<br>";
//echo"$a[amt_per_unit]<br>";
}
?>




