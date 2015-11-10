<?php 
/*
Template Name: eSN Reg with Agile and SF connect
*/

function validateint($inData) {
  $intRetVal = -1;
  $IntValue = intval($inData);
  $StrValue = strval($IntValue);
  if($StrValue == $inData) {
    $intRetVal = $IntValue;
  }
  return $intRetVal;
}


    $opt_form1 = get_option( 'esm_agile_1_prereg_form' );
	$opt_form2 = get_option( 'esm_agile_2_prereg_form' );
	$opt_form3 = get_option( 'esm_gravity_sf_reg_form' );
	
	$gform_akismet_enabled = 'gform_akismet_enabled_'. $$opt_form3 ;
	$gform_post_submission = 'gform_post_submission_'. $$opt_form3 ;

add_filter($gform_akismet_enabled, "disable_akismet");
add_action($gform_post_submission, "SF_Account_Upsert", 10, 2);
add_action("gform_field_standard_settings", "my_standard_settings", 10, 2);
 if($_GET['ocs']){ //information passed between forms
 
	 $esnautofill = array();
	 $oscpizza  = $_GET["ocs"];
	 	$oscpieces = explode("~", $oscpizza);
		$instid =$oscpieces[0];
		$useform = $oscpieces[1];
		
		if($useform == 'he'){
			$urlo = 'https://LookupWS.agile-ed.com/ServiceVer1.asmx/LookupBuildingHE_ESM?id=eSchoolMedia&accesscode=gk49S2uW3V&institid='.$instid;				
			$xmlo = simplexml_load_file($urlo);
			foreach ($xmlo->InstitutionHE_ESM as $InstInZip){
				
				$esnautofill = array(
					org => $InstInZip->Institution_Long_Name,
					renewalAddress => $InstInZip->Mailing_Addr1,
					renewalAddress2 => $InstInZip->Mailing_Addr2,
					city => $InstInZip->Mailing_City,
					state => $InstInZip->Mailing_St,
					zip => $InstInZip->Mailing_ZIP
					);
				 }


		}elseif($useform == 'k12'){
			$urlo= 'https://LookupWS.agile-ed.com/ServiceVer1.asmx/LookupBuildingK12_ESM?id=eSchoolMedia&accesscode=gk49S2uW3V&institid='.$instid;				
			$xmlo = simplexml_load_file($urlo);
				/*<InstitutionK12_ESM> */
				foreach ($xmlo->InstitutionK12_ESM as $InstInZip){
				$esnautofill = array(
					org => $InstInZip->Institution_Long_Name,
					renewalAddress => $InstInZip->Mailing_Addr1,
					renewalAddress2 => $InstInZip->Mailing_Addr2,
					city => $InstInZip->Mailing_City,
					state => $InstInZip->Mailing_St,
					zip => $InstInZip->Mailing_ZIP
					);
				 }
			
		}
 } else {
if($_GET["zipc"]){ $esnautofill = array(zip => $InstInZip->$_GET["zipc"]); }
	 
 }
 
 /*
function SF_Account_Upsert($entry, $form){

//upload information to salesforce from the final form.

	global $wpdb;
	ini_set("soap.wsdl_cache_enabled", "0");
	$USERNAME = "sfdcadmin1@eschoolnews.com"; //- variable that contains your Salesforce.com username (must be in the form of an email)
	$PASSWORD = "eSNadm1n"; //- variable that contains your Salesforce.com password
	$TOKEN = "qhO7UhNTUrYp8XU5eF1SRomDp"; //- variable that contains your Salesforce.com password
	require_once ( ABSPATH . 'soapclient/SforceEnterpriseClient.php');
	require_once ( ABSPATH . 'soapclient/SforceHeaderOptions.php');
	// Salesforce Login information
	$wsdl = ABSPATH . 'soapclient/eSNenterprise.wsdl.xml';
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
	$newSubReq = array(); // array for subscription
		$newSubReq['Source__c'] = "Web";	
		//$newSubReq['WP_ID__c'] = $user_id;
		$newSubReq['WP_ID__c'] = substr($wp_subreq_id, 0, 20);//need to limit length to 20 characters
		$newSubReq["Sub_Status__c"] = 'Pending';
		$newSubReq['Personal_Question__c'] = $entry[59];
		$newSubReq['Promo_Code__c'] = "Registration";
		$newSubReq['Renewal_Link__c'] = substr($$entry[18],0,254);
		$newSubReq['Request_Date__c'] = date("Y-m-d");
		$newSubReq['Request_URL__c'] = $_SERVER["SERVER_NAME"];	
		
		$newSubReq["Name"] = 'eSchoolNews Digital Subscription';
		
	if (!empty ($entry[30])) {
			$newperson['WP_Login__c'] = strtolower($entry[30]);
		}
	
	if (!empty ($entry[4])) {
		$newperson['PersonEmail'] = $entry[4];
		$newSubReq['Email__c'] = $entry[4];
		$newperson['Email_as_ExternalID__c'] = $entry[4]; //12-20-2011	
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
	
	if (!empty ($entry[3])){
		$newperson['Organization__c'] = $entry[3];
		$newSubReq['Organization__c'] = $entry[3];
	}
	if (!empty ($entry[5])){
		$newperson['PersonTitle'] = $entry[5];
		$newSubReq['Title__c'] = $entry[5];
	}
	if (!empty ($entry[6])){
		$newperson['Company_Type__c'] = $entry[6];
		$newSubReq['Organization_Type__c'] = $entry[6];
	}
	if (!empty ($entry[7]) ) { 
		$newperson['PersonMailingStreet'] = $entry[7];
		$newSubReq['Address1__c'] = $entry[7];
	}
	if (!empty ($entry[8])){
		$newperson['Mailing_Address_2__c'] = $entry[8];
		$newSubReq['Address2__c'] = $entry[8];
	}
	if (!empty ($entry[9])){
		$newperson['PersonMailingCity'] = $entry[9];
		$newSubReq['city__c'] = $entry[9];
	}
	if (!empty ($entry[10])){
		$newperson['PersonMailingState'] = $entry[10];
		$newSubReq['State__c'] = $entry[10];
	}
	if (!empty ($entry[12])){
		$newperson['PersonMailingPostalCode'] = $entry[12];
		$newSubReq['Zip__c'] = $entry[12];
	}		
	if (!empty ($entry[13])){
		$newperson['PersonMailingCountry'] = $entry[13];
		$newSubReq['Country__c'] = $entry[13];
	}
	if (!empty ($entry[22])){
		$newperson['Phone'] = $entry[22];
		$newSubReq['Phone__c'] = $entry[22];
	}		
	if (!empty ($entry[31])){
		$newperson['Fax'] = $entry[31];
		$newSubReq['Fax__c'] = $entry[31];
	}			
	if (!empty ($entry[32])){
		$newperson['Grade_Level__c'] = $entry[32];
	} else {
		$newperson['Grade_Level__c'] = "";
	}
	if (!empty ($entry[33])){
		$newperson['Subject_Taught__c'] = $entry[33];
	} else {
		$newperson['Subject_Taught__c'] = "";
	}
	if (!empty ($entry[14])){
		$newSubReq['Personal_Answer__c'] = $entry[14];
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
		$newperson['eSN_Tools_For_Schools__c'] = $entry['57.3'];
		if ($entry['57.3'] == 'Subscribed'){$OptedOutflag = 1;}
	} else {
		$newperson['eSN_Tools_For_Schools__c'] = "Not Subscribed";
	}		
	if (!empty ($entry['57.4'])){
		$newperson['eSN_Offers__c'] = $entry['57.4'];
		if ($entry['57.4'] == 'Subscribed'){$OptedOutflag = 1;}
	} else {
		$newperson['eSN_Offers__c'] = "Not Subscribed";
	}
	if (!empty ($entry['57.5'])){
		$newperson['Partner_Offers__c'] = $entry['57.5'];
		if ($entry['57.5'] == 'Subscribed'){$OptedOutflag = 1;}
	} else {
		$newperson['Partner_Offers__c'] = "Not Subscribed";
	}

	$newperson['Ed_Resource_Alert__c'] = "Not Subscribed";
	$newperson['eClassroom_News__c'] = "Not Subscribed";
	$newperson['eCN_This_Week__c'] = "Not Subscribed";
	$newperson['eCN_Today__c'] = "Not Subscribed";
	$newperson['eCN_Offers__c'] = "Not Subscribed";
	$newperson['eCN_Partners__c'] = "Not Subscribed";

	//special update unsub flag if they subscribe to anything...  else do not change it.
	if ($OptedOutflag == 1){
		$newperson['PersonHasOptedOutOfEmail'] = false; 
	}	
	
	$upsertResponse = $mySforceConnectionu->upsert('Email_as_ExternalID__c', array($newperson), 'Account'); 
	

//When 	
	if ($upsertResponse->success==1)
	{
		update_user_meta($user_id, "sfid", $upsertResponse->id);
		update_user_meta($user_id, "PersonContactId", $upsertResponse->id);
		$newSubReq['Person_Account__c'] = $upsertResponse->id;
//now that we have a new user account put in the my eschool news data if it is set
					$esm_change = '6|1|';
					$seperator = ',';
					if (isset($_POST[input_54_1]) and $_POST[input_54_1] == 213 ) { $esm_change .= '213,'; }	
					if (isset($_POST[input_54_2]) and $_POST[input_54_2] == 27 ) { $esm_change .= '27,'; }
					if (isset($_POST[input_54_3]) and $_POST[input_54_3] == 4 ) { $esm_change .= '4,'; }
					if (isset($_POST[input_54_4]) and $_POST[input_54_4] == 5351 ) { $esm_change .= '5351,'; }
					if (isset($_POST[input_54_5]) and $_POST[input_54_5] == 2303 ) { $esm_change .= '2303,'; }
					if (isset($_POST[input_54_6]) and $_POST[input_54_6] == 43 ) { $esm_change .= '43,'; }
					if (isset($_POST[input_54_7]) and $_POST[input_54_7] == 215 ) { $esm_change .= '215,'; }
					if (isset($_POST[input_54_8]) and $_POST[input_54_8] == 4217 ) { $esm_change .= '4217,'; }
					if (isset($_POST[input_54_9]) and $_POST[input_54_9] == 28 ) { $esm_change .= '28,'; }
					if (isset($_POST[input_54_11]) and $_POST[input_54_11] == 9 ) { $esm_change .= '9,'; }
					if (isset($_POST[input_54_12]) and $_POST[input_54_12] == 26 ) { $esm_change .= '26,'; }
					if (isset($_POST[input_54_13]) and $_POST[input_54_13] == 872 ) { $esm_change .= '872,'; }
					if (isset($_POST[input_54_14]) and $_POST[input_54_14] == 3 ) { $esm_change .= '3,'; }
					if (isset($_POST[input_54_15]) and $_POST[input_54_15] == 11) { $esm_change .= '11,'; }
						
					$esm_change = trim($esm_change, $seperator);
				
					$key = '_myesm_esn';
					$single = true;
					update_user_meta( $user_id, $key, $esm_change );

	
	//we did it so keep little data on the server...							
	} else { 
		//try again in one second...
		
		sleep(1);
		$upsertResponse = $mySforceConnectionu->upsert('Email_as_ExternalID__c', array($newperson), 'Account'); 
			if ($upsertResponse->success==1)
				{
					update_user_meta($user_id, "sfid", $upsertResponse->id);
					update_user_meta($user_id, "PersonContactId", $upsertResponse->id);
					$newSubReq['Person_Account__c'] = $upsertResponse->id;

//now that we have a new user account put in the my eschool news data if it is set
									
					$esm_change = '6|1|';
					$seperator = ',';
					if (isset($_POST[input_54_1]) and $_POST[input_54_1] == 213 ) { $esm_change .= '213,'; }	
					if (isset($_POST[input_54_2]) and $_POST[input_54_2] == 27 ) { $esm_change .= '27,'; }
					if (isset($_POST[input_54_3]) and $_POST[input_54_3] == 4 ) { $esm_change .= '4,'; }
					if (isset($_POST[input_54_4]) and $_POST[input_54_4] == 5351 ) { $esm_change .= '5351,'; }
					if (isset($_POST[input_54_5]) and $_POST[input_54_5] == 2303 ) { $esm_change .= '2303,'; }
					if (isset($_POST[input_54_6]) and $_POST[input_54_6] == 43 ) { $esm_change .= '43,'; }
					if (isset($_POST[input_54_7]) and $_POST[input_54_7] == 215 ) { $esm_change .= '215,'; }
					if (isset($_POST[input_54_8]) and $_POST[input_54_8] == 4217 ) { $esm_change .= '4217,'; }
					if (isset($_POST[input_54_9]) and $_POST[input_54_9] == 28 ) { $esm_change .= '28,'; }
					if (isset($_POST[input_54_11]) and $_POST[input_54_11] == 9 ) { $esm_change .= '9,'; }
					if (isset($_POST[input_54_12]) and $_POST[input_54_12] == 26 ) { $esm_change .= '26,'; }
					if (isset($_POST[input_54_13]) and $_POST[input_54_13] == 872 ) { $esm_change .= '872,'; }
					if (isset($_POST[input_54_14]) and $_POST[input_54_14] == 3 ) { $esm_change .= '3,'; }
					if (isset($_POST[input_54_15]) and $_POST[input_54_15] == 11) { $esm_change .= '11,'; }
						
						$esm_change = trim($esm_change, $seperator);
					
						$key = '_myesm_esn';
						$single = true;
						update_user_meta( $user_id, $key, $esm_change );					
					
					
					
				} else {
					//mail('vcarlson@eschoolnews.com','SF User UPloaded FAILED 2nd try',print_r($sfaccountresponse)); 
				
				}
	}


	if (!empty ($entry[48])){
		
		//check if they want the pub, if so upload it, in a custom object so we cannot just add it if it is eSchool News.
		
		if ($entry[48] == 'Yes'){
			// add subscription 

			$upsertResponse2 = $mySforceConnectionu->upsert('WP_ID__c', array($newSubReq), 'Subscription_Request__c');
			if ($upsertResponse2->success==1){


				} else { 
				//try again
				sleep(1);
				$upsertResponse2 = $mySforceConnectionu->upsert('WP_ID__c', array($newSubReq), 'Subscription_Request__c');
				
			}

		}
	}

$user_login = $entry[30]; //use the input if of the username
$user_pass  = $entry[47]; //use the input if of the password
	 
//pass the above to the wp_signon function
	 
$user = wp_signon( 
array(
'user_login' => $user_login,
'user_password' =>  $user_pass,
'remember' => true)
);

//check if we need to give a message.
if (!empty ($entry[48]) and ($entry[48] == 'No')){
if ($upsertResponse->success==1){

		if($_GET['redirect_to']){
		$redirectto = $_GET['redirect_to'];
		$reditchk = strpos($redirectto, "eschoolnews");
		if ($reditchk > 1){ //we are ok no need to do anything...
		} else { $redirectto = 'http://www.eschoolnews.com/'; }
		
			wp_safe_redirect( $redirectto );
			sleep(2);
			exit();
		break;	
		}	
	
	}	
	
}else if (!empty ($entry[48])){
	if ($upsertResponse2->success==1){

		if($_GET['redirect_to']){
		$redirectto = $_GET['redirect_to'];
		$reditchk = strpos($redirectto, "eschoolnews");
		if ($reditchk > 1){ //we are ok no need to do anything...
		} else { $redirectto = 'http://www.eschoolnews.com/'; }
			wp_safe_redirect( $redirectto );
			sleep(2);
			exit();
		break;	
		}
	}
}

$formsuccess = validateint($_GET['success']);

}

*/

