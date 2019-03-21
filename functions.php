<?php

namespace GPT;

use GPT\Theme;

require_once 'vendor/autoload.php';

add_action( 'after_setup_theme', function() {
	global $GPT;

	if ( ! empty( $GPT ) ) {
		return;
	}

	if ( ! defined( 'GPT_VERSION' ) ) {
		define( 'GPT_VERSION', '1.0.0.1' );
	}
	if ( ! defined( 'GPT_URL' ) ) {
		define( 'GPT_URL', get_stylesheet_directory_uri() );
	}
	if ( ! defined( 'GPT_TEMPLATE_URL' ) ) {
		define( 'GPT_TEMPLATE_URL', get_template_directory_uri() );
	}
	if ( ! defined( 'GPT_PATH' ) ) {
		define( 'GPT_PATH', trailingslashit( get_stylesheet_directory() ) );
	}
	if ( ! defined( 'GPT_INC' ) ) {
		define( 'GPT_INC', GPT_PATH . 'includes/' );
	}

	$GPT = new Theme();
});

