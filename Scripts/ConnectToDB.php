<?php
	echo "Starting connection to database<br>";
	$db = mysql_connect("silva.computing.dundee.ac.uk", "16ac3u25","abc322");
	mysql_select_db("16ac3d25");
	if(!$db)
	{
		echo "Cannot connect to database";
	}
	else
	{
		echo "Successfully connected";
	}
	
?>
