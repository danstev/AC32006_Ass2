<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">
<?php include  'Scripts\ConnectToDB.php';?>

<html>
<?php include 'header.php';?>
<title> </title>

<body>

	<h1>idk : Scubadiver bullshit what did we call us?</h1>

	<article>
	<h2>Products</h2>

	 //Auto Gen this using DB?
		<form action="Products.php" method ="post">
  		Refine By: <select name="Product Type">
  		<option disabled selected value> Product Type </option>
  		<option value="All">All</option>
   		<option value="Mask">Masks</option>
    	<option value="BCDs">BCDs</option>
    	<option value="Dive Computer">Dive Computers</option>
    	<option value="Fins">Fins</option>
    	<option value="Regulator">Regulators</option>
    	<option value="Snorkel">Snorkels</option>
    	<option value="Wetsuit">Wetsuits</option>
  		</select>
  		<input type="submit" name="submit" value="Submit"/>
		</form>



	<?php //Builds Query based on user refinements
		if(isset($_POST["submit"]) && $_POST["Product_Type"] !== "All")
		{
			$prodType = $_POST["Product_Type"];
			$query = "SELECT * FROM products WHERE productType = '$prodType';";
		}
		else
		{
			$query = "SELECT * FROM products;";
		}
		$result = mysql_query($query);
		?>
		
		<?php //Displays table based on query results
		echo "<br><table border=\"5\" bordercolor=\"black\"
		cellpadding=\"10\" width=\"100%\" style=\"border-collapse:
		collapse\" align=\"center\"><tr>";
		if($result !== false)
		{
			while($row = mysql_fetch_array($result)){
				$imagePath = $row["imageLink"];
				echo "<td>";
				echo $row["productType"]." </td><td>".$row["productName"]."</td><td>". "<img src = '$imagePath' >"."</td><td>".$row["description"]."</td><td>£". $row["cost"];
				echo "</td></tr>";
			}
		}
		else
		{
			echo "Sorry No Products Found";
		}
 		echo "</table>";
		?>
	
	</article>


	<?php include 'footer.php';?>


</body>

</html>
