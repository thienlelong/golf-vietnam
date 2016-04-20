<?php
/*
 * Template Name: Register
 **/
 get_header();
?>


<div id="content">
<?php if(have_posts()) : the_post(); ?>
    <form class="form-horizontal registerUserForm" id="registerUserForm0">
        <div class="form-user-info container">
            <h2 class="form-header"><?php _e('Basic Information', 'nisarg') ?></h2>
            <div class="form-group">
                <div class="col-sm-4">
                  <input type="text" name="first_name" class="form-control"  placeholder="<?php _e('First Name', 'nisarg') ?>">
                </div>
                <div class="col-sm-4">
                  <input type="text" name="middle_name" class="form-control"  placeholder="<?php _e('Middle Name', 'nisarg') ?>">
                </div>
                <div class="col-sm-4">
                  <input type="text" name="last_name" class="form-control"  placeholder="<?php _e('Last Name', 'nisarg') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                  <input type="text" name="user_email" class="form-control"  placeholder="<?php _e('First Name', 'nisarg') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-6">
                  <input type="password" name="password" class="form-control"  placeholder="<?php _e('Login Password', 'nisarg') ?>">
                </div>
                <div class="col-sm-6">
                  <input type="password" name="password2" class="form-control"  placeholder="<?php _e('Confirm Login Password', 'nisarg') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                    <select class="form-control" name="club_member">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <select class="form-control" name="public_member">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <select class="form-control" name="association_member">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
            </div>
        </div>
        <div class="form-user-address container">
            <h2 class="form-header"><?php _e('Address Detail (preferred delivery)', 'nisarg') ?></h2>
            <div class="form-group">
                <div class="col-sm-12">
                  <input type="text" name="address" class="form-control"  placeholder="<?php _e('Address / Unit', 'nisarg') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                  <input type="text" name="district" class="form-control"  placeholder="<?php _e('District', 'nisarg') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                  <input type="text" name="province" class="form-control"  placeholder="<?php _e('Province', 'nisarg') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-12">
                  <input type="text" name="city" class="form-control"  placeholder="<?php _e('City', 'nisarg') ?>">
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-4">
                  <input type="text" name="first_name" class="form-control"  placeholder="<?php _e('First Name', 'nisarg') ?>">
                </div>
                <div class="col-sm-4">
                    <div><?php _e('Preferred Language', 'nisarg'); ?></div>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="langguage" value="English"> English
                    </label>
                    <label class="checkbox-inline">
                        <input type="checkbox" name="langguage" value="Vietnamese"> Vietnamese
                    </label>
                </div>
                <div class="col-sm-4">
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
                <div class="col-sm-6">
                    <div class="indicator">Please wait...</div>
                    <div class="alert result-message"></div>
                </div>
                <div class="col-sm-16 text-right">
                    <?php wp_nonce_field('vb_new_user','vb_new_user_nonce', true, true ); ?>
                </div>
            </div>
        </div>
    </form>
    <div class="container text-right" id="wrapper-btn-signin">
        <button type="button" class="btn btn-default" id="btn-addmore">Add more</button>
        <button type="button" class="btn btn-default" id="btn-new-user">Sign in</button>
    </div>
<?php endif; ?>
</div>
<?php get_footer(); ?>
