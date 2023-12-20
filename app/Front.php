<?php
/**
 * All public facing functions
 */
namespace Codexpert\WpDid\App;
use Codexpert\Plugin\Base;
use Codexpert\WpDid\Helper;
use Codexpert\WpDid\Nid;
/**
 * if accessed directly, exit.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * @package Plugin
 * @subpackage Front
 * @author Codexpert <hi@codexpert.io>
 */
class Front extends Base {

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

	public function head() {
		global $wpdb;
		$table_name = $wpdb->prefix . 'nid_table';
	$user_id 	= get_current_user_id();
	$results 	= $wpdb->get_results( "SELECT * FROM $table_name WHERE user_id = $user_id ", ARRAY_A );

	if ( $results ) {
		foreach ( $results as $row ) {  
			// Helper::pri( $row );
			printf( '
				<tr>
					<td>%1$s</td>						 
					<td>%2$s</td>						 
					<td>%3$s</td>						 
					<td>%4$s</td>						 
					<td> <img src="%5$s" style="width: 40px; height: 45px; border-radius: 50%;"></td>
				</tr>', $row['id'], $row['name'], $row['father_name'], $row['user_id'], $row['thumbnail'],  
				);
		}
	}
	}
	
	/**
	 * Enqueue JavaScripts and stylesheets
	 */
	public function enqueue_scripts() {
		$min = defined( 'WP_DID_DEBUG' ) && WP_DID_DEBUG ? '' : '.min';

		wp_enqueue_media();

		wp_enqueue_style( $this->slug, plugins_url( "/assets/css/front{$min}.css", WP_DID ), '', $this->version, 'all' );
		wp_enqueue_style( 'toster', 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css', '', $this->version, 'all' );

		wp_enqueue_style( 'datatable', 'https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css', '', $this->version, 'all' );

		wp_enqueue_style( 'boostrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css', '', $this->version, 'all' );

		wp_enqueue_script( $this->slug, plugins_url( "/assets/js/front{$min}.js", WP_DID ), [ 'jquery' ], $this->version, true );
		
		wp_enqueue_script( 'toster', 'https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js', '', $this->version, true );

		wp_enqueue_script( 'boostrap', 'https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js', [ 'jquery' ], $this->version, true );

		wp_enqueue_script( 'datatable', 'https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js', '', $this->version, true );

        wp_enqueue_style( 'select2' );
        wp_enqueue_script( 'select2' );
        
		$localized = [
			'ajaxurl'	=> admin_url( 'admin-ajax.php' ),
			'_wpnonce'	=> wp_create_nonce(),
		];
		wp_localize_script( $this->slug, 'WP_DID', apply_filters( "{$this->slug}-localized", $localized ) );
	}

	public function modal() {
		echo '
		<div id="wp-did-modal" style="display: none">
			<img id="wp-did-modal-loader" src="' . esc_attr( WP_DID_ASSET . '/img/loader.gif' ) . '" />
		</div>';
	}
}