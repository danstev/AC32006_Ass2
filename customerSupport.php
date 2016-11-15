<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">

<html>
<title> </title>
<body>
<?php include 'Scripts/sessionStart.php';?>

<?php include 'header.php';?>
<?php include 'databaseoutput.php';?>
<?php include 'Scripts/ConnectToDB.php';?>



	<h1>Customer Support Of DiveMasters</h1>

	<article>
	<h2></h2>
	<p></p>
	</article>
	
    <br>
	<h2>Customers' Requests </h2>
	<?php 
$query = "SELECT TicketID ,OrderID ,Complaint , Date_opened, Date_closed FROM help_tickets;";
$result = mysql_query($query);

printTable($result);
?>



<br><br><br>
<div class=text-center>

<form action="customerSupport.php" method ="post" enctype="multipart/form-data">
<h4>Search For The Products Or Clients Details Of A Particular Order</h4>
<h4><em><u>Use OrderID To Search </u></em></h4>
<h4><strong>Search:</strong></h4><input type="text" name="search" value="">
<br><br>
<button class="btn btn-primary btn-md"<input type="submit" name="foo" value="B"/>Search: Client's Detail Of A Particular Order</button>
<button class="btn btn-primary btn-md"<input type="submit"  name="foo" value="A"/>Search: Products Of A Particular Order</button>
</form>

</div>




<?php 
		if(isset($_POST["foo"]) && $_POST["foo"] === "A")
		{
			
			$orderID = $_POST["search"];
			$query = "select products.imageLink, products.productID, products.productName, products.cost , products.description, orders.orderID from orders , products , items_ordered , help_tickets where orders.orderID = '$orderID' and help_tickets.orderID ='$orderID' and orders.orderID = items_ordered.orderID and items_ordered.productID = products.productID and NOT (orders.clientID <=> NULL) ORDER BY products.productID ASC;";
  			$result = mysql_query($query);
			
			
			 
		
		if($result !== false)
		{
			
			//Displays table based on query results
		echo "<br><div class=\"table-responsive\"><table border=\"5\" bordercolor=\"black\"
		cellpadding=\"10\" width=\"100%\" style=\"border-collapse:
		collapse\" align=\"center\" class=\"table\">";
			echo '<tr><th>Product Photo </th><th>Product ID </th><th>Product Name </th><th>Product Price </th><th>Product Description </th><th>Order ID </th></tr>';
			while($row = mysql_fetch_array($result))
			{
				$imagePath = $row["imageLink"];
				echo '<tr><td>';
				echo '<img src = "';
				echo $imagePath;
				echo '"class=\"img-responsive\" >';
				echo "</td><td>";
				echo $row["productID"];
				echo "</td><td>"; 
				echo $row["productName"];
				echo "</td><td>£"; 
				echo $row["cost"];
                echo "</td><td>"; 				
				echo $row["description"];
				echo "</td><td>"; 
				echo $row["orderID"];
				echo '</tr>';
			}
			
			$query = "select sum(products.cost)from products, items_ordered ,orders, help_tickets  where orders.orderID = '$orderID' and help_tickets.orderID = '$orderID' and orders.orderID = items_ordered.orderID and items_ordered.productID = products.productID and NOT (orders.clientID <=> NULL);";
			$result = mysql_query($query);
			while($row = mysql_fetch_assoc($result))
			{
			$ordercost = $row["sum(products.cost)"];
			echo "<div class=text-center><h3>Order Total Cost: $ordercost |GBP</h3></div>"; 

			}
			
			
		}
		}
		elseif(isset($_POST["foo"]) && $_POST["foo"] === "B")
		{
		

		
		    $orderID = $_POST["search"];
			$query = "select clients.clientID, clients.Fname,  clients.Lname,  clients.phonenumber ,  clients.email,  clients.dateofbirth ,  clients.addressID, help_tickets.orderID from clients, help_tickets, orders where orders.orderID = '$orderID' and help_tickets.orderID ='$orderID' and orders.clientID = clients.clientID and NOT (orders.clientID <=> NULL);";
  			$result = mysql_query($query);
			
			
			if($result !== false)
		{
			
			

			
			
			   
			
			
		
			
			//Displays table based on query results
		echo "<br><div class=\"table-responsive\"><table border=\"5\" bordercolor=\"black\"
		cellpadding=\"10\" width=\"100%\" style=\"border-collapse:
		collapse\" align=\"center\" class=\"table\">";
			echo '<tr><th>Client ID</th><th>First Name</th><th>Last Name </th><th>Phone Number </th><th>Email </th><th>Date Of Birth </th><th>Address </th><th>Order ID </th></tr>';
			
			
			 $row1 = mysql_fetch_row($result);
			    $AddressID= $row1[6];
				
			    $query3 ="select address.addressID, address.postcode,  address.street,  address.housenumber ,  address.city,  address.country from clients, help_tickets, orders, address where orders.orderID = '$orderID' and help_tickets.orderID ='$orderID' and address.addressID ='$AddressID'  and orders.clientID = clients.clientID and NOT (orders.clientID <=> NULL);";
			    $clientAddress = mysql_query($query3);
				$row2 = mysql_fetch_row($clientAddress);
				$postcode= $row2[1];
				$street= $row2[2];
				$house= $row2[3];
				$city= $row2[4];
				$country= $row2[5];   
			    $fullAddress = $house.' '.$street.' '.$city.' '.$postcode.' '.$country;
				echo '<tr><td>';
				echo $row1[0];
				echo "</td><td>";
				echo $row1[1];
				echo "</td><td>"; 
				echo $row1[2];
				echo "</td><td>"; 
				echo $row1[3];
                echo "</td><td>"; 				
				echo $row1[4];
				echo "</td><td>"; 
				echo $row1[5];
				echo "</td><td>"; 
				echo $fullAddress;
				echo "</td><td>"; 
				echo $row1[7];
				echo '</tr>';
			
			

			}
			
			
		}

		
 		echo "</table></div>";
	
			
		
		
	?>







	
	
	

	<?php include 'footer.php';?>


</body>






</html>