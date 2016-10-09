<?php
/**
 * Login Form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-login.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.6
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<?php do_action( 'woocommerce_before_customer_login_form' ); ?>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

<div class="col2-set" id="customer_login">

	<div class="col-1">

<?php endif; ?>
		<div class="row">
			<div class="col-md-5">
				<form method="post" class="login">

					<?php do_action( 'woocommerce_login_form_start' ); ?>

					<p class="form-row form-row-wide">

						<?php if(pll_current_language('locale') =='vi'): ?>
							<input type="text" class="input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" placeholder="<?php _e( 'Địa Chỉ Email hoặc User ID', 'woocommerce' ); ?>" />
						<?php else: ?>
							<input type="text" class="input-text" name="username" id="username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" placeholder="<?php _e( 'Email Address or User ID', 'woocommerce' ); ?>" />
						<?php endif; ?>
					</p>
					<p class="form-row form-row-wide">
						<?php if(pll_current_language('locale') =='vi'): ?>
							<input class="input-text" type="password" name="password" id="password" placeholder="<?php _e( 'Mật Khẩu', 'woocommerce' ); ?>" />
						<?php else: ?>
							<input class="input-text" type="password" name="password" id="password" placeholder="<?php _e( 'Password', 'woocommerce' ); ?>" />
						<?php endif; ?>
					</p>

					<?php do_action( 'woocommerce_login_form' ); ?>

					<p class="form-row">
						<?php wp_nonce_field( 'woocommerce-login' ); ?>
						<?php if(pll_current_language('locale') =='vi'): ?>
							<input type="submit" class="btn btn-radius btn-lg-13" name="login" value="<?php esc_attr_e( 'Đăng Nhập', 'woocommerce' ); ?>" />
						<?php else: ?>
							<input type="submit" class="btn btn-radius btn-lg-13" name="login" value="<?php esc_attr_e( 'Login', 'woocommerce' ); ?>" />
						<?php endif; ?>

						<!-- <label for="rememberme" class="inline">
							<input name="rememberme" type="checkbox" id="rememberme" value="forever" /> <?php _e( 'Remember me', 'woocommerce' ); ?>
						</label> -->
					</p>
					<p class="lost_password">
					<?php if(pll_current_language('locale') !='vi'): ?>
						<a href="<?php echo esc_url( wp_lostpassword_url() ); ?>"><?php _e( 'Forgot your password or username?', 'woocommerce' ); ?></a>
					<?php else: ?>
						<a href="<?php echo site_url( 'dang-nhap/lost-password' ); ?>"><?php _e( 'Quên mật khẩu hoặc tài khoản đăng nhập?', 'woocommerce' ); ?></a>
					<?php endif; ?>
					</p>

					<?php do_action( 'woocommerce_login_form_end' ); ?>

				</form>
				<div class="member-card">
					 <?php
            if(function_exists( 'ot_get_option' )) : echo '<img src="'. ot_get_option('member_card', get_bloginfo('template_directory') . '/images/headers/member-card.png') .'" alt="" />'; endif;
          ?>
				</div>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-6">
				<div class="join-now-banner">
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
		</div>

<?php if ( get_option( 'woocommerce_enable_myaccount_registration' ) === 'yes' ) : ?>

	</div>

	<div class="col-2">

		<h2><?php _e( 'Register', 'woocommerce' ); ?></h2>

		<form method="post" class="register">

			<?php do_action( 'woocommerce_register_form_start' ); ?>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_username' ) ) : ?>

				<p class="form-row form-row-wide">
					<label for="reg_username"><?php _e( 'Username', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="text" class="input-text" name="username" id="reg_username" value="<?php if ( ! empty( $_POST['username'] ) ) echo esc_attr( $_POST['username'] ); ?>" />
				</p>

			<?php endif; ?>

			<p class="form-row form-row-wide">
				<label for="reg_email"><?php _e( 'Email address', 'woocommerce' ); ?> <span class="required">*</span></label>
				<input type="email" class="input-text" name="email" id="reg_email" value="<?php if ( ! empty( $_POST['email'] ) ) echo esc_attr( $_POST['email'] ); ?>" />
			</p>

			<?php if ( 'no' === get_option( 'woocommerce_registration_generate_password' ) ) : ?>

				<p class="form-row form-row-wide">
					<label for="reg_password"><?php _e( 'Password', 'woocommerce' ); ?> <span class="required">*</span></label>
					<input type="password" class="input-text" name="password" id="reg_password" />
				</p>

			<?php endif; ?>

			<!-- Spam Trap -->
			<div style="<?php echo ( ( is_rtl() ) ? 'right' : 'left' ); ?>: -999em; position: absolute;"><label for="trap"><?php _e( 'Anti-spam', 'woocommerce' ); ?></label><input type="text" name="email_2" id="trap" tabindex="-1" /></div>

			<?php do_action( 'woocommerce_register_form' ); ?>
			<?php do_action( 'register_form' ); ?>

			<p class="form-row">
				<?php wp_nonce_field( 'woocommerce-register' ); ?>
				<input type="submit" class="button" name="register" value="<?php esc_attr_e( 'Register', 'woocommerce' ); ?>" />
			</p>

			<?php do_action( 'woocommerce_register_form_end' ); ?>

		</form>

	</div>

</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_customer_login_form' ); ?>
