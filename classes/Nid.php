<?php
/**
 * All helpers functions
 */
namespace Codexpert\WpDid;
use Codexpert\Plugin\Base;

/**
 * if accessed directly, exit.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @package Plugin
 * @subpackage Nid
 * @author Codexpert <hi@codexpert.io>
 */
class Nid {

	public function get_nids( $value='' )
	{
		global $wpdb;
		$table_name = $wpdb->prefix . 'nid_table';

		$nids 	= $wpdb->get_results("SELECT * FROM $table_name", ARRAY_A);

		return $nids;
	}

}