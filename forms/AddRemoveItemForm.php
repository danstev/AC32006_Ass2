<form action="basket.php" method="post">
	<input type="text" name="prod" value="<?php echo $row["productID"]?>" readonly>
	<select name="quantity"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select>
	<input type="submit" value="Add"/>
</form>
<form action="basket.php" method="post" >
  <input type="text" name="prod" value="<?php echo $row["productID"]?>" readonly>
  <input type="submit" name="Remove" value="Remove"/>
</form>