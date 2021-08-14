<?php 

namespace Subscribe;

/**
 * 
 */
class Ajax
{
	public function plugin_ajax(){

		add_action( 'wp_ajax_subscribe', [ $this, 'subscribe' ] );
		add_action( 'wp_ajax_nopriv_subscribe', [ $this, 'subscribe' ] );
	}
	
}




