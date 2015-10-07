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
    // Read in existing option value from database
    $opt_val = get_option( $opt_name );
	$opt_val1 = get_option( $opt_name1 );
	$opt_val2 = get_option( $opt_name2 );

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

if($updated == "1"){
echo '<div class="updated"><p><strong>Settings saved</strong></p></div>';
}


    // Now display the settings editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>eSchool Media Settings</h2>";

    // settings form
    ?>

<form name="form1" method="post" action="">
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
</p><hr />

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
</p>

</form>
</div>


<?php 
}
?>