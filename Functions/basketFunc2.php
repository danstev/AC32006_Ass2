<?php
function displayBasket2()
{
	if(isset($_SESSION["basketItem"]))
	{
		if( empty($_SESSION["basketItem"]) )
		{
			echo "No items in basket";
		}
		else if( !empty($_SESSION["basketItem"]) )
		{
			$baskI = $_SESSION["basketItem"];
			$baskQ = $_SESSION["basketQuantity"];
			$arrlength = count($baskI);
			echo "<br><div class=\"table-responsive\"><table border=\"5\" bordercolor=\"black\"
		cellpadding=\"10\" width=\"100%\" style=\"border-collapse:
		collapse\" align=\"center\" class=\"table\">";
		echo '<tr><td>Product</td><td>Product Image</td><td>Cost</td><td>Quantity</td><td>View details</td><td>Add or Remove</td></tr>';
			for($x = 0; $x < $arrlength; $x++)
			{
				$proID = $baskI[$x];
				$proQuan = $baskQ[$x];
				$query = "select * from products where productID = '$proID';";
				$result = mysql_query($query);
				while($row = mysql_fetch_array($result))
				{
					$imagePath = $row["imageLink"];
					echo "<tr><form action=\"Product.php\" method=\"GET\"><td>";
					echo "<img src = '$imagePath' class=\"img-responsive\" >"."</td><td>". $row["productName"] ."</td><td>£". ($row["cost"] * $proQuan) . "</td><td>$proQuan</td><td><input type=\"hidden\" name=\"productID\" value=\"".$row["productID"]."\">". "<button type=\"submit\" value=\"Submit\">View Details</button></form></td><td>";
					
					include 'forms/AddRemoveItemForm.php';
					echo "</td></tr>";
				}
			}
			echo "</table></div>";
		}
	}
	else
	{
		echo "No basket";
	}
}


function displayBasketButton2()
{
	if( !empty($_SESSION["basketItem"]) )
	{
		$baskI = $_SESSION["basketItem"];
		$baskQ = $_SESSION["basketQuantity"];
		$arrlength = count($baskI);
		$items = 0;
		$totalCost = 0;
		for($x = 0; $x < $arrlength; $x++)
		{
			$proID = $baskI[$x];
			$proQuan = $baskQ[$x];
			
			$query = "select * from products where productID = '$proID';";
			$result = mysql_query($query);
			while($row = mysql_fetch_array($result))
			{
				$items += ($proQuan);
				$totalCost += ($row["cost"] * $proQuan);
			}
		}
			//Display basket button link to checkout
		echo '<div class="leftButton "><form action="basket.php" method ="post"><button class="btn btn-primary btn-sm" <input type="submit">Items: ';
		echo $items;
		echo '<br>';
		echo '£';
		echo $totalCost;
		echo '</button></form></div>';
	}
	else
	{
		echo "No basket";
	}

}

function addToBasket2($prodID, $quan)
{
	echo $prodID;
	$id = $prodID;
	$q = $quan;
	$baskI = $_SESSION["basketItem"];
	$baskQ = $_SESSION["basketQuantity"];
	$arrlength = count($baskI);
	$added = false;
	for($x = 0; $x < $arrlength; $x++)
	{
		if($baskI[$x] == $id)
		{
			$baskQ[$x] += $q;
			$_SESSION["basketQuantity"] = $baskQ;
			$added = true;
		}
	}
			
	if( !$added )
	{
		array_push($baskI, $prodID);
		array_push($baskQ, $q);
		$_SESSION["basketItem"] = $baskI;
		$_SESSION["basketQuantity"] = $baskQ;			
	}
}

function removeFromBasket2($prodID)
{

	$baskI = $_SESSION["basketItem"];
	$baskQ = $_SESSION["basketQuantity"];
	$arrlength = count($baskI);
	$removed = false;
	for($x = 0; $x < $arrlength; $x++)
	{
		if($baskI[$x] == $prodID)
		{
			array_splice($baskI, $x);
			//unset($baskI[$x]);
			array_splice($baskQ, $x);
			//unset($baskQ[$x]);
			$removed = true;
			$_SESSION["basketItem"] = $baskI;
			$_SESSION["basketQuantity"] = $baskI;
		}
	}
			
	if( !$removed )
	{
		echo "Item does not exist in your basket.";
	}
}

?>