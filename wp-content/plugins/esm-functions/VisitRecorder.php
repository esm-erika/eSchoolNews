<<<<<<< HEAD
<?php 
/*
 Plugin Name: eSchool Media Visit Recorder 
 Plugin URI: http://www.eschoolnews.com
 Author: Vince Carlson
 Version: 0.2.0
 */
																						

// 88888888888888888888888888888888888888888888888888888888888888888888888888888888888888
// USER LOGGING
// 88888888888888888888888888888888888888888888888888888888888888888888888888888888888888

// Hook for adding admin menus
add_action('admin_menu', 'svl_add_pages');

// action function for above hook
function svl_add_pages() {
    // Add a new submenu under Settings:
    add_options_page(__('Visit Logging','svl-menu'), __('Visit Logging','svl-menu'), 'manage_options', 'sf_visit_logger', 'svl_settings_page');
}

// svl_settings_page() displays the page content for the Visit Logging submenu
function svl_settings_page() {

    //must check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }

    // variables for the field and option names 
    $opt_name = 'svl_tracked_cats';
    $hidden_field_name = 'svl_submit_hidden';
    $data_field_name = 'svl_tracked_cats';

    // Read in existing option value from database
    $opt_val = get_option( $opt_name );

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        $opt_val = $_POST[ $data_field_name ];

        // Save the posted value in the database
        update_option( $opt_name, $opt_val );

        // Put an settings updated message on the screen

?>
<div class="updated"><p><strong><?php _e('settings saved.', 'svl-menu' ); ?></strong></p></div>
<?php
    }


$updatesfn = $_GET['updatesfnow'];
if( $updatesfn == 'now' ){  

eSNAPCheckLeads(); 

echo '<div class="updated"><p><strong>Lead and Unsubscribe Update Run</h1></strong></p></div>';
}



    // Now display the settings editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __( 'Visit Logging Settings', 'svl-menu' ) . "</h2>";

    // settings form
    ?>

<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<p><?php _e("Categories to Always Track:", 'svl-menu' ); ?> 
<br />
<br />
<a href="/wp-admin/options-general.php?page=sf_visit_logger&updatesfnow=now">Click Manually update leads and Unsubscribes to Salesforce</a>
<br />
<br />
<input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>" size="60">
<br /><em>Comma separated category numbers</em>
</p><hr />

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</p>

</form>
</div>
<h2>Category (id)</h2>
<p style="font-weight:bold">
<?php
	$categories = get_categories();
	foreach ($categories as $cat) {
		if ($cat->category_parent != 0) {
			echo '<span style="padding-left:10px;">';
		}
		echo '<a href="'.get_option('home').get_option('category_base').'/'.$cat->category_nicename.'/">'.$cat->cat_name.'</a> ('.$cat->cat_ID.')';
		if ($cat->category_description != '') {
			echo ' - '.$cat->category_description;
		}
		if ($cat->category_parent != 0) {
			echo '</span>';
		}
		echo '<br />';
	}
echo '</p>';
}



// 88888888888888888888888888888888888888888888888888888888888888888888888888888888888888
// functions to call all other functions when user visits page
// 88888888888888888888888888888888888888888888888888888888888888888888888888888888888888

// check if the page should be tracked
function check_page_advanced_tracking($pageid){
$islead = false;
  $trackeditem = get_post_meta( $pageid, 'page_tracking', true );
  //echo '<h1>'.$pageid.'-'.$trackeditem.'</h1>';
	if ($trackeditem != null) { 
	  if ($trackeditem == 1){ $islead = true; } 
	}
  
		$trackedcats = get_option( 'svl_tracked_cats' );
		$trackedcats = str_replace(" ", "", $trackedcats);
		$catsarray = explode(',', $trackedcats);

		if ( in_category( $catsarray,$pageid)) {
			$islead = true;
	
	}
return $islead;
} // end  check_page_tracking

// 88888888888888888888888888888888888888888888888888888888888888888888888888888888888888
// functions to set user cookies
// 88888888888888888888888888888888888888888888888888888888888888888888888888888888888888

add_action("gform_post_submission", "SF_lead_record", 10, 2);

