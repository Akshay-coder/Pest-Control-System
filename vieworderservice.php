<?php
	include('cheader.php');
?>

<?php

$cname=$_GET['cname'];
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


$qry="select * from order_service,customer where order_service.cid=customer.cid and cname='$cname' and delivered='false' order by sorderid";
$res=pg_query($conn,$qry);
$i=0;


echo "<h1>ORDER SERVICE INFORMATION</h1>";

echo "<table border=6px bordercolor=blue>";
echo "<tr><td>Service Order Id</td><td>Service Id</td><td>Delivary Address</td><td>Delivary Email</td><td>Delivary PhoneNo</td><td>Initial Amount</td><td>Service Order Date</td><td>Employee ID</td><td>Customer Id</td><td>Delieverd</td>";

while($arr=pg_fetch_assoc($res))
{
$qry1="select sname from service where sid=$arr[sid]";
$p=pg_query($conn,$qry1);
$q=pg_fetch_row($p);
echo "<tr>";
echo "<td>$arr[sorderid]</td><td>$q[0]</td><td>$arr[del_address]</td><td>$arr[del_email]</td><td>$arr[del_phone]</td><td>$arr[init_amt]</td><td>$arr[sorder_date]</td>";
echo"<td><a href='empinfos.php?sorderid=$arr[sorderid]&cname=$cname'><button>View Employee</button></a></td><td><a href='billinfos.php?sorderid=$arr[sorderid]&cname=$cname'><button>View Bill</button></a></td><td><a href='empdeallocates.php?sorderid=$arr[sorderid]&cname=$cname'><button>Done</button></a></td>"; 

}
?>
</tr>

</table>



</center>
</body>
</html>
<script>

