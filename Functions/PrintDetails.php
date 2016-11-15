<?php
	function printDetails($result, $ID)
	{
		echo "<br><div class=\"table-responsive\"><table border=\"5\" bordercolor=\"black\"
		cellpadding=\"10\" width=\"100%\" style=\"border-collapse:
		collapse\" align=\"center\" class=\"table\">";
		if($result !== false)
			{
				echo "<tr><th>Your Details</th><th><form action=\"changeAccountDetailsPersonalInfo.php\" method=\"GET\"><input type=\"hidden\" name=\"productID\" value=\"".$ID."\">". "<button type=\"submit\" value=\"Submit\">Edit</button></form></th></tr>";
				while($row = mysql_fetch_array($result))
				{
					echo "<tr><td>Name: "."</td><td>".$row["Fname"]." ".$row["Lname"]."</td></tr>";
					echo "<tr><td>Email: "."</td><td>".$row["email"]."</td></tr>";
					echo "<tr><td>Password:"."</td><td>************</td></tr>";
					echo "<tr><td>Phone Number: "."</td><td>".$row["phonenumber"]."</td></tr>";
					echo "<tr><td>Date of Birth: "."</td><td>".$row["dateofbirth"]."</td></tr>"; 
					$addressID = $row["addressID"];
				}
				return $addressID;
			}
			else
			{
				echo "Sorry No Details Found";
			}
 		echo "</table></div>";
	}


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


	//include 'scripts/ConnectToDB.php';
	function printPaymentDetails($result, $ID)
	{
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
			echo "Sorry No Payment Details Found";
		}
		echo "</table></div>";
		//include 'scripts/CloseConnection.php';
	}

	function printEmployeeDetails($result)
	{
		echo "<br><div class=\"table-responsive\"><table border=\"5\" bordercolor=\"black\"
		cellpadding=\"10\" width=\"100%\" style=\"border-collapse:
		collapse\" align=\"center\" class=\"table\">";
		if($result !== false)
			{
				echo "<tr><th>Your Employee Details</th><th></th></tr>";
				while($row = mysql_fetch_array($result))
				{
					$branchID = $row["branchID"];
					$branchNameQuery = "SELECT Branch_Name FROM branches WHERE branchID = $branchID;";
					$branchNameResult = mysql_query($branchNameQuery);
					$branchNameRow = mysql_fetch_row($branchNameResult);
					$branchName = $branchNameRow[0];
					echo "<tr><td>Branch Name: "."</td><td>".$branchName."</td></tr>";
					echo "<tr><td>Position: "."</td><td>".$row["position"]."</td></tr>";
					echo "<tr><td>Salary: "."</td><td>£".$row["salary"]."</td></tr>";
				}
			}
			else
			{
				echo "Sorry No Details Found";
			}
 		echo "</table></div>";
	}
?>