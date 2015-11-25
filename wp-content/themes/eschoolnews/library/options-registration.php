<?php 
/**
Registration Options Menu for storing site specific data.



// Hook for adding admin menus
add_action('admin_menu', 'reg_add_pages');

// action function for above hook
function reg_add_pages() {
    // Add a new submenu under Settings:
    add_options_page(__('Visit Logging','svl-menu'), __('Reg Form Settings','svl-menu'), 'manage_options', 'sf_visit_logger', 'reg_settings_page');
}

// svl_settings_page() displays the page content for the Visit Logging submenu
function reg_settings_page() { echo 'Hi'; }

*/

add_action( 'admin_menu', 'register_esm_menu_page' );
	$iconpath = get_template_directory_uri() . 'assets/images/icons/esm-sf-icon.png';
	
function register_esm_menu_page(){
	add_menu_page( 'eSchool Media Settings', 'eSM Settings', 'manage_options', 'custompage', 'esm_menu_page', get_template_directory_uri() . '/assets/images/icons/esm-sf-icon.png', 1); 
}
function esm_transient_delete( $clear_all ) {

	$cleaned = 0;

	global $_wp_using_ext_object_cache;

	if ( !$_wp_using_ext_object_cache ) {

		$options = atc_get_options();

		global $wpdb;

		// Build and execute required SQL

		//if ( $clear_all ) {

			$sql = "DELETE FROM $wpdb->options WHERE option_name LIKE '_transient_%'";
			$clean = $wpdb -> query( $sql );

		/* } else {

			$sql = "
				DELETE
					a, b
				FROM
					{$wpdb->options} a, {$wpdb->options} b
				WHERE
					a.option_name LIKE '_transient_%' AND
					a.option_name NOT LIKE '_transient_timeout_%' AND
					b.option_name = CONCAT(
						'_transient_timeout_',
						SUBSTRING(
							a.option_name,
							CHAR_LENGTH('_transient_') + 1
						)
					)
				AND b.option_value < UNIX_TIMESTAMP()
			";

			$clean = $wpdb -> query( $sql );

			$sql = "
				DELETE
					a, b
				FROM
					{$wpdb->options} a, {$wpdb->options} b
				WHERE
					a.option_name LIKE '_site_transient_%' AND
					a.option_name NOT LIKE '_site_transient_timeout_%' AND
					b.option_name = CONCAT(
						'_site_transient_timeout_',
						SUBSTRING(
							a.option_name,
							CHAR_LENGTH('_site_transient_') + 1
						)
					)
				AND b.option_value < UNIX_TIMESTAMP()
			";

			$clean = $wpdb -> query( $sql );
		} */

		// Save options field with number & timestamp

		$results[ 'timestamp' ] = time() + ( get_option( 'gmt_offset' ) * 3600 );

		$option_name = 'transient_clean_';
		if ( $clear_all ) { $option_name .= 'all'; } else { $option_name .= 'expired'; }
		update_option( $option_name, $results );

		// Optimize the table after the deletions

		if ( ( ( $options[ 'upgrade_optimize' ] ) && ( $clear_all ) ) or ( ( $options[ 'clean_optimize' ] ) && ( !$clear_all ) ) ) {
			$wpdb -> query( "OPTIMIZE TABLE $wpdb->options" );
		}
	}

	return $cleaned;
}

$clearcache = $_GET['clearcache'];
if($clearcache){esm_transient_delete( 'clear_all' );
echo '<div class="updated"><p><strong>Cache Cleared</strong></p></div>';
}


