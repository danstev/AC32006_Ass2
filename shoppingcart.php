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
	$product = mysqli_fetch_object() // cart?
	if(isset($_GET['id'])){
		$item = new Item();
		$item->id=$product->id;
		$item->price=$product->price;
		$item->quantity=1;
		// check product if exist
		$index = -1;
		$cart = unserialize(serialize($_SESSION['cart']));
		
		for($i=0; $i<count($cart); $i++)
			if($cart[$i]->id==$_GET[''id]){
				$index =$i;
				break;
			}
			if($index==--1)
				$_SESSION['cart'] [] = $item;
			else{
				$cart[index]->quantity++;
				$_SESSION['cart'] [] = $cart;
			}
}		
		//delete	
	   if(isset($_GET['index'])){
		 $cart = unserialize(serialize($_SESSION['cart']));
		 unset($cart[$_GET[''];
		 $cart = array_values($cart);
		 $_SESSION['cart'] = $cart;
	}
			
	 		
	
?>


<table cellpadding="2" cellspacinf="2" border="1">
	<tr>
		<th>Option</th>
		<th>Id</th>
		<th>name</th>
		<th>Price</th>
		<th>Quantity</th>
		<th>Total</th>
	</tr>	
	
<?php	
		$cart = unserialize(serialize($_SESSION['cart']));
		$s=0;
		index=0;
		for($i=0; $i<count($cart); $i++){
		$s += $cart[$i]->price * $cart[$i]->quantity;
	?>
	<tr>
		<td><a href="shoppingcart.php?index=<?php echo $index; ?>" onclick="return confirm('Last chance to change your mind')">Delete</a></td>
		<td><?php echo $cart [$i]->id; ?></td>
		<td><?php echo $cart [$i]->name; ?></td>
		<td><?php echo $cart [$i]->price; ?></td>
		<td><?php echo $cart [$i]->quantity; ?></td>
		<td><?php echo $cart [$i]->price * $cart[$i]->quantity; ?> </td>
	</tr>
	
	<?php 
		
			$index++;
		}
		 ?>	
	<tr>
		<td colspan="5" align="right">Total </td>
		<td align="left"><?php echo $s; ?> </td>
	 </tr>	
		
</table>
	<br>
	<a href="Products.php">Continue Shopping</a>


