<?php 
namespace Subscribe;

class Subscribe_Ajax
{
	
	public function __construct()
	{
		$this->init_ajax();
	}

	public function init_ajax(){
		add_action( 'wp_ajax_subscribe', [ $this, 'subscribe' ] );
		add_action( 'wp_ajax_nopriv_subscribe', [ $this, 'subscribe' ] );
	}
}