<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">

<html>
<title>Payment Details : DiveMaster</title>
<body>
<?php include 'scripts/sessionStart.php';?>
<?php include 'header.php';?>
<?php include 'scripts/ConnectToDB.php'; ?>
<h1>Payment Details : DiveMaster</h1>
<?php
	if(session_id() == '' || !isset($_SESSION['privilege']))
	{
		echo "You do not have permission to see this page. Please log in.";
	}
	else if($_SESSION["privilege"] === "customer")
	{	
		$clientID = $_SESSION["cusID"];
		$paymentres = mysql_query("SELECT cardNumber, accName, expDate, addressID from payments_details WHERE clientID = '$clientID'");
		if($paymentres)
		{
			$payment = mySQL_fetch_assoc($paymentres);
			$last4card = substr($payment["cardNumber"],-4);
			$addressID = $payment["addressID"];
			$addressResult = mysql_query("SELECT * FROM address WHERE addressID = $addressID");
			$address = mysql_fetch_assoc($addressResult);
			include 'forms/PaymentDetailForm.php';
		}
		else
		{
			echo "No payment Details Found";
		}
		
	}	
	else if(isset($_SESSION['privilege']) && $_SESSION['privilege'] !== "customer")
	{
		echo "You do not have permission to see this page. Only customers have access to this page.";
	}
	else
	{
		echo "You do not have permission to see this page. Please log in.";
	}
?>			
<?php include 'footer.php';?>
<?php include 'scripts/CloseConnection.php';?>	 

</body>

</html>
