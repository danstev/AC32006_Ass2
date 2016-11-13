<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<link rel="stylesheet" href="style.css">
<?php

 	include 'ConnectToDB.php';
	include  'sessionStart.php';
	
// need add some work, idea is using pointers with array
	
	$result = mysql_query($con,'select * from products where id='.$_GET['id']);
	//  ELECT id,title FROM (SELECT id, title FROM t1 UNION ALL SELECT id,title FROM t2) tbl
//	GROUP BY id, title
//	HAVING count(*) = 1
//	ORDER BY id;
	$product = mysqli_fetch_object() // how to pass this object?
	if(isset($_GET['id'])){
		$item = new Item();
		$item->id = $product->id;
		$item->price = $product->price;
		$item->quantity = 1;
		$_SESSION['cart'] [] = $item;
		
}
?>


<table cellpadding="2" cellspacinf="2" border="1">
	<tr>
		<th>Id</th>
		<th>name</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Total</th>
	</tr>	
	
<?php	
		$cart = unserialize(serialize($_SESSION['cart']));
		for($i=0; $i<count($cart); $i++){
	?>
	<tr>
		<th><?php echo $cart [$i]->id; ?></th>
		<th><?php echo $cart [$i]->name; ?></th>
		<th><?php echo $cart [$i]->price; ?></th>
		<th><?php echo $cart [$i]->quantity; ?></th>
		<th><?php echo $cart [$i]->price * $cart[$i]->quantity; ?>
	</th>
	
	<?php } ?>	
		
</table>
	<br>
	<a href="Products.php"></a>


