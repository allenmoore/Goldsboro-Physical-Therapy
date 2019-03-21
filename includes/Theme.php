<?php

namespace GPT;

use GPT\Modules\Divi\RemoveProjectsCPT;
use GPT\Modules\Performance\DNSPrefetch;

class Theme {

	/**
	 * Property representing the DNSPrefetch class.
	 *
	 * @var \GPT\Modules\Performance\DNSPrefetch
	 */
	public $dnsPrefetch;

	/**
	 * Property representing the RemoveProjectsCPT class.
	 *
	 * @var \GPT\Modules\Divi\RemoveProjectsCPT
	 */
	public $projectsCPTArgs;

	/**
	 * The Theme Constructor.
	 */
	public function __construct() {

		$this->setupL10n();

		$this->dnsPrefetch = new DNSPrefetch();
		$this->projectsCPTArgs = new RemoveProjectsCPT();

		$this->registerImageSizes();

		add_action( 'wp_enqueue_scripts', [$this, 'enqueueParentStyles'], 9 );
		add_action( 'wp_enqueue_scripts', [$this, 'enqueueStyles'] );
		add_filter( 'image_size_names_choose', [$this, 'showImageSizes'] );
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
			$themeUrl . 'dist/css/style' . $min .'.css',
			array(
				$parentStyle
			),
			GPT_VERSION,
			'all'
		);
	}

	/**
	 * Method to register custom image sizes.
	 */
	public function registerImageSizes() {
		add_image_size( 'staff-headshot', 225, 315, array( 'center', 'top' ) );
	}

	/**
	 * Method to add a custom image size to the media uploader.
	 *
	 * @param array $sizes Array of image sizes and their names.
	 * @return array Array of filtered image sizes.
	 */
	public function showImageSizes( $sizes ) {

		return array_merge( $sizes, [
			'staff-headshot' => __( 'Staff Headshot' ),
		] );
	}
}
