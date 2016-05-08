<?php
/*
 * Template Name: Register
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
                    <div class="entry-content">
                        <form class="form-horizontal registerUserForm" id="registerUserForm0">
                            <div class="form-user-info">
                                <h2 class="form-header"><span class="step">1</span><?php _e('Basic Information', 'nisarg') ?></h2>
                                <div class="inner-100">
                                <div class="form-group">
                                    <div class="col-sm-4">
                                      <input type="text" name="first_name" class="form-control"  placeholder="<?php _e('First Name', 'nisarg') ?>" required>
                                    </div>
                                    <div class="col-sm-4">
                                      <input type="text" name="middle_name" class="form-control"  placeholder="<?php _e('Middle Name', 'nisarg') ?> " required>
                                    </div>
                                    <div class="col-sm-4">
                                      <input type="text" name="last_name" class="form-control"  placeholder="<?php _e('Last Name', 'nisarg') ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                      <input type="text" name="user_email" class="form-control"  placeholder="<?php _e('Email', 'nisarg') ?>"required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                      <input type="password" name="password" class="form-control"  placeholder="<?php _e('Login Password', 'nisarg') ?>"required>
                                    </div>
                                    <div class="col-sm-6">
                                      <input type="password" name="password2" class="form-control"  placeholder="<?php _e('Confirm Login Password', 'nisarg') ?>"required>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <span class="col-sm-6 col-md-6 labelicon"><?php _e('Choose one of following:', 'nisarg')?></span>
                                 </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                       <label class="checkgroup regcheck active" id="clubm" value="0"><input class="" type="checkbox"><img src="<?php echo get_template_directory_uri(). '/images/iconcheckgreen.png'?>"> <span class="lbtxt">club member</span>
                                            <ul class="memoptlist">
                                                <li><a href="javascript:;" value="0">BRG KINGS’ ISLAND GOLF RESORT</a></li>
                                                <li><a href="javascript:;" value="1">DANANG GOLF CLUB</a></li>
                                                <li><a href="javascript:;" value="2">BRG KINGS’ ISLAND GOLF RESORT</a></li>
                                                <li><a href="javascript:;" value="3">DANANG GOLF CLUB</a></li>
                                                <li><a href="javascript:;" value="4">BRG KINGS’ ISLAND GOLF RESORT</a></li>
                                                <li><a href="javascript:;" value="5">DANANG GOLF CLUB</a></li>

                                            </ul>
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                       <label class="checkgroup regcheck active" id="publicm"><input class="" type="checkbox"><img src="<?php echo get_template_directory_uri(). '/images/iconcheckgreen.png'?>"> <span> <?php _e(' PUBLIC MEMBER', 'nisarg') ?></span>
                                        </label>
                                    </div>
                                    <div class="col-sm-4">
                                         <label class="checkgroup regcheck active" id="associationm"><input class="" type="checkbox"><img  src="<?php echo get_template_directory_uri(). '/images/iconcheckgreen.png'?>"> <span><?php _e('ASSOCIATION MEMBER', 'nisarg') ?></span></span>
                                        </label>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="form-user-address">
                                <h2 class="form-header"><span class="step">2</span><?php _e('Address Detail (preferred delivery)', 'nisarg') ?></h2>
                                <div class="inner-100">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                      <input type="text" name="address" class="form-control"  placeholder="<?php _e('Address / Unit', 'nisarg') ?>"required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                      <input type="text" name="district" class="form-control"  placeholder="<?php _e('District', 'nisarg') ?>"required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                      <input type="text" name="province" class="form-control"  placeholder="<?php _e('Province', 'nisarg') ?>"required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                      <input type="text" name="city" class="form-control"  placeholder="<?php _e('City', 'nisarg') ?>"required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4 col-sm-8">
                                      <input type="text" name="date_of_birth" class="form-control"  placeholder="<?php _e('Date Of Birth', 'nisarg') ?>"required>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div><?php _e('Preferred Language', 'nisarg'); ?></div>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="langguage" value="English"> English
                                        </label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" name="langguage" value="Vietnamese"> Vietnamese
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div><?php _e('Gender', 'nisarg'); ?></div>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" id="gender" value="Male" checked> Male
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" id="gender" value="Female"> Female
                                        </label>
                                    </div>
                                </div>
                                 <div class="form-group">
                                      <button class="btn btn-success"><?php _e('ADD ACTUAL FACE PHOTO', 'nisarg') ?></button>
                                    </div>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                        <div class="indicator">Please wait...</div>
                                        <div class="alert result-message"></div>
                                    </div>
                                    <div class="col-sm-16 text-right">
                                        <?php wp_nonce_field('vb_new_user','vb_new_user_nonce', true, true ); ?>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                        <div class="container text-right" id="wrapper-btn-signin">
                            <button type="button" class="btn  pull-left btnaddmore" id="btn-addmore"><i class="fa fa-plus" style="margin-right: 10px;color:#587bf8" aria-hidden="true"></i><?php _e('Add more user', 'nisarg') ?></button>
                            <button type="button" class="btn btn-danger btnpaynow pull-right" id="btn-new-user"><?php _e('Pay Now', 'nisarg') ?></button>
                        </div>
                    </div><!-- .entry-content -->
                </article><!-- #post-## -->
            <?php endwhile; // End of the loop. ?>
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!--.container-->
<?php get_footer(); ?>
