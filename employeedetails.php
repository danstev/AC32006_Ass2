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
?>

<?php 

if ($query2=== '')
{
while($row = mysql_fetch_assoc($employee))
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
$BranchID= $row["branchID"];  
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
