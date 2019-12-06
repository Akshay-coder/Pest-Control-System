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

<html>
<title>VIEW PROFILE SCREEN</title>

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

<legend>PROFILE
</legend>
<form action="" method="POST">

<center>
<?php
$cname=$_GET['cname'];
$con=pg_connect("host=localhost dbname=pest user=root");
$qry="select * from customer where cname='$cname'";
$a=pg_query($con,$qry);
$b=pg_fetch_row($a);
$cname=$b[1];
$cadd=$b[2];
$ccontact=$b[3];

?>
 

<table width='300px'>



<td>Customer Name:</td></tr>
<td><input type="text" name="cname" readonly="readonly" value='<?php echo $cname;?>'></td>
</tr>

<tr>
<td>Customer Address</td></tr>
<td><input type="text" name="cadd" readonly="readonly" value='<?php echo $cadd;?>'></td>
</tr>

<tr>
<td>Customer Contact:</td></tr>
<td><input type="text" name="ccontact" readonly="readonly" value='<?php echo $ccontact;?>'></td>
</tr>

</table>
<br>
<a href="editprofilecust.php?cname=<?php echo $cname?>"><input type="button"  value="Update" style="width:165px;height:30px;font-size:11pt ; color:white;background-color:green;border:2px solid #336600;padding:3px"></a>
<input type="reset"  value=" clear "style="width:165px; height:30px;font-size:11pt; color:white;background-color:green;border:2px solid #336600;padding:3px">

<br><br>

</html>


        



