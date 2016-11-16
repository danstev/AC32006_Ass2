<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">

<html>
<title>Address Details : DiveMaster</title>
<body>
<?php include 'Scripts/sessionStart.php';?>
<?php include 'header.php';?>
<?php include 'scripts/ConnectToDB.php'; ?>

<h1>Address Details : DiveMaster</h1>
<?php
	if(session_id() == '' || !isset($_SESSION['privilege']))
	{
		echo "You do not have permission to see this page. Please log in.";
	}
	else if($_SESSION["privilege"] === "customer")
	{	
		$clientID = $_SESSION["cusID"];
		$clientsres = mysql_query("SELECT * from clients WHERE clientID = '$clientID'");
		$clientRow = MySQL_fetch_assoc($clientsres);
		$addressID = $clientRow["addressID"];
		$addressRes = mysql_query("SELECT * from address WHERE addressID = '$addressID'");
		$address = MySQL_fetch_assoc($addressRes);
		$customer = true;
		include 'forms/AddressAddForm.php';
	}	
	else if(isset($_SESSION['privilege']) && $_SESSION['privilege'] !== "customer" )
	{
		$empID = $_SESSION["empID"];
		$emp = mysql_query("SELECT * FROM employee WHERE employeeID = $empID;");
		$employee = mysql_fetch_assoc($emp);
		$addressID = $employee["addressID"];
		$addressRes  = mysql_query("SELECT * from address WHERE addressID = $addressID");
		$address = mysql_fetch_assoc($addressRes);
		$customer = false;
		include 'forms/AddressAddForm.php';
	}
	else
	{
		echo "You do not have permission to see this page.";
	}
?>			
<?php include 'scripts/CloseConnection.php';?>
<?php include 'footer.php';?> 
</body>
</html>
