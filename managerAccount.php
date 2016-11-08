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
	<center>
	<div class="jumbotron text-center">
	<h1>DiveMasters</h1>
	</div>
	<?php include 'scripts/ConnectToDB.php';?>
	<article>
	<h2>My Employee Account </h2>
	</center>
	<p>Account Name:<!-- Get name from database--><br>
	My Salary:<a href="placeholderurl.html">(manage)</a><!-- Get salary from database--><br>
	Email Address:<!-- Get email from database--><br>
	Password: <a href="placeholderurl.html">(change)</a><!-- Get password from database and replace with *--><br>
	Phone Number: <a href="placeholderurl.html">(change)</a><!-- Get phone number from database--><br>
	Saved Address: <a href="placeholderurl.html">(change)</a><!-- Get address from database--><br>
	Saved Payment Details: <a href="placeholderurl.html">(change)</a><!-- Get card number from database and show last four digets--><br><br><br>
	
	Table with manager database view
	</p>
	</article>


	<?php include 'footer.html';?>

	<?php include 'scripts/CloseConnection.php';?>	

</body>

</html>