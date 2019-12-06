<?php
	include('header.php');
?>




<html>
<title>ALL SERVICE ORDER INFO</title>
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


$qry="select * from order_service where emp_allocated=true order by sorderid";
$res=pg_query($conn,$qry);
$i=0;


echo "<h1>ORDER SERVICE INFORMATION</h1>";

echo "<table border=6px bordercolor=blue>";
echo "<tr><td>Service Order Id</td><td>Service Id</td><td>Delivary Address</td><td>Delivary Email</td><td>Delivary PhoneNo</td><td>Initial Amount</td><td>Service Order Date</td><td>Employee ID</td><td>Customer Id</td>";

while($arr=pg_fetch_assoc($res))
{
echo "<tr>";
echo "<td>$arr[sorderid]</td><td>$arr[sid]</td><td>$arr[del_address]</td><td>$arr[del_email]</td><td>$arr[del_phone]</td><td>$arr[init_amt]</td><td>$arr[sorder_date]</td>";
echo"<td>$arr[eid]</td><td>$arr[cid]</td>"; 

}
?>
</tr>

</table>



</center>
</body>
</html>
<script>

