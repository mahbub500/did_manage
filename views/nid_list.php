<?php 
global $wpdb;

$table_name = $wpdb->prefix . 'nid_table';
$user_id 	= get_current_user_id();
$results 	= $wpdb->get_results( "SELECT * FROM $table_name WHERE user_id = $user_id ", ARRAY_A );
 ?>

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
			printf( '
			<tr>
				<td>%1$s</td>						 
				<td>%1$s</td>						 
				<td>%1$s</td>						 
				<td>%1$s</td>						 
				<td> <img src="%1$s" style="width: 40px; height: 45px; border-radius: 50%;"></td>
			</tr>', $row['id'], $row['name'], $row['father_name'], $row['user_id'], $row['thumbnail'],  
			); 
		          
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