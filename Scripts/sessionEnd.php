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
<<<<<<< HEAD
?> 
=======
?> 
>>>>>>> bb1cfb2ea72dc3afa70887398d5f220ddb4750c1
