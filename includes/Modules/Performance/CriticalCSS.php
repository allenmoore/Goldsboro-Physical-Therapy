<?php

namespace  GPT\Modules\Performance;

class CriticalCSS {

	/**
	 * The CriticalCSS Constructor.
	 */
	public function __construct() {
		add_action( 'wp_head', [$this, 'inlineCSS'], 1 );
	}

	/**
	 * Method to inline the loadCSS `rel=preload` polyfill in the document `<head>`.
	 */
	public function inlineJSPolyfill() {

		$basePath = trailingslashit( GPT_PATH . 'dist/js/vendor' );
		$min = defined( 'SCRIPT_DEBUG' ) && filter_var( SCRIPT_DEBUG, FILTER_VALIDATE_BOOLEAN ) ? '' : '.min';
		?>
		<script id="preload-css-polyfill">
			<?php include( $basePath . 'cssrelpreload' . $min . '.js' ); ?>
		</script>
		<?php
	}
	/**
	 * Method to inline CSS for the Critical Rendering Path.
	 */
	public function inlineCSS() {

		$basePath = trailingslashit( GPT_PATH . 'dist/css' );
		$parentThemeBasePath = trailingslashit( GPT_TEMPLATE_URL );
		$parentThemeCSS = $parentThemeBasePath . 'style.css';
		$themePath = trailingslashit( GPT_URL . '/dist/css' );
		$themeCSS = $themePath . 'style.css';
		$verNum = GPT_VERSION;
		?>
		<style>
			<?php include( $basePath . 'critical.style.min.css' );  ?>
		</style>
		<link rel="preload" href="<?php echo esc_url( $parentThemeCSS ); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
		<noscript><link rel="stylesheet" href="<?php echo esc_url( $parentThemeCSS ); ?>"></noscript>
		<link rel="preload" href="<?php echo esc_url( $themeCSS . '?ver=' . $verNum ); ?>" as="style" onload="this.onload=null;this.rel='stylesheet'">
		<noscript><link rel="stylesheet" href="<?php echo esc_url( $themeCSS . '?ver=' . $verNum ); ?>"></noscript>
		<?php $this->inlineJSPolyfill();
	}
}
