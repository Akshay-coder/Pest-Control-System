<!doctype html>
<html><?php

        include('header.php');
?>






        
</head>


<title>CREATE ORDER PRODUCT</title>

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

<legend>CREATE ORDER PRODUCT
</legend>
<form name="myform" action="createorderproduct.php?cname=<?php echo$cname?>" method="POST">

<center>
<table width="300px">
<tr>

<tr>
<td>Service List</td></tr>
<tr>
<td><select name="Product" id="Product" onchange="val();" style="width:300px ;height:30px; -moz-border-radius: 10px; border-radius: 8px;  border:1px ;padding:5px;">
<option>Select Plant Type</option>
<?php
$con=pg_connect("host=localhost dbname=pest user=root");
$qry="select pname from product";
$res=pg_query($con,$qry);
$i=0;
while($a=pg_fetch_row($res))
{
echo"<option>$a[$i]</option>";
}

?>


</select></td>
</tr>
<input type="hidden" name="cname"  id="cname" value="<?php echo$cname?>">
<tr>
<td>Description</td></tr>
<tr><td><input type='text' name="ds"  id="Description" readonly="readonly" value=''placeholder='Description' required></td>
</tr>



<tr>
<td>Amount Per Unit</td></tr>
<tr><td><input type='text' name="amt_per_unit"  id="amt_per_unit" readonly="readonly" value=''placeholder='Amount per unit' required></td>
</tr>

<tr>
<td>Warrenty</td>
<tr><td><input type="integer" name="warrenty" id="warrenty" readonly="readonly" placeholder="Warrenty" required></td>
</tr>





<tr>
<td>Quentity</td>
<tr><td><input type="integer" name="quentity" id="quentity" placeholder="Quentity" required></td>
</tr>






<tr>
<td>ADDRESS</td></tr>
<tr><td><input type="text" name="Address" id="add" onclick="val1()" placeholder="Address" required></td>
</tr>

<tr>
<td>EMAIL ID</td></tr>
<tr><td><input type="text" name="E-mail_Address" id="email" placeholder="Email" pattern="[^@]*@[^@]*" ></td>
</tr>

<tr>
<td>PHONE NUMBER</td></tr>
<tr><td><input type="tel" name="phonenumber" id="phno" pattern="[0-9]{10}" required placeholder="Phone Number"></td>
</tr>






<tr>
<td>Amount</td></tr>
<tr><td><input type="integer" name="Amount" id="amt" onclick="amount()" readonly="readonly" required placeholder="Amount"></td>
</tr>

     



</table>
<br>
<input type="Submit"  value=" Order" style="width:165px;height:30px;font-size:11pt ; color:white;background-color:green;border:2px solid #336600;padding:3px">
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
		document.getElementById("Description").value = st[0];
		
		document.getElementById("amt_per_unit").value = st[1];
		document.getElementById("warrenty").value=st[2];

	}
}

var pname = document.getElementById("Product").value;

xmlHttp.open("GET","orderprocessproduct.php?pname="+pname,true);
xmlHttp.send();





}
</script>
<script>
function amount()
{
var a=document.getElementById("amt_per_unit").value;
var b=document.getElementById("quentity").value;
var c= a*b;
document.getElementById("amt").value=c;
}
</script>
<script>
function val1()
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
		var str1 = xmlHttp.responseText;
		var st1=str1.split(':');
		document.getElementById("add").value = st1[0];
		
		document.getElementById("email").value = st1[1];
		document.getElementById("phno").value=st1[2];

	}
}

var cname = document.getElementById("cname").value;

xmlHttp.open("GET","orderprocessproduct1.php?cname="+cname,true);
xmlHttp.send();





}
</script>







<?php
		$cname=$_GET['cname'];
		if($_SERVER['REQUEST_METHOD']=='POST')
	{
                $Product_Name=$_POST['Product'];
                $quentity=$_POST['quentity'];
                $Address=$_POST['Address'];
                $Email=$_POST['E-mail_Address'];
                $phone=$_POST['phonenumber'];
                $amt=$_POST['Amount'];


                $con=pg_connect("host=localhost dbname=pest user=root") or die("Could not connect");
                $q1="select cid from customer where cname='$cname'";
                $query="select pid from product where pname='$Product_Name'";
                $d=pg_query($con,$q1);
                $b=pg_query($con,$query);
                        $id=pg_fetch_row($d);
                        $c=pg_fetch_row($b);
                        $query1="insert into order_product values( nextval('order_product_porderid_seq'),$c[0],$quentity,'$Address','$Email','$phone',$amt,'now()',1,$id[0]);";


                pg_query($con,$query1) or die("Unable to  insert record");

                pg_close($con);

                echo "<script> alert('Order is Saved succesfully')</script>";
}        
?>

