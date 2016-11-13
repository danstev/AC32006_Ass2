<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">
<?php include 'Scripts/ConnectToDB.php';?>
<?php include 'Scripts/sessionStart.php'; ?>

<html>
<title> </title>
<body>
	 <h1>idk : Scubadiver bullshit what did we call us?</h1>

	<article>

	<?php
		if ($_SERVER['REQUEST_METHOD'] === 'GET')
		{
			$orderID = $_GET["orderId"];
			$cusQuery = "SELECT clientID, totalCost FROM orders WHERE orderID = '$orderID';";
			$cusResult = mysql_query($cusQuery);
			$cusRow = mysql_fetch_array($cusResult);
				
			if($cusRow["clientID"] === $_SESSION["cusID"])
			{
				$query = "SELECT quantity, itemCost, productID FROM items_ordered WHERE orderID = $orderID;";
				$result = mysql_query($query);
				echo "<br><div class=\"table-responsive\"><table border=\"5\" bordercolor=\"black\"
				cellpadding=\"10\" width=\"100%\" style=\"border-collapse:
				collapse\" align=\"center\" class=\"table\">
				<tr><th>Product Image</th><th>Product Name</th><th>Quantity</th><th>Cost</th>";
				while($row = mysql_fetch_array($result))
				{
					$productID = $row["productID"];
					$query = "SELECT productName, imageLink FROM products WHERE productID = $productID;";
					$products = mysql_query($query);
					$products = mysql_fetch_array($products);
					$productName = $products["productName"];
					$imagePath = $products["imageLink"];
					echo "<tr>";
					echo "<td><img src = '$imagePath' class=\"img-responsive\" ></td><td>" . $productName ."</td><td>". $row["quantity"]."</td><td>£". $row["itemCost"] . "</td></td>";
					echo "</tr>";
				}
				echo "<tr><td></td><td></td><td>Total Cost:</td><td>" . $cusRow["totalCost"] . "</td></tr>";
				echo "</table></div>";

				/*echo "<br><div class=\"table-responsive\"><table border=\"5\" bordercolor=\"black\"
				cellpadding=\"10\" width=\"100%\" style=\"border-collapse:
				collapse\" align=\"center\" class=\"table\">";*/

			}
			else
			{
				echo "You do not have permission to look at this.";
			}
		}
		else
		{
			//Display form
		}	
?>
	
	</article>


	<?php include 'footer.php';?>


</body>

</html>
