<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">

<html>
<title>Stock : Scubadiver </title>
<body>
	<h1>Stock : Scubadiver bullshit what did we call us?</h1>

	<article>
	<?php
		
		if(session_id() == '' || !isset($_SESSION['privilege']))
		{
			echo "You do not have permission to see this page. Please log in.";
		}
		else if($_SESSION["privilege"] === "employee" || $_SESSION["privilege"] === "manager"  || $_SESSION["privilege"] === "admin" )
		{
			include 'scripts/ConnectToDB.php';
			//IF ITS A GET
			if (isset($_GET["id"]))
			{
				//GET ID
				$bID = $_GET["bID"];
				//QUERY
				$query = "SELECT * from stock where branchID = '$bID';";
				//DO QUERY
				$result = mysql_query($query);
				//USE YOUR FUNCTION
				printTable($result);
			}
			else
			{
				//OWN EMPLOYEES ID
				$empID = $_SESSION["empID"];
				//QUERY
				$empQuery = "SELECT branchID FROM employee where employeeID = '$empID';";
				//RESULT
				$empResult = mysql_query($empQuery);
				//INIT
				$bID;
				while($row = mysql_fetch_assoc($result))
				{
					//SEt bID
					$bID = $row["branchID"];
				}
				//NEW QUERY
				$query = "SELECT * from stock where branchID = '$bID';";
				//RUN IT
				$result = mysql_query($query);
				//YOUR FUNCTION
				printTable($result);
			}
			include 'scripts/closeConnection.php';
		}
		
		?>
		

	</article>


	<?php include 'footer.php';?>


</body>

</html>
