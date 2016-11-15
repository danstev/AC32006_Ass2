
<header>

<div class="container"> 
 <div class="row">
 
		<?php
		if(session_id() == '' || !isset($_SESSION['privilege']))
		{
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><img src="Images/1.jpg" class="img-circle" width="50" height="50"></div>'; //Add logo here
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-3"><h1 class="header">DiveMasters</h1></div>';
			echo '<div class="btn-group btn-group-justified">';
			echo '<a href="logIn.php" class="btn btn-info" role="button">Login</a>';
			//include 'scripts/basketFunc';
			//displayBasketButton();
			echo '<div class="col-md-3"></div>';
			
		}
		else if($_SESSION["privilege"] === "customer")
		{
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><img src="Images/1.jpg" class="img-circle" width="50" height="50"></div>'; //Add logo here
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-3"><h1 class="header">DiveMasters</h1></div>';
			echo '<div class="btn-group btn-group-justified">';
			echo '<a href="logout.php" class="btn btn-info" role="button">Logout</a>';
			echo '<div class="col-md-1">';
			include 'functions/basketFunc2.php';
			displayBasketButton2();
			echo '</div>';
			echo '<div class="col-md-3"></div>';
			
		}
		else if($_SESSION["privilege"] === "employee")
		{
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><img src="Images/1.jpg" class="img-circle" width="50" height="50"></div>'; //Add logo here
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-3"><h1 class="header">DiveMasters</h1></div>';
			echo '<div class="btn-group btn-group-justified">';
			echo '<a href="logout.php" class="btn btn-info" role="button">Logout</a>';
			//include_once 'scripts/basketFunc.php';
			//displayBasketButton();
			echo '<div class="col-md-3"></div>';
		}
		else if($_SESSION["privilege"] === "admin")
		{
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><img src="Images/1.jpg" class="img-circle" width="50" height="50"></div>'; //Add logo here
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-3"><h1 class="header">DiveMasters</h1></div>';
			echo '<div class="btn-group btn-group-justified">';
			echo '<a href="logout.php" class="btn btn-info" role="button">Logout</a>';
			//include_once 'scripts/basketFunc.php';
			//displayBasketButton();
			echo '<div class="col-md-3"></div>';
			
		}
		else {
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><img src="Images/1.jpg" class="img-circle" width="50" height="50"></div>'; //Add logo here
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-3"><h1 class="header">DiveMasters</h1></div>';
			echo '<div class="btn-group btn-group-justified">';
			echo '<a href="logIn.php" class="btn btn-info" role="button">Login</a>';
			//include_once 'scripts/basketFunc.php';
			//displayBasketButton();
			echo '<div class="col-md-3"></div>';
		}
		
		?>
	</div>
</div>
</header>
