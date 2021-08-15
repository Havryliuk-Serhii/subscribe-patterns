<?php

namespace WPPunk\Subscribe;

use Auryn\Injector;
use WPPunk\Subscribe\Frontend\Ajax;
use WPPunk\Subscribe\Frontend\Assets;
use WPPunk\Subscribe\Frontend\Shortcode;
use WPPunk\Subscribe\Subscribers\Database;

/**
 * Main class.
 */
class Main {

	/**
	 * Run plugin.
	 */
	public function run(): void {

		$injector = new Injector();

		foreach (
			[
				Database::class,
				Ajax::class,
				Assets::class,
				Shortcode::class,
			] as $class_name
		) {
			$object = $injector->make( $class_name );
			$object->add_hooks();
		}
	}
}
