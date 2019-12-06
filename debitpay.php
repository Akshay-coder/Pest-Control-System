<?php

$porderid=$_GET['porderid'];


$conn=pg_connect("host=localhost dbname=pest user=root");
$qry3="select cid from order_product where porderid=$porderid";
$a=pg_query($conn,$qry3);
$b=pg_fetch_row($a);
$qry4="select cname from customer where cid=$b[0]";
$a1=pg_query($conn,$qry4);
$b1=pg_fetch_row($a1);



$qry2="update bill_product set payment_mode='Debit_card' where porderid=$porderid";
pg_query($conn,$qry2);
header("location:vieworderproduct.php?cname=$b1[0]");

?>
