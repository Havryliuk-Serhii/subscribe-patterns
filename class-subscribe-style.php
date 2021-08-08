<?php
namespace Subscribe;
/**
 * 
 */
class Subscribe_Styles
{
	
	function __construct()
	{
		add_action( 'wp_enqueue_scripts', [ $this, 'register_styles' ] );
	}

	public function register_styles() {

		wp_register_style(
			'subscribe',
			SUBSCRIBE_URL . '/assets/css/main.css',
			[],
			SUBSCRIBE_VERSION
		);
	}
}