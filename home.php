<?php

	include('header1.php');
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

.dropdown {
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


 
	

<MARQUEE LOOP=3 BEHAVIOR=ALTERNATE><h2>Welcome</h2></MARQUEE>


	<div class="dropdown">
  <button class="dropbtn">Product</button>
  <div class="dropdown-content">
    <a href="addproduct.php">ADD</a>
    <a href="viewproduct.php">VIEW</a>
    
  </div> </div>

<div class="dropdown">
  <button class="dropbtn">Service</button>
  <div class="dropdown-content">
    <a href="addservice.php">ADD</a>
    <a href="viewservice.php">VIEW</a>
    
  </div></div>

<div class="dropdown">
  <button class="dropbtn">Employee</button>
  <div class="dropdown-content">
    <a href="addemployee.php">ADD</a>
    <a href="viewemployee.php">VIEW</a>
    
  </div></div>

<div class="dropdown">
  <button class="dropbtn">Allocation</button>
  <div class="dropdown-content">
    <a href="employeeallocateproduct.php">PRODUCT</a>
    <a href="employeeallocateservice.php">SERVICE</a>
    
  </div></div>

<div class="dropdown">
  <button class="dropbtn">Order</button>
  <div class="dropdown-content">
        <a href="vieworderproduct.php">PRODUCT</a>
	<a href="vieworderservice.php">SERVICE</a>
    
  </div></div>

        
 <div class="dropdown">
  <button class="dropbtn">BILL</button>
  <div class="dropdown-content">
        <a href="viewproductbill.php">PRODUCT</a>
	<a href="viewservicebill.php">SERVICE</a>
    
  </div></div>

<div class="dropdown">
  <button class="dropbtn">Report</button>
  <div class="dropdown-content">
        <a href="viewreportproduct.php">PRODUCT</a>
	<a href="viewreportservice.php">SERVICE</a>
    
  </div></div>

<div class="dropdown">
  <button class="dropbtn">Customer</button>
  <div class="dropdown-content">
        <a href="viewCustomer.php">View</a>
	
    
  </div></div>


        


    
	 
	
	
    
      
    </form>
 </div>
<marquee behavior="scroll" direction="left"><img src="viman.jpeg" width="500" height="200" alt="Natural" /></marquee>


<img src="banner1.png" height="100" width="1300"></img>

</body>
</html>

