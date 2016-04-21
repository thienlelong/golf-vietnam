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
            <?php _e('Join thousands of other golfers getting more out of their game with a Golf Vietnam Membership.','nisarg') ?>
        </div>
        <div class="join-club">
            <p class="text-center club-title"><?php _e('Golf Vietnam currently offers three categories of membership for new members.  You will be able to choose from:', 'nisarg') ?></p>
            <div class="clearfix">
                <div class="col-sm-4">
                    <button class="btn btn-radius btn-join-club bg-blue">
                        <p><?php _e('Club Membership', 'nisarg') ?></p>
                        <p><?php _e('If you currently belong to an authorized Golf Club', 'nisarg') ?></p>
                    </button>
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-radius btn-join-club bg-blue">
                        <p><?php _e('Association Membership', 'nisarg') ?></p>
                        <p><?php _e('You belong to an authorized Golf Association', 'nisarg') ?></p>
                    </button>
                </div>
                <div class="col-sm-4">
                    <button class="btn btn-radius btn-join-club bg-blue">
                        <p><?php _e('Public Membership', 'nisarg') ?></p>
                        <p><?php _e('You are a public player', 'nisarg') ?></p>
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
                <span class="price">888,888 <span class="units">VND</span></span>
                <a href="#" class="btn btn-radius bg-red btn-lg btn-large">Click Here</a>
            </div>
        </div>
        <div class="alert alert-danger" role="alert"><?php _e('<strong>Note:</strong>  When making payment click the “Automatically Renew” function which will keep your existing account active yearly.', 'nisarg'); ?></div>
    </div>


    <div class="entry-content">

    </div><!-- .entry-content -->
</article><!-- #post-## -->

