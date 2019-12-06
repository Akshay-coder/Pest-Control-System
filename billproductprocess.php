<?php

	
	
		$porderid=$_POST['poid'];
                $pquentity=$_POST['pquentity'];
		$Amount=$_POST['amount'];
		$GST=$_POST['GST'];
		$total=$_POST['total'];
                        

			$con=pg_connect("host=localhost dbname=pest user=root");		
                 

		
			$query1="insert into bill_product values( nextval('bill_product_pbid_seq'),$GST,$pquentity,$Amount,$total,now(),$porderid)";


		pg_query($con,$query1) or die("Unable to  insert record");

		pg_close($con);
		
		echo "<script> alert('Bill is saved succesfully')</script>";
		header("location:employeeallocateproduct.php");
	
?>
