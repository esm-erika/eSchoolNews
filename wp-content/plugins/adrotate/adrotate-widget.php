<<<<<<< HEAD
<?php
/*-------------------------------------------------------------
 Name:      adrotate_widget_init_1

 Purpose:   Widget for the sidebar
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_widget_init_1() {

	if ( !function_exists('register_sidebar_widget') )
		return;
	if ( !function_exists('adrotate_banner') )
		return;

	function adrotate_widget_1($args) {
		$options = get_option('widget_adrotate_1');
		extract($args);

		/* echo $before_widget . $before_title . $options['title'] . $after_title;
		echo '<ul><li>';*/
			echo adrotate_banner($options['group'], $options['spot'], $options['banner'], $options['block'], $options['column'], false);
		/*echo '</li></ul>';
		echo $after_widget;*/

	}

	function adrotate_widget_control_1() {
		$options = $newoptions = get_option('widget_adrotate_1');
		if ( $_POST['adrotate-submit-1'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['adrotate-title-1']));
			$newoptions['group'] = strip_tags(stripslashes($_POST['adrotate-group-1']));
			
			$newoptions['spot'] = strip_tags(stripslashes($_POST['adrotate-spot-1']));
			$newoptions['block'] = strip_tags(stripslashes($_POST['adrotate-block-1']));
			$newoptions['column'] = strip_tags(stripslashes($_POST['adrotate-column-1']));
			$newoptions['banner'] = strip_tags(stripslashes($_POST['adrotate-banner-1']));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_adrotate_1', $options);
		}
		$title = attribute_escape($options['title']);
		$group = attribute_escape($options['group']);
		$spot = attribute_escape($options['spot']);
		$block = attribute_escape($options['block']);
		$column = attribute_escape($options['column']);
		$banner = attribute_escape($options['banner']);
	?>
			<p>
				<label for="adrotate-title-1">Title: <input class="widefat" id="adrotate-title-1" name="adrotate-title-1" type="text" value="<?php echo $title; ?>" /></label>
				<br />
				<small>HTML will be stripped out.</small>
			</p>
			<p>
				<label for="adrotate-group-1">Group: <input  class="widefat" id="adrotate-group-1" name="adrotate-group-1" type="text" value="<?php echo $group; ?>" /></label>
				<br />
				<small>Group ID.</small>
			</p>
			<p>
				<label for="adrotate-spot-1">Spot: <input  class="widefat" id="adrotate-spot-1" name="adrotate-spot-1" type="text" value="<?php echo $spot; ?>" /></label>
				<br />
				<small>Spot ID.</small>
			</p>
			<p>
				<label for="adrotate-banner-1">Banner (Optional): <input class="widefat" id="adrotate-banner-1" name="adrotate-banner-1" type="text" value="<?php echo $banner; ?>" /></label>
				<br />
				<small>Leave empty for multiple groups or when using a block! Do NOT enter multiple numbers here!</small>
			</p>
			<p>
				<label for="adrotate-block-1">Block (Optional): <input  class="widefat" id="adrotate-block-1" name="adrotate-block-1" type="text" value="<?php echo $block; ?>" /></label>
				<br />
				<small>Sets the amount of banners in a block.</small>
			</p>
			<p>
				<label for="adrotate-column-1">Columns (Optional): <input  class="widefat" id="adrotate-column-1" name="adrotate-column-1" type="text" value="<?php echo $column; ?>" /></label>
				<br />
				<small>Define how many columns your ad-block has.</small>
			</p>
			<input type="hidden" id="adrotate-submit" name="adrotate-submit-1" value="1" />
	<?php
	}


	$widget_ops = array('classname' => 'adrotate_widget_1', 'description' => "Add banners in the sidebar." );
	wp_register_sidebar_widget('AdRotate_1', 'AdRotate 1', 'adrotate_widget_1', $widget_ops);
	wp_register_widget_control('AdRotate_1', 'AdRotate 1', 'adrotate_widget_control_1' );
}
/*-------------------------------------------------------------
 Name:      adrotate_widget_init_2

 Purpose:   Widget for the sidebar
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_widget_init_2() {

	if ( !function_exists('register_sidebar_widget') )
		return;
	if ( !function_exists('adrotate_banner') )
		return;

	function adrotate_widget_2($args) {
		$options = get_option('widget_adrotate_2');
		extract($args);

		/* echo $before_widget . $before_title . $options['title'] . $after_title;
		echo '<ul><li>';*/
			echo adrotate_banner($options['group'], $options['spot'], $options['banner'], $options['block'], $options['column'], false);
		/*echo '</li></ul>';
		echo $after_widget;*/

	}

	function adrotate_widget_control_2() {
		$options = $newoptions = get_option('widget_adrotate_2');
		if ( $_POST['adrotate-submit-2'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['adrotate-title-2']));
			$newoptions['group'] = strip_tags(stripslashes($_POST['adrotate-group-2']));
			
			$newoptions['spot'] = strip_tags(stripslashes($_POST['adrotate-spot-2']));
			$newoptions['block'] = strip_tags(stripslashes($_POST['adrotate-block-2']));
			$newoptions['column'] = strip_tags(stripslashes($_POST['adrotate-column-2']));
			$newoptions['banner'] = strip_tags(stripslashes($_POST['adrotate-banner-2']));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_adrotate_2', $options);
		}
		$title = attribute_escape($options['title']);
		$group = attribute_escape($options['group']);
		$spot = attribute_escape($options['spot']);
		$block = attribute_escape($options['block']);
		$column = attribute_escape($options['column']);
		$banner = attribute_escape($options['banner']);
	?>
			<p>
				<label for="adrotate-title-2">Title: <input class="widefat" id="adrotate-title-2" name="adrotate-title-2" type="text" value="<?php echo $title; ?>" /></label>
				<br />
				<small>HTML will be stripped out.</small>
			</p>
			<p>
				<label for="adrotate-group-2">Group: <input  class="widefat" id="adrotate-group-2" name="adrotate-group-2" type="text" value="<?php echo $group; ?>" /></label>
				<br />
				<small>Group ID.</small>
			</p>
			<p>
				<label for="adrotate-spot-2">Spot: <input  class="widefat" id="adrotate-spot-2" name="adrotate-spot-2" type="text" value="<?php echo $spot; ?>" /></label>
				<br />
				<small>Spot ID.</small>
			</p>
			<p>
				<label for="adrotate-banner-2">Banner (Optional): <input class="widefat" id="adrotate-banner-2" name="adrotate-banner-2" type="text" value="<?php echo $banner; ?>" /></label>
				<br />
				<small>Leave empty for multiple groups or when using a block! Do NOT enter multiple numbers here!</small>
			</p>
			<p>
				<label for="adrotate-block-2">Block (Optional): <input  class="widefat" id="adrotate-block-2" name="adrotate-block-2" type="text" value="<?php echo $block; ?>" /></label>
				<br />
				<small>Sets the amount of banners in a block.</small>
			</p>
			<p>
				<label for="adrotate-column-2">Columns (Optional): <input  class="widefat" id="adrotate-column-2" name="adrotate-column-2" type="text" value="<?php echo $column; ?>" /></label>
				<br />
				<small>Define how many columns your ad-block has.</small>
			</p>
			<input type="hidden" id="adrotate-submit" name="adrotate-submit-2" value="1" />
	<?php
	}


	$widget_ops_2 = array('classname' => 'adrotate_widget_2', 'description' => "Add banners in the sidebar." );
	wp_register_sidebar_widget('AdRotate_2', 'AdRotate 2', 'adrotate_widget_2', $widget_ops_2);
	wp_register_widget_control('AdRotate_2', 'AdRotate 2', 'adrotate_widget_control_2' );
}

/*-------------------------------------------------------------
 Name:      adrotate_widget_init_3

 Purpose:   Widget for the sidebar
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_widget_init_3() {

	if ( !function_exists('register_sidebar_widget') )
		return;
	if ( !function_exists('adrotate_banner') )
		return;

	function adrotate_widget_3($args) {
		$options = get_option('widget_adrotate_3');
		extract($args);

		/* echo $before_widget . $before_title . $options['title'] . $after_title;
		echo '<ul><li>';*/
			echo adrotate_banner($options['group'], $options['spot'], $options['banner'], $options['block'], $options['column'], false);
		/*echo '</li></ul>';
		echo $after_widget;*/

	}

	function adrotate_widget_control_3() {
		$options = $newoptions = get_option('widget_adrotate_3');
		if ( $_POST['adrotate-submit-3'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['adrotate-title-3']));
			$newoptions['group'] = strip_tags(stripslashes($_POST['adrotate-group-3']));
			
			$newoptions['spot'] = strip_tags(stripslashes($_POST['adrotate-spot-3']));
			$newoptions['block'] = strip_tags(stripslashes($_POST['adrotate-block-3']));
			$newoptions['column'] = strip_tags(stripslashes($_POST['adrotate-column-3']));
			$newoptions['banner'] = strip_tags(stripslashes($_POST['adrotate-banner-3']));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_adrotate_3', $options);
		}
		$title = attribute_escape($options['title']);
		$group = attribute_escape($options['group']);
		$spot = attribute_escape($options['spot']);
		$block = attribute_escape($options['block']);
		$column = attribute_escape($options['column']);
		$banner = attribute_escape($options['banner']);
	?>
			<p>
				<label for="adrotate-title-3">Title: <input class="widefat" id="adrotate-title-3" name="adrotate-title-3" type="text" value="<?php echo $title; ?>" /></label>
				<br />
				<small>HTML will be stripped out.</small>
			</p>
			<p>
				<label for="adrotate-group-3">Group: <input  class="widefat" id="adrotate-group-3" name="adrotate-group-3" type="text" value="<?php echo $group; ?>" /></label>
				<br />
				<small>Group ID.</small>
			</p>
			<p>
				<label for="adrotate-spot-3">Spot: <input  class="widefat" id="adrotate-spot-3" name="adrotate-spot-3" type="text" value="<?php echo $spot; ?>" /></label>
				<br />
				<small>Spot ID.</small>
			</p>
			<p>
				<label for="adrotate-banner-3">Banner (Optional): <input class="widefat" id="adrotate-banner-3" name="adrotate-banner-3" type="text" value="<?php echo $banner; ?>" /></label>
				<br />
				<small>Leave empty for multiple groups or when using a block! Do NOT enter multiple numbers here!</small>
			</p>
			<p>
				<label for="adrotate-block-3">Block (Optional): <input  class="widefat" id="adrotate-block-3" name="adrotate-block-3" type="text" value="<?php echo $block; ?>" /></label>
				<br />
				<small>Sets the amount of banners in a block.</small>
			</p>
			<p>
				<label for="adrotate-column-3">Columns (Optional): <input  class="widefat" id="adrotate-column-3" name="adrotate-column-3" type="text" value="<?php echo $column; ?>" /></label>
				<br />
				<small>Define how many columns your ad-block has.</small>
			</p>
			<input type="hidden" id="adrotate-submit" name="adrotate-submit-3" value="1" />
	<?php
	}


	$widget_ops_3 = array('classname' => 'adrotate_widget_3', 'description' => "Add banners in the sidebar." );
	wp_register_sidebar_widget('AdRotate_3', 'AdRotate 3', 'adrotate_widget_3', $widget_ops_3);
	wp_register_widget_control('AdRotate_3', 'AdRotate 3', 'adrotate_widget_control_3' );
}

