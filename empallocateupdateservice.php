<?php
$sorderid=$_POST['Order'];
$ename=$_POST['Employee'];
if($ename=="Select Employee")
{
echo"<script>alert('Employee not Allocated')</script>";

header("location:employeeallocateservice.php");
}

else
{


$con=pg_connect("host=localhost dbname=pest user=root");
$qry="select eid from employee where ename='$ename'";
$c=pg_query($con,$qry);
$m=pg_fetch_row($c);


$qry1="update order_service set eid=$m[0] where sorderid=$sorderid"; 
$qry2="update order_service set emp_allocated=true where sorderid='$sorderid'";
$qry3="update employee set allocated=true where ename='$ename'";

pg_query($con,$qry1);
pg_query($con,$qry2);
pg_query($con,$qry3);
header("location:billservice.php?sorderid=$sorderid");
}
?>
