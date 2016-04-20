<?php
/*
 * Template Name: Join Now Template
 **/
 get_header();
?>

<?php if(have_posts()) : the_post(); ?>
    <div class="section-join-now">
        <div class="jon-now-action">
            <div class="container">
                <a href="" class="btn btn-radius btn-download"><img src="<?php bloginfo('template_directory'); ?>/images/icon-vietcap.png" alt=""> <span> <?php _e('Download', 'nisarg');?><br><?php _e('Application For Free', 'nisarg') ?></span>
                    <img src="<?php bloginfo('template_directory'); ?>/images/icon-download.png" alt="">
                </a>
                <a href="" class="btn btn-radius bg-red"><img src="<?php bloginfo('template_directory'); ?>/images/icon-search.png" alt=""> <?php _e('Find a Course', 'nisarg') ?></a>
            </div>
        </div>
        <div class="container">

        </div>
    </div>

<?php endif; ?>

<?php get_footer(); ?>