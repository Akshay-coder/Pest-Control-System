<?php
$sid=(int)$_GET['sid'];
$con=pg_connect("host=localhost dbname=pest user=root");
$qry="delete from service where sid='$sid'";

pg_query($con,$qry);

header("location:viewservice.php");
?>


