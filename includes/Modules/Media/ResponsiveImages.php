<?php

namespace GPT\Modules\Media;

class ResponsiveImages {

	public function __construct() {
		add_action( 'amTestImgSizes', [$this, 'renderImgSizes' ] );
	}

	public function getRegisteredImgSizes() {
		global $_wp_additional_image_sizes;

		$imgSizes = [];
		$defaultImgSizes = [
			'thumbnail',
			'medium',
			'large',
		];

		foreach ( $defaultImgSizes as $size ) {
			$imgSizes[$size]['width'] = intval( get_option( $size . '_size_w' ) );
			$imgSizes[$size]['height'] = intval( get_option( $size . '_size_h' ) );
			$imgSizes[$size]['crop'] = get_option( $size . '_crop' ) ? get_option( $size . '_crop' ) : false;
		}

		if ( isset( $_wp_additional_image_sizes ) && count( $_wp_additional_image_sizes ) ) {
			$imgSizes = array_merge( $imgSizes, $_wp_additional_image_sizes );
		}

		return $imgSizes;
	}

	public function renderImgSizes() {

		$imgSizes = $this->getRegisteredImgSizes();

		var_dump( $imgSizes );
	}
}