function esm_menu_page(){ 
    //must check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }
    // variables for the field and option names 
    $opt_name = 'esm_agile_1_prereg_form'; //Agile Registration Step 1
    $hidden_field_name = 'esm_agile_1_prereg_form_submit';
    $data_field_name = 'esm_agile_1_prereg_form';
    $opt_name1 = 'esm_agile_2_prereg_form'; //Agile Registration Step 2
    $hidden_field_name1 = 'esm_agile_2_prereg_form_submit';
    $data_field_name1 = 'esm_agile_2_prereg_form';
    $opt_name2 = 'esm_gravity_sf_reg_form'; //Registration Form
    $hidden_field_name2 = 'esm_gravity_sf_reg_form_submit';
    $data_field_name2 = 'esm_gravity_sf_reg_form';		

    $opt_name3 = 'esm_gravity_sf_subscribe'; //Registration Form
    $hidden_field_name3 = 'esm_gravity_sf_subscribe_submit';
    $data_field_name3 = 'esm_gravity_sf_subscribe_form';		

    $opt_name4 = 'esm_top_story_exclude'; 
    $hidden_field_name4 = 'esm_top_story_exclude_submit';
    $data_field_name4 = 'esm_top_story_exclude_form';	

    // Read in existing option value from database
    $opt_val = get_option( $opt_name );
	$opt_val1 = get_option( $opt_name1 );
	$opt_val2 = get_option( $opt_name2 );
	$opt_val3 = get_option( $opt_name3 );
	$opt_val4 = get_option( $opt_name4 );

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
$updated = 0;	
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        $opt_val = $_POST[ $data_field_name ];

        // Save the posted value in the database
        update_option( $opt_name, $opt_val );

        // Put an settings updated message on the screen
		
		$updated = 1;

    }
   if( isset($_POST[ $hidden_field_name1 ]) && $_POST[ $hidden_field_name1 ] == 'Y' ) {
        // Read their posted value
        $opt_val1 = $_POST[ $data_field_name1 ];

        // Save the posted value in the database
        update_option( $opt_name1, $opt_val1 );

        // Put an settings updated message on the screen
		
		$updated = 1;

    }
    if( isset($_POST[ $hidden_field_name2 ]) && $_POST[ $hidden_field_name2 ] == 'Y' ) {
        // Read their posted value
        $opt_val2 = $_POST[ $data_field_name2 ];

        // Save the posted value in the database
        update_option( $opt_name2, $opt_val2 );

        // Put an settings updated message on the screen
		
		$updated = 1;

    }	


   if( isset($_POST[ $hidden_field_name3 ]) && $_POST[ $hidden_field_name3 ] == 'Y' ) {
        // Read their posted value
        $opt_val3 = $_POST[ $data_field_name3 ];

        // Save the posted value in the database
        update_option( $opt_name3, $opt_val3 );

        // Put an settings updated message on the screen
		
		$updated = 1;

    }

   if( isset($_POST[ $hidden_field_name4 ]) && $_POST[ $hidden_field_name4 ] == 'Y' ) {
        // Read their posted value
        $opt_val4 = $_POST[ $data_field_name4 ];

        // Save the posted value in the database
        update_option( $opt_name4, $opt_val4 );

        // Put an settings updated message on the screen
		
		$updated = 1;

    }


if($updated == "1"){
echo '<div class="updated"><p><strong>Settings saved</strong></p></div>';
}


    // Now display the settings editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>eSchool Media Settings</h2>";

    // settings form
    ?>


<h3>Remove All Transients</h3>
<?php
global $wpdb;
$total_transients = $wpdb -> get_var( "SELECT COUNT(*) FROM $wpdb->options WHERE option_name LIKE '%_transient_timeout_%'" );
$text =  sprintf( __( 'There are currently %s timed transients in the database.', 'transient-cleaner' ), $total_transients );

if ( $total_transients > 0 ) {

	$expired_transients = $wpdb -> get_var( "SELECT COUNT(*) FROM $wpdb->options WHERE option_name LIKE '%_transient_timeout_%' AND option_value < UNIX_TIMESTAMP()" );
	$text .= ' ' . sprintf( __( '%s have expired.', 'transient-cleaner' ), $expired_transients );

} 
echo '<p>' . $text . '</p>';
?>


<p><button class="button-primary"><a style="color:#FFFFFF" href="?page=custompage&clearcache">Click to clear eSM Page cache</a></button></p>



<form name="form1" method="post" action="">
<p>

<input type="hidden" name="<?php echo $hidden_field_name4; ?>" value="Y">
<label style="width:300px" for="<?php echo $data_field_name4; ?>">Categories to exclude from top story archive page (by id comma delimited):</label>
 <input type="text" name="<?php echo $data_field_name4; ?>" value="<?php echo $opt_val4; ?>" ><br>

</p>


<p>In order to use the registration form you need to import the forms to use into Gravity Forms.<br>
 <a href="<?php echo get_template_directory_uri() . '/library/gravityforms-registration-forms.zip'; ?>">Click here to download a zipped file that contains the forms</a>. 
<p>
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">
<label style="width:300px" for="<?php echo $data_field_name; ?>">Agile Registration Preform Step 1 Form ID (Agile Registration Step 1):</label>
 <input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>" ><br>

<input type="hidden" name="<?php echo $hidden_field_name1; ?>" value="Y">
<label style="width:300px" for="<?php 
echo $data_field_name1; ?>">Agile Registration Preform Step 2 Form ID (Agile Registration Step 2):</label>
 <input type="text" name="<?php 
echo $data_field_name1; ?>" value="<?php echo $opt_val1; ?>" ><br>

<input type="hidden" name="<?php echo $hidden_field_name2; ?>" value="Y">
<label for="<?php echo $data_field_name2; ?>">Registration Form ID (Compact Registration):</label>
 <input type="text" name="<?php echo $data_field_name2; ?>" value="<?php echo $opt_val2; ?>" >
