<?php

namespace WPPunk\Subscribe\Subscribers;

/**
 * Database class.
 */
class Database {

	/**
	 * Add hooks.
	 */
	public function add_hooks(): void {

		register_activation_hook( SUBSCRIBE_PATH, [ $this, 'create_table' ] );
	}

	/**
	 * Get table name for subscribers.
	 *
	 * @return string
	 */
	public static function get_table_name(): string {

		global $wpdb;

		return $wpdb->prefix . 'subscribers';
	}

	/**
	 * Create table for subscribers.
	 */
	public function create_table(): void {

		require_once ABSPATH . 'wp-admin/includes/upgrade.php';

		global $wpdb;

		$table_name = self::get_table_name();

		$sql = "CREATE TABLE {$table_name} (
			email VARCHAR(255) UNIQUE NOT NULL,
			PRIMARY KEY (email)
			) {$wpdb->get_charset_collate()};";

		dbDelta( $sql );
	}
}