function SF_lead_record($entry, $form){

if ($entry[1] == 'AutoUpload') {
	$DoAutoUpload = 1;
	//$AutoUploadItem = new stdclass();
	//$AutoUploadItem = array();
	
	$Area__c =$entry[2];
	$astc__c =$entry[3];
	$attachment_id__c =$entry[4];
	$Company__c =$entry[5];
	$Contact__c =$entry[6];
	$cassetid__c =$entry[7];
	$ccampainid__c =$entry[8];
	$esmcampain__c =$entry[9];
	$esmclient__c =$entry[10];
	$gs__c =$entry[11];
	
	$question1 =  explode ( "," , $entry[12]);
	$q1 = $question1[0];
	$q10 = $question1[0].'.1';
	$q1string =$entry[$q1].$entry[$q1.'.1'].' '.$entry[$q1.'.2'].' '.$entry[$q1.'.3'].' '.$entry[$q1.'.4'].' '.$entry[$q1.'.5'].' '.$entry[$q1.'.6'].' '.$entry[$q1.'.7'].' '.$entry[$q1.'.8'].' '.$entry[$q1.'.9'].' '.$entry[$q1.'.10'];

	$q1__c = $question1[1].":".$q1string;
	if(q1__c ==":         "){$q1__c = "";}

	$question2 =  explode ( "," , $entry[13]);
	$q2 = $question2[0];
	$q2string =$entry[$q2].$entry[$q2.'.1'].' '.$entry[$q2.'.2'].' '.$entry[$q2.'.3'].' '.$entry[$q2.'.4'].' '.$entry[$q2.'.5'].' '.$entry[$q2.'.6'].' '.$entry[$q2.'.7'].' '.$entry[$q2.'.8'].' '.$entry[$q2.'.9'].' '.$entry[$q2.'.10'];
	$q2__c = $question2[1].":".$q2string;
	if(q2__c ==":         "){$q2__c = "";}

	$question3 =  explode ( "," , $entry[14]);
	$q3 = $question3[0];
	$q3string =$entry[$q3].$entry[$q3.'.1'].' '.$entry[$q3.'.2'].' '.$entry[$q3.'.3'].' '.$entry[$q3.'.4'].' '.$entry[$q3.'.5'].' '.$entry[$q3.'.6'].' '.$entry[$q3.'.7'].' '.$entry[$q3.'.8'].' '.$entry[$q3.'.9'].' '.$entry[$q3.'.10'];

	$q3__c = $question3[1].":".$q3string;
	if(q3__c ==":         "){$q3__c = "";}
	

	$question4 =  explode ( "," , $entry[15]);
	$q4 = $question4[0];
		$q4string =$entry[$q4].$entry[$q4.'.1'].' '.$entry[$q4.'.2'].' '.$entry[$q4.'.3'].' '.$entry[$q4.'.4'].' '.$entry[$q4.'.5'].' '.$entry[$q4.'.6'].' '.$entry[$q4.'.7'].' '.$entry[$q4.'.8'].' '.$entry[$q4.'.9'].' '.$entry[$q4.'.10'];

	$q4__c = $question4[1].":".$q4string;
	if(q4__c ==":         "){$q4__c = "";}
	

	$question5 =  explode ( "," , $entry[16]);
	$q5 = $question5[0];
	$q5string =$entry[$q5].$entry[$q5.'.1'].' '.$entry[$q5.'.2'].' '.$entry[$q5.'.3'].' '.$entry[$q5.'.4'].' '.$entry[$q5.'.5'].' '.$entry[$q5.'.6'].' '.$entry[$q5.'.7'].' '.$entry[$q5.'.8'].' '.$entry[$q5.'.9'].' '.$entry[$q5.'.10'];
	$q5__c = $question5[1].":".$q5string;
	if(q5__c ==":         "){$q5__c = "";}
	
	$question6 =  explode ( "," , $entry[46]);
	$q6 = $question6[0];
	$q6string =$entry[$q6].$entry[$q6.'.1'].' '.$entry[$q6.'.2'].' '.$entry[$q6.'.3'].' '.$entry[$q6.'.4'].' '.$entry[$q6.'.5'].' '.$entry[$q6.'.6'].' '.$entry[$q6.'.7'].' '.$entry[$q6.'.8'].' '.$entry[$q6.'.9'].' '.$entry[$q6.'.10'];
	$q6__c = $question6[1].":".$q6string;
	if(q6__c ==":         "){$q6__c = "";}
	
	$question7 =  explode ( "," , $entry[47]);
	$q7 = $question7[0];
	$q7string =$entry[$q7].$entry[$q7.'.1'].' '.$entry[$q7.'.2'].' '.$entry[$q7.'.3'].' '.$entry[$q7.'.4'].' '.$entry[$q7.'.5'].' '.$entry[$q7.'.6'].' '.$entry[$q7.'.7'].' '.$entry[$q7.'.8'].' '.$entry[$q7.'.9'].' '.$entry[$q7.'.10'];
	$q7__c = $question7[1].":".$q7string;
	if(q7__c ==":         "){$q7__c = "";}	

	$question8 =  explode ( "," , $entry[48]);
	$q8 = $question8[0];
	$q8string =$entry[$q8].$entry[$q8.'.1'].' '.$entry[$q8.'.2'].' '.$entry[$q8.'.3'].' '.$entry[$q8.'.4'].' '.$entry[$q8.'.5'].' '.$entry[$q8.'.6'].' '.$entry[$q8.'.7'].' '.$entry[$q8.'.8'].' '.$entry[$q8.'.9'].' '.$entry[$q8.'.10'];
	$q8__c = $question8[1].":".$q8string;
	if(q8__c ==":         "){$q8__c = "";}

	$question9 =  explode ( "," , $entry[49]);
	$q9 = $question9[0];
	$q9string =$entry[$q9].$entry[$q9.'.1'].' '.$entry[$q9.'.2'].' '.$entry[$q9.'.3'].' '.$entry[$q9.'.4'].' '.$entry[$q9.'.5'].' '.$entry[$q9.'.6'].' '.$entry[$q9.'.7'].' '.$entry[$q9.'.8'].' '.$entry[$q9.'.9'].' '.$entry[$q9.'.10'];
	$q9__c = $question9[1].":".$q9string;
	if(q9__c ==":         "){$q9__c = "";}

	$question10 =  explode ( "," , $entry[50]);
	$q10 = $question10[0];
	$q10string =$entry[$q10].$entry[$q10.'.1'].' '.$entry[$q10.'.2'].' '.$entry[$q10.'.3'].' '.$entry[$q10.'.4'].' '.$entry[$q10.'.5'].' '.$entry[$q10.'.6'].' '.$entry[$q10.'.7'].' '.$entry[$q10.'.8'].' '.$entry[$q10.'.9'].' '.$entry[$q10.'.10'];
	$q10__c = $question10[1].":".$q10string;
	if(q10__c ==":         "){$q10__c = "";}


	$rtl__c =$entry[17];
	$rtp__c =$entry[18];
	$Site_Name__c =$entry[19];
	$URL__c = $entry[source_url];
	$Visit_DateTime__c =$entry[21];
	$WP_ID__c =$entry[22];
	$WP_Name__c = get_the_title( $WP_ID__c );
	$esmpassvalue = $entry[23];
	$wpuid = $entry[24];	
	
ini_set("soap.wsdl_cache_enabled", "0");
		$USERNAME = "sfdcadmin1@eschoolnews.com"; //- variable that contains your Salesforce.com username (must be in the form of an email)
		$PASSWORD = "eSNadm1n"; //- variable that contains your Salesforce.com password
		$TOKEN = "qhO7UhNTUrYp8XU5eF1SRomDp"; //- variable that contains your Salesforce.com password
		require_once ( ABSPATH . '/soapclient/SforceEnterpriseClient.php');
		require_once ( ABSPATH . '/soapclient/SforceHeaderOptions.php');
		// Salesforce Login information
		$wsdl = ABSPATH . '/soapclient/eSNenterprise.wsdl.xml';
		$mySforceConnectionu = new SforceEnterpriseClient();
		$mySoapClient = $mySforceConnectionu->createConnection($wsdl);
		$mylogin = $mySforceConnectionu->login($USERNAME, $PASSWORD.$TOKEN);	
	
/* echo '<pre>';
print_r($entry);
echo '</pre>';
	
echo '<pre>';
print_r($AutoUploadItem);
echo '</pre>'; */

/* $entry[2] ~~~~~~~~~Area__c^^^^^^^
$entry[3] ~~~~~~~~~astc__c^^^^^^^
$entry[4] ~~~~~~~~~attachment_id__c^^^^^^^
$entry[5] ~~~~~~~~~Company__c^^^^^^^
$entry[6] ~~~~~~~~~Contact__c^^^^^^^
$entry[7] ~~~~~~~~~cassetid__c^^^^^^^
$entry[8] ~~~~~~~~~ccampainid__c^^^^^^^
$entry[9] ~~~~~~~~~esmcampain__c^^^^^^^
$entry[10] ~~~~~~~~~esmclient__c^^^^^^^
$entry[11] ~~~~~~~~~gs__c^^^^^^^
$entry[12] ~~~~~~~~~q1__c^^^^^^^
$entry[13] ~~~~~~~~~q2__c^^^^^^^
$entry[14] ~~~~~~~~~q3__c^^^^^^^
$entry[15] ~~~~~~~~~q4__c^^^^^^^
$entry[16] ~~~~~~~~~q5__c^^^^^^^
$entry[17] ~~~~~~~~~rtl__c^^^^^^^
$entry[18] ~~~~~~~~~rtp__c^^^^^^^
$entry[19] ~~~~~~~~~Site_Name__c^^^^^^^
$entry[20] ~~~~~~~~~URL__c^^^^^^^
$entry[21] ~~~~~~~~~Visit_DateTime__c^^^^^^^
$entry[22] ~~~~~~~~~WP_ID__c^^^^^^^ */
/*if(DoAutoUpload == '1'){ 
	
ini_set("soap.wsdl_cache_enabled", "0");
		$USERNAME = "sfdcadmin1@eschoolnews.com"; //- variable that contains your Salesforce.com username (must be in the form of an email)
		$PASSWORD = "eSNadm1n"; //- variable that contains your Salesforce.com password
		$TOKEN = "qhO7UhNTUrYp8XU5eF1SRomDp"; //- variable that contains your Salesforce.com password
		require_once ( ABSPATH . '/soapclient/SforceEnterpriseClient.php');
		require_once ( ABSPATH . '/soapclient/SforceHeaderOptions.php');
		// Salesforce Login information
		$wsdl = ABSPATH . '/soapclient/eSNenterprise.wsdl.xml';
		$mySforceConnectionL = new SforceEnterpriseClient();
		$mySoapClient = $mySforceConnectionL->createConnection($wsdl);
		$mylogin = $mySforceConnectionL->login($USERNAME, $PASSWORD.$TOKEN);

		$upsertResponse = $mySforceConnectionu->upsert('Email_as_ExternalID__c', array($newperson), 'Account');
	
		if ($upsertResponse->success==1){
		update_user_meta($user_id, "sfid", $upsertResponse->id);
		}

*/
global $wpdb; 
$dtVisit = date('Y-m-d H:i:s');
$siteprefix = $wpdb->prefix;

$wpdb->query( $wpdb->prepare("INSERT INTO esm_lead (Area__c ,astc__c , attachment_id__c, Company__c , Contact__c , cassetid__c , ccampainid__c , esmcampain__c , esmclient__c , gs__c , q1__c , q2__c , q3__c , q4__c , q5__c, q6__c, q7__c, q8__c, q9__c, q10__c, rtl__c,  rtp__c,  Session_Page_Visits__c, Site_Name__c , URL__c , Visit_DateTime__c, WP_ID__c , WP_Name__c , wpuid, pageid, ercid, URL, siteprefix, uploaded, cookie, ip, attachment_id) VALUES (%s,%d,%d,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%d,%d,%d,%s,%s,%s,%s,%s,%d,%d,%s,%s,%s,%s,%s,%s,%d)", $Area__c,$astc__c,$attachment_id__c,$Company__c,$Contact__c,$cassetid__c,$ccampainid__c,$esmcampain__c,$esmclient__c,$gs__c,$q1__c,$q2__c,$q3__c,$q4__c,$q5__c, $q6__c, $q7__c, $q8__c, $q9__c, $q10__c,$rtl__c,$rtp__c,$Session_Page_Visits__c,$Site_Name__c,$URL__c,$dtVisit,$astc__c,$WP_Name__c,$wpuid,$WP_ID__c,$astc__c,$URL__c,$siteprefix,'0',$esmpassvalue,$ip,$attachment_id ) );
	
	// }	
	
 }	

}






