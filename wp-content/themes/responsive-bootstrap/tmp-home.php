<?php
/*
 * Template Name: Home Page
 **/
 get_header();
?>

<?php if(have_posts()) : the_post(); ?>
    <div class="section-homepage">
        <div class="container">
            <div class="row">
                <div class="col-sm-4">
                    <div class="box">
                        <img src="<?php bloginfo('template_directory'); ?>/images/national-event.png" alt="">
                        <div class="box-title">
                            <h3><?php _e('National Events 2016', 'nisarg') ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box">
                        <img src="<?php bloginfo('template_directory'); ?>/images/junior-golf.png" alt="">
                        <div class="box-title">
                            <h3><?php _e('Junior Golf 2016', 'nisarg') ?></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box">
                        <img src="<?php bloginfo('template_directory'); ?>/images/members.png" alt="">
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