/*-------------------------------------------------------------
 Name:      adrotate_widget_init_4

 Purpose:   Widget for the sidebar
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_widget_init_4() {

	if ( !function_exists('register_sidebar_widget') )
		return;
	if ( !function_exists('adrotate_banner') )
		return;

	function adrotate_widget_4($args) {
		$options = get_option('widget_adrotate_4');
		extract($args);

		/* echo $before_widget . $before_title . $options['title'] . $after_title;
		echo '<ul><li>';*/
			echo adrotate_banner($options['group'], $options['spot'], $options['banner'], $options['block'], $options['column'], false);
		/*echo '</li></ul>';
		echo $after_widget;*/

	}

	function adrotate_widget_control_4() {
		$options = $newoptions = get_option('widget_adrotate_4');
		if ( $_POST['adrotate-submit-4'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['adrotate-title-4']));
			$newoptions['group'] = strip_tags(stripslashes($_POST['adrotate-group-4']));
			
			$newoptions['spot'] = strip_tags(stripslashes($_POST['adrotate-spot-4']));
			$newoptions['block'] = strip_tags(stripslashes($_POST['adrotate-block-4']));
			$newoptions['column'] = strip_tags(stripslashes($_POST['adrotate-column-4']));
			$newoptions['banner'] = strip_tags(stripslashes($_POST['adrotate-banner-4']));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_adrotate_4', $options);
		}
		$title = attribute_escape($options['title']);
		$group = attribute_escape($options['group']);
		$spot = attribute_escape($options['spot']);
		$block = attribute_escape($options['block']);
		$column = attribute_escape($options['column']);
		$banner = attribute_escape($options['banner']);
	?>
			<p>
				<label for="adrotate-title-4">Title: <input class="widefat" id="adrotate-title-4" name="adrotate-title-4" type="text" value="<?php echo $title; ?>" /></label>
				<br />
				<small>HTML will be stripped out.</small>
			</p>
			<p>
				<label for="adrotate-group-4">Group: <input  class="widefat" id="adrotate-group-4" name="adrotate-group-4" type="text" value="<?php echo $group; ?>" /></label>
				<br />
				<small>Group ID.</small>
			</p>
			<p>
				<label for="adrotate-spot-4">Spot: <input  class="widefat" id="adrotate-spot-4" name="adrotate-spot-4" type="text" value="<?php echo $spot; ?>" /></label>
				<br />
				<small>Spot ID.</small>
			</p>
			<p>
				<label for="adrotate-banner-4">Banner (Optional): <input class="widefat" id="adrotate-banner-4" name="adrotate-banner-4" type="text" value="<?php echo $banner; ?>" /></label>
				<br />
				<small>Leave empty for multiple groups or when using a block! Do NOT enter multiple numbers here!</small>
			</p>
			<p>
				<label for="adrotate-block-4">Block (Optional): <input  class="widefat" id="adrotate-block-4" name="adrotate-block-4" type="text" value="<?php echo $block; ?>" /></label>
				<br />
				<small>Sets the amount of banners in a block.</small>
			</p>
			<p>
				<label for="adrotate-column-4">Columns (Optional): <input  class="widefat" id="adrotate-column-4" name="adrotate-column-4" type="text" value="<?php echo $column; ?>" /></label>
				<br />
				<small>Define how many columns your ad-block has.</small>
			</p>
			<input type="hidden" id="adrotate-submit" name="adrotate-submit-4" value="1" />
	<?php
	}


	$widget_ops_4 = array('classname' => 'adrotate_widget_4', 'description' => "Add banners in the sidebar." );
	wp_register_sidebar_widget('AdRotate_4', 'AdRotate 4', 'adrotate_widget_4', $widget_ops_4);
	wp_register_widget_control('AdRotate_4', 'AdRotate 4', 'adrotate_widget_control_4' );
}

/*-------------------------------------------------------------
 Name:      adrotate_widget_init_5

 Purpose:   Widget for the sidebar
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_widget_init_5() {

	if ( !function_exists('register_sidebar_widget') )
		return;
	if ( !function_exists('adrotate_banner') )
		return;

	function adrotate_widget_5($args) {
		$options = get_option('widget_adrotate_5');
		extract($args);

		/* echo $before_widget . $before_title . $options['title'] . $after_title;
		echo '<ul><li>';*/
			echo adrotate_banner($options['group'], $options['spot'], $options['banner'], $options['block'], $options['column'], false);
		/*echo '</li></ul>';
		echo $after_widget;*/

	}

	function adrotate_widget_control_5() {
		$options = $newoptions = get_option('widget_adrotate_5');
		if ( $_POST['adrotate-submit-5'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['adrotate-title-5']));
			$newoptions['group'] = strip_tags(stripslashes($_POST['adrotate-group-5']));
			
			$newoptions['spot'] = strip_tags(stripslashes($_POST['adrotate-spot-5']));
			$newoptions['block'] = strip_tags(stripslashes($_POST['adrotate-block-5']));
			$newoptions['column'] = strip_tags(stripslashes($_POST['adrotate-column-5']));
			$newoptions['banner'] = strip_tags(stripslashes($_POST['adrotate-banner-5']));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_adrotate_5', $options);
		}
		$title = attribute_escape($options['title']);
		$group = attribute_escape($options['group']);
		$spot = attribute_escape($options['spot']);
		$block = attribute_escape($options['block']);
		$column = attribute_escape($options['column']);
		$banner = attribute_escape($options['banner']);
	?>
			<p>
				<label for="adrotate-title-5">Title: <input class="widefat" id="adrotate-title-5" name="adrotate-title-5" type="text" value="<?php echo $title; ?>" /></label>
				<br />
				<small>HTML will be stripped out.</small>
			</p>
			<p>
				<label for="adrotate-group-5">Group: <input  class="widefat" id="adrotate-group-5" name="adrotate-group-5" type="text" value="<?php echo $group; ?>" /></label>
				<br />
				<small>Group ID.</small>
			</p>
			<p>
				<label for="adrotate-spot-5">Spot: <input  class="widefat" id="adrotate-spot-5" name="adrotate-spot-5" type="text" value="<?php echo $spot; ?>" /></label>
				<br />
				<small>Spot ID.</small>
			</p>
			<p>
				<label for="adrotate-banner-5">Banner (Optional): <input class="widefat" id="adrotate-banner-5" name="adrotate-banner-5" type="text" value="<?php echo $banner; ?>" /></label>
				<br />
				<small>Leave empty for multiple groups or when using a block! Do NOT enter multiple numbers here!</small>
			</p>
			<p>
				<label for="adrotate-block-5">Block (Optional): <input  class="widefat" id="adrotate-block-5" name="adrotate-block-5" type="text" value="<?php echo $block; ?>" /></label>
				<br />
				<small>Sets the amount of banners in a block.</small>
			</p>
			<p>
				<label for="adrotate-column-5">Columns (Optional): <input  class="widefat" id="adrotate-column-5" name="adrotate-column-5" type="text" value="<?php echo $column; ?>" /></label>
				<br />
				<small>Define how many columns your ad-block has.</small>
			</p>
			<input type="hidden" id="adrotate-submit" name="adrotate-submit-5" value="1" />
	<?php
	}


	$widget_ops_5 = array('classname' => 'adrotate_widget_5', 'description' => "Add banners in the sidebar." );
	wp_register_sidebar_widget('AdRotate_5', 'AdRotate 5', 'adrotate_widget_5', $widget_ops_5);
	wp_register_widget_control('AdRotate_5', 'AdRotate 5', 'adrotate_widget_control_5' );
}

