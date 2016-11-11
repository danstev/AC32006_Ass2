<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">

<html>
<title>Payment Details : Scubadiver </title>
<body>
	<?php include 'header.php';?>
	<?php include 'scripts/sessionStart.php';?>
	<h1>Payment Details : Scubadiver</h1>

	<article>
	
	//Display form if logged in and a customer
	//Display empty form if no payment details are 
	//Display full form if details are in dba_close
	//Give option to delete payment details from db
	<?php
	if($_SESSION['privilege'] == 'customer')
	{
		include 'forms/PaymentDetailForm.php';
		
	}
	
	?>
	</article>


	<?php include 'footer.php';?>


</body>

</html>