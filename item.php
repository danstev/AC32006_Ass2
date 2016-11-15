<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">

<html>
<title>Product : ScubaDiver</title>
<body>

	<?php include 'sctipts/sessionStart.php';?>
	<?php include 'header.php';?>
	
	<?php
		if(session_id() == '' || !isset($_SESSION['privilege']))
		{
			echo "You do not have permission to see this page. Please log in.";
		}
		else if($_SESSION["privilege"] === "adminstrator")
		{
			if( isset($_GET['type']) )
			{
				if( $_GET["type"] == 'add') //GET ADD
				{
					$query = "SELECT * from suppliers;";
					$result = MYSQL_QUERY($query);
					include 'functions/PrintDetails.php';
					printDetails($result);
					include 'forms/AddItem.php';
					
				}
				else if( $_GET["type"] == 'edit') //GET EDIT
				{
					$query = "SELECT * from products;";
					$result = MYSQL_QUERY($query);
					include 'functions/PrintDetails.php';
					printDetails($result);
					$querySupp = "SELECT * from suppliers;";
					$resultSupp = MYSQL_QUERY($querySupp);
					printDetails($querySupp);
					include 'forms/EditItem.php';
					echo '<br>';
					echo 'When you have chosen the item you want to edit, place its ID in the form and change the details accordingly.';
				}
				else if( $_GET["type"] == 'delete')  // GET DELETE
				{
					$query = "SELECT * from products;";
					$result = MYSQL_QUERY($query);
					include 'functions/PrintDetails.php';
					printDetails($result);
					include 'forms/DeleteItem.php';
					echo '<br>';
					echo 'When you have chosen the item you want to delete, place its ID in the form. MAKE SURE YOU WANT TO DELETE THIS BRANCH.';
				}
			}
			else if( isset($_POST['type']) )
			{
				if( $POST["type"] == 'add')  // POST ADD
				{
					include_once('scripts/ConnectToDB.php');
					$err = 0;
					$errCode = "Errors: <br>";
					
					$productName =mysql_real_escape_string(trim($_POST['productName']));
					$cost =mysql_real_escape_string(trim($_POST['cost']));
					$productType =mysql_real_escape_string(trim($_POST['productType']));
					$imageLink =mysql_real_escape_string(trim($_POST['imageLink']));
					$description =mysql_real_escape_string(trim($_POST['description']));
					$supplierID =mysql_real_escape_string(trim($_POST['supplierID']));
					
					
					if( !($err != 0))
					{
						$query = "INSERT INTO products (productName, cost, productType, imageLink, description, supplierID) VALUES ('$productName', '$cost', '$productType', '$imageLink','$description', '$supplierID');";
						$result = MYSQL_QUERY($query);
					}
					else
					{
						echo "<br>";	
						echo $err;
						echo "<br>";
						echo $errCode;
						echo '<br>';
						echo 'Go back: ';
						echo '<a href="item.php?type=add" class="btn btn-info" role="button">Add Product</a>';
					}

					
				}
				else if( $POST["type"] == 'edit') // POST EDIT
				{
					include_once('scripts/ConnectToDB.php');
					$err = 0;
					$errCode = "Errors: <br>";
					
					$productID = =mysql_real_escape_string(trim($_POST['productID']));
					$productName =mysql_real_escape_string(trim($_POST['productName']));
					$cost =mysql_real_escape_string(trim($_POST['cost']));
					$productType =mysql_real_escape_string(trim($_POST['productType']));
					$imageLink =mysql_real_escape_string(trim($_POST['imageLink']));
					$description =mysql_real_escape_string(trim($_POST['description']));
					$supplierID =mysql_real_escape_string(trim($_POST['supplierID']));
					
					if( !($err != 0))
					{
						$updateProd = 'UPDATE products SET productName='$productName', cost='$cost', productType='$productType', imageLink='$imageLink', description='$description', supplierID='$supplierID' WHERE productID = '$productID'';
						$runProd = MYSQL_QUERY($updateProd);
					}
					else
					{
						echo "<br>";	
						echo $err;
						echo "<br>";
						echo $errCode;
						echo '<br>';
						echo 'Go back: ';
						echo '<a href="item.php?type=edit" class="btn btn-info" role="button">Edit Product</a>';
					}
				}
				else if( $POST["type"] == 'delete') // POST DELETE
				{
					include_once('scripts/ConnectToDB.php');
					$err = 0;
					$errCode = "Errors: <br>";
					
					$productID =mysql_real_escape_string(trim($_POST['productID']));
					
					if( !($err != 0))
					{
						$delQuery = 'DELETE FROM products WHERE productID='$productID'';
						$runDel =  mysql_query($delQuery);
					}
					else
					{
						echo "<br>";	
						echo $err;
						echo "<br>";
						echo $errCode;
						echo '<br>';
						echo 'Go back: ';
						echo '<a href="item.php?type=delete" class="btn btn-info" role="button">Delete Product</a>';
					}
				}
				
			}
			else
			{
					echo 'Please go back to the admin page and select an action: ';
					echo '<a href="admin.php" class="btn btn-info" role="button">Click here!</a>';
			}
		}
		else
		{
			echo "You do not have permission to see this page.";
		}
		
	?>
	
	<?php include 'footer.php';?>

</body>

</html>