/*-------------------------------------------------------------
 Name:      adrotate_widget_init_6

 Purpose:   Widget for the sidebar
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_widget_init_6() {

	if ( !function_exists('register_sidebar_widget') )
		return;
	if ( !function_exists('adrotate_banner') )
		return;

	function adrotate_widget_6($args) {
		$options = get_option('widget_adrotate_6');
		extract($args);

		/* echo $before_widget . $before_title . $options['title'] . $after_title;
		echo '<ul><li>';*/
			echo adrotate_banner($options['group'], $options['spot'], $options['banner'], $options['block'], $options['column'], false);
		/*echo '</li></ul>';
		echo $after_widget;*/

	}

	function adrotate_widget_control_6() {
		$options = $newoptions = get_option('widget_adrotate_6');
		if ( $_POST['adrotate-submit-6'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['adrotate-title-6']));
			$newoptions['group'] = strip_tags(stripslashes($_POST['adrotate-group-6']));
			
			$newoptions['spot'] = strip_tags(stripslashes($_POST['adrotate-spot-6']));
			$newoptions['block'] = strip_tags(stripslashes($_POST['adrotate-block-6']));
			$newoptions['column'] = strip_tags(stripslashes($_POST['adrotate-column-6']));
			$newoptions['banner'] = strip_tags(stripslashes($_POST['adrotate-banner-6']));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_adrotate_6', $options);
		}
		$title = attribute_escape($options['title']);
		$group = attribute_escape($options['group']);
		$spot = attribute_escape($options['spot']);
		$block = attribute_escape($options['block']);
		$column = attribute_escape($options['column']);
		$banner = attribute_escape($options['banner']);
	?>
			<p>
				<label for="adrotate-title-6">Title: <input class="widefat" id="adrotate-title-6" name="adrotate-title-6" type="text" value="<?php echo $title; ?>" /></label>
				<br />
				<small>HTML will be stripped out.</small>
			</p>
			<p>
				<label for="adrotate-group-6">Group: <input  class="widefat" id="adrotate-group-6" name="adrotate-group-6" type="text" value="<?php echo $group; ?>" /></label>
				<br />
				<small>Group ID.</small>
			</p>
			<p>
				<label for="adrotate-spot-6">Spot: <input  class="widefat" id="adrotate-spot-6" name="adrotate-spot-6" type="text" value="<?php echo $spot; ?>" /></label>
				<br />
				<small>Spot ID.</small>
			</p>
			<p>
				<label for="adrotate-banner-6">Banner (Optional): <input class="widefat" id="adrotate-banner-6" name="adrotate-banner-6" type="text" value="<?php echo $banner; ?>" /></label>
				<br />
				<small>Leave empty for multiple groups or when using a block! Do NOT enter multiple numbers here!</small>
			</p>
			<p>
				<label for="adrotate-block-6">Block (Optional): <input  class="widefat" id="adrotate-block-6" name="adrotate-block-6" type="text" value="<?php echo $block; ?>" /></label>
				<br />
				<small>Sets the amount of banners in a block.</small>
			</p>
			<p>
				<label for="adrotate-column-6">Columns (Optional): <input  class="widefat" id="adrotate-column-6" name="adrotate-column-6" type="text" value="<?php echo $column; ?>" /></label>
				<br />
				<small>Define how many columns your ad-block has.</small>
			</p>
			<input type="hidden" id="adrotate-submit" name="adrotate-submit-6" value="1" />
	<?php
	}


	$widget_ops_6 = array('classname' => 'adrotate_widget_6', 'description' => "Add banners in the sidebar." );
	wp_register_sidebar_widget('AdRotate_6', 'AdRotate 6', 'adrotate_widget_6', $widget_ops_6);
	wp_register_widget_control('AdRotate_6', 'AdRotate 6', 'adrotate_widget_control_6' );
}

/*-------------------------------------------------------------
 Name:      adrotate_widget_init_7

 Purpose:   Widget for the sidebar
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_widget_init_7() {

	if ( !function_exists('register_sidebar_widget') )
		return;
	if ( !function_exists('adrotate_banner') )
		return;

	function adrotate_widget_7($args) {
		$options = get_option('widget_adrotate_7');
		extract($args);

		/* echo $before_widget . $before_title . $options['title'] . $after_title;
		echo '<ul><li>';*/
			echo adrotate_banner($options['group'], $options['spot'], $options['banner'], $options['block'], $options['column'], false);
		/*echo '</li></ul>';
		echo $after_widget;*/

	}

	function adrotate_widget_control_7() {
		$options = $newoptions = get_option('widget_adrotate_7');
		if ( $_POST['adrotate-submit-7'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['adrotate-title-7']));
			$newoptions['group'] = strip_tags(stripslashes($_POST['adrotate-group-7']));
			
			$newoptions['spot'] = strip_tags(stripslashes($_POST['adrotate-spot-7']));
			$newoptions['block'] = strip_tags(stripslashes($_POST['adrotate-block-7']));
			$newoptions['column'] = strip_tags(stripslashes($_POST['adrotate-column-7']));
			$newoptions['banner'] = strip_tags(stripslashes($_POST['adrotate-banner-7']));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_adrotate_7', $options);
		}
		$title = attribute_escape($options['title']);
		$group = attribute_escape($options['group']);
		$spot = attribute_escape($options['spot']);
		$block = attribute_escape($options['block']);
		$column = attribute_escape($options['column']);
		$banner = attribute_escape($options['banner']);
	?>
			<p>
				<label for="adrotate-title-7">Title: <input class="widefat" id="adrotate-title-7" name="adrotate-title-7" type="text" value="<?php echo $title; ?>" /></label>
				<br />
				<small>HTML will be stripped out.</small>
			</p>
			<p>
				<label for="adrotate-group-7">Group: <input  class="widefat" id="adrotate-group-7" name="adrotate-group-7" type="text" value="<?php echo $group; ?>" /></label>
				<br />
				<small>Group ID.</small>
			</p>
			<p>
				<label for="adrotate-spot-7">Spot: <input  class="widefat" id="adrotate-spot-7" name="adrotate-spot-7" type="text" value="<?php echo $spot; ?>" /></label>
				<br />
				<small>Spot ID.</small>
			</p>
			<p>
				<label for="adrotate-banner-7">Banner (Optional): <input class="widefat" id="adrotate-banner-7" name="adrotate-banner-7" type="text" value="<?php echo $banner; ?>" /></label>
				<br />
				<small>Leave empty for multiple groups or when using a block! Do NOT enter multiple numbers here!</small>
			</p>
			<p>
				<label for="adrotate-block-7">Block (Optional): <input  class="widefat" id="adrotate-block-7" name="adrotate-block-7" type="text" value="<?php echo $block; ?>" /></label>
				<br />
				<small>Sets the amount of banners in a block.</small>
			</p>
			<p>
				<label for="adrotate-column-7">Columns (Optional): <input  class="widefat" id="adrotate-column-7" name="adrotate-column-7" type="text" value="<?php echo $column; ?>" /></label>
				<br />
				<small>Define how many columns your ad-block has.</small>
			</p>
			<input type="hidden" id="adrotate-submit" name="adrotate-submit-7" value="1" />
	<?php
	}


	$widget_ops_7 = array('classname' => 'adrotate_widget_7', 'description' => "Add banners in the sidebar." );
	wp_register_sidebar_widget('AdRotate_7', 'AdRotate 7', 'adrotate_widget_7', $widget_ops_7);
	wp_register_widget_control('AdRotate_7', 'AdRotate 7', 'adrotate_widget_control_7' );
}

/*-------------------------------------------------------------
 Name:      adrotate_widget_init_8

 Purpose:   Widget for the sidebar
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_widget_init_8() {

	if ( !function_exists('register_sidebar_widget') )
		return;
	if ( !function_exists('adrotate_banner') )
		return;

	function adrotate_widget_8($args) {
		$options = get_option('widget_adrotate_8');
		extract($args);

		/* echo $before_widget . $before_title . $options['title'] . $after_title;
		echo '<ul><li>';*/
			echo adrotate_banner($options['group'], $options['spot'], $options['banner'], $options['block'], $options['column'], false);
		/*echo '</li></ul>';
		echo $after_widget;*/

	}

	function adrotate_widget_control_8() {
		$options = $newoptions = get_option('widget_adrotate_8');
		if ( $_POST['adrotate-submit-8'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['adrotate-title-8']));
			$newoptions['group'] = strip_tags(stripslashes($_POST['adrotate-group-8']));
			
			$newoptions['spot'] = strip_tags(stripslashes($_POST['adrotate-spot-8']));
			$newoptions['block'] = strip_tags(stripslashes($_POST['adrotate-block-8']));
			$newoptions['column'] = strip_tags(stripslashes($_POST['adrotate-column-8']));
			$newoptions['banner'] = strip_tags(stripslashes($_POST['adrotate-banner-8']));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_adrotate_8', $options);
		}
		$title = attribute_escape($options['title']);
		$group = attribute_escape($options['group']);
		$spot = attribute_escape($options['spot']);
		$block = attribute_escape($options['block']);
		$column = attribute_escape($options['column']);
		$banner = attribute_escape($options['banner']);
	?>
			<p>
				<label for="adrotate-title-8">Title: <input class="widefat" id="adrotate-title-8" name="adrotate-title-8" type="text" value="<?php echo $title; ?>" /></label>
				<br />
				<small>HTML will be stripped out.</small>
			</p>
			<p>
				<label for="adrotate-group-8">Group: <input  class="widefat" id="adrotate-group-8" name="adrotate-group-8" type="text" value="<?php echo $group; ?>" /></label>
				<br />
				<small>Group ID.</small>
			</p>
			<p>
				<label for="adrotate-spot-8">Spot: <input  class="widefat" id="adrotate-spot-8" name="adrotate-spot-8" type="text" value="<?php echo $spot; ?>" /></label>
				<br />
				<small>Spot ID.</small>
			</p>
			<p>
				<label for="adrotate-banner-8">Banner (Optional): <input class="widefat" id="adrotate-banner-8" name="adrotate-banner-8" type="text" value="<?php echo $banner; ?>" /></label>
				<br />
				<small>Leave empty for multiple groups or when using a block! Do NOT enter multiple numbers here!</small>
			</p>
			<p>
				<label for="adrotate-block-8">Block (Optional): <input  class="widefat" id="adrotate-block-8" name="adrotate-block-8" type="text" value="<?php echo $block; ?>" /></label>
				<br />
				<small>Sets the amount of banners in a block.</small>
			</p>
			<p>
				<label for="adrotate-column-8">Columns (Optional): <input  class="widefat" id="adrotate-column-8" name="adrotate-column-8" type="text" value="<?php echo $column; ?>" /></label>
				<br />
				<small>Define how many columns your ad-block has.</small>
			</p>
			<input type="hidden" id="adrotate-submit" name="adrotate-submit-8" value="1" />
	<?php
	}


	$widget_ops_8 = array('classname' => 'adrotate_widget_8', 'description' => "Add banners in the sidebar." );
	wp_register_sidebar_widget('AdRotate_8', 'AdRotate 8', 'adrotate_widget_8', $widget_ops_8);
	wp_register_widget_control('AdRotate_8', 'AdRotate 8', 'adrotate_widget_control_8' );
}

