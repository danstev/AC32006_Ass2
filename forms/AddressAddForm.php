<form class="form-horizontal">
<fieldset>
<legend>Change Account Details</legend>
<form action="index.php"  method = "post" class="form-horizontal">
	<div class="form-group">
	  <label class="col-md-4 control-label" for="houseNumber">House Number</label>  
	  <div class="col-md-4">
	  	<input id="houseNumber" name="houseNumber" type="text" placeholder="<?php echo $address[3]?>" class="form-control input-md">	
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="streetName">Street Name</label>  
	  	<div class="col-md-4">
	  		<input id="streetName" name="streetName" type="text" placeholder="<?php echo $address[2]?>" class="form-control input-md">	
		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="city">City</label>  
	  <div class="col-md-4">
	  <input id="city" name="city" type="text" placeholder="<?php echo $address[4];?>" class="form-control input-md">
		
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="country">Country</label>  
	  <div class="col-md-4">
	  <input id="country" name="country" type="text" placeholder="<?php echo $address[5];?>" class="form-control input-md">
		
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="postcode">Postcode</label>  
	  <div class="col-md-4">
	  <input id="postcode" name="postcode" type="text" placeholder="<?php echo $address[1];?>" class="form-control input-md">
		
	  </div>
	</div>
	
	<!-- Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="submit"></label>
	  <div class="col-md-4">
		<button id="submit" name="submit" class="btn btn-primary">Submit</button>
	  </div>
	</div>

</form>
</fieldset>
</form>
