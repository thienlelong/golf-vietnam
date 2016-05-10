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
                <a href="#" class="btn btn-radius btn-download" data-toggle="tooltip" data-placement="top" title="Coming Soon"><img src="<?php bloginfo('template_directory'); ?>/images/icon-vietcap.png" alt=""> <span> <?php _e('Download VietCap', 'nisarg');?><br><?php _e('Application For Free', 'nisarg') ?></span>
                    <img src="<?php bloginfo('template_directory'); ?>/images/icon-download.png" alt="">
                </a>
                <a href="#" class="btn btn-radius btn-associal"><span> <?php _e('Download Association', 'nisarg') ?><br> <?php _e('Application Form', 'nisarg') ?></span> <img src="<?php bloginfo('template_directory'); ?>/images/icon-search.png" alt=""> </a>
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
                        <a href="<?php echo site_url($slug)?>"><img src="<?php bloginfo('template_directory'); ?>/images/event-<?php echo $i; ?>.png" alt=""></a>
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
                            <?php
                                $result = count_users();
                                $user_counts = $result['total_users'];
                            ?>
                            <h3><?php echo $user_counts;_e('th Member', 'nisarg') ?></h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="site-info-box">
            <div class="logo-rolex">;
                <img src="<?php bloginfo('template_directory'); ?>/images/logo-rolex.png">
            </div>
            <div class="count-member">
                <img src="<?php bloginfo('template_directory'); ?>/images/icon-member.png">
                <?php
                    $result = count_users();
                    $user_counts = $result['total_users'];
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
                <span>65K</span>
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