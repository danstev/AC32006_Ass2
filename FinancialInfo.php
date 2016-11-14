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
<?php include 'Scripts/sessionStart.php';?>
<?php include 'header.php';?>
<?php include 'databaseoutput.php';?>
<?php include 'Scripts/ConnectToDB.php';?>



<h1>Finacial Transactions Of DiveMasters</h1>
<h2>Income Transactions</h2>
	<?php 
	$query = "SELECT TransactionID ,Income , TypeOfTransaction , OrderID   FROM financial_transactions WHERE NOT (income <=> NULL);";
	$result = mysql_query($query);
	printTable($result);
	?>

	<?php 
	$query = "select sum(income)from financial_transactions;";
	$result = mysql_query($query);
	while($row = mysql_fetch_assoc($result))
	{
		$totalincome = $row["sum(income)"];
	}
	echo "<div class=text-center><h3>Total Income: $totalincome |GBP</h3></div>" 
	?>



<br><br><br>
<h2>Outcome Transactions</h2>
	<?php 
	$query = "SELECT TransactionID ,Outcome , TypeOfTransaction , OrderID   FROM financial_transactions WHERE NOT (outcome <=> NULL);";
	$result = mysql_query($query);
	printTable($result);
	?>

	<?php 
	$query = "select sum(outcome)from financial_transactions;";
	$result = mysql_query($query);

	while($row = mysql_fetch_assoc($result))
	{
		$totaloutcome = $row["sum(outcome)"];
	}

	echo "<div class=text-center><h3>Total Outcome: -$totaloutcome |GBP</h3></div>" 

	?>
<br><br><br>
<h2>All The Employees That Earn Below The Average</h2>
	<?php 
	$query = "SELECT EmployeeID, Fname , Lname , Position,  salary - (select avg(salary) from employee) as Difference from employee where salary < (select avg(salary) from employee);";
	$result = mysql_query($query);
	printTable($result);
	?>
<br>
<div class=text-center>
	<p class="lead">These employees earn below the average. The financial department of the company should review each of them and consider any possible bonus or promotion in order to keep them satisfied and boost their productivity. 'Difference' represents how much below the average these employees earn.</p>
</div>
	<?php include 'footer.php';?>
</body>
</html>