?>

<?php get_header(); 

?>
<style type="text/css">
.recaptchatable td img{display:block!important}

.recaptchatable .recaptcha_r1_c1{background:url('http://www.google.com/recaptcha/api/img/red/sprite.png') 0 -63px no-repeat!important;width:318px!important;height:9px!important}

.recaptchatable .recaptcha_r2_c1{background:url('http://www.google.com/recaptcha/api/img/red/sprite.png') -18px 0 no-repeat!important;width:9px!important;height:57px!important}

.recaptchatable .recaptcha_r2_c2{background:url('http://www.google.com/recaptcha/api/img/red/sprite.png') -27px 0 no-repeat!important;width:9px!important;height:57px!important}

.recaptchatable .recaptcha_r3_c1{background:url('http://www.google.com/recaptcha/api/img/red/sprite.png') 0 0 no-repeat!important;width:9px!important;height:63px!important}

.recaptchatable .recaptcha_r3_c2{background:url('http://www.google.com/recaptcha/api/img/red/sprite.png') -18px -57px no-repeat!important;width:300px!important;height:6px!important}

.recaptchatable .recaptcha_r3_c3{background:url('http://www.google.com/recaptcha/api/img/red/sprite.png') -9px 0 no-repeat!important;width:9px!important;height:63px!important}

