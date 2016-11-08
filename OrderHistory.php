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
	<h1>idk : Scubadiver bullshit what did we call us?</h1>

	<article>

	<?php

	if(session_id() == '')
	{
		

	}
	else if($_SESSION["privilege"] === "customer")
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET')
		{
			$orderID = $_GET["id"];
			$cusQuery = "SELECT * from orders where orderID = '$orderID';";
			$cusResult = mysql_query($cusQuery);
			while($cusRow = mysql_fetch_array($cusResult))
			{
				if($cusRow["clientID"] === $_SESSION["cusID"])
				{
					//Display order
				}
				else
				{
					echo "You do not have permission to look at this.";
				}
			}
		}
		else
		{
			//Display form
		}

	}
	else if($_SESSION["privilege"] === "employee")
	{
		if ($_SERVER['REQUEST_METHOD'] === 'GET')
		{
			$orderID = $_GET["id"];
			$empQuery = "SELECT * from orders where orderID = '$orderID';";
			$empResult = mysql_query($empQuery);
			//Display order
		}
		else
		{
			//Display form
		}

	}




	?>

	</article>


	<?php include 'footer.php';?>


</body>

</html>