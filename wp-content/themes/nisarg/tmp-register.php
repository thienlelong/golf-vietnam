<?php
/*
 * Template Name: Register
 **/
 get_header();
?>
<?php
  if($_GET["MID"]) {
    $MID = $_GET["MID"];
    $user = get_userdatabylogin($MID);
    if($user) {
        if(pll_current_language('locale')!='vi') {
            $redirect  =  site_url("payment").'?uid='. $user->ID . '&lost_card=true';
        }
        else{
            $redirect  =  site_url('thanh-toan').'?uid='. $user->ID . '&lost_card=true';
        }
        ?>
        <script type="text/javascript">
            window.location.href =  '<?php echo $redirect;?>';
        </script>
        <?php
    }
  }

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
                                      <input type="text" name="middle_name" class="form-control"  placeholder="<?php _e('Middle Name', 'nisarg') ?> ">
                                    </div>
                                    <div class="col-sm-4">
                                      <input type="text" name="last_name" class="form-control"  placeholder="<?php _e('Last Name', 'nisarg') ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                      <input type="email" name="user_email" class="form-control"  placeholder="<?php _e('Email', 'nisarg') ?>" required>
                                    </div>
                                    <div class="col-sm-6">
                                      <input type="tel" name="user_phone" class="form-control"  placeholder="<?php _e('Phone', 'nisarg') ?>" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-6">
                                      <input type="password" name="password" class="form-control" id='password' placeholder="<?php _e('Login Password', 'nisarg') ?>" required>
                                    </div>
                                    <div class="col-sm-6">
                                      <input type="password" name="password2" class="form-control"  placeholder="<?php _e('Confirm Login Password', 'nisarg') ?>" required>
                                    </div>
                                </div>
                                 <div class="form-group">
                                    <span class="col-sm-6 col-md-6 labelicon"><?php _e('Choose one of following:', 'nisarg')?></span>
                                 </div>
                                <div class="form-group">
                                    <div class="col-sm-3">
                                        <div class="golf_club">
                                            <label class="club-member btn-radius checkbox-golf-club" >
                                                <img src="<?php bloginfo('template_directory'); ?>/images/icon-checkgreen.png" alt="">
                                                <input type="radio" name="golf_club" value="" id="clubMember" class="css-checkbox club-member" />
                                                <label for="clubMember" class="css-label"><?php _e('CLUB MEMBER', 'nisarg') ?></label>
                                            </label>
                                            <ul class="club-member golf-club-list">
                                            <?php
                                            $wp_query = new WP_Query(array(
                                                'post_type' => 'golf_clubs',
                                                'posts_per_page' => -1,
                                                'order' => 'ASC',
                                                'orderby' => 'title',
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'clubs-category',
                                                        'field' => 'slug',
                                                        'terms' => array('club-member')
                                                    )
                                                )
                                            ));
                                            if($wp_query->have_posts()) :
                                            ?>
                                                <?php while($wp_query->have_posts()) : $wp_query->the_post(); $key++;
                                                ?>
                                                <li data-clubId="<?php echo $post->ID; ?>"><?php the_title(); ?></li>
                                                <?php endwhile; ?>
                                            <?php endif; wp_reset_query(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="golf_club">
                                            <label class="public-member btn-radius checkbox-golf-club">
                                                <img src="<?php bloginfo('template_directory'); ?>/images/icon-checkgreen.png" alt="">
                                                <input type="radio" name="golf_club" value="" id="publicMember" class="css-checkbox public-member" />
                                                <label for="publicMember" class="css-label"><?php _e('PUBLIC MEMBER', 'nisarg') ?></label>
                                            </label>
                                            <ul class="public-member golf-club-list">
                                                 <?php
                                            $wp_query = new WP_Query(array(
                                                'post_type' => 'golf_clubs',
                                                'posts_per_page' => -1,
                                                'order' => 'ASC',
                                                'orderby' => 'title',
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'clubs-category',
                                                        'field' => 'slug',
                                                        'terms' => array('public-member')
                                                    )
                                                )
                                            ));
                                            if($wp_query->have_posts()) :
                                            ?>
                                                <?php while($wp_query->have_posts()) : $wp_query->the_post(); $key++;
                                                ?>
                                                <li data-clubId="<?php echo $post->ID; ?>"><?php the_title(); ?></li>
                                                <?php endwhile; ?>
                                            <?php endif; wp_reset_query(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="golf_club">
                                            <label class="association-member btn-radius checkbox-golf-club">
                                                <img src="<?php bloginfo('template_directory'); ?>/images/icon-checkgreen.png" alt="">
                                                <input type="radio" name="golf_club" value="" id="associationMember" class="css-checkbox association-member" />
                                                <label for="associationMember" class="css-label"><?php _e('ASSOCIATION MEMBER', 'nisarg') ?></label>
                                            </label>
                                            <ul class="association-member golf-club-list">
                                            <?php
                                            $wp_query = new WP_Query(array(
                                                'post_type' => 'golf_clubs',
                                                'posts_per_page' => -1,
                                                'order' => 'ASC',
                                                'orderby' => 'title',
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'clubs-category',
                                                        'field' => 'slug',
                                                        'terms' => array('association-member')
                                                    )
                                                )
                                            ));
                                            if($wp_query->have_posts()) :
                                            ?>
                                                <?php while($wp_query->have_posts()) : $wp_query->the_post(); $key++;
                                                ?>
                                                <li data-clubId="<?php echo $post->ID; ?>"><?php the_title(); ?></li>
                                                <?php endwhile; ?>
                                            <?php endif; wp_reset_query(); ?>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-sm-3">
                                        <div class="golf_club">
                                            <label class="caddy-member btn-radius checkbox-golf-club">
                                                <img src="<?php bloginfo('template_directory'); ?>/images/icon-checkgreen.png" alt="">
                                                <input type="radio" name="golf_club" value="" id="caddyMember" class="css-checkbox caddy-member" />
                                                <label for="caddyMember" class="css-label"><?php _e('CADDY CLUBS', 'nisarg') ?></label>
                                            </label>
                                            <ul class="caddy-member golf-club-list">
                                            <?php
                                            $wp_query = new WP_Query(array(
                                                'post_type' => 'golf_clubs',
                                                'posts_per_page' => -1,
                                                'order' => 'ASC',
                                                'orderby' => 'title',
                                                'tax_query' => array(
                                                    array(
                                                        'taxonomy' => 'clubs-category',
                                                        'field' => 'slug',
                                                        'terms' => array('caddy-member')
                                                    )
                                                )
                                            ));
                                            if($wp_query->have_posts()) :
                                            ?>
                                                <?php while($wp_query->have_posts()) : $wp_query->the_post(); $key++;
                                                ?>
                                                <li data-clubId="<?php echo $post->ID; ?>"><?php the_title(); ?></li>
                                                <?php endwhile; ?>
                                            <?php endif; wp_reset_query(); ?>
                                            </ul>
                                        </div>
                                    </div>
                                    <input type="hidden" name="golf_club_id" value="vietcap"/>
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
                                    <!-- <input type="date" name="date_of_birth"
                                      class="date-of-birth form-control"
                                      data-placeholder="Date"
                                      aria-required="true"
                                      required>  -->
                                    <input placeholder="<?php _e(' Date Of Birth', 'nisarg') ?>"
                                        class="date-of-birth form-control"
                                        name="date_of_birth"
                                        type="text"
                                        onfocus="(this.type='date')"
                                        onblur="(this.type='text')" id="date">
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
                                            <label for="male" class="css-label"><?php _e('Male', 'nisarg'); ?></label>
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="gender" id="female" value="Female" class="css-checkbox" />
                                            <label for="female" class="css-label"><?php _e('Female', 'nisarg'); ?></label>
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-12 clearfix">
                                        <div class="avatarUpload btn btn-radius btn-lg-13">
                                            <span><?php _e('ADD ACTUAL FACE PHOTO', 'nisarg') ?></span>
                                            <input  type="file" class="file_avatar upload" name="actual_img"> </input>
                                        </div>
                                        <canvas width="96" height="96" class="canvas_avatar_thumnail"></canvas>
                                        <canvas style="display: none;" class="canvas_avatar"  ></canvas>
                                        <span class="used-for"><?php _e('Used For Membership Card', 'nisarg');?></span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="hidden" name="form_id" value="registerUserForm0" />
                                        <div class="alert alert-warning result-message" role="alert">
                                            <div id="emailExist">
                                                <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                                                <strong>Warning!</strong> <?php _e('An account already exists for this email address', 'nisarg'); ?>.
                                            </div>
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
        $('#registerUserForm0 input[name="golf_club"]').click(function() {
            $('#registerUserForm0 .checkbox-golf-club').removeClass("active");
            $('#registerUserForm0 .golf-club-list').css("display", "none");
            $('#associationMember + label').html('Association Member');
            $('#publicMember + label').html('Public Member');
            $('#clubMember + label').html('Club Member');
            $('#caddyMember + label').html('CADDY CLUBS');

            if(this.checked) {
                $(this).parent().addClass("active");
                $('#registerUserForm0 .active + .golf-club-list').css("display", "block");
            }
        });
        $("#registerUserForm0 .golf-club-list li").on('click', function(event){
            var clubId = $(this).attr("data-clubId");
            $('#registerUserForm0 input[name=golf_club_id]').val(clubId);
            $('#registerUserForm0 .golf-club-list').css("display", "none");
            $('#registerUserForm0 input[name=golf_club]:checked').val($(this).html());
            $('#registerUserForm0 input[name=golf_club]:checked + label').html($(this).html());
        });
    });
</script>
<?php get_footer(); ?>