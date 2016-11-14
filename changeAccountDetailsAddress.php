<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">

<html>
<title> </title>
<body>
<?php include 'scripts/sessionStart.php';?>
<?php include 'header.php';?>
<?php include 'scripts/ConnectToDB.php'; ?>
<form class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Change Account Details</legend>

<?php
if(session_id() == '' || !isset($_SESSION['privilege'])){
	echo "You do not have permission to see this page. Please log in.";
}
else{
	if($_SESSION["privilege"] === "customer") {
			$clientID = $_SESSION["cusID"];
	}
	else
	{
			$clientID = $_SESSION["empID"];
	}
		
		
			$clientsres = mysql_query("SELECT * from clients WHERE clientID = '$clientID'");
			$clients = MySQL_fetch_row($clientsres);
			$addressres = mysql_query("SELECT * from address WHERE addressID = '$clients[6]'");
			$address = MySQL_fetch_row($addressres);
			$paymentres = mysql_query("SELECT cardDetails, accName from payments_details WHERE clientID = '$clientID'");
			if($paymentres)
			{
				$payment = mySQL_fetch_row($paymentres);
				$last4card = substr($payment[0],-4);
			}		
			
					?>
				
				<h2>Address</h2>
	<!-- Text input-->
	<form action="index.php"  method = "post" class="form-horizontal">
	<div class="form-group">
	  <label class="col-md-4 control-label" for="houseNumber">House Number</label>  
	  <div class="col-md-4">
	  <input id="houseNumber" name="houseNumber" type="text" placeholder="<?php echo $address[3]?>" class="form-control input-md">
		
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="streetName">Street Name</label>  
	  <div class="col-md-4">
	  <input id="streetName" name="streetName" type="text" placeholder="<?php echo $address[2]?>" class="form-control input-md">
		
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="city">City</label>  
	  <div class="col-md-4">
	  <input id="city" name="city" type="text" placeholder="<?php echo $address[4];?>" class="form-control input-md">
		
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="country">Country</label>  
	  <div class="col-md-4">
	  <input id="country" name="country" type="text" placeholder="<?php echo $address[5];?>" class="form-control input-md">
		
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="postcode">Postcode</label>  
	  <div class="col-md-4">
	  <input id="postcode" name="postcode" type="text" placeholder="<?php echo $address[1];?>" class="form-control input-md">
		
	  </div>
	</div>
	
	<!-- Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="submit"></label>
	  <div class="col-md-4">
		<button id="submit" name="submit" class="btn btn-primary">Submit</button>
	  </div>
	</div>

	</form>
				<?php 
				

?>
</fieldset>
</form>
<?php } ?>
<?php include 'footer.php';?>
<?php include 'scripts/CloseConnection.php';?>	 

</body>

</html>