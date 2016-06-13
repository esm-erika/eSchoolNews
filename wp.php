<?php 
//use the theme
define('WP_USE_THEMES', true);

//get wordpress, bypass check that page exists (supress false 404)
//if ( !defined('ABSPATH') )
//	define('ABSPATH', '/nas/wp/www/cluster-311/esmbethesda-staging/');
include_once ( 'wp-config.php');
include_once ( 'wp-settings.php');
$wp->init(); $wp->parse_request(); $wp->query_posts();
$wp->register_globals(); $wp->send_headers();
include_once ( 'wp-load.php');

//require_once("/nas/wp/www/cluster-311/esmbethesda-staging/wp-config.php");
//require_once('/nas/wp/www/cluster-311/esmbethesda-staging/wp-settings.php');
//$wp->init(); $wp->parse_request(); $wp->query_posts();
//$wp->register_globals(); $wp->send_headers();
//require( '/nas/wp/www/cluster-311/esmbethesda-staging/wp-load.php' );


//get the query vars and validate them


if ( isset($_GET['wp']) && is_numeric($_GET['wp']) ) {
	$wpvalidated = $_GET['wp'];
	$redirectpage = '/?p='.$_GET['wp'];
	
	$redirectto = 1;
	$pagetitle = get_the_title($wpvalidated);
	$WPForm=get_post_meta($wpvalidated, 'WP Form Number', $single = true);
	$WPURL=get_post_meta($wpvalidated, 'WP URL', $single = true);
	
	$urlnogo = site_url($redirectpage);
	if ($WPForm != null and $WPForm > 0) { $urlgo = site_url($redirectpage); } else { $urlgo=$WPURL;}
	
} else {
	$redirectto = 0;
}
if ( isset($_GET['ps']) ) {
	$esmpassvals = explode ( "-" , $_GET['ps']);
	
	if (isset($esmpassvals[1]) && is_numeric($esmpassvals[1])){
		$wpuid=$esmpassvals[1];
		get_userdata( $userid );
		$email = $user_info->user_email;
	}
	if (isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 15 || isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 18 ){
		$sfuid=$esmpassvals[2];
	}
	if (isset($esmpassvals[3]) && strlen($esmpassvals[3]) == 15 || isset($esmpassvals[3]) && strlen($esmpassvals[3]) == 18 ){
		$PersonContactId=$esmpassvals[3];
		
	}
}

//base log vars
$dtDate = date('Ymd');
$dtVisit = date('Y-m-d H:i:s');
$siteprefix = $wpdb->prefix;
$Site_Name__c = get_bloginfo('name');
$visits = 1;
$pageid = $wpvalidated;
$URL = $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
$pagetitle = get_the_title($pageid);
$pageattachment_id = intval($_GET['attachment_id']);
$Area__c = 'Site Lead';
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



if (isset($_COOKIE['esmpass'])) {
	$esmpassvalue = $_COOKIE['esmpass'];
	$esmpasscookvals = explode ( "-" , $esmpassvalue);
	
	$setnewcookie=0;
	//$esmpassvals = explode ( "-" , $_GET['ps']);
	
	if (isset($esmpassvals[0]) && is_numeric($esmpassvals[0])){ 
		if ($esmpassvals[0] == 0){ $setnewcookie=0;	}
		}
	
	if (isset($esmpassvals[1]) && is_numeric($esmpassvals[1])){
		$wpuid=$esmpassvals[1];
		get_userdata( $userid );
		$email = $user_info->user_email;
	} else { $setnewcookie=0; }

	if (isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 15 || isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 18 ){
		$sfuid=$esmpassvals[2];
	} else { $setnewcookie=0; }
	if (isset($esmpassvals[3]) && strlen($esmpassvals[3]) == 15 || isset($esmpassvals[3]) && strlen($esmpassvals[3]) == 18 ){
		$PersonContactId=$esmpassvals[3];
	} else { $setnewcookie=0; }

} else {
	$setnewcookie=0;	
}

