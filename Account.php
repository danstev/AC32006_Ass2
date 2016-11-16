
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


<?php 
	include 'scripts/sessionStart.php';
	include 'scripts/ConnectToDB.php';
	if(isset($_POST["AccDetSubmit1"]))	//Customer is editing their details
	{
		echo "It was a customer";
		$customerID = $_SESSION["cusID"];
		$phoneNumber =mysql_real_escape_string(trim($_POST['phoneNumber']));
		$phoneNumber = strip_tags($phoneNumber);
		$phoneNumber = htmlspecialchars($phoneNumber);
		$phoneNumber = preg_replace("([^0-9])", "", $phoneNumber);
		$passwords =mysql_real_escape_string(trim($_POST['password']));
  		$passwords = strip_tags($passwords);
 		$passwords = htmlspecialchars($passwords);
 		$pwdencrypt= md5($passwords);
		$email =mysql_real_escape_string (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));

		mysql_query("UPDATE clients SET email = '$email', phonenumber = '$phoneNumber' WHERE clientID = '$customerID';");
		mysql_query("UPDATE logins SET passwords = '$pwdencrypt' WHERE clientID='$customerID';");
	}
	else if(isset($_POST["AccDetSubmit"]))	//Employee is editing their details
	{
		echo "Updating Employee Details and Password";
		$employeeID = $_SESSION["empID"];
		$phoneNumber =mysql_real_escape_string(trim($_POST['phoneNumber']));
		$phoneNumber = strip_tags($phoneNumber);
		$phoneNumber = htmlspecialchars($phoneNumber);
		$phoneNumber = preg_replace("([^0-9])", "", $phoneNumber);
		$passwords =mysql_real_escape_string(trim($_POST['password']));
  		$passwords = strip_tags($passwords);
 		$passwords = htmlspecialchars($passwords);
 		$pwdencrypt= md5($passwords);
		$email =mysql_real_escape_string (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));

		$test1 = mysql_query("UPDATE employee SET email = '$email', phonenumber = '$phoneNumber' WHERE employeeID = '$employeeID';");
		$test2 = mysql_query("UPDATE logins SET passwords = '$pwdencrypt' WHERE employeeID = '$employeeID';");
	}
	else if(isset($_POST["AddressSubmit1"])) //Customer is editing their address 
	{
		echo "Changing Customer Address";
		$houseNo =mysql_real_escape_string(trim($_POST['houseNumber']));
		$street =mysql_real_escape_string(trim($_POST['streetName']));
		$city =mysql_real_escape_string(trim($_POST['city']));
		$country =mysql_real_escape_string(trim($_POST['country']));
		$postcode =mysql_real_escape_string(trim($_POST['postcode']));
		
		$customerID = $_SESSION["cusID"];
		$query = "SELECT addressID FROM clients WHERE clientID = $customerID;";
		$result = mysql_query($query);
		$resultArray = mysql_fetch_assoc($result);
		$addressID = $resultArray["addressID"];

		mysql_query("UPDATE address SET housenumber = '$houseNo', street = '$street', city = '$city', country = '$country', postcode = '$postcode' WHERE addressID = '$addressID' ;");
	}
	else if(isset($_POST["AddressSubmit"])) //Employee is editing their address 
	{
		echo "Changing employee Address";
		$houseNo =mysql_real_escape_string(trim($_POST['houseNumber']));
		$street =mysql_real_escape_string(trim($_POST['streetName']));
		$city =mysql_real_escape_string(trim($_POST['city']));
		$country =mysql_real_escape_string(trim($_POST['country']));
		$postcode =mysql_real_escape_string(trim($_POST['postcode']));
		
		$employeeID = $_SESSION["empID"];
		$query = "SELECT addressID FROM employee WHERE employeeID = $employeeID;";
		$result = mysql_query($query);
		$resultArray = mysql_fetch_assoc($result);
		$addressID = $resultArray["addressID"];

		mysql_query("UPDATE address SET housenumber = '$houseNo', street = '$street', city = '$city', country = '$country', postcode = '$postcode' WHERE addressID = '$addressID' ;");
	}
	else if(isset($_POST["PaymentSubmit"])) //Customer is editing their payment details
	{
		$accName = mysql_real_escape_string(trim($_POST['nameOnCard']));
  		$accName = strip_tags($accName);
 		$accName = htmlspecialchars($accName);
 		$cardNumber =mysql_real_escape_string(trim($_POST['cardNumber']));
 		$expDate =mysql_real_escape_string(trim($_POST['expirationdate']));
 		$houseNo =mysql_real_escape_string(trim($_POST['houseNumber']));
		$street =mysql_real_escape_string(trim($_POST['streetName']));
		$city =mysql_real_escape_string(trim($_POST['city']));
		$country =mysql_real_escape_string(trim($_POST['country']));
		$postcode =mysql_real_escape_string(trim($_POST['postcode']));

		$clientID = $_SESSION["cusID"];

		$test = mysql_query("INSERT INTO address (housenumber,street,city,country,postcode) VALUES ('$houseNo','$street','$city','$country','$postcode');");
		$addressIDObject = mysql_query("SELECT MAX(addressID) FROM address;");
		$addressIDArray = mysql_fetch_row($addressIDObject);
		$addressID = $addressIDArray[0];
		echo "<br> ADDRESS ID : " . $addressID;
		$test2 = mysql_query("DELETE FROM payments_details WHERE clientID = $clientID");
		$test3 = mysql_query("INSERT INTO payments_details (accName,cardNumber,expDate,clientID,addressID) VALUES ('$accName', '$cardNumber', '$expDate', '$clientID', '$addressID');");
	}	
	include 'scripts/CloseConnection.php';
