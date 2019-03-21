<?php

namespace GPT\Modules\Divi;

class RemoveProjectsCPT {

	/**
	 * The RemoveProjectsCPT Constructor.
	 */
	public function __construct() {
		add_filter( 'et_project_posttype_args', [$this, 'filterCPTArgs'], 10, 1 );
	}

	/**
	 * Method to remove Divi's Projects CPT from the Admin Menu.
	 *
	 * @param Array $args An array of post type args.
	 * @return Array A filtered array of post type args.
	 */
	public function filterCPTArgs( $args ) {

		return array_merge( $args, [
			'public'              => false,
			'exclude_from_search' => false,
			'publicly_queryable'  => false,
			'show_in_nav_menus'   => false,
			'show_ui'             => false,
		]);
	}
}
