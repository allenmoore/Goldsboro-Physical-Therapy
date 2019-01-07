<?php

namespace GPT\Modules\Performance;

class AsyncScripts {

	/**
	 * The AsyncScripts Constructor.
	 */
	public function __construct() {
		add_filter( 'script_loader_tag', [$this, 'callScripts'], 100, 3 );
	}

	/**
	 * Method to asynchronously load plugin and theme JavaScript.
	 *
	 * @param string tag the tag for the enqueued script
	 * @param string $handle the script's registered handle
	 * @param string $src the script's source url
	 *
	 * @return string the new tag for the enqueued script
	 */
	public function callScripts( $tag, $handle, $src ) {

		$scripts = [
			'jquery.js',
			'jquery-migrate.min.js',
			'frontend.min.js',
			'jq-sticky-anything.min.js',
			'stickThis.js',
			'jquery.bxslider.js',
			'jquery.easing.1.3.js',
			'photon.min.js',
			'wpgroho.js',
			'custom.min.js',
			'common.js',
			'wp_footer.js'
		];

		foreach ( $scripts as $script ) {

			if ( true == strpos( $tag, $script ) ) {
				return str_replace( ' src', ' async src', $tag );
			}
		}

		return $tag;
	}
}
