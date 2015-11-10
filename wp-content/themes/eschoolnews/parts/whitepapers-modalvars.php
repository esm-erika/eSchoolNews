<?php 
/*
*
* shared variables for whitepaper with modal display
*
* @package WordPress
* @subpackage FoundationPress
* @since FoundationPress 1.0.0
*
*
*
*/
	global $page; 
	$blog_id = get_current_blog_id();


		if(is_user_logged_in()){
					$wpuid = get_current_user_id();
					$wpuidSP = $wpuid;
					$sfuidSP = get_user_meta($wpuid, 'sfid', true );
					$sfuid = $sfuidSP;
					$PersonContactIdPS = get_user_meta($wpuid, 'PersonContactId', true );
					$PersonContactId = $PersonContactIdPS;
		}
		if (isset($_COOKIE['esmpass'])) {
				$esmpasscookvals = explode ( "-" , $_COOKIE['esmpass']);
				if (isset($esmpasscookvals[1]) && is_numeric($esmpasscookvals[1])){
					$wpuid=$esmpasscookvals[1];
				} 
				if (isset($esmpasscookvals[2]) && strlen($esmpasscookvals[2]) == 15 || isset($esmpasscookvals[2]) && strlen($esmpasscookvals[2]) == 18 ){
				$sfuid=$esmpasscookvals[2];
				} 
				if (isset($esmpasscookvals[3]) && strlen($esmpasscookvals[3]) == 15 || isset($esmpasscookvals[3]) && strlen($esmpasscookvals[3]) == 18 ){
					$PersonContactId=$esmpasscookvals[3];
				} 
		}

if ( isset($_GET['ps']) ) {
				$esmpassvals = explode ( "-" , $_GET['ps']);	
					if (isset($esmpassvals[0]) && is_numeric($esmpassvals[0])){
						$wpuidSP=$esmpassvals[0];} 
					if (isset($esmpassvals[1]) && strlen($esmpassvals[1]) == 15 || ($pscheck==1) && isset($esmpassvals[1]) && strlen($esmpassvals[1]) == 18 ){
						$sfuidSP=$esmpassvals[1];}
					if (isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 15 || ($pscheck==1) && isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 18 ){
						$PersonContactIdPS=$esmpassvals[2];} 
			}
		
		$WPautofill = array(
		wpuidSP => $wpuidSP,
		sfuidSP => $sfuidSP,
		PersonContactIdPS => $PersonContactIdPS,
		wpuid => $wpuid,
		sfuid => $sfuid,
		PersonContactId => $PersonContactId,	
		esmpassvalue => $_COOKIE['esmpass'],	
		astc => $astc			
		); ?>