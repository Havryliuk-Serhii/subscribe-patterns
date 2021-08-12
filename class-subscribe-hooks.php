<?php 
namespace Subscribe;

class Subscribe_Hooks
{
	
	public function __construct(){

		$this->hooks();
	}

	public function hooks() {
		$shortcode = new Subscribe_Shortcode;
		$shortcode->form();

		$styles = new Subscribe_Styles;
		$styles->register_styles();


		$scripts= new Subscribe_Scripts;
		$scripts->register_scripts();

		
		$ajax= new Subscribe_Ajax;
		$ajax->init_ajax();
		
	}
}