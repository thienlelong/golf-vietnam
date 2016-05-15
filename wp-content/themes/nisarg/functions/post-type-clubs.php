<?php
//Set up custom post type variables for activity post type.

$labels = array(

   'name' => _x('Golf Clubs', 'post type general name'),

   'singular_name' => _x('Golf Clubs', 'post type singular name'),

   'add_new' => _x('Add New', 'Golf Clubs'),

   'add_new_item' => __('Add New Golf Clubs'),

   'edit_item' => __('Edit Golf Clubs'),

   'new_item' => __('New Golf Clubs'),

   'view_item' => __('View Golf Clubs'),

   'search_items' => __('Search Golf Clubs'),

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
register_post_type( 'golf_clubs' , $args );

function clubs_category_taxonomies()
{
   // Video type
   register_taxonomy('clubs-category',array('golf_clubs'),array(
      'hierarchical' => true,
      'label' => 'Clubs Categories',
      'singular_name' => 'Category',
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'clubs-category'),
      'sort' => true
   ));
}
// Add custom taxonomy term for activity for the area targeted
add_action( 'init', 'clubs_category_taxonomies', 0 );

?>