.recaptchatable .recaptcha_r4_c1{background:url('http://www.google.com/recaptcha/api/img/red/sprite.png') -43px 0 no-repeat!important;width:171px!important;height:49px!important}

.recaptchatable .recaptcha_r4_c2{background:url('http://www.google.com/recaptcha/api/img/red/sprite.png') -36px 0 no-repeat!important;width:7px!important;height:57px!important}

.recaptchatable .recaptcha_r4_c4{background:url('http://www.google.com/recaptcha/api/img/red/sprite.png') -214px 0 no-repeat!important;width:97px!important;height:57px!important}

.recaptchatable .recaptcha_r7_c1{background:url('http://www.google.com/recaptcha/api/img/red/sprite.png') -43px -49px no-repeat!important;width:171px!important;height:8px!important}

.recaptchatable .recaptcha_r8_c1{background:url('http://www.google.com/recaptcha/api/img/red/sprite.png') -43px -49px no-repeat!important;width:25px!important;height:8px!important}

.recaptchatable .recaptcha_image_cell center img{height:57px!important}

.recaptchatable .recaptcha_image_cell center{height:57px!important}

.recaptchatable .recaptcha_image_cell{background-color:white!important;height:57px!important}

#recaptcha_area,#recaptcha_table{width:318px!important}

