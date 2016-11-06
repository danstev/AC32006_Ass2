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
	
	<form action="signUPpage.php" method="post">

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

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	include_once('scripts/ConnectToDB.php');


// call our data using the $_POST predefined variable
	
	//Sanitised input
	
	//Trim removes whitespaces, so no problems inserting into db
	$username = trim($_POST['username']);
	//strip tags removes any php, html css etc tags
  	$username = strip_tags($name);
	//htmlspeicalchars escapes some characters 
 	$username = htmlspecialchars($name);
	
	$Fname = trim($_POST['firstName']);
  	$Fname = strip_tags($Fname);
 	$Fname = htmlspecialchars($Fname);
	
	$Lname = trim($_POST['lastName']);
  	$Lname = strip_tags($Lname);
 	$Lname = htmlspecialchars($Lname);
	
	$phoneNumber = trim($_POST['phoneNumber']);
  	$phoneNumber = strip_tags($phoneNumber);
 	$phoneNumber = htmlspecialchars($phoneNumber);
	//Reg exp to only allow 0-9, before allowed a-z
	$phoneNumber = preg_replace("([^0-9])", "", $phoneNumber);
	
	$email = FILTER_SANITIZE_EMAIL($_POST['email']); //Special filter for emails
	
	$passwords = trim($_POST['password']);
  	$passwords = strip_tags($passwords);
 	$passwords = htmlspecialchars($passwords);
 	$pwdencrypt= md5($passwords); //encryption for 
	
	//Reg exp to only allow for 0-9 and /'s
  	$dateofbirth = preg_replace("([^0-9/])", "", $_POST['date']);
	//Probably don't need this due to the form only allowing certain structures, be its here to be safe
	
	
	//Possibly put input validation here, i.e no previous username, email, phonenumber, password requirements, 

	
	
	//  insert information  and VALUES defines the values that
	// we are entering
	$result= MYSQL_QUERY(
		 "INSERT INTO clients (' ', Fname, Lname, phoneNumber, email, userName, passwords, dateofbirth)". // keep first value because I don't know yet if it will be adding automatically
		 "VALUES ('', '$username', '$Fname','$Lname','$phoneNumber','$email', '$pwdencrypt', '$dateofbirth')"
		 );
		 
		 
		echo "Thank you for signing up our bullshit .";
		
}

?>



	<?php include 'footer.html';?>

	<?php include 'scripts/CloseConnection.php';?>	

</body>

</html>
