<title>Debit Payment</title>
<?php
$porderid=$_GET['porderid'];
?>
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

<legend>DEBIT CARD
</legend>
<form action="otp.php?porderid=<?php echo$porderid;?>" method="POST">

<center>
<table width="300px">


<tr>
<td>Debit Card No</td></tr>
<tr><td><input type="text" name="Card No" id="No" onkeyup="add()" placeholder="0000-0000-0000-0000" pattern="[0-9-]{19}" required></td>
</tr>

<tr>
<td>Validity</td></tr>
<tr><td><input type="text" name="validity" id="val" placeholder="00/00" onkeyup="add1()"  pattern="[0-9/]{5}" required></td>
</tr>



<tr>
<td>CVC</td></tr>
<tr><td><input type="integer" name="CVC" placeholder="000" required onclick="check()"  pattern="[0-9]{3}" ></td>
</tr>
<tr>



</table>
<br>
<input type="submit"  value=" submit " style="width:165px;height:30px;font-size:11pt ; color:white;background-color:green;border:2px solid #336600;padding:3px">
<input type="reset"  value=" clear" style="width:165px; height:30px;font-size:11pt; color:white;background-color:green;border:2px solid #336600;padding:3px">



<br><br>

</fieldset>
</center>
</body>
</html>
<script>
function add()
{
var x=document.getElementById("No").value;
if(x.length<19)
{
if(x.length>5)
{
var a=x.length-4;
if(a%5==0)
{	
		
document.getElementById("No").value=x+'-';
}
}
else
{
if(x.length%4==0)
{	
		
document.getElementById("No").value=x+'-';
}

}
}
}
</script>
<script>
function add1()
{
var x=document.getElementById("val").value;
if(x.length<4)
{
if(x.length%2==0)
{	
		
document.getElementById("val").value=x+'/';
}
}

}
</script>
<script>
function check()
{
var x=document.getElementById("val").value;
var a=x.split("/");

if(a[0]>12)
{	
	
alert("Wrong month Entered in Validity");
}
else if(a[1]<18)	
{
alert("Your Card Is Expired");
}

}
</script>
