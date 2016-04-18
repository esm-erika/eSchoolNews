<?php 
/*
*
* shared logged-in-check.php
*
* @package WordPress
* @subpackage FoundationPress
* @since FoundationPress 1.0.0
*
*
*
*/


global $post, $wpdb, $user, $esmuser; 
	
if (is_user_logged_in()) {

// LOGGED IN USER
	$current_user = wp_get_current_user();
	$wpuid = get_current_user_id();
	$sfuid = (string)get_user_meta($wpuid, 'sfid', true );
	$PersonContactId = (string)get_user_meta($wpuid, 'PersonContactId', true ); 
	$wpuidPS = $wpuid;		
	$sfuidPS = $sfuid;
	$PersonContactIdPS = $PersonContactId;
	$showpagecontent = 1;	
	$loggedin = '1';
	//SET COOKIE WE KNOW WHO YOU ARE 
		$value = $loggedin . '-' . $wpuid . '-' . $sfuid . '-' . $PersonContactId;
		setcookie("esmpass", $value, time()+315360000,'/');  /* expire in 10 years */
	
} else {
//echo '34 showpagecontent = ' . $showpagecontent . '<br>';
	// USER NOT LOGGED IN CHECK FOR ID ELSEWHERE
	$loggedin = 0;
	
	//CHECK AND VALIDATE COOKIE esmpass
	if (isset($_COOKIE['esmpass'])) {

		$esmpasscookvals = explode ( "-" , $_COOKIE['esmpass']);
		$setnewcookie=0;
		
				if (isset($esmpasscookvals[0]) && is_numeric($esmpasscookvals[0])){
					if($esmpasscookvals[0] == 1){$cookesetbylogin = 1;} else { $setnewcookie=1; /* used later in PS check */ }
				} 
				if (isset($esmpasscookvals[1]) && is_numeric($esmpasscookvals[1])){
					$wpuid=$esmpasscookvals[1];
					$wpuidSP = $wpuid;		
				} elseif (isset($esmpassvals[0]) && filter_var($esmpassvals[0], FILTER_VALIDATE_EMAIL)) { 
					$wpuid = '999999999'; 
					$wpuidSP = $wpuid;		
				} else { $badcookie =1;}
				if (isset($esmpasscookvals[2]) && strlen($esmpasscookvals[2]) == 15 || isset($esmpasscookvals[2]) && strlen($esmpasscookvals[2]) == 18 ){
					$sfuid=$esmpasscookvals[2];
					$sfuidSP = $sfuid;
				}  else { $badcookie =1;}
				if (isset($esmpasscookvals[3]) && strlen($esmpasscookvals[3]) == 15 || isset($esmpasscookvals[3]) && strlen($esmpasscookvals[3]) == 18 ){
					$PersonContactId=$esmpasscookvals[3];
					$PersonContactIdPS = $PersonContactId;

				}  else { $badcookie =1;}
	}
//echo '64 showpagecontent = ' . $showpagecontent . '<br>';	
	//CHECK IF WE HAVE THE DATA IN A URL STRING
	if($cookesetbylogin == 1 and !$badcookie == 1){ $showpagecontent = 1; }
	
	if ( isset($_GET['ps']) ) {
		$esmpassvals = explode ( "-" , $_GET['ps']);
		//echo 'ps = ' . $_GET['ps'] . '<br>';	
		$pscheck=1;
		if (isset($esmpassvals[0]) && is_numeric($esmpassvals[0])){	
				$wpuid=$esmpassvals[0];
				$wpuidSP = $wpuid;	
		} elseif (isset($esmpassvals[0]) && filter_var($esmpassvals[0], FILTER_VALIDATE_EMAIL)) { 
					$wpuid = '999999999'; 
					$wpuidSP = $wpuid;
		} else {$pscheck=0;}
				
		if (isset($esmpassvals[1]) && strlen($esmpassvals[1]) == 15 || isset($esmpassvals[1]) && strlen($esmpassvals[1]) == 18 ){
			$sfuid=$esmpassvals[1];
			$sfuidSP = $sfuid;
		} else {$pscheck=0;}
		if (isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 15 || isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 18 ){
			$PersonContactId=$esmpassvals[2];
			$PersonContactIdPS = $PersonContactId;
		} else {$pscheck=0;}
		
		if($pscheck==1){ $setnewcookie=1; $showpagecontent = 1; /* echo '87 setting new cookie'; */  }
	} 
	//echo '89 pscheck = ' . $pscheck . '<br>';
	if( $setnewcookie==1){
		$showpagecontent = 1; //echo '91 showpagecontent = ' . $showpagecontent . '<br>';
		$value = '0' . '-' . $wpuid . '-' . $sfuid . '-' . $PersonContactId;
		setcookie("esmpass", $value, time()+315360000,'/');  /* expire in 10 years */
	} else if( $badcookie == 1){
		setcookie("esmpass", 0, time()-10000,'/');  /* expire now */
	}
//echo '97 showpagecontent = ' . $showpagecontent . '<br>';
} // end login check

if($showpagecontent == 1) {

if($_COOKIE['esmpass']){$esmpass_COOKIE = filter_var($_COOKIE['esmpass'], FILTER_SANITIZE_STRING);} else {filter_var($_GET['ps'], FILTER_SANITIZE_STRING); }
	global $esmuser;
	$esmuser = array(
	esmuserwpuidSP => $wpuidSP,
	sfuidSP => $sfuidSP,
	PersonContactIdPS => $PersonContactIdPS,
	wpuid => $wpuid,
	sfuid => $sfuid,
	PersonContactId => $PersonContactId,	
	esmpassvalue => $esmpass_COOKIE,	
	showpagecontent => $showpagecontent			
	); 
//echo '111 showpagecontent = ' . $showpagecontent . '<br>';

$Trialfireidentify = "<script>Trialfire.identify (".$sfuid.");</script>";
if (!is_admin()) {
  add_action('wp_head', $Trialfireidentify);
}

} else {
$showpagecontent = 0;	

echo '<!-- Trialfire Start -->';
echo '<script src="//cdn.trialfire.com/tf.js"></script>';
echo "<script>Trialfire.init('14e5b74f-eca3-4f82-8438-787a813becba');</script>";
echo '<!-- Trialfire End -->';

//echo '114 showpagecontent = ' . $showpagecontent . '<br>';	
}


function esm_is_user_logged_in(){
global $esmuser;	
  if($esmuser['showpagecontent'] == 1){
		return TRUE ;
	 } else {
		return FALSE ;
	 } 

}


?>