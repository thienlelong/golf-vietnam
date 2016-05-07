<?php
/*
 * Template Name: Home Page
 **/
 get_header();
?>

<?php if(have_posts()) : the_post(); ?>
    <div class="section-homepage">
        <div class="home-action">
            <div class="container">
                <a href="" class="btn btn-radius btn-download"><img src="<?php bloginfo('template_directory'); ?>/images/icon-vietcap.png" alt=""> <span> <?php _e('Download VietCap', 'nisarg');?><br><?php _e('Application For Free', 'nisarg') ?></span>
                    <img src="<?php bloginfo('template_directory'); ?>/images/icon-download.png" alt="">
                </a>
                <a href="" class="btn btn-radius btn-associal"><span> <?php _e('Download Association', 'nisarg') ?><br> <?php _e('Application Form', 'nisarg') ?></span> <img src="<?php bloginfo('template_directory'); ?>/images/icon-search.png" alt=""> </a>
            </div>
        </div>
        <div class="container">
            <div class="row home-box">
                <?php
                    $args = array(
                        'type'                     => 'golf_events',
                        'child_of'                 => 0,
                        'parent'                   => '',
                        'orderby'                  => 'id',
                        'order'                    => 'DESC',
                        'hide_empty'               => 1,
                        'hierarchical'             => 1,
                        'exclude'                  => '',
                        'include'                  => '',
                        'number'                   => 2,
                        'taxonomy'                 => 'events-category',
                        'pad_counts'               => false );
                    $categories = get_categories($args);
                    $i=0;
                ?>

                <?php foreach ($categories as $category) {
                    $slug = 'golf-events?category='.$category->slug;
                    $name = $category->name;
                    $i++;
                    ?>
                    <div class="col-sm-4">
                    <div class="box">
                        <img src="<?php bloginfo('template_directory'); ?>/images/event-<?php echo $i; ?>.png" alt="">
                        <div class="box-title">
                            <h3><a href="<?php echo site_url($slug)?>"><?php _e($name, 'nisarg') ?></a></h3>
                        </div>
                    </div>
                </div>
                <?php
                } ?>
                <div class="col-sm-4">
                    <div class="box">
                        <ul id="portfolio" class="clearfix">
                            <li><a href="<?php bloginfo('template_directory'); ?>/images/members.png" title=""><img src="<?php bloginfo('template_directory'); ?>/images/members.png" alt=""></a>
                            </li>
                            <li><a href="<?php bloginfo('template_directory'); ?>/images/junior-golf.png" title=""></a></li>
                        </ul>
                        <div class="box-title">
                            <h3><?php _e('20,000th Member', 'nisarg') ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php get_footer(); ?>