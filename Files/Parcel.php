<!DOCTYPE html><html><head>	<title> Webpage</title>	 </head><body></body></html><!DOCTYPE html><html><head>	<style>		ul 		{		  list-style-type: none;		  margin: 0;		  padding: 0;		  overflow: hidden;		  background-color: #FA2A2A;		}		li 		{		  float: left;		}		li a 		{		  display: block;		  color: white;		  text-align: center;		  padding: 14px 19px;		  text-decoration: none;		}		li a:hover:not(.active) 		{		  background-color: #B41C1C;		}		.active 		{		  background-color: #B41C1C;		}	</style>	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico"></head><body style="background-color: White ; Color: Black;">          <h1 style="color: #FA2A2A;" align="left"><img src="https://www.pakworkers.com/wp-content/uploads/2011/10/Pakistan-Post-Office-Department-PPO-Logo.png" alt="logo" width="100" height="100" style=" font: italic;    vertical-align:middle" > Delivery & Information at lightning Speed.</h1>	<h2 width="100%" align="center">		<ul>		  <li><a  href="Webpage.php" >Home</a></li>		  <li><a class="active" href="Order.php">Order</a></li>		  <li><a href="Tracking.php" >Tracking</a></li>		   <li><a href="EmpInvoice.php" >Stamps</a></li>		   <li><a href="Shipping.php" >Branch Collection</a></li>		</ul>	</h2>	        <h4>			<table align="center">                <form action="" name="Parcel" method="POST" align="center">                	<tr>    						<td> <label> Employee ID </label> </td>		                <td><input type="textbox" name="empid" value="" placeholder="Enter Employee ID"> </td>					</tr>					<tr>    						<td> <label> Branch ID </label> </td>		                <td><input type="textbox" name="braid" value="" placeholder="Enter Branch ID"> </td>					</tr>                	<tr>						<td><h2 width="90%" align="left">Parcel Details</h2></td>					</tr>                  					<tr>    						<td> <label> Parcel Type </label> </td>	                    <td>    <input type="textbox" name="type" value="" placeholder="Enter Parcel Type"> </td>					</tr>                       					<tr>   						<td> <label> Weight </label> </td>	                    <td>    <input type="textbox" name="wgt" value="" placeholder="Enter Weight"> </td>					</tr>					<tr>    						<td> <label>Stamp ID </label> </td>	                    <td>    <input type="textbox" name="stmp" value="" placeholder="Enter Stamp" > </td>					</tr>					<tr> 						<td> <label>Insurance </label> </td>	                    <td>    <input type="textbox" name="ins" value="" placeholder="Enter Insurance ID"> </td>					</tr>					<tr> 						<td> <label>Service </label> </td>	                    <td>    <input type="textbox" name="serv" value="" placeholder="Enter Service "> </td>					</tr>					<tr>						<td><h2 width="90%" align="center">Receiever Details</h2></td>	       					</tr>					<tr>						<td > <label> Receiver Name </label> </td>	                    <td>    <input type="textbox" name="rname" value="" placeholder="Enter Name">  </td>					</tr>                  					<tr>    						<td> <label> Receiver Address </label> </td>	                    <td>    <input type="textbox" name="add" value="" placeholder="Enter Address"> </td>					</tr>                       					<tr>   						<td> <label> Receiver Phone </label> </td>	                    <td>    <input type="textbox" name="ph#" value="" placeholder="Enter Phone #"> </td>					</tr>					<tr> 						<td align="left" > <input type="Submit" name="inv" value="Submit"></td>					</tr>					</form>				</table>				</h4>					                   		 <?php          $db_sid = "(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.1.5)(PORT = 1521))(CONNECT_DATA =      (SERVER = DEDICATED)      (SERVICE_NAME = orcl) ) )";     $db_user = "scott";      $db_pass = "rabbia";           $con = oci_connect($db_user,$db_pass);            ?>		 <?php	if(isset($_REQUEST['inv'])){		$bool1=0;		$empidd=$_POST['empid'];		$braid=$_POST['braid'];		$type=$_POST['type'];		$wgt=$_POST['wgt'];		$stmp=$_POST['stmp'];				$ins=$_POST['ins'];				$serv=$_POST['serv'];				$rname=$_POST['rname'];				$radd=$_POST['add'];				$rph=$_POST['ph#'];				$rateid=0;				$ratq="select RateID from Rate where $wgt between LowWeight AND UpWeight";				$ratp=oci_parse($con,$ratq);				$rate=oci_execute($ratp);				if(oci_fetch($ratp)){			$rateid=oci_result($ratp,1);		}						$parq="select max(ParID) from Parcel";				$parp=oci_parse($con,$parq);				$pare=oci_execute($parp);				$pid=0;				if(oci_fetch($parp)){			$pid=oci_result($parp,1);					}				$pid++;				$tracid=rand(1000,9999);				$tracq="insert into Tracking(TracID,TravelDate,DeliveryDate,Status) values('$tracid',to_date('3/3/2019', 'DD-MM-YYYY'),to_date('4/3/2019', 'DD-MM-YYYY'),'Not Delivered')";						$tracp=oci_parse($con,$tracq);		$trace=oci_execute($tracp);		if($trace){		}				$parinsq="insert into Parcel(ParID,ParType,ParWeight,RateID,StampID,TracID,InsID) values ('$pid','$type','$wgt','$rateid','$stmp','$tracid','$ins')";		$parinsp=oci_parse($con,$parinsq);		$parinse=oci_execute($parinsp);		if($parinse){		}				$iq="select max(InvID) from Invoice";				$ip=oci_parse($con,$iq);				$ie=oci_execute($ip);		if($ie){					}					$invid=0;		if(oci_fetch($ip)){			$invid=oci_result($ip,1);					}				$invid++;		$senq="select max(SendID) from Sender";				$senp=oci_parse($con,$senq);				$sene=oci_execute($senp);				if(oci_fetch($senp)){			$senid=oci_result($senp,1);					}				$totq="select RatePrice from Rate where RateID=$rateid";				$totp=oci_parse($con,$totq);				$tote=oci_execute($totp);				if(oci_fetch($totp)){			$tot=oci_result($totp,1);		}		$invq="Insert INTO Invoice(InvID,ParID,TracID,SendID,EmpID,RecName,RecAddress,RecPh#,Service,TotalPrice,Branch#) values('$invid','$pid','$tracid','$senid','$empidd','$rname','$radd','$rph','$serv','$tot','$braid')";				$invp=oci_parse($con,$invq);				$inve=oci_execute($invp);				if($inve){			echo "Record Inserted";			$bool1=1;		}		else		{			echo "Insert Valid Record";		}		     if($bool1)     {	?>	<form action="Invoice.php" name="Order" method="POST" align="center">	<tr> 		<td align="left" > <input type="Submit" name="reg" value="Next"></td>	</tr>	</form>	<?php}}?>	</body></html>