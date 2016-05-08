<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Nisarg
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>

    <?php nisarg_featured_image_disaplay(); ?>
    <div class="entry-content page-content page-events inner-70">
        <?php
        if(isset($_GET['category'])){
            $query_category = $_GET['category'];
        }
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $wp_query = new WP_Query(array(
            'post_type' => 'golf_events',
            'posts_per_page' =>2,
            'paged' => $paged,
            'order' => 'ASC',
            'orderby' => 'menu_order',
            'tax_query' => array(
                array(
                    'taxonomy' => 'events-category',
                    'field' => 'slug',
                    'terms' => array($query_category)
                )
            )
        ));
        if($wp_query->have_posts()) :
        ?>
            <?php while($wp_query->have_posts()) : $wp_query->the_post(); $key++;
                $club_Id = get_post_meta($post->ID, 'host_club', true);
            ?>
                <div class="row">
                    <div class="col-sm-9">
                        <h3 class="event-title">
                            <?php the_title(); ?>
                        </h3>
                        <h4 class="event-club">
                            <span>HOST CLUB:</span> <a href="<?php echo get_post_meta($club_Id, 'golf_clubs_club_website', true); ?>" target="new"><?php echo get_the_title( $club_Id ); ?></a>
                        </h4>
                        <div class="event-address"><img src="<?php bloginfo('template_directory'); ?>/images/icon-location.png" alt="" /><?php echo get_post_meta($post->ID, 'address', true); ?></div>
                    </div>
                    <div class="col-sm-3">
                        <div class="meta-dates">
                            <span>DATES</span>
                            <p><?php echo mysql2date('F j', get_post_meta($post->ID, 'date_start', true)); ?> - <?php echo  mysql2date('F j Y',get_post_meta($post->ID, 'date_finish', true)); ?></p>
                        </div>
                        <?php $file = get_field('information_doc');?>
                        <a href="<?php echo $file['url']; ?>" target="_blank" download class=" btn-border btn-radius">
                            view  Information
                        </a>
                    </div>
                </div>
                <hr class="line-dot">
            <?php endwhile; ?>
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
    </div><!-- .entry-content -->
</article><!-- #post-## -->

