<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">
<?php include 'scripts/ConnectToDB.php';?>

<?php
	if(isset($_POST["submit"]))
	{ //detect form submission
		$username = $_POST["username"];
		$password = md5($_POST["password"]);
		$validUser = false;

		$query = "SELECT passwords FROM clients where username = '$username';";
		$result = mysql_query($query);
			while($row = mysql_fetch_array($result))
			{
				if($row["passwords"] === $password)
				{
					$validUser  =  true;
				}
			}
			if($validU

				#ser === true)
			{
				session_start();
				$_SESSION["privilege"] = 'customer';
				echo $_SESSION["privilege"];
			}
		



		if($validUser)//Would actually query database, bool verifyUser()
		{
			$message = "logged in successfully"; 
		}
		else
		{
			$message = "Incorrect username or password, please check your details and try again";
		}
	}
	else
	{
		$username = "";
		$message = "please login";
	}
?>

<html>
<title> </title>
<body>
	<h1>Log In : Scubadiver bullshit hwat did we call us?</h1>
	
	<article>
	<h2>Log in</h2>
	</article>
		<h3><?php  echo $message; ?><br/></h3>
		<form action="login.php" method ="post">
		Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username);?>"/><br/>
		Password: <input type="password" name="password" value=""/><br/>
		<br/>
		<input type="submit" name="submit" value="Submit"/>
		</form>
	</article>


	<?php include 'footer.php';?>

	<?php include 'scripts/CloseConnection.php';?>	 

</body>

</html>
