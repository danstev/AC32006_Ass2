<form class="form-horizontal" action="Branch.php" method="post">
<fieldset>
<legend>Add Branch</legend>
	<div class="form-group">
	  <label class="col-md-4 control-label" for="BranchName">Branch Name</label>  
	  <div class="col-md-4">
	  <input id="branchName" name="branchName" type="text" class="form-control input-md">
	  </div>
	</div>
	<div class="form-group">
	  <label class="col-md-4 control-label" for="houseNumber">House Number</label>  
	  <div class="col-md-4">
	  	<input id="houseNumber" name="houseNumber" type="text"class="form-control input-md">	
	  </div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="streetName">Street Name</label>  
	  	<div class="col-md-4">
	  		<input id="streetName" name="streetName" type="text"="form-control input-md">	
		</div>
	</div>

	<!-- Text input-->
	<div class="form-group">
	  <label class="col-md-4 control-label" for="city">City</label>  
	  <div class="col-md-4">
	  <input id="city" name="city" type="text" class="form-control input-md">
		
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="country">Country</label>  
	  <div class="col-md-4">
	  <input id="country" name="country" type="text"class="form-control input-md">
		
	  </div>
	</div>

	<div class="form-group">
	  <label class="col-md-4 control-label" for="postcode">Postcode</label>  
	  <div class="col-md-4">
	  <input id="postcode" name="postcode" type="text"class="form-control input-md">
	  </div>
	</div>
	
	<div class="form-group">
	  <label class="col-md-4 control-label" for="submit"></label>
	  <div class="col-md-4">
		<button id="submit" name="submit" class="btn btn-primary" name="type" value="add">Submit</button>
	  </div>
	</div>
</fieldset>
</form>