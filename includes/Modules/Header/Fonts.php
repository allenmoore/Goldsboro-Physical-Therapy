<?php

namespace GPT\Modules\Header;

class Fonts {

	/**
	 * The Fonts constructor.
	 */
	public function __construct() {
		add_action( 'wp_head', array( $this, 'importFonts' ), 5 );
	}

	/**
	 * Method to import fonts into the `<head>` tag.
	 *
	 * @author Allen Moore
	 *
	 * @return void
	 */
	public function importFonts() {

		$themeUrl = trailingslashit( get_stylesheet_directory_uri() );
		$fontDir = trailingslashit( $themeUrl . 'dist/fonts' );
		?>
		<style>
			@font-face {
				font-family: 'Lato';
				font-display: swap;
				font-style: normal;
				font-weight: 700;
				src: local('Lato Bold'), local('Lato-Bold'), url(https://fonts.gstatic.com/s/lato/v14/S6u9w4BMUTPHh6UVSwiPGQ3q5d0.woff2) format('woff2');
				unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
			}
			@font-face {
				font-family: 'Lato';
				font-display: swap;
				font-style: italic;
				font-weight: 700;
				src: local('Lato Bold Italic'), local('Lato-BoldItalic'), url(https://fonts.gstatic.com/s/lato/v14/S6u_w4BMUTPHjxsI5wq_Gwftx9897g.woff2) format('woff2');
				unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
			}
			@font-face {
				font-family: 'Open Sans';
				font-display: swap;
				font-style: normal;
				font-weight: 400;
				src: local('Open Sans Regular'), local('OpenSans-Regular'), url(https://fonts.gstatic.com/s/opensans/v15/mem8YaGs126MiZpBA-UFVZ0bf8pkAg.woff2) format('woff2');
				unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
			}
			@font-face {
				font-family: 'Open Sans';
				font-display: swap;
				font-style: italic;
				font-weight: 400;
				src: local('Open Sans Italic'), local('OpenSans-Italic'), url(https://fonts.gstatic.com/s/opensans/v15/mem6YaGs126MiZpBA-UFUK0Zdc1GAK6b.woff2) format('woff2');
				unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
			}
			@font-face {
				font-family: 'Open Sans';
				font-display: swap;
				font-style: normal;
				font-weight: 600;
				src: local('Open Sans SemiBold'), local('OpenSans-SemiBold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UNirkOUuhpKKSTjw.woff2) format('woff2');
				unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
			}
			@font-face {
				font-family: 'Open Sans';
				font-display: swap;
				font-style: italic;
				font-weight: 600;
				src: local('Open Sans SemiBold Italic'), local('OpenSans-SemiBoldItalic'), url(https://fonts.gstatic.com/s/opensans/v15/memnYaGs126MiZpBA-UFUKXGUdhrIqOxjaPX.woff2) format('woff2');
				unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
			}
			@font-face {
				font-family: 'Open Sans';
				font-display: swap;
				font-style: normal;
				font-weight: 700;
				src: local('Open Sans Bold'), local('OpenSans-Bold'), url(https://fonts.gstatic.com/s/opensans/v15/mem5YaGs126MiZpBA-UN7rgOUuhpKKSTjw.woff2) format('woff2');
				unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
			}
			@font-face {
				font-family: 'Open Sans';
				font-display: swap;
				font-style: italic;
				font-weight: 700;
				src: local('Open Sans Bold Italic'), local('OpenSans-BoldItalic'), url(https://fonts.gstatic.com/s/opensans/v15/memnYaGs126MiZpBA-UFUKWiUNhrIqOxjaPX.woff2) format('woff2');
				unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
			}
		</style>
		<?php
	}
}
