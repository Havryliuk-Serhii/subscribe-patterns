<?php
namespace Subscribe;

	/**
	 * Class Shortcode
	 */
class Shortcode {

	/**
	 * Add hooks.
	 */
	public function add_hooks() {
		add_shortcode( 'subscribe_form', [ $this, 'form' ] );
	}

	/**
	 * Connecting form.
	 *
	 * @return false|string
	 */
	public function form() {

		wp_enqueue_style( 'subscribe' );
		wp_enqueue_script( 'subscribe' );

		ob_start();

		require SUBSCRIBE_FILE . '/dist/templates/subscribe-form.php';

		return ob_get_clean();
	}

}