?>


<?php 
	include 'header.php';
	include 'functions/PrintDetails.php';
?>

	<h1>Account</h1>
	<article>
<?php
	if(isset($_SESSION["name"]))
	{
		echo "Account details for : ";
		echo $_SESSION["name"];
	}
?>
	
<?php
	if(session_id() == '' || !isset($_SESSION['privilege']))
	{
		echo "You do not have permission to see this page. Please log in.";
	}
	else if($_SESSION["privilege"] === "customer")
	{
		include 'scripts/ConnectToDB.php';
		$clientID = $_SESSION["cusID"];
		$query = "SELECT * FROM clients WHERE clientID = $clientID;";
		$clientDetails = mysql_query($query);
		$addressID = printDetails($clientDetails, $clientID, true);
		
		$query = "SELECT * FROM address WHERE addressID = $addressID;";
		$addressDetails = mysql_query($query);
 		printAddressDetails($addressDetails, $clientID, true);

		$query = "SELECT * FROM payments_details WHERE clientID = $clientID;";
		$paymentDetails = mysql_query($query);
		printPaymentDetails($paymentDetails, $clientID, true);
 			
		include 'scripts/CloseConnection.php';
		}
	else if($_SESSION["privilege"] === "employee" || $_SESSION["privilege"] === "Accountant" ||$_SESSION["privilege"] === "Manager" || $_SESSION["privilege"] === "Customer Support" || $_SESSION["privilege"] === "CEO" || $_SESSION["privilege"] === "IT" ||$_SESSION["privilege"] === "Administrator")
	{
		include 'scripts/ConnectToDB.php';
		$empID = $_SESSION["empID"];
		$query = "SELECT addressID, Fname, Lname, email, phonenumber, dateofbirth FROM employee WHERE employeeID = $empID;";
		$personalDetails = mysql_query($query);
		$addressID = printDetails($personalDetails, $empID, false);

		$query = "SELECT branchID, position, salary FROM employee WHERE employeeID = $empID;";
		$employeeDetails = mysql_query($query);
		printEmployeeDetails($employeeDetails);

		$query = "SELECT * FROM address WHERE addressID = $addressID;";
		$addressDetails = mysql_query($query);
		printAddressDetails($addressDetails, $empID, true);
		
		include 'scripts/CloseConnection.php';
	}	
?>
		
	</article>
<?php include 'footer.php';?>
	</body>
</html>
