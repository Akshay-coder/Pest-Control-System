<?php
    include('header.php');
?>



<html>
<title>ALL PRODUCT INFO</title>
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


$qry="select * from product order by pid";
$res=pg_query($conn,$qry);

echo "<h1>PRODUCT INFORMATION</h1>";

echo "<table border=6px bordercolor=blue>";
echo "<tr><td>Product Id</td><td>Product name</td><td>Product Description</td><td>Product Quentity</td><td>Product Warrenty</td><td>Amount Per Unit</td><td>Edit</td><td>Delete</td></tr>";

while($arr=pg_fetch_assoc($res))
{
echo "<tr>";
echo "<td>$arr[pid]</td><td>$arr[pname]</td><td>$arr[description]</td><td>$arr[quentity]</td><td>$arr[warrenty]</td><td>$arr[amt_per_unit]</td><td><a href='editproduct.php?pid=$arr[pid]'>Edit</a></td><td><a href='deleteproduct.php?pid=$arr[pid]'>Delete</a></td>";
echo "</tr>";
}
echo "</table>";

?>

</center>
</body>
</html>



