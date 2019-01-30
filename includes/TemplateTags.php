<?php

/**
 * Function to load a template file and template data.
 *
 * @param string $__tmplFile the template file.
 * @param array  $__tmplData the template data.
 */
function getTemplateFile( $__tmplFile, array $__tmplData = [ ] ) {

	$__tmplFile = apply_filters(
		'gpt-template',
		GPT_PATH . "views/$__tmplFile.php",
		$__tmplFile,
		$__tmplData
	);

	if ( $__tmplFile && file_exists( $__tmplFile ) ) {
		extract( $__tmplData, EXTR_SKIP );
		require $__tmplFile;
	}
}

/**
 * Function to return default footer credits.
 *
 * @return string Default footer credits with year and site name.
 */
function gptGetDefaultFooterCredits() {

	$name = get_bloginfo( 'name' );
	$year = date( 'Y' );

	return sprintf( __( 'Copyright &copy; %s %s. All rights reserved', 'gpt' ), esc_html( $year ), esc_html( $name ) );
}

/**
 * Function to return the footer credits with potential overwrites.
 *
 * @return string The footer credits.
 */
function gptGetFooterCredits() {

	$original_footer_credits = gptGetDefaultFooterCredits();

	$disable_custom_credits = et_get_option( 'disable_custom_footer_credits', false );

	if ( $disable_custom_credits ) {
		return '';
	}

	$credits_format = '<%2$s id="footer-info">%1$s</%2$s>';

	$footer_credits = et_get_option( 'custom_footer_credits', '' );

	if ( '' === trim( $footer_credits ) ) {
		return et_get_safe_localization( sprintf( $credits_format, $original_footer_credits, 'p' ) );
	}

	return et_get_safe_localization( sprintf( $credits_format, $footer_credits, 'div' ) );
}
