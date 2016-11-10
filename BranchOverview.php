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

<?php 
include_once('scripts/ConnectToDB.php');
$name = $_SESSION["username"];
$query = "SELECT * FROM user_account WHERE username = '$name' ;";
$result = mysql_query($query);
$accountID=$result["accountID"];
$query2 = "SELECT * FROM employees WHERE accountID = '$accountID';";
$employee = mysql_query($query2);
$employee_branch = $employee["branchID"];
$query3 = "SELECT * FROM branches WHERE branchID = '$employee_branch';";
$branch = mysql_query($query3);
$query4 = "SELECT * FROM employee WHERE branchID ='$employee_branch';";
$employess = mysql_query($query4);
?>




<?php 

while($row = mysql_fetch_assoc($branch))
{
$BranchID= $row["branchID"];
$floor_staff= $row["fl_staff"];
$Managers= $row["managers"];
}

while($row = mysql_fetch_assoc($employees))
{
$employeeID= $row["employeeID"];
$position= $row["position"];
$FirstName= $row["Fname"];
$LastName= $row["Lname"];
$Salary= $row["salary"];
$PhoneNumber= $row["phonenumber"];
$Email= $row["email"];
$DateOfBirth= $row["dateofbirth"];
$AddressID= $row["addressID"];


$query3 ="SELECT*FROM address WHERE addressID ='$AddressID' ;";
$Addressemployee = mysql_query($query3);


}


?>




	<h1>idk : Scubadiver bullshit what did we call us?</h1>

	<article>
	<h2>what</h2>
	<p>kjhgkhjg</p>
	</article>


	<?php include 'footer.php';?>


</body>

</html>
