<?php

$cname=$_GET['cname'];
$sorderid=$_GET['sorderid'];


$conn=pg_connect("host=localhost dbname=pest user=root");


$qry="select eid from order_service where sorderid=$sorderid";
$res=pg_query($conn,$qry);
$a=pg_fetch_row($res);
if($a[0]==1)
{
echo"<script>alert('Employee not Allocated')</script>";

header("location:vieworderservice.php?cname=$cname");
}
else
{
$qry1="update employee set allocated=false where eid=$a[0]";
$qry2="update order_service set delivered=true where sorderid=$sorderid";
pg_query($conn,$qry1);
pg_query($conn,$qry2);
header("location:vieworderservice.php?cname=$cname");
}
?>
