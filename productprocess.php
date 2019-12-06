<?php
$pid=$_POST['pid'];
$pname=$_POST['pname'];

$quentity=$_POST['quentity'];
$warrenty=$_POST['warrenty'];
$amt_per_unit=$_POST['amt_per_unit'];

$con=pg_connect("host=localhost dbname=pest user=root");
$qry="update product set quentity=$quentity where pid='$pid'";
$qry1="update product set warrenty=$warrenty where pid='$pid'";
$qry2="update product set amt_per_unit=$amt_per_unit where pid='$pid'";
pg_query($con,$qry);
pg_query($con,$qry1);
pg_query($con,$qry2);
header("location:viewproduct.php");
?>
