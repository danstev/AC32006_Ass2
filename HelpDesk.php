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
	<h1>Help Desk : Scubadiver bullshit what did we call us?</h1>
	<?php include 'scripts/sessionStart.php';?>

	<article>
	<h2>Open ticket here</h2>
	<?php include 'forms/HelpTicketForm.php';?>
	</article>


	<?php include 'footer.php';?>
	
<?php //End of real page, only goGet/Post stuff here!!
	
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	include_once('scripts/ConnectToDB.php');
	$err = 0;
	$errCode = "Errors: <br>";

	//Trim removes whitespaces, so no problems inserting into db
	$orderID =mysql_real_escape_string(trim($_POST['orderID']));
	//strip tags removes any php, html css etc tags
  	$orderID = strip_tags($orderID);
	//htmlspeicalchars escapes some characters 
 	$orderID = htmlspecialchars($orderID);
 	$orderCheckQuery = mysql_query("Select orderID from orders where orderID = '$orderID';");
	
	while($orderRow = mysql_fetch_array($orderCheckQuery))
	{
		$ord = $orderRow["username"]; //Not sure if this is correct?
		if( $ord == $orderID)
		{
			
		}
		else
		{
			$err += 1;
			$errCode .= "Your username is in use, please select another username<br>";
		}
		
	}

 
	$dateopened = date("Y-m-d");
	//$dateopened = date("y-m-d", strtotime($dateofbirth));
	
	if( !($err != 0))
	{
		$query = "INSERT INTO help_tickets (orderID, complaint, date_opened)
		VALUES ('$orderID', '$complaint', '$dateopened');";
		$result = MYSQL_QUERY($query);
		
		
		echo "Thank you for contacting us we will get back to you as soon as we have a update.";
	}
	else
	{
		//Work out how to save certain form items so user doesn't have to completely redo whole form
		echo "<br>";	
		echo $err;
		echo "<br>";
		echo $errCode;
	}
	include_once('scripts/CloseConnection.php');
}

?>


		

</body>

</html>