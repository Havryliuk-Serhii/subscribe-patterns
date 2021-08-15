<?php

namespace WPPunk\Subscribe\Subscribers;

/**
 * Repository class.
 */
class Repository {

	/**
	 * Save subscribe to a repository.
	 *
	 * @param string $email Email address.
	 *
	 * @return int
	 */
	public function save_subscriber( string $email ): int {

		global $wpdb;

		return (int) $wpdb->replace( // phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
			Database::get_table_name(),
			[
				'email' => sanitize_email( $email ),
			],
			[
				'email' => '%s',
			]
		);
	}
}
