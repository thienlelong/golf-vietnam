<?php
class Meta_Box {

    private $meta_Box;
    private $shortname;

    function Meta_Box($meta_Box){
        global $shortname;

        if (!is_admin()) return;

        $this->meta_Box = $meta_Box;
        $this->shortname = $shortname;

        $currentPage = substr(strrchr($_SERVER['PHP_SELF'], '/'), 1, -4);
        if ($currentPage == 'page' || $currentPage == 'page-new' || $currentPage == 'post' || $currentPage == 'post-new') {
            add_action('admin_head', array(&$this, 'add_post_enctype'));
			add_action('admin_menu', array(&$this, 'add'));
			add_action('save_post', array(&$this, 'save'));
        }
    }

    function add_post_enctype() {
        echo '
		<script type="text/javascript">
		jQuery(document).ready(function(){
			jQuery("#post").attr("enctype", "multipart/form-data");
			jQuery("#post").attr("encoding", "multipart/form-data");
		});
		</script>';
    }

    function add() {
        foreach ($this->meta_Box['pages'] as $page) {
            add_meta_box($this->meta_Box['id'], $this->meta_Box['title'], array(&$this, 'show'), $page, $this->meta_Box['context'], $this->meta_Box['priority']);
        }
    }

    function show() {
        global $post;

        // Use nonce for verification
        echo '<input type="hidden" name="flexicv_meta_box_nonce" value="', wp_create_nonce(basename(__FILE__)), '" />';

        echo '<table class="form-table">';

        foreach ($this->meta_Box['fields'] as $field) {

            $meta = get_post_meta($post->ID, $field['id'], true);

            echo '<tr>',
            '<th style="width:20%"><label for="', $field['id'], '">', $field['name'], '</label></th>',
            '<td>';
            switch ($field['type']) {

                case 'text':
                    echo '<input type="text" name="', $field['id'], '" id="', $field['id'], '" value="', $meta ? $meta : (isset($field['std'])? $field['std']:''), '" size="30" style="width:97%" />',
                    '<br />', $field['desc'];
                break;

                case 'textarea':
					$content = $meta ? $meta : $field['std'];
					$rows = $field['rows'] ? $field['rows'] : 10;
					wp_editor( $content, $field['id'], array('textarea_rows'=>$rows) );
					echo '<br />', $field['desc'];
                break;

                case 'select':
                    echo '<select name="', $field['id'], '" id="', $field['id'], '">';
                    foreach ($field['options'] as $value => $option) {
                        echo '<option value="'. $value .'"', $meta == $value ? ' selected="selected"' : '', '>', $option, '</option>';
                    }
                    echo '</select>';
                break;

                case 'radio':
                    foreach ($field['options'] as $option) {
                        echo '<input type="radio" name="', $field['id'], '" value="', $option['value'], '"', $meta == $option['value'] ? ' checked="checked"' : '', ' />', $option['name'];
                    }
                break;

                case 'button-gps':
                    echo '<input id="glocal_convert_gps" type="button" value="Convert address to GPS coordinates" onclick="initialize(); " style="float:left;"/><label id="glocal_convert_gps_log" style="float:left; margin-left: 20px;">Put the Button</label>';
                    echo '<div id="map_canvas" style="clear:both; width:800px; height:400px"></div>';
                break;

                case 'radio_icons': ?>
                    <div style="margin: 0;padding: 10px 3px 10px 3px; background: #ccc;">
                        <?php
                            $i=3;
                            foreach ($field['options'] as $option) {
                                echo '<span style="float: left; display: inline-block;margin: 0px 2% 5px 0px;width: 30%;vertical-align: top;text-align:left;"><span style="margin-right: 4px; vertical-align:top;padding-top: 5px;display: inline-block;"><input type="radio" name="', $field['id'], '" value="', $option, '"', $meta == $option ? ' checked="checked"' : '', '>', '' ,'</span>', '<img src="' . get_template_directory_uri() . '/icons/' . $option, '" alt=""><span style="margin-left: 4px; vertical-align:top;padding-top: 5px;display: inline-block;">',get_icons_name($option) ,'</span></span>';
                                $i++;
                                if (($i%3)==0)
                                    echo '<div style="clear:both"></div>';
                            }
                        ?>
                        <div style="clear:both"></div>
                    </div>
                <?php
                break;

                case 'checkbox':
                    echo '<input type="checkbox" name="', $field['id'], '" id="', $field['id'], '"', $meta ? ' checked="checked"' : '', ' />';
                break;

                case 'file':
                    echo $meta ? "$meta<br />" : '', '<input type="file" name="', $field['id'], '" id="', $field['id'], '" />',
                    '<br />', $field['desc'];
                break;

                case 'image':
                    echo $meta ? "<img src=\"$meta\" width=\"150\" height=\"150\" /><br />$meta<br />" : '', '<input type="file" name="', $field['id'], '" id="', $field['id'], '" />',
                    '<br />', $field['desc'];
                break;
            }
            echo 	'<td>',
            '</tr>';
        }

        echo '</table>';
    }

