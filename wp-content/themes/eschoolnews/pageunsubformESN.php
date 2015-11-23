<?php
/* 
Template Name: Salesforce Selective Unsub
*/

function SFDCConnectionCC (){
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

function validate_email2
( $email) {
	if (filter_var($email, FILTER_VALIDATE_EMAIL)) { return true; } else { return false; }
}
function generateRandomString($length = 16) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
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

$dtDate = date("Y-m-d H:i:s");
global $theme_options, $newspaper, $wpdb;
$Site_Name = get_bloginfo('name');

if (isset($_POST['submit'])) {
	if ($_POST['emailtounsub']) { // check it again... 
			$unsubemailb = $_POST['emailtounsub'];
			$message=$_POST['emailtounsub'].' ';
			 if(validate_email2
($unsubemailb)){
				$emailtounsubcheck = 1;
				//$found = $wpdb->get_var($wpdb->prepare("SELECT ID FROM $wpdb->users WHERE user_email = '%s'", $unsubemailb));
				
				
//if ($found > 0) {
if ($emailtounsubcheck == 1) {

		     $changeemailsubs = array();
			 //$changeemailsubs['PersonEmail'] = $unsubemailb;
			 $changeemailsubs['Email_as_ExternalID__c'] = $unsubemailb;
			 



		$conn = SFDCConnectionCC();
		$contactQueryResponse = $conn->query("Select id from Account where Email_as_ExternalID__c='".$unsubemailb."'");
		if ($contactQueryResponse){ 
			 $Accountid = $contactQueryResponse->records[0]->Id;
		} else { /*email not found*/}

			if (isset($_POST['all_newsletters'])) {
				//Subscribed,Not Subscribed
				$changeemailsubs['eSN_This_Week__c'] = 'Not Subscribed';
				$changeemailsubs['eSN_Today__c'] = 'Not Subscribed';
				$changeemailsubs['eSN_Tools_For_Schools__c'] = 'Not Subscribed';
				$changeemailsubs['eSN_Offers__c'] = 'Not Subscribed';
				$changeemailsubs['Partner_Offers__c'] = 'Not Subscribed';
				$changeemailsubs['eClassroom_News__c'] = 'Not Subscribed';
				$changeemailsubs['eCN_This_Week__c'] = 'Not Subscribed';
				$changeemailsubs['eCN_Today__c'] = 'Not Subscribed';
				$changeemailsubs['eCN_Offers__c'] = 'Not Subscribed';
				$changeemailsubs['eCN_Partners__c'] = 'Not Subscribed';
				$changeemailsubs['ed_resource_alert__c'] = 'Not Subscribed';
				$changeemailsubs['MOOC_Update__c'] = 'Not Subscribed';
				unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'Innovation Weekly',$Accountid);
				unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'Digital Leap',$Accountid);
				unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'eSN Today',$Accountid);
				unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'Tools for Schools',$Accountid);
				unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'Ed Resource Alert',$Accountid);
				unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'eSN Offers',$Accountid);
				unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'eSN Partners',$Accountid);
				unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'eClassroom News',$Accountid);
				unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'Reinventing Higher Education',$Accountid);
				unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'Mooc Update',$Accountid);
				unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'eCN Today',$Accountid);
				unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'eCN Offers',$Accountid);
				unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'eCN Partners',$Accountid);
				unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'eCN IT School Leadership',$Accountid);
				unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'eSN IT School Leadership',$Accountid);

				
				
			 } else {

					if (isset($_POST['eschool_news_this_week'])) {
						$message = $message.'unsub_eschool_news_this_week, ';
						$unsub_eschool_news_this_week = 1;
						$changeemailsubs['eSN_This_Week__c'] = 'Not Subscribed';
						unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'Innovation Weekly',$Accountid);
					}	
					if (isset($_POST['Digital_Leap'])) {
						$message = $message.'Digital_Leap, ';
						$unsub_Digital_Leap = 1;
						$changeemailsubs['Digital_Leap__c'] = 'Not Subscribed';
						unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'Digital Leap',$Accountid);

					}
					
					
					if (isset($_POST['eschool_news_today'])) {
						$message = $message.'eschool_news_today, ';
						$unsub_eschool_news_today = 1;
						$changeemailsubs['eSN_Today__c'] = 'Not Subscribed';
						unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'eSN Today',$Accountid);

					}					
					
					if (isset($_POST['eschool_news_tools_for_schools'])) {
						$message = $message.'eschool_news_tools_for_schools, ';
						$unsub_eschool_news_tools_for_schools = 1;
						$changeemailsubs['eSN_Tools_For_Schools__c'] = 'Not Subscribed';
						unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'Tools for Schools',$Accountid);
					}
					
					if (isset($_POST['ed_resource_alert'])) {
						$message = $message.'ed_resource_alert, ';
						$unsub_ed_resource_alert = 1;
						$changeemailsubs['ed_resource_alert__c'] = 'Not Subscribed';
						unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'Ed Resource Alert',$Accountid);
					}					
					
					if (isset($_POST['special_offers_from_eschool_news'])) {
						$message = $message.'special_offers_from_eschool_news, ';
						$unsub_special_offers_from_eschool_news = 1;
						$changeemailsubs['eSN_Offers__c'] = 'Not Subscribed';
						unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'eSN Offers',$Accountid);
					}
					if (isset($_POST['special_offers_from_school_technology_vendors'])) {
						$message = $message.'special_offers_from_school_technology_vendors, ';
						$unsub_special_offers_from_school_technology_vendors = 1;
						$changeemailsubs['Partner_Offers__c'] = 'Not Subscribed';
						unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'eSN Partners',$Accountid);
					}
					if (isset($_POST['eclassroom_news'])) {
						$message = $message.'eclassroom_news, ';
						$unsub_eclassroom_news = 1;
						$changeemailsubs['eClassroom_News__c'] = 'Not Subscribed';
						unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'eClassroom News',$Accountid);
						}

						
					if (isset($_POST['ecampus_news_this_week'])) {
						$message = $message.' ecampus_news_this_week, ';
						$unsub_ecampus_news_this_week = 1;
						$changeemailsubs['eCN_This_Week__c'] = 'Not Subscribed';
						unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'Reinventing Higher Education',$Accountid);
					}	
					if (isset($_POST['MOOC_Update'])) {
						$message = $message.' MOOC_Update, ';
						$unsub_MOOC_Update = 1;
						$changeemailsubs['MOOC_Update__c'] = 'Not Subscribed';
						unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'Mooc Update',$Accountid);
					}						
					
					if (isset($_POST['ecampus_news_today'])) {
						$message = $message.' ecampus_news_today, ';
						$unsub_ecampus_news_today = 1;
						$changeemailsubs['eCN_Today__c'] = 'Not Subscribed';
						unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'eCN Today',$Accountid);
						
					}
					if (isset($_POST['special_offers_from_ecampus_news_online'])) {
						$message = $message.' special_offers_from_ecampus_news_online, ';
						$unsub_special_offers_from_ecampus_news_online = 1;
						$changeemailsubs['eCN_Offers__c'] = 'Not Subscribed';
						unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'eCN Offers',$Accountid);
						

					}
					if (isset($_POST['special_offers_from_campus_technology_vendors'])) {
						$message = $message.' special_offers_from_campus_technology_vendors, ';
						$unsub_special_offers_from_campus_technology_vendors = 1;
						$changeemailsubs['eCN_Partners__c'] = 'Not Subscribed';
						unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'eCN Partners',$Accountid);
						

					}	
					if (isset($_POST['eCN_IT_School_Leadership'])) {
						$message = $message.' eCN IT School Leadership, ';
						$unsub_eCN_IT_School_Leadership = 1;
						$changeemailsubs['eCN_IT_School_Leadership__c'] = 'Not Subscribed';
						unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'eCN IT School Leadership',$Accountid);
						

					}						
					if (isset($_POST['eSN_IT_School_Leadership'])) {
						$message = $message.' eSN IT School Leadership, ';
						$unsub_eSN_IT_School_Leadership = 1;
						$changeemailsubs['eSN_IT_School_Leadership__c'] = 'Not Subscribed';
						unsub_record($unsubemailb,'Unsubscribe',$Site_Name,'eSN IT School Leadership',$Accountid);

					}	

					
			 }