/*-------------------------------------------------------------
 Name:      adrotate_widget_init_9

 Purpose:   Widget for the sidebar
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_widget_init_9() {

	if ( !function_exists('register_sidebar_widget') )
		return;
	if ( !function_exists('adrotate_banner') )
		return;

	function adrotate_widget_9($args) {
		$options = get_option('widget_adrotate_9');
		extract($args);

		/* echo $before_widget . $before_title . $options['title'] . $after_title;
		echo '<ul><li>';*/
			echo adrotate_banner($options['group'], $options['spot'], $options['banner'], $options['block'], $options['column'], false);
		/*echo '</li></ul>';
		echo $after_widget;*/

	}

	function adrotate_widget_control_9() {
		$options = $newoptions = get_option('widget_adrotate_9');
		if ( $_POST['adrotate-submit-9'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['adrotate-title-9']));
			$newoptions['group'] = strip_tags(stripslashes($_POST['adrotate-group-9']));
			
			$newoptions['spot'] = strip_tags(stripslashes($_POST['adrotate-spot-9']));
			$newoptions['block'] = strip_tags(stripslashes($_POST['adrotate-block-9']));
			$newoptions['column'] = strip_tags(stripslashes($_POST['adrotate-column-9']));
			$newoptions['banner'] = strip_tags(stripslashes($_POST['adrotate-banner-9']));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_adrotate_9', $options);
		}
		$title = attribute_escape($options['title']);
		$group = attribute_escape($options['group']);
		$spot = attribute_escape($options['spot']);
		$block = attribute_escape($options['block']);
		$column = attribute_escape($options['column']);
		$banner = attribute_escape($options['banner']);
	?>
			<p>
				<label for="adrotate-title-9">Title: <input class="widefat" id="adrotate-title-9" name="adrotate-title-9" type="text" value="<?php echo $title; ?>" /></label>
				<br />
				<small>HTML will be stripped out.</small>
			</p>
			<p>
				<label for="adrotate-group-9">Group: <input  class="widefat" id="adrotate-group-9" name="adrotate-group-9" type="text" value="<?php echo $group; ?>" /></label>
				<br />
				<small>Group ID.</small>
			</p>
			<p>
				<label for="adrotate-spot-9">Spot: <input  class="widefat" id="adrotate-spot-9" name="adrotate-spot-9" type="text" value="<?php echo $spot; ?>" /></label>
				<br />
				<small>Spot ID.</small>
			</p>
			<p>
				<label for="adrotate-banner-9">Banner (Optional): <input class="widefat" id="adrotate-banner-9" name="adrotate-banner-9" type="text" value="<?php echo $banner; ?>" /></label>
				<br />
				<small>Leave empty for multiple groups or when using a block! Do NOT enter multiple numbers here!</small>
			</p>
			<p>
				<label for="adrotate-block-9">Block (Optional): <input  class="widefat" id="adrotate-block-9" name="adrotate-block-9" type="text" value="<?php echo $block; ?>" /></label>
				<br />
				<small>Sets the amount of banners in a block.</small>
			</p>
			<p>
				<label for="adrotate-column-9">Columns (Optional): <input  class="widefat" id="adrotate-column-9" name="adrotate-column-9" type="text" value="<?php echo $column; ?>" /></label>
				<br />
				<small>Define how many columns your ad-block has.</small>
			</p>
			<input type="hidden" id="adrotate-submit" name="adrotate-submit-9" value="1" />
	<?php
	}


	$widget_ops_9 = array('classname' => 'adrotate_widget_9', 'description' => "Add banners in the sidebar." );
	wp_register_sidebar_widget('AdRotate_9', 'AdRotate 9', 'adrotate_widget_9', $widget_ops_9);
	wp_register_widget_control('AdRotate_9', 'AdRotate 9', 'adrotate_widget_control_9' );
}