.recaptchatable,#recaptcha_area tr,#recaptcha_area td,#recaptcha_area th{margin:0!important!important;border:0!important!important;padding:0!important!important;border-collapse:collapse!important!important;vertical-align:middle!important}

.recaptchatable *{margin:0!important;padding:0!important;border:0!important;font-family:helvetica,sans-serif!important;font-size:8pt!important;color:black!important;position:static!important;top:auto!important;left:auto!important;right:auto!important;bottom:auto!important}

.recaptchatable #recaptcha_image{position:relative!important;margin:auto!important}

.recaptchatable #recaptcha_image #recaptcha_challenge_image{display:block!important}

.recaptchatable #recaptcha_image #recaptcha_ad_image{display:block!important;position:absolute!important;top:0!important}

.recaptchatable img{border:0!important!important;margin:0!important!important;padding:0!important}

.recaptchatable a,.recaptchatable a:hover{cursor:pointer!important;outline:none!important;border:0!important!important;padding:0!important!important;text-decoration:none!important;color:blue!important;background:none!important!important;font-weight:normal!important}

.recaptcha_input_area{position:relative!important!important;width:153px!important!important;height:45px!important!important;margin-left:7px!important!important;margin-right:7px!important!important;background:none!important}

.recaptchatable label.recaptcha_input_area_text{margin:0!important!important;padding:0!important!important;position:static!important!important;top:auto!important!important;left:auto!important!important;right:auto!important!important;bottom:auto!important!important;background:none!important!important;height:auto!important!important;width:auto!important}

