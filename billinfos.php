<?php
	include('cheader.php');
?>
<?php
$cname=$_GET['cname'];
?>
	





<html>
<title>EMPLOYEE INFO</title>
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

$sorderid=$_GET['sorderid'];

$conn=pg_connect("host=localhost dbname=pest user=root");



$qry="select eid from  order_service where sorderid=$sorderid";
$res=pg_query($conn,$qry);
$a=pg_fetch_row($res);
if($a[0]==1)
{
echo"<script>alert('Employee not Allocated')</script>";

header("location:vieworderservice.php?cname=$cname");
}


$qry="select * from  bill_service where sorderid=$sorderid";
$res=pg_query($conn,$qry);




echo "<h1>BILL INFORMATION</h1>";

echo "<table border=6px bordercolor=blue>";
echo "<tr><td>Service Bill Id</td><td>GST</td><td>Initial Amount</td><td>Total</td><td>Date</td>";

while($arr=pg_fetch_assoc($res))
{
echo "<tr>";
echo "<td>$arr[sbid]</td><td>$arr[gst]</td><td>$arr[amount]</td><td>$arr[total]</td><td>$arr[sbdate]</td>";
echo "</tr>";
}
echo "</table>";


?>

</center>
</body>
</html>

