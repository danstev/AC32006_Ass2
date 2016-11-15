<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">

<html>
<title>Administrator </title>
<body>
<?php 
	include 'scripts/sessionStart.php';
	include 'header.php';
	include 'functions/PrintDetails.php';
?>

	<h1>Admin : Scubadiver bullshit what did we call us?</h1>
	<article>

	
	<?php
		if(session_id() == '' || !isset($_SESSION['privilege']))
		{
			echo "You do not have permission to see this page. Please log in.";
		}
		else if($_SESSION["privilege"] === "adminstrator")
		{
			echo '<table class="table"><thead><tr>';
			echo '<th>Products</th>';
			echo '<th>Employees</th>';
			echo '<th>Branches</th>';
			echo '</tr></thead><tbody>';
			echo '<tr class="success">';
			echo '<th><a href="item.php?type=add" class="btn btn-info" role="button">Add Product</a></th>';
			echo '<th><a href="employee.php?type=add" class="btn btn-info" role="button">Add Employee</a></th>';
			echo '<th><a href="branch.php?type=add" class="btn btn-info" role="button">Add Branch</a></th>';
			echo '</tr>';
			echo '<tr class="info">';
			echo '<th><a href="item.php?type=edit" class="btn btn-info" role="button">Edit Product</a></th>';
			echo '<th><a href="employee.php?type=edit" class="btn btn-info" role="button">Edit Employee</a></th>';
			echo '<th><a href="branch.php?type=edit" class="btn btn-info" role="button">Edit Branch</a></th>';
			echo '<tr class="danger">';
			echo '<th><a href="item.php?type=delete" class="btn btn-info" role="button">Delete Product</a></th>';
			echo '<th><a href="employee.php?type=delete" class="btn btn-info" role="button">Delete Employee</a></th>';
			echo '<th><a href="brqnch.php?type=delete" class="btn btn-info" role="button">Delete Branch</a></th>';
			echo '</tr></tbody></table></div>';
		}
		else
		{
			echo "You do not have permission to see this page.";
		}
		
	?>
<?php include 'footer.php';?>

		

</body>

</html>