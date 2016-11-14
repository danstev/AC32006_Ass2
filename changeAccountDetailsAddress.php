<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">

<html>
<title>Address Details </title>
<body>
<?php include 'scripts/sessionStart.php';?>
<?php include 'header.php';?>
<?php include 'scripts/ConnectToDB.php'; ?>


<?php
	if(session_id() == '' || !isset($_SESSION['privilege']))
	{
		echo "You do not have permission to see this page. Please log in.";
	}
	else if($_SESSION["privilege"] === "customer")
	{	
		$clientID = $_SESSION["cusID"];
		$clientsres = mysql_query("SELECT * from clients WHERE clientID = '$clientID'");
		$clients = MySQL_fetch_row($clientsres);
		$addressres = mysql_query("SELECT * from address WHERE addressID = '$clients[6]'");
		$address = MySQL_fetch_row($addressres);
		echo '<h2>Address</h2>';
		include 'forms/AddressAddForm.php';
	}	
	else if( $_SESSION["privilege"] === "employee" || $_SESSION["privilege"] === "manager"  || $_SESSION["privilege"] === "admin" )
	{
		$empID = $_SESSION["empID"];
		$emp = mysql_query("SELECT * from employees WHERE clientID = '$empID'");
		$employee = MySQL_fetch_row($emp);
		$empAddress = mysql_query("SELECT * from address WHERE addressID = '$employee[7]'"); //I think it should be either 7 or 8 here not sure?
		$address = MySQL_fetch_row($empAddress);
		echo '<h2>Address</h2>';
		include 'forms/AddressAddForm.php';
	}
	else
	{
		echo "You do not have permission to see this page. Please log in.";
	}
?>			
<?php include 'scripts/CloseConnection.php';?>
<?php include 'footer.php';?> 
</body>
</html>
