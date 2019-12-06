<?php

	
	
		$sorderid=$_POST['soid'];
                
		$Amount=$_POST['amount'];
		$GST=$_POST['GST'];
		$total=$_POST['total'];
                        

			$con=pg_connect("host=localhost dbname=pest user=root");		
                 

		
			$query1="insert into bill_service values( nextval('bill_service_sbid_seq'),$GST,$Amount,$total,now(),$sorderid)";


		pg_query($con,$query1) or die("Unable to  insert record");

		pg_close($con);
		
		echo "<script> alert('Bill is saved succesfully')</script>";
		header("location:employeeallocateservice.php");
	
?>
