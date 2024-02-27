<?php
require get_template_directory() . '/app/template-functions.php';
require get_template_directory() . '/app/vendor/autoload.php';
require get_template_directory() . '/app/init.php';

define('DIST_URI', get_template_directory_uri() . '/assets/dist');

if ( ! function_exists('theme_setup')) :
    function theme_setup()
    {
        add_theme_support('title-tag');
        add_theme_support('post-thumbnails');

        register_nav_menus(
            array(
                'header-menu' => esc_html__('Header', 'theme'),
                'footer-menu' => esc_html__('Footer', 'theme'),
            )
        );

        add_theme_support(
            'html5',
            array(
                'gallery',
                'style',
                'script',
            )
        );
    }
endif;
add_action('after_setup_theme', 'theme_setup');


function enqueue_theme_style_scripts()
{
    wp_enqueue_style('styles', get_template_directory_uri() . '/assets/dist/css/style.min.css');
    wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/dist/js/main.bundle.js', array(), null, true);

//	wp_deregister_script('jquery');

    wp_localize_script('scripts', 'twice_pictures', [
       'ajax_url' => admin_url('admin-ajax.php'),
			 'site_url' => get_template_directory_uri()
    ]);
}

add_action('wp_enqueue_scripts', 'enqueue_theme_style_scripts');

// require get_template_directory() . '/app/Autoloader.php';