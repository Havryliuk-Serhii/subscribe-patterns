<?php
namespace Subscribe;

use Subscribe\Subscriber\Repository;
use Subscribe\Subscriber\Table;

/**
 *   Class Main
 */
class Main {
	/**
	 * Nonce action name
	 */
	const SUBSCRIBE_NONCE_ACTION = 'subscribe-action';

	/**
	 *  Add all hooks
	 */
	public function run() {

		( new Shortcode() )->add_hooks();

		( new Hooks() )->add_hooks();

		( new Ajax( new Repository() ) )->add_hooks();

		( new Table() )->hooks();
	}
}