.recaptcha_theme_red label.recaptcha_input_area_text,.recaptcha_theme_white label.recaptcha_input_area_text{color:black!important}

.recaptcha_theme_blackglass label.recaptcha_input_area_text{color:white!important}

.recaptchatable #recaptcha_response_field{width:153px!important!important;position:relative!important!important;bottom:7px!important!important;padding:0!important!important;margin:15px 0 0 0!important!important;font-size:10pt!important}

.recaptcha_theme_blackglass #recaptcha_response_field,.recaptcha_theme_white #recaptcha_response_field{border:1px solid gray!important}

.recaptcha_theme_red #recaptcha_response_field{border:1px solid #cca940!important}

.recaptcha_audio_cant_hear_link{font-size:7pt!important;color:black!important}

.recaptchatable{line-height:1!important}

#recaptcha_instructions_error{color:red!important}

.recaptcha_only_if_privacy{float:right!important;text-align:right!important}

#recaptcha-ad-choices{position:absolute!important;height:15px!important;top:0!important;right:0!important}

#recaptcha-ad-choices img{height:15px!important}

.recaptcha-ad-choices-collapsed{width:30px!important;height:15px!important;display:block!important}

.recaptcha-ad-choices-expanded{width:75px!important;height:15px!important;display:none!important}