    function save($post_id) {
        // verify nonce
        $new = null;
        if (isset($_POST['flexicv_meta_box_nonce']))
            if (!wp_verify_nonce($_POST['flexicv_meta_box_nonce'], basename(__FILE__))) {
                return $post_id;
            }

        // check autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            return $post_id;
        }

        // check permissions
        $new = null;
        if (isset( $_POST['post_type']) )
            if ('page' == $_POST['post_type']) {
                if (!current_user_can('edit_page', $post_id)) {
                    return $post_id;
                }
            } elseif (!current_user_can('edit_post', $post_id)) {
                return $post_id;
            }

        foreach ($this->meta_Box['fields'] as $field) {
            $name = $field['id'];

            $old = get_post_meta($post_id, $name, true);
            if (isset($_POST[$field['id']]) )
                $new = $_POST[$field['id']];

            if ($field['type'] == 'file' || $field['type'] == 'image') {
                $file = wp_handle_upload($_FILES[$name], array('test_form' => false));
                $new = $file['url'];
            }

            if ($new && $new != $old) {
                update_post_meta($post_id, $name, $new);
            } elseif ('' == $new && $old && $field['type'] != 'file' && $field['type'] != 'image') {
                delete_post_meta($post_id, $name, $old);
            }
        }
    }
}

$prefix = 'golf_clubs_';
$metaBoxes[] = array(
	'id' => 'golf_clubs_custom',
    'title' => __('Golf Club Info', 'moonation'),
    'pages' => array('golf_clubs'),
    'context' => 'normal',
    'priority' => 'low',
    'fields' => array(
		array(
            'name' => __('Golf Club Website', 'moonation'),
            'id' => $prefix . 'club_website',
            'type' => 'text',
            'desc' => ''
		),
        array(
            'name' => __('Golf Club Logo', 'moonation'),
            'id' => $prefix . 'club_logo',
            'type' => 'image',
            'desc' => ''
        ),
        array(
            'name' => __('Password', 'moonation'),
            'id' => $prefix . 'club_password',
            'type' => 'text',
            'desc' => ''
        ),

	)
);

// print options company add/edit
if($metaBoxes) { foreach ($metaBoxes as $metaBox){
    $box = new Meta_Box($metaBox);
}}

$prefix = 'proud_partners_';
$metaBoxesPartners[] = array(
    'id' => 'proud_partners_custom',
    'title' => __('Proud Partners Info', 'moonation'),
    'pages' => array('proud_partners'),
    'context' => 'normal',
    'priority' => 'low',
    'fields' => array(
        array(
            'name' => __('Proud Partners Website', 'moonation'),
            'id' => $prefix . 'website',
            'type' => 'text',
            'desc' => ''
        ),
        array(
            'name' => __('Proud Partners Logo', 'moonation'),
            'id' => $prefix . 'logo',
            'type' => 'image',
            'desc' => ''
        ),
    )
);

// print options company add/edit
if($metaBoxesPartners) { foreach ($metaBoxesPartners as $metaBoxesPartner){
    $box = new Meta_Box($metaBoxesPartner);
}}

$prefix = 'members_';
$metaBoxesMembers[] = array(
    'id' => 'members_custom',
    'title' => __('Members Info', 'moonation'),
    'pages' => array('members'),
    'context' => 'normal',
    'priority' => 'low',
    'fields' => array(
        array(
            'name' => __('Members Image', 'moonation'),
            'id' => $prefix . 'image',
            'type' => 'image',
            'desc' => ''
        ),
    )
);

// print options company add/edit
if($metaBoxesMembers) { foreach ($metaBoxesMembers as $metaBoxesMember){
    $box = new Meta_Box($metaBoxesMember);
}}

$prefix = 'advertisements_';
$metaBoxesAdvertisements[] = array(
    'id' => 'advertisements_custom',
    'title' => __('Advertisement Info', 'moonation'),
    'pages' => array('advertisements'),
    'context' => 'normal',
    'priority' => 'low',
    'fields' => array(
        array(
            'name' => __('Url', 'moonation'),
            'id' => $prefix . 'url',
            'type' => 'text',
            'desc' => ''
        ),
        array(
            'name' => __('Banner', 'moonation'),
            'id' => $prefix . 'banner',
            'type' => 'image',
            'desc' => ''
        ),
    )
);

// print options company add/edit
if($metaBoxesAdvertisements) {
    foreach ($metaBoxesAdvertisements as $metaBoxesAdvertisement){
        $box = new Meta_Box($metaBoxesAdvertisement);
    }
}
?>