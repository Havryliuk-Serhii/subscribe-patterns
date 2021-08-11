<?php
namespace Subscribe;

class Subscribe_Shortcode
{
	
	function __construct()
	{
		add_shortcode( 'subscribe_form', [ $this, 'form' ] );
	}

	public function form() {

		wp_enqueue_style( 'subscribe' );
		wp_enqueue_script( 'subscribe' );
		ob_start();

		require ( SUBSCRIBE_PATH .  'subscribe-form.php') ;		

		return ob_get_clean();
	}

}
