<?php
/**
 * Subscribe form and list of subscribers.
 *
 * Plugin Name:         Subscribe
 * Description:         The plugin creates a subscribed form and store subscribers into database.
 * Version:             1.0.0
 * Requires at least:   4.9
 * Requires PHP:        5.5
 * Author:              Serhii H.
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
define( 'SUBSCRIBE_FILE', __FILE__ );
define( 'SUBSCRIBE_PATH', plugin_dir_path( SUBSCRIBE_FILE ) );
define( 'SUBSCRIBE_URL', plugin_dir_url( SUBSCRIBE_FILE ) );

require_once SUBSCRIBE_PATH . '/vendor/autoload.php';

( new Main() )->run();


