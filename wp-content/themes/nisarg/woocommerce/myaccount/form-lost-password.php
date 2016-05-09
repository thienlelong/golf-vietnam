<?php
/**
 * Lost password form
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/myaccount/form-lost-password.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author  WooThemes
 * @package WooCommerce/Templates
 * @version 2.3.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

?>

<?php wc_print_notices(); ?>

<form method="post" class="lost_reset_password">

	<?php if( 'lost_password' === $args['form'] ) : ?>
		<h2 class="page-title">Password Reset</h2>
		<p><?php echo apply_filters( 'woocommerce_lost_password_message', __( 'If you have forgotten your password or username, enter your email address below and you will receive an email that will provide you with your username and a link to reset your password.', 'woocommerce' ) ); ?></p>

		<div class="form-row reset_password"><input class="btn-radius" type="text" name="user_login" id="user_login" placeholder="<?php _e( 'Your Email', 'woocommerce' ); ?>" />
		<?php do_action( 'woocommerce_lostpassword_form' ); ?>
		<input type="hidden" name="wc_reset_password" value="true" />
		<input type="submit" class=" btn btn-radius btn-lg" value="<?php echo 'lost_password' === $args['form'] ? __( 'Submit', 'woocommerce' ) : __( 'Save', 'woocommerce' ); ?>" />
		</div>
	<?php endif; ?>
	<?php wp_nonce_field( $args['form'] ); ?>

</form>
