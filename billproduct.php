<!doctype html>
<?php

	include('header.php');
?>


<title>GENERATE BILL SCREEN</title>

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

<legend>BILL GENERATION
</legend>
<form action="billproductprocess.php" method="POST">

<center>
<table width="300px">
<tr><td>
<h1> GENERATE BILL</h1>
</td></tr>
<?php

$porderid=(int)$_GET['porderid'];
$con=pg_connect("host=localhost dbname=pest user=root");

$qry1= "Select * from order_product where porderid=$porderid";
$a1=pg_query($con,$qry1);
$b=pg_fetch_row($a1);
?>
<tr>
<td>Product Order Id</td></tr>
<tr><td><input type="integer" name="poid" readonly="readonly" value="<?php echo$porderid?>"></td>
</tr>

<tr>
<td>Product Quentity</td></tr>
<tr><td><input type="integer" name="pquentity" readonly="readonly" value="<?php echo$b[2]?>" placeholder="Product quentity" required ></td>
</tr>

<tr>
<td>Amount</td></tr>
<tr><td><input type="integer" name="amount" id="amt"  readonly="readonly" value="<?php echo$b[6]?>" placeholder="Amount" required ></td>
</tr>

<tr>
<td>GST</td></tr>
<tr><td><input type="integer" name="GST" id="GST" value="" readonly="readonly" onclick="findGST()" placeholder="GST" required ></td>
</tr>

<tr>
<td>Total</td></tr>
<tr><td><input type="integer" name="total" id="total" onclick="findtotal()" readonly="readonly" placeholder="TOTAL" required="" value="" ></td>
</tr>

<tr><td>
</td></tr><tr><td>
</td></tr>
 
 
</td>
</tr>
</table>
<br>
<input type="submit"  value="Generate" style="width:165px;height:30px;font-size:11pt ; color:white;background-color:green;border:2px solid #336600;padding:3px">
<input type="reset"  value="clear" style="width:165px; height:30px;font-size:11pt; color:white;background-color:green;border:2px solid #336600;padding:3px">
</form>


<br><br>

</fieldset>
</center>
</body>
</html>
<script>
function findGST()
{
var a=18/100;

var b=document.getElementById("amt").value;
var c=a*b;
document.getElementById("GST").value=parseInt(c);
}
</script>






<script>
function findtotal()
{
var a=document.getElementById("amt").value
var b=document.getElementById("GST").value;
var c=parseInt(a)+parseInt(b);
document.getElementById("total").value=parseInt(c);
}
</script>