/*-------------------------------------------------------------
 Name:      adrotate_dashboard_widget

 Purpose:   Add a WordPress dashboard widget
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_dashboard_widget() {
	wp_add_dashboard_widget( 'adrotate_stats_widget', 'Adrotate', 'adrotate_stats_widget' );
	wp_add_dashboard_widget( 'meandmymac_rss_widget', 'Meandmymac.net RSS Feed', 'meandmymac_rss_widget' );
}


/*-------------------------------------------------------------
 Name:      adrotate_stats_widget

 Purpose:   AdRotate stats
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_stats_widget() {
	global $wpdb;

	$timezone = get_option('gmt_offset')*3600;
	$url = get_option('siteurl');
	?>
		<style type="text/css" media="screen">
		#adrotate_stats_widget h4 {
			font-family: "Lucida Grande", Verdana, Arial, "Bitstream Vera Sans", sans-serif;
			float: left;
			width: 7em;
			clear: both;
			font-weight: normal;
			text-align: right;
			padding-top: 5px;
			font-size: 12px;
		}

		#adrotate_stats_widget h4 label {
			margin-right: 10px;
			font-weight: bold;
		}

		#adrotate_stats_widget .text-wrap {
			padding-top: 5px;
			margin: 0 0 1em 5em;
			display: block;
		}
		</style>
	<?php

	$banners = $wpdb->get_var("SELECT COUNT(*) FROM `".$wpdb->prefix."adrotate` ORDER BY `id`");
	if($banners > 0) { ?>
			<?php $thebest = $wpdb->get_row("SELECT `title`, `clicks` FROM `".$wpdb->prefix."adrotate` WHERE `tracker` = 'Y' ORDER BY `clicks` DESC LIMIT 1"); ?>
			<h4><label for="Best">The best</label></h4>
			<div class="text-wrap">
				<?php echo $thebest->title; ?> with <?php echo $thebest->clicks; ?> clicks.
			</div>

			<h4><label for="Worst">The worst</label></h4>
			<?php $theworst = $wpdb->get_row("SELECT `title`, `clicks` FROM `".$wpdb->prefix."adrotate` WHERE `tracker` = 'Y' ORDER BY `clicks` ASC LIMIT 1"); ?>
			<div class="text-wrap">
				<?php echo $theworst->title; ?> with <?php echo $theworst->clicks; ?> clicks.
			</div>

			<h4><label for="Average">Average</label></h4>
			<?php
			$clicks = $wpdb->get_var("SELECT SUM(clicks) FROM `".$wpdb->prefix."adrotate` WHERE `tracker` = 'Y'");
			$banners = $wpdb->get_var("SELECT COUNT(*) FROM `".$wpdb->prefix."adrotate` WHERE `tracker` = 'Y'");
			?>
			<div class="text-wrap">
				<?php if($banners < 1 OR $clicks < 1) {
					echo '0';
				} else {
					$average = $clicks / $banners;
					echo round($average, 2);
				} ?> clicks on all banners.
			</div>

			<h4><label for="More">More...</label></h4>
			<?php
			$impressions = $wpdb->get_var("SELECT SUM(shown) FROM `".$wpdb->prefix."adrotate`");
			$clicks2 = $wpdb->get_var("SELECT SUM(clicks) FROM `".$wpdb->prefix."adrotate` WHERE `tracker` = 'Y'");
			?>
			<div class="text-wrap">
				<?php if($impressions > 0 AND $clicks2 > 0) {
					$ctr = round((100/$impressions)*$clicks2, 2);
				} else {
					$ctr = 0;
				}
				echo $impressions.' impressions and '.$clicks2.' clicks. CTR of '.$ctr.'%.'; ?>
			</div>

			<h4><label for="Last5">The last 5</label></h4>
			<?php
			$lastfive = $wpdb->get_results("SELECT `timer`, `bannerid` FROM `".$wpdb->prefix."adrotate_tracker` ORDER BY `timer` DESC LIMIT 5");
			?>
			<div class="text-wrap">
				<?php
				if(count($lastfive) > 0) {
					foreach($lastfive as $last) {
						$bannertitle = $wpdb->get_var("SELECT `title` FROM `".$wpdb->prefix."adrotate` WHERE `id` = '$last->bannerid'");
						echo date('d-m-Y', $last->timer) .', '. $bannertitle .'<br />';
					}
				} else {
				?>
				<em>No clicks in the past 24 hours</em>
				<?php } ?>
			</div>

			<div style="padding-top: .5em">
				<p><a href="admin.php?page=adrotate" class="button">Manage Banners</a>&nbsp;&nbsp;<a href="admin.php?page=adrotate2" class="button">Add Banner</a></p>
			</div>

	<?php } else { ?>
		<span style="font-style: italic;">There are no banners yet. <a href="admin.php?page=adrotate2">Add some banners now</a>!</span>
	<?php } ?>
<?php
}

/*-------------------------------------------------------------
 Name:      meandmymac_rss_widget

 Purpose:   Shows the Meandmymac RSS feed on the dashboard
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
if(!function_exists('meandmymac_rss_widget')) {
	function meandmymac_rss_widget() {
	/*	?>
			<style type="text/css" media="screen">
			#meandmymac_rss_widget .text-wrap {
				padding-top: 5px;
				margin: 0.5em;
				display: block;
			}
			</style>
		<?php
		$rss = meandmymac_rss('http://meandmymac.net/feed/');
		$loop = 1;
		foreach($rss as $key => $item) { ?>
				<div class="text-wrap">
					<a href="<?php echo $item['link']; ?>" target="_blank"><?php echo $item['title']; ?></a> on <?php echo $item['date']; ?>.
				</div>
	<?php
			$loop++;
		} */
	}
}
=======
<?php
/*-------------------------------------------------------------
 Name:      adrotate_widget_init_1

 Purpose:   Widget for the sidebar
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_widget_init_1() {

	if ( !function_exists('register_sidebar_widget') )
		return;
	if ( !function_exists('adrotate_banner') )
		return;

	function adrotate_widget_1($args) {
		$options = get_option('widget_adrotate_1');
		extract($args);

		/* echo $before_widget . $before_title . $options['title'] . $after_title;
		echo '<ul><li>';*/
			echo adrotate_banner($options['group'], $options['spot'], $options['banner'], $options['block'], $options['column'], false);
		/*echo '</li></ul>';
		echo $after_widget;*/

	}

	function adrotate_widget_control_1() {
		$options = $newoptions = get_option('widget_adrotate_1');
		if ( $_POST['adrotate-submit-1'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['adrotate-title-1']));
			$newoptions['group'] = strip_tags(stripslashes($_POST['adrotate-group-1']));
			
			$newoptions['spot'] = strip_tags(stripslashes($_POST['adrotate-spot-1']));
			$newoptions['block'] = strip_tags(stripslashes($_POST['adrotate-block-1']));
			$newoptions['column'] = strip_tags(stripslashes($_POST['adrotate-column-1']));
			$newoptions['banner'] = strip_tags(stripslashes($_POST['adrotate-banner-1']));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_adrotate_1', $options);
		}
		$title = attribute_escape($options['title']);
		$group = attribute_escape($options['group']);
		$spot = attribute_escape($options['spot']);
		$block = attribute_escape($options['block']);
		$column = attribute_escape($options['column']);
		$banner = attribute_escape($options['banner']);
	?>
			<p>
				<label for="adrotate-title-1">Title: <input class="widefat" id="adrotate-title-1" name="adrotate-title-1" type="text" value="<?php echo $title; ?>" /></label>
				<br />
				<small>HTML will be stripped out.</small>
			</p>
			<p>
				<label for="adrotate-group-1">Group: <input  class="widefat" id="adrotate-group-1" name="adrotate-group-1" type="text" value="<?php echo $group; ?>" /></label>
				<br />
				<small>Group ID.</small>
			</p>
			<p>
				<label for="adrotate-spot-1">Spot: <input  class="widefat" id="adrotate-spot-1" name="adrotate-spot-1" type="text" value="<?php echo $spot; ?>" /></label>
				<br />
				<small>Spot ID.</small>
			</p>
			<p>
				<label for="adrotate-banner-1">Banner (Optional): <input class="widefat" id="adrotate-banner-1" name="adrotate-banner-1" type="text" value="<?php echo $banner; ?>" /></label>
				<br />
				<small>Leave empty for multiple groups or when using a block! Do NOT enter multiple numbers here!</small>
			</p>
			<p>
				<label for="adrotate-block-1">Block (Optional): <input  class="widefat" id="adrotate-block-1" name="adrotate-block-1" type="text" value="<?php echo $block; ?>" /></label>
				<br />
				<small>Sets the amount of banners in a block.</small>
			</p>
			<p>
				<label for="adrotate-column-1">Columns (Optional): <input  class="widefat" id="adrotate-column-1" name="adrotate-column-1" type="text" value="<?php echo $column; ?>" /></label>
				<br />
				<small>Define how many columns your ad-block has.</small>
			</p>
			<input type="hidden" id="adrotate-submit" name="adrotate-submit-1" value="1" />
	<?php
	}


	$widget_ops = array('classname' => 'adrotate_widget_1', 'description' => "Add banners in the sidebar." );
	wp_register_sidebar_widget('AdRotate_1', 'AdRotate 1', 'adrotate_widget_1', $widget_ops);
	wp_register_widget_control('AdRotate_1', 'AdRotate 1', 'adrotate_widget_control_1' );
}
/*-------------------------------------------------------------
 Name:      adrotate_widget_init_2

 Purpose:   Widget for the sidebar
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_widget_init_2() {

	if ( !function_exists('register_sidebar_widget') )
		return;
	if ( !function_exists('adrotate_banner') )
		return;

	function adrotate_widget_2($args) {
		$options = get_option('widget_adrotate_2');
		extract($args);

		/* echo $before_widget . $before_title . $options['title'] . $after_title;
		echo '<ul><li>';*/
			echo adrotate_banner($options['group'], $options['spot'], $options['banner'], $options['block'], $options['column'], false);
		/*echo '</li></ul>';
		echo $after_widget;*/

	}

	function adrotate_widget_control_2() {
		$options = $newoptions = get_option('widget_adrotate_2');
		if ( $_POST['adrotate-submit-2'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['adrotate-title-2']));
			$newoptions['group'] = strip_tags(stripslashes($_POST['adrotate-group-2']));
			
			$newoptions['spot'] = strip_tags(stripslashes($_POST['adrotate-spot-2']));
			$newoptions['block'] = strip_tags(stripslashes($_POST['adrotate-block-2']));
			$newoptions['column'] = strip_tags(stripslashes($_POST['adrotate-column-2']));
			$newoptions['banner'] = strip_tags(stripslashes($_POST['adrotate-banner-2']));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_adrotate_2', $options);
		}
		$title = attribute_escape($options['title']);
		$group = attribute_escape($options['group']);
		$spot = attribute_escape($options['spot']);
		$block = attribute_escape($options['block']);
		$column = attribute_escape($options['column']);
		$banner = attribute_escape($options['banner']);
	?>
			<p>
				<label for="adrotate-title-2">Title: <input class="widefat" id="adrotate-title-2" name="adrotate-title-2" type="text" value="<?php echo $title; ?>" /></label>
				<br />
				<small>HTML will be stripped out.</small>
			</p>
			<p>
				<label for="adrotate-group-2">Group: <input  class="widefat" id="adrotate-group-2" name="adrotate-group-2" type="text" value="<?php echo $group; ?>" /></label>
				<br />
				<small>Group ID.</small>
			</p>
			<p>
				<label for="adrotate-spot-2">Spot: <input  class="widefat" id="adrotate-spot-2" name="adrotate-spot-2" type="text" value="<?php echo $spot; ?>" /></label>
				<br />
				<small>Spot ID.</small>
			</p>
			<p>
				<label for="adrotate-banner-2">Banner (Optional): <input class="widefat" id="adrotate-banner-2" name="adrotate-banner-2" type="text" value="<?php echo $banner; ?>" /></label>
				<br />
				<small>Leave empty for multiple groups or when using a block! Do NOT enter multiple numbers here!</small>
			</p>
			<p>
				<label for="adrotate-block-2">Block (Optional): <input  class="widefat" id="adrotate-block-2" name="adrotate-block-2" type="text" value="<?php echo $block; ?>" /></label>
				<br />
				<small>Sets the amount of banners in a block.</small>
			</p>
			<p>
				<label for="adrotate-column-2">Columns (Optional): <input  class="widefat" id="adrotate-column-2" name="adrotate-column-2" type="text" value="<?php echo $column; ?>" /></label>
				<br />
				<small>Define how many columns your ad-block has.</small>
			</p>
			<input type="hidden" id="adrotate-submit" name="adrotate-submit-2" value="1" />
	<?php
	}


	$widget_ops_2 = array('classname' => 'adrotate_widget_2', 'description' => "Add banners in the sidebar." );
	wp_register_sidebar_widget('AdRotate_2', 'AdRotate 2', 'adrotate_widget_2', $widget_ops_2);
	wp_register_widget_control('AdRotate_2', 'AdRotate 2', 'adrotate_widget_control_2' );
}

/*-------------------------------------------------------------
 Name:      adrotate_widget_init_3

 Purpose:   Widget for the sidebar
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_widget_init_3() {

	if ( !function_exists('register_sidebar_widget') )
		return;
	if ( !function_exists('adrotate_banner') )
		return;

	function adrotate_widget_3($args) {
		$options = get_option('widget_adrotate_3');
		extract($args);

		/* echo $before_widget . $before_title . $options['title'] . $after_title;
		echo '<ul><li>';*/
			echo adrotate_banner($options['group'], $options['spot'], $options['banner'], $options['block'], $options['column'], false);
		/*echo '</li></ul>';
		echo $after_widget;*/

	}

	function adrotate_widget_control_3() {
		$options = $newoptions = get_option('widget_adrotate_3');
		if ( $_POST['adrotate-submit-3'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['adrotate-title-3']));
			$newoptions['group'] = strip_tags(stripslashes($_POST['adrotate-group-3']));
			
			$newoptions['spot'] = strip_tags(stripslashes($_POST['adrotate-spot-3']));
			$newoptions['block'] = strip_tags(stripslashes($_POST['adrotate-block-3']));
			$newoptions['column'] = strip_tags(stripslashes($_POST['adrotate-column-3']));
			$newoptions['banner'] = strip_tags(stripslashes($_POST['adrotate-banner-3']));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_adrotate_3', $options);
		}
		$title = attribute_escape($options['title']);
		$group = attribute_escape($options['group']);
		$spot = attribute_escape($options['spot']);
		$block = attribute_escape($options['block']);
		$column = attribute_escape($options['column']);
		$banner = attribute_escape($options['banner']);
	?>
			<p>
				<label for="adrotate-title-3">Title: <input class="widefat" id="adrotate-title-3" name="adrotate-title-3" type="text" value="<?php echo $title; ?>" /></label>
				<br />
				<small>HTML will be stripped out.</small>
			</p>
			<p>
				<label for="adrotate-group-3">Group: <input  class="widefat" id="adrotate-group-3" name="adrotate-group-3" type="text" value="<?php echo $group; ?>" /></label>
				<br />
				<small>Group ID.</small>
			</p>
			<p>
				<label for="adrotate-spot-3">Spot: <input  class="widefat" id="adrotate-spot-3" name="adrotate-spot-3" type="text" value="<?php echo $spot; ?>" /></label>
				<br />
				<small>Spot ID.</small>
			</p>
			<p>
				<label for="adrotate-banner-3">Banner (Optional): <input class="widefat" id="adrotate-banner-3" name="adrotate-banner-3" type="text" value="<?php echo $banner; ?>" /></label>
				<br />
				<small>Leave empty for multiple groups or when using a block! Do NOT enter multiple numbers here!</small>
			</p>
			<p>
				<label for="adrotate-block-3">Block (Optional): <input  class="widefat" id="adrotate-block-3" name="adrotate-block-3" type="text" value="<?php echo $block; ?>" /></label>
				<br />
				<small>Sets the amount of banners in a block.</small>
			</p>
			<p>
				<label for="adrotate-column-3">Columns (Optional): <input  class="widefat" id="adrotate-column-3" name="adrotate-column-3" type="text" value="<?php echo $column; ?>" /></label>
				<br />
				<small>Define how many columns your ad-block has.</small>
			</p>
			<input type="hidden" id="adrotate-submit" name="adrotate-submit-3" value="1" />
	<?php
	}


	$widget_ops_3 = array('classname' => 'adrotate_widget_3', 'description' => "Add banners in the sidebar." );
	wp_register_sidebar_widget('AdRotate_3', 'AdRotate 3', 'adrotate_widget_3', $widget_ops_3);
	wp_register_widget_control('AdRotate_3', 'AdRotate 3', 'adrotate_widget_control_3' );
}

