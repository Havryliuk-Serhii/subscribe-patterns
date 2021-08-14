<?php 
namespace Subscribe;

class Subscribe {

	const SUBSCRIBE_NONCE_ACTION = 'subscribe-action';

	public function add_hooks(){

		$add_hooks = new Hooks();
		$add_hooks->plugin_hooks();

        $add_ajax = new Ajax();
		$add_ajax->plugin_ajax();
	
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
}