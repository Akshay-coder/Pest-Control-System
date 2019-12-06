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


$qry1="select total from  bill_product where porderid=$porderid";




$res=pg_query($conn,$qry1);
echo "<h1>Cash On Delivary</h1>";

echo "<table border=6px bordercolor=blue>";
echo "<tr><td>Total</td><td>Cod Charges</td><td>Done</td>";

while($arr=pg_fetch_row($res))
{
echo "<tr>";
echo "<td>$arr[0]</td><td>100</td><td><a href='codpayment.php?porderid=$porderid'><button>Done</button></a></td>";
echo"</tr>";
}
echo"</table>";




?>
</center>
</body>
</html>

