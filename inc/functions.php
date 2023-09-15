<?php
if( ! function_exists( 'get_plugin_data' ) ) {
	require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
}

/**
 * Gets the site's base URL
 * 
 * @uses get_bloginfo()
 * 
 * @return string $url the site URL
 */
if( ! function_exists( 'wpd_site_url' ) ) :
function wpd_site_url() {
	$url = get_bloginfo( 'url' );

	return $url;
}
endif;

if ( ! function_exists( 'prevent_duplicate_entry' ) ) {

	function prevent_duplicate_entry( $nid ) {
	    global $wpdb;

	    // Name of your custom table
	    $table_name = $wpdb->prefix . 'nid_table';

	    // Check if the entry with the provided email already exists
	    $existing_entry = $wpdb->get_row(
	        $wpdb->prepare("SELECT * FROM $table_name WHERE nid = %s", $nid )
	    );

	    if ( ! $existing_entry ) {
	        // Entry with the same Nid already exists, prevent the insertion
	        return false;
	    }

	    // Entry doesn't exist, you can proceed with the insertion
	    return true;
	}
}

