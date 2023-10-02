
<div class="container">
	<div class="row">

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
		<form id="did_submit"  >
			<?php wp_nonce_field(); ?>
			<input type="hidden" name="action" value="store_did">
			<div class="col-md-3"></div>    
			<div class="col-md-6">
				<div class="form-group">
					<label for="wpdid_date">Date</label>
					<input type="date" value="20/10/3023" name="wpdid_date" id="wpdid_date">
				</div>
				<div class="form-group">
					<label for="wpdid_did_owner">Owner</label>
					<select class="form-control" name="wp_did_owner[]" id="wp_did_owner" multiple="multiple">

					  <?php 
					  foreach ( $results as $key => $result ) {

					  printf( '<option value="%1$s">%1$s( %2$s )</option>', $result->nid, $result->name );
						}

					   ?>
					</select>
				</div>
				<div class="form-group">
					<label for="wpdid_did_buyer">Bayer</label>
					<select class="form-control" name="wp_did_buyer[]" id="wpdid_did_buyer" multiple="multiple">

					  <?php 
					  foreach ( $results as $key => $result ) {

					  printf( '<option value="%1$s">%1$s( %2$s )</option>', $result->nid, $result->name );
						}

					   ?>
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
		<div class="col-md-3"></div>
	</div>
</div>