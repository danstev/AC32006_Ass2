<?php
function displayBasket()
{
	if(isset($_SESSION["basket"]))
	{
		if( empty($_SESSION["basket"]) )
		{
		
		}
		else if( !empty($_SESSION["basket"]) )
		{
			$bask = $_SESSION["basket"];
			$arrlength = count($bask);
			echo "<br><div class=\"table-responsive\"><table border=\"5\" bordercolor=\"black\"
		cellpadding=\"10\" width=\"100%\" style=\"border-collapse:
		collapse\" align=\"center\" class=\"table\">";
			for($x = 0; $x < $arrlength; $x++)
			{
				//SQL search here?
				$proID = $bask[$x][0];
				$proQuan = $bask[$x][1];
				$query = "select * from products where productID = '$proID';";
				$result = mysql_query($result);
				while($row = mysql_fetch_array($result))
				{
					$imagePath = $row["imageLink"];
					echo "<tr><form action=\"Product.php\" method=\"GET\"><td>";
					echo "<img src = '$imagePath' class=\"img-responsive\" >"."</td><td>". $row["productName"] ."</td><td>£". ($row["cost"] * $proQuan) . "</td><td>.'$proQuan'.</td><input type=\"hidden\" name=\"productID\" value=\"".$row["productID"]."\">". "<button type=\"submit\" value=\"Submit\">View Details</button></form></tr>";
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


function displayBasketButton()
{
	if(isset($_SESSION["basket"]))
	{
		if( empty($_SESSION["basket"]) )
		{
		
		}
		else if( !empty($_SESSION["basket"]) )
		{
			$bask = $_SESSION["basket"];
			$arrlength = count($bask);
			for($x = 0; $x < $arrlength; $x++)
			{
				$proID = $bask[$x][0];
				$proQuan = $bask[$x][1];
				$items;
				$total;
				$query = "select * from products where productID = '$proID';";
				$result = mysql_query($result);
				while($row = mysql_fetch_array($result))
				{
					$items += ($proQuan);
					$totalCost += ($row["cost"] * $proQuan);
				}
			}
			//Display basket button link to checkout
			echo '<a href="basket.php" class="btn btn-primary" role="button" aria-disabled="true"> Items: ';
			echo $items;
			echo '£';
			echo $total;
			echo '</a>';
		}
	}
	else
	{
		echo "No basket";
	}

}

function addToBasket($prodID, $quan)
{
	if(isset($_SESSION["basket"]))
	{
		if( empty($_SESSION["basket"]) )
		{
		
		}
		else if( !empty($_SESSION["basket"]) )
		{
			$bask = $_SESSION["basket"];
			$arrlength = count($bask);
			$added = false;
			for($x = 0; $x < $arrlength; $x++)
			{
				if($bask[$x][0] == $prodID)
				{
					$bask[$x][1] += $quan;
					$_SESSION["basket"] = $bask;
					break;
				}
			}
			
			if( !$added )
			{
				array_push($bask, array("prodID" => $prodID, "quantity" => "quan"));
				$_SESSION["basket"] = $bask;
				break;
			}
		}
	}
	else
	{
		echo "No basket";
	}
}

function removeFromBasket($prodID)
{
	if(isset($_SESSION["basket"]))
	{
		if( empty($_SESSION["basket"]) )
		{
		
		}
		else if( !empty($_SESSION["basket"]) )
		{
			$bask = $_SESSION["basket"];
			$arrlength = count($bask);
			$removed = false;
			for($x = 0; $x < $arrlength; $x++)
			{
				if($bask[$x][0] == $prodID)
				{
					unset($bask[x][0]);
					unset($bask[x][1]);
					$removed = true;
					$_SESSION["basket"] = $bask;
					break;
				}
			}
			
			if( !$removed )
			{
				echo "Item does not exist in your basket.";
			}
			
			
		}
	}
	else
	{
		echo "No basket";
	}
}

?>
