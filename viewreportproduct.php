<?php
	include('header.php');
?>

<title>ADD PRODUCT SCREEN</title>

<style type="text/css">

body {background-color:ORANGE;
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


.table{ width:500px;
border:8px solid grey;
padding:25px;
margin:25px
}



</style>
</head>


<body>

<center>
<section style="margin: 10px;">
<fieldset style=" width:800px ">

<legend>ADD PRODUCT INFORMATION.
</legend>
<form action="viewreportproduct.php" method="POST">

<center>
<table width="300px">


<tr>
<td>Month</td></tr>
<tr>
<td><select name="Month"  style="width:300px ;height:30px; -moz-border-radius: 10px; border-radius: 8px;  border:1px ;padding:5px;">
<option>Select Month</option>
<?php

$i=1;
while($i<=12)
{
echo"<option>$i</option>";
$i++;
}

?>


</select></td>
</tr>

<tr>
<td>Year</td></tr>
<tr>
<td><select name="Year"  style="width:300px ;height:30px; -moz-border-radius: 10px; border-radius: 8px;  border:1px ;padding:5px;">
<option>Select Year</option>
<?php
$a=20;
$b=200;
$i=1;
while($i<=18)
{
if($i<10)
echo"<option>$b$i</option>";
else
echo"<option>$a$i</option>";

$i++;
}

?>


</select></td>
</tr>



</table>
<br>
<input type="submit"  value=" submit " style="width:165px;height:30px;font-size:11pt ; color:white;background-color:green;border:2px solid #336600;padding:3px">



























<?php

if($_SERVER['REQUEST_METHOD']=='POST')
	{
	$month=$_POST['Month'];
	$year=$_POST['Year'];


$conn=pg_connect("host=localhost dbname=pest user=root");


$qry="select bill_product.porderid,bill_product.quentity,init_amt,cid,del_phone,gst,total,pbdate from bill_product,order_product where extract(month from pbdate)=$month and extract(year from pbdate)=$year order by porderid";
$res=pg_query($conn,$qry);

echo "<h1>PRODUCT BILL INFORMATION</h1>";

echo "<table border=6px bordercolor=blue>";
echo "<tr><td>Product Order Id</td><td>Quantity</td><td>Initial Amount</td><td>Customer Id</td><td>Delivary Phone</td><td>GST</td><td>Total</td><td>Product Bill Date</td>";

while($arr=pg_fetch_assoc($res))
{
echo "<tr>";
echo "<td>$arr[porderid]</td><td>$arr[quentity]</td><td>$arr[init_amt]</td><td>$arr[cid]</td><td>$arr[del_phone]</td><td>$arr[gst]</td><td>$arr[total]</td><td>$arr[pbdate]</td>";
echo "</tr>";
}
echo "</table>";
echo "<table border=6px bordercolor=blue>";

$qry1="select sum(total),avg(total) from bill_product where extract(month from pbdate)=$month and extract(year from pbdate)=$year";
$res1=pg_query($conn,$qry1);
$arr1=pg_fetch_row($res1);
echo"<tr><td>Total Sell</td><td>$arr1[0]</td></tr><tr><td>Avarage Sell</td><td>$arr1[1]</td>";
echo"</tr>";

echo "</table>";
}
?>

</center>
</body>
</html>