ini_set("soap.wsdl_cache_enabled", "0");

 $USERNAME = "sfdcadmin1@eschoolnews.com"; //- variable that contains your Salesforce.com username (must be in the form of an email)
 $PASSWORD = "eSNadm1n"; //- variable that contains your Salesforce.com password
 $TOKEN = "qhO7UhNTUrYp8XU5eF1SRomDp"; //- variable that contains your Salesforce.com password

define("SOAP_CLIENT_BASEDIR", "./soapclient");
require_once (SOAP_CLIENT_BASEDIR.'/SforceEnterpriseClient.php');
require_once (SOAP_CLIENT_BASEDIR.'/SforceHeaderOptions.php');

  $mySforceConnectionu = new SforceEnterpriseClient();
  $mySoapClient = $mySforceConnectionu->createConnection(SOAP_CLIENT_BASEDIR.'/eSNenterprise.wsdl.xml');
  $mylogin = $mySforceConnectionu->login($USERNAME, $PASSWORD.$TOKEN);


					$upsertResponse = $mySforceConnectionu->upsert('Email_as_ExternalID__c', array($changeemailsubs), 'Account');
					
										
						if ($upsertResponse->success==1)
						{
							// echo print_r($upsertResponse);
							
						} else { 
							if (isset($_POST['all_newsletters'])) {
								$wpdb->query( $wpdb->prepare("INSERT INTO emailsuppression (txtemail, dtdateadd, txtipaddress) VALUES (%s, %s, %s )", $unsubemailb, $dtDate, $txtIP) );
							} else { 
								mail('vcarlson@eschoolnews.com','FAILED UNSUBSCRIBE REQUEST USER NOT FOUND IN SF', $message);
								$wpdb->query( $wpdb->prepare("INSERT INTO emailsuppression (txtemail, dtdateadd, txtipaddress) VALUES (%s, %s, %s )", $unsubemailb, $dtDate, $message) );
							
							}
						
						 } 


					} else {   

							if (isset($_POST['all_newsletters'])) {
								$wpdb->query( $wpdb->prepare("INSERT INTO emailsuppression (txtemail, dtdateadd, txtipaddress) VALUES (%s, %s, %s )", $unsubemailb, $dtDate, $txtIP) );
							} else { 

								if (isset($_POST['eschool_news_this_week'])) {
									$message = $message.'unsub_eschool_news_this_week, ';
									$unsub_eschool_news_this_week = 1;
								}	
								if (isset($_POST['eschool_news_today'])) {
									$message = $message.'eschool_news_today, ';
									$unsub_eschool_news_today = 1;
								}
								
								if (isset($_POST['Digital_Leap'])) {
									$message = $message.'Digital_Leap, ';
									$unsub_Digital_Leap = 1;
								}								
								
								
									
								if (isset($_POST['ed_resource_alert'])) {
									$message = $message.'ed_resource_alert, ';
									$unsub_ed_resource_alert = 1;
								}
								
								if (isset($_POST['eschool_news_tools_for_schools'])) {
									$message = $message.'eschool_news_tools_for_schools, ';
									$unsub_eschool_news_tools_for_schools = 1;
								}
								if (isset($_POST['special_offers_from_eschool_news'])) {
									$message = $message.'special_offers_from_eschool_news, ';
									$unsub_special_offers_from_eschool_news = 1;
								}
								if (isset($_POST['special_offers_from_school_technology_vendors'])) {
									$message = $message.'special_offers_from_school_technology_vendors, ';
									$unsub_special_offers_from_school_technology_vendors = 1;
								}
								if (isset($_POST['eclassroom_news'])) {
									$message = $message.'eclassroom_news, ';
									$unsub_eclassroom_news = 1;
									}
								
								if (isset($_POST['ecampus_news_this_week'])) {
									$message = $message.' ecampus_news_this_week, ';
									$unsub_ecampus_news_this_week = 1;
								}	
								if (isset($_POST['MOOC_Update'])) {
									$message = $message.' MOOC_Update, ';
									$unsub_MOOC_Update = 1;
								}	
								if (isset($_POST['ecampus_news_today'])) {
									$message = $message.' ecampus_news_today, ';
									$unsub_ecampus_news_today = 1;
								}
								if (isset($_POST['special_offers_from_ecampus_news_online'])) {
									$message = $message.' special_offers_from_ecampus_news_online, ';
									$unsub_special_offers_from_ecampus_news_online = 1;
								}
								if (isset($_POST['special_offers_from_campus_technology_vendors'])) {
									$message = $message.' special_offers_from_campus_technology_vendors, ';
									$unsub_special_offers_from_campus_technology_vendors = 1;
								}	
								if (isset($_POST['eCN_IT_School_Leadership'])) {
									$message = $message.' eCN IT School Leadership, ';
									$unsub_eCN_IT_School_Leadership = 1;
								}	
								if (isset($_POST['eSN_IT_School_Leadership'])) {
									$message = $message.' eSN IT School Leadership, ';
									$unsub_eSN_IT_School_Leadership = 1;
								}																	
								
								

							
								mail('vcarlson@eschoolnews.com,ndavid@eschoolnews.com,jfesta@eschoolnews.com','FAILED UNSUBSCRIBE REQUEST EMAIL NOT FOUND IN WP SYSTEM', $message);
								
								$wpdb->query( $wpdb->prepare("INSERT INTO emailsuppression (txtemail, dtdateadd, txtipaddress) VALUES (%s, %s, %s )", $unsubemailb, $dtDate, $message) );
								
								
								
								
								
							}

					}

			 } else {
				$emailtounsubcheck = 0;
			 }
		} 
	} else {
	
	$unsublist = validateint($_GET['list']);
	$unsubemail = $_GET['em'];

	if($unsublist > -1) {
	  // The input is a valid positive integer, so we can now use it
		if ($unsublist == 100){
		$eschool_news_this_week = 1;
			$hidesec2 = 1;
		} else if ($unsublist == 101){
		$eschool_news_today = 1;
			$hidesec2 = 1;
		} else if ($unsublist == 102){
		$eschool_news_tools_for_schools = 1;
			$hidesec2 = 1;
		} else if ($unsublist == 103){
		$special_offers_from_eschool_news = 1;
			$hidesec2 = 1;
		} else if ($unsublist == 104){
			$hidesec2 = 1;
		$special_offers_from_school_technology_vendors = 1;
		} else if ($unsublist == 105){
			$hidesec2 = 1;	
		$eclassroom_news = 1;
		} else if ($unsublist == 106){
		$ed_resource_alert = 1;
			$hidesec2 = 1;
		} else if ($unsublist == 107){
		$Digital_Leap = 1;
			$hidesec2 = 1;
		} else if ($unsublist == 108){
		$eSN_IT_School_Leadership = 1;
			$hidesec2 = 1;
		} else if ($unsublist == 200){
		$ecampus_news_this_week = 1;
			$hidesec2 = 1;
		} else if ($unsublist == 201){
		$ecampus_news_today = 1;
			$hidesec2 = 1;
		} else if ($unsublist == 202){
		$special_offers_from_ecampus_news_online = 1;
			$hidesec2 = 1;
		} else if ($unsublist == 203){
		$special_offers_from_campus_technology_vendors = 1;
			$hidesec2 = 1;
		} else if ($unsublist == 204){
		$MOOC_Update = 1;
			$hidesec2 = 1;
		} else if ($unsublist == 205){
		$eCN_IT_School_Leadership = 1;
			$hidesec2 = 1;
		}
		
			
		
		
		//use em to set list to autofill
		 if(validate_email2
($unsubemail)){
			$urldatacheck = 1;	 
		 } else {
			$urldatacheck = 0;
		 }
		 
	} else {
		$urldatacheck = 0;
		echo '<!-- fail em check -->';	
	}
	
}
if(validate_email2($unsubemail)){
			$urldatacheck = 1;	 
		 } else {
			$urldatacheck = 0;
		 }


 ?>

