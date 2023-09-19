

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
	?>
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
					<label for="wptp_nid">Nid</label>
					<input min="10" type="number" class="form-control" id="wptp_nid" name="wptp_nid" placeholder="Nid">
					<small id="wptp_nid_warning" class="form-text text-muted text-danger">NID Must be minimum 10 Digit & Max 15 Digit</small>
				</div>
				<button id="wptp_submit"  type="submit" value="Submit" class="btn btn-primary">Submit</button>
			</form>
		</div>  
		<div class="col-md-3"></div>
	</div>

</div>

<div class="container">
	<div class="col-md-2">
		<ul class="nav nav-pills nav-stacked">
		<li role="presentation" class="active"><a href="#">Home</a></li>
		<li role="presentation"><a href="#">Profile</a></li>
		<li role="presentation"><a href="#">Messages</a></li>
	</div>
</ul>
</div>