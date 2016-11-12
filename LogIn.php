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
		$username =mysql_real_escape_string(trim($_POST["username"])); // need to test
		$password = md5($_POST["password"]);
		$validUser = false;
		$priv = "";
		$name = "";

		$query = "SELECT * FROM logins where username = '$username';";
		$result = mysql_query($query);
			while($row = mysql_fetch_array($result))
			{
				if($row["passwords"] === $password)
				{
					$validUser  =  true;
					if( $row["clientID"] > 0)
					{
						$priv = "customer";
						$id = $row["clientID"];
						
						
						//Get name for uses elsewhere?
						$cusQuery = "SELECT * FROM clients where clientID = '$id';";
						$cusResult = mysql_query($cusQuery);
						while($cusRow = mysql_fetch_array($cusResult))
						{
							$name = $cusRow["Fname"]; //Not sure if this is correct?
						}


					}
					else if( $row["employeeID"] > 0)
					{
						$id = $row["employeeID"];
						$empQuery = "SELECT * FROM employees where employeeID = '$id';";
						$empResult = mysql_query($empQuery);
						while($empRow = mysql_fetch_array($empResult))
						{
							$priv = $empRow["position"];
							$name = $empRow["fname"]; //Not sure if this is correct?
						}
					}
					else
					{
						//How would it even get here? Maybe make a script which sets this everytime you are not signed in on page?? or even if you are signed in display different stuff, default is not signed in
						$priv = "notSignedIn"; //Won't even be in use?
					}
				}
			}
			
			if($validUser == true)
			{
				if(session_id() === '')
					{
						session_start();
					}
				//echo "<br>";
				$_SESSION["privilege"] = $priv;
				//echo $_SESSION["privilege"];
				//echo "<br>";
				$_SESSION["name"] = $name;
				//echo $_SESSION["name"];
				//echo "<br>";
				$_SESSION["privilege"] = $priv;
				//echo $_SESSION["privilege"];
				//echo "<br>";
				$_SESSION["name"] = $name;
				//echo $_SESSION["name"];
				//echo "<br>";
				echo "<br>";
				$_SESSION["privilege"] = $priv;
				echo $_SESSION["privilege"];
				echo "<br>";
				$_SESSION["name"] = $name;
				echo $_SESSION["name"];
				echo "<br>";
				
				if( $priv == "customer" )
				{
					$_SESSION["cusID"] = $id;
					//echo $_SESSION["cusID"];
					//echo "<br>";
					echo $_SESSION["cusID"];
					echo "<br>";
				}
				else
				{
					$_SESSION["empID"] = $id;
					//echo $_SESSION["empID"];
					//echo "<br>";
					echo $_SESSION["empID"];
					echo "<br>";
				}
				
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
	<?php include 'header.php';?>
	<?php include 'scripts/sessionStart.php';?>
	<h1>Log In : Scubadiver bullshit hwat did we call us?</h1>
	
	<article>
	<h2>Log in</h2>

		<h3><?php  echo $message; ?><br/></h3>
		<?php 
		if($_SESSION["privilege"] == '')
		<?php include 'forms/LoginForm.php'; 
		if($_SESSION["privilege"] = '')
		{
			echo 'You can login here!';
			include 'forms/LoginForm.php';
		}
		else{
			echo 'You are already logged in!';
		}
		
		?>
	</article>


	<?php include 'footer.php';?>

	<?php include 'scripts/CloseConnection.php';?>	 

</body>

</html>
