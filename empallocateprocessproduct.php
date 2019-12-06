<?php

$porderid=(int)$_GET['porderid'];

$con=pg_connect("host=localhost dbname=pest user=root");
$qry="select * from order_product where porderid=$porderid";
$b=pg_query($con,$qry);
while($a=pg_fetch_assoc($b))
{
$qry1="select pname from product where pid=$a[pid]";
$b1=pg_query($con,$qry1);
$d=pg_fetch_row($b1);

$str=$d[0].":".$a['quentity'].":".$a['del_address'].":".$a['del_email'].":".$a['del_phone'].":".$a['init_amt'];

echo "$str";

}
?>




