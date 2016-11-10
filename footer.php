<footer style=" bottom:0; width: 100%; height: 10%; background-color: #80ffdd; ">
<div class="container"> 
 <div class="row">
 
		<?php
		if(session_id() == '' || !isset($_SESSION['privilege']))
		{
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><img src="Images/1.jpg" class="img-circle" width="50" height="50"></div>';
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><a href="Index.php">Home</a></div>';
			echo '<div class="col-md-1"><a href="logIn.php">Login</a></div>';
			echo '<div class="col-md-1"><a href="signUPpage.php">Register</a></div>';
			echo '<div class="col-md-1"><a href="Products.php">Products</a></div>';
			echo '<div class="col-md-1"><a href="ContactUs.php">Contact Us</a></div>';
			echo '<div class="col-md-1"><a href="ContactUs.php">Contact Us</a></div>';
			echo '<div class="col-md-3"></div>';
			
		}
		else if($_SESSION["privilege"] === "customer")
		{
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><img src="Images/1.jpg" class="img-circle" width="50" height="50"></div>';
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><a href="Index.php">Home</a></div>';
			echo '<div class="col-md-1"><a href="Products.php">Products</a></div>';
			echo '<div class="col-md-1"><a href="basket.php">Basket</a></div>';
			echo '<div class="col-md-1"><a href="Products.php">Checkout</a></div>';
			echo '<div class="col-md-1"><a href="helpDesk.php">Help Desk</a></div>';
			echo '<div class="col-md-1"><a href="logout.php">Log out</a></div>';
			echo '<div class="col-md-3"></div>';
			
		}
		else if($_SESSION["privilege"] === "employee")
		{
			echo 'LINK CURRENTLY BROKEN!!!';
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><img src="Images/1.jpg" class="img-circle" width="50" height="50"></div>';
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><a href="Index.php">Home</a></div>';
			echo '<div class="col-md-1"><a href="logIn.php">Branch Overview</a></div>';
			echo '<div class="col-md-1"><a href="signUPpage.php">Stock</a></div>';
			echo '<div class="col-md-1"><a href="Products.php">Employee Page</a></div>';
			echo '<div class="col-md-1"><a href="ContactUs.php">Order Display</a></div>';
			echo '<div class="col-md-1"><a href="ContactUs.php">Log Out</a></div>';
			echo '<div class="col-md-3"></div>';
			
		}
		else if($_SESSION["privilege"] === "admin")
		{
			echo 'LINK CURRENTLY BROKEN!!!';
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><img src="Images/1.jpg" class="img-circle" width="50" height="50"></div>';
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><a href="Index.php">Home</a></div>';
			echo '<div class="col-md-1"><a href="logIn.php">Branch Overview</a></div>';
			echo '<div class="col-md-1"><a href="addSupplier.php">Add supplier</a></div>';
			echo '<div class="col-md-1"><a href="Products.php">Products</a></div>';
			echo '<div class="col-md-1"><a href="ContactUs.php">Contact Us</a></div>';
			echo '<div class="col-md-1"><a href="ContactUs.php">Contact Us</a></div>';
			echo '<div class="col-md-3"></div>';
			
		}
		else {
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><img src="Images/1.jpg" class="img-circle" width="50" height="50"></div>';
			echo '<div class="col-md-1"></div>';
			echo '<div class="col-md-1"><a href="Index.php">Home</a></div>';
			echo '<div class="col-md-1"><a href="logIn.php">Login</a></div>';
			echo '<div class="col-md-1"><a href="signUPpage.php">Register</a></div>';
			echo '<div class="col-md-1"><a href="Products.php">Products</a></div>';
			echo '<div class="col-md-1"><a href="ContactUs.php">Company page</a></div>';
			echo '<div class="col-md-1"><a href="ContactUs.php">Contact Us</a></div>';
			echo '<div class="col-md-3"></div>';
		}
		
		?>
	</div>
</div>
</footer>
