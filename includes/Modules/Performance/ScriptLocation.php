<?php

namespace GPT\Modules\Performance;

class ScriptLocation {

	/**
	 * The ScriptLocation Constructor.
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', [$this, 'StickyMenuLibJs'], 100 );
	}

	/**
	 * Method to dequeue a JS file and re-register/re-enqueue with a true in_footer value.
	 */
	public function StickyMenuLibJS() {

		$options = get_option('sticky_anything_options');
		$pluginUrl = trailingslashit( plugins_url( 'sticky-menu-or-anything-on-scroll' ) );
		$versionNum = $options['sa_version'];

		wp_dequeue_script( 'stickyAnythingLib' );

		if( true === $options['sa_debugmode'] ){
			wp_register_script(
				'stickyAnythingLib',
				$pluginUrl . 'assets/js/jq-sticky-anything.js',
				['jquery'],
				$versionNum,
				true
			);
		} else {
			wp_register_script(
				'stickyAnythingLib',
				$pluginUrl . 'assets/js/jq-sticky-anything.min.js',
				['jquery'],
				$versionNum,
				true
			);
		}
		wp_enqueue_script('stickyAnythingLib');
	}
}
