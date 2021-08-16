<?php
/**
 * Subscribe form and list of subscribers.
 *
 * Plugin Name:         Subscribe
 * Description:         The plugin creates a subscribe form and store subscribers into database.
 * Version:             1.0.0
 * Requires at least:   4.9
 * Requires PHP:        5.5
 * Author:              wppunk
 * License:             MIT
 * Text Domain:         subscribe
 *
 * @package     Subscribe
 */
namespace Subscribe;

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SUBSCRIBE_VERSION', '1.0.0' );
define( 'SUBSCRIBE_PATH', plugin_dir_path( __FILE__ ) );
define( 'SUBSCRIBE_URL', plugin_dir_url( __FILE__ ) );



require plugin_dir_path( __FILE__ ) . 'class-shortcode.php';
require plugin_dir_path( __FILE__ ) . 'class-hooks.php';
require plugin_dir_path( __FILE__ ) . 'class-ajax.php';
require plugin_dir_path( __FILE__ ) . 'class-subscribe.php';
require plugin_dir_path( __FILE__ ) . 'class-db.php';

(new Subscribe())->add_hooks();

register_activation_hook( __FILE__, [ $subscribe, 'create_table' ] );