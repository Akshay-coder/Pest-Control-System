<html>
<title>EDIT PRODUCT SCREEN</title>

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


</style>
</head>


<body>
<img src="pest_banner.jpg" width="1350" height="120"></img>
<center>
<section style="margin: 10px;">
<fieldset style=" width:800px ">

<legend>EDIT PRODUCT INFORMATION.
</legend>
<form action="productprocess.php" method="POST">

<center>
<?php
$pid=(int)$_GET['pid'];
$con=pg_connect("host=localhost dbname=pest user=root");
$qry="select * from product where pid=$pid";
$a=pg_query($con,$qry);
$b=pg_fetch_row($a);
$pname=$b[1];
$description=$b[2];
$quentity=$b[3];
$warrenty=$b[4];
$amt_per_unit=$b[5];
?>
 

<table width='300px'>

<input type="hidden" name="pid" value="<?php echo $b[0];?>"> 
<tr>
<td>Product Name:</td></tr>
<td><input type="text" name="pname" readonly="readonly" value='<?php echo $pname;?>'></td>
</tr>

<tr>
<td>Product Description:</td></tr>
<td><input type="text" name="description" readonly="readonly" value='<?php echo $description;?>'></td>
</tr>

<tr>
<td>Product Quentity:</td></tr>
<td><input type="text" name="quentity"  value='<?php echo $quentity;?>'></td>
</tr>

<tr>
<td>Product Warrenty:</td></tr>
<td><input type="text" name="warrenty" value='<?php echo $warrenty;?>'></td>
</tr>

<tr>
<td>Amount Per Unit:</td></tr>
<td><input type="text" name="amt_per_unit"  value='<?php echo $amt_per_unit;?>'></td>
</tr>


</table>
<br>
<input type="submit"  value=" Update " style="width:165px;height:30px;font-size:11pt ; color:white;background-color:green;border:2px solid #336600;padding:3px">
<input type="reset"  value=" clear "style="width:165px; height:30px;font-size:11pt; color:white;background-color:green;border:2px solid #336600;padding:3px">

<br><br>

</html>


        



