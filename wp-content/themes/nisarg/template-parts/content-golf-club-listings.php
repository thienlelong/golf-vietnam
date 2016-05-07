<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Nisarg
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>

    <?php nisarg_featured_image_disaplay(); ?>
    <div class="entry-content page-content">
        <div class="inner-70">
            <h2 class="page-title text-center">Authorized Golf Club</h2>
            <p class="text-center">Welcome to the Golf Vietnam eHandicap Network. To view your current handicap information complete with information about your most recent rounds of golf, select your home club and click on the 'Member Lookup' button. </p>
            <form class="list-search">
                <div class="canhxn">
                <input type="text" placeholder="Search..." />
                <input type="submit" value="search" />
                </div>
            </form>
            <div class="list-clubs">
                <hr class="dot-line">
                <div class="row">
                    <?php
                    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                    $golf_clubs = new WP_Query(array(
                        'post_type' => 'golf_clubs',
                        'posts_per_page' => 4,
                        'paged' => $paged,
                        'order' => 'ASC',
                        'orderby' => 'menu_order',
                        'caller_get_posts' => 1
                    ));
                    if($golf_clubs->have_posts()) :
                    ?>
                        <?php while($golf_clubs->have_posts()) : $golf_clubs->the_post(); $key++; ?>
                            <div class="col-md-6 club-item clearfix">
                                <div class="club-logo">
                                    <img src="<?php echo get_field('golf_clubs_club_logo', $post->ID); ?>" alt="<?php the_title(); ?>" />
                                </div>
                                <div class="club-detail">
                                    <h3 class="club-name"><?php the_title(); ?></h3>
                                    <a href="<?php echo get_post_meta($post->ID, 'golf_clubs_club_website', true); ?>"><?php echo get_post_meta($post->ID, 'golf_clubs_club_website', true); ?></a>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    <?php endif; wp_reset_query(); ?>
                </div>
                <hr class="dot-line">

            </div>
        </div>
    </div><!-- .entry-content -->
</article><!-- #post-## -->

