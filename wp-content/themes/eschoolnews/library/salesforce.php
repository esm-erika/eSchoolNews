<?php 

function SF_Account_Upsert($entry, $form){
	
	$opt_val3 = get_option( 'esm_gravity_sf_subscribe' );				
		
	if($opt_val3 == $form){ 	
		global $wpdb;
	
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
		$loginname = $entry[30];
		$thenewuser = get_user_by('login', $loginname);

		if($thenewuser){
		   $user_id = $thenewuser->ID;
		} else {
			sleep(1);
			$thenewuser = get_user_by('login', $loginname);
			$user_id = $thenewuser->ID;
		}
	
		$newperson = array();
			$newperson['WP_Unique_ID__c'] = $user_id;
			$newperson['WP_ID__c'] = $user_id;
			$newperson['Source__c'] = $_SERVER["SERVER_NAME"];	
			$newperson['Site_Registered_On__c'] = $_SERVER["SERVER_NAME"];	
			$wp_subreq_id = '21'.$entry[4]; //21 = digital ecn [4] is email
			
			
		if (!empty ($entry[4])) {
			$newperson['PersonEmail'] = $entry[4];
			$newSubReq['Email__c'] = $entry[4];
			$newperson['Email_as_ExternalID__c'] = $entry[4]; 	
		}
		
		if (!empty ($entry[1]) ) { 
			$newperson['FirstName'] = $entry[1];
			$newSubReq['First_Name__c'] = $entry[1];
		}
		if (!empty ($entry[2]) ) {
			$newperson['LastName'] = $entry[2];
			$newSubReq['Last_Name__c'] = $entry[2];
		}
	
		if (!empty ($entry[61]) ) {
			$newperson['Unique_Title__c'] = $entry[61];
			$newSubReq['Unique_Title__c'] = $entry[61];
		}	
		
		if (!empty ($entry[5])){
			$newperson['PersonTitle'] = $entry[5];
			$newSubReq['Title__c'] = $entry[5];
		}
		$OptedOutflag = 0;


		if (!empty ($entry['57.1'])){
			$newperson['eSN_This_Week__c'] = $entry['57.1'];
			if ($entry['57.1'] == 'Subscribed'){$OptedOutflag = 1;}
		} else {
			$newperson['eSN_This_Week__c'] = "Not Subscribed";
		}
		if (!empty ($entry['57.2'])){
			$newperson['eSN_Today__c'] = $entry['57.2'];
			if ($entry['57.2'] == 'Subscribed'){$OptedOutflag = 1;}
		} else {
			$newperson['eSN_Today__c'] = "Not Subscribed";
		}
		if (!empty ($entry['57.3'])){
			$newperson['eSN_IT_School_Leadership__c'] = $entry['57.3'];
			if ($entry['57.3'] == 'Subscribed'){$OptedOutflag = 1;}
		} else {
			$newperson['eSN_IT_School_Leadership__c'] = "Not Subscribed";
		}
		if (!empty ($entry['57.4'])){ /* Check on this field */
			$newperson['MyeCN_EdTech_Leadership__c'] = $entry['57.4'];
			if ($entry['57.4'] == 'Subscribed'){$OptedOutflag = 1;}
		} else {
			$newperson['MyeCN_EdTech_Leadership__c'] = "Not Subscribed";
		}
		if (!empty ($entry['57.5'])){
			$newperson['eCN_Today__c'] = $entry['57.5'];
			if ($entry['57.5'] == 'Subscribed'){$OptedOutflag = 1;}
		} else {
			$newperson['eCN_Today__c'] = "Not Subscribed";
		}
		if (!empty ($entry['57.6'])){
			$newperson['eCN_This_Week__c'] = $entry['57.6'];
			if ($entry['57.6'] == 'Subscribed'){$OptedOutflag = 1;}
		} else {
			$newperson['eCN_This_Week__c'] = "Not Subscribed";
		}
		if (!empty ($entry['57.7'])){
			$newperson['eCN_IT_School_Leadership__c'] = $entry['57.7'];
			if ($entry['57.7'] == 'Subscribed'){$OptedOutflag = 1;}
		} else {
			$newperson['eCN_IT_School_Leadership__c'] = "Not Subscribed";
		}
		if (!empty ($entry['57.8'])){
			$newperson['eClassroom_News__c'] = $entry['57.8'];
			if ($entry['57.8'] == 'Subscribed'){$OptedOutflag = 1;}
		} else {
			$newperson['eClassroom_News__c'] = "Not Subscribed";
		}

		$newperson['eSN_Offers__c'] = "Not Subscribed";
		$newperson['Partner_Offers__c'] = "Not Subscribed";
		$newperson['eCN_Offers__c'] = "Not Subscribed";
		$newperson['eCN_Partners__c'] = "Not Subscribed";
	
		//special update unsub flag if they subscribe to anything...  else do not change it.
		if ($OptedOutflag == 1){
			$newperson['PersonHasOptedOutOfEmail'] = false; 
		}	
		
		$upsertResponse = $mySforceConnectionu->upsert('Email_as_ExternalID__c', array($newperson), 'Account'); 
		
		//echo '<pre>'. print_r($newperson).'</pre>';
		
		
		if ($upsertResponse->success==1)
		{
			//Saved for later use							
		} else { 
			$upsertResponse = $mySforceConnectionu->upsert('Email_as_ExternalID__c', array($newperson), 'Account'); 
		} 
	
	$formsuccess = validateint($_GET['success']);
	
	}
// end funtion SF_Account_Upsert
}








?>