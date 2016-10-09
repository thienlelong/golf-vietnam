<?php
/*
Plugin Name: Custom List Table Example
Plugin URI: http://www.mattvanandel.com/
Description: A highly documented plugin that demonstrates how to create custom List Tables using official WordPress APIs.
Version: 1.4.1
Author: Matt van Andel
Author URI: http://www.mattvanandel.com
License: GPL2
*/
/*  Copyright 2015  Matthew Van Andel  (email : matt@mattvanandel.com)

    This program is free software; you can redistribute it and/or modify
    it under the terms of the GNU General Public License, version 2, as
    published by the Free Software Foundation.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program; if not, write to the Free Software
    Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/



/* == NOTICE ===================================================================
 * Please do not alter this file. Instead: make a copy of the entire plugin,
 * rename it, and work inside the copy. If you modify this plugin directly and
 * an update is released, your changes will be lost!
 * ========================================================================== */



/*************************** LOAD THE BASE CLASS *******************************
 *******************************************************************************
 * The WP_List_Table class isn't automatically available to plugins, so we need
 * to check if it's available and load it if necessary. In this tutorial, we are
 * going to use the WP_List_Table class directly from WordPress core.
 *
 * IMPORTANT:
 * Please note that the WP_List_Table class technically isn't an official API,
 * and it could change at some point in the distant future. Should that happen,
 * I will update this plugin with the most current techniques for your reference
 * immediately.
 *
 * If you are really worried about future compatibility, you can make a copy of
 * the WP_List_Table class (file path is shown just below) to use and distribute
 * with your plugins. If you do that, just remember to change the name of the
 * class to avoid conflicts with core.
 *
 * Since I will be keeping this tutorial up-to-date for the foreseeable future,
 * I am going to work with the copy of the class provided in WordPress core.
 */


/** ************************ REGISTER THE TEST PAGE ****************************
 *******************************************************************************
 * Now we just need to define an admin page. For this example, we'll add a top-level
 * menu item to the bottom of the admin menus.
 */
function tt_add_menu_items(){
    add_menu_page('Statistic Golf Clubs', 'Statistic Golf Clubs', 'activate_plugins', 'tt_list_test', 'tt_render_list_page', null, '3.1');
}
add_action('admin_menu', 'tt_add_menu_items');





/** *************************** RENDER TEST PAGE ********************************
 *******************************************************************************
 * This function renders the admin page and the example list table. Although it's
 * possible to call prepare_items() and display() from the constructor, there
 * are often times where you may need to include logic here between those steps,
 * so we've instead called those methods explicitly. It keeps things flexible, and
 * it's the way the list tables are used in the WordPress core.
 */

