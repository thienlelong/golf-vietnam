<?php
/*
 * Template Name: Payment
 **/
 get_header();
?>
<div class="container">
    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
            <?php while ( have_posts() ) : the_post(); ?>
                <div class="page-header">
                    <div class="row">
                        <div class="col-md-4"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></div>
                        <div class="col-md-8 text-right">
                            <img src="<?php bloginfo('template_directory'); ?>/images/page-banner.png" alt="">
                        </div>
                    </div>
                </div>
                <article id="post-<?php the_ID(); ?>" <?php post_class('post-content'); ?>>
                    <div class="entry-content page-content">
                        <div class="payment-info">
                            <h2 class="titcontent">Items Details</h2>
                            <div class="pmitem">
                              <div class="pmorder row">
                                  <div class="col-sm-6" ><h6 class="ordertit">Description</h6>
                                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                                  </div  >
                                  <div class="col-sm-6 col-md-2" >
                                    <h6 class="ordertit">QUANTITY</h6>
                                    <input type="number" class="pmqty" min="0" step="1" max="9999" pattern="">
                                  </div  >
                                  <div class="col-sm-12 col-md-2" ><h6 class="ordertit">PRICE</h6>
                                    <span>$49.95</span>
                                  </div  >
                                  <div  class="col-sm-12 col-md-2" ><h6 class="ordertit">TOTAL</h6>
                                    <span>$72.45</span>
                                  </div  >
                              </div>
                            </div>
                        </div>
                        <div class="payment-detail">
                            <h2 class="titcontent">Payment Details</h2>
                            <div class="pmitem">
                                <div class="pmorder row">
                                    <div class="col-sm-6" >
                                        <div class="formgr"><label class="labelcon">Transaction Amount:</label>     <span class="formcon">$72.45 (CAD)</span></div>
                                        <div class="formgr"><label class="labelcon">Order ID:</label>       <span class="formcon">mhp16104072730p58</span></div>
                                    </div  >
                                    <div class="col-sm-6 col-md-6" >
                                         <img style="width: 100%;" src=<?php echo get_template_directory_uri()."/images/Paymentimgcard.png"?>>
                                    </div  >
                                </div>
                            </div>
                            <div class="col-sm-12" style="font-style:italic;margin: 20px 0">Please complete the following details exactly as they appear on your card. Do not put spaces or hyphens in the card number.</div>
                        </div>
                        <?php echo do_shortcode('[easy_payment item_name="Process Transaction" amount="9"]'); ?>
                    </div><!-- .entry-content -->
                </article><!-- #post-## -->
            <?php endwhile; // End of the loop. ?>
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!--.container-->
<?php get_footer(); ?>
