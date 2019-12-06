<?php
	include('header.php');
?>




<html>
<title>ALL ORDER INFO</title>
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


$qry="select * from order_product where emp_allocated=true order by porderid";
$res=pg_query($conn,$qry);
$i=0;


echo "<h1>ORDER PRODUCT INFORMATION</h1>";

echo "<table border=6px bordercolor=blue>";
echo "<tr><td>Product Order Id</td><td>Product Id</td><td>Quentity</td><td>Delivary Address</td><td>Delivary Email</td><td>Delivary PhoneNo</td><td>Initial Amount</td><td>Product Order Date</td><td>Employee ID</td><td>Customer Id</td>";

while($arr=pg_fetch_assoc($res))
{
echo "<tr>";
echo "<td>$arr[porderid]</td><td>$arr[pid]</td><td>$arr[quentity]</td><td>$arr[del_address]</td><td>$arr[del_email]</td><td>$arr[del_phone]</td><td>$arr[init_amt]</td><td>$arr[porder_date]</td>";
echo"<td>$arr[eid]</td><td>$arr[cid]</td>"; 

}
?>
</tr>

</table>



</center>
</body>
</html>
<script>

