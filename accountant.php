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

	<article>
	<h2></h2>
	<p></p>
	</article>

    <br>
    <br>
    <br>
    <br>
	<br>
	<h2>Income Transactions</h2>
	<?php 
$query = "SELECT TransactionID ,Income , TypeOfTransaction   FROM financial_transactions WHERE NOT (income <=> NULL);";
$result = mysql_query($query);

printTable($result);
?>

<?php 
$query = "select sum(income)from financial_transactions;";
$result = mysql_query($query);

while($row = mysql_fetch_assoc($result)){

$totalincome = $row["sum(income)"];
}

echo "<div class=text-center><h3>Total Income: $totalincome |GBP</h3></div>" 

?>


<br>
<br>
<br>
<br>
<br>
<br>
	<h2>Outcome Transactions</h2>
	<?php 
$query = "SELECT TransactionID ,Outcome , TypeOfTransaction    FROM financial_transactions WHERE NOT (outcome <=> NULL);";
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


<?php 

$grossprofit = ($totalincome - $totaloutcome);
echo "<div class=text-center><h3 class=bg-danger><u>Gross Profit: -$grossprofit |GBP<u></h3></div>"


?>



<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<div class=text-center>
<form action="accountantPageTwo.php" method ="post">
<button class="btn btn-primary btn-lg" <input type="submit"  name="foo" value="A">Employees Earnings Below Average</button>
<button class="btn btn-primary btn-lg" <input type="submit"  name="foo" value="B">Warehouse Orders</button>
<button class="btn btn-primary btn-lg" <input type="submit"  name="foo" value="C">Highest Earning Employees</button>
</div>










	
	
	

	<?php include 'footer.php';?>


</body>






</html>

