
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
	include 'header.php';
	include 'functions/PrintDetails.php';
?>

	<h1>Account : Scubadiver bullshit what did we call us?</h1>
	<article>
	<h2>Account details for :
	<?php
	if(isset($_SESSION["name"]))
	{
		echo "Account details for : ";
		echo $_SESSION["name"];
	}
	else
	{
		echo "Account details";
	}
	?>
	</h2>
	
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
			$addressID = printDetails($clientDetails, $clientID);
			
 			$query = "SELECT * FROM address WHERE addressID = $addressID;";
 			$addressDetails = mysql_query($query);
 			printAddressDetails($addressDetails, $clientID);

 			$query = "SELECT * FROM payments_details WHERE clientID = $clientID;";
 			$paymentDetails = mysql_query($query);
 			printPaymentDetails($paymentDetails, $clientID);
 			
			include 'scripts/CloseConnection.php';
		}
		else if($_SESSION["privilege"] === "employee")
		{
			include 'scripts/ConnectToDB.php';
			$empID = $_SESSION["empID"];
			$query = "SELECT addressID, Fname, Lname, email, phonenumber, dateofbirth FROM employee WHERE employeeID = $empID;";
			$personalDetails = mysql_query($query);
			$addressID = printDetails($personalDetails, $empID);

			$query = "SELECT branchID, position, salary FROM employee WHERE employeeID = $empID;";
			$employeeDetails = mysql_query($query);
			printEmployeeDetails($employeeDetails);

 			$query = "SELECT * FROM address WHERE addressID = $addressID;";
 			$addressDetails = mysql_query($query);
 			printAddressDetails($addressDetails, $empID);
			
			include 'scripts/CloseConnection.php';
		}
		else if($_SESSION["privilege"] === "admin")
		{
			include 'scripts/ConnectToDB.php';
			if (isset($_GET["id"]))
			{
				$clientID = $_GET["clientID"]; //$_SESSION["cusID"];
				$clientsres = mysql_query("SELECT * from clients WHERE clientID = '$clientID'");
				$clients = MySQL_fetch_row($clientsres);
				$addressres = mysql_query("SELECT * from address WHERE addressID = '$clients[6]'");
				$address = MySQL_fetch_row($addressres);
				$paymentres = mysql_query("SELECT cardDetails from payments_details WHERE clientID = '$clientID'");
				$payment = mySQL_fetch_row($paymentres);
				$securepayment = substr($payment[0], -4);
				$usernameres = mysql_query("SELECT username from logins WHERE clientID = '$clientID'");
				$username = mySQL_fetch_row($usernameres);
				
				echo "Account Name:";
				echo $username[0];
				echo "<br>";
				echo "Email Address:";
				echo $clients[4];
				echo '<a href="">Change email address</a>';
				echo "<br>";
				echo "Password:";
				echo "********";
				echo '<a href="">Change password</a>';
				echo "<br>";
				echo "Phone Number:";
				echo $clients[3];
				echo '<a href="">Change phone number</a>';
				echo "<br>";
				echo "Saved Address:";
				echo $address[3];
				echo $address[2];
				echo $address[4];
				echo $address[5];
				echo $address[1];
				echo '<a href="">Change address</a>';
				echo "<br>";
				echo "Saved Payment Details:";
				echo "Card ending in: ";
				echo $securepayment;
				echo '<a href="">Change payment details</a>';
				echo "<br>";
				include 'scripts/CloseConnection.php';

			}
			else
			{
				$id = $_SESSION["empID"];
				$query = "SELECT * FROM employees WHERE employeeID = '$id';";
				$employee = mysql_query($query2); 
				while($row = mysql_fetch_assoc($employee))
				{
			
					$FirstName= $row["Fname"];
					$LastName= $row["Lname"];
					$BranchID= $row["branchID"]; //Maybe link branch here?
					$position= $row["position"];
					$Salary= $row["salary"];
					$PhoneNumber= $row["phonenumber"];
					$Email= $row["email"];
					$DateOfBirth= $row["dateofbirth"];
					$AddressID= $row["addressID"];
			 
				}
				
				$query3 ="SELECT*FROM address WHERE addressID ='$AddressID' ;";
				$Addressemployee = mysql_query($query3);
				while($row2 = mysql_fetch_assoc($Addressemployee))
				{
					$postcode= $row2["postcode"];
					$street= $row2["street"];
					$house= $row2["house"];
					$city= $row2["city"];
					$country= $row2["country"];   
				}
				$fullAddress =$house.' '.$street.' '.$city.' '.$postcode.' '.$country;

				echo "Position:";
				echo $position;
				echo "<br>";
				echo "First Name:";
				echo $FirstName;
				echo "<br>";
				echo "Last Name:";
				echo $LastName;
				echo "<br>";
				echo "Date of Birth:";
				echo $DateOfBirth;
				echo "<br>";
				echo "Phone number:";
				echo $PhoneNumber;
				echo "<br>";
				echo '<a href="">Change phone number</a>';
				echo "Email:";
				echo $Email;
				echo "<br>";
				echo '<a href="">Change email address</a>';
				echo "Address:";
				echo $fullAddress;
				echo "<br>";
				echo '<a href="">Change address</a>';
				echo "Salary:";
				echo $Salary;
				echo "<br>";
				include 'scripts/CloseConnection.php';

			}
			
			
		}
		else {
			echo "You do not have permission to see this page. Please log in.";
		}
		
		?>
		
	</article>


	<?php include 'footer.php';?>

		

</body>

</html>
