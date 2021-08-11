<?php 
namespace Subscribe;

class Subscribe_Scripts 
{
 	const SUBSCRIBE_NONCE_ACTION = 'subscribe-action';
 	function __construct()
 	{
 		add_action( 'wp_enqueue_scripts', [ $this, 'register_scripts' ] );
 	}

 	public function register_scripts() {

		wp_register_script(
			'subscribe',
			SUBSCRIBE_URL . '/assets/js/main.js',
			[],
			SUBSCRIBE_VERSION,
			true
		);
		
	}
}