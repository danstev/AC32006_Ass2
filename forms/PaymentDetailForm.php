<form class="form-horizontal" action="Account.php" method = "post">
<fieldset>
<legend>Change Account Details</legend>
	
	<div class="form-group">
	  <label class="col-md-4 control-label" for="nameOnCard">Name On Card</label>  
	  <div class="col-md-4">
	  <input id="nameOnCard" name="nameOnCard" type="text" placeholder="<?php echo $payment["accName"];?>" class="form-control input-md">
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-4 control-label" for="cardNumber">Card Number</label>  
	  <div class="col-md-4">
	  <input id="cardNumber" name="cardNumber" type="text" placeholder="**** **** **** <?php echo $last4card;?>" class="form-control input-md">
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-4 control-label" for="expirationdate">Expires</label>  
	  <div class="col-md-4">
	  <input id="expirationdate" name="expirationdate" type="text" placeholder="<?php echo $payment["expDate"];?>" class="form-control input-md">
	  </div>
	</div>

	
	
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

	<div class="form-group">
	  <label class="col-md-4 control-label" for="submit"></label>
	  <div class="col-md-4">
		<button id="submit" name="PaymentSubmit" class="btn btn-primary">Submit</button>
	  </div>
	</div>
</fieldset>
</form>
