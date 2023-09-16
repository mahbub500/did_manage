<?php
/**
 * All Shortcode related functions
 */
namespace Codexpert\WpDid\App;
use Codexpert\Plugin\Base;
use Codexpert\WpDid\Helper;

/**
 * if accessed directly, exit.
 */
if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * @package Plugin
 * @subpackage Shortcode
 * @author Codexpert <hi@codexpert.io>
 */
class Shortcode extends Base {

    public $plugin;

    /**
     * Constructor function
     */
    public function __construct( $plugin ) {
        $this->plugin   = $plugin;
        $this->slug     = $this->plugin['TextDomain'];
        $this->name     = $this->plugin['Name'];
        $this->version  = $this->plugin['Version'];
    }

    public function profile() {
        echo Helper::get_template( 'nid', 'views' );

        return $html;

    }
}