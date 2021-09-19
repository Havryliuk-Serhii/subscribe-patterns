<?php

namespace Subscribe\Subscriber;

/**
 *  Class Repository
 */
class Repository {
	/**
	 * Save new subscriber to database table.
	 *
	 * @param string $email Email address.
	 *
	 * @return int 1-subscriber was added and 2- subscriber was modified.
	 */
	public function save( $email ) {

		global $wpdb;

		return (int) $wpdb->replace( //phpcs:ignore WordPress.DB.DirectDatabaseQuery.DirectQuery, WordPress.DB.DirectDatabaseQuery.NoCaching
			Table::get_table_name(),
			[
				'email' => sanitize_email( $email ),
			],
			[
				'email' => '%s',
			]
		);
	}
}
