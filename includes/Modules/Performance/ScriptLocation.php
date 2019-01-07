<?php

namespace GPT\Modules\Performance;

class ScriptLocation {

	/**
	 * The ScriptLocation Constructor.
	 */
	public function __construct() {
		add_action( 'wp_enqueue_scripts', [$this, 'StickyMenuLibJs'], 100 );
	}

	public function dequeueScript( $handle ) {

		if ( ! isset( $handle ) ) {
			return;
		}

		wp_dequeue_script( $handle );
	}

	public function registerScript( $opts ) {

		wp_register_script(
			$opts['handle'],
			$opts['path'] . $opts['tag'],
			$opts['deps'],
			$opts['ver'],
			$opts['in_footer']
		);
	}

	public function enqueueScript( $handle ) {
		wp_enqueue_script( $handle );
	}

	public function scriptActions() {

		$jQueryUrl = trailingslashit( includes_url( 'js/jquery' ) );
		$saOptions = get_option('sticky_anything_options');
		$saPluginUrl = trailingslashit( plugins_url( 'sticky-menu-or-anything-on-scroll' ) );
		$saVerNum = $saOptions['sa_version'];
		$scripts = [
			[
				'jquery',
				$jQueryUrl,
				'jquery.js',
				[],
				'1.12.4',
				true,
			],
			[
				'jquery-migrate',
				$jQueryUrl,
				'jquery-migrate.min.js',
				[],
				'1.4.1',
				true,
			],
			[
				'stickyAnythingLib',
				$saPluginUrl,
				'assets/js/jq-sticky-anything.js',
				['jquery'],
				$saVerNum,
				true,
			],
		];

		foreach ( $scripts as $script ) {

		}
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
