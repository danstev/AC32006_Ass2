<form action="HelpDesk.php" method="post" class="form-horizontal">

	<fieldset>

	<!-- Form Name -->
	<legend>Complaint Form</legend>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="orderID">Order ID</label>  
		<div class="col-md-4">
			<input id="orderID" name="orderID" type="text" placeholder="placeholder" class="form-control input-md">
  
		</div>
	</div>

	<div class="form-group">
		<label class="col-md-4 control-label" for="complaint">Complaint</label>
		<div class="col-md-4">                     
			<textarea class="form-control" id="complaint" name="complaint">Enter complaint here!</textarea>
		</div>
	</div>
	
	<div class="form-group">
		<label class="col-md-4 control-label" for="singlebutton">Single Button</label>
		<div class="col-md-4">
			<button type="submit" value="Submit" class="btn btn-primary">Submit</button>
		</div>
	</div>

	</fieldset>
</form>
