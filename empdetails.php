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
include_once('scripts/sessionStart.php');

if($_SESSION["privilege"] !== "customer" || $_SESSION["privilege"] !== '' || !isset($_SESSION['privilege']))
{
	$id = $_SESSION["empID"];
	
	$query = "SELECT * FROM employees WHERE employeeID = '$id';";
	$employee = mysql_query($query2); 

	if ($query2=== '') //If query is null?
	{
		while($row = mysql_fetch_assoc($employee))
		{
			//$employeeID= $row["employeeID"]; why display this?
			
			$FirstName= $row["Fname"];
			$LastName= $row["Lname"];
			$BranchID= $row["branchID"]; //Maybe link branch here?
			$position= $row["position"];
			$Salary= $row["salary"];
			$PhoneNumber= $row["phonenumber"];
			$Email= $row["email"];
			$DateOfBirth= $row["dateofbirth"];
			$AddressID= $row["addressID"];
			 
		}
	}

	$query3 ="SELECT*FROM address WHERE addressID ='$AddressID' ;";
	$Addressemployee = mysql_query($query3);

	while($row2 = mysql_fetch_assoc($Addressemployee))
	{
		$postcode= $row2["postcode"];
		$street= $row2["street"];
		$house= $row2["house"];
		$city= $row2["city"];
		$country= $row2["country"];   
	}
	$fullAddress =$house.' '.$street.' '.$city.' '.$postcode.' '.$country; 

}
?>

<article>
 <h1>Employee Personal Details</h1>

 <h3>Employee ID: <?php   echo $employeeID;  ?></h3>
 <h3>Position: <?php   echo $position;   ?></h3>
 <h3>First Name: <?php   echo $FirstName;   ?></h3>
 <h3>Last Name: <?php   echo $LastName;   ?></h3>
 <h3>Date Of Birth: <?php   echo $DateOfBirth;  ?></h3>
 <h3>Phone Number: <?php   echo $PhoneNumber; ?></h3>
 <h3>Email: <?php   echo $Email; ?></h3>
 <h3>Address:  <?php   echo $fullAddress; ?> </h3>
 <h3>Salary: <?php   echo $Salary; ?></h3>


  <?php include 'footer.php';?>


</body>

  </article>

</html>
