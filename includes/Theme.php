<?php

namespace GPT;

class Theme {

	/**
	 * The Theme Constructor.
	 */
	public function __construct() {

		$this->setupL10n();

		add_action( 'wp_enqueue_scripts', array( $this, 'enqueueParentStyles' ), 9 );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueueStyles' ) );
	}

	/**
	 * Method to setup the textdomain.
	 */
	public function setupL10n() {
		$locale = apply_filters( 'plugin_locale', get_locale(), 'gpt' );
		load_textdomain( 'gpt', WP_LANG_DIR . '/gpt/gpt-' . $locale . '.mo' );
		load_theme_textdomain( 'gpt', GPT_PATH . '/languages' );
	}

	/**
	 * Method to enqueue the parent theme styles.
	 */
	public function enqueueParentStyles() {
		$parentStyle = 'divi-style';
		$parentUrl = trailingslashit( GPT_TEMPLATE_URL );

		wp_enqueue_style(
			$parentStyle,
			$parentUrl . 'style.css'
		);
	}

	/**
	 * Method to enqueue the front end CSS.
	 */
	public function enqueueStyles() {
		$min = defined( 'SCRIPT_DEBUG' ) && filter_var( SCRIPT_DEBUG, FILTER_VALIDATE_BOOLEAN ) ? '' : '.min';
		$parentStyle = 'divi-style';
		$themeUrl = trailingslashit( GPT_URL );

		wp_enqueue_style(
			'gpt',
			$themeUrl . 'dist/css/style.css',
			[$parentStyle],
			GPT_VERSION,
			'all'
		);
	}
}
