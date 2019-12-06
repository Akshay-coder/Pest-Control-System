


<html>

<title>UPDATE CUSTOMER SCREEN</title>

<style type="text/css">

body {background-color:#83cbdb;
}

h1 { font-size: 1em; };
 
h2 {font size:2em;
};

#add{
margin: 50px auto;
background-color:grey;

}

input
{
  -moz-border-radius: 10px;
 border-radius: 8px;
    border:1px ;
    padding:5px;
	width:300px
}

fieldset {
    font-family: sans-serif;
    border: 5px solid #1F497D;
    background: #ddd;
    border-radius: 5px;
    padding: 15px;
}

fieldset legend {
    background: #1F497D;
    color: #fff;
    padding: 5px 10px ;
    font-size: 32px;
    border-radius: 5px;
    box-shadow: 0 0 0 5px #ddd;
    margin-left: 20px;
}


</style>
</head>
<body>



<center>
<section style="margin: 10px;">
<fieldset style=" width:800px ">

<legend>CUSTOMER INFORMATION.
</legend>
<form action="custprofile.php" method="POST">

<center>
<table width="300px">
<tr><td>
<h1>CUSTOMER INFORMATION</h1>
</td></tr>


<tr>
<td>CUSTOMER NAME</td></tr>
<tr><td><input type="text" name="cname"  placeholder=" name"></td>
</tr>

<tr>
<td>ADDRESS</td></tr>
<tr><td><input type="text" name="cadd" placeholder="Address" onclick="validate();" required ></td>
</tr>

<tr>
<td>PHONE NUMBER</td></tr>
<tr><td><input type="tel" name="ccontact" placeholder="Phone Number" pattern="[0-9]{10}" required ></td>
</tr>

<tr>
<td>EMAIL ID</td></tr>
<tr><td><input type="text" name="Email" placeholder="Email" pattern="[^@]*@[^@]*" ></td>
</tr>

<tr>
<td>PASSWORD</td></tr>
<tr><td><input type="password" name="Password" id="Password" placeholder="Password" required="[0-9][A-Za-z]{10}" ></td>
</tr>
<tr>
<td>Show Password <input type=checkbox onclick="myfunction()"></td>
</tr>




</table>
<br>
<input type="submit"  value="SignUp" style="width:165px;height:30px;font-size:11pt ; color:white;background-color:green;border:2px solid #336600;padding:3px">
<input type="reset"  value="clear" style="width:165px; height:30px;font-size:11pt; color:white;background-color:green;border:2px solid #336600;padding:3px">
</form>


<br><br>

</fieldset>
</center>
</body>
</html>
<?php
        if($_SERVER['REQUEST_METHOD']=='POST')
        {
        echo"hello";
                $cname=$_POST['cname'];
                $cadd=$_POST['cadd'];
                $ccontact=$_POST['ccontact'];
                $Email=$_POST['Email'];
		$password=$_POST['Password'];


                $con=pg_connect("host=localhost dbname=pest user=root") or die("Could not connect");
		$qry1="select * from customer where emailid='$Email'";
		$c=pg_query($con,$qry1);
		$d=pg_fetch_row($c);
		if ($d==null)
{ 


                $qry="insert into customer(cname,cadd,ccontact,emailid,password) values('$cname','$cadd','$ccontact','$Email','$password')";



                pg_query($con,$qry) or die("Unable to  insert record");

                pg_close($con);

                echo "<script> alert('Welcome to Pest Control')</script>";
		header("location:custlogin.php");
}
else{  echo"<script>alert('Email alreaday registerd')</script>";}
        }
?>
<script>
function validate()
{
var name=document.getElementById("name").value;
for(int i=0;i<name.length;i++)
     if(name[i].isdegit())
alert("Invalid Name");

}
</script>
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
