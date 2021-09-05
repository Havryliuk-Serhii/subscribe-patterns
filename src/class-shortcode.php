<?php
namespace Subscribe
	/**
	 * Class Shortcode
	 */
	class Shortcode {

		public function add_hooks() {
			add_shortcode( 'subscribe_form', [ $this, 'form' ] );
		}

		public function form() {

			wp_enqueue_style( 'subscribe' );
			wp_enqueue_script( 'subscribe' );

			ob_start();

			require( SUBSCRIBE_PATH . 'subscribe-form.php' );

			return ob_get_clean();
		}

	}
