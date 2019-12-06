<!doctype html>
<?php

	include('header.php');
?>

<title>EMPLOYEE ALLOCATION SERVICE</title>

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

<legend>EMPLOYEE ALLOCATION SERVICE
</legend>
<form name="myform" action="empallocateupdateservice.php" method="POST">

<center>
<table width="300px">
<tr>

<tr>
<td>Order List</td></tr>
<tr>
<td><select name="Order" id="Order" onchange="val();" style="width:300px ;height:30px; -moz-border-radius: 10px; border-radius: 8px;  border:1px ;padding:5px;">
<option>Select Order</option>
<?php
$con=pg_connect("host=localhost dbname=pest user=root");
$qry="select sorderid from order_service where emp_allocated=false";
$res=pg_query($con,$qry);
$i=0;
while($a=pg_fetch_row($res))
{
echo"<option>$a[$i]</option>";
}

?>


</select></td>
</tr>

<tr>
<td>Service Name</td></tr>
<tr><td><input type='text' name="service"  readonly="readonly"  id="service" value=''placeholder='Service' required></td>
</tr>




<tr>
<td>Delievery Address</td></tr>
<tr><td><input type="text" name="Address" id="add"  readonly="readonly" placeholder="Address" required></td>
</tr>

<tr>
<td>Delievery E-mail Address</td></tr>
<tr><td><input type="text" name="E-mail_Address" id="email" readonly="readonly" placeholder=" E-mail Address" required></td>
</tr>

<tr>
<td>Delievery Phone Number</td></tr>
<tr><td><input type="tel" name="phonenumber" id="ph" readonly="readonly" pattern="[0-9]{10}" required placeholder="Phone Number"></td>
</tr>

<tr>
<td>Initial Amount</td></tr>
<tr><td><input type="integer" name="Amount" id="amt" readonly="readonly"  required placeholder="Amount"></td>
</tr>

<tr>
<td>Employee List</td></tr>
<tr>
<td><select name="Employee" id="Employee" style="width:300px ;height:30px; -moz-border-radius: 10px; border-radius: 8px;  border:1px ;padding:5px;">
<option>Select Employee</option>
<?php
$con1=pg_connect("host=localhost dbname=pest user=root");
$qry1="select ename from employee where allocated=false and eid !=1 and sid=(select sid from order_service where sorderid=(select max(sorderid) from order_service))";
$res1=pg_query($con1,$qry1);
$i1=0;
while($a1=pg_fetch_row($res1))
{
echo"<option>$a1[$i1]</option>";
}

?>



</table>
<br>
<input type="Submit"  value="Submit" style="width:165px;height:30px;font-size:11pt ; color:white;background-color:green;border:2px solid #336600;padding:3px">
<input type="reset"  value="Cancle" style="width:165px; height:30px;font-size:11pt; color:white;background-color:green;border:2px solid #336600;padding:3px">



<br><br>

</fieldset>
</center>
</body>
</html>
<script>
function val()
{


var xmlHttp;

if(window.XMLHttpRequest)
	xmlHttp = new XMLHttpRequest();
else
	xmlHttp = new ActiveXObject('Microsoft.XMLHTTP');


xmlHttp.onreadystatechange = function()
{
	if(xmlHttp.readyState == 4 && xmlHttp.status==200)
	{
		var str = xmlHttp.responseText;
		var st=str.split(':');
		document.getElementById("service").value = st[0];

		
		document.getElementById("add").value = st[1];


		document.getElementById("email").value = st[2];
		document.getElementById("ph").value = st[3];
		document.getElementById("amt").value = st[4];

		
		

	}
}

var sorderid = document.getElementById("Order").value;

xmlHttp.open("GET","empallocateprocessservice.php?sorderid="+sorderid,true);
xmlHttp.send();





}
</script>

