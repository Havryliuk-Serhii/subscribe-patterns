<?php 
namespace Subscribe;

class Hooks
{
	public function plugin_hooks() {		

		add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );		
	}

	public function register_styles() {

		wp_register_style(
			'subscribe',
			SUBSCRIBE_URL . '/assets/css/main.css',
			[],
			SUBSCRIBE_VERSION
		);
	}

	public function register_scripts() {

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
				'nonce'    => wp_create_nonce( Subscribe::SUBSCRIBE_NONCE_ACTION ),
			]
		);
	}		

}