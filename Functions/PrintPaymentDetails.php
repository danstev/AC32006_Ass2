<?php
include 'scripts/ConnectToDB.php';
function printPaymentDetails($result, $ID)
echo "<br><div class=\"table-responsive\"><table border=\"5\" bordercolor=\"black\"
cellpadding=\"10\" width=\"100%\" style=\"border-collapse:
collapse\" align=\"center\" class=\"table\">";
		
if($result !== false)
{
	echo "<tr><th>Payment Details</th><th><form action=\"changeAccountDetailsPayment.php\" method=\"GET\"><input type=\"hidden\" name=\"productID\" value=\"".$ID."\">". "<button type=\"submit\" value=\"Submit\">Edit</button></form></th></tr>";
	while($row = mysql_fetch_array($result))
	{
		echo "<tr><td>Account Holder Name: "."</td><td>".$row["accName"]."</td></tr>";
		echo "<tr><td>Card Number: "."</td><td>".$row["cardNumber"]."</td></tr>";
		echo "<tr><td>Expiration Date"."</td><td>".$row["expDate"]."</td></tr>";
		$addressID = $row["addressID"];
		$query = "SELECT * FROM address WHERE addressID = $addressID;";
		$billingAddress = mysql_query($query);
		while($billingRow = mysql_fetch_array($billingAddress))
		{
			echo "<tr><td>House Number: "."</td><td>".$billingRow["housenumber"]."</td></tr>";
			echo "<tr><td>Street: "."</td><td>".$billingRow["street"]."</td></tr>";
			echo "<tr><td>City: "."</td><td>".$billingRow["city"]."</td></tr>";
			echo "<tr><td>Country: "."</td><td>".$billingRow["country"]."</td></tr>";
			echo "<tr><td>Postcode: "."</td><td>".$billingRow["postcode"]."</td></tr>"; 
		}  
	}
}
else
{
	echo "Sorry Payment Details Found";
}
echo "</table></div>";
include 'scripts/CloseConnection.php';
 ?>