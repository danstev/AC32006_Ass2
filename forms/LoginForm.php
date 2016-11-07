<form action="login.php" method ="post">
		Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username);?>"/><br/>
		Password: <input type="password" name="password" value=""/><br/>
		<br/>
		<input type="submit" name="submit" value="Submit"/>
</form>