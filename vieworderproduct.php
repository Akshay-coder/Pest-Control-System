<?php
	include('cheader.php');
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

$cname=$_GET['cname'];

$conn=pg_connect("host=localhost dbname=pest user=root");



$qry="select * from order_product,customer where order_product.cid=customer.cid and cname='$cname' and delivered='false' order by porderid";
$res=pg_query($conn,$qry);
$i=0;


echo "<h1>ORDER PRODUCT INFORMATION</h1>";

echo "<table border=6px bordercolor=blue>";
echo "<tr><td>Product Order Id</td><td>Product</td><td>Quentity</td><td>Delivary Address</td><td>Delivary Email</td><td>Delivary PhoneNo</td><td>Initial Amount</td><td>Product Order Date</td><td>Employee</td><td>Bill</td><td>Delieverd</td>";

while($arr=pg_fetch_assoc($res))
{
$qry1="select pname from product where pid=$arr[pid]";
$p=pg_query($conn,$qry1);
$q=pg_fetch_row($p);
echo "<tr>";
echo "<td>$arr[porderid]</td><td>$q[0]</td><td>$arr[quentity]</td><td>$arr[del_address]</td><td>$arr[del_email]</td><td>$arr[del_phone]</td><td>$arr[init_amt]</td><td>$arr[porder_date]</td>";
echo"<td><a href='empinfo.php?porderid=$arr[porderid]&cname=$cname'><button>View Employee</button></a></td><td><a href='billinfo.php?porderid=$arr[porderid]&cname=$cname'><button>View  Bill </button></a></td><td><a href='empdeallocate.php?porderid=$arr[porderid]&cname=$cname'><button>Done</button></a></td>"; 



}
?>
</tr>

</table>



</center>
</body>
</html>
<script>

