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
