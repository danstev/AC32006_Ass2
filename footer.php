<<<<<<< HEAD
<footer>
=======
<footer style=" bottom:0; width: 100%; height: 10%; background-color: #80ffdd; ">
>>>>>>> origin/master
<div class="container"> 
 <div class="row">
 
		<?php
		if(session_id() == '' || !isset($_SESSION['privilege']))
		{
			echo '<div class="col-md-1"></div>';
			echo '<div class="btn-group btn-group-justified">';
			echo '<a class="btn btn-info" role="button"><img src="Images/1.jpg" class="img-circle" width="60" height="60"></a>';
			echo '<a href="Index.php" class="btn btn-info" role="button">Home</a>';
			echo '<a href="logIn.php" class="btn btn-info" role="button">Login</a>';
			echo '<a href="signUPpage.php" class="btn btn-info" role="button">Register</a>';
			echo '<a href="Products.php" class="btn btn-info" role="button">Products</a>';
			echo '<a href="ContactUs.php" class="btn btn-info" role="button">Contact Us</a>';
			echo '<a href="basket.php" class="btn btn-info" role="button">Basket</a></div>';
			echo '<div class="col-md-3"></div>';
			
		}
		else if($_SESSION["privilege"] === "customer")
		{
<<<<<<< HEAD
			echo '<div class="col-md-1"></div>';
			echo '<div class="btn-group btn-group-justified">';
			echo '<a class="btn btn-info" role="button"><img src="Images/1.jpg" class="img-circle" width="60" height="60"></a>';
			echo '<a href="Index.php" class="btn btn-info" role="button">Home</a>';
			echo '<a href="ContactUs.php" class="btn btn-info" role="button">Contact Us</a>';
			echo '<a href="Products.php" class="btn btn-info" role="button">Products</a>';
			echo '<a href="checkout.php" class="btn btn-info" role="button">Checkout</a>';
			echo '<a href="basket.php" class="btn btn-info" role="button">Basket</a>';
			echo '<a href="HelpDesk.php" class="btn btn-info" role="button">Help Desk</a>';
			echo '<a href="logout.php" class="btn btn-info" role="button">Logout</a></div>';
=======
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><img src="Images/1.jpg" class="img-circle" width="50" height="50"></div>';
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><a href="Index.php">Home</a></div>';
			echo '<div class="col-md-1"><a href="Products.php">Products</a></div>';
			echo '<div class="col-md-1"><a href="basket.php">Basket</a></div>';
			echo '<div class="col-md-1"><a href="Products.php">Checkout</a></div>';
			echo '<div class="col-md-1"><a href="helpDesk.php">Help Desk</a></div>';
			echo '<div class="col-md-1"><a href="logout.php">Log out</a></div>';
>>>>>>> origin/master
			echo '<div class="col-md-3"></div>';
			
		}
		else if($_SESSION["privilege"] === "employee")
		{
			echo '<div class="col-md-1"></div>';
			echo '<div class="btn-group btn-group-justified">';
			echo '<a class="btn btn-info" role="button"><img src="Images/1.jpg" class="img-circle" width="60" height="60"></a>';
			echo '<a href="Index.php" class="btn btn-info" role="button">Home</a>';
			echo '<a href="ContactUs.php" class="btn btn-info" role="button">Contact Us</a>';
			echo '<a href="Products.php" class="btn btn-info" role="button">Products</a>';
			echo '<a href="checkout.php" class="btn btn-info" role="button">Checkout</a>';
			echo '<a href="basket.php" class="btn btn-info" role="button">Basket</a>';
			echo '<a href="HelpDesk.php" class="btn btn-info" role="button">Help Desk</a>';
			echo '<a href="logout.php" class="btn btn-info" role="button">Logout</a></div>';
			echo '<div class="col-md-3"></div>';
			
		}
		else if($_SESSION["privilege"] === "admin")
		{
			echo '<div class="col-md-1"></div>';
<<<<<<< HEAD
			echo '<div class="btn-group btn-group-justified">';
			echo '<a class="btn btn-info" role="button"><img src="Images/1.jpg" class="img-circle" width="60" height="60"></a>';
			echo '<a href="Index.php" class="btn btn-info" role="button">Home</a>';
			echo '<a href="ContactUs.php" class="btn btn-info" role="button">Contact Us</a>';
			echo '<a href="BranchOverview.php" class="btn btn-info" role="button">Branch Overciew</a>';
			echo '<a href="employeeAccount.php" class="btn btn-info" role="button">Employee Accounts</a>';
			echo '<a href="OrderHistory.php" class="btn btn-info" role="button">Order History</a>';
			echo '<a href="AddSupplier.php" class="btn btn-info" role="button">Add Supplier</a>';
			echo '<a href="logout.php" class="btn btn-info" role="button">Logout</a></div>';
=======
			echo '<div class="col-md-1"><img src="Images/1.jpg" class="img-circle" width="50" height="50"></div>';
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><a href="Index.php">Home</a></div>';
			echo '<div class="col-md-1"><a href="logIn.php">Branch Overview</a></div>';
			echo '<div class="col-md-1"><a href="addSupplier.php">Add supplier</a></div>';
			echo '<div class="col-md-1"><a href="Products.php">Products</a></div>';
			echo '<div class="col-md-1"><a href="ContactUs.php">Contact Us</a></div>';
			echo '<div class="col-md-1"><a href="ContactUs.php">Contact Us</a></div>';
>>>>>>> origin/master
			echo '<div class="col-md-3"></div>';
			
		}
		else {
			echo '<div class="col-md-1"></div>';
			echo '<div class="btn-group btn-group-justified">';
			echo '<a class="btn btn-info" role="button"><img src="Images/1.jpg" class="img-circle" width="60" height="60"></a>';
			echo '<a href="Index.php" class="btn btn-info" role="button">Home</a>';
			echo '<a href="logIn.php" class="btn btn-info" role="button">Login</a>';
			echo '<a href="signUPpage.php" class="btn btn-info" role="button">Register</a>';
			echo '<a href="Products.php" class="btn btn-info" role="button">Products</a>';
			echo '<a href="ContactUs.php" class="btn btn-info" role="button">Contact Us</a>';
			echo '<a href="basket.php" class="btn btn-info" role="button">Basket</a></div>';
			echo '<div class="col-md-3"></div>';
		}
		
		?>
	</div>
</div>
</footer>
