<?php

namespace WPPunk\Subscribe\Frontend;

use WPPunk\Subscribe\Subscribers\Repository;

/**
 * Ajax class.
 */
class Ajax {

	/**
	 * Subscribers repository.
	 *
	 * @var Repository
	 */
	private $repository;

	/**
	 * Ajax constructor.
	 *
	 * @param Repository $repository Subscribers repository.
	 */
	public function __construct( Repository $repository ) {

		$this->repository = $repository;
	}

	/**
	 * Add hooks.
	 */
	public function add_hooks(): void {

		add_action( 'wp_ajax_subscribe', [ $this, 'subscribe' ] );
		add_action( 'wp_ajax_nopriv_subscribe', [ $this, 'subscribe' ] );
	}

	/**
	 * Ajax callback for a subscription.
	 */
	public function subscribe(): void {

		check_ajax_referer( Assets::SUBSCRIBE_NONCE_ACTION );

		$email = filter_input( INPUT_POST, 'email', FILTER_SANITIZE_EMAIL );

		if ( ! is_email( $email ) ) {
			wp_send_json_error(
				sprintf( /* translators: %s - email address. */
					esc_html__( 'The %s is invalid email', 'subscribe' ),
					esc_html( $email )
				)
			);
		}

		if ( 2 === $this->repository->save_subscriber( $email ) ) {
			wp_send_json_error(
				sprintf( /* translators: %s - email address. */
					esc_html__( 'The %s email is already exists', 'subscribe' ),
					esc_html( $email )
				)
			);
		}

		wp_send_json_success( esc_html__( 'You were successfully subscribed', 'subscribe' ) );
	}

}