<?php get_header(); ?>
<div class="row">
	<div class="small-12 large-12 columns" role="main">	
			<h1 class="section-title"><span><?php the_title(); ?></span></h1>
	</div>
</div>
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<div class="row">
	<div class="small-12 large-12 columns" role="main">	
        <?php the_content(); ?>
<?php if ($emailtounsubcheck == 1) { ?>
			<p> Please allow 72 hours for your email to be removed from all our email lists. </p>
			<p>We do not wish for you to receive emails that you do not want to receive. You may contact customer service by email at <a href="mailto:custserv@eSchoolnews.com">custserv@eSchoolnews.com</a> or you may call customer service at 1-800-394-0115 x199.</p>
	</div>
</div>
<?php } else { ?>

<form name="sub1" id="sub1" action="?<?php echo generateRandomString(); ?>" method="post">
                    <div style="width:90%; padding:20px; margin:10px; float:left; display:block;">
                     
                     
                     <?php if($urldatacheck == 1){ ?>
                       <h2 style="margin:10px;"> Please confirm the email address that you wish to unsubscribe from our lists.</h2>
                    <p style="margin:10px;"><label style="font-weight:bold;" for="emailtounsub">Email: </label><input name="emailtounsub" maxlength="250" size="50" type="text" <?php if($urldatacheck == 1){echo 'value="'.$unsubemail.'"';}?> >
                    </p>
                     
                     <?php } else { ?>
                     
                        <h2 style="margin:10px;"> Please enter the email address that you wish to unsubscribe from our lists.</h2>
                    <p style="margin:10px;"><label style="font-weight:bold;" for="emailtounsub">Email: </label><input name="emailtounsub" maxlength="250" size="50" type="text" value="" /> 
                        </p>
                        
                     <?php } ?>                        

<div style="width:600px;">
	                   
<?php if($eschool_news_this_week == 1){ ?>    	                
                        <div><input name="eschool_news_this_week" value="eschool_news_this_week" type="checkbox" checked="checked"> <label style="font-weight:bold;" for="eschool_news_this_week">Innovation Weekly</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Get the week's top education technology news, learn about the latest grants and find out how schools are solving technology problems to improve learning.<br /><em>Weekly on Monday</em></div>
                    	</div> 
<?php } ?>
<?php if($eschool_news_today == 1){ ?>
	                    <div><input name="eschool_news_today" value="eschool_news_today" type="checkbox" checked="checked"> <label style="font-weight:bold;" for="eschool_news_this_week">eSchool News Today</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Daily breaking news headlines</div>
                    
                    	</div>                        
<?php } ?>
<?php if($eschool_news_tools_for_schools == 1){ ?>
	                    <div><input name="eschool_news_tools_for_schools" value="eschool_news_tools_for_schools" type="checkbox" checked="checked"> <label style="font-weight:bold;" for="eschool_news_tools_for_schools">eSchool News Tools for Schools</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Find out the latest technology tips, tools and the innovative best practices schools are using everyday to improve learning.<br /><em>Weekly on Wednesday</em></div>
                    	</div>
<?php } ?>
<?php if($ed_resource_alert == 1){ ?>                                                
	                    <div><input name="ed_resource_alert" value="ed_resource_alert" type="checkbox" checked="checked" > <label style="font-weight:bold;" for="ed_resource_alert">Ed Resource Alert</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Get email alerts notifying you of the latest resources available on eSchool News including Special Reports, Webinars, Resource Centers, Whitepapers and more.<br /><em>Schedule varies</em></div>
                    	</div>
<?php } ?>
<?php if($Digital_Leap == 1){ ?>                                                
	                    <div><input name="Digital_Leap" value="Digital_Leap" type="checkbox" checked="checked" > <label style="font-weight:bold;" for="Digital_Leap">Digital Leap</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">A Newsletter from AASA, CoSN, and NSBA, powered by eSchool News<br /><em>Monthly</em></div>
                    	</div>
<?php } ?>



<?php if($special_offers_from_eschool_news == 1){ ?>                                                
	                    <div><input name="special_offers_from_eschool_news" value="special_offers_from_eschool_news" type="checkbox" checked="checked"> <label style="font-weight:bold;" for="special_offers_from_eschool_news">Special Offers from eSchool News</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Get valuable offers and discounts on publications, conferences and professional development breakthroughs<br /><em>Schedule varies</em></div>
                    	</div>                        
<?php } ?>
<?php if($special_offers_from_school_technology_vendors == 1){ ?>                                                
	                    <div><input name="special_offers_from_school_technology_vendors" value="special_offers_from_school_technology_vendors" type="checkbox" checked="checked"> <label style="font-weight:bold;" for="special_offers_from_school_technology_vendors">Special Offers from School Technology Vendors</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Get valuable offers from eSchool News technology vendors <br /><em>Schedule varies</em></div>
       	    </div> 

 <?php } ?>
<?php if($eclassroom_news == 1){ ?>                     
                        
                        <div><input name="eclassroom_news" value="eclassroom_news" type="checkbox" checked="checked"> <label style="font-weight:bold;" for="eclassroom_news">eClassroom News</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Technology news and resources for teachers.<br /><em>Weekly on Friday</em></div>
                    	</div>                        
<?php } ?>
<?php if($ecampus_news_this_week == 1){ ?>                                                
	                    <div><input name="ecampus_news_this_week" value="ecampus_news_this_week" type="checkbox" checked="checked"> <label style="font-weight:bold;" for="ecampus_news_this_week">Reinventing Higher Education</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Get the week's top education technology news, learn about the latest grants and find out how schools are solving technology problems to improve learning.<br /><em>Weekly on Monday</em></div>
                    	</div>                        
<?php } ?>
<?php if($ecampus_news_today == 1){ ?>                                                
	                    <div><input name="ecampus_news_today" value="ecampus_news_today" type="checkbox" checked="checked"> <label style="font-weight:bold;" for="ecampus_news_this_week">eCampus News Today</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Daily breaking news headlines</div>
                    
                    	</div> 
<?php } ?>
<?php if($MOOC_Update == 1){ ?>
                        
                        <div><input name="MOOC_Update" value="MOOC_Update" type="checkbox" checked="checked"> <label style="font-weight:bold;" for="MOOC_Update">eCampus News MOOC Update</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;"><em>Weekly on Friday</em></div>
                    	</div>                        
                                               
<?php } ?>
<?php if($special_offers_from_ecampus_news_online == 1){ ?>                                                
	                    <div><input name="special_offers_from_ecampus_news_online" value="special_offers_from_ecampus_news_online" type="checkbox" checked="checked"> <label style="font-weight:bold;" for="special_offers_from_ecampus_news_online">Special Offers from eCampus News</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Get valuable offers and discounts on publications, conferences and professional development breakthroughs<br /><em>Schedule varies</em></div>
                    	</div>                        
<?php } ?>
<?php if($special_offers_from_campus_technology_vendors == 1){ ?>                                                
	                    <div><input name="special_offers_from_campus_technology_vendors" value="special_offers_from_campus_technology_vendors" type="checkbox" checked="checked"> <label style="font-weight:bold;" for="special_offers_from_campus_technology_vendors">Special Offers from Campus Technology Vendors</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Get valuable offers from eSchool News technology vendors <br /><em>Schedule varies</em></div>
                    	</div>                        
<?php } ?>
<?php if($eSN_IT_School_Leadership == 1){ ?>                                                
	                    <div><input name="eSN_IT_School_Leadership" value="eSN_IT_School_Leadership" type="checkbox" checked="checked"> <label style="font-weight:bold;" for="eSN_IT_School_Leadership">eSchool News IT School Leadership</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">IT News of the week<br /><em>Weekly on Wednesday</em></div>
                    	</div>                        
<?php } ?>
<?php if($eCN_IT_School_Leadership == 1){ ?>                                                
	                    <div><input name="eCN_IT_School_Leadership" value="eCN_IT_School_Leadership" type="checkbox" checked="checked"> <label style="font-weight:bold;" for="eCN_IT_School_Leadership">eCampus News IT Campus Leadership</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">IT News of the week<br /><em>Weekly on Wednesday</em></div>
                    	</div>                        
<?php } ?>

 </div>               
                           

                        
                    	
 <?php if(!$hidesec2 == 1){ ?>                        
                        <div style="float:left; width:45%; margin:10px;">
      
<?php if(!$eschool_news_this_week == 1){ ?>    	                
                        <div><input name="eschool_news_this_week" value="eschool_news_this_week" type="checkbox"> <label style="font-weight:bold;" for="eschool_news_this_week">Innovation Weekly</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Get the week's top education technology news, learn about the latest grants and find out how schools are solving technology problems to improve learning.<br /><em>Weekly on Monday</em></div>
                    	</div> 
<?php } ?>
<?php if(!$eschool_news_today == 1){ ?>
	                    <div><input name="eschool_news_today" value="eschool_news_today" type="checkbox"> <label style="font-weight:bold;" for="eschool_news_this_week">eSchool News Today</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Daily breaking news headlines</div>
                    
                    	</div>                        
<?php } ?>
<?php if(!$eschool_news_tools_for_schools == 1){ ?>
	                    <div><input name="eschool_news_tools_for_schools" value="eschool_news_tools_for_schools" type="checkbox"> <label style="font-weight:bold;" for="eschool_news_tools_for_schools">eSchool News Tools for Schools</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Find out the latest technology tips, tools and the innovative best practices schools are using everyday to improve learning.<br /><em>Weekly on Wednesday</em></div>
                    	</div>
<?php } ?>
<?php if(!$ed_resource_alert == 1){ ?>                                                
	                    <div><input name="ed_resource_alert" value="ed_resource_alert" type="checkbox" > <label style="font-weight:bold;" for="ed_resource_alert">Ed Resource Alert</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Get email alerts notifying you of the latest resources available on eSchool News including Special Reports, Webinars, Resource Centers, Whitepapers and more.<br /><em>Schedule varies</em></div>
                    	</div>
<?php } ?>
<?php if(!$Digital_Leap == 1){ ?>                                                
	                    <div><input name="Digital_Leap" value="Digital_Leap" type="checkbox" > <label style="font-weight:bold;" for="Digital_Leap">Digital Leap</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">A Newsletter from AASA, CoSN, and NSBA, powered by eSchool News<br /><em>Monthly</em></div>
                    	</div>
<?php } ?>
<?php if(!$eSN_IT_School_Leadership == 1){ ?>                                                
	                    <div><input name="eSN_IT_School_Leadership" value="eSN_IT_School_Leadership" type="checkbox" > <label style="font-weight:bold;" for="eSN_IT_School_Leadership">eSchool News IT School Leadership</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">IT News of the week<br /><em>Weekly on Wednesday</em></div>
                    	</div>                        
<?php } ?>
<?php if(!$special_offers_from_eschool_news == 1){ ?>                                                
	                    <div><input name="special_offers_from_eschool_news" value="special_offers_from_eschool_news" type="checkbox"> <label style="font-weight:bold;" for="special_offers_from_eschool_news">Special Offers from eSchool News</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Get valuable offers and discounts on publications, conferences and professional development breakthroughs<br /><em>Schedule varies</em></div>
                    	</div>                        
<?php } ?>
<?php if(!$special_offers_from_school_technology_vendors == 1){ ?>                                                
	                    <div><input name="special_offers_from_school_technology_vendors" value="special_offers_from_school_technology_vendors" type="checkbox"> <label style="font-weight:bold;" for="special_offers_from_school_technology_vendors">Special Offers from School Technology Vendors</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Get valuable offers from eSchool News technology vendors <br /><em>Schedule varies</em></div>
       	    </div> 

 <?php } ?>







                                         
                         
                        </div>
                        
                        
<div style="float:left; width:45%; margin:10px;">
	                   
                 
<?php if(!$ecampus_news_this_week == 1){ ?>                                                
	                    <div><input name="ecampus_news_this_week" value="ecampus_news_this_week" type="checkbox"> <label style="font-weight:bold;" for="ecampus_news_this_week">Reinventing Higher Education</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Get the week's top education technology news, learn about the latest grants and find out how schools are solving technology problems to improve learning.<br /><em>Weekly on Monday</em></div>
                    	</div>                        
<?php } ?>
<?php if(!$ecampus_news_today == 1){ ?>                                                
	                    <div><input name="ecampus_news_today" value="ecampus_news_today" type="checkbox"> <label style="font-weight:bold;" for="ecampus_news_this_week">eCampus News Today</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Daily breaking news headlines</div>
                    
                    	</div> 
<?php } ?>
<?php if(!$MOOC_Update == 1){ ?>
                        
                        <div><input name="MOOC_Update" value="MOOC_Update" type="checkbox"> <label style="font-weight:bold;" for="MOOC_Update">eCampus News MOOC Update</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;"><em>Weekly on Friday</em></div>
                    	</div>                        
                                               
<?php } ?>

<?php if(!$eSN_IT_School_Leadership == 1){ ?>                                                
	                    <div><input name="eCN_IT_School_Leadership" value="eCN_IT_School_Leadership" type="checkbox"> <label style="font-weight:bold;" for="eCN_IT_School_Leadership">eCampus News IT Campus Leadership</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">IT News of the week<br /><em>Weekly on Wednesday</em></div>
                    	</div>                        
<?php } ?>

<?php if(!$special_offers_from_ecampus_news_online == 1){ ?>                                                
	                    <div><input name="special_offers_from_ecampus_news_online" value="special_offers_from_ecampus_news_online" type="checkbox"> <label style="font-weight:bold;" for="special_offers_from_ecampus_news_online">Special Offers from eCampus News</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Get valuable offers and discounts on publications, conferences and professional development breakthroughs<br /><em>Schedule varies</em></div>
                    	</div>                        
<?php } ?>
<?php if(!$special_offers_from_campus_technology_vendors == 1){ ?>                                                
	                    <div><input name="special_offers_from_campus_technology_vendors" value="special_offers_from_campus_technology_vendors" type="checkbox"> <label style="font-weight:bold;" for="special_offers_from_campus_technology_vendors">Special Offers from Campus Technology Vendors</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Get valuable offers from eSchool News technology vendors <br /><em>Schedule varies</em></div>
                    	</div>                        
<?php } ?>
<?php if(!$eclassroom_news == 1){ ?>                       
                        
                        <div><input name="eclassroom_news" value="eclassroom_news" type="checkbox"> <label style="font-weight:bold;" for="eclassroom_news">eClassroom News</label>
        	            <div style="padding:0px 0px 10px 20px; font-size:9px;">Technology news and resources for teachers.<br /><em>Weekly on Friday</em></div>
                    	</div>                        
<?php } ?>	    	                
                        
                        
	                   

	                    <?php /* <div><input name="all_newsletters" value="all_newsletters" type="checkbox"> <label style="font-weight:bold;" for="eclassroom_news">All Newsletters</label>
                    	
                        </div>                          */ ?>
                        
                        
 <?php } ?>                       
                        
                      </div>                        
                        
                        
                        
                        
                      <button><input name="submit" value="Unsubscribe" type="submit"></button>
                     </div>

</form>
<?php }

		endwhile; else : endif;
		
get_footer();
?>