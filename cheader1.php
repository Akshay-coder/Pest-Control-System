<html>
<head>
<script>
window.history.forward(1);
function noback()
{
window.history.forward();
}
</script>	
</head>
<style>
.back {
 background-image: url("pest_banner.jpg");
 height: 130px;

 padding: 20px;
 font-family: Times New Roman;
}

.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 8px;
    font-size: 6px;
    border: none;
    cursor: pointer;
}

.dropbtn_a {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}


.dropdown {
    position: relative;
    display: inline-block;
}
.dropdown_a {
    position: relative;
    display: inline-block;
}
.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 100px;
    box-shadow: 0px 1px 4px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown-content a:hover {background-color: #f1f1f1}

.dropdown:hover .dropdown-content {
    display: block;
}

.dropdown:hover .dropbtn {
    background-color: #3e8e41;
}
</style>
<body onload="noback();" onpageshow="if(event.persisted)noback();" onunload="">
<div class="back">
	<center> 
<?php

$cname=$_GET['cname'];
?>
<pre>
                                                                                                                                                                <div class="dropdown"> 
<button class="dropbtn">Logout</button>
<div class="dropdown-content"> 
<a href="editusername.php?cname=<?php echo$cname?>"><b>Change Username</b></a>
<a href="editpassword.php?cname=<?php echo$cname?>"><b>Change Password</b></a>
<a href="custlogin.php"><b>Logout</b></a>
    
  </div></div>
</pre>
		
	</center>
</div>
</body>
</html>

