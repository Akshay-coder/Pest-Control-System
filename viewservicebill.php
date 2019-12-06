<?php
	include('header.php');
?>



<html>
<title>ALL SERVICE BILL INFO</title>
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


$qry="select * from bill_service order by sbid";
$res=pg_query($conn,$qry);

echo "<h1>SERVICE BILL INFORMATION</h1>";

echo "<table border=6px bordercolor=blue>";
echo "<tr><td>Service Bill Id</td><td>GST</td><td>Amount</td><td>Total</td><td>Service Bill Date</td><td>Service Order Id</td>";

while($arr=pg_fetch_assoc($res))
{
echo "<tr>";
echo "<td>$arr[sbid]</td><td>$arr[gst]</td><td>$arr[amount]</td><td>$arr[total]</td><td>$arr[sbdate]</td><td>$arr[sorderid]</td>";
echo "</tr>";
}
echo "</table>";

?>

</center>
</body>
</html>

