<?php
		
		$username=$_POST['username'];		

                
                $phoneno=$_POST['phno'];

                $password=$_POST['password'];


                $con=pg_connect("host=localhost dbname=pest user=root") or die("Could not connect");



                $qry="select * from customer where emailid='$username'and ccontact='$phoneno'";


                $b=pg_query($con,$qry) or die("<script>alert('Username Not found')</script>");
                $a=pg_fetch_row($b);
		
                	if( $a==null)  {
                                echo"<script>alert('Invalid Username or contactno')</script>";
				
				}
                        else{ 
				$qry1="update customer set password='$password' where emailid='$username'";
				pg_query($con,$qry1); echo"<script>alert('Password is updated')</script>";
                                header("location:custlogin.php?");}

        
?>


