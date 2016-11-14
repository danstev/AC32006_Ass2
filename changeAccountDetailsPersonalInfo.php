<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">

<html>
<title>Personnal Information </title>
<body>
<?php include 'scripts/sessionStart.php';?>
<?php include 'header.php';?>
<?php include 'scripts/ConnectToDB.php'; ?>
<?php

if(session_id() == '' || !isset($_SESSION['privilege']))
{
	echo "You do not have permission to see this page. Please log in.";
}
else
{
	if($_SESSION["privilege"] === "customer") {
		$clientID = $_SESSION["cusID"];
		$clientQuery = mysql_query("SELECT * from clients WHERE clientID = '$clientID'");
		$clients = MySQL_fetch_row($clientQuery);
		echo "<h2>Personal Information</h2";
		include 'forms/AccountDetailsForm.php';
	}
}
else
{
		echo "You do not have permission to view this page.";
}
?>
				
		
	
<?php include 'footer.php';?>
<?php include 'scripts/CloseConnection.php';?>	 

</body>

</html>
