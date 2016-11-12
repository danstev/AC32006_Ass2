<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">

<html>
<title>Register : ScubaDiver</title>
<body>

	<?php include 'header.php';?>
	<h1>Home : Welcome to Scubadiver </h1>

	<article>
	<h2>Welcome to scuba something, buy our shit</h2>
	<p>
	<?php
		if(session_id() === '')
		{
			echo 'You can signup here!';
			include 'forms/RegisterForm.php';
		}
		else{
			echo 'Thank you for signing up!';
		}
	?>
	</p>
	</article>
	
<?php //End of real page, only goGet/Post stuff here!!
	
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
	include_once('scripts/ConnectToDB.php');
	$err = 0;
	$errCode = "Errors: <br>";

	//Trim removes whitespaces, so no problems inserting into db
	$username =mysql_real_escape_string(trim($_POST['username']));
	//strip tags removes any php, html css etc tags
  	$username = strip_tags($username);
	//htmlspeicalchars escapes some characters 
 	$username = htmlspecialchars($username);
 	$nameCheckQuery = mysql_query("Select username from logins where username = '$username';");
	
	while($usrRow = mysql_fetch_array($nameCheckQuery))
	{
		$name = $usrRow["username"]; //Not sure if this is correct?
		if( $name == $username)
		{
			$err += 1;
			$errCode .= "Your username is in use, please select another username<br>";
		}
	}

 
	$Fname = mysql_real_escape_string(trim($_POST['firstName']));
  	$Fname = strip_tags($Fname);
 	$Fname = htmlspecialchars($Fname);
	
	$Lname = mysql_real_escape_string(trim($_POST['lastName']));
  	$Lname = strip_tags($Lname);
 	$Lname = htmlspecialchars($Lname);
	
	$phoneNumber =mysql_real_escape_string(trim($_POST['phoneNumber']));
  	$phoneNumber = strip_tags($phoneNumber);
 	$phoneNumber = htmlspecialchars($phoneNumber);
	$phoneNumber = preg_replace("([^0-9])", "", $phoneNumber);
	$phoneCheckQuery = mysql_query("Select phoneNumber from Clients where phoneNumber = '$phoneNumber'");
	
	while($PhoneRow = mysql_fetch_array($phoneCheckQuery))
	{
		$phone = $PhoneRow["phoneNumber"]; //Not sure if this is correct?
		if( $phone == $phoneNumber)
		{
			$err += 1;
			$errCode .= "Your phone number is in use, please select another phone number<br>";
		}
	}
	
	$email =mysql_real_escape_string (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)); // mysql_real_escape_string

	$emailCheckQuery = mysql_query("Select email from Clients where email = '$email'");
	
	while($emailRow = mysql_fetch_array($emailCheckQuery))
	{
		$emailAdd = $emailRow["email"]; //Not sure if this is correct?
		if( $emailAdd == $email)
		{
			$err += 1;
			$errCode .= "Your email address is in use, please select another email address.<br>";
		}
	}
	
	if (strcmp($_POST['passwords'], $_POST['passwordRepeat']) !== 0)
	{
		$err += 1;
		$errCode .= "Your passwords do not match!<br>";
	};
	
	$passwords =mysql_real_escape_string(trim($_POST['passwords']));
  	$passwords = strip_tags($passwords);
 	$passwords = htmlspecialchars($passwords);
 	$pwdencrypt= md5($passwords); //encryption for password 
	
  	$dateofbirth = preg_replace("([^0-9/])", "", $_POST['dateofbirth']);// mysql_real_escape_string
	$dateofbirth = date("y-m-d", strtotime($dateofbirth));
	
	if( !($err != 0))
	{
		$query = "INSERT INTO clients (Fname, Lname, phoneNumber, email, dateofbirth)
		VALUES ('$Fname', '$Lname', '$phoneNumber', '$email', '$dateofbirth');";
		$result = MYSQL_QUERY($query);
		//echo $result;
		
		//Add client id to the login table
		$IdQuery = "Select clientID from Clients where email='$email';";
		$idClient = MYSQL_QUERY($IdQuery);
		while($idRow = mysql_fetch_array($idClient))
		{
			$newID = $idRow["clientID"];
			$accountQuery = "INSERT INTO logins (username, passwords, clientID) VALUES ('$username', '$pwdencrypt', '$newID');";
			$loginResult = MYSQL_QUERY($accountQuery);
		}
		
		echo "Thank you for signing up on our website .";
	}
	else
	{
		//Work out how to save certain form items so user doesn't have to completely redo whole form
		echo "<br>";	
		echo $err;
		echo "<br>";
		echo $errCode;
	}
	include_once('scripts/CloseConnection.php');
}

?>



	<?php include 'footer.php';?>

</body>

</html>
