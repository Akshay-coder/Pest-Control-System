<?php
	include('header.php');
?>



<html>
<title>ALL EMPLLOYEE INFO</title>
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


$qry="select * from employee order by eid";
$res=pg_query($conn,$qry);

echo "<h1>EMPLOYEE INFORMATION</h1>";

echo "<table border=6px bordercolor=blue>";
echo "<tr><td>Employee Id</td><td>Employee name</td><td>Employee Address</td><td>Employee Contact</td><td>Employee Salary</td><td>Service Name</td><td>Edit</td><td>Delete</td></tr>";

while($arr=pg_fetch_assoc($res))
{
$qry1="select sname from service where sid=$arr[sid]";
$s=pg_query($conn,$qry1);
$d=pg_fetch_row($s);
echo "<tr>";
echo "<td>$arr[eid]</td><td>$arr[ename]</td><td>$arr[eadd]</td><td>$arr[econtact]</td><td>$arr[esal]</td><td>$d[0]</td><td><a href='editemployee.php?eid=$arr[eid]&sname=$d[0]'>Edit</a></td><td><a href='deleteemployee.php?eid=$arr[eid]'>Delete</a></td>";
echo "</tr>";
}
echo "</table>";

?>

</center>
</body>
</html>

