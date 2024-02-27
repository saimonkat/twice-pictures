<?php

namespace App\Controllers\Admin;

class OptionsPageController
{
	public function __construct()
    
    {
        /**
         * Add acf options
         */
        if (function_exists('acf_add_options_page')) {
					acf_add_options_page(array(
            'page_title' => 'Theme General Settings',
            'menu_title' => 'Theme Settings',
            'menu_slug'  => 'theme-settings',
            'capability' => 'edit_posts',
            'redirect'   => false
        ));
        }
    }
}