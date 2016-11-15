<form action="basket.php" method="post">
	<div class ="invis"><input type="text" name="prod" value="<?php echo $row["productID"];?>" readonly></div>
	<select name="quantity"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select>
	<input type="submit" name="submit" value="Add"/>
	<div class ="invis"><input type="text" name="remov" value="<?php echo $row["productID"];?>" readonly></div>
	<input type="submit" name="submit" value="Remove"/>
</form>