/*-------------------------------------------------------------
 Name:      adrotate_widget_init_4

 Purpose:   Widget for the sidebar
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_widget_init_4() {

	if ( !function_exists('register_sidebar_widget') )
		return;
	if ( !function_exists('adrotate_banner') )
		return;

	function adrotate_widget_4($args) {
		$options = get_option('widget_adrotate_4');
		extract($args);

		/* echo $before_widget . $before_title . $options['title'] . $after_title;
		echo '<ul><li>';*/
			echo adrotate_banner($options['group'], $options['spot'], $options['banner'], $options['block'], $options['column'], false);
		/*echo '</li></ul>';
		echo $after_widget;*/

	}

	function adrotate_widget_control_4() {
		$options = $newoptions = get_option('widget_adrotate_4');
		if ( $_POST['adrotate-submit-4'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['adrotate-title-4']));
			$newoptions['group'] = strip_tags(stripslashes($_POST['adrotate-group-4']));
			
			$newoptions['spot'] = strip_tags(stripslashes($_POST['adrotate-spot-4']));
			$newoptions['block'] = strip_tags(stripslashes($_POST['adrotate-block-4']));
			$newoptions['column'] = strip_tags(stripslashes($_POST['adrotate-column-4']));
			$newoptions['banner'] = strip_tags(stripslashes($_POST['adrotate-banner-4']));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_adrotate_4', $options);
		}
		$title = attribute_escape($options['title']);
		$group = attribute_escape($options['group']);
		$spot = attribute_escape($options['spot']);
		$block = attribute_escape($options['block']);
		$column = attribute_escape($options['column']);
		$banner = attribute_escape($options['banner']);
	?>
			<p>
				<label for="adrotate-title-4">Title: <input class="widefat" id="adrotate-title-4" name="adrotate-title-4" type="text" value="<?php echo $title; ?>" /></label>
				<br />
				<small>HTML will be stripped out.</small>
			</p>
			<p>
				<label for="adrotate-group-4">Group: <input  class="widefat" id="adrotate-group-4" name="adrotate-group-4" type="text" value="<?php echo $group; ?>" /></label>
				<br />
				<small>Group ID.</small>
			</p>
			<p>
				<label for="adrotate-spot-4">Spot: <input  class="widefat" id="adrotate-spot-4" name="adrotate-spot-4" type="text" value="<?php echo $spot; ?>" /></label>
				<br />
				<small>Spot ID.</small>
			</p>
			<p>
				<label for="adrotate-banner-4">Banner (Optional): <input class="widefat" id="adrotate-banner-4" name="adrotate-banner-4" type="text" value="<?php echo $banner; ?>" /></label>
				<br />
				<small>Leave empty for multiple groups or when using a block! Do NOT enter multiple numbers here!</small>
			</p>
			<p>
				<label for="adrotate-block-4">Block (Optional): <input  class="widefat" id="adrotate-block-4" name="adrotate-block-4" type="text" value="<?php echo $block; ?>" /></label>
				<br />
				<small>Sets the amount of banners in a block.</small>
			</p>
			<p>
				<label for="adrotate-column-4">Columns (Optional): <input  class="widefat" id="adrotate-column-4" name="adrotate-column-4" type="text" value="<?php echo $column; ?>" /></label>
				<br />
				<small>Define how many columns your ad-block has.</small>
			</p>
			<input type="hidden" id="adrotate-submit" name="adrotate-submit-4" value="1" />
	<?php
	}


	$widget_ops_4 = array('classname' => 'adrotate_widget_4', 'description' => "Add banners in the sidebar." );
	wp_register_sidebar_widget('AdRotate_4', 'AdRotate 4', 'adrotate_widget_4', $widget_ops_4);
	wp_register_widget_control('AdRotate_4', 'AdRotate 4', 'adrotate_widget_control_4' );
}

/*-------------------------------------------------------------
 Name:      adrotate_widget_init_5

 Purpose:   Widget for the sidebar
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_widget_init_5() {

	if ( !function_exists('register_sidebar_widget') )
		return;
	if ( !function_exists('adrotate_banner') )
		return;

	function adrotate_widget_5($args) {
		$options = get_option('widget_adrotate_5');
		extract($args);

		/* echo $before_widget . $before_title . $options['title'] . $after_title;
		echo '<ul><li>';*/
			echo adrotate_banner($options['group'], $options['spot'], $options['banner'], $options['block'], $options['column'], false);
		/*echo '</li></ul>';
		echo $after_widget;*/

	}

	function adrotate_widget_control_5() {
		$options = $newoptions = get_option('widget_adrotate_5');
		if ( $_POST['adrotate-submit-5'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['adrotate-title-5']));
			$newoptions['group'] = strip_tags(stripslashes($_POST['adrotate-group-5']));
			
			$newoptions['spot'] = strip_tags(stripslashes($_POST['adrotate-spot-5']));
			$newoptions['block'] = strip_tags(stripslashes($_POST['adrotate-block-5']));
			$newoptions['column'] = strip_tags(stripslashes($_POST['adrotate-column-5']));
			$newoptions['banner'] = strip_tags(stripslashes($_POST['adrotate-banner-5']));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_adrotate_5', $options);
		}
		$title = attribute_escape($options['title']);
		$group = attribute_escape($options['group']);
		$spot = attribute_escape($options['spot']);
		$block = attribute_escape($options['block']);
		$column = attribute_escape($options['column']);
		$banner = attribute_escape($options['banner']);
	?>
			<p>
				<label for="adrotate-title-5">Title: <input class="widefat" id="adrotate-title-5" name="adrotate-title-5" type="text" value="<?php echo $title; ?>" /></label>
				<br />
				<small>HTML will be stripped out.</small>
			</p>
			<p>
				<label for="adrotate-group-5">Group: <input  class="widefat" id="adrotate-group-5" name="adrotate-group-5" type="text" value="<?php echo $group; ?>" /></label>
				<br />
				<small>Group ID.</small>
			</p>
			<p>
				<label for="adrotate-spot-5">Spot: <input  class="widefat" id="adrotate-spot-5" name="adrotate-spot-5" type="text" value="<?php echo $spot; ?>" /></label>
				<br />
				<small>Spot ID.</small>
			</p>
			<p>
				<label for="adrotate-banner-5">Banner (Optional): <input class="widefat" id="adrotate-banner-5" name="adrotate-banner-5" type="text" value="<?php echo $banner; ?>" /></label>
				<br />
				<small>Leave empty for multiple groups or when using a block! Do NOT enter multiple numbers here!</small>
			</p>
			<p>
				<label for="adrotate-block-5">Block (Optional): <input  class="widefat" id="adrotate-block-5" name="adrotate-block-5" type="text" value="<?php echo $block; ?>" /></label>
				<br />
				<small>Sets the amount of banners in a block.</small>
			</p>
			<p>
				<label for="adrotate-column-5">Columns (Optional): <input  class="widefat" id="adrotate-column-5" name="adrotate-column-5" type="text" value="<?php echo $column; ?>" /></label>
				<br />
				<small>Define how many columns your ad-block has.</small>
			</p>
			<input type="hidden" id="adrotate-submit" name="adrotate-submit-5" value="1" />
	<?php
	}


	$widget_ops_5 = array('classname' => 'adrotate_widget_5', 'description' => "Add banners in the sidebar." );
	wp_register_sidebar_widget('AdRotate_5', 'AdRotate 5', 'adrotate_widget_5', $widget_ops_5);
	wp_register_widget_control('AdRotate_5', 'AdRotate 5', 'adrotate_widget_control_5' );
}

