<?php
	include('cheader1.php');
?>


<html>
<head>
<style>

 body {
    background-color: lightblue;
}


.dropbtn {
    background-color: #4CAF50;
    color: white;
    padding: 16px;
    font-size: 16px;
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
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
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
</head>
<body>


<?php

$cname=$_GET['cname'];
?>

 
	

<MARQUEE LOOP=3 BEHAVIOR=ALTERNATE><h2>Welcome</h2></MARQUEE>


	<div class="dropdown">
  <button class="dropbtn">Profile</button>
  <div class="dropdown-content">
    
    <a href="viewprofilecust.php?cname=<?php echo$cname?>">VIEW</a>
    
  </div></div>

<div class="dropdown">
  <button class="dropbtn">Order Product</button>
  <div class="dropdown-content">
    <a href="createorderproduct.php?cname=<?php echo$cname?>">ADD</a>
    <a href="vieworderproduct.php?cname=<?php echo$cname?>">VIEW</a>
    
  </div></div>

<div class="dropdown">
  <button class="dropbtn">Order Service</button>
  <div class="dropdown-content">
    <a href="createorderservice.php?cname=<?php echo$cname?>">ADD</a>
    <a href="vieworderservice.php?cname=<?php echo$cname?>">VIEW</a>
    
  </div></div>

  
	 
	
	
     
    </form>
 </div>
<marquee behavior="scroll" direction="left"><img src="viman.jpeg" width="500" height="250" alt="Natural" /></marquee>


<img src="banner1.png" width="1365" height="300"></img>

</body>
</html>

