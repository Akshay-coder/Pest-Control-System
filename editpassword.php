<html>
<head>

<?php
		
		$cname=$_GET['cname'];	
?>

<title>EDIT PASSWORD</title>
<style type="text/css">
body {
background-image:url("photos/fantastic-pest.png");
background-color:lightblue;
font-family: Arial;
font-size: 16px;

}
h1 { font-size: 1em; }
h1, p {
margin-bottom: 10px;
}
strong {
font-weight: bold;
}
.uppercase { text-transform: uppercase; }


#forgetpassword {
margin: 50px auto;
width: 350px;
border-radius: 5px;
}
form fieldset input[type="text"], input[type="password"] 
{
color: black;
background-color: black;
border-radius: 5px;

padding: 5px;
color: grey;
background: transparent;
border: 4px solid black;
border-radius: 5px;
font-family: sans-serif;
font-size: 14px;
height: 45px;
width: 340px; 
}


form fieldset input[type="submit"] ,input[type="button"]{
background-color: #008dde;
border: none;
border-radius: 9px;


color: white;
cursor: pointer;
font-family: Arial;
height: 45px;
width: 340px;

}




</style>
</head>
<body>
<center>
<div id="forgetpassword">
<br>
<h1><font color="black" size= 4>Enter New Password.</font></h1>

<form action="editpassword.php" method="POST">
<input type="hidden" name="cname" value="<?php echo$cname?>">
<fieldset>
<p>Enter New Password<input type="password" id="Password" name="npassword" required name="New Password" value="New Password" onBlur="if(this.value=='')this.value='New Password'" onFocus="if(this.value='New Password')this.value='' "></p>
<p>Enter Password<input type="password" required name="password" value="Password" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' "></p>
<p><input type="checkbox" name="showpassword" onclick="myfunction()" value="showpassword">Show Password</p>
<p><input type="submit" name="Submit" value="Save"></p>
</fieldset>
</center>
</body>
</html>




<?php

		if($_SERVER['REQUEST_METHOD']=='POST')
                {
		
			
                $npassword=$_POST['npassword'];
                $cname=$_POST['cname'];
                $password=$_POST['password'];

                


                $con=pg_connect("host=localhost dbname=pest user=root") or die("Could not connect");



                $qry="select * from customer where cname='$cname'and password='$password'";


                $b=pg_query($con,$qry) or die("<script>alert('Password Not found')</script>");
                $a=pg_fetch_row($b);
		
                	if( $a==null)  {
                                echo"<script>alert('Invalid password')</script>";
				 header("location:custlogin.php?");
				
				}
                        else{ 
				$qry1="update customer set password='$npassword' where cname='$cname'";
				pg_query($con,$qry1); echo"<script>alert('Password is updated')</script>";
                                header("location:custlogin.php");}

   }     
?>

 <script>
function myfunction()
{
var x=document.getElementById("Password");
if(x.type==="password")
{
x.type="text";
}
else
{
x.type="password";
}
}
</script>
