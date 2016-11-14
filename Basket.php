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
	<?php include scripts/sessionStart; ?>
	<?php include scripts/connectToDb; ?>
	<?php include header.php; ?>
	
	<?php
	include scripts/basketFunc;
	if( isset($_POST["id"]) )
	{
		if( isset($POST["add"]) )
		{
			addToBasket($_POST["prod"], $_POST["quantity"]);
			header("Location: Products.php");
			exit();
		}
		else if ( isset($_POST["remove"]) )
			removeFromBasket($_POST["prod"]);
			header("Location: Products.php");
			exit();
		}
	else
	{
		displayBasket();
	}
		
		
	?>
	
	<?php include footer.php; ?>

</body>

</html>