if (is_user_logged_in()) {
	get_userdata( $wpuid );
	$wpuid = $current_user->ID;
	$sfuid = get_usermeta($wpuid, 'sfid', true ); 
	$PersonContactId = get_usermeta($wpuid, 'PersonContactId', true ); 
	$email = $current_user->user_email;
	$loggedin = 1;
} else {
	$loggedin = 0;
	if($setnewcookie==0){
		$wpuid = $esmpasscookvals[1]; 
		$sfuid = $esmpasscookvals[2];
		$PersonContactId = $esmpasscookvals[3];
		$user_info = get_userdata($wpuid );
		$email = $user_info->user_email;
	} else {
		if ( isset($_GET['ps']) ) {
			$esmpassvals = explode ( "-" , $_GET['ps']);
			
			if (isset($esmpassvals[0]) && is_numeric($esmpassvals[0])){
				$wpuid=$esmpassvals[0];
				get_userdata($wpuid);
				$email = $user_info->user_login;
			} else { $setnewcookie=0; }
			if (isset($esmpassvals[1]) && strlen($esmpassvals[1]) == 15 || isset($esmpassvals[1]) && strlen($esmpassvals[1]) == 18 ){
				$sfuid=$esmpassvals[1];
			} else { $setnewcookie=0; }
			if (isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 15 || isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 18 ){
				$PersonContactId=$esmpassvals[2];
				
			} else { $setnewcookie=0; }
		}
	}
}

if(is_array($sfuid)){
$sfuid=$sfuid[0];	
}
if(is_array($PersonContactId)){
$PersonContactId=$PersonContactId[0];	
}

$esmpassvalue = $loggedin . '-' . $wpuid . '-' . $sfuid . '-' . $PersonContactId;

//echo 'dtDate="'.$dtDate .'" dtVisit="'. $dtVisit.'" sfuid="'. $sfuid.'" wpuid="'.$wpuid.'" pageid="'.$pageid.'" ercid="'.$ercid.'" email="'. $email.'" URL="'.$URL.'" pagetitle="'. $dtDate.'" visits="'. $visits.'" siteprefix="'.$siteprefix.'" PersonContactId="'. $PersonContactId.'" esmpassvalue="'. $esmpassvalue.'"';



if( $setnewcookie==1){
setcookie("esmpass", $esmpassvalue, time()+315360000);  /* expire in 10 years */
}





$wpdb->query( $wpdb->prepare("INSERT INTO esm_sfl_user (dtDate, dtVisit, sfuid, wpuid, pageid, ercid, email, URL, pagetitle, visits, siteprefix, PersonContactId, cookie) 

VALUES (%s, %s, %s, %d, %d, %d, %s, %s, %s, %d, %s, %s, %s)", $dtDate, $dtVisit, $sfuid, $wpuid, $pageid, $ercid, $email, $URL, $pagetitle, $visits, $siteprefix, $PersonContactId, $esmpassvalue) );


$wpdb->query( $wpdb->prepare("INSERT INTO esm_lead (Area__c ,astc__c , attachment_id__c, Company__c , Contact__c , cassetid__c , ccampainid__c , esmcampain__c , esmclient__c , gs__c , q1__c , q2__c , q3__c , q4__c , q5__c , rtl__c,  rtp__c,  Session_Page_Visits__c, Site_Name__c , URL__c , Visit_DateTime__c, WP_ID__c , WP_Name__c , wpuid, pageid, ercid, URL, siteprefix, uploaded, cookie, ip, attachment_id) VALUES (%s,%d,%d,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%d,%d,%d,%s,%s,%s,%s,%s,%d,%d,%s,%s,%s,%s,%s,%s,%d)", $Area__c,$pagecat,$pageattachment_id,$Company__c,$PersonContactId,$cassetid__c,$ccampainid__c,$esmcampain__c,$esmclient__c,$gs__c,$q1__c,$q2__c,$q3__c,$q4__c,$q5__c,$pagertl,$pagertp,$Session_Page_Visits__c,$Site_Name__c,$URL,$dtVisit,$pageid,$pagetitle,$wpuid,$pageid,$ercid,$URL,$siteprefix,'0',$esmpassvalue,$ip,$attachment_id ) );





if ($setnewcookie==1 or is_user_logged_in() or isset($_COOKIE['esmpass'])){
$rurl = $urlgo;
} else {
$rurl = $urlnogo;
}

if($rurl){ $url = $rurl;	}
if($redirectto == 1){ header( 'Location: '.$url ) ;	
}

?><?php get_header(); ?>

	<div id="container">

			<div id="main">
			
					<div id="post-<?php the_ID(); ?>" class="entry">
					
						<h1 class="entry_title">
						</h1>

						
<a href="<?php if($rurl){echo $rurl; } else{ echo '/'; } ?>"><strong>Click here to open the page.</strong></a></p>

					</div>


			</div><!-- #main -->
			
			<div id="sidebar">
				<?php get_sidebar(); ?>
			</div><!-- #Sidebar -->
			
			<div class="clear"></div>
	</div><!-- #Container -->

<?php get_footer(); ?>