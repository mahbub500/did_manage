


		<?php 
	$is_loged_in = is_user_logged_in();
	if ( false == $is_loged_in ) {
		?>
		<a href="<?php echo wp_login_url( get_permalink() ); ?>" title="Login">Please Login</a>
		<?php 
			return $login_url;
		}

		global $wpdb;
		$table_name = $wpdb->prefix . 'nid_table';
		$query = "SELECT * FROM $table_name";
		$results = $wpdb->get_results($query);
		$today = date("j, n, Y"); 

	?>
		
		 
	

<div class="container">
	<div class="row">
		<div class="col-md-3">
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			  <a class="nav-link active" id="did" data-toggle="pill" href="#add_did" role="tab" aria-controls="add_did" aria-selected="true">Add DID</a>
			  <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Add NID</a>
			  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a>
			  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Settings</a>
			</div>
		</div>	
		<div class="col-md-7">
			<div class="tab-content" id="v-pills-tabContent">
			  <div class="tab-pane fade show active" id="add_did" role="tabpanel" aria-labelledby="did">
			  	<form id="did_submit"  >
					<input type="hidden" name="action" value="store_did">
						<div class="form-group">
							<label for="wpdid_date">Date</label>
							<input type="date" value="20/10/3023" name="wpdid_date" id="wpdid_date">
						</div>
						<div class="form-group">
							<label for="wpdid_did_owner">Owner</label>
							<select class="form-control" name="wp_did_owner[]" id="wp_did_owner" multiple="multiple">

							  <option>One</option>
							  <option>Two</option>
							  <option>Three</option>
							</select>
						</div>
						<div class="form-group">
							<label for="wpdid_did_buyer">Bayer</label>
							<select class="form-control" name="wp_did_buyer[]" id="wpdid_did_buyer" multiple="multiple">

							   <option>One</option>
							  <option>Two</option>
							  <option>Three</option>
							</select>
						</div>
						<div class="form-group">
							<label for="wpdid_did_no ml-3">Did No</label>
							<input type="number" min="0" name="wpdid_did_no" id="wpdid_did_no">

							<label for="wpdid_did_location">Location</label>
							<select name="wpdid_did_location" id="wpdid_did_location">
								<option>Rampur</option>
								<option>Bamni</option>
							</select>
						</div>
						<div class="form-group">
							<label for="wpdid_did_price">Did Price</label>
							<input type="number" min="0" name="wpdid_did_price" id="wpdid_did_price">

							<label for="wpdid_total">Total Land</label>
							<input type="number" min="0" name="wpdid_total" id="wpdid_total">
						</div>
					<button id="wpdid_submit"  type="submit" value="Submit" class="btn btn-primary">Submit</button>
				</form>
			  </div>
			  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
			  	<h1>NID</h1>
			  	<form id="nid_submit"  >
			<?php wp_nonce_field(); ?>
			<input type="hidden" name="action" value="store_nid">
			<div class="col-md-3"></div>    
			<div class="col-md-6">
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
			  	
			  </div>
			  <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
			  	<h1>Two</h1>
			  	
			  </div>
			  <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
			  	<h1>Three</h1>
			  	
			  </div>
			</div>
		</div>	
	</div>
</div>

