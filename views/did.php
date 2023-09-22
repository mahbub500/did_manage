
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

	?>
		<form id="did_submit"  >
			<?php wp_nonce_field(); ?>
			<input type="hidden" name="action" value="store_did">
			<div class="col-md-3"></div>    
			<div class="col-md-6">
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
					<label for="wpdid_f_name">Father Name</label>
					<input type="text" required class="form-control" id="wpdid_f_name" name="wpdid_f_name" placeholder="Enter Father Name">
				</div>
				<div class="form-group">
					<label for="wpdid_nid">Nid</label>
					<input min="10" type="number" class="form-control" id="wpdid_nid" name="wpdid_nid" placeholder="Nid">
					<small id="wpdid_nid_warning" class="form-text text-muted text-danger">NID Must be minimum 10 Digit & Max 15 Digit</small>
				</div>
				<button id="wpdid_submit"  type="submit" value="Submit" class="btn btn-primary">Submit</button>
			</form>
		</div>  
		<div class="col-md-3"></div>
	</div>
</div>