<?php
	function printAddressDetails($result, $ID)
	{
		echo "<br><div class=\"table-responsive\"><table border=\"5\" bordercolor=\"black\"
			cellpadding=\"10\" width=\"100%\" style=\"border-collapse:
			collapse\" align=\"center\" class=\"table\">";
		
			if($result !== false)
			{
				echo "<tr><th>Address</th><th><form action=\"changeAccountDetailsAddress.php\" method=\"GET\"><input type=\"hidden\" name=\"productID\" value=\"".$ID."\">". "<button type=\"submit\" value=\"Submit\">Edit</button></form></th></tr>";
				while($row = mysql_fetch_array($result))
				{
					echo "<tr><td>House Number: "."</td><td>".$row["housenumber"]."</td></tr>";
					echo "<tr><td>Street: "."</td><td>".$row["street"]."</td></tr>";
					echo "<tr><td>City: "."</td><td>".$row["city"]."</td></tr>";
					echo "<tr><td>Country: "."</td><td>".$row["country"]."</td></tr>";
					echo "<tr><td>Postcode: "."</td><td>".$row["postcode"]."</td></tr>";    
				}
			}
			else
			{
				echo "Sorry No Address Found";
			}
 		echo "</table></div>";
	}
?>