<?php

$cname=$_GET['cname'];

$con=pg_connect("host=localhost dbname=pest user=root");
$qry="select * from customer where cname='$cname'";
$b=pg_query($con,$qry);
while($a=pg_fetch_assoc($b))
{
//echo"$a[pid]<br>";

$str=$a['cadd'].":".$a['emailid'].":".$a['ccontact'];

echo "$str";
}
?>
