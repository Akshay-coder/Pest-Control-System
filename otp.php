
<?php
$porderid=$_GET['porderid'];
?>
<title>Debit Payment</title>

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

<center>
<section style="margin: 10px;">
<fieldset style=" width:800px ">

<legend>OTP
</legend>
<form action="debitpay.php?porderid=<?php echo$porderid;?>" method="POST">

<center>
<table width="300px">
<?php
$porderid=$_GET['porderid'];
$conn=pg_connect("host=localhost dbname=pest user=root");
$qry3="select cid from order_product where porderid=$porderid";
$a=pg_query($conn,$qry3);
$b=pg_fetch_row($a);
$qry4="select ccontact from customer where cid=$b[0]";
$a1=pg_query($conn,$qry4);
$b1=pg_fetch_row($a1);
?>
<tr><td>OTP IS SENT TO <?php echo $b1[0];?> Number</td></tr>
<tr>
<td>One Time Password</td></tr>
<tr><td><input type="text" placeholder="000000" pattern="[0-9]{6}" required></td>
</tr>

</table>
<br>
<input type="submit"  value=" submit " style="width:165px;height:30px;font-size:11pt ; color:white;background-color:green;border:2px solid #336600;padding:3px">
<input type="reset"  value=" clear" style="width:165px; height:30px;font-size:11pt; color:white;background-color:green;border:2px solid #336600;padding:3px">



<br><br>

</fieldset>
</center>
</body>
</html>
