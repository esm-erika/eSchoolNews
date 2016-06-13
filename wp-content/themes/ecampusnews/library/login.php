<?php

function esm_logincheck(){

	if(is_user_logged_in()){
	
	
	} else if (isset($_COOKIE['esmpass'])) { 
	
		 
	} else if (isset($_COOKIE['esmpass'])) { 
	
	
	}
	
}
	
	
function esm_setcookie($esmpass = false, $wpuid = false,$sfuid = false,$PersonContactId = false,$logged_in = false){
	

	
}
	
	
	
	
	
	
if (isset($_COOKIE['esmpass'])) {
	
		$esmpasscookvals = explode ( "-" , $_COOKIE['esmpass']);
		$useshortform = 1;
		
		if (isset($esmpasscookvals[1]) && is_numeric($esmpasscookvals[1])){
			$wpuid=$esmpasscookvals[1];
			} else { $useshortform = 0; }
		if (isset($esmpasscookvals[2]) && strlen($esmpasscookvals[2]) == 15 || isset($esmpasscookvals[2]) && strlen($esmpasscookvals[2]) == 18 ){
			$sfuid=$esmpasscookvals[2];
		} else { $useshortform = 0; }
		if (isset($esmpasscookvals[3]) && strlen($esmpasscookvals[3]) == 15 || isset($esmpasscookvals[3]) && strlen($esmpasscookvals[3]) == 18 ){
			$PersonContactId=$esmpasscookvals[3];
		} else { $useshortform = 0; } 

		if($useshortform == 1){ 
			$user_info = get_userdata($wpuid);
			$lenautofill['sfuid'] = get_user_meta($wpuid, 'sfid', true ); 
			$lenautofill['PersonContactId'] = get_user_meta($wpuid, 'PersonContactId', true ); 
			$lenautofill['publisher'] = "eSchool Media";
			$lenautofill['asset'] = $post->ID;
			$lenautofill['fname'] = get_user_meta($wpuid, 'first_name', true );
			$lenautofill['lname'] = get_user_meta($wpuid, 'last_name', true );
			$lenautofill['email'] = get_user_meta($wpuid, 'email', true );	
			$lenautofill['wplogin'] = $user_info->user_login;
		}
	}  elseif ( isset($_GET['ps']) ) {
		
		$esmpassvals = explode ( "-" , $_GET['ps']);
		
		if (isset($esmpassvals[0]) && is_numeric($esmpassvals[0])){
			$wpuid=$esmpassvals[0];
			$useshortform = 1;
		} else {$useshortform=0;}
		
		if (($useshortform==1) && isset($esmpassvals[1]) && strlen($esmpassvals[1]) == 15 || ($pscheck==1) && isset($esmpassvals[1]) && strlen($esmpassvals[1]) == 18 ){
			$sfuid=$esmpassvals[1];
		} else {$useshortform=0;}
		
		if (($useshortform==1) && isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 15 || ($pscheck==1) && isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 18 ){
			$PersonContactId=$esmpassvals[2];
		} else {$useshortform=0;}

		if($useshortform == 1){ 
			$user_info = get_userdata($wpuid);
			$lenautofill['sfuid'] = get_user_meta($wpuid, 'sfid', true ); 
			$lenautofill['PersonContactId'] = get_user_meta($wpuid, 'PersonContactId', true ); 
			$lenautofill['publisher'] = "eSchool Media";
			$lenautofill['asset'] = $post->ID;
			$lenautofill['fname'] = get_user_meta($wpuid, 'first_name', true );
			$lenautofill['lname'] = get_user_meta($wpuid, 'last_name', true );
			$lenautofill['email'] = get_user_meta($wpuid, 'email', true );	
			$lenautofill['wplogin'] = $user_info->user_login;
		}
	} 
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

?>