<?php 

?>

<div class="container">
	<div class="row">
		<form id="nid_submit"  >
			<?php wp_nonce_field(); ?>
			<input type="hidden" name="action" value="store_nid">
			<div class="col-md-3"></div>    
			<div class="col-md-6">
				<div class="form-group">
					<label for="wptp_name">Name</label>
					<input type="text" class="form-control" id="wptp_name" name="wptp_name" placeholder="Enter name">
				</div>

				<div class="form-group">
					<label for="wptp_f_name">Father Name</label>
					<input type="text" class="form-control" id="wptp_f_name" name="wptp_f_name" placeholder="Enter Father Name">
				</div>
				<div class="form-group">
					<label for="wptp_nid">Nid</label>
					<input min="0" type="number" class="form-control" id="wptp_nid" name="wptp_nid" placeholder="Nid">
				</div>
				<button  type="submit" value="Submit" class="btn btn-primary">Submit</button>
			</form>
		</div>  
		<div class="col-md-3"></div>
	</div>
</div>