<?php
	include('header.php');
?>



<html>
<title>ALL PRODUCT BILL INFO</title>
<head>
<style>

.table{ width:500px;
border:8px solid grey;
padding:25px;
margin:25px
}

</style>
</head>

<body bgcolor=orange>



<center>

<?php


$conn=pg_connect("host=localhost dbname=pest user=root");


$qry="select * from bill_product order by pbid";
$res=pg_query($conn,$qry);

echo "<h1>PRODUCT BILL INFORMATION</h1>";

echo "<table border=6px bordercolor=blue>";
echo "<tr><td>Product Bill Id</td><td>GST</td><td>Product Quantity</td><td>Amount</td><td>Total</td><td>Product Bill Date</td><td>Product Order Id</td>";

while($arr=pg_fetch_assoc($res))
{
echo "<tr>";
echo "<td>$arr[pbid]</td><td>$arr[gst]</td><td>$arr[quentity]</td><td>$arr[init_amount]</td><td>$arr[total]</td><td>$arr[pbdate]</td><td>$arr[porderid]</td>";
echo "</tr>";
}
echo "</table>";

?>

</center>
</body>
</html>

