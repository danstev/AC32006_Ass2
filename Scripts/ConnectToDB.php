<?php
	$db = mysql_connect("silva.computing.dundee.ac.uk", "16ac3u25","abc322"); //Dead connection details here
	mysql_select_db("16ac3d25");
	if(!$db)
	{
		echo "Cannot connect to database";
	}

	
?>
