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

require plugin_dir_path( __FILE__ ) . 'class-subscribe-shortcode.php';
require plugin_dir_path( __FILE__ ) . 'class-subscribe-style.php';
require plugin_dir_path( __FILE__ ) . 'class-subscribe-scripts.php';

require plugin_dir_path( __FILE__ ) . 'class-subscribe-db.php';
	
class Subscribe {

	const SUBSCRIBE_NONCE_ACTION = 'subscribe-action';

	public function hooks() {
		$shortcode = new Subscribe_Shortcode;
		$shortcode->form();

		$styles = new Subscribe_Styles;
		$styles->register_styles();

		$scripts= new Subscribe_Scripts;
		$scripts->register_scripts();
		
		add_action( 'wp_ajax_subscribe', [ $this, 'subscribe' ] );
		add_action( 'wp_ajax_nopriv_subscribe', [ $this, 'subscribe' ] );
	}

	
	public function subscribe() {

		check_ajax_referer( self::SUBSCRIBE_NONCE_ACTION );

		$email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );

		if ( ! is_email( $email ) ) {
			wp_send_json_error(
				sprintf(
					esc_html__( 'The %s is invalid email', 'subscribe' ),
					esc_html( $email )
				)
			);
		}

		if ( 2 === $this->save_subscriber( $email ) ) {
			wp_send_json_error(
				sprintf(
					esc_html__( 'The %s email is already exists', 'subscribe' ),
					esc_html( $email )
				)
			);
		}

		wp_send_json_success( esc_html__( 'You were successfully subscribed', 'subscribe' ) );
	}

	private function save_subscriber( $email ) {

		global $wpdb;

		return $wpdb->replace(
			$this->get_table_name(),
			[
				'email' => sanitize_email( $email ),
			],
			[
				'email' => '%s',
			]
		);
	}

	public function subscribe_db(){
		$db =new Subscribe_Db;
		$db->create_table();
	}
	
}

$subscribe = new Subscribe();
$subscribe->hooks();


register_activation_hook( __FILE__, [ $subscribe, 'create_table' ] );
