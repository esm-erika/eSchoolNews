<?php
 /* 
Template Name: Light Industries Sub Form
*/
global $theme_options, $newspaper, $user_ID, $wpdb, $showPromo, $source, $sfid;

$URLUID = validateint($_GET['u']);
$subtype = validateint($_GET['st']);
$URLEmail = $_GET['em'];
$sfid = $_GET['sfid'];
$source = $_GET['pub'];
$showPromo = $_GET['promo'];
$promoCode = $_GET['promocode'];

if ($source == 'ecampusnews'){ $thepuboffer = 'ecn';}
elseif(strpos($_SERVER["SERVER_NAME"], "ecampusnews") !== false){ $thepuboffer = 'ecn';}
else {$thepuboffer = 'other';}

add_action("gform_post_submission_30", "SF_Account_Upsert", 10, 2);
add_filter('gform_pre_render', 'remove_PromoCode');
//remove_PromoCode($form);
function SF_Account_Upsert($entry, $form){
	global $wpdb;

	$user_email = $entry[4];
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

	//determine site we are on - ecampus, eclassroom, or enews
	$sitesource = $entry[26];
	
	$entrysubtype = $entry[21];
	if($entrysubtype == 'Print'){ 
			$pubsubtype = "Print";
			$pubforid = 1;
		} else {
			$pubsubtype = "Digital";
			$pubforid = 2;
		}

	
	if ($sitesource !== ""){
		$school = strpos($sitesource, "eschoolnews");
		$campus = strpos($sitesource, "ecampusnews");
		$classroom = strpos($sitesource, "eclassroomnews"); 
		
	} else{
		$school = strpos($_SERVER["SERVER_NAME"], "eschoolnews");
		$campus = strpos($_SERVER["SERVER_NAME"], "ecampusnews");
		$classroom = strpos($_SERVER["SERVER_NAME"], "eclassroomnews");
	
	}
	
	if ($school !== false){
	
		$name = 'eSchoolNews '.$pubsubtype.' Subscription';
		$linksource = "eschoolnews";
		$pubforid = $pubforid . '1';
	}elseif ($campus !== false){
		$name = 'eCampusNews '.$pubsubtype.' Subscription';
		$linksource = "ecampusnews";
		$pubforid = $pubforid . '2';
	}elseif ($classroom !== false){
		$newSubReq["Name"] = 'eClassroomNews '.$pubsubtype.' Subscription';
		$linksource = "eclassroomnews";
		$pubforid = $pubforid . '3';
	} else{
		$name = 'Unknown';
		
		$linksource = "Unk";
		$pubforid = $pubforid . '4';
	}
	
	
	
	//query sfdc to see if user exists based on email address	  
	$sfaccountdataquery = ("Select Id, WP_Unique_ID__c from Account where Email_as_ExternalID__c ='".$user_email."' and IsPersonAccount=true"); 
	$sfaccountresponse = $mySforceConnectionu->query($sfaccountdataquery);
	$wp_id = "";

	//create array for account to get upserted
	$newperson = array();
	
	if (count($sfaccountresponse->records)>0){
		$wp_id = $sfaccountresponse->records[0]->WP_Unique_ID__c;
	
	}else {
		//see if user is in WP and get id
		$wp_id = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $WPDB->USERS WHERE USER_EMAIL='".$user_email."'"));
		$newperson['Source__c'] = $_SERVER["SERVER_NAME"]; //only want to populate source when first creating person account
	}
	
	if (is_null($wp_id )){
		$wp_id = $user_email;
		
	}

	$newperson['WP_Unique_ID__c'] = $wp_id;
	
	//query sfdc subscription request object to see if there is an existing pending subscription request
	$sfsubreqdataquery = ("Select Id, wp_id__c, sub_status__c, Title__c, name from Subscription_Request__c where Email__c = '".$user_email."' and Sub_Status__c = 'Pending' and name = '".$name."'");
	$sfsubreqresponse = $mySforceConnectionu->query($sfsubreqdataquery);

	if (count($sfsubreqresponse->records)>0){
		$wp_subreq_id = $pubforid . $sfsubreqresponse->records[0]->WP_ID__c;
	} else {//there is no sub request record, need to create an external id
//echo 'No Pending'.PHP_EOL;
		$sfcountquery = ("Select id from Subscription_Request__c where Email__c = '".$user_email."'");
		$sfcountresponse = $mySforceConnectionu->query($sfcountquery);
//echo 'count '.$sfcountresponse->size;
		$reccount = $sfcountresponse->size + 1;
		$wp_subreq_id = $pubforid . $user_email;
	}
	
	//create new array for subscription request to be upserted
	$newSubReq = array();
	$newSubReq['Source__c'] = "Web";
	$newSubReq['WP_ID__c'] = substr($wp_subreq_id, 0, 20);//need to limit length to 20 characters
//echo $newSubReq['WP_ID__c'].PHP_EOL.PHP_EOL;
	$newSubReq["Sub_Status__c"] = 'Pending';
	$newSubReq['Personal_Question__c'] = "What was your high school mascot?";
	$newSubReq['Request_URL__c'] = $_SERVER["SERVER_NAME"];
	$newSubReq["Name"] = $name;
	$newSubReq['Request_Date__c'] = date("Y-m-d");
	
	$sfFEIDquery = ("Select feid__c, wp_id__c from Subscription_Request__c where Email__c = '".$user_email."' and Sub_Status__c = 'Processed' and name = '".$name."'");
	$sfFEIDresponse = $mySforceConnectionu->query($sfFEIDquery);
	
	if (count($sfFEIDresponse->records)>0){
//echo 'Processed Found'.PHP_EOL;
//echo 'wp id = '.$sfFEIDresponse->records[0]->WP_ID__C.PHP_EOL;
		$newSubReq['FEID__c'] = $sfFEIDresponse->records[0]->FEID__c;
	}
	
	if (!empty ($entry[4])) {
		//if (strpos($entry[4], 'esmnoemailsupplied') !== false) {
			$newperson['PersonEmail'] = $entry[4];
			$newSubReq['Email__c'] = $entry[4];
			$newperson['Email_as_ExternalID__c'] = $entry[4]; //12-20-2011	
		//}
	}
	if (!empty ($entry[1]) ) { 
		$newperson['FirstName'] = $entry[1];
		$newSubReq['First_Name__c'] = $entry[1];
	}
	if (!empty ($entry[2]) ) {
		$newperson['LastName'] = $entry[2];
		$newSubReq['Last_Name__c'] = $entry[2];
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
	if (!empty ($entry[23])){
		$newperson['Grade_Level__c'] = $entry[23];
	}
	if (!empty ($entry[24])){
		$newperson['Subject_Taught__c'] = $entry[24];
	}
	if (!empty ($entry[25])){
		$newperson['Industry__c'] = $entry[25];
	}
	if (!empty ($entry[14])){
		$newSubReq['Personal_Answer__c'] = $entry[14];
	}
	if (!empty ($entry[29])){
		$newSubReq['Promo_Code__c'] = $entry[29];

	}
	
	$upsertResponse = $mySforceConnectionu->upsert('Email_as_ExternalID__c', array($newperson), 'Account');

//		echo '<pre> 189<br>';
	//	echo print_r($upsertResponse);
		//echo '</pre>';
	
	if ($upsertResponse->success==1){
		update_user_meta($user_id, "sfid", $upsertResponse->id);

		$sfaccountdataquery = ("Select Id, PersonContactId from Account where PersonEmail ='".$entry[4]."'");
		$sfaccountresponse = $mySforceConnectionu->query($sfaccountdataquery);						
		$sfAccountid = $sfaccountresponse->records[0]->Id; 
	//	echo '<pre> 195<br>';
	//	echo print_r($sfaccountresponse);
	//	mail('vcarlson@eschoolnews.com','SF Subscription upserted account', print_r($sfaccountresponse).print_r($sfAccountid));
	//	echo '</pre>';
		
		
		//since upserted account successfully, now upsert sub request
		//get the person account id just created to use in the subscription request record
		$newSubReq['Person_Account__c'] = $sfAccountid; 
		//need to set renewal link
		$isrenewal = strpos($entry[source_url], 'sfid');
		if ($isrenewal!== false){
			$renewalurl = substr($entry[source_url], 0, $isrenewal).'sfid='.$sfAccountid.'&source='.$linksource;	
		} else{
			if (strpos($entry[source_url], '?' !== false)){
				$renewalurl = $entry[source_url].'&sfid='.$sfAccountid.'&source='.$linksource;
			}else{
				$renewalurl = $entry[source_url].'?sfid='.$sfAccountid.'&source='.$linksource;
			}
		}

		$newSubReq['Renewal_Link__c'] = substr($renewalurl,0,254);
		$upsertResponse2 = $mySforceConnectionu->upsert('WP_ID__c', array($newSubReq), 'Subscription_Request__c');
		
		//echo '<pre> 220<br>' . $Subscription_Request__c;
		//print_r($newSubReq);
		//print_r($sfaccountresponse);
		//echo '</pre>';
		
		
		if ($upsertResponse2->success==1){

			//print_r($sfaccountresponse);
			//mail('vcarlson@eschoolnews.com','SF Subscription request upload success','we are ok');
		} else { 
			//mail('vcarlson@eschoolnews.com','SF Subscription Request UPload FAILED', print_r($newSubReq).print_r($upsertResponse2));
		}
	} else { 
		//mail('vcarlson@eschoolnews.com','SF Subscription form UPload FAILED',print_r($sfaccountresponse));
		//mail('vcarlson@eschoolnews.com','an SF Subscription account upload FAILED ','Email address that failed is '.$user_email);
		//echo '<pre> 236<br>';
		//print_r($newSubReq);
		//print_r($sfaccountresponse);
		//echo '</pre>';		
		
	}
}

function safe($value){
	$stripped = strip_tags($value);	
   	return mysql_real_escape_string($stripped);
}

// Then, when I am using my code, I simply use:
// $name = safe($_POST["name"]);
// $password = safe($_POST["password"]);

function sanityCheck($string, $type, $length){

  // assign the type
  $type = 'is_'.$type;

  if(!$type($string))
    {
    return FALSE;
    }
  // now we see if there is anything in the string
  elseif(empty($string))
    {
    return FALSE;
    }
  // then we check how long the string is
  elseif(strlen($string) > $length)
    {
    return FALSE;
    }
  else
    {
    // if all is well, we return TRUE
    return TRUE;
    }
}

function validateint($inData) {
  $intRetVal = -1;

  $IntValue = intval($inData);
  $StrValue = strval($IntValue);
  if($StrValue == $inData) {
    $intRetVal = $IntValue;
  }

  return $intRetVal;
}
		
if (!isset($_POST['Submit']) and !isset($_POST['Subscribe'])) {	
		
	//DSCOTT
	if (!is_null($sfid) and $sfid!=="" and strlen($sfid) == 15 and(validate_email($URLEmail))){//!is_null($URLEmail) and $URLEmail!==""){
		$urldatacheck = 1;
	} else {
		$urldatacheck = 0;
	}

	if ($urldatacheck == 1) {
		//$renewalinfo=$wpdb->get_row($wpdb->prepare("SELECT Pub, Source, Email, FirstName, LastName, Title, Organization, OrgType, Address, Address2, City, State, ZIP, Country, Phone, Fax FROM renewal WHERE Email = %s and UID = %s", $URLEmail, $URLUID));
		//Get data from sf to populate form
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
		//query sfdc to see if user exists based on email address	  
		$sfaccountdataquery = ("Select Organization__c, FirstName, PersonEmail, LastName, PersonTitle, Company_Type__c, PersonMailingStreet, Mailing_Address_2__c, PersonMailingCity, PersonMailingState, PersonMailingPostalCode, PersonMailingCountry, Phone, Industry__c, Grade_Level__c, Subject_Taught__c from Account where Id ='".$sfid."' and PersonEmail = '".$URLEmail."'"); 
		$sfaccountresponse = $mySforceConnectionu->query($sfaccountdataquery);

		if ($sfaccountresponse->size ==1){
			foreach ($sfaccountresponse->records as $record) {
				$org = $record->Organization__c;
				$first = $record->FirstName;
				$last = $record->LastName;
				$email = $record->PersonEmail;
				$title = $record->PersonTitle;
				$type = $record->Company_Type__c;
				$address = $record->PersonMailingStreet;
				$address2 = $record->Mailing_Address_2__c;
				$city = $record->PersonMailingCity;
				$state = $record->PersonMailingState;
				$postal = $record->PersonMailingPostalCode;
				$country = $record->PersonMailingCountry;
				$phone = $record->Phone;
				$industry = $record->Industry__c;
				$grade = $record->Grade_Level__c;
				$subject = $record->Subject_Taught__c;
			}
		} else {
			//mail('vcarlson@eschoolnews.com','AutoFill of Subscription failed',$sfaccountdataquery);
		}
		
	
	
	// $formnumber = $renewalinfo->Source;
	if ($subtype == 5) { // print only 5
		$getspub = 'Print';
	} else {
		$getspub = 'Digital';
	} 	
	
		if(strpos($email, 'esmnoemailsupplied') !== false){$email = "";}
	$esnautofill = array(
		renewalpub => $renewalinfo->Pub,
		renewalemail => $email,
		renewalFirstName => $first,
		renewalLastName => $last,
		renewalOrganization => $org,
		renewalAddress => $address,
		renewalAddress2 => $address2,
		renewalCity => $city,
		renewalState => $state,
		renewalZIP => $postal,
		renewalCountry => $country,
		renewalPhone => $phone,
		getspub => $getspub,
		getsource => $source,
		getsfid => $sfid,
		setPromoCode => $promoCode);
}
}
else{
	//echo 'no good';
}

function remove_PromoCode($form) {     
	//if(!is_user_logged_in()) return $form;  
	$showPromo = $_GET['promo'];

	if(is_null($showPromo)){
		$fields_to_hide = array('Promo Code');    
		foreach($form['fields'] as $key=>$field) {         
			if(in_array($field['label'], $fields_to_hide)) {             
				unset($form['fields'][$key]);         
			}     
		}
	}		
	return $form; 
}
$astused = 999999999999; ?>

<?php //get_header(); 
include (TEMPLATEPATH . '/header.php');
?>
<style type="text/css">

select {border: 1px solid #bbb;}

.gf_highlight{
	background-color: #dfefff;
	padding:10px 10px 15px 10px;
	border: 1px solid #c2d7ef;
}

.ginput_container{ margin-top: -2px; margin-bottom: 10px;}

ul.gfield_radio {display:block; margin-left:3px;float:right;}
h2.gsection_title{display:block; font-size:14px; font-weight:bold; margin:20px 0px;}

div.gfield_description {display:block; margin-top:-10px;}
.gfield {clear:both; margin-bottom:15px;} 
.gform_wrapper .validation_error {
	color: #790000;
	font-weight: bold;
	font-size: 14px;
	line-height: 1.5em;
	margin-bottom: 16px;

}
.gform_wrapper li.gfield.gfield_error,
.gform_wrapper li.gfield.gfield_error.gfield_contains_required.gfield_creditcard_warning {
	background-color: #FFDFDF;
	margin-bottom: 6px !important;
	padding: 4px !important;
	border: 1px solid #C89797

}

.gf_extra_margin_bottom{
	margin-bottom: 30px
}

.gf_left_half {	width: 45%;
	float: left;
 	clear:none;
	margin: 0 0 8px 0;
	min-height: 1em}

.gf_right_half { width: 45%;
	float: left;
 	clear:none;
	margin: 0 0 8px 0;
	min-height: 1em}

.gform_wrapper li.gfield.gf_list_3col label.gfield_label { line-height:35px; }

.gform_wrapper li.gfield.gf_list_3col ul.gfield_checkbox li,
.gform_wrapper li.gfield.gf_list_3col ul.gfield_radio li,
.gform_wrapper li.gfield.gf_3col ul.gfield_checkbox li,
.gform_wrapper li.gfield.gf_3col ul.gfield_radio li {
	width: 33%;
	float: left;
	margin: 0 0 3px 0;
	min-height: 1em

}

.gform_wrapper .gfield_error .ginput_complex .ginput_left,
.gform_wrapper .gfield_error .ginput_complex .ginput_right {
	width: 50%
}
.gform_wrapper .ginput_complex .ginput_left input {
	width: 95% !important

}
.gform_wrapper .ginput_complex .ginput_right input {
	width: 95% !important

}
.gform_wrapper .ginput_complex .ginput_left  {
	width: 50%;
	float: left

}
.gform_wrapper .ginput_complex .ginput_right  {
	width: 50%;
	float: right;

}

.gform_wrapper .ginput_complex label,
.gform_wrapper .gfield_time_hour label,
.gform_wrapper .gfield_time_minute label,
.gform_wrapper .gfield_date_month label,
.gform_wrapper .gfield_date_day label,
.gform_wrapper .gfield_date_year label,
.gform_wrapper .instruction {
	display: block;
	margin: -3px 0 15px 0px;
	font-size: 10px;
	letter-spacing: 0.5pt;
	width: 50%
}

li.gfield { margin-top:5px;}

div#gf_content_col_1.gf_faux_col,
div#gf_content_col_2.gf_faux_col { width: 47%; float:left; }
div#gf_content_col_1.gf_faux_col { margin-right: 3%}
div#gf_content_col_2.gf_faux_col { clear:right; }

div.gf_faux_col input.medium,
div.gf_faux_col input.large,
div.gf_faux_col textarea { width:96% !important }

select {border:solid 1px #ccc;}

#gform_submit_button_30 { padding:4px 40px; font-size:20px; }

</style>
<?php global $theme_options, $suvi; ?>
	
<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<div class="row top">
	<div class="small-12 medium-8 columns" role="main">

		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			 </header>
			 <hr/>
		<div class="entry-content">

				<?php if(get_field('subheader')){
					echo '<h3 class="subheader">';
					the_field('subheader');
					echo '</h3>';
			} ?>

    
	<?php  the_content(); ?>
    
    <?php  gravity_form(30, false, false, false, $esnautofill);  
    	//gravity_form($id, $display_title=true, $display_description=true, $display_inactive=false, $field_values=null, $ajax=false)?>
       </div>
	</article>
</div>
		
		<?php  // no sidebar ?>
	<?php endwhile; else : endif; ?>	
	

	<?php //get_footer(); 
	include (TEMPLATEPATH . '/footer.php');
	?>

