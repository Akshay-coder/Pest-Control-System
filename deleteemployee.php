<?php
$eid=(int)$_GET['eid'];
$con=pg_connect("host=localhost dbname=pest user=root");
$qry="delete from employee where eid='$eid'";

pg_query($con,$qry);

header("location:viewemployee.php");
?>


