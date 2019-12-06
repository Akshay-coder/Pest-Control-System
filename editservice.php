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

<legend>EDIT SERVICE INFORMATION.
</legend>
<form action="serviceprocess.php" method="POST">

<center>
<?php
$sid=(int)$_GET['sid'];
$con=pg_connect("host=localhost dbname=pest user=root");
$qry="select * from service where sid=$sid";
$a=pg_query($con,$qry);
$b=pg_fetch_row($a);
?>


<table width='300px'>

<input type="hidden" name="sid" value="<?php echo$sid;?>">
<tr>
<td>Service Name:</td></tr>
<td><input type='text' name='sname'readonly="readonly" value="<?php echo$b[1];?>"></td>
</tr>

<tr>

<tr>
<td>Service Description:</td></tr>
<tr><td><input type='text' name='sdescription' readonly="readonly" value='<?php echo$b[2];?>'></td>
</tr>

<tr>

<tr>
<td>Service Warrenty:</td></tr>
<tr><td><input type='integer' name='warrenty' value='<?php echo$b[3];?>'></td>

</tr>

<tr>

<tr>
<td>Amount:</td></tr>
<tr><td><input type='integer' name='amt' value='<?php echo$b[4];?>'></td>
</tr>

<tr>

<tr>
<td>Employee Id:</td></tr>
<tr><td><input type='integer' name='eid' readonly="readonly" value='<?php echo$b[5];?>'></td>
</tr>

<tr>



</table>
<br>
<input type="submit"  value=" Update " style="width:165px;height:30px;font-size:11pt ; color:white;background-color:green;border:2px solid #336600;padding:3px">
<input type="reset"  value=" clear "style="width:165px; height:30px;font-size:11pt; color:white;background-color:green;border:2px solid #336600;padding:3px">

<br><br>
</html>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
