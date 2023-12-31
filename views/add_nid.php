<form id="nid_submit"  >
	<?php wp_nonce_field(); ?>
	<input type="hidden" name="action" value="store_nid">
	<div class="form-group">
		<label for="wptp_name">Name</label>
		<input type="text" required class="form-control" id="wptp_name" name="wptp_name" placeholder="Enter name">
	</div>

	<div class="form-group">
		<label for="wptp_f_name">Father Name</label>
		<input type="text" required class="form-control" id="wptp_f_name" name="wptp_f_name" placeholder="Enter Father Name">
	</div>

	<div class="form-group">
		<label for="wpdid_img_upload">Upload Image</label>
		<input type="file" id="wpdid_img_upload">
		<img 	id="wpdid_nid_image"  src="" style="max-width: 25%; height: 25%;">
		<input type="hidden" id="wp_nid_img_url" name="wp_nid_img_url">
	</div>
	<div class="form-group">
		<label for="wptp_nid">Nid</label>
		<input min="10" type="number" class="form-control" id="wptp_nid" name="wptp_nid" placeholder="Nid">
		<small id="wptp_nid_warning" class="form-text text-muted text-danger">NID Must be minimum 10 Digit & Max 15 Digit</small>
	</div>
	<button id="wptp_submit"  type="submit" value="Submit" class="btn btn-primary">Submit</button>
</form>