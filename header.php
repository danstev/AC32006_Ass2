<header style="  width: 100%; height: 10%; background-color: #80ffdd; text-align:center;  margin:auto;">
<div class="container"> 
 <div class="row">
 
		<?php
		if(session_id() == '' || !isset($_SESSION['privilege']))
		{
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><img src="Images/1.jpg" class="img-circle" width="50" height="50"></div>'; //Add logo here
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-3"><h1 class="header">DiveMasters</h1></div>';
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
