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

<?php 
include_once('scripts/ConnectToDB.php');
$name =  "scubaC";//$_SESSION["username"];
$employeeIDres = mysql_query("SELECT employeeID FROM logins WHERE username = '$name'");
$employeeID = MySQL_fetch_row($employeeIDres);
$branchIDres=mysql_query("SELECT branchID FROM employee WHERE employeeID = '$employeeID[0]'");
$branchID = MySQL_fetch_row($branchIDres);
$query = mysql_query("SELECT employee.Fname, employee.Lname, employee.position, employee.email, employee.phonenumber, employee.dateofbirth, employee.branchID, employee.salary, address.street, address.housenumber, address.city, address.country, address.postcode, logins.username
FROM employee
INNER JOIN address
ON employee.addressID=address.addressID
LEFT JOIN logins ON employee.employeeID=logins.employeeID
WHERE employee.branchID = '$branchID[0]';");
$query2 = MySQL_fetch_row($query);

?>







	<h1>idk : Scubadiver bullshit what did we call us?</h1>

	<article>
	<h2>what</h2>
	<p>kjhgkhjg</p>
	</article>
<?php 
echo "<br><table border=\"5\" bordercolor=\"black\"
		cellpadding=\"10\" width=\"100%\" style=\"border-collapse:
		collapse\" align=\"center\"><tr>
		<tr>
		<th>First Name</th>
		<th>Last Name</th>
		<th>Position</th>
		<th>Phone Number</th>
		<th>Date of Birth</th>
		<th>Branch ID</th>
		<th>Salary</th>
		<th>Street</th>
		<th>House Number</th>
		<th>city</th>
		<th>country</th>
		<th>Postcode</th>
		<th>Username</th>
		</tr>";

while($row = mysql_fetch_array($query))
  {
  echo "<tr>";
  echo "<td>" .$row['Fname']. "</td>";
  echo "<td>" .$row['Lname']. "</td>";
  echo "<td>" .$row['position']. "</td>";
  echo "<td>" .$row['phonenumber']. "</td>";
  echo "<td>" .$row['dateofbirth']. "</td>";
  echo "<td>" .$row['branchID']. "</td>";
  echo "<td>" .$row['salary']. "</td>";
  echo "<td>" .$row['street']. "</td>";
  echo "<td>" .$row['housenumber']. "</td>";
  echo "<td>" .$row['city']. "</td>";
  echo "<td>" .$row['country']. "</td>";
  echo "<td>" .$row['postcode']. "</td>";
  echo "<td>" .$row['username']. "</td>";
  echo "</tr>";
  }
  
  echo "</table>";
?>


	<?php include 'footer.php';?>


</body>

</html>
