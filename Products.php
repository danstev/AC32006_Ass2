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
<title>Products : ScubaDiver</title>

<body>

	<h1>idk : Scubadiver bullshit what did we call us?</h1>

	<article>
	<h2>Products</h2>

	 <?php include "forms/refineandsearch.php";?>

	 
	<?php //Builds Query based on user refinements
		if(isset($_POST["submit"]) && $_POST["Product_Type"] !== "All" && $_POST["search"] === "")
		{
			echo "Line 32";
			$prodType = $_POST["Product_Type"];
			$query = "SELECT * FROM products WHERE productType = '$prodType';";
		}
		else
		{
			$query = "SELECT * FROM products;";
		}
		$result = mysql_query($query);
	?>

	<?php //Builds Query based on user search
	if(isset($_POST["submit"]) && $_POST["search"] !== "" && $_POST["Product_Type"] === "All")
	{
		$search = $_POST["search"];
		$searchLowCase = strtolower($search);
		$searchStripdPunc = preg_replace('/[^\w]+/', ' ', $searchLowCase);
		$keywords = strtok($searchStripdPunc, " ");
		$resultIDsArray = [];
		while ($keywords !== false)
   		{
   			$query = "SELECT productID FROM products WHERE productName LIKE '%$keywords%' OR productType LIKE '%$keywords%' OR description LIKE '%$keywords%';";
  			$result = mysql_query($query);
  			$test = mysql_fetch_array($result);
  			$resultArray = [];
  			while($row = mysql_fetch_array($result))
  			{
  				$resultArray[] = $row["productID"];
  			}
  			
  			$resultIDsArray = array_merge($resultIDsArray, $resultArray);
  			$keywords = strtok(" ");
   		}

   		$queryCondition = implode(",",$resultIDsArray);
   		echo "</br>". $queryCondition;
   		$query = "SELECT * from products WHERE productID IN ($queryCondition);";
   		$result = mysql_query($query);
   	}	
	?>

	<?php
		if(isset($_POST["submit"]) && $_POST["search"] !== "" && $_POST["Product_Type"] !== "All")
		{
			echo "Line 77";
			$prodType = $_POST["Product_Type"];
			$search = $_POST["search"];
			$searchLowCase = strtolower($search);
			$searchStripdPunc = preg_replace('/[^\w]+/', ' ', $searchLowCase);
			$keywords = strtok($searchStripdPunc, " ");
			$resultIDsArray = [];
		while ($keywords !== false)
   		{
   			$query = "SELECT productID FROM products WHERE productType = '$prodType' AND productName LIKE '%$keywords%' OR productType LIKE '%$keywords%' OR description LIKE '%$keywords%';";
  			$result = mysql_query($query);
  			
  			$resultArray = [];
  			while($row = mysql_fetch_array($result))
  			{
  				$resultArray[] = $row["productID"];
  			}
  			
  			
  			$resultIDsArray = array_merge($resultIDsArray, $resultArray);
  			$keywords = strtok(" ");
   		}

   		$queryCondition = implode(" OR ",$resultIDsArray);
   		$query = "SELECT * from products WHERE productID IN ($queryCondition);";
   		$result = mysql_query($query);


		}
	?>

	<?php

	?>
		
	<?php //Displays table based on query results
		echo "<br><div class=\"table-responsive\"><table border=\"5\" bordercolor=\"black\"
		cellpadding=\"10\" width=\"100%\" style=\"border-collapse:
		collapse\" align=\"center\" class=\"table\">";
		
		if($result !== false)
		{
			while($row = mysql_fetch_array($result)){
				$imagePath = $row["imageLink"];
				echo "<tr><form action=\"Product.php\" method=\"GET\"><td>";
				echo "<img src = '$imagePath' class=\"img-responsive\" >"."</td><td>". $row["productName"] ."</td><td>£". $row["cost"] . "</td><td><input type=\"hidden\" name=\"productID\" value=\"".$row["productID"]."\">". "<button type=\"submit\" value=\"Submit\">View Details</button></form></tr>";
				
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
