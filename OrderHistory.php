<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">
<?php include 'Scripts/sessionStart.php'; ?>
<?php include 'databaseoutput.php'; ?>
<?php include 'Scripts/ConnectToDB.php';?>

<html>
<title> </title>
<body>
	<h1>idk : Scubadiver bullshit what did we call us?</h1>

	<article>

	<?php

	if($_SESSION["privilege"] == '')
	{
		echo "<p> please login to view this page </p>";

	}
	else if($_SESSION["privilege"] === "customer")
	{
		$customerID = $_SESSION["cusID"];
		$query = "SELECT orderID, totalCost, orderDate, address FROM orders WHERE clientID = $customerID;";
		$result = mysql_query($query);
		if($result !== false)
		{
			echo "<br><div class=\"table-responsive\"><table border=\"5\" bordercolor=\"black\"
			cellpadding=\"10\" width=\"100%\" style=\"border-collapse:
			collapse\" align=\"center\" class=\"table\">";
			while($row = mysql_fetch_array($result)){
				echo "<tr><form action=\"OrderDetails.php\" method=\"get\">";
				echo "<td>" . $row["orderDate"]."</td><td>" .  $row["address"] . "</td><td>£" .$row["totalCost"]."</td><td>" ."<input type=\"hidden\" name=\"orderid\" value=\"".$row["orderID"]."\">". "<button type=\"submit\" value=\"Submit\">View Details</button>";
				echo "</td></form></tr></a>";
			}
			echo "</table></div>";
		}
		else
		{
			echo "Sorry No Products Found";
		}
	?>

	</article>


	<?php include 'footer.php';?>


</body>

</html>
