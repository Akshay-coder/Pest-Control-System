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


$qry="select * from service order by sid";
$res=pg_query($conn,$qry);

echo "<h1>SERVICE INFORMATION</h1>";

echo "<table border=6px bordercolor=blue>";
echo "<tr><td>Service Id</td><td>Service name</td><td>Service Description</td><td>Service Warrenty</td><td>Amount</td><td>Edit</td><td>Delete</td></tr>";

while($arr=pg_fetch_assoc($res))
{
echo "<tr>";
echo "<td>$arr[sid]</td><td>$arr[sname]</td><td>$arr[sdescription]</td><td>$arr[warrenty]</td><td>$arr[amt]</td><td><a href='editservice.php?sid=$arr[sid]'>Edit</a></td><td><a href='deleteservice.php?sid=$arr[sid]'>Delete</a></td>";
echo "</tr>";
}
echo "</table>";

?>

</center>
</body>
</html>

