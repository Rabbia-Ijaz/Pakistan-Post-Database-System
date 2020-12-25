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
		  <li><a class="active" href="Tracking.php" >Tracking</a></li>
		   <li><a href="EmpInvoice.php" >Stamps</a></li>
		   <li><a href="Shipping.php" >Branch Collection</a></li>
		</ul>
	</h2>
	
	<h2 width="90%" align="center">Tracking Parcel </h2>

        <h4>
			<table align="center">
                <form action="" name="Tracking" method="POST" align="center">

                    <tr>
					<td > <label> Tracking </label> </td>
					<br>
                    <td>    <input type="textbox" name="tid" value="" placeholder="Enter Tracking Number">  </td>
					</tr>
					<tr> 
					<td align="left"> <input type="Submit" name="trac" value="Enter"></td>
					</tr>
				</form>
			</table>
		</h4>
	
	 <?php
     $db_user = "scott"; 
     $db_pass = "rabbia";
    
      $con = oci_connect($db_user,$db_pass); 
     if($con) 
      { 
       
      } 
   else 
      { die('Could not connect to Oracle: '); 
      
      }
	if(isset($_POST['trac']))
	{

		$tracid=$_POST['tid'];
		$travdate="select TravelDate from Tracking where TracID='$tracid'";
		$p1=oci_parse($con,$travdate);
		$e1=oci_execute($p1);
		if(oci_fetch($p1))
		{
			$r1=oci_result($p1,1);
		}
		$delivdate="select DeliveryDate from Tracking where TracID='$tracid'";
		$p2=oci_parse($con,$delivdate);
		$e2=oci_execute($p2);
		if(oci_fetch($p2))
		{
			$r2=oci_result($p2,1);
		}
		$status="select Status from Tracking where TracID='$tracid'";
	    $p3=oci_parse($con,$status);
		$e3=oci_execute($p3);
		if(oci_fetch($p3))
		{
			$r3=oci_result($p3,1);
		}


		$q4="select * from TrackingHistory where TracID=$tracid";
		$p4=oci_parse($con,$q4);
		$e4=oci_execute($p4);

		$origin="select sendAddress from sender where sendid=(select sendid from invoice where TracID=$tracid)";
	    $po5=oci_parse($con,$origin);
		$eo5=oci_execute($po5);
		if(oci_fetch($po5))
		{
			$ro5=oci_result($po5,1);
		}

		$dest="select RECADDRESS from Invoice where TracID='$tracid'";
	    $pd5=oci_parse($con,$dest);
		$ed5=oci_execute($pd5);
		if(oci_fetch($pd5))
		{
			$rd5=oci_result($pd5,1);
		}

		$date="select INVDATE from Invoice where TracID='$tracid'";
	    $pda5=oci_parse($con,$date);
		$eda5=oci_execute($pda5);
		if(oci_fetch($pda5))
		{
			$rda5=oci_result($pda5,1);

		}

		$sendpost="select MAX(EMPID) from EMPLOYEE where JOBTITLE='PostBoy'";
	    $psp5=oci_parse($con,$sendpost);
		$esp5=oci_execute($psp5);
		if(oci_fetch($psp5))
		{
			$agen=oci_result($psp5,1);
			
		}

		$sendp="select sendname from sender where sendid=(select sendid from invoice where TracID='$tracid')";
	    $pds5=oci_parse($con,$sendp);
		$eds5=oci_execute($pds5);
		if(oci_fetch($pds5))
		{
			$rds5=oci_result($pds5,1);
			
		}

		$sendr="select recname from invoice where TracID='$tracid'";
	    $pdr5=oci_parse($con,$sendr);
		$edr5=oci_execute($pdr5);
		if(oci_fetch($pdr5))
		{
			$rdr5=oci_result($pdr5,1);
			
		}


		
?> 
 		 <table border="active" >
 		 	<tr>
 		 		<h4 align="left">Tracking Summary</h4>
				<td>
					
					<?php echo "Tracking ID : ".$tracid  ?>

				</td>
				
			</tr>
	
		   <tr>
				<td>
					
					<?php echo "Travel Date : ".$r1  ?>

				</td>
				
			</tr>
			<tr>
				<td>
					<?php echo "Delivery Date : ".$r2  ?>
				</td>
				
			</tr>
			<tr>
				<td>
					<label>Status</label>
					<?php echo "Status : ".$r3  ?>
				</td>
				
			</tr>
			</table>	
            <h4 align="center">Tracking History </h4>
			<table style="width: 40%" border="active" align="center">
				<tr>
    			<th>Serial#</th>
    			<th>Current Status</th>
    			<th>Current Location</th>
    			<th>Tracking Date</th>
    		</tr>
			<?php
		    while ($r=oci_fetch_array($p4,OCI_BOTH+OCI_RETURN_NULLS)) {
			?>
			<tr>
				<td><?php echo $r['TRACSNO'] ?></td>
				<td><?php echo $r['CURRSTATUS'] ?></td>
				<td><?php echo $r['CURRLOCATION'] ?></td>
				<td><?php echo $r['TRACDATE'] ?></td>


			</tr>

<?php
}

?>
</table>

	
    <h4 align="center">Shipment Details </h4>
	<table style="width: 40%" border="active" align="center">
			<tr>
    			<th>Agent </th>
    			<th>Origin</th>
    			<th>Destination</th>
    			<th>Booking Date</th>
    			<th>Shipper</th>
    			<th>Consignee</th>
    		</tr>
    		<tr>
				<td><?php echo "2003".$agen ?></td>
				<td><?php echo $ro5 ?></td>
				<td><?php echo $rd5 ?></td>
				<td><?php echo $rda5 ?></td>
				<td><?php echo $rds5 ?></td>
				<td><?php echo $rdr5 ?> </td>
				

			</tr>
	</table>
<?php
}
?>	


	

</body>
</html>