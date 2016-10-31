<?php
	echo "Starting connection to database<br>";
	$db = mysql_connect("silva.computing.dundee.ac.uk", "16ac3u06","cba123");
	mysql_select_db("16ac3d06");
	if(!$db)
	{
		echo "Cannot connect to database";
	}
	else
	{
		echo "Successfully connected";
	}
	
?>