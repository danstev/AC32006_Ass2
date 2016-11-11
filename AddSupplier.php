<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">

<html>
<title>Add Supplier : ScubaDiver </title>
<body>
	<?php include 'header.php';?>
	<?php include 'scripts/sessionStart.php';?>
	<h1>idk : Scubadiver bullshit what did we call us?</h1>

	<article>
	<?php
		if($_SESSION["privilege"] === '')
		{
			echo 'You do not have access to this page.';
			
		}
		else if($_SESSION["privilege"] === "admin")
		{
			include 'forms/AddSupplierForm.php';
		}
	?>



	</article>


	<?php include 'footer.php';?>


<?php //End of real page, only goGet/Post stuff here!!
	
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	include_once('scripts/ConnectToDB.php');
	$err = 0;
	$errCode = "";

	$supplier =mysql_real_escape_string(trim($_POST['supplier']));
  	$supplier = strip_tags($supplier);
 	$supplier = htmlspecialchars($supplier);
	
	$phoneNumber = mysql_real_escape_string(trim($_POST['phoneNumber']));
  	$phoneNumber = strip_tags($phoneNumber);
 	$phoneNumber = htmlspecialchars($phoneNumber);
	$phoneNumber = preg_replace("([^0-9])", "", $phoneNumber);
	$phoneCheckQuery = mysql_query("Select phoneNumber from supplier where phoneNumber = '$phoneNumber'");
 	while($PhoneRow = mysql_fetch_array($phoneCheckQuery))
	{
		$phone = $PhoneRow["phoneNumber"]; //Not sure if this is correct?
		if( $phone == $phoneNumber)
		{
			$err += 1;
			$errCode .= "Your phone number is in use, please select another phone number<br>";
		}
	}
	
	$email =mysql_real_escape_string (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)); 
	$emailCheckQuery = mysql_query("Select email from supplier where email = '$email'");
 	while($emailRow = mysql_fetch_array($emailCheckQuery))
	{
		$emailAdd = $emailRow["email"]; //Not sure if this is correct?
		if( $emailAdd == $email)
		{
			$err += 1;
			$errCode .= "Your email address is in use, please select another email address.<br>";
		}
	}
	
	
	if( $err === 0)
	{
		$query = "INSERT INTO supplier (nameOfSupplier, email, phoneNumber)
		VALUES ('$supplier', '$email', '$phoneNumber');";
		$result = MYSQL_QUERY($query);
		echo "Supplier".$supplier."added.";
	}
	else
	{
		echo "<br>";	
		echo $err;
		echo "<br>";
		echo $errCode;		
	}
		
}

?>


</body>

</html>