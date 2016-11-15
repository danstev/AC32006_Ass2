<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">

<html>
<title>Branch : ScubaDiver</title>
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
					include 'forms/AddBranch.php';
					
				}
				else if( $_GET["type"] == 'edit') //GET EDIT
				{
					$query = "SELECT * from branches;";
					$result = MYSQL_QUERY($query);
					include 'functions/PrintDetails.php';
					printDetails($result);
					include 'forms/EditBranch.php';
					echo '<br>';
					echo 'When you have chosen the branch you want to edit, place its ID in the form and change the details accordingly.';
				}
				else if( $_GET["type"] == 'delete')  // GET DELETE
				{
					$query = "SELECT * from branches;";
					$result = MYSQL_QUERY($query);
					include 'functions/PrintDetails.php';
					printDetails($result);
					include 'forms/DeleteBranch.php';
					echo '<br>';
					echo 'When you have chosen the branch you want to delete, place its ID in the form. MAKE SURE YOU WANT TO DELETE THIS BRANCH.';
				}
			}
			else if( isset($_POST['type']) )
			{
				if( $POST["type"] == 'add')  // POST ADD
				{
					include_once('scripts/ConnectToDB.php');
					$err = 0;
					$errCode = "Errors: <br>";
					
					$name =mysql_real_escape_string(trim($_POST['branchName']));
					
					$nameCheckQuery = mysql_query("Select Branch_Name from branches where Branch_Name = '$name';");
	
					while($usrRow = mysql_fetch_array($nameCheckQuery))
					{
						$nameCheck = $usrRow["Branch_Name"]; //Not sure if this is correct?
						if( $nameCheck == $name)
						{
							$err += 1;
							$errCode .= "This branch name is in use.<br>";
						}
					}
					
					$houseNo =mysql_real_escape_string(trim($_POST['houseNumber']));
					
					$street =mysql_real_escape_string(trim($_POST['streetName']));
					
					$city =mysql_real_escape_string(trim($_POST['city']));
					
					$county =mysql_real_escape_string(trim($_POST['county']));
					
					$postcode =mysql_real_escape_string(trim($_POST['postcode']));
					if( !($err != 0))
					{
						$query = "INSERT INTO address (HouseNumber, street, city, county, postcode) VALUES ('$houseNo', '$street', '$city', '$county','$postcode');";
						$result = MYSQL_QUERY($query);
						$IdQuery = "Select addressID from Clients where HouseNumber='$houseNo' AND street='$street' AND city='$city' AND county='$county' AND postcode='$postcode';";
						$idAddress = MYSQL_QUERY($IdQuery);
						while($idRow = mysql_fetch_array($idAddress))
						{
							$newID = $idRow["addressID"];
							$addAddressQuery = "INSERT INTO branches (branch_Name, addressID) VALUES ('$name', '$newID');";
							$loginResult = MYSQL_QUERY($addAddressQuery);
						}
					}
					else
					{
						echo "<br>";	
						echo $err;
						echo "<br>";
						echo $errCode;
						echo '<br>';
						echo 'Go back: ';
						echo '<a href="branch.php?type=add" class="btn btn-info" role="button">Add Branch</a>';
					}

					
				}
				else if( $POST["type"] == 'edit') // POST EDIT
				{
					include_once('scripts/ConnectToDB.php');
					$err = 0;
					$errCode = "Errors: <br>";
					
					$branchID =mysql_real_escape_string(trim($_POST['branchId']));
					
					$name =mysql_real_escape_string(trim($_POST['branchName']));
					
					$nameCheckQuery = mysql_query("Select Branch_Name from branches where Branch_Name = '$name';");
	
					while($usrRow = mysql_fetch_array($nameCheckQuery))
					{
						$nameCheck = $usrRow["Branch_Name"]; //Not sure if this is correct?
						if( $nameCheck == $name)
						{
							$err += 1;
							$errCode .= "This branch name is in use.<br>";
						}
					}
					
					$houseNo =mysql_real_escape_string(trim($_POST['houseNumber']));
					
					$street =mysql_real_escape_string(trim($_POST['streetName']));
					
					$city =mysql_real_escape_string(trim($_POST['city']));
					
					$county =mysql_real_escape_string(trim($_POST['county']));
					
					$postcode =mysql_real_escape_string(trim($_POST['postcode']));
					if( !($err != 0))
					{
						
						$addressID;
						
						//update address
						$branchQuery = 'SELECT addressID from branches where branchID = '$branchID'';
						$branchResult = MYSQL_QUERY($query);
						while($bRow = mysql_fetch_array($branchResult))
						{
							$addressID = $bRow["addressID"];
							$updateAddress = 'UPDATE address SET houseNumber='$houseNo', streetName='$street', city='$city', county='$county', postcode='$postcode' WHERE addressID = '$addressID'';
							$runAdd = MYSQL_QUERY($updateAddress);
						}
						
						//update branch
						$updateBranch = 'UPDATE branches SET branch_name='$name', addressID='$addressID' WHERE branchID = '$branchID'';
						$runBranch = MYSQL_QUERY($updateBranch);
						
					}
					else
					{
						echo "<br>";	
						echo $err;
						echo "<br>";
						echo $errCode;
						echo '<br>';
						echo 'Go back: ';
						echo '<a href="branch.php?type=edit" class="btn btn-info" role="button">Edit Branch</a>';
					}
				}
				else if( $POST["type"] == 'delete') // POST DELETE
				{
					include_once('scripts/ConnectToDB.php');
					$err = 0;
					$errCode = "Errors: <br>";
					
					$branchID =mysql_real_escape_string(trim($_POST['branchId']));
					
					if( !($err != 0))
					{
						$delQuery = 'DELETE FROM branches WHERE branchID='$branchID'';
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
						echo '<a href="branch.php?type=delete" class="btn btn-info" role="button">Delete Branch</a>';
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