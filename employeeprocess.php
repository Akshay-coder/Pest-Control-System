<?php
$eid=$_POST['eid'];



$eadd=$_POST['eadd'];
$econtact=$_POST['econtact'];
$esal=$_POST['esal'];
$sname=$_POST['sname'];

$con=pg_connect("host=localhost dbname=pest user=root");
$qry4="select sid from service where sname='$sname'";
$q=pg_query($con,$qry4);
$s=pg_fetch_row($q);
$qry="update employee set eadd='$eadd' where eid='$eid'";
$qry1="update employee set econtact=$econtact where eid='$eid'";
$qry2="update employee set esal=$esal where eid='$eid'";
$qry5="update employee set sid=$s[0] where eid='$eid'";


pg_query($con,$qry);
pg_query($con,$qry1);
pg_query($con,$qry2);
pg_query($con,$qry5);
header("location:viewemployee.php");
?>

~                                       