/*-------------------------------------------------------------
 Name:      adrotate_widget_init_6

 Purpose:   Widget for the sidebar
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_widget_init_6() {

	if ( !function_exists('register_sidebar_widget') )
		return;
	if ( !function_exists('adrotate_banner') )
		return;

	function adrotate_widget_6($args) {
		$options = get_option('widget_adrotate_6');
		extract($args);

		/* echo $before_widget . $before_title . $options['title'] . $after_title;
		echo '<ul><li>';*/
			echo adrotate_banner($options['group'], $options['spot'], $options['banner'], $options['block'], $options['column'], false);
		/*echo '</li></ul>';
		echo $after_widget;*/

	}

	function adrotate_widget_control_6() {
		$options = $newoptions = get_option('widget_adrotate_6');
		if ( $_POST['adrotate-submit-6'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['adrotate-title-6']));
			$newoptions['group'] = strip_tags(stripslashes($_POST['adrotate-group-6']));
			
			$newoptions['spot'] = strip_tags(stripslashes($_POST['adrotate-spot-6']));
			$newoptions['block'] = strip_tags(stripslashes($_POST['adrotate-block-6']));
			$newoptions['column'] = strip_tags(stripslashes($_POST['adrotate-column-6']));
			$newoptions['banner'] = strip_tags(stripslashes($_POST['adrotate-banner-6']));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_adrotate_6', $options);
		}
		$title = attribute_escape($options['title']);
		$group = attribute_escape($options['group']);
		$spot = attribute_escape($options['spot']);
		$block = attribute_escape($options['block']);
		$column = attribute_escape($options['column']);
		$banner = attribute_escape($options['banner']);
	?>
			<p>
				<label for="adrotate-title-6">Title: <input class="widefat" id="adrotate-title-6" name="adrotate-title-6" type="text" value="<?php echo $title; ?>" /></label>
				<br />
				<small>HTML will be stripped out.</small>
			</p>
			<p>
				<label for="adrotate-group-6">Group: <input  class="widefat" id="adrotate-group-6" name="adrotate-group-6" type="text" value="<?php echo $group; ?>" /></label>
				<br />
				<small>Group ID.</small>
			</p>
			<p>
				<label for="adrotate-spot-6">Spot: <input  class="widefat" id="adrotate-spot-6" name="adrotate-spot-6" type="text" value="<?php echo $spot; ?>" /></label>
				<br />
				<small>Spot ID.</small>
			</p>
			<p>
				<label for="adrotate-banner-6">Banner (Optional): <input class="widefat" id="adrotate-banner-6" name="adrotate-banner-6" type="text" value="<?php echo $banner; ?>" /></label>
				<br />
				<small>Leave empty for multiple groups or when using a block! Do NOT enter multiple numbers here!</small>
			</p>
			<p>
				<label for="adrotate-block-6">Block (Optional): <input  class="widefat" id="adrotate-block-6" name="adrotate-block-6" type="text" value="<?php echo $block; ?>" /></label>
				<br />
				<small>Sets the amount of banners in a block.</small>
			</p>
			<p>
				<label for="adrotate-column-6">Columns (Optional): <input  class="widefat" id="adrotate-column-6" name="adrotate-column-6" type="text" value="<?php echo $column; ?>" /></label>
				<br />
				<small>Define how many columns your ad-block has.</small>
			</p>
			<input type="hidden" id="adrotate-submit" name="adrotate-submit-6" value="1" />
	<?php
	}


	$widget_ops_6 = array('classname' => 'adrotate_widget_6', 'description' => "Add banners in the sidebar." );
	wp_register_sidebar_widget('AdRotate_6', 'AdRotate 6', 'adrotate_widget_6', $widget_ops_6);
	wp_register_widget_control('AdRotate_6', 'AdRotate 6', 'adrotate_widget_control_6' );
}

/*-------------------------------------------------------------
 Name:      adrotate_widget_init_7

 Purpose:   Widget for the sidebar
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_widget_init_7() {

	if ( !function_exists('register_sidebar_widget') )
		return;
	if ( !function_exists('adrotate_banner') )
		return;

	function adrotate_widget_7($args) {
		$options = get_option('widget_adrotate_7');
		extract($args);

		/* echo $before_widget . $before_title . $options['title'] . $after_title;
		echo '<ul><li>';*/
			echo adrotate_banner($options['group'], $options['spot'], $options['banner'], $options['block'], $options['column'], false);
		/*echo '</li></ul>';
		echo $after_widget;*/

	}

	function adrotate_widget_control_7() {
		$options = $newoptions = get_option('widget_adrotate_7');
		if ( $_POST['adrotate-submit-7'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['adrotate-title-7']));
			$newoptions['group'] = strip_tags(stripslashes($_POST['adrotate-group-7']));
			
			$newoptions['spot'] = strip_tags(stripslashes($_POST['adrotate-spot-7']));
			$newoptions['block'] = strip_tags(stripslashes($_POST['adrotate-block-7']));
			$newoptions['column'] = strip_tags(stripslashes($_POST['adrotate-column-7']));
			$newoptions['banner'] = strip_tags(stripslashes($_POST['adrotate-banner-7']));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_adrotate_7', $options);
		}
		$title = attribute_escape($options['title']);
		$group = attribute_escape($options['group']);
		$spot = attribute_escape($options['spot']);
		$block = attribute_escape($options['block']);
		$column = attribute_escape($options['column']);
		$banner = attribute_escape($options['banner']);
	?>
			<p>
				<label for="adrotate-title-7">Title: <input class="widefat" id="adrotate-title-7" name="adrotate-title-7" type="text" value="<?php echo $title; ?>" /></label>
				<br />
				<small>HTML will be stripped out.</small>
			</p>
			<p>
				<label for="adrotate-group-7">Group: <input  class="widefat" id="adrotate-group-7" name="adrotate-group-7" type="text" value="<?php echo $group; ?>" /></label>
				<br />
				<small>Group ID.</small>
			</p>
			<p>
				<label for="adrotate-spot-7">Spot: <input  class="widefat" id="adrotate-spot-7" name="adrotate-spot-7" type="text" value="<?php echo $spot; ?>" /></label>
				<br />
				<small>Spot ID.</small>
			</p>
			<p>
				<label for="adrotate-banner-7">Banner (Optional): <input class="widefat" id="adrotate-banner-7" name="adrotate-banner-7" type="text" value="<?php echo $banner; ?>" /></label>
				<br />
				<small>Leave empty for multiple groups or when using a block! Do NOT enter multiple numbers here!</small>
			</p>
			<p>
				<label for="adrotate-block-7">Block (Optional): <input  class="widefat" id="adrotate-block-7" name="adrotate-block-7" type="text" value="<?php echo $block; ?>" /></label>
				<br />
				<small>Sets the amount of banners in a block.</small>
			</p>
			<p>
				<label for="adrotate-column-7">Columns (Optional): <input  class="widefat" id="adrotate-column-7" name="adrotate-column-7" type="text" value="<?php echo $column; ?>" /></label>
				<br />
				<small>Define how many columns your ad-block has.</small>
			</p>
			<input type="hidden" id="adrotate-submit" name="adrotate-submit-7" value="1" />
	<?php
	}


	$widget_ops_7 = array('classname' => 'adrotate_widget_7', 'description' => "Add banners in the sidebar." );
	wp_register_sidebar_widget('AdRotate_7', 'AdRotate 7', 'adrotate_widget_7', $widget_ops_7);
	wp_register_widget_control('AdRotate_7', 'AdRotate 7', 'adrotate_widget_control_7' );
}

/*-------------------------------------------------------------
 Name:      adrotate_widget_init_8

 Purpose:   Widget for the sidebar
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_widget_init_8() {

	if ( !function_exists('register_sidebar_widget') )
		return;
	if ( !function_exists('adrotate_banner') )
		return;

	function adrotate_widget_8($args) {
		$options = get_option('widget_adrotate_8');
		extract($args);

		/* echo $before_widget . $before_title . $options['title'] . $after_title;
		echo '<ul><li>';*/
			echo adrotate_banner($options['group'], $options['spot'], $options['banner'], $options['block'], $options['column'], false);
		/*echo '</li></ul>';
		echo $after_widget;*/

	}

	function adrotate_widget_control_8() {
		$options = $newoptions = get_option('widget_adrotate_8');
		if ( $_POST['adrotate-submit-8'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['adrotate-title-8']));
			$newoptions['group'] = strip_tags(stripslashes($_POST['adrotate-group-8']));
			
			$newoptions['spot'] = strip_tags(stripslashes($_POST['adrotate-spot-8']));
			$newoptions['block'] = strip_tags(stripslashes($_POST['adrotate-block-8']));
			$newoptions['column'] = strip_tags(stripslashes($_POST['adrotate-column-8']));
			$newoptions['banner'] = strip_tags(stripslashes($_POST['adrotate-banner-8']));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_adrotate_8', $options);
		}
		$title = attribute_escape($options['title']);
		$group = attribute_escape($options['group']);
		$spot = attribute_escape($options['spot']);
		$block = attribute_escape($options['block']);
		$column = attribute_escape($options['column']);
		$banner = attribute_escape($options['banner']);
	?>
			<p>
				<label for="adrotate-title-8">Title: <input class="widefat" id="adrotate-title-8" name="adrotate-title-8" type="text" value="<?php echo $title; ?>" /></label>
				<br />
				<small>HTML will be stripped out.</small>
			</p>
			<p>
				<label for="adrotate-group-8">Group: <input  class="widefat" id="adrotate-group-8" name="adrotate-group-8" type="text" value="<?php echo $group; ?>" /></label>
				<br />
				<small>Group ID.</small>
			</p>
			<p>
				<label for="adrotate-spot-8">Spot: <input  class="widefat" id="adrotate-spot-8" name="adrotate-spot-8" type="text" value="<?php echo $spot; ?>" /></label>
				<br />
				<small>Spot ID.</small>
			</p>
			<p>
				<label for="adrotate-banner-8">Banner (Optional): <input class="widefat" id="adrotate-banner-8" name="adrotate-banner-8" type="text" value="<?php echo $banner; ?>" /></label>
				<br />
				<small>Leave empty for multiple groups or when using a block! Do NOT enter multiple numbers here!</small>
			</p>
			<p>
				<label for="adrotate-block-8">Block (Optional): <input  class="widefat" id="adrotate-block-8" name="adrotate-block-8" type="text" value="<?php echo $block; ?>" /></label>
				<br />
				<small>Sets the amount of banners in a block.</small>
			</p>
			<p>
				<label for="adrotate-column-8">Columns (Optional): <input  class="widefat" id="adrotate-column-8" name="adrotate-column-8" type="text" value="<?php echo $column; ?>" /></label>
				<br />
				<small>Define how many columns your ad-block has.</small>
			</p>
			<input type="hidden" id="adrotate-submit" name="adrotate-submit-8" value="1" />
	<?php
	}


	$widget_ops_8 = array('classname' => 'adrotate_widget_8', 'description' => "Add banners in the sidebar." );
	wp_register_sidebar_widget('AdRotate_8', 'AdRotate 8', 'adrotate_widget_8', $widget_ops_8);
	wp_register_widget_control('AdRotate_8', 'AdRotate 8', 'adrotate_widget_control_8' );
}

