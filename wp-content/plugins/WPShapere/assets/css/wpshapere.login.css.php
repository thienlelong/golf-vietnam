<?php
header('Content-type: text/css');
$login_bg_img = $this->get_wps_option('login_bg_img');
$admin_login_logo = $this->get_wps_option('admin_login_logo');
$login_background = $this->get_wps_image_url($login_bg_img);
$login_logo = $this->get_wps_image_url($admin_login_logo);

?>
body, html { height: auto; }
body.login{background-color:<?php echo $this->get_wps_option('login_bg_color') . ' !important;'; if(!empty($login_bg_img)) echo ' background-image: url(' . $login_background  . ');'; if($this->get_wps_option('login_bg_img_repeat') === true) echo 'background-repeat: repeat'; else echo 'background-repeat: no-repeat'; ?>; background-position: center center; <?php if($this->get_wps_option('login_bg_img_scale')) echo 'background-size: 100% auto;'; ?> background-attachment: fixed; margin:0; padding:1px; top: 0; right: 0; bottom: 0; left: 0; }
html, body.login:after { display: block; clear: both; }
body.login-action-register { position: relative }
body.login-action-login, body.login-action-lostpassword { position: fixed }
.login h1 a { 
<?php if(!empty($login_logo)) { ?>
width: 100%;
background: url(<?php echo $login_logo; ?>) center center no-repeat; 
<?php if($this->get_wps_option('admin_logo_resize')) { ?>
background-size: <?php echo $this->get_wps_option('admin_logo_size_percent'); ?>%;	
<?php }
} ?>
height:<?php echo $this->get_wps_option('admin_logo_height'); ?>px; margin: 0 auto 20px; }
div#login { background: <?php if($this->get_wps_option('login_divbg_transparent') === true) echo 'transparent'; else echo $this->get_wps_option('login_divbg_color'); ?>; margin-top: <?php echo $this->get_wps_option('login_form_margintop'); ?>px; padding: 18px 0 }
body.interim-login div#login {width: 95% !important; height: auto }
.login label, .login form, .login form p { color: <?php echo $this->get_wps_option('form_text_color'); ?> !important }
.login a { text-decoration: underline; color: <?php echo $this->get_wps_option('form_link_color'); ?> !important }
.login a:focus, .login a:hover { color: <?php echo $this->get_wps_option('form_link_hover_color'); ?> !important; }
.login form { background: <?php if($this->get_wps_option('login_divbg_transparent') === true) echo 'transparent'; else echo $this->get_wps_option('login_formbg_color'); ?> !important; -webkit-box-shadow: none; -moz-box-shadow: none; box-shadow: none;<?php if($this->get_wps_option('login_divbg_transparent') !== true) echo 'border-bottom: 1px solid ' .$this->get_wps_option('form_border_color') . ';'; if($this->get_wps_option('login_divbg_transparent') === true) echo  'padding: 26px 0px 30px !important'; else echo 'padding: 26px 24px 30px !important'; ?> }
form#loginform .button-primary, form#registerform .button-primary, .button-primary { background:<?php echo $this->get_wps_option('pry_button_color'); ?> !important; border-color:<?php echo $this->get_wps_option('pry_button_border_color'); ?> !important; color: <?php echo $this->get_wps_option('pry_button_text_color'); ?> !important;}
form#loginform .button-primary.focus,form#loginform .button-primary.hover,form#loginform .button-primary:focus,form#loginform .button-primary:hover, form#registerform .button-primary.focus, form#registerform .button-primary.hover,form#registerform .button-primary:focus,form#registerform .button-primary:hover { background: <?php echo $this->get_wps_option('pry_button_hover_color'); ?> !important;border-color:<?php echo $this->get_wps_option('pry_button_hover_border_color'); ?> !important; }
<?php if($this->get_wps_option('login_divbg_transparent') === true) { ?>.login #backtoblog, .login #nav { margin : 0; padding: 0 } .login form { padding-top: 2px !important}<?php } ?>
.login form input.input { background: #fff url(<?php echo WPSHAPERE_DIR_URI; ?>assets/images/login-sprite.png) no-repeat; padding: 9px 0 9px 32px !important; font-size: 16px !important; line-height: 1; outline: none !important; border: none !important }
input#user_login { background-position:7px -6px !important; }
input#user_pass, input#user_email, input#pass1, input#pass2 { background-position:7px -56px !important; }
.login form #wp-submit { width: 100%; height: 35px }
p.forgetmenot { margin-bottom: 16px !important; }
.login #pass-strength-result {margin: 12px 0 16px !important }
p.indicator-hint { clear:both }

.login_footer_content { padding: 20px 0; text-align:center }
<?php if($this->get_wps_option('hide_backtoblog') === true) echo '#backtoblog { display:none !important; }'; 
if($this->get_wps_option('hide_remember') === true) echo 'p.forgetmenot { display:none !important; }'; 
if($this->get_wps_option('design_type') == 1) {
?>
.login .message, .button-primary { 
	-webkit-box-shadow: none !important;
	-moz-box-shadow: none !important;
	box-shadow: none !important;
}
.button-primary {
	border: none;
}

<?php } //end of design_type

echo $this->get_wps_option('login_custom_css'); ?>

@media only screen and (min-width: 800px) {
	div#login {
		width: <?php echo $this->get_wps_option('login_form_width'); ?>% !important;
	}
}
@media screen and (max-width: 800px){
	div#login {
		width: 90% !important;
	}
	body.login {
		background-size: auto;
	}
	body.login-action-login, body.login-action-lostpassword { 
		position: relative; 
	}
}
