<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Nisarg
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>
    <?php
        if(isset($_GET['search'])){
            $query_search = $_GET['search'];
        }
    ?>
    <?php nisarg_featured_image_disaplay(); ?>
    <div class="entry-content page-content">
        <div class="inner-70">
            <h2 class="page-title text-center"><?php _e('Authorized Golf Club', 'nisarg'); ?></h2>
            <p class="text-center"> <?php _e('Welcome to the Golf Vietnam eHandicap Network. To view your current handicap information complete with information about your most recent rounds of golf, select your home club and click on the Member Lookup button.', 'nisarg'); ?></p>
            <form class="list-search">
                <div class="canhxn">
                <input type="text" placeholder="<?php _e('Search...', 'nisarg'); ?>" name="search" />
                <input type="submit" value="<?php _e('Search', 'nisarg');?>" />
                </div>
            </form>
            <div class="list-clubs">
            <?php
                if (isset($_GET['search'])) {
                    echo $title = _e('Search Results for', 'nisarg') . ' <em>"' . $query_search . '"</em>';
                }
            ?>
                <hr class="dot-line">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $wp_query = new WP_Query(array(
                        'post_type' => 'golf_clubs',
                        'posts_per_page' => 14,
                        'paged' => $paged,
                        'order' => 'ASC',
                        'orderby' => 'menu_order',
                        'caller_get_posts' => 1,
                        'meta_query' => array(
                            array(
                                /*'key' => '_title',*/
                                'value' => sanitize_text_field($_REQUEST['search']),
                                'compare' => 'like'
                            )
                        )
                    ));
                    if($wp_query->have_posts()) :
                    ?>
                    <div class="row clubs">
                        <?php while($wp_query->have_posts()) : $wp_query->the_post(); $key++; ?>
                            <div class="col-md-6 club">
                                <div class="club-item clearfix">
                                    <div class="club-logo">
                                        <img src="<?php echo get_field('golf_clubs_club_logo', $post->ID); ?>" alt="<?php the_title(); ?>" />
                                    </div>
                                    <div class="club-detail">
                                        <h3 class="club-name"><?php the_title(); ?></h3>
                                        <a href="<?php echo get_post_meta($post->ID, 'golf_clubs_club_website', true); ?>" target="_blank"><?php echo get_post_meta($post->ID, 'golf_clubs_club_website', true); ?></a>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                        <hr class="dot-line">
                        <?php
                        if($wp_query->max_num_pages > 1){
                            $big = 999999999; // need an unlikely integer
                            $paginate_links = paginate_links( array(
                                'base'      => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                                'format'    => '?paged=%#%',
                                'current'   => max( 1, get_query_var('paged') ),
                                'total'     => $wp_query->max_num_pages,
                                'prev_text' => __('&#8592;'),
                                'next_text' => __('&#8594;'),
                                'type'      => 'array'
                            ));
                            echo '<nav class="text-right"><ul class="pagination">';
                            foreach ( $paginate_links as $pgl ) {
                                echo "<li>$pgl</li>";
                            }
                            echo '</ul></nav>';
                        } ?>
                    <?php else:?>
                        <?php get_template_part( 'template-parts/content', 'none' ); ?>
                    <?php endif; wp_reset_query(); ?>

            </div>
        </div>
    </div><!-- .entry-content -->
</article><!-- #post-## -->

