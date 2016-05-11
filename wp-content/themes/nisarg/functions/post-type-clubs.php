<?php
//Set up custom post type variables for activity post type.

$labels = array(

   'name' => _x('Golf Club List', 'post type general name'),

   'singular_name' => _x('Golf Club', 'post type singular name'),

   'add_new' => _x('Add New', 'Golf Club'),

   'add_new_item' => __('Add New Golf Club'),

   'edit_item' => __('Edit Golf Club'),

   'new_item' => __('New Golf Club'),

   'view_item' => __('View Golf Club'),

   'search_items' => __('Search Golf Club'),

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

   'supports' => array('title', 'editor', 'excerpt', 'thumbnail', 'custom-fields', 'page-attributes', 'comments','revisions'),

   'taxonomies' => array('category',),

);

//Register the Actitity post type.
register_post_type( 'golf_clubs' , $args );


?>