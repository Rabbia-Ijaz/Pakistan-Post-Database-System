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
		   <li><a class="active" href="EmpInvoice.php" >Stamps </a></li>
		   <li><a href="Shipping.php" >Branch Collection</a></li>
		</ul>
	</h2>
	<h2 width="90%" align="center">Stamp Reciept</h2>
    <h4>
			<table align="center">
                <form action="" name="StampInvoice" method="POST" align="center">

                    <tr>
					<td > <label> Branch# </label> </td>
					<br>
                    <td>    <input type="textbox" name="branchid" value="" placeholder="Enter Branch number">  </td>
					</tr>
					<tr> 
					<td align="left"> <input type="Submit" name="stmp" value="Enter"></td>
					</tr>
				</form>
			</table>
		</h4>
					
                   
	
	 <?php
     $db_sid = "(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.1.5)(PORT = 1521))(CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = orcl) ) )";
     $db_user = "scott"; 
     $db_pass = "rabbia";
     
      $con = oci_connect($db_user,$db_pass); 
     
      ?>

	 <?php

	if(isset($_REQUEST['stmp'])){
		
		$branid=$_POST['branchid'];
		
		}$total=0;

	

		$q1="select stampid,stampprice,count(stampid) Count from (select i.parid,s.stampprice,p.stampid,count(p.stampid) 
			from parcel p
			inner join invoice i
			on i.parid=p.parid
			inner join stamp s
			on p.stampid=s.stampid
			where i.branch#=$branid
			group by p.stampid,i.parid,s.stampprice)
			group by stampid,stampprice";

		$p=oci_parse($con,$q1);

		$e=oci_execute($p);

		if($e){

	?>
	
	<h4>
    	<table style="width: 40% " border="active" align="center" >
    		
    		<tr>
    			<th>Stamp ID</th>
    			<th>Stamp Quantity</th>
    			<th>Stamp Price</th>
    		</tr>
    		<?php
		while ($r=oci_fetch_array($p,OCI_BOTH+OCI_RETURN_NULLS)) {
		     $total=$total+($r['COUNT']*$r['STAMPPRICE']);
			?>
			<tr>
    	
	    	<td > <?php echo "".$r['STAMPID'] ?> </td>
	   
        
	    	<td > <?php echo "".$r['COUNT'] ?> </td>
	    	<td > <?php echo "".$r['STAMPPRICE'] ?> </td>
	   
        </tr>	
    	
        
    <?php
}

}
?>

</table> 
<?php if ($total >0)
{
	?>
<table width="40%" align="right">
	</tr>
			<h4>
				<th>    
				<td > <?php echo "Total Price : ".$total ?> </td>
			</th>
			</h4>
</table>
<?php
}
?>
                        
    </h4>


	

</body>
</html>