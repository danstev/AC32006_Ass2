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




<?php
if(isset($_POST["foo"]) && $_POST["foo"] === "A" )
{
echo "<br />\n";
echo "<br />\n";
echo "<br />\n";
echo "<h2>All The Employees That Earn Below The Average</h2>";
	 
$query = "SELECT EmployeeID, Fname , Lname , Position,  salary - (select avg(salary) from employee) as Difference from employee
 where salary < (select avg(salary) from employee);";
$result = mysql_query($query);
printTable($result);



echo "<br />\n";

echo "<div class=text-center>
<p class=lead>These employees earn below the average. The financial department of the company should review each of them and consider any possible bonus or promotion in order to keep them satisfied and boost their productivity. 'Difference' represents how much below the average these employees earn.</p>
</div>";

}
elseif(isset($_POST["foo"]) && $_POST["foo"] === "B")
{
	
echo "<br />\n";
echo "<br />\n";
echo "<br />\n";
echo "<h2>Warehouse Orders</h2>";
	 
$query = "SELECT warehouse.warehouseID, branch_name, orderID, totalCost , orderDate FROM warehouse, orders ,branches 
 where warehouse.warehouseID = orders.warehouseID and orders.clientID IS NULL and  warehouse.branchID=branches.branchID ORDER BY warehouseID ASC;";
$result = mysql_query($query);
printTable($result);



$query = "select sum(outcome)from financial_transactions where clientID IS NULL and orderID IS NOT NULL;";
$result = mysql_query($query);

while($row = mysql_fetch_assoc($result)){

$warehouseoutcome = $row["sum(outcome)"];

echo "<div class=text-center><h3>Total Warehouse Outcome: -$warehouseoutcome |GBP</h3></div>"; 
}


echo "<br />\n";

echo "
<div class=text-center>
<p class=lead> Detailed information about expenses on the warehouse orders of every particular warehouse. </p>
</div>";

}
elseif(isset($_POST["foo"]) && $_POST["foo"] === "C")
{


echo "<br />\n";
echo "<br />\n";
echo "<br />\n";
echo "<h2>Highest Earning Employees And Their Branches</h2>";

$query = "select branches.BranchID, branches.Branch_Name, employee.Position ,  employee.Fname, employee.Lname , employee.salary from branches,  employee where branches.branchID = employee.branchID and employee.salary > (select avg(employee.salary) from employee);";
$result = mysql_query($query);
printTable($result);




echo "<br />\n";

echo "<div class=text-center>
<p class=lead> These are the highest earning employees</p>
</div>";
}


?>

<div class=text-center>
<form action="accountant.php" method ="post">
<button class="btn btn-primary btn-lg" <input type="submit"  name="foo" value="">Main Financial Transactions  Menu</button>

</div>





	
	
	

	<?php include 'footer.php';?>


</body>






</html>

