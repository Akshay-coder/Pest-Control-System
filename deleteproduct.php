<?php
$pid=(int)$_GET['pid'];
$con=pg_connect("host=localhost dbname=pest user=root");
$qry="delete from product where pid='$pid'";

pg_query($con,$qry);

header("location:viewproduct.php");
?>

