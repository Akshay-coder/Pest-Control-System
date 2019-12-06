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


$qry="select eid from  order_product where porderid=$porderid";
$res=pg_query($conn,$qry);
$a=pg_fetch_row($res);
if($a[0]==1)
{
echo"<script>alert('Employee not Allocated')</script>";

header("location:vieworderproduct.php?cname=$cname");

}
$qry="select * from employee where eid=$a[0]";
$res1=pg_query($conn,$qry);



echo "<h1>EMPLOYEE INFORMATION</h1>";

echo "<table border=6px bordercolor=blue>";
echo "<tr><td>Employee Id</td><td>Employee name</td><td>Employee Contact</td>";

while($arr=pg_fetch_assoc($res1))
{
echo "<tr>";
echo "<td>$arr[eid]</td><td>$arr[ename]</td><td>$arr[econtact]</td>";
echo "</tr>";
}
echo "</table>";


?>

</center>
</body>
</html>

