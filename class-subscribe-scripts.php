<?php 
namespace Subscribe;
 /**
  * 
  */
 class Subscribe_Scripts 
 {
 	
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
		wp_localize_script(
			'subscribe',
			'subscribe',
			[
				'adminUrl' => admin_url( 'admin-ajax.php' ),
				/*'nonce'    => wp_create_nonce( Subscribe::SUBSCRIBE_NONCE_ACTION ),*/
			]
		);
	}
 }