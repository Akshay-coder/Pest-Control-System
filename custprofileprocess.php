<?php
$username=$_POST['emailid'];
$cname=$_POST['cname'];
$cadd=$_POST['cadd'];
$ccontact=$_POST['ccontact'];

$con=pg_connect("host=localhost dbname=pest user=root");
$qry="update customer set cname='$cname' where emailid='$username'";
$qry1="update customer set cadd='$cadd' where emailid='$username'";
$qry2="update customer set ccontact='$ccontact' where emailid='$username'";
pg_query($con,$qry);
pg_query($con,$qry1);
pg_query($con,$qry2);
header("location:viewprofilecust.php?cname=$cname");
?>
