<?php

	
                $payment_mode=$_POST['payment_mode'];
		$porderid=$_GET['porderid'];

	

			switch($payment_mode)
{
case Cod: header("location:Cod.php?porderid=$porderid");
		break;
case Debit:header("location:Debit.php?porderid=$porderid");
		break;
case Credit:header("location:Credit.php?porderid=$porderid");
		break;
}                 

		









?>

