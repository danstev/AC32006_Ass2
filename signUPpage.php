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
	<h1>Home : Welcome to Scubadiver </h1>
	<?php include 'scripts/ConnectToDB.php';?>

	<article>
	<h2>Welcome to scuba something, buy our shit</h2>
	<p>Look at all the bullshit we have</p>
	</article>
	
	<form action="Error400.php" method="post">

	Username:<br />
	<input name="username" type="text" /><br />
	
	First name:<br />
	<input name="firstName" type="text" /><br />
	
	Last name:<br />
	<input name="lastName" type="text" /><br />
	
	Phone Number:<br />
	<input name="phoneNumber" type="numeric" /><br /> <!--or decimal??? -->

	Email:<br />
	<input name="email" type="email" /><br />

	Password:<br />
	<input name="passwords" type="password" /><br />

	Data of Birth: <br />
	<input name="dateofbirth" type="date" /><br />

	<input type="submit" />

</form>

<?php

// Require the file that connect to the database.
//  database connection in separate file

	include_once('scripts/ConnectToDB.php');


// call our data using the $_POST predefined variable
	$username = $_POST["username"];
	$Fname = $_POST["firstName"];
	$Lname = $_POST["lastName"];
	$phoneNumber = $_POST["phoneNumber"];
	$email = $_POST["email"];
	$passwords = $_POST["password"];
	$dateofbirth = $_POST["DATE"];

	
	
	//  insert information  and VALUES defines the values that
	// we are entering
	$result= MYSQL_QUERY(
		 "INSERT INTO clients (' ', Fname, Lname, phoneNumber, email, userName, passwords, dateofbirth)". // keep first value because I don't know yet if it will be adding automatically
		 "VALUES ('', '$username', '$Fname','$Lname','$phoneNumber','$email', '$passwords', '$dateofbirth')"
		 );
		 
		 
		echo "Thank you for signing up our bullshit .";

?>



	<?php include 'footer.html';?>

	<?php include 'scripts/CloseConnection.php';?>	

</body>

</html>
