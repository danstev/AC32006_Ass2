<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">
<?php include  'Scripts\sessionStart.php';?>
<?php include  'Scripts\ConnectToDB.php';?>

<html>
<?php include 'header.php';?>
<?php include 'Product.php';?>


<title>Order</title>
<body>
	<h1>    </h1>

	<article>
	
	<?php
		if(session_id() === '')
		{
			echo 'You can checkout here!';
			 include 'forms/Checkoutform.php';
		}
		else{
			echo 'Thank you for signing up!';
		}
	?>
	
	
	
	
	
	<p>List of items etc</p>
	</article>


	<?php include 'footer.php';?>

	<?php include 'scripts/CloseConnection.php';?>	

</body>

</html>