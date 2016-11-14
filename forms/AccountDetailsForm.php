<form action="index.php"  method = "post" class="form-horizontal">
<fieldset>

<!-- Form Name -->
<legend>Change Account Details</legend>	
	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="email">Email Address</label>  
	  <div class="col-md-4">
	  <input id="email" name="email" type="text" placeholder="<?php echo $clients[4];?>" class="form-control input-md">
		
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="phoneNumber">Phone Number</label>  
	  <div class="col-md-4">
	  <input id="phoneNumber" name="phoneNumber" type="text" placeholder="<?php echo $clients[3]?>" class="form-control input-md">
		
	  </div>
	</div>

	<!-- Password input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="password">Password</label>
	  <div class="col-md-4">
		<input id="password" name="password" type="password" placeholder="********" class="form-control input-md">
		
	  </div>
	</div>
	
	<div class="form-group">
	  <label class="col-md-4 control-label" for="password">Confirm Password</label>
	  <div class="col-md-4">
		<input id="password" name="password" type="password" placeholder="********" class="form-control input-md">
		
	  </div>
	</div>

	<!-- Button -->
	<input type="submit" name="submit" value="Submit"/>
	</fieldset>
</form>