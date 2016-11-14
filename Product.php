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
<title> </title>
<body>
	<h1>idk : Scubadiver bullshit what did we call us?</h1>

	<article>
		<?php
			$productID = $_GET["productID"];
			$query = "SELECT productName, cost, imageLink, description FROM products WHERE productID = $productID;";
			$result = mysql_query($query);
			
			echo "<br><div class=\"table-responsive\"><table border=\"5\" bordercolor=\"black\"
			cellpadding=\"10\" width=\"100%\" style=\"border-collapse:collapse\" align=\"center\" class=\"table\">";
			if($result !== false)
			{
				echo "<tr><th>Product</th><th>Product Name</th><th>Description</th><th>Cost</th><th></th></tr>";
				while($row = mysql_fetch_array($result))
				{
					$imagePath = $row["imageLink"];
					echo "<tr><form action=\"shoppingcart.php\" method=\"GET\"><td>"; //Change Action Here
					echo "<img src = '$imagePath' class=\"img-responsive\" >"."</td><td>". $row["productName"]."</td><td>". $row["description"] ."</td><td>£". $row["cost"] . "</td></td><td><input type=\"hidden\" name=\"productID\" value=\"".$productID."\">". "<button type=\"submit\" value=\"Submit\">Add to Cart</button></form></tr>";
				}
			}
			else
			{
				echo "Sorry No Products Found";
			}
 			echo "</table></div>";
		?>
	</article>


	<?php include 'footer.php';?>


</body>

</html>