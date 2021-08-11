<?php 
namespace Subscribe;

class Subscribe_Localize
{
	
	function __construct()
	{
		add_action( 'init', [ $this, 'localize_scripts' ] );
	}

	public function localize_scripts(){
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