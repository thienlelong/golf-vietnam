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
                    <div class="">
                        <form class="form-horizontal registerUserForm register-form" id="registerUserForm0">
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
                                      <input type="email" name="user_email" class="form-control"  placeholder="<?php _e('Email', 'nisarg') ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                      <input type="password" name="password" class="form-control"  placeholder="<?php _e('Login Password', 'nisarg') ?>" required>
                                    </div>
                                    <div class="col-sm-6">
                                      <input type="password" name="password2" class="form-control"  placeholder="<?php _e('Confirm Login Password', 'nisarg') ?>" required>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <span class="col-sm-6 col-md-6 labelicon"><?php _e('Choose one of following:', 'nisarg')?></span>
                                 </div>
                                <div class="form-group">
                                    <div class="col-sm-4">
                                        <div class="golf_club">
                                            <label class="club-member btn-radius checkbox-golf-club" >
                                                <img src="<?php bloginfo('template_directory'); ?>/images/icon-checkgreen.png" alt="">
                                                <input type="radio" name="golf_club" value="" id="clubMember" class="css-checkbox" />
                                                <label for="clubMember" class="css-label"><?php _e('CLUB MEMBER', 'nisarg') ?></label>
                                            </label>
                                            <ul class="golf-club-list">
                                                <li data-clubId="1">BRG KINGS’ ISLAND GOLF RESORT</li>
                                                <li data-clubId="2">DANANG GOLF CLUB</li>
                                                <li data-clubId="3">BRG KINGS’ ISLAND GOLF RESORT</li>
                                                <li data-clubId="4">DANANG GOLF CLUB</li>
                                                <li data-clubId="5">BRG KINGS’ ISLAND GOLF RESORT</li>
                                                <li data-clubId="5">DANANG GOLF CLUB</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="golf_club">
                                            <label class="public-member btn-radius checkbox-golf-club">
                                                <img src="<?php bloginfo('template_directory'); ?>/images/icon-checkgreen.png" alt="">
                                                <input type="radio" name="golf_club" value="" id="publicMember" class="css-checkbox" />
                                                <label for="publicMember" class="css-label"><?php _e('PUBLIC MEMBER', 'nisarg') ?></label>
                                            </label>
                                            <ul class="golf-club-list">
                                                <li data-clubId="1">BRG KINGS’ ISLAND GOLF RESORT</li>
                                                <li data-clubId="2">DANANG GOLF CLUB</li>
                                                <li data-clubId="3">BRG KINGS’ ISLAND GOLF RESORT</li>
                                                <li data-clubId="4">DANANG GOLF CLUB</li>
                                                <li data-clubId="5">BRG KINGS’ ISLAND GOLF RESORT</li>
                                                <li data-clubId="5">DANANG GOLF CLUB</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="golf_club">
                                            <label class="association-member btn-radius checkbox-golf-club">
                                                <img src="<?php bloginfo('template_directory'); ?>/images/icon-checkgreen.png" alt="">
                                                <input type="radio" name="golf_club" value="" id="associationMember" class="css-checkbox" />
                                                <label for="associationMember" class="css-label"><?php _e('ASSOCIATION MEMBER', 'nisarg') ?></label>
                                            </label>
                                            <ul class="golf-club-list">
                                                <li data-clubId="1">BRG KINGS’ ISLAND GOLF RESORT</li>
                                                <li data-clubId="2">DANANG GOLF CLUB</li>
                                                <li data-clubId="3">BRG KINGS’ ISLAND GOLF RESORT</li>
                                                <li data-clubId="4">DANANG GOLF CLUB</li>
                                                <li data-clubId="5">BRG KINGS’ ISLAND GOLF RESORT</li>
                                                <li data-clubId="5">DANANG GOLF CLUB</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            <div class="form-user-address">
                                <h2 class="form-header"><span class="step">2</span><?php _e('Address Detail (preferred delivery)', 'nisarg') ?></h2>
                                <div class="inner-100">
                                <div class="form-group">
                                    <div class="col-sm-12">
                                      <input type="text" name="address" class="form-control"  placeholder="<?php _e('Address / Unit', 'nisarg') ?>"  >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                      <input type="text" name="district" class="form-control"  placeholder="<?php _e('District', 'nisarg') ?>"  >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                      <input type="text" name="province" class="form-control"  placeholder="<?php _e('Province', 'nisarg') ?>"  >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                      <input type="text" name="city" class="form-control"  placeholder="<?php _e('City', 'nisarg') ?>"  >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4 col-sm-8">
                                      <input type="text" name="date_of_birth" class="date-of-birth form-control"  placeholder="<?php _e('Date Of Birth', 'nisarg') ?>"  >
                                    </div>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="label-checkbox" ><?php _e('Preferred Language', 'nisarg'); ?></div>
                                        <label class="radio-inline">
                                            <input type="checkbox" name="langguage" id="english" class="css-checkbox" value="English" />
                                            <label for="english" class="css-label">English</label>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="checkbox" name="langguage" id="vietnamese" class="css-checkbox" value="Vietnamese" />
                                            <label for="vietnamese" class="css-label">Vietnamese</label>
                                        </label>
                                    </div>
                                    <div class="col-md-4 col-sm-6 gender">
                                        <div class="label-checkbox"> <?php _e('Gender', 'nisarg'); ?></div>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" id="male" checked value="Male" class="css-checkbox" />
                                            <label for="male" class="css-label">Male</label>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" id="female" value="Female" class="css-checkbox" />
                                            <label for="female" class="css-label">Female</label>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12">
                                        <div class="avatarUpload btn btn-radius btn-lg-13">
                                            <span><?php _e('ADD ACTUAL FACE PHOTO', 'nisarg') ?></span>
                                            <input  type="file" class="file_avatar upload" name="actual_img"> </input>
                                        </div>
                                        <canvas class="canvas_avatar"  width="60" height="80"></canvas>
                                        <span class="used-for"><?php _e('Used For Membership Card', 'nisarg');?></span>
                                        <div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="hidden" name="form_id" value="registerUserForm0" />
                                        <div class="alert alert-warning result-message" role="alert">
                                            <div id="emailExist">
                                               <strong>Warning!</strong> <?php _e('An account already exists for this email address', 'nisarg'); ?>.
                                            </div>
                                          <!--  <div id="fieldRequired">
                                              <strong>Warning!</strong> <?php _e('An account already exists for this email address', 'nisarg'); ?>.
                                          </div> -->
                                        </div>
                                    </div>
                                    <div class="col-sm-12 text-right">
                                        <?php wp_nonce_field('vb_new_user','vb_new_user_nonce', true, true ); ?>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </form>
                        <div class="text-right wrapper-btn-signin">
                            <button type="button" onclick="return false;" class="btn  btn-radius btn-addmore btn-lg-13 pull-left" id="btn-addmore"><i class="fa fa-plus" aria-hidden="true"></i><?php _e('Add more user', 'nisarg') ?></button>
                            <button type="button" onclick="return false;" class="btn btn-radius bg-red btn-lg btn-large" id="btn-new-user"><?php _e('Pay Now', 'nisarg') ?></button>
                        </div>
                    </div><!-- .entry-content -->
                </article><!-- #post-## -->
            <?php endwhile; // End of the loop. ?>
        </main><!-- #main -->
    </div><!-- #primary -->
</div><!--.container-->
<script type="text/javascript">
    jQuery( document ).ready(function($) {
        $('#registerUserForm0 input[name="golf_club"').click(function() {
            $('#registerUserForm0 .checkbox-golf-club').removeClass("active");
            $('#registerUserForm0 .golf-club-list').css("display", "none");
            $('#associationMember + label').html('Association Member');
            $('#publicMember + label').html('Public Member');
            $('#clubMember + label').html('Club Member');

            if(this.checked) {
                $(this).parent().addClass("active");
                $('#registerUserForm0 .active + .golf-club-list').css("display", "block");
            }
        });
        $("#registerUserForm0 .golf-club-list li").on('click', function(event){
            var clubId = $(this).attr("data-clubId");
            $('#registerUserForm0 .golf-club-list').css("display", "none");
            $('#registerUserForm0 input[name=golf_club]:checked').val(clubId);
            $('#registerUserForm0 input[name=golf_club]:checked + label').html($(this).html());
        });
    });
</script>
<?php get_footer(); ?>