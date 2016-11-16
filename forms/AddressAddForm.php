<form class="form-horizontal" action="Account.php" method = "post">
<fieldset>
<legend>Change Account Details</legend>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="houseNumber">House Number</label>  
	  <div class="col-md-4">
	  	<input id="houseNumber" name="houseNumber" type="text" placeholder="<?php echo $address["housenumber"]?>" class="form-control input-md">	
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="streetName">Street Name</label>  
	  	<div class="col-md-4">
	  		<input id="streetName" name="streetName" type="text" placeholder="<?php echo $address["street"]?>" class="form-control input-md">	
		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="city">City</label>  
	  <div class="col-md-4">
	  <input id="city" name="city" type="text" placeholder="<?php echo $address["city"];?>" class="form-control input-md">
		
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="country">Country</label>  
	  <div class="col-md-4">
	  <input id="country" name="country" type="text" placeholder="<?php echo $address["country"];?>" class="form-control input-md">
		
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="postcode">Postcode</label>  
	  <div class="col-md-4">
	  <input id="postcode" name="postcode" type="text" placeholder="<?php echo $address["postcode"];?>" class="form-control input-md">
		
	  </div>
	</div>
	
	<!-- Button -->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="submit"></label>
	  <div class="col-md-4">
		<button id="submit" name="AddressSubmit<?php echo $customer;?>" class="btn btn-primary">Submit</button>
	  </div>
	</div>
</fieldset>
</form>
