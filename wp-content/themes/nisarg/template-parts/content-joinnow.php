        <?php
/**
 * The template used for displaying page content in page.php
 *
 * @package Nisarg
 */

?>

<article id="page-join-now" <?php post_class('post-content'); ?>>

    <?php nisarg_featured_image_disaplay(); ?>

    <header class="join-now-header">
        <div class="join-now-title">
            <?php _e('Join thousands of other golfers getting more out of their game with a VietCap Membership.','nisarg') ?>
        </div>
        <div class="join-club">
            <p class="text-center club-title"><?php _e('VietCap currently offers four categories of membership for new members.  You will be able to choose from:', 'nisarg') ?></p>
            <div class="clearfix join-now-action">
                <div class="col-sm-6 col-md-3">
                    <button class="btn btn-radius btn-join-club bg-blue">
                        <p><?php _e('Club Membership', 'nisarg') ?></p>
                        <p><?php _e('If you currently belong to an authorized Golf Club', 'nisarg') ?></p>
                    </button>
                </div>
                <div class="col-sm-6 col-md-3">
                    <button class="btn btn-radius btn-join-club bg-blue">
                        <p><?php _e('Association Membership', 'nisarg') ?></p>
                        <p><?php _e('You belong to an authorized Golf Association', 'nisarg') ?></p>
                    </button>
                </div>
                <div class="col-sm-6 col-md-3">
                    <button class="btn btn-radius btn-join-club bg-blue">
                        <p><?php _e('Public Membership', 'nisarg') ?></p>
                        <p><?php _e('You are a public player', 'nisarg') ?></p>
                    </button>
                </div>
                <div class="col-sm-6 col-md-3">
                    <button class="btn btn-radius btn-join-club bg-blue">
                        <p><?php _e('Caddy Clubs', 'nisarg') ?></p>
                        <p><?php _e('You are a Caddy', 'nisarg') ?></p>
                    </button>
                </div>
            </div>
        </div>
    </header><!-- .entry-header -->
    <div class="section-membership">
        <div class="row">
            <div class="col-sm-6 membership-info">
                <p><?php _e('Annual Membership Fees Are :', 'nisarg'); ?></p>
                <p><?php _e('Memberships are valid for <span class="cl-blue">365 days</span> from date of purchase.', 'nisarg'); ?></p>
            </div>
            <div class="col-sm-6 text-right">
                <p>
                    <span class="price">888,888 <span class="units">VND</span></span>
                    <a href="<?php if(pll_current_language('locale')=='vi'){
                       echo site_url('dang-ky');
                    } else {echo site_url('register');}?>" class="btn btn-radius bg-red btn-lg btn-large"><?php _e('Join Now Click Here', 'nisarg') ?></a>

                </p>
            </div>
        </div>
        <hr style="border-color:#dadada;">
        <div class="row">
            <div class="col-sm-6 membership-info">
                <p></p>
                <p><span><?php _e('(Lost Card?) Replacement Card:', 'nisarg'); ?></span> <input type="text" name="user_id" class="form-control user-id"  placeholder="<?php _e('Member ID', 'nisarg') ?>" required></p>
            </div>
            <div class="col-sm-6 text-right">
                <p>
                    <span class="price">300,000 <span class="units">VND</span></span>
                    <!-- <a href="<?php if(pll_current_language('locale')=='vi'){
                       echo site_url('dang-ky');
                    } else {echo site_url('register');}?>" class="btn btn-radius bg-red btn-lg btn-large"><?php _e('Join Now Click Here', 'nisarg') ?></a> -->
                    <a href="#" class="btn btn-radius bg-red btn-lg btn-large" id="btn-join-now"><?php _e('Replace Now Click Here', 'nisarg') ?></a>
                </p>


            </div>
        </div>
        <div class="alert alert-danger" role="alert"><?php _e('<strong>Note:</strong>  When making payment click the “Automatically Renew” function which will keep your existing account active yearly.', 'nisarg'); ?></div>
    </div>
    <div class="join-now-content">
        <div class="row">
            <div class="col-sm-6">
                <div class="join-now-membership">
                    <h3 class="memba"><?php _e('Membership Benefits Include:', 'nisarg'); ?></h3>
                    <!-- <ul class="list-membership">
                        <?php _e('<li>On-line FREE VietCap application</li><li>Official Golf Vietnam Handicap Factor</li><li>Internationally recognized membership card</li><li>Access to official Handicap Rules</li><li>Access to official Amateur Status rules</li><li>Access to play in Club and National Events</li><li>“Peer Review” allows all players access to each other’s scores and trends</li><li>Record own scores on same day</li><li>Receive daily updated handicaps</li><li>Access to authorized Clubs Handicap charts to adjust handicaps accordingly</li><li>Shop On-line for golf products and high end luxury products</li>', 'nisarg'); ?>
                    </ul> -->
                    <?php if(pll_current_language('locale')=='vi'){
                            $page = get_page_by_title( 'Quyền lợi hội viên' );
                            echo $page->post_content;
                        } else {
                            $page = get_page_by_title( 'Membership Benefits' );
                            echo $page->post_content;
                        } ?>
                </div>
            </div>
            <div class="col-sm-6 join-now-banner">
            <?php
                $wp_query = new WP_Query(array(
                    'post_type' => 'advertisements',
                    'posts_per_page' => 4,
                    'order' => 'ASC',
                    'orderby' => 'menu_order',
                    'caller_get_posts' => 1
                ));
                if($wp_query->have_posts()) :
                ?>
                    <?php while($wp_query->have_posts()) : $wp_query->the_post(); $key++; ?>
                        <a href="<?php echo get_post_meta($post->ID, 'advertisements_url', true); ?>" target="_blank"><img src="<?php echo get_field('advertisements_banner', $post->ID); ?>" alt=""></a>
                    <?php endwhile; ?>
                <?php endif; wp_reset_query(); ?>
            </div>
        </div>
    </div><!-- .entry-content -->
</article><!-- #post-## -->

<script type="text/javascript">
    jQuery( document ).ready(function($) {
        $('#btn-join-now').click(function(e) {
            e.preventDefault()
            var user_id = $('input[name=user_id]').val();
            var lagguage = '<?php echo pll_current_language("locale"); ?>';
            var url_return = '<?php echo site_url("register");?>';
            if(lagguage == 'vi') {
              url_return = '<?php echo site_url("dang-ky");?>';
            }
            if(user_id) {
                window.location.href =  url_return + '?MID=' + user_id;
            } else {
                window.location.href =  url_return;
            }
        });

    });
</script>