/*-------------------------------------------------------------
 Name:      adrotate_widget_init_9

 Purpose:   Widget for the sidebar
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_widget_init_9() {

	if ( !function_exists('register_sidebar_widget') )
		return;
	if ( !function_exists('adrotate_banner') )
		return;

	function adrotate_widget_9($args) {
		$options = get_option('widget_adrotate_9');
		extract($args);

		/* echo $before_widget . $before_title . $options['title'] . $after_title;
		echo '<ul><li>';*/
			echo adrotate_banner($options['group'], $options['spot'], $options['banner'], $options['block'], $options['column'], false);
		/*echo '</li></ul>';
		echo $after_widget;*/

	}

	function adrotate_widget_control_9() {
		$options = $newoptions = get_option('widget_adrotate_9');
		if ( $_POST['adrotate-submit-9'] ) {
			$newoptions['title'] = strip_tags(stripslashes($_POST['adrotate-title-9']));
			$newoptions['group'] = strip_tags(stripslashes($_POST['adrotate-group-9']));
			
			$newoptions['spot'] = strip_tags(stripslashes($_POST['adrotate-spot-9']));
			$newoptions['block'] = strip_tags(stripslashes($_POST['adrotate-block-9']));
			$newoptions['column'] = strip_tags(stripslashes($_POST['adrotate-column-9']));
			$newoptions['banner'] = strip_tags(stripslashes($_POST['adrotate-banner-9']));
		}
		if ( $options != $newoptions ) {
			$options = $newoptions;
			update_option('widget_adrotate_9', $options);
		}
		$title = attribute_escape($options['title']);
		$group = attribute_escape($options['group']);
		$spot = attribute_escape($options['spot']);
		$block = attribute_escape($options['block']);
		$column = attribute_escape($options['column']);
		$banner = attribute_escape($options['banner']);
	?>
			<p>
				<label for="adrotate-title-9">Title: <input class="widefat" id="adrotate-title-9" name="adrotate-title-9" type="text" value="<?php echo $title; ?>" /></label>
				<br />
				<small>HTML will be stripped out.</small>
			</p>
			<p>
				<label for="adrotate-group-9">Group: <input  class="widefat" id="adrotate-group-9" name="adrotate-group-9" type="text" value="<?php echo $group; ?>" /></label>
				<br />
				<small>Group ID.</small>
			</p>
			<p>
				<label for="adrotate-spot-9">Spot: <input  class="widefat" id="adrotate-spot-9" name="adrotate-spot-9" type="text" value="<?php echo $spot; ?>" /></label>
				<br />
				<small>Spot ID.</small>
			</p>
			<p>
				<label for="adrotate-banner-9">Banner (Optional): <input class="widefat" id="adrotate-banner-9" name="adrotate-banner-9" type="text" value="<?php echo $banner; ?>" /></label>
				<br />
				<small>Leave empty for multiple groups or when using a block! Do NOT enter multiple numbers here!</small>
			</p>
			<p>
				<label for="adrotate-block-9">Block (Optional): <input  class="widefat" id="adrotate-block-9" name="adrotate-block-9" type="text" value="<?php echo $block; ?>" /></label>
				<br />
				<small>Sets the amount of banners in a block.</small>
			</p>
			<p>
				<label for="adrotate-column-9">Columns (Optional): <input  class="widefat" id="adrotate-column-9" name="adrotate-column-9" type="text" value="<?php echo $column; ?>" /></label>
				<br />
				<small>Define how many columns your ad-block has.</small>
			</p>
			<input type="hidden" id="adrotate-submit" name="adrotate-submit-9" value="1" />
	<?php
	}


	$widget_ops_9 = array('classname' => 'adrotate_widget_9', 'description' => "Add banners in the sidebar." );
	wp_register_sidebar_widget('AdRotate_9', 'AdRotate 9', 'adrotate_widget_9', $widget_ops_9);
	wp_register_widget_control('AdRotate_9', 'AdRotate 9', 'adrotate_widget_control_9' );
}

/*-------------------------------------------------------------
 Name:      adrotate_dashboard_widget

 Purpose:   Add a WordPress dashboard widget
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_dashboard_widget() {
	wp_add_dashboard_widget( 'adrotate_stats_widget', 'Adrotate', 'adrotate_stats_widget' );
	wp_add_dashboard_widget( 'meandmymac_rss_widget', 'Meandmymac.net RSS Feed', 'meandmymac_rss_widget' );
}


/*-------------------------------------------------------------
 Name:      adrotate_stats_widget

 Purpose:   AdRotate stats
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_stats_widget() {
	global $wpdb;

	$timezone = get_option('gmt_offset')*3600;
	$url = get_option('siteurl');
	?>
		<style type="text/css" media="screen">
		#adrotate_stats_widget h4 {
			font-family: "Lucida Grande", Verdana, Arial, "Bitstream Vera Sans", sans-serif;
			float: left;
			width: 7em;
			clear: both;
			font-weight: normal;
			text-align: right;
			padding-top: 5px;
			font-size: 12px;
		}

		#adrotate_stats_widget h4 label {
			margin-right: 10px;
			font-weight: bold;
		}

		#adrotate_stats_widget .text-wrap {
			padding-top: 5px;
			margin: 0 0 1em 5em;
			display: block;
		}
		</style>
	<?php

	$banners = $wpdb->get_var("SELECT COUNT(*) FROM `".$wpdb->prefix."adrotate` ORDER BY `id`");
	if($banners > 0) { ?>
			<?php $thebest = $wpdb->get_row("SELECT `title`, `clicks` FROM `".$wpdb->prefix."adrotate` WHERE `tracker` = 'Y' ORDER BY `clicks` DESC LIMIT 1"); ?>
			<h4><label for="Best">The best</label></h4>
			<div class="text-wrap">
				<?php echo $thebest->title; ?> with <?php echo $thebest->clicks; ?> clicks.
			</div>

			<h4><label for="Worst">The worst</label></h4>
			<?php $theworst = $wpdb->get_row("SELECT `title`, `clicks` FROM `".$wpdb->prefix."adrotate` WHERE `tracker` = 'Y' ORDER BY `clicks` ASC LIMIT 1"); ?>
			<div class="text-wrap">
				<?php echo $theworst->title; ?> with <?php echo $theworst->clicks; ?> clicks.
			</div>

			<h4><label for="Average">Average</label></h4>
			<?php
			$clicks = $wpdb->get_var("SELECT SUM(clicks) FROM `".$wpdb->prefix."adrotate` WHERE `tracker` = 'Y'");
			$banners = $wpdb->get_var("SELECT COUNT(*) FROM `".$wpdb->prefix."adrotate` WHERE `tracker` = 'Y'");
			?>
			<div class="text-wrap">
				<?php if($banners < 1 OR $clicks < 1) {
					echo '0';
				} else {
					$average = $clicks / $banners;
					echo round($average, 2);
				} ?> clicks on all banners.
			</div>

			<h4><label for="More">More...</label></h4>
			<?php
			$impressions = $wpdb->get_var("SELECT SUM(shown) FROM `".$wpdb->prefix."adrotate`");
			$clicks2 = $wpdb->get_var("SELECT SUM(clicks) FROM `".$wpdb->prefix."adrotate` WHERE `tracker` = 'Y'");
			?>
			<div class="text-wrap">
				<?php if($impressions > 0 AND $clicks2 > 0) {
					$ctr = round((100/$impressions)*$clicks2, 2);
				} else {
					$ctr = 0;
				}
				echo $impressions.' impressions and '.$clicks2.' clicks. CTR of '.$ctr.'%.'; ?>
			</div>

			<h4><label for="Last5">The last 5</label></h4>
			<?php
			$lastfive = $wpdb->get_results("SELECT `timer`, `bannerid` FROM `".$wpdb->prefix."adrotate_tracker` ORDER BY `timer` DESC LIMIT 5");
			?>
			<div class="text-wrap">
				<?php
				if(count($lastfive) > 0) {
					foreach($lastfive as $last) {
						$bannertitle = $wpdb->get_var("SELECT `title` FROM `".$wpdb->prefix."adrotate` WHERE `id` = '$last->bannerid'");
						echo date('d-m-Y', $last->timer) .', '. $bannertitle .'<br />';
					}
				} else {
				?>
				<em>No clicks in the past 24 hours</em>
				<?php } ?>
			</div>

			<div style="padding-top: .5em">
				<p><a href="admin.php?page=adrotate" class="button">Manage Banners</a>&nbsp;&nbsp;<a href="admin.php?page=adrotate2" class="button">Add Banner</a></p>
			</div>

	<?php } else { ?>
		<span style="font-style: italic;">There are no banners yet. <a href="admin.php?page=adrotate2">Add some banners now</a>!</span>
	<?php } ?>
<?php
}

/*-------------------------------------------------------------
 Name:      meandmymac_rss_widget

 Purpose:   Shows the Meandmymac RSS feed on the dashboard
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
if(!function_exists('meandmymac_rss_widget')) {
	function meandmymac_rss_widget() {
	/*	?>
			<style type="text/css" media="screen">
			#meandmymac_rss_widget .text-wrap {
				padding-top: 5px;
				margin: 0.5em;
				display: block;
			}
			</style>
		<?php
		$rss = meandmymac_rss('http://meandmymac.net/feed/');
		$loop = 1;
		foreach($rss as $key => $item) { ?>
				<div class="text-wrap">
					<a href="<?php echo $item['link']; ?>" target="_blank"><?php echo $item['title']; ?></a> on <?php echo $item['date']; ?>.
				</div>
	<?php
			$loop++;
		} */
	}
}
>>>>>>> origin/master
?>