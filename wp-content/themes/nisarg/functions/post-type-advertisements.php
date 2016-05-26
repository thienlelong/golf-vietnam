<?php



//Set up custom post type variables for activity post type.

$labels = array(

   'name' => _x('Advertisements', 'post type general name'),

   'singular_name' => _x('Advertisements', 'post type singular name'),

   'add_new' => _x('Add New', 'Advertisements'),

   'add_new_item' => __('Add New Advertisements'),

   'edit_item' => __('Edit Advertisements'),

   'new_item' => __('New Advertisements'),

   'view_item' => __('View Advertisements'),

   'search_items' => __('Search Advertisements'),

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

   'supports' => array('title'),

   'taxonomies' => array('category',),

);

//Register the Actitity post type.
register_post_type( 'advertisements', $args );

?>