<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">

<html>
<title>Branch Overview</title>
<body>
<?php include 'scripts/sessionStart.php'; ?>
<?php include 'header.php'; ?> 

	<h1>idk : Scubadiver bullshit what did we call us?</h1>

	<article>
	<h2>what</h2>
	
	
	<?php
		if(session_id() == '' || !isset($_SESSION['privilege']))
		{
			echo "You do not have permission to view this page.";
		}
		else if($_SESSION["privilege"] === "customer")
		{
			echo "You do not have permission to view this page.";			
			
		}
		else if($_SESSION["privilege"] === "employee")
		{
			include 'scripts/ConnectToDB.php';
			$id = $_SESSION["empID"];
			$query = "SELECT branchID FROM employees WHERE employeeID = '$id';";
			$branch = mysql_query($query); 
			$branchID = '';
			while($row = mysql_fetch_assoc($branch))
			{
				$branchID = $row["branchID"];
			}
			
			$branchQ = "SELECT * FROM branches WHERE branchID = '$branchID';";
			$branchQuery = mysql_query($branchQ);
			while($row = mysql_fetch_assoc($branchQuery))
			{
				$brancName= $row["branchName"]; //Not sure what else is here?
				
			}
			
			include 'scripts/CloseConnection.php';
		}
		else if($_SESSION["privilege"] === "admin")
		{
			include 'scripts/ConnectToDB.php';
			if (isset($_GET["id"]))
			{
				$id = $_GET["branchID"];
				$query = "SELECT branchID FROM employees WHERE employeeID = '$id';";
				$branch = mysql_query($query); 
				$branchID = '';
				while($row = mysql_fetch_assoc($branch))
				{
					$branchID = $row["branchID"];
				}
			
				$branchQ = "SELECT * FROM branches WHERE branchID = '$branchID';";
				$branchQuery = mysql_query($branchQ);
				while($row = mysql_fetch_assoc($branchQuery))
				{
					$brancName= $row["branchName"]; //Not sure what else is here?
				}
				
			}
			else
			{
				$id = $_SESSION["empID"];
				$query = "SELECT branchID FROM employees WHERE employeeID = '$id';";
				$branch = mysql_query($query); 
				$branchID = '';
				while($row = mysql_fetch_assoc($branch))
				{
					$branchID = $row["branchID"];
				}
			
				$branchQ = "SELECT * FROM branches WHERE branchID = '$branchID';";
				$branchQuery = mysql_query($branchQ);
				while($row = mysql_fetch_assoc($branchQuery))
				{
					$brancName= $row["branchName"]; //Not sure what else is here?
				}
			}
			
			include 'scripts/CloseConnection.php';
		}
		else {
			echo "You do not have permission to view this page.";			
		}
		
		?>
	</article>



	<?php include 'footer.php';?>


</body>

</html>
