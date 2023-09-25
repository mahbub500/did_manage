<?php
/**
 * All common functions to load in both admin and front
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
 * @subpackage Common
 * @author Codexpert <hi@codexpert.io>
 */
class Common extends Base {

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

	/**
	 * Create a table for nid
	 */
	function register_nid_table() {
	
		global $wpdb;

		$table_name 		= $wpdb->prefix . 'nid_table';
		$_table_name 		= $wpdb->prefix . 'did_table';
		$create_table 	= $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
			id INT NOT NULL AUTO_INCREMENT,
			`name` varchar(255) NULL,
			`father_name` varchar(255) NULL,
			`thumbnail` VARCHAR(255) NULL,
			`user_id` INT NULL,   
			`nid` BIGINT NULL,
			`date` DATE NULL, 
			PRIMARY KEY (id)
		) $create_table;";

		$sql .= "CREATE TABLE $_table_name (
			id INT NOT NULL AUTO_INCREMENT,
			`owner` varchar(255) NULL,
			`doner` VARCHAR (255) NULL,   
			`user_id` INT NULL,
			`date` DATE NULL, 
			PRIMARY KEY (id)
		) $create_table;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

		dbDelta( $sql );
	}
}