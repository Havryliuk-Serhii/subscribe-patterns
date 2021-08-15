<?php

namespace WPPunk\Subscribe\Frontend;

/**
 * Assets class.
 */
class Assets {

	/**
	 * An action name for the subscription nonce.
	 */
	public const SUBSCRIBE_NONCE_ACTION = 'subscribe-action';

	/**
	 * Add hooks.
	 */
	public function add_hooks(): void {

		add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
	}

	/**
	 * Register styles.
	 */
	public function register_styles(): void {

		wp_register_style(
			'subscribe',
			SUBSCRIBE_URL . '/assets/css/main.css',
			[],
			SUBSCRIBE_VERSION
		);
	}

	/**
	 * Register scripts.
	 */
	public function register_scripts(): void {

		wp_register_script(
			'subscribe',
			SUBSCRIBE_URL . '/assets/js/main.js',
			[],
			SUBSCRIBE_VERSION,
			true
		);

		wp_localize_script(
			'subscribe',
			'subscribe',
			[
				'adminUrl' => admin_url( 'admin-ajax.php' ),
				'nonce'    => wp_create_nonce( self::SUBSCRIBE_NONCE_ACTION ),
			]
		);
	}

}
