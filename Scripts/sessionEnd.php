<?php

	if(session_id() === '')
		{
			echo "You need to log in to log out.";
		}
	else
	{
			
			session_unset(); 
			session_destroy();
			echo "You have successfully logged out, come back soon!";
	}
?> 
