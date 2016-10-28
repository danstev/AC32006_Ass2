<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<html>
<title> </title>
<body>
	<h1>TITLE</h1>
	<article>
	<h2>Article 1</h2>
	<p>This is article 1</p>
	<?php
	
	echo "Today is " . date("Y/m/d") . "<br>";
	?>
	
	<?php
	echo "Starting connection to datavase<br>";
	$db = mysql_connect("silva.computing.dundee.ac.uk", "16ac3u06","cba123");
	mysql_select_db("16ac3d06");
	if(!$db)
	{
		echo mysql_error();
	}
	else
	{
		echo "Successfully connected";
	}
	mysql_close($db);
	
	?>
	</article>
	<article>
	<h2>Article 2</h2>
	<p>This is article 2</p>
	</article>

	<footer>
			<div w3-include-html="footer.html"></div>			
    </footer> 
</body>

</html>
