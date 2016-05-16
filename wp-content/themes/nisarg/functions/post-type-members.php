
<?php



//Set up custom post type variables for activity post type.

$labels = array(

   'name' => _x('Members', 'post type general name'),

   'singular_name' => _x('Members', 'post type singular name'),

   'add_new' => _x('Add New', 'Members'),

   'add_new_item' => __('Add New Members'),

   'edit_item' => __('Edit Members'),

   'new_item' => __('New Members'),

   'view_item' => __('View Members'),

   'search_items' => __('Search Members'),

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
register_post_type( 'members' , $args );

?>