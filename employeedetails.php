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
	<h1>idk : Scubadiver bullshit what did we call us?</h1>

	<article>
	<h2></h2>
	<p></p>
	</article>

	
	<?php 
include_once('scripts/ConnectToDB.php');

$query = "SELECT*FROM user_account WHERE username = '$_SESSION["username"]';";
$result = mysql_query($query);
$query2 = "SELECT*FROM employees WHERE accountID = '$result["accountID"]';";
$employee = mysql_query($query);
?>

	

	<?php include 'footer.php';?>


</body>
<?php 

while($row = mysql_fetch_assoc($employee))
{
$employeeID= $row["employeeID"];
$position= $row["position"];
$FirstName= $row["Fname"];
$Salary= $row["salary"];
$PhoneNumber= $row["phonenumber"];
$Email= $row["email"];
$DateOfBirth= $row["dateofbirth"];
$AddressID= $row["addressID"];
$BranchID= $row["branchID"]
	
}

?>

<h1>   DiveMasters</h1>




</html>

