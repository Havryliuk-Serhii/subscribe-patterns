<?php

namespace WPPunk\Subscribe\Frontend;

/**
 * Shortcode class.
 */
class Shortcode {

	/**
	 * Add hooks.
	 */
	public function add_hooks(): void {

		add_shortcode( 'subscribe_form', [ $this, 'form' ] );
	}

	/**
	 * A subscribe form view.
	 *
	 * @return string
	 */
	public function form(): string {

		wp_enqueue_style( 'subscribe' );
		wp_enqueue_script( 'subscribe' );

		ob_start();
		require SUBSCRIBE_PATH . 'templates/subscribe-form.php';

		return (string) ob_get_clean();
	}
}
