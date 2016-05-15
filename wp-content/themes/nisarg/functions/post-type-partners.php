<?php



//Set up custom post type variables for activity post type.

$labels = array(

   'name' => _x('Proud Partners', 'post type general name'),

   'singular_name' => _x('Proud Partners', 'post type singular name'),

   'add_new' => _x('Add New', 'Proud Partners'),

   'add_new_item' => __('Add New Proud Partners'),

   'edit_item' => __('Edit Proud Partners'),

   'new_item' => __('New Proud Partners'),

   'view_item' => __('View Proud Partners'),

   'search_items' => __('Search Proud Partners'),

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
register_post_type( 'proud_partners' , $args );

?>