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
	<h1>idk : Scubadiver bullshit what did we call us?</h1>

	<article>
	<?php
		if(session_id() == '')
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
  	$supplier = strip_tags($Fname);
 	$supplier = htmlspecialchars($Fname);
	
	$phoneNumber =mysql_real_escape_string(trim($_POST['phoneNumber']));
  	$phoneNumber = strip_tags($phoneNumber);
 	$phoneNumber = htmlspecialchars($phoneNumber);
	$phoneNumber = preg_replace("([^0-9])", "", $phoneNumber);
	$phoneCheckQuery = mysql_query("Select phoneNumber from Clients where username = '$phoneNumber'");
 	if(mysql_num_rows($phoneCheckQuery) > 0)
 	{
 		$err += 1;
 		$errCode += "Your phone number is in use, please select another phone number<br>";;
 	}
	
	$email =mysql_real_escape_string (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)); 
	$emailCheckQuery = mysql_query("Select phoneNumber from Clients where username = '$email'");
 	if(mysql_num_rows($emailCheckQuery) > 0)
 	{
 		$err += 1;
 		$errCode += "Your email is in use, please select another email<br>";;
 	}
	
	
	if( $err === 0)
	{
		$query = "INSERT INTO supplier (supplierName, email, phoneNumber)
		VALUES ('$supplier', '$email', '$phoneNumber');";
		$result = MYSQL_QUERY($query);
		echo "Supplier".$supplier."added.";
	}
	else
	{
		echo $errCode;		
	}
		
}

?>


</body>

</html>