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
	<?php include 'scripts/sessionStart.php'; ?>
	<?php include 'scripts/connectToDb.php'; ?>
	<?php include 'header.php'; ?>
	
	<?php
	
	
	//echo $_POST["prod"];
	//echo $_POST["quantity"];
	//echo $_POST["submit"];
	if( isset( $_POST["submit"]))
	{		
		if( $_POST["submit"] === "Add" )
		{
			include 'functions/basketFunc.php';
			addToBasket($_POST["prod"], $_POST["quantity"]);
			displayBasket();
		}
		else if ( $_POST["submit"] === "Remove" )
		{
			include 'functions/basketFunc.php';
			echo $_POST["remov"];
			removeFromBasket($_POST["remov"]);
			displayBasket();
		}
	}
	else
	{
		include 'functions/basketFunc.php';
		displayBasket();
	}
	
		
	?>
	
	<?php include 'footer.php'; ?>

</body>

</html>
