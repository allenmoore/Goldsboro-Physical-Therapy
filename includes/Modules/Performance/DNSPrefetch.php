<?php

namespace GPT\Modules\Performance;

class DNSPrefetch {

	/**
	 * The DNSPrefetch Constructor.
	 */
	public function __construct() {
		add_action( 'wp_head', [$this, 'callURLs' ], 1 );
	}

	/**
	 * Method to prefetch urls.
	 */
	public function callURLs() {

		$urls = [
			'edgesuite.net',
			'everyscape.com',
			'facebook.com',
			'ggpht.com',
			'google.com',
			'googleapis.com',
			'google-analytics.com',
			'gstatic.com',
			'twitter.com',
			'wordpress.com',
			'youtube.com',
			'ytimh.com',
		];

		foreach ( $urls as $url ) {
			printf( '<link rel="dns-prefetch" href="%s" />%s', esc_url( $url ), "\n" );
		}
	}
}
