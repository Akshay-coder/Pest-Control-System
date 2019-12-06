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

$porderid=$_GET['porderid'];

$conn=pg_connect("host=localhost dbname=pest user=root");


$qry1="select * from  bill_product where porderid=$porderid";

$qry="select eid from  order_product where porderid=$porderid";

$res=pg_query($conn,$qry);
$a=pg_fetch_row($res);
if($a[0]==1)
{
echo"<script>alert('Employee not Allocated')</script>";

header("location:vieworderproduct.php?cname=$cname");
}


else
{
$res=pg_query($conn,$qry1);
echo "<h1>BILL INFORMATION</h1>";

echo "<table border=6px bordercolor=blue>";
echo "<tr><td>Product Bill Id</td><td>GST</td><td>Quantity</td><td>Initial Amount</td><td>Total</td><td>Date</td><td>Payment Mode</td><td> Payment</td>";

while($arr=pg_fetch_assoc($res))
{
echo "<tr>";
echo "<td>$arr[pbid]</td><td>$arr[gst]</td><td>$arr[quentity]</td><td>$arr[init_amount]</td><td>$arr[total]</td><td>$arr[pbdate]</td><td>"?>
<form action="payment.php?porderid=<?php echo$porderid;?>" method="post"><select name="payment_mode"><?php echo"<option>Cod</option><option>Debit</option></select></td><td><input type='submit' value='Payment'>";
echo"</tr>";
}
echo"</table>";


}

?>
</center>
</body>
</html>

