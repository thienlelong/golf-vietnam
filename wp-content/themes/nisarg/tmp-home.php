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
                <a href="" class="btn btn-radius bg-red"><img src="<?php bloginfo('template_directory'); ?>/images/icon-download.png" alt=""> <?php _e('Download Now', 'nisarg') ?></a>
                <a href="" class="btn btn-radius bg-yellow"><i class="fa fa-search cl-white" aria-hidden="true"></i> <?php _e('Find a Course', 'nisarg') ?></a>
            </div>
        </div>
        <div class="container">
            <div class="row home-box">
                <div class="col-sm-4">
                    <div class="box">
                        <img src="<?php bloginfo('template_directory'); ?>/images/national-event.png" alt="">
                        <div class="box-title">
                            <h3><a href=""> <?php _e('National Events 2016', 'nisarg') ?></a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box">
                        <img src="<?php bloginfo('template_directory'); ?>/images/junior-golf.png" alt="">
                        <div class="box-title">
                            <h3><a href=""><?php _e('Junior Golf 2016', 'nisarg') ?></a></h3>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box">
                        <img src="<?php bloginfo('template_directory'); ?>/images/members.png" alt="">
                        <div class="box-title">
                            <h3><a href=""><?php _e('20,000th Member', 'nisarg') ?></a></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>

<?php get_footer(); ?>