</p>


<p>
<input type="hidden" name="<?php echo $hidden_field_name3; ?>" value="Y">
<label for="<?php echo $data_field_name3; ?>">Email Subscribe Form ID (In Header):</label>
 <input type="text" name="<?php echo $data_field_name3; ?>" value="<?php echo $opt_val3; ?>" >
</p>

<h3>Gravity Forms Multi-Site License:</h3>
<p><strong>e26f56fedf600c61669a9e37a675f5f8</strong></p>

<h3>reCAPTCHA Public Key</h3>
<p><strong>6Lce1L4SAAAAAE-WM95isPqmvKMtPM-ntDstLBQb</strong></p>
<small>Required to use the reCAPTCHA field.</small>

<h3>reCAPTCHA Private Key</h3>
<p><strong>6Lce1L4SAAAAABWtJAb3EEImIQyt2EfFRL6eSo63</strong></p>
<small>Required to use the reCAPTCHA field.</small>



<hr />

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
</p>

</form>

<h2>Automated Webinar Category Move</h2>

<?php
    // variables for the field and option names 
    $webinar_from = 'esm_webinar_from_form'; 
    $esm_webinar_from = 'esm_webinar_from_form_submit';
    $data_webinar_from = 'esm_webinar_from_form';
	
    $webinar_to = 'esm_webinar_to_form'; 
    $esm_webinar_to = 'esm_webinar_to_form_submit';
    $data_webinar_to = 'esm_webinar_to_form';
    
	// Read in existing option value from database
    $webinar_from_val = get_option( $webinar_from );
	$webinar_to_val = get_option( $webinar_to );
	
    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
$updated = 0;	
    if( isset($_POST[ $esm_webinar_from ]) && $_POST[ $esm_webinar_from ] == 'Y' ) {
        // Read their posted value
        $webinar_from_val = $_POST[ $data_webinar_from ];

        // Save the posted value in the database
        update_option( $webinar_from, $webinar_from_val );

        // Put an settings updated message on the screen
		
		
        // Read their posted value
        $webinar_to_val = $_POST[ $data_webinar_to ];

        // Save the posted value in the database
        update_option( $webinar_to, $webinar_to_val );

        // Put an settings updated message on the screen
		
		$updated = 1;

    }
    
if($updatedcategories == "1"){
echo '<div class="updated"><p><strong>Category Settings saved</strong></p></div>';
}



    // Now display the settings editing screen

    echo '<div class="wrap">';

    // header

    echo "<h3>Field Settings</h3>";

    // settings form
    ?>

<form name="form1" method="post" action="">
<p>
Select the category that posts are to move from and to in the Webinar Post Type.
<p>
<?php

	if($webinar_from_val >0){
		$term = get_term( $webinar_from_val, 'status-webinars' );
		
		$from_none_value = $webinar_from_val;
		
		$from_option_none = $term->name;
	} else {
		$from_none_value = -1; $from_option_none = 'Select category';
	}
 $webinar_from_args = array(
	
	'show_option_none' => $from_option_none,
	'option_none_value'  => $from_none_value,
	'orderby'            => 'ID', 
	'order'              => 'ASC',
	'hide_empty'         => 0, 
	'selected'           => 0,
	'hierarchical'       => 0, 
	'name'               => $data_webinar_from,
	'taxonomy'           => 'status-webinars',
	'hide_if_empty'      => false,
	'value_field'	     => 'term_id',	
	);	
	
	if($webinar_to_val >0){
		$term = get_term( $webinar_to_val, 'status-webinars' );
		
		$to_none_value = $webinar_to_val;
		
		$to_option_none = $term->name;
	} else {
		$to_none_value = -1; $to_option_none = 'Select category';
	}



 $webinar_to_args = array(
	
	'show_option_none' => $to_option_none,
	'option_none_value'  => $to_none_value,
	'orderby'            => 'ID', 
	'order'              => 'ASC',
	'hide_empty'         => 0, 
	'selected'           => 0,
	'hierarchical'       => 0, 
	'name'               => $data_webinar_to,
	'taxonomy'           => 'status-webinars',
	'hide_if_empty'      => false,
	'value_field'	     => 'term_id',	
	);
 ?>


<input type="hidden" name="<?php echo $esm_webinar_from; ?>" value="Y">
 <label style="width:300px" for="<?php echo $data_webinar_from; ?>"> Upcoming Webinar Category:</label>
<?php wp_dropdown_categories( $webinar_from_args ); ?>
<br>

<label style="width:300px" for="<?php 
echo $data_webinar_to; ?>">Webinar Archive Category:</label>

