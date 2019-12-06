<?php
	include('header.php');
?>



<html>
<title>ALL CUSTOMER INFO</title>
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


$qry="select * from customer order by cid";
$res=pg_query($conn,$qry);

echo "<h1>CUSTOMER INFORMATION</h1>";

echo "<table border=6px bordercolor=blue>";
echo "<tr><td>Customer Id</td><td>Customer name</td><td>Customer Address</td><td>Customer Contact</td></tr>";

while($arr=pg_fetch_assoc($res))
{

echo "<tr>";
echo "<td>$arr[cid]</td><td>$arr[cname]</td><td>$arr[cadd]</td><td>$arr[ccontact]</td>";
echo "</tr>";
}
echo "</table>";

?>

</center>
</body>
</html>

