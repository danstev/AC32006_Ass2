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
else {
			$clientID = $_SESSION["cusID"];
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
				
				

	<h2>Payment Details</h2
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="cardNumber">Card Number</label>  
	  <div class="col-md-4">
	  <input id="cardNumber" name="cardNumber" type="text" placeholder=" <?php if (isset($payment)){echo "Last four digets: ";echo $last4card;}?>" class="form-control input-md">
		
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="nameOnCard">Name On Card</label>  
	  <div class="col-md-4">
	  <input id="nameOnCard" name="nameOnCard" type="text" placeholder="<?php if (isset($payment)){echo $payment[1];}?>" class="form-control input-md">
		
	  </div>
	</div>


	<!-- Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="submit"></label>
	  <div class="col-md-4">
		<button id="submit" name="submit" class="btn btn-primary">Submit</button>
	  </div>
	</div>
				<?php 

}

?>
</fieldset>
</form>

<?php include 'footer.php';?>
<?php include 'scripts/CloseConnection.php';?>	 

</body>

</html>