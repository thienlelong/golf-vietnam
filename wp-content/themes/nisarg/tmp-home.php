<?php
/*
 * Template Name: Home Page
 **/
 get_header();
?>

<?php if(have_posts()) : the_post(); ?>
    <div class="section-homepage">
        <div class="home-banner">
            <h2><?php echo get_field('banner_center'); ?></</h2>
        </div>
        <div class="home-action">
            <div class="container">
                <?php $file = get_field('application_form');
                ?>
                <a href="<?php echo $file['url'];?>" class="btn btn-radius btn-associal" target="_blank" download><span> <?php _e('Download Association <br> Application Form', 'nisarg') ?></span> <img src="<?php bloginfo('template_directory'); ?>/images/icon-search.png" alt=""> </a>
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
                        'hide_empty'               => 0,
                        'hierarchical'             => 1,
                        'exclude'                  => '',
                        'include'                  => '',
                        'number'                   => 2,
                        'taxonomy'                 => 'events-category',
                        'pad_counts'               => false );
                    $categories = get_categories($args);
                    $i=0;
                ?>
                <?php
                    if(pll_current_language('locale') !='vi') {
                        $page_url = 'golf-events?category=';
                    } else {
                        $page_url = 'su-kien-golf?category=';
                    }
                ?>

                <?php foreach ($categories as $category) {
                    $slug = $page_url . $category->slug;
                    $name = $category->name;
                    $i++;
                    $image = get_bloginfo('template_directory') . '/images/event-'. $i .'.png';
                    if (function_exists('z_taxonomy_image_url')) $image = z_taxonomy_image_url($category->term_id);
                    ?>
                    <div class="col-sm-4">
                    <div class="box">
                        <a href="<?php echo site_url($slug)?>"><img src="<?php echo $image;?>" alt=""></a>
                        <div class="box-title">
                            <h3><a href="<?php echo site_url($slug)?>"><?php _e($name, 'nisarg') ?></a></h3>
                        </div>
                    </div>
                </div>
                <?php
                } ?>
                <div class="col-sm-4">
                    <div class="box">
                        <div class="owl-carousel" id="owl-members">
                        <?php
                            $wp_query = new WP_Query(array(
                                'post_type' => 'members',
                                'posts_per_page' => 20,
                                'order' => 'ASC',
                                'orderby' => 'menu_order',
                                'caller_get_posts' => 1
                            ));
                            if($wp_query->have_posts()) :
                            ?>
                                <?php while($wp_query->have_posts()) : $wp_query->the_post(); $key++; ?>
                                    <div class="item">
                                        <img src="<?php echo get_field('members_image', $post->ID); ?>" alt="">
                                    </div>
                                <?php endwhile; ?>
                            <?php endif; wp_reset_query(); ?>
                        </div>
                        <div class="box-title">
                            <h3><?php echo _e('Members', 'nisarg') ?></h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="site-info-box">
            <div class="logo-rolex">
                <img src="<?php bloginfo('template_directory'); ?>/images/logo-rolex.png">
            </div>
            <div class="count-member">
                <img src="<?php bloginfo('template_directory'); ?>/images/icon-member.png">
                <?php

                    $user_counts = vcp_get_visit_count('T');
                    $units = '';
                    if($user_counts >= 1000) {
                        $units = 'K';
                        $user_counts =$user_counts/1000;
                    } elseif ($user_counts >= 1000000) {
                        $units = 'M';
                        $user_counts =$user_counts/1000000;
                    }
                ?>
                <span><?php echo $user_counts.$units; ?></span>
            </div>
            <div class="count-login">
                <img src="<?php bloginfo('template_directory'); ?>/images/icon-online.png">
                <?php if (function_exists('users_online')): ?>
                    <?php $users_online = 0;
                    $units = '';
                    if($users_online >= 1000) {
                        $units = 'K';
                        $users_online =$users_online/1000;
                    } elseif ($users_online >= 1000000) {
                        $units = 'M';
                        $users_online =$users_online/1000000;
                    }
                    ?>
                    <span><?php users_online(); ?></span>
                <?php endif; ?>
            </div>
            <div class="site-watch">
                <img src="<?php bloginfo('template_directory'); ?>/images/icon-watch.png">
                <span class="watch">2:45 <span class="small">PM</span></span>
            </div>
        </div>
    </div>

<?php endif; ?>
<script type="text/javascript">
    jQuery( document ).ready(function($) {

        jQuery("#owl-members").owlCarousel({
            autoPlay: 3000, //Set AutoPlay to 3 seconds
            items : 1,
            itemsDesktop : [1200,1],
            itemsDesktopSmall : [979,1],
            itemsMobile : [768,1],
            navigation: true,
            pagination: false,
            navigationText: false
        });

        function display_watch() {
            var date_format = '12'; /* FORMAT CAN BE 12 hour (12) OR 24 hour (24)*/
            var d       = new Date();
            var hour    = d.getHours();  /* Returns the hour (from 0-23) */
            var minutes     = d.getMinutes();  /* Returns the minutes (from 0-59) */
            var result  = hour;
            var ext     = '';

            if(date_format == '12'){
              if(hour > 12){
                  ext = 'PM';
                  hour = (hour - 12);

                  if(hour < 10){
                      result = "0" + hour;
                  }else if(hour == 12){
                      hour = "00";
                      ext = 'AM';
                  }
              }
              else if(hour < 12){
                  result = ((hour < 10) ? "0" + hour : hour);
                  ext = 'AM';
              }else if(hour == 12){
                  ext = 'PM';
              }
            }

            if(minutes < 10){
              minutes = "0" + minutes;
            }

            $('.site-watch .watch').html(result + ":" + minutes  + '<span class="small"> '+ext+'</span>');
        }
        var refresh=1000;
        setInterval(display_watch, refresh);
        $('.site-info-box').css('top', $(window).height()/2 - 150);
        var offset = $(".site-info-box").offset();
        $(window).scroll(function() {
            $(".site-info-box").stop().animate({
              top: $(window).scrollTop() + offset.top
            });
        });
    });
</script>
<?php get_footer(); ?>