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
		
	Password repeat:<br />
	<input name="passwordRepeat" type="password" /><br />

	Data of Birth: <br />
	<input name="dateofbirth" type="date" /><br />

	<input type="submit" />

</form>

<?php

	/*
	
function checkIfExist($username)
{
	$result= MYSQL_QUERY(
		 "SELECT * FROM clients
		 WHERE "
		 );
	
}

*/
// Require the file that connect to the database.
//  database connection in separate file
		
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	include_once('scripts/ConnectToDB.php');
	$err = 0;
	$errCode = "";

// call our data using the $_POST predefined variable
	
	//Sanitised input
	
	//Trim removes whitespaces, so no problems inserting into db
	$username = trim($_POST['username']);
	//strip tags removes any php, html css etc tags
  	$username = strip_tags($username);
	//htmlspeicalchars escapes some characters 
 	$username = htmlspecialchars($username);
	
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
	
	//Special filter for emails
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
	
	//Maybe check if both passwords are the same here, then encrypt
	if (strcmp($_POST['passwords'], $_POST['passwordRepeat']) !== 0)
	{
		$err += 1;
		$errCode += "Your passwords do not match!<br>";
	}
	
	$passwords = trim($_POST['passwords']);
  	$passwords = strip_tags($passwords);
 	$passwords = htmlspecialchars($passwords);
 	$pwdencrypt= md5($passwords); //encryption for 
	
	//Reg exp to only allow for 0-9 and /'s
  	$dateofbirth = preg_replace("([^0-9/])", "", $_POST['dateofbirth']);
	//change format
	$dateofbirth = date("y-m-d", strtotime($dateofbirth));
	echo $dateofbirth;
	
	
	//Possibly put input validation here, i.e no previous username, email, phonenumber, password requirements, 

	//Check if username, email exists
	
	
	
	//  insert information  and VALUES defines the values that
	// we are entering
	
	if( $err === 0)
	{
		$query = "INSERT INTO clients (Fname, Lname, phoneNumber, email, userName, passwords, dateofbirth)
		VALUES ('$Fname', '$Lname', '$phoneNumber', '$email', '$username',  '$pwdencrypt', '$dateofbirth');";
		$result = MYSQL_QUERY($query);
		//echo $result;
		echo "Thank you for signing up our bullshit .";
	}
	else
	{
		echo $errCode;		
	}
		
}

?>



	<?php include 'footer.html';?>

	<?php include 'scripts/CloseConnection.php';?>	

</body>

</html>
