<?php
$sid=$_POST['sid'];



$warrenty=$_POST['warrenty'];
$Amount=$_POST['amt'];

$con=pg_connect("host=localhost dbname=pest user=root");

$qry1="update service set warrenty=$warrenty where sid='$sid'";
$qry2="update service set amt=$Amount where sid='$sid'";

pg_query($con,$qry1);
pg_query($con,$qry2);
header("location:viewservice.php");
?>

