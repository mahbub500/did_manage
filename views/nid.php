<?php 
use Codexpert\WpDid\Helper;
?>
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
					<label for="wpdid_img_upload">Upload Image</label>
					<input type="file" id="wpdid_img_upload">
					<img id="wpdid_nid_image"  src="" style="max-width: 25%; height: 25%;">
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
		<div class="col-md-3"></div>
	</div>
</div>

<?php 
global $wpdb;

		$table_name = $wpdb->prefix . 'nid_table';
		$user_id 	= get_current_user_id();
		$results 	= $wpdb->get_results( "SELECT * FROM $table_name WHERE user_id = $user_id ", ARRAY_A );
        
?>

<div class="container ">
	<div class="row mt-1">
		<div class="col-md-12">
		<table id="wp_did_table" class="table table-striped table-bordered" style="width:100%">
	        <thead>
				<tr>
					<th>ID No:</th>
					<th>Name</th>
					<th>Father's Name</th>
					<th>Nid</th>
					<th>Thumbnail</th>
				</tr>
			</thead>
			<tbody>
				<?php 
				if ( $results ) {
					foreach ( $results as $row ) {   
				?>
					<tr>
						<td><?php echo $row['id'] ?></td>
						<td><?php echo $row['name'] ?></td>
						<td><?php echo $row['father_name'] ?></td>
						<td><?php echo $row['user_id'] ?></td> 
						<td> <img src="<?php echo $row['thumbnail'] ?> " style="width: 40px; height: 45px; border-radius: 50%;"></td>
					</tr>
				<?php            
					}
				}

				?>
			</tbody>
			<tfoot>
				<tr>
					<th>Name</th>
					<th>Position</th>
					<th>Office</th>
					<th>Age</th>
					<th>Start date</th>
				</tr>
			</tfoot>
		</table>
		</div>
	</div>
</div>
