
<?php

        include('header.php');
?>






<title>ADD SERVICE SCREEN</title>

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

<legend>ADD SERVICE INFORMATION.
</legend>
<form action="addservice.php" method="POST">

<center>
<table width="300px">


<tr>
<td>Service Name:</td></tr>
<tr><td><input type="text" name="Service_Name" placeholder="servicename" required></td>
</tr>

<tr>
<td>Description:</td></tr>
<tr><td><input type="text area" name="Description" placeholder="description" required></td>
</tr>



<tr>
<td>Warrenty Details</td></tr>
<tr><td><input type="integer" name="Warrenty_Details" placeholder="warrentydetails" required></td>
</tr>
<tr>
<td>Amount</td></tr>
<tr><td><input type="integer" name="Amount" placeholder="Amount" required></td>
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
<?php

	if($_SERVER['REQUEST_METHOD']=='POST')
	{
	
                $Service_Name=$_POST['Service_Name'];
		$Description=$_POST['Description'];
		$Warrenty_Details=$_POST['Warrenty_Details'];
		$Amount=$_POST['Amount'];

                 

		$con=pg_connect("host=localhost dbname=pest user=root") or die("Could not connect");



			$query1="insert into service values( nextval('service_sid_seq'),'$Service_Name','$Description',$Warrenty_Details,$Amount)";


		pg_query($con,$query1) or die("Unable to  insert record");

		pg_close($con);
		
		echo "<script> alert('Record is inserted succesfully')</script>";
	}
?>

