<?php
namespace Subscribe;

class Subscribe_Shortcode
{
	
	public function __construct(){
		$this->plugin_shortcode();
	}

	public function plugin_shortcode(){
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
