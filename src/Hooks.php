<?php
namespace Subscribe;

/**
 *  Class Hooks
 */
class Hooks {
	/**
	 * Enqueue scripts and styles
	 */
	public function add_hooks() {

		add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
	}

	/**
	 *  Register styles
	 */
	public function register_styles() {

		wp_register_style(
			'subscribe',
			SUBSCRIBE_URL . '/assets/dist/css/main.css',
			[],
			SUBSCRIBE_VERSION
		);
	}

	/**
	 *  Register scripts
	 */
	public function register_scripts() {

		wp_register_script(
			'subscribe',
			SUBSCRIBE_URL . '/assets/dist/js/main.js',
			[],
			SUBSCRIBE_VERSION,
			true
		);
		wp_localize_script(
			'subscribe',
			'subscribe',
			[
				'adminUrl' => admin_url( 'admin-ajax.php' ),
				'nonce'    => wp_create_nonce( Main::SUBSCRIBE_NONCE_ACTION ),
			]
		);
	}

}
