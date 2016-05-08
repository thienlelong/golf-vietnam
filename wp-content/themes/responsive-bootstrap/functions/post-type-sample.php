<?php

//Set up custom post type variables for activity post type.
$labels = array(
   'name' => _x('Marketing Backend', 'post type general name'),
   'singular_name' => _x('Marketing', 'post type singular name'),
   'add_new' => _x('Add New', 'Marketing'),
   'add_new_item' => __('Add New Marketing'),
   'edit_item' => __('Edit Marketing'),
   'new_item' => __('New Marketing'),
   'view_item' => __('View Marketing'),
   'search_items' => __('Search Marketing'),
   'not_found' =>  __('Nothing found'),
   'not_found_in_trash' => __('Nothing found in Trash'),
   'parent_item_colon' => ''
);
 
$args = array(
   'labels' => $labels,
   'public' => true,
   'publicly_queryable' => true,
   'exclude_from_search' => true,
   'show_ui' => true,
   'query_var' => true,
   'rewrite' => true, 
   'show_in_nav_menus' => true,
   'capability_type' => 'post',
   'hierarchical' => false,
   'menu_position' => 20,
   'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes', 'revisions'),
   'taxonomies' => array('marketing-category'),
);

//Register the Actitity post type.
register_post_type( 'marketing' , $args );

function marketing_category_taxonomies() 
{
	// Video type
	register_taxonomy('marketing-category',array('marketing'),array(
		'hierarchical' => true,
		'label' => 'Marketing Categories',
		'singular_name' => 'Category',
		'show_ui' => true,
		'query_var' => true,
		'rewrite' => array('slug' => 'marketing-category'),
		'sort' => true
	));
}
// Add custom taxonomy term for activity for the area targeted
add_action( 'init', 'marketing_category_taxonomies', 0 );