#recaptcha-ad-choices:hover .recaptcha-ad-choices-collapsed{display:none!important}

#recaptcha-ad-choices:hover .recaptcha-ad-choices-expanded{display:block!important}

</style>
<?php global $theme_options, $suvi; ?>
<div class="row">

<?php get_template_part( 'parts/section-titles' ); ?>
	<div class="small-12 large-12 columns registration-form">
	
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<p>
As a registered member you will have complete access to all our breaking news, educator resources and all our special reports on eSchool News, eCampus News, and eClassroom News.
</p>


<p>
				<?php the_content(); ?>
</p>
                
<?php //Begin checks to see what step they are on and that the data is there ?>


<?php 
$opt_form1submit = 'is_submit_'.$$opt_form1;
$opt_form2submit = 'is_submit_'.$$opt_form2;

if ( ( !isset($_GET["zipc"]) && !isset($_GET["orgtype"]) ) and (empty($_POST) or (!empty($_POST) and ($_POST[$opt_form1submit] == 1)))){ 
		 gravity_form($opt_form1, false, false, false); 

//Begin Step 1 request zip if the form has not been submitted use gravity form in $opt_form1
		 
 } else if ( ( isset($_GET["zipc"]) && isset($_GET["orgtype"]) && !isset($_GET["step3"] ) ) and (empty($_POST) or (!empty($_POST) and ($_POST[$opt_form2submit] == 1)))) { 

 // ^ in this if we check if they are on step 2

 if (isset($_GET["country"]) && $_GET["country"] == 'United States'){
// check if they are United States if not skip this
	 
	 $zipcode = substr($_GET[zipc], 0, 5);
	 
	 if($zipcode == 0){ $skipto3 = 1; // checking the zip code if it fails skip to step 3
	  }
//below check if k-12 or HE then connect to agile and get XML from them.	 
if (in_array($_GET[orgtype], array('School Building','School District','Federal/State Level Education','K-12 Education','Other'))) { 
  $url = 'https://lookupws.agile-ed.com/ServiceVer1.asmx/LookupZipK12?id=eSchoolMedia&accesscode=gk49S2uW3V&zip='.$zipcode;
} elseif (in_array($_GET[orgtype], array('Higher Education','4-year College/University', '2-year College','Vocational/Technical College','Government Organization','Other Organization'))) { 

  $url = 'https://LookupWS.agile-ed.com/ServiceVer1.asmx/LookupZipHE?id=eSchoolMedia&accesscode=gk49S2uW3V&zip='.$zipcode;

} else { $skipto3 = 1; }
// not us, skip to step 3
  $xml = simplexml_load_file($url);

if($skipto3 == 1){
	
// this is step 3 here in step two if they failed all checks or are not US
	gravity_form($opt_form3, false, false, false, $esnautofill);
} else {
 // step two form output list schools in the zip from Agile

  $InstList = array();

   foreach ($xml->InstInZip as $InstInZip){
	if (($InstInZip->Fault =='NO K-12 BUILDINGS FOUND IN ZIP CODE')or($InstInZip->Fault =='NO HIGHER ED BUILDINGS FOUND IN ZIP CODE')){ $skipto3 = 1;} 
	}  

			if($skipto3 == 1){
			// display final form if called.
				gravity_form($opt_form3, false, false, false, $esnautofill);
			} else {

//Note when changing drop down values, we also need to use the gform_admin_pre_render so that the right values are displayed when editing the entry.
$gform_pre_render_form2 = 'gform_pre_render_'. $$opt_form2 ;
add_filter($gform_pre_render_form2, "populate_radio_buttons");

function populate_radio_buttons($form){

  $zipcode = substr($_GET[zipc], 0, 5);
if (in_array($_GET[orgtype], array('School Building','School District','Federal/State Level Education','K-12 Education','Other'))) { 
  $url = 'https://lookupws.agile-ed.com/ServiceVer1.asmx/LookupZipK12?id=eSchoolMedia&accesscode=gk49S2uW3V&zip='.$zipcode;
  $otform = 'k12';
} elseif (in_array($_GET[orgtype], array('Higher Education','4-year College/University', '2-year College','Vocational/Technical College','Government Organization','Other Organization'))) { 
  $url = 'https://LookupWS.agile-ed.com/ServiceVer1.asmx/LookupZipHE?id=eSchoolMedia&accesscode=gk49S2uW3V&zip='.$zipcode;
  $otform = 'he';
}
  $xml = simplexml_load_file($url);

    //Creating radio button item array.*/
    $items = array(); 
    // Get the custom field values stored in the array

foreach ($xml->InstInZip as $InstInZip)
{
$itemvalue = ''.$InstInZip->Inst_UID .'~'. $otform;
$itemtext = $InstInZip->Institution_Long_Name .' '. $InstInZip->Mailing_City .', '. $InstInZip->Mailing_St;
	$items[] = array("value" => $itemvalue, "text" => $itemtext);	
	
}

 $items[] = array("value" => '', "text" => 'My institution is not listed');  //Adding items to field id 
  foreach($form["fields"] as &$field)
        if($field["id"] == 63){
            $field["choices"] = $items;
        }

    return $form; 
}

gravity_form($opt_form2, false, false, false); 
			}
		}
	 
	 } else {
		gravity_form($opt_form3, false, false, false, $esnautofill);
	 }
		  
 
 
 }else if (isset($_GET["ocs"]) && isset($_GET["country"]) && isset($_GET["orgtype"]) ) {    
 		gravity_form($opt_form3, false, false, false, $esnautofill); ?>
        
<?php } else { 
gravity_form($opt_form3, false, false, false, $esnautofill);
}  ?>                                

		<?php endwhile; else : endif; ?>
		
		<?php  // no sidebar ?>
	</div>
</div>		
	
	<?php get_footer(); ?>

