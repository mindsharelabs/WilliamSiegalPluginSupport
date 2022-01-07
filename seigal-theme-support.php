<?php
/*
Plugin Name: William Seigal Gallery Theme Suppory
Plugin URI: https://mind.sh/are
Description: Provides a library of additional template tags, 3rd-party libraries, Gutenberg Blocks, and functions for WordPress themes and additional features for WordPress CMS websites.
Author: Mindshare Labs, Inc
Version: 0.0.1
Author: Mindshare Labs, Inc
Author URI: https://mind.sh/are
Network: false
*/

class seigalPlugin {
  protected static $instance = NULL;

  public function __construct() {
    if ( !defined( 'SEIGAL_PLUGIN_FILE' ) ) {
    	define( 'SEIGAL_PLUGIN_FILE', __FILE__ );
    }
    //Define all the constants
    $this->define( 'SEIGAL_ABSPATH', dirname( SEIGAL_PLUGIN_FILE ) . '/' );
    $this->define( 'SEIGAL_URL', plugin_dir_url( __FILE__ ));
    $this->define( 'SEIGAL_PLUGIN_VERSION', '0.0.1');
    $this->define( 'SEIGAL_PREPEND', 'seigal_');


    $this->includes();

	}
  public static function get_instance() {
    if ( null === self::$instance ) {
  		self::$instance = new self;
  	}
  	return self::$instance;
  }
  private function define( $name, $value ) {
    if ( ! defined( $name ) ) {
      define( $name, $value );
    }
  }
  private function includes() {

    //General
    include_once SEIGAL_ABSPATH . 'inc/cpt.php';
    include_once SEIGAL_ABSPATH . 'inc/utilities.php';
    include_once SEIGAL_ABSPATH . 'inc/field-groups.php';
    include_once SEIGAL_ABSPATH . 'inc/blocks.php';

  }


}//end of class


new seigalPlugin();





/**
 * Deactivation hook.
 */
function seigal_deactivate() {

}
register_deactivation_hook( __FILE__, 'seigal_deactivate' );
