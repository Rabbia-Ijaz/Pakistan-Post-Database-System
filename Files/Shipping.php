<!DOCTYPE html>
<html>
<head>
	<title> Webpage</title>
	 
</head>
<body>

</body>
</html><!DOCTYPE html>
<html>
<head>
	<style>
		ul 
		{
		  list-style-type: none;
		  margin: 0;
		  padding: 0;
		  overflow: hidden;
		  background-color: #FA2A2A;
		}
		li 
		{
		  float: left;
		}

		li a 
		{
		  display: block;
		  color: white;
		  text-align: center;
		  padding: 14px 19px;
		  text-decoration: none;
		}

		li a:hover:not(.active) 
		{
		  background-color: #B41C1C;
		}

		.active 
		{
		  background-color: #B41C1C;
		}
	</style>
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
</head>
<body style="background-color: White ; Color: Black;">
   
   
    <h1 style="color: #FA2A2A;" align="left"><img src="https://www.pakworkers.com/wp-content/uploads/2011/10/Pakistan-Post-Office-Department-PPO-Logo.png" alt="logo" width="100" height="100" style=" font: italic;
    vertical-align:middle" > Delivery & Information at lightning Speed.</h1>
	<h2 width="100%" align="center">
		<ul>
		  <li><a  href="Webpage.php" >Home</a></li>
		  <li><a href="Order.php">Order</a></li>
		  <li><a href="Tracking.php" >Tracking</a></li>
		   <li><a  href="EmpInvoice.php" >Stamps </a></li>
		   <li><a class="active" href="Shipping.php" >Branch Collection</a></li>
		</ul>
	</h2>
	<h2 width="90%" align="center">Branch Collection</h2>
    <h4>
			<table align="center">
                <form action="" name="StampInvoice" method="POST" align="center">

                    <tr>
					<td > <label> Branch# </label> </td>
					<br>
                    <td>    <input type="textbox" name="branchid" value="" placeholder="Enter Branch number ">  </td>
					</tr>
					 <tr>
					<tr>
					<td > <label> Year </label> </td>
					<br>
                    <td>    <input type="textbox" name="year" value="" placeholder="Enter Year ">  </td>
					</tr>
					 <tr>
					<tr> 
					<td align="left"> <input type="Submit" name="stmp" value="Enter"></td>
					</tr>
				</form>
			</table>
		</h4>
					
                   
	
	 <?php
    
     $db_user = "scott"; 
     $db_pass = "rabbia";
     
      $con = oci_connect($db_user,$db_pass); 
     
      ?>

	 <?php

	if(isset($_REQUEST['stmp'])){
		
		$branid=$_POST['branchid'];
		$year=$_POST['year'];
		$q1="select branchname from PostOffice where Branch#=$branid";

		$p=oci_parse($con,$q1);

		$e=oci_execute($p);

		if(oci_fetch($p)){
			
			$braname=oci_result($p,1);
			
		}

		$q2="select invid,Extract( YEAR from InvDate) Year from (select * from invoice where branch#=$branid) where  Extract( YEAR from InvDate)=$year";

		$p2=oci_parse($con,$q2);

		$e2=oci_execute($p2);

		if(oci_fetch($p2)){
			
			
		}


		$q3="select count(invid) from(select invid,Extract( YEAR from InvDate) Year from (select * from invoice where branch#=$branid) where  Extract( YEAR from InvDate)=$year)";

		$p3=oci_parse($con,$q3);

		$e3=oci_execute($p3);
		$count1=0;

		if(oci_fetch($p3)){
			$count1= oci_result($p3,1);
			
		}

		$q4="select sum(totalprice) from(select invid,totalprice,Extract( YEAR from InvDate) Year from (select * from invoice where branch#=800) where  Extract( YEAR from InvDate)=2019)";

		$p4=oci_parse($con,$q4);

		$e4=oci_execute($p4);
		$sum=0;

		if(oci_fetch($p4)){
			$sum= oci_result($p4,1);
			
		}
	?>
	
	<h4>
		<table border="active" align="center">
			<tr>
				<th>Branch Name</th>
				<th>Year</th>
    			<th>Collections</th>
    			<th>Amount Collected</th>
    			
    			
    		</tr>
    		<tr>
    			<td> <?php echo $braname?></td>
    			<td> <?php echo $year?></td>
    			<td> <?php echo $count1?></td>
    			<td> <?php echo $sum?></td>
    		</tr>
			
		</table>
	</h4>
    <?php

}
?>
</table> 
<table width="40%" align="right">
	
</table>

                        
    </h4>


	

</body>
</html>