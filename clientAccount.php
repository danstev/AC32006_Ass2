<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">

<html>
<?php include 'header.php';?>
<?php include 'scripts/ConnectToDB.php';?>
<?php 
$clientID = 1; //$_SESSION["cusID"];
$clientsres = mysql_query("SELECT * from clients WHERE clientID = '$clientID'");
$clients = MySQL_fetch_row($clientsres);
$addressres = mysql_query("SELECT * from address WHERE addressID = '$clients[6]'");
$address = MySQL_fetch_row($addressres);
$paymentres = mysql_query("SELECT cardDetails from payments_details WHERE clientID = '$clientID'");
$payment = mySQL_fetch_row($paymentres);
$securepayment = substr($payment[0], -4);
$usernameres = mysql_query("SELECT username from logins WHERE clientID = '$clientID'");
$username = mySQL_fetch_row($usernameres);
?>
<title> </title>
<body>
	<center>
	
	
	<article>
	<h2>My Account </h2>
	</center>
	<p>Account Name: <?php echo $username[0];?><!-- Get name from database--><br>
	Email Address: <?php echo $clients[4];?><!-- Get email from database--><br>
	Password: <?php echo "********";?><a href="placeholderurl.html">(change)</a><!-- Get password from database and replace with *--><br>
	Phone Number: <?php echo $clients[3];?><a href="placeholderurl.html">(change)</a><!-- Get phone number from database--><br>
	Saved Address: <?php echo $address[3] . " " . $address[2] . ", " . $address[4] . ", " . $address[5] . ", " . $address[1];?><a href="placeholderurl.html">(change)</a><!-- Get address from database--><br>
	Saved Payment Details: <?php echo "Card ending in: " . $securepayment;?><a href="placeholderurl.html">(change)</a><!-- Get card number from database and show last four digets--><br>
	
	</p>
	</article>



	<?php include 'footer.php';?>

	<?php include 'scripts/CloseConnection.php';?>	

</body>

</html>