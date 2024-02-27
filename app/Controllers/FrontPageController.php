<?php

namespace App\Controllers;

// use MailPoet\API\API;
// use MailPoet\API\MP\v1\APIException;

class FrontPageController
{
    public function __construct()
    {
        if (is_front_page()) {
            add_filter('body_class', [$this, 'removeBodyClasses']);
        }
        // add_action('wp_ajax_nopriv_subscribe', [$this, 'ajaxSubscribe']);
        // add_action('wp_ajax_subscribe', [$this, 'ajaxSubscribe']);
    }

    

    public function removeBodyClasses($classes)
    {
        $key = array_search('page', $classes);

        unset($classes[$key]);

		// 		if (is_front_page()) {
		// 			return ['home'];
		// 	}

		// 	if (is_page('our-story')) {
		// 		return ['our-story'];
		// 	}

		// 	if (is_page('find-us')) {
		// 		return ['find-us'];
		// 	}

		// 	if (is_singular('articles')) {
		// 		$classes[] = 'articles';
		// }

        return $classes;
    }
}

// new FrontPageController();