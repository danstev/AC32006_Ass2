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
	 <?php include "forms/refineandsearch.php";?>



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

	<?php //Builds Query based on user search
	if(isset($_POST["submit"]) && $_POST["search"] !== "")
	{
		$search = $_POST["search"];
		$searchLowCase = strtolower($search);
		$searchStripdPunc = preg_replace('/[^\w]+/', ' ', $searchLowCase);
		$keywords = strtok($searchStripdPunc, " ");
		
		while ($keywords !== false)
   		{
   			$query = "SELECT productID FROM products WHERE productName LIKE '%$keywords%' OR productType LIKE '%$keywords%' OR description LIKE '%$keywords%';";
  			$result = mysql_query($query);
  			
  			$resultArray = [];
  			while($row = mysql_fetch_array($result))
  			{
  				$resultArray[] = $row["productID"];
  			}
  			
  			$resultIDsArray = [];
  			$resultIDsArray = array_merge($resultIDsArray, $resultArray); //'1' specifies return array should have numeric index
  			$keywords = strtok(" ");
   		}

   		$queryCondition = implode(" OR ",$resultIDsArray);
   		$query = "SELECT * from products WHERE productID = $queryCondition;";
   		$result = mysql_query($query);
   	}	
	?>

	<?php
		if(isset($_POST["submit"]) && $_POST["search"] !== "" && $_POST["Product_Type"] !== "All")
		{
			$prodType = $_POST["Product_Type"];
			$search = $_POST["search"];
			$searchLowCase = strtolower($search);
			$searchStripdPunc = preg_replace('/[^\w]+/', ' ', $searchLowCase);
			$keywords = strtok($searchStripdPunc, " ");
		
		while ($keywords !== false)
   		{
   			$query = "SELECT productID FROM products WHERE productType = '$prodType' AND productName LIKE '%$keywords%' OR productType LIKE '%$keywords%' OR description LIKE '%$keywords%';";
  			$result = mysql_query($query);
  			
  			$resultArray = [];
  			while($row = mysql_fetch_array($result))
  			{
  				$resultArray[] = $row["productID"];
  			}
  			
  			$resultIDsArray = [];
  			$resultIDsArray = array_merge($resultIDsArray, $resultArray); //'1' specifies return array should have numeric index
  			$keywords = strtok(" ");
   		}

   		$queryCondition = implode(" OR ",$resultIDsArray);
   		$query = "SELECT * from products WHERE productID = $queryCondition;";
   		$result = mysql_query($query);


		}
	?>

	<?php

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
