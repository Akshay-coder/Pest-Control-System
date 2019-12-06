<title>EDIT EMPLOYEE SCREEN</title>

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

<legend>EDIT EMPLOYEE INFORMATION.
</legend>
<form action="employeeprocess.php" method="POST">

<center>
<?php
$sname=$_GET['sname'];
$eid=(int)$_GET['eid'];
$con=pg_connect("host=localhost dbname=pest user=root");
$qry="select * from employee where eid=$eid";
$a=pg_query($con,$qry);
$b=pg_fetch_row($a);
?>

<table width='300px'>
<input type="hidden" name="eid" value="<?php echo$eid;?>">
<tr>
<td>Employee Name:</td></tr>
<td><input type='text' name='ename' value='<?php echo$b[1];?>'</td>
</tr>

<tr>

<tr>
<td>Employee Address:</td></tr>
<tr><td><input type='text' name='eadd' value='<?php echo$b[2];?>'</td>
</tr>

<tr>

<tr>
<td>Employee Contact:</td></tr>
<tr><td><input type='integer' name='econtact' value='<?php echo$b[3];?>'</td>
</tr>

<tr>

<tr>
<td>Employee Salary:</td></tr>
<tr><td><input type='integer' name='esal' value='<?php echo$b[4];?>'</td>
</tr>
<tr>
<?php
$sname=$_GET['sname'];
$con1=pg_connect("host=localhost dbname=pest user=root");
$qry1="select sname from service where sname!='$sname'";
$a1=pg_query($con1,$qry1);
$i=0;
while($b1=pg_fetch_row($a1))
{
?>
<tr>
<td>Service List</td></tr>
<tr>
<td><select name="sname" style="width:300px ;height:30px; -moz-border-radius: 10px; border-radius: 8px;  border:1px ;padding:5px;">
<option><?php echo $sname;?></option>

<option><?php echo$b1[$i];};?></option>




</select></td>
</tr>


</table>
<br>
<input type="submit"  value=" Update " style="width:165px;height:30px;font-size:11pt ; color:white;background-color:green;border:2px solid #336600;padding:3px">
<input type="reset"  value=" clear "style="width:165px; height:30px;font-size:11pt; color:white;background-color:green;border:2px solid #336600;padding:3px">

<br><br>
</html>
