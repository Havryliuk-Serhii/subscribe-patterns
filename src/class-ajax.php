<?php
namespace Subscribe;

/**
 * Class Ajax
 */
class Ajax {

	/**
	 * Initialize database
	 *
	 * @param Db $db
	 */
	public function __construct( Db $db ) {
		$this->db = $db;
	}

	/**
	 * Add ajax hook
	 */
	public function add_hooks() {

		add_action( 'wp_ajax_subscribe', [ $this, 'subscribe' ] );
		add_action( 'wp_ajax_nopriv_subscribe', [ $this, 'subscribe' ] );
	}

	/**
	 * Add function subscribe
	 */
	public function subscribe() {

		check_ajax_referer( Subscribe::SUBSCRIBE_NONCE_ACTION );

		$email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );

		if ( ! is_email( $email ) ) {
			wp_send_json_error(
				sprintf(
					esc_html__( 'The %s is invalid email', 'subscribe' ),
					esc_html( $email )
				)
			);
		}

		if ( 2 === $this->db->save_subscriber( $email ) ) {
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




