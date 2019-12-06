<!doctype html>

<html>
<?php
$cname=$_GET['cname'];
?>
        
</head>
<style>
.back {
 background-image: url("pest_banner.jpg");
 height: 130px;

 padding: 20px;
 font-family: Times New Roman;
}
</style>
<div class="back">
        <center>

                <a href="customer_home.php?cname=<?php echo$cname?>" style="float:right;color:black;"><img src=homeimg.png height=35 width=35></img></a>

        </center>
</div>
</body>


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

<legend>CREATE ORDER SERVICE
</legend>
<form name="myform" action="createorderservice.php?cname=<?php echo$cname?>" method="POST">

<center>
<table width="300px">
<tr>

<tr>
<td>Service List</td></tr>
<tr>
<td><select name="Service" id="Service" onchange="val();" style="width:300px ;height:30px; -moz-border-radius: 10px; border-radius: 8px;  border:1px ;padding:5px;">
<option>Select Service</option>
<?php
$con=pg_connect("host=localhost dbname=pest user=root");
$qry="select sname from service";
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
<td>Warrenty</td></tr>
<tr><td><input type='integer' name="warrenty"  id="warrenty" readonly="readonly" value=''placeholder='Warrenty' required></td>
</tr>






<tr>
<td>ADDRESS</td></tr>
<tr><td><input type="text" name="Address" id="add" onclick="val1()" placeholder="Address" required></td>
</tr>

<tr>
<td>EMAIL ID</td></tr>
<tr><td><input type="text" name="Email" id="email" placeholder="Email" pattern="[^@]*@[^@]*" ></td>
</tr>

<tr>
<td>PHONE NUMBER</td></tr>
<tr><td><input type="tel" name="phonenumber" pattern="[0-9]{10}" id="phno" required placeholder="Phone Number"></td>
</tr>

<tr>
<td>Amount</td></tr>
<tr><td><input type="integer" name="Amount" id="amt" readonly="readonly"  required placeholder="Amount"></td>
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

		document.getElementById("warrenty").value = st[1];

		document.getElementById("amt").value = st[2];
		
		

	}
}

var sname = document.getElementById("Service").value;

xmlHttp.open("GET","orderprocessservice.php?sname="+sname,true);
xmlHttp.send();





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

xmlHttp.open("GET","orderprocessservice1.php?cname="+cname,true);
xmlHttp.send();





}
</script>









<?php
		$cname=$_GET['cname'];
		if($_SERVER['REQUEST_METHOD']=='POST')
	{
                $Service_Name=$_POST['Service'];
                
                $Address=$_POST['Address'];
                $Email=$_POST['Email'];
                $phone=$_POST['phonenumber'];
                $amt=$_POST['Amount'];


                $con=pg_connect("host=localhost dbname=pest user=root") or die("Could not connect");
                $q1="select cid from customer where cname='$cname'";
                $query="select sid from service where sname='$Service_Name'";
                $d=pg_query($con,$q1);
                $b=pg_query($con,$query);
                        $id=pg_fetch_row($d);
                        $c=pg_fetch_row($b);
                        $query1="insert into order_service values( nextval('order_service_sorderid_seq'),$c[0],'$Address','$Email','$phone',$amt,'now()',1,$id[0],false);";


                pg_query($con,$query1) or die("Unable to  insert record");

                pg_close($con);

                echo "<script> alert('Order is Saved succesfully')</script>";
}        
?>