<?php wp_dropdown_categories( $webinar_to_args ); ?>
</p>
<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="Save Category Changes" />
</p>

</form>







<?php 
	function esm_movecats() {


global $wpdb;

    echo "<h3>Moved Webinar Items:</h3>";
	// Read in existing option value from database
    $webinar_from_val = get_option( 'esm_webinar_from_form' );
	$webinar_to_val = get_option( 'esm_webinar_to_form' );

$todaydatenum = date('Ymd',time() );

$args = array( 'taxonomy' => 'status-webinars', 'post_type' => 'webinars', 'posts_per_page' => 1000 );
$loop = new WP_Query( $args );
while ( $loop->have_posts() ) : $loop->the_post();
  
  
  $postid = get_the_ID() ;
  $webdate = get_post_meta($postid, 'webinar_date', true);

// An array of IDs of categories we want this post to have.
$cat_ids = array( $webinar_to_val );

$cat_ids = array_map( 'intval', $cat_ids );
$cat_ids = array_unique( $cat_ids );


	if($webdate < $todaydatenum){
		echo get_the_title( $postid ).'<hr>';
		wp_set_object_terms( $postid, $cat_ids, 'status-webinars' );
		
	}


endwhile;


//foreach ($query2 as $item){
 //echo get_the_title( $ID );	
	
//	echo"<pre>";
//	print_r($item);
///	echo"</pre>";
	
//	$webdate = get_post_meta($post->ID, 'webinar_date', true);
	//echo '<h1>'.$webdate.'</h1>';
	
	
	//loop through items and move
	
	//remove from category 1
	
	//change category count
	
	//add to category 2 
	
	//update category count
		
	
//} 


/*
$my_text = "/images";  // What I'm searching for
$my_category = '8';    // The category to change it to


// Get the ID field (which is WordPress's post
// number) from any posts that have your text:
$query = "SELECT ID FROM wp_posts WHERE post_content LIKE '%$my_text%'"; 

// Take those results and go through them:
$result = mysql_query($query) or die(mysql_error());

// While there are results...
while($row = mysql_fetch_array($result))
{
// Verify what we're doing -- changing post
// number such-and-such...
$thisPostHasIt = $row['ID'];
echo "<p>Row " . $row['ID'] . " contains it, so...<br />";

// In the wp_term_relationships table,
// update the category number ("term_taxonomy_id")
// with the category number you specified -- but only
// in one of the "result" rows.
// We look for "object_id" to equal one of those
// rows. (The object_id field refers to the WordPress
// post number, just as the ID field did. Why two
// different names? Who knows?)

mysql_query("UPDATE wp_term_relationships SET term_taxonomy_id='$my_category' WHERE object_id = '$thisPostHasIt'");

// And tell us about it:
echo "Changing post number " . $thisPostHasIt . " to category number ". $my_category . "</p>";
}
echo "<p><b>All done!</b></p>";
		
*/		
		
		
	}
	//register_activation_hook(__FILE__, 'esm_movecats_activation');
	    
if( isset($_POST[ 'ChangeMove' ]) && $_POST[ 'ChangeMove'] == 'Y' ) {
		
		if( isset($_POST[ 'Submit' ]) && $_POST[ 'Submit' ] == 'Activate' ) {
		
			$stamp = mktime(0, 0, 0);
			wp_schedule_event($stamp, 'daily', 'esm_daily_movecat');
		}elseif( isset($_POST[ 'Submit' ]) && $_POST[ 'Submit' ] == 'Deactivate' ) {
		
			wp_clear_scheduled_hook('esm_daily_movecat');
		}elseif( isset($_POST[ 'Submit' ]) && $_POST[ 'Submit' ] == 'Run Move Now' ) {
		
			esm_movecats();
		}				
	
}
	
	
	$CheckSchedule = wp_next_scheduled( 'esm_daily_movecat' );


?>
<p></p>
<?php
//$cron_jobs = get_option( 'cron' );
//var_dump($_POST);
//var_dump($cron_jobs);
echo "<h3>Schedule Setting</h3>";

 if($CheckSchedule){ echo '<p> Scheduled to run at '.gmdate("d/m/Y  H:i:s a", $CheckSchedule).'</p>';}else{echo'<p>Current Status: Deactived</p>';} ?>

<p class="submit">
<form name="form2" method="post" action="">
<input type="hidden" name="ChangeMove" value="Y">
<input type="submit" name="Submit" class="button-primary" value="Activate" />


<input type="submit" name="Submit" class="button-primary" value="Deactivate" />


<input type="submit" name="Submit" class="button-primary" value="Run Move Now" />
</form>


</p>

</div>
<?php
}
?>