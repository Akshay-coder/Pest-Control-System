<html>
<head>

<title>ADMIN LOGIN SCREEN</title>
<style type="text/css">
body {
background-image:url("login.jpg");
background-color:lightblue;
font-family: Arial;
font-size: 16px;

}
h1 { font-size: 1em; }
h1, p {
margin-bottom: 10px;
}
strong {
font-weight: bold;
}
.uppercase { text-transform: uppercase; }

/* ---------- LOGIN ---------- */
#login {
margin: 50px auto;
width: 350px;
border-radius: 5px;
}
form fieldset input[type="text"], input[type="password"] 
{
color: black;
background-color: black;
border-radius: 5px;

padding: 5px;
color: grey;
background: transparent;
border: 4px solid black;
border-radius: 5px;
font-family: sans-serif;
font-size: 14px;
height: 45px;
width: 340px; 
}


form fieldset input[type="submit"] ,input[type="button"]{
background-color: #008dde;
border: none;
border-radius: 9px;


color: white;
cursor: pointer;
font-family: Arial;
height: 45px;
width: 340px;

}




</style>


</head>
<body>

<div id="login">
<br>
<h1><font color="black" size= 4>Welcome  Please login.</font></h1>

<form action="adminlogin.php" method="POST">
<fieldset>
<p><input type="text" required name="name" id="username" value="NAME" onBlur="if(this.value=='')this.value=' NAME'" onFocus="if(this.value=' NAME')this.value='' "></p>
<p><input type="password" required name="password" value="Password" onBlur="if(this.value=='')this.value='Password'" onFocus="if(this.value=='Password')this.value='' "></p>
<br>
<p><input type="submit" name="login" value="Login"></p>

</fieldset>

</body>
</html>





<?php


                if($_SERVER['REQUEST_METHOD']=='POST')
                {
                $username=$_POST['name'];

                $password=$_POST['password'];


                $con=pg_connect("host=localhost dbname=pest user=root") or die("Could not connect");



                $qry="select * from admin where username='$username' and password='$password'";


                $b=pg_query($con,$qry) or die("<script>alert('Username Not found')</script>");
                $a=pg_fetch_row($b);
		
                if( $a==null){
                                echo"<script>alert('Invalid Username or Password')</script>";}
                        else{ 
                                header("location:home.php");}

        }
?>




