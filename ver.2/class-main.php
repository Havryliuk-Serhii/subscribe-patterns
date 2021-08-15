<?php 

namespace Subscribe;

class Main
{
	
	public function add_hooks(){
		
		(new Shortcode())->plugin_shortcode();

		(new Hooks())->plugin_hooks();
		
		(new Subscribe())->plugin_ajax();       
	
	}
}