function setesmpass_head() {
//ini_set('display_errors',1); 
//error_reporting(E_ALL);

// echo '<h1>!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!</h1>';
		
	if (is_user_logged_in()) {
		// LOGGED IN USER 
		
			$current_user = wp_get_current_user();
			$wpuid = $current_user->ID;
			$sfuid = get_user_meta($wpuid, 'sfid', true ); 
			$PersonContactId = get_user_meta($wpuid, 'PersonContactId', true ); 
			$loggedin = 1;
			//SET COOKIE WE KNOW WHO YOU ARE 
			$esmpassvalue = $loggedin . '-' . $wpuid . '-' . $sfuid . '-' . $PersonContactId;
			setcookie("esmpass", $esmpassvalue, time()+315360000,'/');
		} else {
		// not Logged in
		if (isset($_COOKIE['esmpass'])) { $esmpasscookvals = explode ( "-" , $_COOKIE['esmpass']);  
		if (isset($esmpasscookvals[0]) && is_numeric($esmpasscookvals[0])){ 
		
			if($esmpasscookvals[0] == 1){ $cookienologgedin = 1; } else {$cookienologgedin = 0;} 
		} else {$badcookie = 1;}
		
		if (isset($esmpasscookvals[1]) && filter_var($esmpasscookvals[1], FILTER_VALIDATE_EMAIL)) {$wpuid = '999999999'; } elseif (isset($esmpasscookvals[1]) && is_numeric($esmpasscookvals[1])){ $wpuid = $esmpasscookvals[1]; } else {$badcookie = 1;}
			
			if (isset($esmpasscookvals[2]) && strlen($esmpasscookvals[2]) == 15 || isset($esmpasscookvals[2]) && strlen($esmpasscookvals[2]) == 18 ){
					$sfuid=$esmpasscookvals[2];
				}  else {$badcookie = 1;}
			if (isset($esmpasscookvals[3]) && strlen($esmpasscookvals[3]) == 15 || isset($esmpasscookvals[3]) && strlen($esmpasscookvals[3]) == 18 ){
					$PersonContactId=$esmpasscookvals[3];
		} else {$badcookie = 1;}
		
		}
		
		if ( (isset($_GET['ps']) and $cookienologgedin == 0 )or (isset($_GET['ps']) and $badcookie == 1 )) { $esmpasscookvals = explode ( "-" , $_GET['ps']); 
			
		$esmpasscookvals = explode ( "-" , $_GET['ps']);

			$loggedin = 0;
		
			if (isset($esmpasscookvals[0]) && filter_var($esmpasscookvals[0], FILTER_VALIDATE_EMAIL)) {$wpuid = '999999999'; } elseif (isset($esmpasscookvals[0]) && is_numeric($esmpasscookvals[0])){ $wpuid = $esmpasscookvals[0]; } else {$badps = 2;}
			
			if (isset($esmpasscookvals[1]) && strlen($esmpasscookvals[1]) == 15 || isset($esmpasscookvals[1]) && strlen($esmpasscookvals[1]) == 18 ){
					$sfuid=$esmpasscookvals[1];
				}  else {$badps = 2;}
			if (isset($esmpasscookvals[2]) && strlen($esmpasscookvals[2]) == 15 || isset($esmpasscookvals[2]) && strlen($esmpasscookvals[2]) == 18 ){
					$PersonContactId=$esmpasscookvals[2];
				} else {$badps = 2;}
		

			//SET COOKIE WE KNOW WHO YOU ARE 
 			    if(!$badps == 2){
				$esmpassvalue = $loggedin . '-' . $wpuid . '-' . $sfuid . '-' . $PersonContactId;
				setcookie("esmpass", $esmpassvalue, time()+315360000,'/');
				}elseif($badps == 2 and $badcookie == 1 ){
						setcookie("esmpass", '', time()-10000,'/');
				}
		
		} elseif( $badcookie == 1 ) {
			setcookie("esmpass", '', time()-10000,'/');
		} 
			
	} // end login check
	
// 88888888888888888888888888888888888888888888888888888888888888888888888888888888888888
// function check item for logging level
// 88888888888888888888888888888888888888888888888888888888888888888888888888888888888888
//start with the basics all logging needs
	global $post, $page, $wpdb; 
$pageid = get_the_ID();

$dtDate = date('Ymd');
$dtVisit = date('Y-m-d H:i:s');
$siteprefix = $wpdb->prefix;		
$pagetitle = get_the_title($pageid);
$astcset = $_GET['astc'];
if(!filter_var($astcset, FILTER_VALIDATE_INT))
{//reserved for default ad set
	$astc = 1;
} else {
// Retrieve adset info from page
	$astc = $astcset;	
}
if ( isset($_GET['rtl']) && is_numeric($_GET['rtl']) ) {
	$rtl__c = $_GET['rtl']; }
if ( isset($_GET['rtp']) && is_numeric($_GET['rtp']) ) {
	$rtp__c = $_GET['rtp']; }	

// echo '<h1>!!!!!!!!!!!!!!!!'.$pageid.'!!!!!'.$pagetitle.'!!!!!!!!!!!!!!!</h1>';		
// echo get_the_title($pageid);
// echo '<h1>!New Plugin working!</h1>';	
// echo eSNAPCheckLeads();
if(check_page_advanced_tracking($pageid)){ $trackislead = 1;}
		
	
		 //$pagetrack == '1' or 
	

		//base log vars

		$visits = 1;

		$URL = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		
		if (intval($_GET['ast'])!= 0) {
			$pageadset = intval($_GET['ast']);		
			} else {
			$pageadset=get_post_meta($pageid, '_wp_esmad_template', $single = true);		
		}
		$pagecat = intval($_GET['astc']);
		$pagertp = intval($_GET['rtp']);
		$pagertl = intval($_GET['rtl']);
		$pagegs = $_GET['gs'];
		$pageattachment_id = intval($_GET['attachment_id']);
		
		if(filter_var($pageadset, FILTER_VALIDATE_INT)){ $ercid = $pageadset; } else { $ercid = 0;}
			
		$pagetrack=get_post_meta($pageid, 'page_tracking', $single = true);
	
		if ($pagetrack != null) { 
		  if ($pagetrack == 1){ $trackislead = 1; } 
		}
		if($ercid > 0){ $trackislead = 1; } 
		
		
		$Area__c = 'Site Lead';
		$Site_Name__c = get_bloginfo('name');
if ( $pagecat > 0 or $pagertp > 0 or $pagertl > 0 or $pageadset > 0 or $trackislead > 0 ){ $islead = 1; }	
	//$attachment_id__c,
	//$Company__c,
	//$Contact__c,
	//$cassetid__c,
	//$ccampainid__c,
	//$esmcampain__c,
	//$esmclient__c,
	//$gs__c,
	//$q1__c,
	//$q2__c,
	//$q3__c,
	//$q4__c,
	//$q5__c,
if (current_user_can( 'manage_options' )) { /* echo '<h1>'
.'<br>islead = '.$islead

.'<br>Area__c = '.$Area__c
.'<br>pagecat = '.$pagecat
.'<br>pageattachment_id = '.$pageattachment_id
.'<br>Company__c = '.$Company__c
.'<br>Contact__c = '.$PersonContactId
.'<br>cassetid__c = '.$cassetid__c
.'<br>ccampainid__c = '.$ccampainid__c
.'<br>esmcampain__c = '.$esmcampain__c
.'<br>esmclient__c = '.$esmclient__c
.'<br>gs__c = '.$gs__c
.'<br>q1__c = '.$q1__c
.'<br>q2__c = '.$q2__c
.'<br>q3__c = '.$q3__c
.'<br>q4__c = '.$q4__c
.'<br>q5__c = '.$q5__c
.'<br>pagertl = '.$pagertl
.'<br>pagertp = '.$pagertp
.'<br>Session_Page_Visits__c = '.$Session_Page_Visits__c
.'<br>Site_Name__c = '.$Site_Name__c
.'<br>URL = '.$URL
.'<br>dtVisit = '.$dtVisit
.'<br>wpuid = '.$wpuid
.'<br>WP_Name__c = '.$pagetitle
.'<br>wpuid = '.$wpuid
.'<br>pageid = '.$pageid
.'<br>ercid = '.$ercid
.'<br>URL = '.$URL
.'<br>siteprefix = '.$siteprefix
.'<br>uploaded = '.$uploaded
.'<br>cookie = '.$esmpassvalue
.'<br>ip = '.$ip
.'<br>attachment_id = '.$attachment_id 
.'</h1>'; */ }	
	
	//$Session_Page_Visits__c,
	
	//$Visit_DateTime__c,
	//$WP_ID__c,
	//$WP_Name__c,
	//$wpuid,
	//$pageid,
	//$ercid,
	//$siteprefix,
	//$uploaded,
	//$cookie,
	//$ip,
	//$attachment_id
	
	
		// Read in existing option value from database
	

		
		try {
			$wpdb->query( $wpdb->prepare("INSERT INTO esm_sfl_user (dtDate, dtVisit, sfuid, wpuid, pageid, ercid, URL, pagetitle, visits, siteprefix, PersonContactId, cookie, astc, rtp, rtl, gs, attachment_id) 
			VALUES (%s, %s, %s, %d, %d, %d, %s, %s, %d, %s, %s, %s, %d, %d, %d, %s, %s)", $dtDate, $dtVisit, $sfuid, $wpuid, $pageid, $ercid, $URL, $pagetitle, $visits, $siteprefix, $PersonContactId, $esmpassvalue, $pagecat, $pagertp, $pagertl, $pagegs, $pageattachment_id) );
		} catch (Exception $e) {
		
			$errormessage = 'Caught exception 1: '.  $e->getMessage(). "\n";			//echo '<pre>';
			//echo $errormessage;
			//echo '</pre>';

			mail('vcarlson@eschoolnews.com','Logging Error',$errormessage); 
		
		}
		/* try {
			if($islead == 1){
			$wpdb->query( $wpdb->prepare("INSERT INTO esm_sfl_lead (dtDate, dtVisit, sfuid, wpuid, pageid, ercid, URL, pagetitle, visits, siteprefix, PersonContactId, cookie, astc, rtp, rtl, gs, attachment_id) 
			VALUES (%s, %s, %s, %d, %d, %d, %s, %s, %d, %s, %s, %s, %d, %d, %d, %s, %s)", $dtDate, $dtVisit, $sfuid, $wpuid, $pageid, $ercid, $URL, $pagetitle, $visits, $siteprefix, $PersonContactId, $esmpassvalue, $pagecat, $pagertp, $pagertl, $pagegs, $pageattachment_id) ); }
		} catch (Exception $e) {
		
			$errormessage = 'Caught exception 2: '.  $e->getMessage(). "\n";			//echo '<pre>';
			//echo $errormessage;
			//echo '</pre>';

			mail('vcarlson@eschoolnews.com','Logging Error',$errormessage); 
		
		} */
		

		if ($islead == 1 and strlen($PersonContactId) == 0 and strlen($wpuid) == 0){$islead = 0;}
		try {	
	if($islead == 1){

	$wpdb->query( $wpdb->prepare("INSERT INTO esm_lead (Area__c ,astc__c , attachment_id__c, Company__c , Contact__c , cassetid__c , ccampainid__c , esmcampain__c , esmclient__c , gs__c , q1__c , q2__c , q3__c , q4__c , q5__c , rtl__c,  rtp__c,  Session_Page_Visits__c, Site_Name__c , URL__c , Visit_DateTime__c, WP_ID__c , WP_Name__c , wpuid, pageid, ercid, URL, siteprefix, uploaded, cookie, ip, attachment_id) VALUES (%s,%d,%d,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%d,%d,%d,%s,%s,%s,%s,%s,%d,%d,%s,%s,%s,%s,%s,%s,%d)", $Area__c,$pagecat,$pageattachment_id,$Company__c,$PersonContactId,$cassetid__c,$ccampainid__c,$esmcampain__c,$esmclient__c,$gs__c,$q1__c,$q2__c,$q3__c,$q4__c,$q5__c,$pagertl,$pagertp,$Session_Page_Visits__c,$Site_Name__c,$URL,$dtVisit,$ercid,$pagetitle,$wpuid,$pageid,$ercid,$URL,$siteprefix,'0',$esmpassvalue,$ip,$attachment_id ) );
	
	}
	
	
		} catch (Exception $e) {
		
			$errormessage = 'Caught exception 3: '.  $e->getMessage(). "\n";			//echo '<pre>';
			//echo $errormessage;
			//echo '</pre>';

			mail('vcarlson@eschoolnews.com','Logging Error',$errormessage); 
		
		}
		
		

	

}
add_action('wp_footer', 'setesmpass_head');
//add_action('wp_footer', 'eSNAPCheckLeads');

/* wp lead page end */




function SFDCConnectionVR (){
	ini_set("soap.wsdl_cache_enabled", "0");
	$USERNAME = "sfdcadmin1@eschoolnews.com"; 
	$PASSWORD = "eSNadm1n";
	$TOKEN = "qhO7UhNTUrYp8XU5eF1SRomDp";
	require_once ( ABSPATH . '/soapclient/SforceEnterpriseClient.php');
	require_once ( ABSPATH . '/soapclient/SforceHeaderOptions.php');
	$wsdl = ABSPATH . '/soapclient/eSNenterprise.wsdl.xml';
	$SforceConnection = new SforceEnterpriseClient();
	$SoapClient = $SforceConnection->createConnection($wsdl);
	$login = $SforceConnection->login($USERNAME, $PASSWORD.$TOKEN);	
	
	return $SforceConnection;

}

function eSNAPUpdateLeads($lead){
	
	$Conn = SFDCConnectionVR();
	$output=null;
	$updateResponse = $Conn->create(array($lead), 'Web_Activity__c');
	// echo print_r($lead);
	// echo print_r($updateResponse);
	if ($updateResponse->success==1){
		$output = 1;
			} else {
		$output = 2;	
			}
		return $output; 
}



function eSNAPUpdateUnsub($lead){
	
	$Conn = SFDCConnectionVR();
	$output=null;
	$updateResponse = $Conn->create(array($lead), 'Email_Activity__c');
	// echo print_r($lead);
	// echo print_r($updateResponse);
	if ($updateResponse->success==1){
		$output = 1;
			} else {
		$output = 2;	
			}
		return $output; 
}


// echo '<pre>';
// eSNAPCheckLeads();
// echo '</pre>';

function eSNAPCheckLeads(){

global $wpdb;

//get the max, so we have a defined set to work with
		$maxlead = $wpdb->get_results( 
		"
		SELECT max(esm_lead.IDsfl) AS MaxOfIDsfl
		FROM esm_lead
		"
		);
		$LeadUploadLimit = $maxlead[0]->MaxOfIDsfl; 
// start getting the leads
$Newleads = $wpdb->get_results( 
	"
SELECT (DATE_FORMAT(f.Visit_DateTime__c,'%Y-%m-%dT%TZ')) as Visit_DateTime__c, f.Area__c, f.astc__c, f.attachment_id__c, f.Company__c, f.Contact__c, f.cassetid__c, f.ccampainid__c, f.esmcampain__c, f.esmclient__c, f.gs__c, f.q1__c, f.q2__c, f.q3__c, f.q4__c, f.q5__c, f.rtl__c, f.rtp__c, f.Session_Page_Visits__c, f.Site_Name__c, f.URL__c, f.WP_ID__c, f.WP_Name__c, (f.pageid) as WP_Page_ID__c, (f.URL) as URL__c, f.Contact__c, f.IDsfl, f.uploaded 
  FROM (
   select min(esm_lead.IDsfl) AS FirstOfIDsfl, Contact__c, q1__c, q2__c, q3__c, q4__c, q5__c, rtl__c, rtp__c, Site_Name__c, pageid, ercid, siteprefix, uploaded
   from esm_lead GROUP BY Contact__c, Site_Name__c, pageid, ercid, siteprefix
   HAVING FirstOfIDsfl <= $LeadUploadLimit and uploaded <= 1
	) as x inner join esm_lead as f on f.IDsfl = x.FirstOfIDsfl and f.IDsfl = x.FirstOfIDsfl;
	
	"
	
);

if ( $Newleads )
	{
//print_r($Newleads);
	foreach ( $Newleads as $Newlead )
		{
			
		/* 
		upload lead mark it...
		*/
			if ($Newlead->uploaded == '0'){
			$lead = array(
			Visit_DateTime__c => $Newlead->Visit_DateTime__c,
			Area__c => $Newlead->Area__c,
			astc__c => $Newlead->astc__c,
			attachment_id__c => $Newlead->attachment_id__c,
			Company__c => $Newlead->Company__c,
			Contact__c => $Newlead->Contact__c,
			cassetid__c => $Newlead->cassetid__c,
			ccampainid__c => $Newlead->ccampainid__c,
			esmcampain__c => $Newlead->esmcampain__c,
			esmclient__c => $Newlead->esmclient__c,
			gs__c => $Newlead->gs__c,
			q1__c => $Newlead->q1__c,
			q2__c => $Newlead->q2__c,
			q3__c => $Newlead->q3__c,
			q4__c => $Newlead->q4__c,
			q5__c => $Newlead->q5__c,
			rtl__c => $Newlead->rtl__c,
			rtp__c => $Newlead->rtp__c,
			Session_Page_Visits__c => $Newlead->Session_Page_Visits__c,
			Site_Name__c => $Newlead->Site_Name__c,
			URL__c => $Newlead->URL__c,
			WP_ID__c => $Newlead->WP_ID__c,
			WP_Name__c => $Newlead->WP_Name__c,
			WP_Page_ID__c => $Newlead->WP_Page_ID__c,
			Visit_DateTime__c => $Newlead->Visit_DateTime__c
			);
	
	
			$saveIDsfl = $Newlead->IDsfl;
			$updateresult = eSNAPUpdateLeads($lead);
				if($updateresult == 1){
				$wpdb->query("UPDATE esm_lead SET uploaded = '1' WHERE IDsfl = $saveIDsfl");
				} else {
				$wpdb->query("UPDATE esm_lead SET uploaded = '2' WHERE IDsfl = $saveIDsfl");
				}
			}
		}

	}
	
if ( $maxlead )
		{foreach ( $maxlead as $themaxlead ){	
		$wpdb->query("UPDATE esm_lead SET uploaded = '3' WHERE IDsfl <= $themaxlead->MaxOfIDsfl and uploaded = '0'");	
		}
	}



eSNAPCheckUnsubs();

	
}








add_filter('cron_schedules', 'new_interval');

// add once 10 minute interval to wp schedules
function new_interval($interval) {

    $interval['minutes_10'] = array('interval' => 10*60, 'display' => 'Once 10 minutes');

    return $interval;
}


register_activation_hook( __FILE__, 'sfupload_activation' );
// On activation, set a time, frequency and name of an action hook to be scheduled.
 
function sfupload_activation() {
	wp_schedule_event( time(), 'minutes_10', 'sfupload_minutes_10_event_hook' );
}

add_action( 'sfupload_minutes_10_event_hook', 'eSNAPCheckLeads' );
//  On the scheduled action hook, run the function.
//function sfupload_do_this_minutes_10() {
// do something every 10 minutes
//}



register_deactivation_hook( __FILE__, 'sfupload_deactivation' );
// On deactivation, remove all functions from the scheduled action hook.

function sfupload_deactivation() {
	wp_clear_scheduled_hook( 'sfupload_minutes_10_event_hook' );
}





register_activation_hook( __FILE__, 'sfunsubload_activation' );
// On activation, set a time, frequency and name of an action hook to be scheduled.
 
function sfunsubload_activation() {
	wp_schedule_event( time(), 'minutes_10', 'sfunsubload_minutes_10_event_hook' );
}

add_action( 'sfunsubload_10_event_hook', 'eSNAPCheckUnsubs' );
//  On the scheduled action hook, run the function.
//function sfupload_do_this_minutes_10() {
// do something every 10 minutes
//}



register_deactivation_hook( __FILE__, 'sfunsubload_deactivation' );
// On deactivation, remove all functions from the scheduled action hook.

function sfunsubload_deactivation() {
	wp_clear_scheduled_hook( 'sfunsubload_minutes_10_event_hook' );
}

////////// UNSUB /////////////////////////

function eSNAPCheckUnsubs(){

global $wpdb;

//get the max, so we have a defined set to work with

// start getting the leads
$Newunsubs = $wpdb->get_results( 
	"
SELECT IDsfl, Action__c,Campaign__c,Account__c,Site_Used__c,Change_Date__c,List__c,uploaded,Email_Changed__c
FROM esm_unsub 
WHERE uploaded = '0';
	"
);

//WHERE uploaded = '0'

if ( $Newunsubs )


	{
//print_r($Newleads);
	foreach ( $Newunsubs as $Newunsub )
		{
			
		/* 
		upload lead mark it...
		*/
			
			$lead = array(
			Action__c => $Newunsub->Action__c,
			Campaign__c => $Newunsub->Campaign__c,
			Account__c => $Newunsub->Account__c,
			Site_Used__c => $Newunsub->Site_Used__c,
			List__c => $Newunsub->List__c,
			Email_Changed__c => $Newunsub->Email_Changed__c
			);
	
	
			$saveIDsfl = $Newunsub->IDsfl;
			$updateresult = eSNAPUpdateUnsub($lead);
			
					
			if($updateresult == 1){
				
				$wpdb->query("UPDATE esm_unsub SET uploaded = '1' WHERE IDsfl = $saveIDsfl");
				} else {
				$wpdb->query("UPDATE esm_unsub SET uploaded = '2' WHERE IDsfl = $saveIDsfl");
				}
			
		}

	}
	echo '</pre>';
}


///////////////////////////////////////////






=======
<?php 
/*
 Plugin Name: eSchool Media Visit Recorder 
 Plugin URI: http://www.eschoolnews.com
 Author: Vince Carlson
 Version: 0.2.0
 */
																						

// 88888888888888888888888888888888888888888888888888888888888888888888888888888888888888
// USER LOGGING
// 88888888888888888888888888888888888888888888888888888888888888888888888888888888888888

// Hook for adding admin menus
add_action('admin_menu', 'svl_add_pages');

// action function for above hook
function svl_add_pages() {
    // Add a new submenu under Settings:
    add_options_page(__('Visit Logging','svl-menu'), __('Visit Logging','svl-menu'), 'manage_options', 'sf_visit_logger', 'svl_settings_page');
}

// svl_settings_page() displays the page content for the Visit Logging submenu
function svl_settings_page() {

    //must check that the user has the required capability 
    if (!current_user_can('manage_options'))
    {
      wp_die( __('You do not have sufficient permissions to access this page.') );
    }

    // variables for the field and option names 
    $opt_name = 'svl_tracked_cats';
    $hidden_field_name = 'svl_submit_hidden';
    $data_field_name = 'svl_tracked_cats';

    // Read in existing option value from database
    $opt_val = get_option( $opt_name );

    // See if the user has posted us some information
    // If they did, this hidden field will be set to 'Y'
    if( isset($_POST[ $hidden_field_name ]) && $_POST[ $hidden_field_name ] == 'Y' ) {
        // Read their posted value
        $opt_val = $_POST[ $data_field_name ];

        // Save the posted value in the database
        update_option( $opt_name, $opt_val );

        // Put an settings updated message on the screen

?>
<div class="updated"><p><strong><?php _e('settings saved.', 'svl-menu' ); ?></strong></p></div>
<?php
    }


$updatesfn = $_GET['updatesfnow'];
if( $updatesfn == 'now' ){  

eSNAPCheckLeads(); 

echo '<div class="updated"><p><strong>Lead and Unsubscribe Update Run</h1></strong></p></div>';
}



    // Now display the settings editing screen

    echo '<div class="wrap">';

    // header

    echo "<h2>" . __( 'Visit Logging Settings', 'svl-menu' ) . "</h2>";

    // settings form
    ?>

<form name="form1" method="post" action="">
<input type="hidden" name="<?php echo $hidden_field_name; ?>" value="Y">

<p><?php _e("Categories to Always Track:", 'svl-menu' ); ?> 
<br />
<br />
<a href="/wp-admin/options-general.php?page=sf_visit_logger&updatesfnow=now">Click Manually update leads and Unsubscribes to Salesforce</a>
<br />
<br />
<input type="text" name="<?php echo $data_field_name; ?>" value="<?php echo $opt_val; ?>" size="60">
<br /><em>Comma separated category numbers</em>
</p><hr />

<p class="submit">
<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Save Changes') ?>" />
</p>

</form>
</div>
<h2>Category (id)</h2>
<p style="font-weight:bold">
<?php
	$categories = get_categories();
	foreach ($categories as $cat) {
		if ($cat->category_parent != 0) {
			echo '<span style="padding-left:10px;">';
		}
		echo '<a href="'.get_option('home').get_option('category_base').'/'.$cat->category_nicename.'/">'.$cat->cat_name.'</a> ('.$cat->cat_ID.')';
		if ($cat->category_description != '') {
			echo ' - '.$cat->category_description;
		}
		if ($cat->category_parent != 0) {
			echo '</span>';
		}
		echo '<br />';
	}
echo '</p>';
}



// 88888888888888888888888888888888888888888888888888888888888888888888888888888888888888
// functions to call all other functions when user visits page
// 88888888888888888888888888888888888888888888888888888888888888888888888888888888888888

// check if the page should be tracked
function check_page_advanced_tracking($pageid){
$islead = false;
  $trackeditem = get_post_meta( $pageid, 'page_tracking', true );
  //echo '<h1>'.$pageid.'-'.$trackeditem.'</h1>';
	if ($trackeditem != null) { 
	  if ($trackeditem == 1){ $islead = true; } 
	}
  
		$trackedcats = get_option( 'svl_tracked_cats' );
		$trackedcats = str_replace(" ", "", $trackedcats);
		$catsarray = explode(',', $trackedcats);

		if ( in_category( $catsarray,$pageid)) {
			$islead = true;
	
	}
return $islead;
} // end  check_page_tracking

// 88888888888888888888888888888888888888888888888888888888888888888888888888888888888888
// functions to set user cookies
// 88888888888888888888888888888888888888888888888888888888888888888888888888888888888888

add_action("gform_post_submission", "SF_lead_record", 10, 2);

function SF_lead_record($entry, $form){

if ($entry[1] == 'AutoUpload') {
	$DoAutoUpload = 1;
	//$AutoUploadItem = new stdclass();
	//$AutoUploadItem = array();
	
	$Area__c =$entry[2];
	$astc__c =$entry[3];
	$attachment_id__c =$entry[4];
	$Company__c =$entry[5];
	$Contact__c =$entry[6];
	$cassetid__c =$entry[7];
	$ccampainid__c =$entry[8];
	$esmcampain__c =$entry[9];
	$esmclient__c =$entry[10];
	$gs__c =$entry[11];
	
	$question1 =  explode ( "," , $entry[12]);
	$q1 = $question1[0];
	$q10 = $question1[0].'.1';
	$q1string =$entry[$q1].$entry[$q1.'.1'].' '.$entry[$q1.'.2'].' '.$entry[$q1.'.3'].' '.$entry[$q1.'.4'].' '.$entry[$q1.'.5'].' '.$entry[$q1.'.6'].' '.$entry[$q1.'.7'].' '.$entry[$q1.'.8'].' '.$entry[$q1.'.9'].' '.$entry[$q1.'.10'];

	$q1__c = $question1[1].":".$q1string;
	if(q1__c ==":         "){$q1__c = "";}

	$question2 =  explode ( "," , $entry[13]);
	$q2 = $question2[0];
	$q2string =$entry[$q2].$entry[$q2.'.1'].' '.$entry[$q2.'.2'].' '.$entry[$q2.'.3'].' '.$entry[$q2.'.4'].' '.$entry[$q2.'.5'].' '.$entry[$q2.'.6'].' '.$entry[$q2.'.7'].' '.$entry[$q2.'.8'].' '.$entry[$q2.'.9'].' '.$entry[$q2.'.10'];
	$q2__c = $question2[1].":".$q2string;
	if(q2__c ==":         "){$q2__c = "";}

	$question3 =  explode ( "," , $entry[14]);
	$q3 = $question3[0];
	$q3string =$entry[$q3].$entry[$q3.'.1'].' '.$entry[$q3.'.2'].' '.$entry[$q3.'.3'].' '.$entry[$q3.'.4'].' '.$entry[$q3.'.5'].' '.$entry[$q3.'.6'].' '.$entry[$q3.'.7'].' '.$entry[$q3.'.8'].' '.$entry[$q3.'.9'].' '.$entry[$q3.'.10'];

	$q3__c = $question3[1].":".$q3string;
	if(q3__c ==":         "){$q3__c = "";}
	

	$question4 =  explode ( "," , $entry[15]);
	$q4 = $question4[0];
		$q4string =$entry[$q4].$entry[$q4.'.1'].' '.$entry[$q4.'.2'].' '.$entry[$q4.'.3'].' '.$entry[$q4.'.4'].' '.$entry[$q4.'.5'].' '.$entry[$q4.'.6'].' '.$entry[$q4.'.7'].' '.$entry[$q4.'.8'].' '.$entry[$q4.'.9'].' '.$entry[$q4.'.10'];

	$q4__c = $question4[1].":".$q4string;
	if(q4__c ==":         "){$q4__c = "";}
	

	$question5 =  explode ( "," , $entry[16]);
	$q5 = $question5[0];
	$q5string =$entry[$q5].$entry[$q5.'.1'].' '.$entry[$q5.'.2'].' '.$entry[$q5.'.3'].' '.$entry[$q5.'.4'].' '.$entry[$q5.'.5'].' '.$entry[$q5.'.6'].' '.$entry[$q5.'.7'].' '.$entry[$q5.'.8'].' '.$entry[$q5.'.9'].' '.$entry[$q5.'.10'];
	$q5__c = $question5[1].":".$q5string;
	if(q5__c ==":         "){$q5__c = "";}
	
	$question6 =  explode ( "," , $entry[46]);
	$q6 = $question6[0];
	$q6string =$entry[$q6].$entry[$q6.'.1'].' '.$entry[$q6.'.2'].' '.$entry[$q6.'.3'].' '.$entry[$q6.'.4'].' '.$entry[$q6.'.5'].' '.$entry[$q6.'.6'].' '.$entry[$q6.'.7'].' '.$entry[$q6.'.8'].' '.$entry[$q6.'.9'].' '.$entry[$q6.'.10'];
	$q6__c = $question6[1].":".$q6string;
	if(q6__c ==":         "){$q6__c = "";}
	
	$question7 =  explode ( "," , $entry[47]);
	$q7 = $question7[0];
	$q7string =$entry[$q7].$entry[$q7.'.1'].' '.$entry[$q7.'.2'].' '.$entry[$q7.'.3'].' '.$entry[$q7.'.4'].' '.$entry[$q7.'.5'].' '.$entry[$q7.'.6'].' '.$entry[$q7.'.7'].' '.$entry[$q7.'.8'].' '.$entry[$q7.'.9'].' '.$entry[$q7.'.10'];
	$q7__c = $question7[1].":".$q7string;
	if(q7__c ==":         "){$q7__c = "";}	

	$question8 =  explode ( "," , $entry[48]);
	$q8 = $question8[0];
	$q8string =$entry[$q8].$entry[$q8.'.1'].' '.$entry[$q8.'.2'].' '.$entry[$q8.'.3'].' '.$entry[$q8.'.4'].' '.$entry[$q8.'.5'].' '.$entry[$q8.'.6'].' '.$entry[$q8.'.7'].' '.$entry[$q8.'.8'].' '.$entry[$q8.'.9'].' '.$entry[$q8.'.10'];
	$q8__c = $question8[1].":".$q8string;
	if(q8__c ==":         "){$q8__c = "";}

	$question9 =  explode ( "," , $entry[49]);
	$q9 = $question9[0];
	$q9string =$entry[$q9].$entry[$q9.'.1'].' '.$entry[$q9.'.2'].' '.$entry[$q9.'.3'].' '.$entry[$q9.'.4'].' '.$entry[$q9.'.5'].' '.$entry[$q9.'.6'].' '.$entry[$q9.'.7'].' '.$entry[$q9.'.8'].' '.$entry[$q9.'.9'].' '.$entry[$q9.'.10'];
	$q9__c = $question9[1].":".$q9string;
	if(q9__c ==":         "){$q9__c = "";}

	$question10 =  explode ( "," , $entry[50]);
	$q10 = $question10[0];
	$q10string =$entry[$q10].$entry[$q10.'.1'].' '.$entry[$q10.'.2'].' '.$entry[$q10.'.3'].' '.$entry[$q10.'.4'].' '.$entry[$q10.'.5'].' '.$entry[$q10.'.6'].' '.$entry[$q10.'.7'].' '.$entry[$q10.'.8'].' '.$entry[$q10.'.9'].' '.$entry[$q10.'.10'];
	$q10__c = $question10[1].":".$q10string;
	if(q10__c ==":         "){$q10__c = "";}


	$rtl__c =$entry[17];
	$rtp__c =$entry[18];
	$Site_Name__c =$entry[19];
	$URL__c = $entry[source_url];
	$Visit_DateTime__c =$entry[21];
	$WP_ID__c =$entry[22];
	$WP_Name__c = get_the_title( $WP_ID__c );
	$esmpassvalue = $entry[23];
	$wpuid = $entry[24];	
	
ini_set("soap.wsdl_cache_enabled", "0");
		$USERNAME = "sfdcadmin1@eschoolnews.com"; //- variable that contains your Salesforce.com username (must be in the form of an email)
		$PASSWORD = "eSNadm1n"; //- variable that contains your Salesforce.com password
		$TOKEN = "qhO7UhNTUrYp8XU5eF1SRomDp"; //- variable that contains your Salesforce.com password
		require_once ( ABSPATH . '/soapclient/SforceEnterpriseClient.php');
		require_once ( ABSPATH . '/soapclient/SforceHeaderOptions.php');
		// Salesforce Login information
		$wsdl = ABSPATH . '/soapclient/eSNenterprise.wsdl.xml';
		$mySforceConnectionu = new SforceEnterpriseClient();
		$mySoapClient = $mySforceConnectionu->createConnection($wsdl);
		$mylogin = $mySforceConnectionu->login($USERNAME, $PASSWORD.$TOKEN);	
	
/* echo '<pre>';
print_r($entry);
echo '</pre>';
	
echo '<pre>';
print_r($AutoUploadItem);
echo '</pre>'; */

/* $entry[2] ~~~~~~~~~Area__c^^^^^^^
$entry[3] ~~~~~~~~~astc__c^^^^^^^
$entry[4] ~~~~~~~~~attachment_id__c^^^^^^^
$entry[5] ~~~~~~~~~Company__c^^^^^^^
$entry[6] ~~~~~~~~~Contact__c^^^^^^^
$entry[7] ~~~~~~~~~cassetid__c^^^^^^^
$entry[8] ~~~~~~~~~ccampainid__c^^^^^^^
$entry[9] ~~~~~~~~~esmcampain__c^^^^^^^
$entry[10] ~~~~~~~~~esmclient__c^^^^^^^
$entry[11] ~~~~~~~~~gs__c^^^^^^^
$entry[12] ~~~~~~~~~q1__c^^^^^^^
$entry[13] ~~~~~~~~~q2__c^^^^^^^
$entry[14] ~~~~~~~~~q3__c^^^^^^^
$entry[15] ~~~~~~~~~q4__c^^^^^^^
$entry[16] ~~~~~~~~~q5__c^^^^^^^
$entry[17] ~~~~~~~~~rtl__c^^^^^^^
$entry[18] ~~~~~~~~~rtp__c^^^^^^^
$entry[19] ~~~~~~~~~Site_Name__c^^^^^^^
$entry[20] ~~~~~~~~~URL__c^^^^^^^
$entry[21] ~~~~~~~~~Visit_DateTime__c^^^^^^^
$entry[22] ~~~~~~~~~WP_ID__c^^^^^^^ */
/*if(DoAutoUpload == '1'){ 
	
ini_set("soap.wsdl_cache_enabled", "0");
		$USERNAME = "sfdcadmin1@eschoolnews.com"; //- variable that contains your Salesforce.com username (must be in the form of an email)
		$PASSWORD = "eSNadm1n"; //- variable that contains your Salesforce.com password
		$TOKEN = "qhO7UhNTUrYp8XU5eF1SRomDp"; //- variable that contains your Salesforce.com password
		require_once ( ABSPATH . '/soapclient/SforceEnterpriseClient.php');
		require_once ( ABSPATH . '/soapclient/SforceHeaderOptions.php');
		// Salesforce Login information
		$wsdl = ABSPATH . '/soapclient/eSNenterprise.wsdl.xml';
		$mySforceConnectionL = new SforceEnterpriseClient();
		$mySoapClient = $mySforceConnectionL->createConnection($wsdl);
		$mylogin = $mySforceConnectionL->login($USERNAME, $PASSWORD.$TOKEN);

		$upsertResponse = $mySforceConnectionu->upsert('Email_as_ExternalID__c', array($newperson), 'Account');
	
		if ($upsertResponse->success==1){
		update_user_meta($user_id, "sfid", $upsertResponse->id);
		}

*/
global $wpdb; 
$dtVisit = date('Y-m-d H:i:s');
$siteprefix = $wpdb->prefix;

$wpdb->query( $wpdb->prepare("INSERT INTO esm_lead (Area__c ,astc__c , attachment_id__c, Company__c , Contact__c , cassetid__c , ccampainid__c , esmcampain__c , esmclient__c , gs__c , q1__c , q2__c , q3__c , q4__c , q5__c, q6__c, q7__c, q8__c, q9__c, q10__c, rtl__c,  rtp__c,  Session_Page_Visits__c, Site_Name__c , URL__c , Visit_DateTime__c, WP_ID__c , WP_Name__c , wpuid, pageid, ercid, URL, siteprefix, uploaded, cookie, ip, attachment_id) VALUES (%s,%d,%d,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%d,%d,%d,%s,%s,%s,%s,%s,%d,%d,%s,%s,%s,%s,%s,%s,%d)", $Area__c,$astc__c,$attachment_id__c,$Company__c,$Contact__c,$cassetid__c,$ccampainid__c,$esmcampain__c,$esmclient__c,$gs__c,$q1__c,$q2__c,$q3__c,$q4__c,$q5__c, $q6__c, $q7__c, $q8__c, $q9__c, $q10__c,$rtl__c,$rtp__c,$Session_Page_Visits__c,$Site_Name__c,$URL__c,$dtVisit,$astc__c,$WP_Name__c,$wpuid,$WP_ID__c,$astc__c,$URL__c,$siteprefix,'0',$esmpassvalue,$ip,$attachment_id ) );
	
	// }	
	
 }	

}






function setesmpass_head() {
//ini_set('display_errors',1); 
//error_reporting(E_ALL);

// echo '<h1>!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!</h1>';
		
	if (is_user_logged_in()) {
		// LOGGED IN USER 
		
			$current_user = wp_get_current_user();
			$wpuid = $current_user->ID;
			$sfuid = get_user_meta($wpuid, 'sfid', true ); 
			$PersonContactId = get_user_meta($wpuid, 'PersonContactId', true ); 
			$loggedin = 1;
			//SET COOKIE WE KNOW WHO YOU ARE 
			$esmpassvalue = $loggedin . '-' . $wpuid . '-' . $sfuid . '-' . $PersonContactId;
			setcookie("esmpass", $esmpassvalue, time()+315360000,'/');
		} else {
		// not Logged in
		if (isset($_COOKIE['esmpass'])) { $esmpasscookvals = explode ( "-" , $_COOKIE['esmpass']);  
		if (isset($esmpasscookvals[0]) && is_numeric($esmpasscookvals[0])){ 
		
			if($esmpasscookvals[0] == 1){ $cookienologgedin = 1; } else {$cookienologgedin = 0;} 
		} else {$badcookie = 1;}
		
		if (isset($esmpasscookvals[1]) && filter_var($esmpasscookvals[1], FILTER_VALIDATE_EMAIL)) {$wpuid = '999999999'; } elseif (isset($esmpasscookvals[1]) && is_numeric($esmpasscookvals[1])){ $wpuid = $esmpasscookvals[1]; } else {$badcookie = 1;}
			
			if (isset($esmpasscookvals[2]) && strlen($esmpasscookvals[2]) == 15 || isset($esmpasscookvals[2]) && strlen($esmpasscookvals[2]) == 18 ){
					$sfuid=$esmpasscookvals[2];
				}  else {$badcookie = 1;}
			if (isset($esmpasscookvals[3]) && strlen($esmpasscookvals[3]) == 15 || isset($esmpasscookvals[3]) && strlen($esmpasscookvals[3]) == 18 ){
					$PersonContactId=$esmpasscookvals[3];
		} else {$badcookie = 1;}
		
		}
		
		if ( (isset($_GET['ps']) and $cookienologgedin == 0 )or (isset($_GET['ps']) and $badcookie == 1 )) { $esmpasscookvals = explode ( "-" , $_GET['ps']); 
			
		$esmpasscookvals = explode ( "-" , $_GET['ps']);

			$loggedin = 0;
		
			if (isset($esmpasscookvals[0]) && filter_var($esmpasscookvals[0], FILTER_VALIDATE_EMAIL)) {$wpuid = '999999999'; } elseif (isset($esmpasscookvals[0]) && is_numeric($esmpasscookvals[0])){ $wpuid = $esmpasscookvals[0]; } else {$badps = 2;}
			
			if (isset($esmpasscookvals[1]) && strlen($esmpasscookvals[1]) == 15 || isset($esmpasscookvals[1]) && strlen($esmpasscookvals[1]) == 18 ){
					$sfuid=$esmpasscookvals[1];
				}  else {$badps = 2;}
			if (isset($esmpasscookvals[2]) && strlen($esmpasscookvals[2]) == 15 || isset($esmpasscookvals[2]) && strlen($esmpasscookvals[2]) == 18 ){
					$PersonContactId=$esmpasscookvals[2];
				} else {$badps = 2;}
		

			//SET COOKIE WE KNOW WHO YOU ARE 
 			    if(!$badps == 2){
				$esmpassvalue = $loggedin . '-' . $wpuid . '-' . $sfuid . '-' . $PersonContactId;
				setcookie("esmpass", $esmpassvalue, time()+315360000,'/');
				}elseif($badps == 2 and $badcookie == 1 ){
						setcookie("esmpass", '', time()-10000,'/');
				}
		
		} elseif( $badcookie == 1 ) {
			setcookie("esmpass", '', time()-10000,'/');
		} 
			
	} // end login check
	
// 88888888888888888888888888888888888888888888888888888888888888888888888888888888888888
// function check item for logging level
// 88888888888888888888888888888888888888888888888888888888888888888888888888888888888888
//start with the basics all logging needs
	global $post, $page, $wpdb; 
$pageid = get_the_ID();

$dtDate = date('Ymd');
$dtVisit = date('Y-m-d H:i:s');
$siteprefix = $wpdb->prefix;		
$pagetitle = get_the_title($pageid);
$astcset = $_GET['astc'];
if(!filter_var($astcset, FILTER_VALIDATE_INT))
{//reserved for default ad set
	$astc = 1;
} else {
// Retrieve adset info from page
	$astc = $astcset;	
}
if ( isset($_GET['rtl']) && is_numeric($_GET['rtl']) ) {
	$rtl__c = $_GET['rtl']; }
if ( isset($_GET['rtp']) && is_numeric($_GET['rtp']) ) {
	$rtp__c = $_GET['rtp']; }	

// echo '<h1>!!!!!!!!!!!!!!!!'.$pageid.'!!!!!'.$pagetitle.'!!!!!!!!!!!!!!!</h1>';		
// echo get_the_title($pageid);
// echo '<h1>!New Plugin working!</h1>';	
// echo eSNAPCheckLeads();
if(check_page_advanced_tracking($pageid)){ $trackislead = 1;}
		
	
		 //$pagetrack == '1' or 
	

		//base log vars

		$visits = 1;

		$URL = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		
		if (intval($_GET['ast'])!= 0) {
			$pageadset = intval($_GET['ast']);		
			} else {
			$pageadset=get_post_meta($pageid, '_wp_esmad_template', $single = true);		
		}
		$pagecat = intval($_GET['astc']);
		$pagertp = intval($_GET['rtp']);
		$pagertl = intval($_GET['rtl']);
		$pagegs = $_GET['gs'];
		$pageattachment_id = intval($_GET['attachment_id']);
		
		if(filter_var($pageadset, FILTER_VALIDATE_INT)){ $ercid = $pageadset; } else { $ercid = 0;}
			
		$pagetrack=get_post_meta($pageid, 'page_tracking', $single = true);
	
		if ($pagetrack != null) { 
		  if ($pagetrack == 1){ $trackislead = 1; } 
		}
		if($ercid > 0){ $trackislead = 1; } 
		
		
		$Area__c = 'Site Lead';
		$Site_Name__c = get_bloginfo('name');
if ( $pagecat > 0 or $pagertp > 0 or $pagertl > 0 or $pageadset > 0 or $trackislead > 0 ){ $islead = 1; }	
	//$attachment_id__c,
	//$Company__c,
	//$Contact__c,
	//$cassetid__c,
	//$ccampainid__c,
	//$esmcampain__c,
	//$esmclient__c,
	//$gs__c,
	//$q1__c,
	//$q2__c,
	//$q3__c,
	//$q4__c,
	//$q5__c,
if (current_user_can( 'manage_options' )) { /* echo '<h1>'
.'<br>islead = '.$islead

.'<br>Area__c = '.$Area__c
.'<br>pagecat = '.$pagecat
.'<br>pageattachment_id = '.$pageattachment_id
.'<br>Company__c = '.$Company__c
.'<br>Contact__c = '.$PersonContactId
.'<br>cassetid__c = '.$cassetid__c
.'<br>ccampainid__c = '.$ccampainid__c
.'<br>esmcampain__c = '.$esmcampain__c
.'<br>esmclient__c = '.$esmclient__c
.'<br>gs__c = '.$gs__c
.'<br>q1__c = '.$q1__c
.'<br>q2__c = '.$q2__c
.'<br>q3__c = '.$q3__c
.'<br>q4__c = '.$q4__c
.'<br>q5__c = '.$q5__c
.'<br>pagertl = '.$pagertl
.'<br>pagertp = '.$pagertp
.'<br>Session_Page_Visits__c = '.$Session_Page_Visits__c
.'<br>Site_Name__c = '.$Site_Name__c
.'<br>URL = '.$URL
.'<br>dtVisit = '.$dtVisit
.'<br>wpuid = '.$wpuid
.'<br>WP_Name__c = '.$pagetitle
.'<br>wpuid = '.$wpuid
.'<br>pageid = '.$pageid
.'<br>ercid = '.$ercid
.'<br>URL = '.$URL
.'<br>siteprefix = '.$siteprefix
.'<br>uploaded = '.$uploaded
.'<br>cookie = '.$esmpassvalue
.'<br>ip = '.$ip
.'<br>attachment_id = '.$attachment_id 
.'</h1>'; */ }	
	
	//$Session_Page_Visits__c,
	
	//$Visit_DateTime__c,
	//$WP_ID__c,
	//$WP_Name__c,
	//$wpuid,
	//$pageid,
	//$ercid,
	//$siteprefix,
	//$uploaded,
	//$cookie,
	//$ip,
	//$attachment_id
	
	
		// Read in existing option value from database
	

		
		try {
			$wpdb->query( $wpdb->prepare("INSERT INTO esm_sfl_user (dtDate, dtVisit, sfuid, wpuid, pageid, ercid, URL, pagetitle, visits, siteprefix, PersonContactId, cookie, astc, rtp, rtl, gs, attachment_id) 
			VALUES (%s, %s, %s, %d, %d, %d, %s, %s, %d, %s, %s, %s, %d, %d, %d, %s, %s)", $dtDate, $dtVisit, $sfuid, $wpuid, $pageid, $ercid, $URL, $pagetitle, $visits, $siteprefix, $PersonContactId, $esmpassvalue, $pagecat, $pagertp, $pagertl, $pagegs, $pageattachment_id) );
		} catch (Exception $e) {
		
			$errormessage = 'Caught exception 1: '.  $e->getMessage(). "\n";			//echo '<pre>';
			//echo $errormessage;
			//echo '</pre>';

			mail('vcarlson@eschoolnews.com','Logging Error',$errormessage); 
		
		}
		/* try {
			if($islead == 1){
			$wpdb->query( $wpdb->prepare("INSERT INTO esm_sfl_lead (dtDate, dtVisit, sfuid, wpuid, pageid, ercid, URL, pagetitle, visits, siteprefix, PersonContactId, cookie, astc, rtp, rtl, gs, attachment_id) 
			VALUES (%s, %s, %s, %d, %d, %d, %s, %s, %d, %s, %s, %s, %d, %d, %d, %s, %s)", $dtDate, $dtVisit, $sfuid, $wpuid, $pageid, $ercid, $URL, $pagetitle, $visits, $siteprefix, $PersonContactId, $esmpassvalue, $pagecat, $pagertp, $pagertl, $pagegs, $pageattachment_id) ); }
		} catch (Exception $e) {
		
			$errormessage = 'Caught exception 2: '.  $e->getMessage(). "\n";			//echo '<pre>';
			//echo $errormessage;
			//echo '</pre>';

			mail('vcarlson@eschoolnews.com','Logging Error',$errormessage); 
		
		} */
		

		if ($islead == 1 and strlen($PersonContactId) == 0 and strlen($wpuid) == 0){$islead = 0;}
		try {	
	if($islead == 1){

	$wpdb->query( $wpdb->prepare("INSERT INTO esm_lead (Area__c ,astc__c , attachment_id__c, Company__c , Contact__c , cassetid__c , ccampainid__c , esmcampain__c , esmclient__c , gs__c , q1__c , q2__c , q3__c , q4__c , q5__c , rtl__c,  rtp__c,  Session_Page_Visits__c, Site_Name__c , URL__c , Visit_DateTime__c, WP_ID__c , WP_Name__c , wpuid, pageid, ercid, URL, siteprefix, uploaded, cookie, ip, attachment_id) VALUES (%s,%d,%d,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%d,%d,%d,%s,%s,%s,%s,%s,%d,%d,%s,%s,%s,%s,%s,%s,%d)", $Area__c,$pagecat,$pageattachment_id,$Company__c,$PersonContactId,$cassetid__c,$ccampainid__c,$esmcampain__c,$esmclient__c,$gs__c,$q1__c,$q2__c,$q3__c,$q4__c,$q5__c,$pagertl,$pagertp,$Session_Page_Visits__c,$Site_Name__c,$URL,$dtVisit,$ercid,$pagetitle,$wpuid,$pageid,$ercid,$URL,$siteprefix,'0',$esmpassvalue,$ip,$attachment_id ) );
	
	}
	
	
		} catch (Exception $e) {
		
			$errormessage = 'Caught exception 3: '.  $e->getMessage(). "\n";			//echo '<pre>';
			//echo $errormessage;
			//echo '</pre>';

			mail('vcarlson@eschoolnews.com','Logging Error',$errormessage); 
		
		}
		
		

	

}
add_action('wp_footer', 'setesmpass_head');
//add_action('wp_footer', 'eSNAPCheckLeads');

/* wp lead page end */




function SFDCConnectionVR (){
	ini_set("soap.wsdl_cache_enabled", "0");
	$USERNAME = "sfdcadmin1@eschoolnews.com"; 
	$PASSWORD = "eSNadm1n";
	$TOKEN = "qhO7UhNTUrYp8XU5eF1SRomDp";
	require_once ( ABSPATH . '/soapclient/SforceEnterpriseClient.php');
	require_once ( ABSPATH . '/soapclient/SforceHeaderOptions.php');
	$wsdl = ABSPATH . '/soapclient/eSNenterprise.wsdl.xml';
	$SforceConnection = new SforceEnterpriseClient();
	$SoapClient = $SforceConnection->createConnection($wsdl);
	$login = $SforceConnection->login($USERNAME, $PASSWORD.$TOKEN);	
	
	return $SforceConnection;

}

function eSNAPUpdateLeads($lead){
	
	$Conn = SFDCConnectionVR();
	$output=null;
	$updateResponse = $Conn->create(array($lead), 'Web_Activity__c');
	// echo print_r($lead);
	// echo print_r($updateResponse);
	if ($updateResponse->success==1){
		$output = 1;
			} else {
		$output = 2;	
			}
		return $output; 
}



function eSNAPUpdateUnsub($lead){
	
	$Conn = SFDCConnectionVR();
	$output=null;
	$updateResponse = $Conn->create(array($lead), 'Email_Activity__c');
	// echo print_r($lead);
	// echo print_r($updateResponse);
	if ($updateResponse->success==1){
		$output = 1;
			} else {
		$output = 2;	
			}
		return $output; 
}


// echo '<pre>';
// eSNAPCheckLeads();
// echo '</pre>';

function eSNAPCheckLeads(){

global $wpdb;

//get the max, so we have a defined set to work with
		$maxlead = $wpdb->get_results( 
		"
		SELECT max(esm_lead.IDsfl) AS MaxOfIDsfl
		FROM esm_lead
		"
		);
		$LeadUploadLimit = $maxlead[0]->MaxOfIDsfl; 
// start getting the leads
$Newleads = $wpdb->get_results( 
	"
SELECT (DATE_FORMAT(f.Visit_DateTime__c,'%Y-%m-%dT%TZ')) as Visit_DateTime__c, f.Area__c, f.astc__c, f.attachment_id__c, f.Company__c, f.Contact__c, f.cassetid__c, f.ccampainid__c, f.esmcampain__c, f.esmclient__c, f.gs__c, f.q1__c, f.q2__c, f.q3__c, f.q4__c, f.q5__c, f.rtl__c, f.rtp__c, f.Session_Page_Visits__c, f.Site_Name__c, f.URL__c, f.WP_ID__c, f.WP_Name__c, (f.pageid) as WP_Page_ID__c, (f.URL) as URL__c, f.Contact__c, f.IDsfl, f.uploaded 
  FROM (
   select min(esm_lead.IDsfl) AS FirstOfIDsfl, Contact__c, q1__c, q2__c, q3__c, q4__c, q5__c, rtl__c, rtp__c, Site_Name__c, pageid, ercid, siteprefix, uploaded
   from esm_lead GROUP BY Contact__c, Site_Name__c, pageid, ercid, siteprefix
   HAVING FirstOfIDsfl <= $LeadUploadLimit and uploaded <= 1
	) as x inner join esm_lead as f on f.IDsfl = x.FirstOfIDsfl and f.IDsfl = x.FirstOfIDsfl;
	
	"
	
);

if ( $Newleads )
	{
//print_r($Newleads);
	foreach ( $Newleads as $Newlead )
		{
			
		/* 
		upload lead mark it...
		*/
			if ($Newlead->uploaded == '0'){
			$lead = array(
			Visit_DateTime__c => $Newlead->Visit_DateTime__c,
			Area__c => $Newlead->Area__c,
			astc__c => $Newlead->astc__c,
			attachment_id__c => $Newlead->attachment_id__c,
			Company__c => $Newlead->Company__c,
			Contact__c => $Newlead->Contact__c,
			cassetid__c => $Newlead->cassetid__c,
			ccampainid__c => $Newlead->ccampainid__c,
			esmcampain__c => $Newlead->esmcampain__c,
			esmclient__c => $Newlead->esmclient__c,
			gs__c => $Newlead->gs__c,
			q1__c => $Newlead->q1__c,
			q2__c => $Newlead->q2__c,
			q3__c => $Newlead->q3__c,
			q4__c => $Newlead->q4__c,
			q5__c => $Newlead->q5__c,
			rtl__c => $Newlead->rtl__c,
			rtp__c => $Newlead->rtp__c,
			Session_Page_Visits__c => $Newlead->Session_Page_Visits__c,
			Site_Name__c => $Newlead->Site_Name__c,
			URL__c => $Newlead->URL__c,
			WP_ID__c => $Newlead->WP_ID__c,
			WP_Name__c => $Newlead->WP_Name__c,
			WP_Page_ID__c => $Newlead->WP_Page_ID__c,
			Visit_DateTime__c => $Newlead->Visit_DateTime__c
			);
	
	
			$saveIDsfl = $Newlead->IDsfl;
			$updateresult = eSNAPUpdateLeads($lead);
				if($updateresult == 1){
				$wpdb->query("UPDATE esm_lead SET uploaded = '1' WHERE IDsfl = $saveIDsfl");
				} else {
				$wpdb->query("UPDATE esm_lead SET uploaded = '2' WHERE IDsfl = $saveIDsfl");
				}
			}
		}

	}
	
if ( $maxlead )
		{foreach ( $maxlead as $themaxlead ){	
		$wpdb->query("UPDATE esm_lead SET uploaded = '3' WHERE IDsfl <= $themaxlead->MaxOfIDsfl and uploaded = '0'");	
		}
	}



eSNAPCheckUnsubs();

	
}








add_filter('cron_schedules', 'new_interval');

// add once 10 minute interval to wp schedules
function new_interval($interval) {

    $interval['minutes_10'] = array('interval' => 10*60, 'display' => 'Once 10 minutes');

    return $interval;
}


register_activation_hook( __FILE__, 'sfupload_activation' );
// On activation, set a time, frequency and name of an action hook to be scheduled.
 
function sfupload_activation() {
	wp_schedule_event( time(), 'minutes_10', 'sfupload_minutes_10_event_hook' );
}

add_action( 'sfupload_minutes_10_event_hook', 'eSNAPCheckLeads' );
//  On the scheduled action hook, run the function.
//function sfupload_do_this_minutes_10() {
// do something every 10 minutes
//}



register_deactivation_hook( __FILE__, 'sfupload_deactivation' );
// On deactivation, remove all functions from the scheduled action hook.

function sfupload_deactivation() {
	wp_clear_scheduled_hook( 'sfupload_minutes_10_event_hook' );
}





register_activation_hook( __FILE__, 'sfunsubload_activation' );
// On activation, set a time, frequency and name of an action hook to be scheduled.
 
function sfunsubload_activation() {
	wp_schedule_event( time(), 'minutes_10', 'sfunsubload_minutes_10_event_hook' );
}

add_action( 'sfunsubload_10_event_hook', 'eSNAPCheckUnsubs' );
//  On the scheduled action hook, run the function.
//function sfupload_do_this_minutes_10() {
// do something every 10 minutes
//}



register_deactivation_hook( __FILE__, 'sfunsubload_deactivation' );
// On deactivation, remove all functions from the scheduled action hook.

function sfunsubload_deactivation() {
	wp_clear_scheduled_hook( 'sfunsubload_minutes_10_event_hook' );
}

////////// UNSUB /////////////////////////

function eSNAPCheckUnsubs(){

global $wpdb;

//get the max, so we have a defined set to work with

// start getting the leads
$Newunsubs = $wpdb->get_results( 
	"
SELECT IDsfl, Action__c,Campaign__c,Account__c,Site_Used__c,Change_Date__c,List__c,uploaded,Email_Changed__c
FROM esm_unsub 
WHERE uploaded = '0';
	"
);

//WHERE uploaded = '0'

if ( $Newunsubs )


	{
//print_r($Newleads);
	foreach ( $Newunsubs as $Newunsub )
		{
			
		/* 
		upload lead mark it...
		*/
			
			$lead = array(
			Action__c => $Newunsub->Action__c,
			Campaign__c => $Newunsub->Campaign__c,
			Account__c => $Newunsub->Account__c,
			Site_Used__c => $Newunsub->Site_Used__c,
			List__c => $Newunsub->List__c,
			Email_Changed__c => $Newunsub->Email_Changed__c
			);
	
	
			$saveIDsfl = $Newunsub->IDsfl;
			$updateresult = eSNAPUpdateUnsub($lead);
			
					
			if($updateresult == 1){
				
				$wpdb->query("UPDATE esm_unsub SET uploaded = '1' WHERE IDsfl = $saveIDsfl");
				} else {
				$wpdb->query("UPDATE esm_unsub SET uploaded = '2' WHERE IDsfl = $saveIDsfl");
				}
			
		}

	}
	echo '</pre>';
}


///////////////////////////////////////////






>>>>>>> origin/master
?>