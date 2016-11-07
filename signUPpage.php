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

	<article>
	<h2>Welcome to scuba something, buy our shit</h2>
	<p>
	<?php
		if(session_id() == '')
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
	$errCode = "";

	//Trim removes whitespaces, so no problems inserting into db
	$username =mysql_real_escape_string(trim($_POST['username']));
	//strip tags removes any php, html css etc tags
  	$username = strip_tags($username);
	//htmlspeicalchars escapes some characters 
 	$username = htmlspecialchars($username);

 	//Check if username is in DB, add to error if no

 	$nameCheckQuery = mysql_query("Select username from Clients where username = '$userName'");
 	if(mysql_num_rows($nameCheckQuery) > 0)
 	{
 		$err += 1;
 		$errCode += "Your username is in use, please select another username<br>";;
 	}
 
	$Fname =mysql_real_escape_string(trim($_POST['firstName']));
  	$Fname = strip_tags($Fname);
 	$Fname = htmlspecialchars($Fname);
	
	$Lname =mysql_real_escape_string(trim($_POST['lastName']));
  	$Lname = strip_tags($Lname);
 	$Lname = htmlspecialchars($Lname);
	
	$phoneNumber =mysql_real_escape_string(trim($_POST['phoneNumber']));
  	$phoneNumber = strip_tags($phoneNumber);
 	$phoneNumber = htmlspecialchars($phoneNumber);
	//Reg exp to only allow 0-9, before allowed a-z
	$phoneNumber = preg_replace("([^0-9])", "", $phoneNumber);

	//chech if phone no is in db, add to err if yes

	$phoneCheckQuery = mysql_query("Select phoneNumber from Clients where username = '$phoneNumber'");
 	if(mysql_num_rows($phoneCheckQuery) > 0)
 	{
 		$err += 1;
 		$errCode += "Your phone number is in use, please select another phone number<br>";;
 	}
	
	//Special filter for emails
	$email =mysql_real_escape_string (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)); // mysql_real_escape_string

	$emailCheckQuery = mysql_query("Select phoneNumber from Clients where username = '$email'");
 	if(mysql_num_rows($emailCheckQuery) > 0)
 	{
 		$err += 1;
 		$errCode += "Your email is in use, please select another email<br>";;
 	}
	
	//Maybe check if both passwords are the same here, then encrypt
	if (strcmp($_POST['passwords'], $_POST['passwordRepeat']) !== 0)
	{
		$err += 1;
		$errCode += "Your passwords do not match!<br>";
	}
	
	$passwords =mysql_real_escape_string(trim($_POST['passwords']));
  	$passwords = strip_tags($passwords);
 	$passwords = htmlspecialchars($passwords);
 	$pwdencrypt= md5($passwords); //encryption for password 
	
	//Reg exp to only allow for 0-9 and /'s
  	$dateofbirth = preg_replace("([^0-9/])", "", $_POST['dateofbirth']);// mysql_real_escape_string
	//change format
	$dateofbirth = date("y-m-d", strtotime($dateofbirth));
	//echo $dateofbirth;
	
	if( $err === 0)
	{
		$query = "INSERT INTO clients (Fname, Lname, phoneNumber, email, userName, passwords, dateofbirth)
		VALUES ('$Fname', '$Lname', '$phoneNumber', '$email', '$username',  '$pwdencrypt', '$dateofbirth');";
		$result = MYSQL_QUERY($query);
		//echo $result;
		echo "Thank you for signing up on our website .";
	}
	else
	{
		//Work out how to save certain form items so user doesn't have to completely redo whole form
		echo $errCode;		
	}
		
}

?>



	<?php include 'footer.php';?>

	<?php include 'scripts/CloseConnection.php';?>	

</body>

</html>
