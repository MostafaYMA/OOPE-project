<!DOCTYPE html>
<html>
	 <head>
    <title>ESTC</title>
    
	<link rel="stylesheet" href="New Tower.css">
	</head>
	<?php

include 'Bar.php'

?>
	<body>
		
		
<div class="row">
  <div class="col-75">
    <div class="container">
      <form action="/New Tower.php">

        <div class="row">
          <div class="col-50">
            <h3>Create New Tower</h3>
            <label for="fname"><i class="fa fa-user"></i> Tower Name</label>
            <input type="text" id="tname" name="towername" placeholder="Enter Tower Name">
<!--            /**********************************************************************/-->  
			  <label for="id"><i class="fa fa-user"></i> Tower ID</label>
            <input type="text" id="ID" name="ID" placeholder="Enter Tower ID">
<!--            /**********************************************************************/-->
			  <label for="Start_Date"><i class="fa fa-envelope"></i> Start Date
            <input type="date" id="Start_Date" name="begin" placeholder="dd/mm/yy">
			  </label>
<!--            /**********************************************************************/-->
			  <div class="Type">
			  <label for="tower type">Tower Phase</label>
			  <select id="tt" name="tower_type">
         			<option value="typeA">Phase 1</option>
          			<option value="typeB">Phase 2</option>
          			<option value="typeC">Phase 3</option>
          		 </select>
				</div>
<!--            /**********************************************************************/-->			  
			 <label for="supname"><i class="fa fa-user"></i>Supervisor</label>
            <input type="text" id="supname" name="Supervisor" placeholder="Enter Supervisor Name">
<!--            /**********************************************************************/-->
			  <label for="pay"><i class="fa fa-user"></i>Payment</label>
            <input type="text" id="payy" name="payment" placeholder="Enter Payment Here">
<!--            /**********************************************************************/-->
			  <label for="adr"><i class="fa fa-address"></i> Address</label>
            <input type="text" id="adr" name="address" placeholder="Enter Address"><br>
<!--            /**********************************************************************/-->            
			   
          </div>
        </div>
       
        <input type="submit" value="Create" class="btn">
      </form>
    </div>
  </div>

</div>
		</body>		
</html>