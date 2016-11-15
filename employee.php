<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">

<html>
<title>Employee : ScubaDiver</title>
<body>

	<?php include 'sctipts/sessionStart.php';?>
	<?php include 'header.php';?>
	
	<?php
		if(session_id() == '' || !isset($_SESSION['privilege']))
		{
			echo "You do not have permission to see this page. Please log in.";
		}
		else if($_SESSION["privilege"] === "adminstrator")
		{
			if( isset($_GET['type']) )
			{
				if( $_GET["type"] == 'add') //GET ADD
				{
					include 'forms/AddEmp.php';
					
				}
				else if( $_GET["type"] == 'edit') //GET EDIT
				{
					$query = "SELECT * from employee;";
					$result = MYSQL_QUERY($query);
					include 'functions/PrintDetails.php';
					printDetails($result);
					include 'forms/EditEmp.php';
					echo '<br>';
					echo 'When you have chosen the employees details you want to edit, place the ID in the form and change the details accordingly.';
				}
				else if( $_GET["type"] == 'delete')  // GET DELETE
				{
					$query = "SELECT * from employee;";
					$result = MYSQL_QUERY($query);
					include 'functions/PrintDetails.php';
					printDetails($result);
					include 'forms/DeleteEmp.php';
					echo '<br>';
					echo 'When you have chosen the employees details you want to delete, place its ID in the form. MAKE SURE YOU WANT TO DELETE THIS EMPLOYEE.';
				}
			}
			else if( isset($_POST['type']) )
			{
				if( $POST["type"] == 'add')  // POST ADD
				{
					include_once('scripts/ConnectToDB.php');
					$err = 0;
					$errCode = "Errors: <br>";
					
					$position =mysql_real_escape_string(trim($_POST['position']));
					
					$Fname = mysql_real_escape_string(trim($_POST['Fname']));
					$Fname = strip_tags($Fname);
					$Fname = htmlspecialchars($Fname);
	
					$Lname = mysql_real_escape_string(trim($_POST['Lname']));
					$Lname = strip_tags($Lname);
					$Lname = htmlspecialchars($Lname);
	
					$phoneNumber =mysql_real_escape_string(trim($_POST['phoneNumber']));
					$phoneNumber = strip_tags($phoneNumber);
					$phoneNumber = htmlspecialchars($phoneNumber);
					$phoneNumber = preg_replace("([^0-9])", "", $phoneNumber);
					
					$salary =mysql_real_escape_string(trim($_POST['salary']));
					
					$email =mysql_real_escape_string (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)); 
					
					$dateofbirth = preg_replace("([^0-9/])", "", $_POST['dateofbirth']);// mysql_real_escape_string
					$dateofbirth = date("y-m-d", strtotime($dateofbirth));
					
					if( !($err != 0))
					{
						$query = "INSERT INTO employee (position, Fname, Lname, salary, phonenumber, email, dateofbirth) VALUES ('$position', '$Fname', '$Lname', '$salary', '$phonenumber', '$email', '$dateofbirth');";
						$result = MYSQL_QUERY($query);
					}
					else
					{
						echo "<br>";	
						echo $err;
						echo "<br>";
						echo $errCode;
						echo '<br>';
						echo 'Go back: ';
						echo '<a href="employee.php?type=add" class="btn btn-info" role="button">Add EMployee</a>';
					}

					
				}
				else if( $POST["type"] == 'edit') // POST EDIT
				{
					include_once('scripts/ConnectToDB.php');
					$err = 0;
					$errCode = "Errors: <br>";
					
					$employeeId = mysql_real_escape_string(trim($_POST['employeeID']));
					
					$position =mysql_real_escape_string(trim($_POST['position']));
					
					$Fname = mysql_real_escape_string(trim($_POST['Fname']));
					$Fname = strip_tags($Fname);
					$Fname = htmlspecialchars($Fname);
	
					$Lname = mysql_real_escape_string(trim($_POST['Lname']));
					$Lname = strip_tags($Lname);
					$Lname = htmlspecialchars($Lname);
	
					$phoneNumber =mysql_real_escape_string(trim($_POST['phoneNumber']));
					$phoneNumber = strip_tags($phoneNumber);
					$phoneNumber = htmlspecialchars($phoneNumber);
					$phoneNumber = preg_replace("([^0-9])", "", $phoneNumber);
					
					$salary =mysql_real_escape_string(trim($_POST['salary']));
									
					$email =mysql_real_escape_string (filter_var($_POST['email'], FILTER_SANITIZE_EMAIL)); 
					
					$dateofbirth = preg_replace("([^0-9/])", "", $_POST['dateofbirth']);// mysql_real_escape_string
					$dateofbirth = date("y-m-d", strtotime($dateofbirth));
					
					if( !($err != 0))
					{

						$updateEmp = 'UPDATE employee SET position='$position', Fname='$Fname',Lname='$Lname',phoneNumber='$phoneNumber',salary='$salary',email='$email',dateofbirth='$dateofbirth',WHERE employeeId = '$employeeId'';
						$runEmp = MYSQL_QUERY($updateEmp);
						echo 'Employee added.';
						
					}
					else
					{
						echo "<br>";	
						echo $err;
						echo "<br>";
						echo $errCode;
						echo '<br>';
						echo 'Go back: ';
						echo '<a href="Employee.php?type=edit" class="btn btn-info" role="button">Edit Employee</a>';
					}
				}
				else if( $POST["type"] == 'delete') // POST DELETE
				{
					include_once('scripts/ConnectToDB.php');
					$err = 0;
					$errCode = "Errors: <br>";
					
					$employeeId =mysql_real_escape_string(trim($_POST['employeeId']));
					
					if( !($err != 0))
					{
						$delQuery = 'DELETE FROM employee WHERE employeeId='$employeeId'';
						$runDel =  mysql_query($delQuery);
					}
					else
					{
						echo "<br>";	
						echo $err;
						echo "<br>";
						echo $errCode;
						echo '<br>';
						echo 'Go back: ';
						echo '<a href="Employee.php?type=delete" class="btn btn-info" role="button">Delete Employee</a>';
					}
				}
				
			}
			else
			{
					echo 'Please go back to the admin page and select an action: ';
					echo '<a href="admin.php" class="btn btn-info" role="button">Click here!</a>';
			}
		}
		else
		{
			echo "You do not have permission to see this page.";
		}
		
	?>
	
	<?php include 'footer.php';?>

</body>

</html>