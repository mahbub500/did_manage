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
		
		$name 		= $_POST['wptp_nid'] ;
		$father_name= $_POST['wptp_f_name'] ;
		$nid 		= $_POST['wptp_nid'] ;
		$duplicate 	= prevent_duplicate_entry( $nid );

		if ( $duplicate ) {
			wp_send_json_success( [
				'status'	=> 0,
				'message'	=> __( 'Nid Already Exit', 'wp-did' ),
			], 200 );
		}

		// $data = array(
		//     'column1' => 'value1',
		//     'column2' => 'value2',
		//     'column3' => 'value3',
		// );

		// $wpdb->insert( $table_name, $data );

		wp_send_json_success( [
			'status'	=> 1,
			'message'	=> __( 'Data save', 'wp-did' ),
		], 200 );
	
	}

}