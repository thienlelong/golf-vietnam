<?php



//Set up custom post type variables for activity post type.

$labels = array(

   'name' => _x('Golf Events', 'post type general name'),

   'singular_name' => _x('Golf Events', 'post type singular name'),

   'add_new' => _x('Add New', 'Golf Events'),

   'add_new_item' => __('Add New Golf Events'),

   'edit_item' => __('Edit Golf Events'),

   'new_item' => __('New Golf Events'),

   'view_item' => __('View Golf Events'),

   'search_items' => __('Search Golf Events'),

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

   'supports' => array('title', 'custom-fields', 'page-attributes'),

   'taxonomies' => array('category',),

);



//Register the Actitity post type.

register_post_type( 'golf_events' , $args );

function events_category_taxonomies()
{
   // Video type
   register_taxonomy('events-category',array('golf_events'),array(
      'hierarchical' => true,
      'label' => 'Events Categories',
      'singular_name' => 'Category',
      'show_ui' => true,
      'query_var' => true,
      'rewrite' => array('slug' => 'events-category'),
      'sort' => true
   ));
}
// Add custom taxonomy term for activity for the area targeted
add_action( 'init', 'events_category_taxonomies', 0 );

?>