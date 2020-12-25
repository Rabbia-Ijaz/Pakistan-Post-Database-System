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
		  <li><a class="active" href="Order.php">Order</a></li>
		  <li><a href="Tracking.php" >Tracking</a></li>
		   <li><a href="EmpInvoice.php" >Stamps</a></li>
		   <li><a href="Shipping.php" >Branch Collection</a></li>
		</ul>
	</h2>
	
   				
     <?php
     $db_sid = "(DESCRIPTION =(ADDRESS = (PROTOCOL = TCP)(HOST = 192.168.1.5)(PORT = 1521))(CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = orcl) ) )";
     $db_user = "scott"; 
     $db_pass = "rabbia";
     
      $con = oci_connect($db_user,$db_pass); 
     
	
?>

<?php
	if(isset($_REQUEST['bremp']))	
		$Totinv=0;
	    $eid="select empid from employee where '$enam'=empname";
	    $eidp=oci_parse($con,$eid);
		
		$eide=oci_execute($eidp);
		
		if(oci_fetch($eidp)){
			$empid=oci_result($eidp,1);
						
		}

		

		$sendiq="select max(InvID) from Invoice";
		
		$sendip=oci_parse($con,$sendiq);
		
		$sendie=oci_execute($sendip);
		
		if(oci_fetch($sendip)){
			$invid=oci_result($sendip,1);
						
		}

		$sendjq="select invdate from Invoice where invid='$invid'";
		
		$sendjp=oci_parse($con,$sendjq);
		
		$sendje=oci_execute($sendjp);
		
		if(oci_fetch($sendjp)){
			$invdate=oci_result($sendjp,1);
			;
			
		}

		$sendkq="select tracid from Invoice where invid='$invid'";
		
		$sendkp=oci_parse($con,$sendkq);
		
		$sendke=oci_execute($sendkp);
		
		if(oci_fetch($sendkp)){
			$trac=oci_result($sendkp,1);
					
		}


		$sendq="select max(SendID) from Sender";
		
		$sendp=oci_parse($con,$sendq);
		
		$sende=oci_execute($sendp);
		
		if(oci_fetch($sendp)){
			$sendid=oci_result($sendp,1);
			
			
		}
		
		$sendiq="select sendname from Sender where sendid='$sendid'";
		
		$sendip=oci_parse($con,$sendiq);
		
		$sendie=oci_execute($sendip);
		
		if(oci_fetch($sendip)){
			$sendnam=oci_result($sendip,1);
			;
			
		}

		$sendjq="select sendaddress from Sender where sendid='$sendid'";
		
		$sendjp=oci_parse($con,$sendjq);
		
		$sendje=oci_execute($sendjp);
		
		if(oci_fetch($sendjp)){
			$sendadd=oci_result($sendjp,1);
			;
			
		}

		$sendkq="select sendPh# from Sender where sendid='$sendid'";
		
		$sendkp=oci_parse($con,$sendkq);
		
		$sendke=oci_execute($sendkp);
		
		if(oci_fetch($sendkp)){
			$sendph=oci_result($sendkp,1);
			
			
		}

		$reciq="select recname from Invoice where invid='$invid'";
		
		$recip=oci_parse($con,$reciq);
		
		$recie=oci_execute($recip);
		
		if(oci_fetch($recip)){
			$recnam=oci_result($recip,1);
			
			
		}
		$recjq="select recaddress from Invoice where invid='$invid'";
		
		$recjp=oci_parse($con,$recjq);
		
		$recje=oci_execute($recjp);
		
		if(oci_fetch($recjp)){
			$recadd=oci_result($recjp,1);
			
			
		}
		$reckq="select recph# from Invoice where invid='$invid'";
		
		$reckp=oci_parse($con,$reckq);
		
		$recke=oci_execute($reckp);
		
		if(oci_fetch($reckp)){
			$recph=oci_result($reckp,1);
						
		}

		$invq="select EmpID from Invoice where invid='$invid'";
		
		$invp=oci_parse($con,$invq);
		
		$inve=oci_execute($invp);
		
		if(oci_fetch($invp)){
			$invemp=oci_result($invp,1);
						
		}
		$branq="select Branch# from Invoice where invid='$invid'";
		
		$branp=oci_parse($con,$branq);
		
		$brane=oci_execute($branp);
		
		if(oci_fetch($branp)){
			$invbranch=oci_result($branp,1);
						
		}
		
		$pariq="select ParID from Invoice where invid='$invid'";
		
		$parip=oci_parse($con,$pariq);
		
		$parie=oci_execute($parip);
		
		if(oci_fetch($parip)){
			$parid=oci_result($parip,1);
						
		}
		$parjq="select ParType from Parcel where ParID='$parid'";
		
		$parjp=oci_parse($con,$parjq);
		
		$parje=oci_execute($parjp);
		
		if(oci_fetch($parjp)){
			$partyp=oci_result($parjp,1);
			
			
		}
		$parkq="select ParWeight from Parcel where parid='$parid'";
		
		$parkp=oci_parse($con,$parkq);
		
		$parke=oci_execute($parkp);
		
		if(oci_fetch($parkp)){
			$parwei=oci_result($parkp,1);
			
			
		}
		$parlq="select InsID from Parcel where parid='$parid'";
		
		$parlp=oci_parse($con,$parlq);
		
		$parle=oci_execute($parlp);
		
		if(oci_fetch($parlp)){
			$parins=oci_result($parlp,1);
			
			
		}
		$parmq="select Service from Invoice where parid='$parid'";
		
		$parmp=oci_parse($con,$parmq);
		
		$parme=oci_execute($parmp);
		
		if(oci_fetch($parmp)){
			$parser=oci_result($parmp,1);
			
			
		}
		$parnq="select stampprice from stamp where stampid=(select stampid from Parcel where parid='$parid')";
		
		$parnp=oci_parse($con,$parnq);
		
		$parne=oci_execute($parnp);
		
		if(oci_fetch($parnp)){
			$parstam=oci_result($parnp,1);
			;
			
		}
		$paroq="select Rateprice from Rate where rateid=(select rateid from Parcel where parid='$parid')";
		
		$parop=oci_parse($con,$paroq);
		
		$paroe=oci_execute($parop);
		
		if(oci_fetch($parop)){
			$parpri=oci_result($parop,1);
			
			
		}
	
		

	



	?>


     <h2 align="center">Receipt</h2>
    <h4>
    	<table>
    	<tr>
	    	<td > <?php echo "Branch# : ".$invbranch ?> </td>
	   
        </tr>	
    	<tr>
	    	<td > <?php echo "Employee ID : ".$invemp ?> </td>

        </tr>	
    	<tr>
	    	<td > <?php echo "Invoice ID : ".$invid ?> </td>
	        
        </tr>
        <tr>        
	        <td > <?php echo "Invoice Date : ".$invdate ?> </td>
	        
        </tr>
         <tr>        
	        <td > <?php echo "Tracking# : ".$trac  ?> </td>
	        
        </tr>
        </table>        
                        
    </h4>
    
	<table align="center">

		    <tr>
				<td > <?php echo "Sender ID : ".$sendid ?> </td>
                
			</tr>
			<tr>
				<td > <?php echo "Sender Name : ".$sendnam ?> </td>
			</tr>
			<tr>    
				<td > <?php echo "Sender Address : ".$sendadd ?> </td>
			</tr>
			<tr> 
				<td > <?php echo "Sender Phone : ".$sendph ?> </td>
			</tr>


           <tr>
				<td > <?php echo "Receiver Name : ".$recnam ?></td>
			</tr>
          
			<tr>    
				<td > <?php echo "Receiver Address : ".$recadd ?> </td>
			</tr>
               
			<tr>   
				<td > <?php echo "Receiver Phone : ".$recph ?> </td>
			</tr>
            
            <tr>    
				<td > <?php echo "Parcel ID : ".$parid ?> </td>
			</tr>
			<tr>    
				<td > <?php echo "Parcel Type : ".$partyp ?> </td>
			</tr>
			<tr>   
				<td > <?php echo "Weight : ".$parwei ?> </td>
			</tr>
			<tr> 
				<td > <?php echo "Insurance ID : ".$parins ?> </td>
			</tr>
            <tr>
				<td > <?php echo "Service : ".$parser ?> </td>
			</tr>
			<tr>    
				<td > <?php echo "Stamp Price : ".$parstam ?> </td>
			</tr>
			<tr>    
				<td > <?php echo "Parcel Price : ".$parpri ?> </td>
			</tr>
			<h4>
				<?php $Totinv=($parpri+$parstam);
				    $updq="Update Invoice Set TotalPrice=$Totinv where InvID=$invid";
		
					$updp=oci_parse($con,$updq);
					
					$upde=oci_execute($updp);

				?>
				<th>    
				<td > <?php echo "Total Price : ".($Totinv) ?> </td>
			</th>
			</h4>
				
			
	</table>
	

</body>
</html>