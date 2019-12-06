<?php

$cname=$_GET['cname'];
$porderid=$_GET['porderid'];


$conn=pg_connect("host=localhost dbname=pest user=root");


$qry="select eid from order_product where porderid=$porderid";
$qry1="select payment_mode from bill_product where porderid=$porderid";
$res1=pg_query($conn,$qry1);
$b=pg_fetch_row($res1);

$res=pg_query($conn,$qry);
$a=pg_fetch_row($res);
if($a[0]==1||$b[0]=="Nan")
{
echo"<script>alert('Employee not Allocated')</script>";

header("location:vieworderproduct.php?cname=$cname");
}
else
{
$res=pg_query($conn,$qry);
$a=pg_fetch_row($res);
$qry1="update employee set allocated=false where eid=$a[0]";
$qry2="update order_product set delivered=true where porderid=$porderid";
pg_query($conn,$qry1);
pg_query($conn,$qry2);
header("location:vieworderproduct.php?cname=$cname");
}
?>
