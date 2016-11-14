<form class="form-horizontal">
<fieldset>
<legend>Change Account Details</legend>
	<div class="form-group">
	  <label class="col-md-4 control-label" for="cardNumber">Card Number</label>  
	  <div class="col-md-4">
	  <input id="cardNumber" name="cardNumber" type="text" placeholder=" <?php if (isset($payment)){echo "Last four digets: ";echo $last4card;}?>" class="form-control input-md">
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-4 control-label" for="nameOnCard">Name On Card</label>  
	  <div class="col-md-4">
	  <input id="nameOnCard" name="nameOnCard" type="text" placeholder="<?php if (isset($payment)){echo $payment[1];}?>" class="form-control input-md">
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-4 control-label" for="submit"></label>
	  <div class="col-md-4">
		<button id="submit" name="submit" class="btn btn-primary">Submit</button>
	  </div>
	</div>
</fieldset>
</form>
