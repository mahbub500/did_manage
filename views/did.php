


<?php 
use Codexpert\WpDid\Helper;
	$is_loged_in 	= is_user_logged_in();
	$login_url  	= wp_login_url( get_permalink() );
	if ( false == $is_loged_in ) {

		printf( '<a href="%s" title="Login">Please Login</a>', $login_url );		 
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
			  <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">NId List</a>
			  <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-settings" role="tab" aria-controls="v-pills-settings" aria-selected="false">Did List</a>
			</div>
		</div>	
		<div class="col-md-7">
			<div class="tab-content" id="v-pills-tabContent">
			  <div class="tab-pane fade show active" id="add_did" role="tabpanel" aria-labelledby="did">
			  	<?php echo Helper::get_template( 'add_did' ) ?>			  	
			  </div>
			  <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
			  	<h1>NID</h1>
			  	<?php echo Helper::get_template( 'add_nid' ) ?>
			  </div>
				<div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">
					<h1>List</h1>
			  		<?php echo Helper::get_template( 'nid_list' ) ?>			  	
				</div>
				<div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">
					<?php echo Helper::get_template( 'did_list' ) ?>
				</div>
			</div>
		</div>	
	</div>
</div>

