<?php

namespace App\Controllers;
class ProjectController
{
    public function __construct()
    {
        add_action('init', [$this, 'register_post_type']);
        add_action('init', [$this, 'register_taxonomy']);
        add_filter('body_class', [$this, 'addClass']);
    }

    public function addClass($classes)
    {
        if (is_singular('project')) {
            $classes[] = 'project';
        }
				if (is_page('directors')) {
					$classes[] = 'directors';
			}
        return $classes;
    }

    public function register_post_type(): void
    {
        register_post_type('project', [
            'label'        => 'Projects',
            'labels'       => array(
                'name'      => 'Projects',
                'all_items' => 'All Projects'
            ),
            'public'       => true,
            'hierarchical' => false,
            'show_in_rest' => true,
            'supports'     => ['title', 'editor', 'thumbnail'],
            'has_archive'  => true,
            'rewrite'      => array('slug' => 'projects'),
            'query_var'    => true,
            'menu_icon'    => 'dashicons-format-video',
        ]);
    }

    public function register_taxonomy(): void
    {
        register_taxonomy('parent_category', ['project'], [
            'label'             => 'Parent Category',
            'labels'            => [
                'name'              => 'Parent Category',
                'singular_name'     => 'Parent Category',
                'search_items'      => 'Search Parent Categories',
                'all_items'         => 'All Parent Categories',
                'view_item '        => 'View Parent Category',
                'parent_item'       => 'Parent Parent Category',
                'parent_item_colon' => 'Parent Parent Category:',
                'edit_item'         => 'Edit Parent Category',
                'update_item'       => 'Update Parent Category',
                'add_new_item'      => 'Add New Parent Category',
                'new_item_name'     => 'New Parent Category',
                'menu_name'         => 'Parent Categories',
            ],
            'description'       => '',
            'public'            => true,
            'hierarchical'      => true,
            'capabilities'      => array(),
            'show_admin_column' => false,
            'show_in_rest'      => true,
        ]);
				
			register_taxonomy('directors_category', ['project'], [
				'label'             => 'Category',
				'labels'            => [
						'name'              => 'Director',
						'singular_name'     => 'Director',
						'search_items'      => 'Search Directors',
						'all_items'         => 'All Directors',
						'view_item '        => 'View Director',
						'parent_item'       => 'Parent Director',
						'parent_item_colon' => 'Parent Director:',
						'edit_item'         => 'Edit Director',
						'update_item'       => 'Update Director',
						'add_new_item'      => 'Add New Director',
						'new_item_name'     => 'New Director',
						'menu_name'         => 'Directors',
				],
				'description'       => '',
				'public'            => true,
				'hierarchical'      => true,
				'capabilities'      => array(),
				'rewrite'      => array('slug' => 'directors'),
				'show_admin_column' => false,
				'show_in_rest'      => true,
		]);
        register_taxonomy('category', ['project'], [
            'label'             => 'Category',
            'labels'            => [
                'name'              => 'Category',
                'singular_name'     => 'Category',
                'search_items'      => 'Search Categories',
                'all_items'         => 'All Categories',
                'view_item '        => 'View Category',
                'parent_item'       => 'Parent Category',
                'parent_item_colon' => 'Parent Category:',
                'edit_item'         => 'Edit Category',
                'update_item'       => 'Update Category',
                'add_new_item'      => 'Add New Category',
                'new_item_name'     => 'New Category',
                'menu_name'         => 'Categories',
            ],
            'description'       => '',
            'public'            => true,
            'hierarchical'      => true,
            'capabilities'      => array(),
            'show_admin_column' => false,
            'show_in_rest'      => true,
        ]);
				register_taxonomy('genre', ['project'], [
					'label'             => 'Genre',
					'labels'            => [
							'name'              => 'Genre',
							'singular_name'     => 'Genre',
							'search_items'      => 'Search Genres',
							'all_items'         => 'All Genres',
							'view_item '        => 'View Genre',
							'parent_item'       => 'Parent Genre',
							'parent_item_colon' => 'Parent Genre:',
							'edit_item'         => 'Edit Genre',
							'update_item'       => 'Update Genre',
							'add_new_item'      => 'Add New Genre',
							'new_item_name'     => 'New Genre',
							'menu_name'         => 'Genres',
					],
					'description'       => '',
					'public'            => true,
					'hierarchical'      => true,
					'capabilities'      => array(),
					'show_admin_column' => false,
					'show_in_rest'      => true,
			]);
        register_taxonomy('brand', ['project'], [
            'label'             => 'Brand',
            'labels'            => [
                'name'              => 'Brand',
                'singular_name'     => 'Brand',
                'search_items'      => 'Search Brands',
                'all_items'         => 'All Brands',
                'view_item '        => 'View Brand',
                'parent_item'       => 'Parent Brand',
                'parent_item_colon' => 'Parent Brand:',
                'edit_item'         => 'Edit Brand',
                'update_item'       => 'Update Brand',
                'add_new_item'      => 'Add New Brand',
                'new_item_name'     => 'New Brand',
                'menu_name'         => 'Brands',
            ],
            'description'       => '',
            'public'            => true,
            'hierarchical'      => true,
            'rewrite'           => true,
            'capabilities'      => array(),
            'show_admin_column' => false,
            'show_in_rest'      => true,
        ]);
    }
}