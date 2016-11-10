<header style=" top:0; width: 100%; height: 10%; background-color: #C0FFEE; text-align:center;">
<div class="container"> 
 <div class="row">
 
		<?php
		if(session_id() == '')
		{
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><img src="Images/1.jpg" class="img-circle" width="50" height="50"></div>'; //Add logo here
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-3"><h1>DiveMasters</h1></div>';
			echo '<div class="col-md-1"><a href="logIn.php">Login</a></div>';
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-3"></div>';
			
		}
		else if($_SESSION["privilege"] === "customer")
		{
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><img src="Images/1.jpg" class="img-circle" width="50" height="50"></div>'; //Add logo here
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-6"><h1>DiveMasters</h1></div>';
			echo '<div class="col-md-3"></div>';
			
		}
		else if($_SESSION["privilege"] === "employee")
		{
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><img src="Images/1.jpg" class="img-circle" width="50" height="50"></div>'; //Add logo here
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-3"><h1>DiveMasters</h1></div>';
			echo '<div class="col-md-1"><a href="logIn.php">Login</a></div>';
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-3"></div>';
			
		}
		else if($_SESSION["privilege"] === "admin")
		{
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><img src="Images/1.jpg" class="img-circle" width="50" height="50"></div>'; //Add logo here
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-6"><h1>DiveMasters</h1></div>';
			echo '<div class="col-md-3"></div>';
			
		}
		else {
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><img src="Images/1.jpg" class="img-circle" width="50" height="50"></div>'; //Add logo here
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-6"><h1>DiveMasters</h1></div>';
			echo '<div class="col-md-3"></div>';
		}
		
		?>
	</div>
</div>
</header>