function tt_render_list_page(){
    ?>

    <style>
        .col-sm-3 {
            float: left;
            border: 1px solid #ccc;
            width: 24%;
            box-sizing: border-box;
        }
        .col-sm-8 {
            padding: 10px;
            width: 70%;
            float: left;
            box-sizing: border-box;
        }
        .col-sm-4 {
            padding: 10px;
            width: 30%;
            float: left;
            text-align: center;
            box-sizing: border-box;
        }
        .clear-fix {
            clear: both;
        }
        .row {
            display: flex;
        }
        hr {
            border: 1px solid #ccc;
        }
        h2.title {
            text-align: center;
            margin: 10px 0px !important;
            font-size: 28px !important;
            color: #0b9347;
        }
    </style>
    <div class="wrap">
        <h2 class="title">Statistic Golf Clubs</h2>
        <div class="row">
            <div class='col-sm-3'>
                <div class="col-sm-8">
                    <strong>Club Member</strong>
                </div>
                <div class="col-sm-4">
                    <strong>Count</strong>
                </div>
                <hr>
                <?php
                global $wpdb, $post;
                $total1 = 0;
                $args = array(
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'clubs-category',
                            'field' => 'slug',
                            'terms' => array('club-member')
                        )
                    ),
                    'posts_per_page' => -1,
                    'post_type' => 'golf_clubs',
                    'orderby'=>'title',
                    'order'=>'asc'
                );
                $wp_query = new WP_Query( $args );
                while($wp_query->have_posts()) : $wp_query->the_post(); $key++; ?>
                   <div class="col-sm-8"><?php the_title();?></div>
                   <?php
                    $sqlQuery = "SELECT COUNT(user_id) as total FROM wp_usermeta  WHERE wp_usermeta.meta_key='CID' and wp_usermeta.meta_value = '" . $post->ID ."'";
                    $totalUsers = $wpdb->get_results($sqlQuery);
                    $total1 += $totalUsers[0]->total;
                    echo '<div class="col-sm-4">'. $totalUsers[0]->total.'</div>';
                    ?>
                <?php endwhile; ?>
            </div>
            <div class='col-sm-3'>
                <div class="col-sm-8">
                   <strong> Association Member</strong>
                </div>
                <div class="col-sm-4">
                   <strong> Count</strong>
                </div>
                <hr>
                <?php
                global $wpdb, $post;
                $total2 = 0;
                $args = array(
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'clubs-category',
                            'field' => 'slug',
                            'terms' => array('association-member')
                        )
                    ),
                    'posts_per_page' => -1,
                    'post_type' => 'golf_clubs'
                );
                $wp_query = new WP_Query( $args );
                while($wp_query->have_posts()) : $wp_query->the_post(); $key++; ?>
                   <div class="col-sm-8"><?php the_title();?></div>
                   <?php
                    $sqlQuery = "SELECT COUNT(user_id) as total FROM wp_usermeta  WHERE wp_usermeta.meta_key='CID' and wp_usermeta.meta_value = '" . $post->ID ."'";
                    $totalUsers = $wpdb->get_results($sqlQuery);
                    $total2 += $totalUsers[0]->total;
                    echo '<div class="col-sm-4">'. $totalUsers[0]->total.'</div>';
                    ?>
                <?php endwhile; ?>
            </div>
            <div class='col-sm-3'>
                <div class="col-sm-8">
                    <strong>Public Member</strong>
                </div>
                <div class="col-sm-4">
                    <strong>Count</strong>
                </div>
                <hr>
                <?php
                global $wpdb, $post;
                $total3 = 0;
                $args = array(
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'clubs-category',
                            'field' => 'slug',
                            'terms' => array('public-member')
                        )
                    ),
                    'posts_per_page' => -1,
                    'post_type' => 'golf_clubs'
                );
                $wp_query = new WP_Query( $args );
                while($wp_query->have_posts()) : $wp_query->the_post(); $key++; ?>
                   <div class="col-sm-8"><?php the_title();?></div>
                   <?php
                    $sqlQuery = "SELECT COUNT(user_id) as total FROM wp_usermeta  WHERE wp_usermeta.meta_key='CID' and wp_usermeta.meta_value = '" . $post->ID ."'";
                    $totalUsers = $wpdb->get_results($sqlQuery);
                    $total3 += $totalUsers[0]->total;
                    echo '<div class="col-sm-4">'. $totalUsers[0]->total.'</div>';
                    ?>
                <?php endwhile; ?>
            </div>
            <div class='col-sm-3'>
                <div class="col-sm-8">
                    <strong>Caddy Clubs</strong>
                </div>
                <div class="col-sm-4">
                    <strong>Count</strong>
                </div>
                <hr>
                <?php
                global $wpdb, $post;
                $total4 = 0;
                $args = array(
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'clubs-category',
                            'field' => 'slug',
                            'terms' => array('caddy-member')
                        )
                    ),
                    'posts_per_page' => -1,
                    'post_type' => 'golf_clubs'
                );
                $wp_query = new WP_Query( $args );
                while($wp_query->have_posts()) : $wp_query->the_post(); $key++; ?>
                   <div class="col-sm-8"><?php the_title();?></div>
                   <?php
                    $sqlQuery = "SELECT COUNT(user_id) as total FROM wp_usermeta  WHERE wp_usermeta.meta_key='CID' and wp_usermeta.meta_value = '" . $post->ID ."'";
                    $totalUsers = $wpdb->get_results($sqlQuery);
                    $total4 += $totalUsers[0]->total;
                    echo '<div class="col-sm-4">'. $totalUsers[0]->total.'</div>';
                    ?>
                <?php endwhile; ?>

            </div>
            <div class="clear-fix">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                <div class="col-sm-8">Totals:</div>
                <div class="col-sm-4"><?php echo $total1;?></div>
            </div>
            <div class="col-sm-3">
                <div class="col-sm-8"></div>
                <div class="col-sm-4"><?php echo $total2;?></div>
            </div>
            <div class="col-sm-3">
                <div class="col-sm-8"></div>
                <div class="col-sm-4"><?php echo $total3;?></div>
            </div>
            <div class="col-sm-3">
                <div class="col-sm-8"></div>
                <div class="col-sm-4"><?php echo $total4;?></div>
            </div>
        </div>
        <div class="row">
            <?php
                //$result = count_users();
                //$count_users = $result['total_users'] - 1;
            ?>
           <h2>All Totals: <?php echo $total1 + $total2 + $total3 + $total4 ;?></h2>
        </div>
    </div>

    <?php
}