<<<<<<< HEAD
<form action="Products.php" method ="post" enctype="multipart/form-data">
  	Refine By: <select name ="Product_Type">
<form action="Products.php" method ="post" enctype="multipart/form-data">
		<?php
		
	 	function addCompare($toAdd, $added)
	 	{
	 		echo " IN ADDED ";
			$add = false;
	 		for($i=0; $i < count($added); $i++)
	 		{
	 			if($added[$i] == $toAdd)
	 			{
	 				$add = false;
	 			}
	 			else
	 			{
	 				$add = true;
	 			}
	 		}
	 		return $add;
	 	}
		
	 	$query = "SELECT productType FROM products;";
	 	$result = mysql_query($query);
		$added = array();
		array_push($added, "All");
	 	//echo "<option value=\"All\">All</option>";
	 	while($row = mysql_fetch_assoc($result))
	 	{
			$prod = $row["productType"];
	 		if( addCompare($prod, $added) )
	 		{
	 			array_push($added, $prod);

	 		}
	 	}
		for($x = 0; $x < count($added); $x++) {
			echo '<option value= '. $added[$x] . '>' . $added[$x] . '</option>';
		}
		?>
  		</select>

  	Search: <input type="text" name="search" value="">

  	<input type="submit" name="submit" value="Search"/>
=======
<form action="Products.php" method ="post" enctype="multipart/form-data">
  	Refine By: <select name ="Product_Type">
<form action="Products.php" method ="post" enctype="multipart/form-data">
		<?php
		
	 	function addCompare($toAdd, $added)
	 	{
	 		echo " IN ADDED ";
			$add = false;
	 		for($i=0; $i < count($added); $i++)
	 		{
	 			if($added[$i] == $toAdd)
	 			{
	 				$add = false;
	 			}
	 			else
	 			{
	 				$add = true;
	 			}
	 		}
	 		return $add;
	 	}
		
	 	$query = "SELECT productType FROM products;";
	 	$result = mysql_query($query);
		$added = array();
		array_push($added, "All");
	 	//echo "<option value=\"All\">All</option>";
	 	while($row = mysql_fetch_assoc($result))
	 	{
			$prod = $row["productType"];
	 		if( addCompare($prod, $added) )
	 		{
	 			array_push($added, $prod);

	 		}
	 	}
		for($x = 0; $x < count($added); $x++) {
			echo '<option value= '. $added[$x] . '>' . $added[$x] . '</option>';
		}
		?>
  		</select>

  	Search: <input type="text" name="search" value="">

  	<input type="submit" name="submit" value="Search"/>
>>>>>>> bb1cfb2ea72dc3afa70887398d5f220ddb4750c1
</form>