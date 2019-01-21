<?php

namespace GPT\Modules\Performance;

class AsyncScripts {

	/**
	 * The AsyncScripts Constructor.
	 */
	public function __construct() {
		add_filter( 'script_loader_tag', [$this, 'callScripts'], 1000, 3 );
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

		$min = defined( 'SCRIPT_DEBUG' ) && filter_var( SCRIPT_DEBUG, FILTER_VALIDATE_BOOLEAN ) ? '' : '.min';
		$scripts = [
			'jquery.js',
			'jquery-migrate' . $min . '.js',
			'frontend' . $min . '.js',
			'devicepx-jetpack' . $min . '.js',
			'jq-sticky-anything.min.js',
			'stickThis.js',
			'gprofiles' . $min . '.js',
			'jquery.bxslider.js',
			'jquery.easing.1.3.js',
			'photon' . $min . '.js',
			'wpgroho.js',
			'milestone' . $min . '.js',
			'custom' . $min . '.js',
			'common.js',
			'jquery.fitvids' . $min . '.js',
			'waypoints.min.js',
			'jquery.magnific-popup' . $min . '.js',
			'wp_footer.js',
			'wp-embed.js',
		];

		foreach ( $scripts as $script ) {

			if ( true == strpos( $tag, $script ) ) {
				return str_replace( ' src', ' async src', $tag );
			}
		}

		return $tag;
	}
}
