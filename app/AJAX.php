<?php
/**
 * All AJAX related functions
 */
namespace Codexpert\WpDid\App;
use Codexpert\Plugin\Base;

/**
 * if accessed directly, exit.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @package Plugin
 * @subpackage AJAX
 * @author Codexpert <hi@codexpert.io>
 */
class AJAX extends Base {

	public $plugin;

	/**
	 * Constructor function
	 */
	public function __construct( $plugin ) {
		$this->plugin	= $plugin;
		$this->slug		= $this->plugin['TextDomain'];
		$this->name		= $this->plugin['Name'];
		$this->version	= $this->plugin['Version'];
	}

	public function nid() {

		if( ! wp_verify_nonce( $_POST['_wpnonce'] ) ) {
			wp_send_json_error( [
				'status'	=> 0,
				'message'	=> __( 'Unauthorized', 'wp-did' ),
			], 401 );
		}

		$current_user = get_current_user_id();
		
		$name 		= $_POST['wptp_name'] ;
		$f_name 	= $_POST['wptp_f_name'] ;
		$nid 		= $_POST['wptp_nid'] ;
		$thumbnail 	= $_POST['wp_nid_img_url'] ;

		$duplicate 	= prevent_duplicate_entry( $nid );

		if ( $duplicate ) {
			wp_send_json_success( [
				'status'	=> 0,
				'message'	=> __( 'Nid Already Exit', 'wp-did' ),
			], 200 );
		}

		global $wpdb;
		$table_name = $wpdb->prefix . 'nid_table';

		$data_to_insert = array(
			'name'  		=> $this->sanitize( $name ),
			'father_name'  	=> $this->sanitize( $f_name ),
			'nid'  			=> $this->sanitize( $nid ),
			'user_id'  		=> $this->sanitize( $current_user ),
			'thumbnail'  	=> $this->sanitize( $thumbnail ),
			'date'  		=> date("Y-m-d H:i:s"),
		);

		$wpdb->insert( $table_name, $data_to_insert );

		wp_send_json_success( [
			'status'	=> 1,
			'message'	=> __( 'Data save', 'wp-did' ),
		], 200 );
	
	}

	public function did() {

		if( ! wp_verify_nonce( $_POST['_wpnonce'] ) ) {
			wp_send_json_error( [
				'status'	=> 0,
				'message'	=> __( 'Unauthorized', 'wp-did' ),
			], 401 );
		}

		update_option( 'did_test',  $_POST );

		$current_user 	= get_current_user_id();
		$owner 			= implode(",", $_POST["wp_did_owner"]);;

		global $wpdb;
		$table_name = $wpdb->prefix . 'did_table';

		$data_to_insert = array(
			'owner' 	=> $this->sanitize( $owner ),
			'doner' 	=> $this->sanitize( $doner ),
			'user_id'  	=> $this->sanitize( $current_user ),
			'date'  	=> date("Y-m-d H:i:s"),
		);

		$wpdb->insert( $table_name, $data_to_insert );

		wp_send_json_success( [
			'status'	=> 1,
			'message'	=> __( 'Did save', 'wp-did' ),
		], 200 );
	}

}