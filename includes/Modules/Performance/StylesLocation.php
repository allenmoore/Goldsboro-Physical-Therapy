<?php

namespace GPT\Modules\Performance;

class StylesLocation {

	/**
	 * The StylesLocation Constructor.
	 */
	public function __construct() {
		add_action( 'wp_print_styles', [$this, 'filterStyles'], 1000000 );
	}

	/**
	 * Method to return an array of style handles.
	 *
	 * @return Array the array of style handles.
	 */

	public function filterStyles() {

		$handles = [
			'wp-block-library',
			'db121_socicons',
			'wtfdivi-user-css',
			'et-builder-googlefonts-cached',
			'jetpack-widget-social-icons-styles',
			'et-shortcodes-responsive-css',
			'magnific-popup',
			'dashicons',
		];

		return $handles;
	}

	public function handleStyles() {

		$handles = [
			'wp-block-library',
			'db121_socicons',
			'wtfdivi-user-css',
			'et-builder-googlefonts-cached',
			'jetpack-widget-social-icons-styles',
			'et-shortcodes-responsive-css',
			'magnific-popup',
			'dashicons',
		];

		wp_deregister_style( 'wp-block-library' );
		wp_dequeue_style( 'wp-block-library' );
	}
}
