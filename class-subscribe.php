<?php 
namespace Subscribe;

class Subscribe {

	const SUBSCRIBE_NONCE_ACTION = 'subscribe-action';

	public function add_hooks(){
		
		(new Shortcode())->add_hooks();

		$add_hooks = new Hooks();
		$add_hooks->add_hooks();

        $add_ajax = new Ajax(new Db());
		$add_ajax->add_hooks();
	
	}

	
}