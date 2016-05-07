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