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
<form action="index.php"  method = "post" class="form-horizontal">
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
				
		
	<h2>Personal Information</h2

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="email">Email Address</label>  
	  <div class="col-md-4">
	  <input id="email" name="email" type="text" placeholder="<?php echo $clients[4];?>" class="form-control input-md">
		
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="phoneNumber">Phone Number</label>  
	  <div class="col-md-4">
	  <input id="phoneNumber" name="phoneNumber" type="text" placeholder="<?php echo $clients[3]?>" class="form-control input-md">
		
	  </div>
	</div>

	<!-- Password input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="password">Password</label>
	  <div class="col-md-4">
		<input id="password" name="password" type="password" placeholder="********" class="form-control input-md">
		
	  </div>
	</div>
	
	<div class="form-group">
	  <label class="col-md-4 control-label" for="password">Confirm Password</label>
	  <div class="col-md-4">
		<input id="password" name="password" type="password" placeholder="********" class="form-control input-md">
		
	  </div>
	</div>

	<!-- Button -->
	<input type="submit" name="submit" value="Submit"/>
	</fieldset>
</form>
<?php }  ?>


<?php include 'footer.php';?>
<?php include 'scripts/CloseConnection.php';?>	 

</body>

</html>