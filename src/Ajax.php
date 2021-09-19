<?php

namespace Subscribe;

/**
 * Class Ajax
 */
class Ajax {

	/**
	 * Repository
	 *
	 * @var Repository
	 */
	private $repository;

	/**
	 * Ajax construct
	 *
	 * @param Repository $repository Repository.
	 */
	public function __construct( Repository $repository ) {
		$this->repository = $repository;
	}

	/**
	 * Add ajax hook
	 */
	public function add_hooks() {

		add_action( 'wp_ajax_subscribe', [ $this, 'subscribe' ] );
		add_action( 'wp_ajax_nopriv_subscribe', [ $this, 'subscribe' ] );
	}

	/**
	 * Subscription process.
	 */
	public function subscribe() {

		check_ajax_referer( Main::SUBSCRIBE_NONCE_ACTION );

		$email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );

		if ( ! is_email( $email ) ) {
			wp_send_json_error(
				sprintf(/* translators: %s - email address */
					esc_html__( 'The %s is invalid email', 'subscribe' ),
					esc_html( $email )
				)
			);
		}

		if ( 2 === $this->repository->save( $email ) ) {
			wp_send_json_error(
				sprintf(/* translators: %s - email address */
					esc_html__( 'The %s email is already exists', 'subscribe' ),
					esc_html( $email )
				)
			);
		}

		wp_send_json_success( esc_html__( 'You were successfully subscribed', 'subscribe' ) );
	}
}




