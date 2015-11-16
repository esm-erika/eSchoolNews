<?php
 /* 
Template Name: SFDCUserProfileMyESN
*/ 
?>
<?php

require("SFDCProfileFunctions.php");
/*  Check if the user is logged in  */

if ( is_user_logged_in() ){
		
		//set user 
		$current_user = wp_get_current_user();
		$wp_id = $current_user->ID;
		
		
// if not a submitted form	
	if (!array_key_exists('sfAction', $_POST)) {

		$status="profile";
		$wp_profile = get_user_meta($wp_id,null, false);
		$sfid = $wp_profile['sfid'][0];

		$sf_data = eSNProfile($sfid);
		$sf_profile = $sf_data['profile'];
		
	} else {

//submitted post

	$sf_profile = eSNFormatProfileFromPost();

//Check if email is in use.
	$sf_profile_PersonEmail = $sf_profile->PersonEmail;
	if ( email_exists($sf_profile_PersonEmail) ){
		 if (email_exists($sf_profile_PersonEmail) == $wp_id){
			$sf_email_check = 1; 
		 } else {
			$sf_email_check = 0;		 
		 };
	 } else { 
	 	$sf_email_check = 1;
	}
//end check of email

//check form
$sf_req_fields = 0;
if (empty($_POST["personemail"])){$sf_req_fields = 1;}	
if (empty($_POST["firstname"])){$sf_req_fields = 1;}	
if (empty($_POST["lastname"])){$sf_req_fields = 1;}	
if (empty($_POST["organization__c"])){$sf_req_fields = 1;}	
if (empty($_POST["company_type__c"]) or $_POST["company_type__c"] == ""){$sf_req_fields = 1;}	
if (empty($_POST["persontitle"]) or $_POST["persontitle"] == ""){$sf_req_fields = 1;}
if (empty($_POST["personmailingstreet"])){$sf_req_fields = 1;}	
if (empty($_POST["personmailingcity"])){$sf_req_fields = 1;}	
if (empty($_POST["personmailingstate"]) or $_POST["personmailingstate"] == ""){$sf_req_fields = 1;}		
if (empty($_POST["personmailingpostalcode"])){$sf_req_fields = 1;}	
if (empty($_POST["personmailingcountry"]) or $_POST["personmailingcountry"] == ""){$sf_req_fields = 1;}	
if (empty($_POST["phone"])){$sf_req_fields = 1;}	
if (empty($_POST["grade_level__c"])){$sf_req_fields = 1;}
if (empty($_POST["subject_taught__c"])){$sf_req_fields = 1;}


	if (empty($_POST["pass1"])){
		$sf_password_change = 0;
	} else {
		if( $_POST["pass1"] == $_POST["pass2"] ){
			 if (strlen($_POST["pass1"]) > 4){  
				$sf_password_change = 1; // password ok
			 } else {
				$sf_password_change = 3; // password to short
			 }
		} else { 
			$sf_password_change = 2; //password not match
			if(strlen($_POST["pass1"]) < 5){$sf_password_length = 3;} // password to short
		}
	}

  	if ( $sf_password_change < 2 &&	$sf_email_check == 1 && $sf_req_fields == 0 )	{

		update_user_meta($wp_id, 'first_name', $sf_profile->FirstName);
		update_user_meta($wp_id, 'last_name', $sf_profile->LastName);			
		
		if($sf_password_change == 1 && strlen($_POST["pass1"]) > 4 && $_POST["pass1"] == $_POST["pass2"] ){
		
			$creds = array();
			$creds['user_login'] = $current_user->user_login;
			$creds['user_password'] = $_POST["pass1"];
			$creds['remember'] = true;
					
			wp_set_password( $_POST["pass1"] , $wp_id );
	
			$user = wp_signon( $creds, false );
			if ( is_wp_error($user) ) {$message = $user->get_error_message();}
		
		
		}

			switch ($_POST['sfAction']){
				case "update":
					$message = eSNAPUpdate($sf_profile);
					break;
				case "Cancel":
					$message = eSNAPUpdate($sf_profile);
					$message += eSNSRCancel($sf_profile,  $_POST['srId']);
					break;
			}
			$status="confirm";
						
		} else {

			$message = '<p class="error">';

			if ($sf_password_change == 2){$message = $message . '<strong>ERROR</strong>: Passwords enterred do not match<br />';} //password not match			
			if ($sf_password_change == 3 or $sf_password_length ==3){$message = $message . '<strong>ERROR</strong>: Passwords enterred must be at least five characters long.<br />';} // password to short
			if ($sf_password_change == 1){$message = $message . '<strong>Warning</strong>: Password was not updated do to errors elsewhere in the form<br />';} //password not updated		
			if ( $sf_email_check == 0){$message = $message . '<strong>ERROR</strong>: The email you enterred is already in use on a eSchool Media site<br />';}
		if ($sf_req_fields == 1	){
		  if (!in_array ('PersonEmail', $sf_profile->fieldsToNull) && 
			!in_array ('FirstName', $sf_profile->fieldsToNull) && 
			!in_array ('LastName', $sf_profile->fieldsToNull) && 
			!in_array('Organization__c', $sf_profile->fieldsToNull) && 
			!in_array('Company_Type__c', $sf_profile->fieldsToNull) && 
			!in_array('PersonTitle', $sf_profile->fieldsToNull) && 
			!in_array('PersonMailingStreet', $sf_profile->fieldsToNull) && 
			!in_array('PersonMailingCity', $sf_profile->fieldsToNull) && 
			!in_array('PersonMailingState', $sf_profile->fieldsToNull) && 
			!in_array('PersonMailingPostalCode', $sf_profile->fieldsToNull) && 
			!in_array('PersonMailingCountry', $sf_profile->fieldsToNull) && 
			!in_array('phone', $sf_profile->fieldsToNull) && 
			!in_array('Grade_Level__c', $sf_profile->fieldsToNull) && 
			!in_array('Subject_Taught__c', $sf_profile->fieldsToNull)){ 
			// skip the field error message 
			} else {
			$message = $message . '<strong>ERROR</strong>: Please fill out all required fields. The following fields are missing:';
			}
			if (in_array ('PersonEmail', $sf_profile->fieldsToNull)){$message = $message . '<br />Email '; }
			if (in_array ('FirstName', $sf_profile->fieldsToNull)){$message = $message . '<br />First Name '; }
			if (in_array ('LastName', $sf_profile->fieldsToNull)){$message = $message . '<br />Last Name '; }
			if (in_array ('Organization__c', $sf_profile->fieldsToNull)){$message = $message . '<br />Organization '; }
			if (in_array ('Company_Type__c', $sf_profile->fieldsToNull)){$message = $message . '<br />Organization Type '; }
			if (in_array ('PersonTitle', $sf_profile->fieldsToNull)){$message = $message . '<br />Title '; }
			if (in_array ('PersonMailingStreet', $sf_profile->fieldsToNull)){$message = $message . '<br />Address '; }
			if (in_array ('PersonMailingCity', $sf_profile->fieldsToNull)){$message = $message . '<br />City '; }
			if (in_array ('PersonMailingState', $sf_profile->fieldsToNull)){$message = $message . '<br />State or Province '; }
			if (in_array ('PersonMailingPostalCode', $sf_profile->fieldsToNull)){$message = $message . '<br />Zip or Postal Code '; }
			if (in_array ('PersonMailingCountry', $sf_profile->fieldsToNull)){$message = $message . '<br />Country '; }
			if (in_array ('phone', $sf_profile->fieldsToNull)){$message = $message . '<br />Phone '; }
			if (in_array ('Grade_Level__c', $sf_profile->fieldsToNull)){$message = $message . '<br />What Grade Level do you teach? <em>If you are not a teacher please select "Not a teacher"</em>'; } 
			if (in_array ('Subject_Taught__c', $sf_profile->fieldsToNull)){$message = $message . '<br />What Subject(s) do you teach? <em>If you are not a teacher please select "Not a teacher"</em>'; }

		  }
		}

	}
			$message = $message . '</p>';
			$status = 'profile';

}
?>
<?php get_header(); ?>
<style type="text/css">
	select {border:solid 1px #ccc;}
	table.form-container td, table.form-container th {
		vertical-align:top;
		padding-top:5px;
		padding-right:10px;
	}

</style>
<?php global $theme_options, $suvi; ?>
<script type='text/javascript'>
	function Cancel (Id){
		jQuery("input[name='sfAction']").val("Cancel");
		jQuery("input[name='srId']").val(Id);
		jQuery("#profileSubmit").click();
		
	}
</script>

<div class="row top">
	<div class="small-12 large-12 columns" role="main">	

<h1 class="section-title"><span>Your User Profile</span></h1>

<?php /* <div style="border:#ccc solid 1px;">
<img src="http://www.eschoolnews.com/wp-content/themes/advanced-newspaper/images/MyeSchoolNewsNew.gif" alt="My eSchool News - New! Create your own custom news site" height="32" width="980">
<br />
<div style="margin:10px 20px 20px 20px;">
    My eSchool News provides you the latest news by the categories you select. <br />
    <a href="http://www.eschoolnews.com/profile/preferences/" target="_blank" style="font-size:14px; font-weight:bold;">Click here to select your news by category</a>
</div>
</div> */ ?>

<form name="eSNSFDC" id="eSNSFDC" action="" method="post">

           
		<?php 
			switch($status){
	
				case 'confirm':
					//echo '<h2 style="padding:20px 50px">Profile update complete</h2><h3 style="padding:20px 50px"><a href="'.$_SERVER["REQUEST_URI"].'?'.$wp_id.time().'">Click to return to your profile.</a></h3><p><br /><br /><br /><br /></p>';
				
					// break;
	
				case 'profile':
					if ($message!=""){
						echo $message;
					}
		?>
	
<div class="row top">
	<div class="small-12  medium-6 large-6 columns" role="main">	
    		
<table class="form-container">
	<tr>
		<td>
<h4>User and Address Information</h4>
		
	<table class="form-table">
		<tr>
			<th><label for="user_login">Username</label></th>
			<td><strong><?php echo $current_user->user_login;  ?></strong></td>
		</tr>
			<tr>
				<th><label for='personemail'><font color="red">*</font>Email</label></th>
				<td>
				<?php if ($sf_email_check == 0){ ?>
				<input  type='text' name='personemail' id='personemail' class='regular-text' <?php echo 'value="'. $current_user->user_email.'"'  ?>/>
				 <?php } else { ?> 
				<input  type='text' name='personemail' id='personemail' class='regular-text' <?php echo 'value="'. htmlspecialchars($sf_profile->PersonEmail).'"'  ?>/>
				<?php } ?>
				</td>
			</tr>
			<tr>
				<th><label for='firstname'><font color="red">*</font>First Name</label></th>
				<td><input  type='text' name='firstname' id='firstname' class='regular-text' <?php echo 'value="'. htmlspecialchars($sf_profile->FirstName).'"'  ?>/></td>
			</tr>
			<tr>
				<th><label for='lastname'><font color="red">*</font>Last Name</label></th>
				<td><input  type='text' name='lastname' id='lastname' class='regular-text' <?php echo 'value="'. htmlspecialchars($sf_profile->LastName).'"'  ?> /></td>
			</tr>
			<tr>
				<th><label for='organization__c'><font color="red">*</font>Organization</label></th>
				<td><input  type='text' name='organization__c' id='organization__c' class='regular-text' <?php echo 'value="'. htmlspecialchars($sf_profile->Organization__c).'"'  ?>/></td>
			</tr>
			<tr>
				<th><label for='company_type__c'><font color="red">*</font>Organization Type</label></th>
				<td>
					<select  name='company_type__c' id='company_type__c'>
					<?php
						$aOrgType = eSNAP_Organization_Type();
						for ($i=0; $i<count($aOrgType);$i++){
							$sel = ($sf_profile->Company_Type__c==$aOrgType[$i])?'selected="true"':'';
							echo '<option value="' . $aOrgType[$i] . '" ' . $sel . '>' . $aOrgType[$i] . '</option>';
						}
					?>				
					</select>
				</td>
			</tr>
			<tr>
				<th><label for='persontitle'><font color="red">*</font>Title</label></th>
				<td>
					<select  name='persontitle' id='persontitle'>
					<?php
						$aTitle = eSNAP_Title();
						for ($i=0; $i<count($aTitle);$i++){
							$sel = ($sf_profile->PersonTitle==$aTitle[$i])?'selected="true"':'';
							echo '<option value="' . $aTitle[$i] . '" ' . $sel . '>' . $aTitle[$i] . '</option>';
						}
					?>	
					</select>
				</td>
			</tr>
			<tr>
				<th><label for='personmailingstreet'><font color="red">*</font>Address</label></th>
				<td><input  type='text' name='personmailingstreet' id='personmailingstreet' class='regular-text'  <?php echo 'value="'. htmlspecialchars($sf_profile->PersonMailingStreet).'"'  ?>/></td>
			</tr>
			<tr>
				<th><label for='Mailing_Address_2__c'>Address 2</label></th>
				<td><input  type='text' name='Mailing_Address_2__c' id='Mailing_Address_2__c' class='regular-text'  <?php echo 'value="'. htmlspecialchars($sf_profile->Mailing_Address_2__c).'"'  ?>/></td>
			</tr>
			<tr>
				<th><label for='personmailingcity'><font color="red">*</font>City</label></th>
				<td><input  type='text' name='personmailingcity' id='personmailingcity' class='regular-text'  <?php echo 'value="'. htmlspecialchars($sf_profile->PersonMailingCity).'"'  ?>/></td>
			</tr>
			<tr>
				<th><label for='personmailingstate'><font color="red">*</font>State or Province</label></th>
				<td>
					<select  name='personmailingstate' id='personmailingstate'>
					<?php
						$aState = eSNAP_State();
						for ($i=0; $i<count($aState);$i++){
							$sel = ($sf_profile->PersonMailingState==$aState[$i])?'selected="true"':'';
							echo '<option value="' . $aState[$i] . '" ' . $sel . '>' . $aState[$i] . '</option>';
						}
					?>	
					</select>
				</td>
			</tr>
			<tr>
				<th><label for='personmailingpostalcode'><font color="red">*</font>Zip or Postal Code</label></th>
				<td><input  type='text' name='personmailingpostalcode' id='personmailingpostalcode' class='regular-text' <?php echo 'value="'. htmlspecialchars($sf_profile->PersonMailingPostalCode).'"'  ?>/></td>
			</tr>
			<tr>
					<th><label for='personmailingcountry'><font color="red">*</font>Country</label></th>
					<td>
						<select  name='personmailingcountry' id='personmailingcountry'>
					<?php
						$aCountry = eSNAP_Country();
						for ($i=0; $i<count($aCountry);$i++){
							$sel = ($sf_profile->PersonMailingCountry==$aCountry[$i])?'selected="true"':'';
							echo '<option value="' . $aCountry[$i] . '" ' . $sel . '>' . $aCountry[$i] . '</option>';
						}
					?>	
					</select>
							
					</td>
				</tr>
			<tr>
				<th><label for='phone'><font color="red">*</font>Phone</label></th>
				<td><input  type='text' name='phone' id='phone' class='regular-text'  <?php echo 'value="'. htmlspecialchars($sf_profile->Phone).'"' ?>  /></td>
			</tr>
			<tr>
				<th><label for='grade_level__c'><font color="red">*</font>What Grade Level do you teach?</label></th>
				<td>
					<?php
						$aGrade = eSNAP_Grade();
						for ($i=0; $i<count($aGrade);$i++){
							$sel = (strpos($sf_profile->Grade_Level__c, $aGrade[$i])===false)?'':'checked="checked"';
							echo '<label><input type="checkbox" name="grade_level__c[]" value="' . $aGrade[$i] . '" ' . $sel . ' />&nbsp;'. $aGrade[$i] . '</label>';
						}
					?>	
				</td>
			</tr>
			<tr>
				<th><label for='subject_taught__c'><font color="red">*</font>What Subject(s) do you teach?</label></th>
				<td>
					<?php
						$aSubject = eSNAP_Subject();
						for ($i=0; $i<count($aSubject);$i++){
							$sel = (strpos($sf_profile->Subject_Taught__c, $aSubject[$i])===false)?'':'checked="checked"';
							echo '<label><input type="checkbox" name="subject_taught__c[]" value="' . $aSubject[$i] . '" ' . $sel . ' />&nbsp;'. $aSubject[$i] . '</label>';
						}
					?>	
				</td>
			</tr>

		</table>
		
			<p class="submit">
			    <input type="submit" class="button-primary" id="profileSubmit" value="Update Profile" name="submit" style="margin:10px 30px; padding:10px 20px; font-size:16px;" />
            </p>
		
	</td>
    </tr></table>
</div>    
<div class="small-12 medium-6 large-6 columns" role="main">    
<table class="form-container">
<tr>    
	<td>

<h4>Password</h4>

	<table style="padding:10px 0px 20px 30px;" class="form-table">
		<tr>
			<td id="password"><label for="pass1">If you would like to change the password type a new one.</label> <br />
			<input type="password" name="pass1" id="pass1" size="16" value="" autocomplete="off" /><span class="description"> Otherwise leave this blank.</span><br />
			<em>Required length 5 characters</em>
			</td>
		</tr>
		<tr>
			<td><input type="password" name="pass2" id="pass2" size="16" value="" autocomplete="off" /><span class="description"> <?php _e("Type your new password again."); ?></span></td>
		</tr>	
		<tr>
			<td><p class="description indicator-hint"><?php _e('Hint: The password should be at least seven characters long. To make it stronger, use upper and lower case letters, numbers and symbols like ! " ? $ % ^ &amp; ).'); ?></p></td>
		</tr>	
	</table>
		
	        <p class="submit">
			    <input type="submit" class="button-primary" id="profileSubmit" value="Update Profile" name="submit" style="margin:0px 30px; padding:5px;" />
            </p>

<h4>Please select the eMail newsletters you would like to receive:</h4>

		<table style="padding:10px 0px 20px 30px;" class="form-table">
			<tr>
				<th colspan="2" style="border-bottom:#ccc solid 1px;"><label for='esn_this_week__c'>Innovation Weekly</label></th>
			</tr>
			<tr>
				<td style="padding-bottom:5px;">The week's top education technology news, learn about the latest grants and find out how schools are solving technology problems to improve learning.  <em>Weekly on Monday</em></td>
				<td style="width:130px;">
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->eSN_This_Week__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="esn_this_week__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label>';
						}
					?>	
				</td>
			</tr>

			<tr>
				<th colspan="2" style="border-bottom:#ccc solid 1px;"><label for='esn_today__c'>eSchool News Today</label></th>
			</tr>			
			<tr>
				<td style="padding-bottom:5px;">Daily breaking news headlines</td>
				<td style="width:130px;">
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->eSN_Today__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="esn_today__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label>';
						}
					?>	
				</td>
			</tr>
			<tr>
				<th colspan="2" style="border-bottom:#ccc solid 1px;"><label for='esn_tools_for_schools__c'>eSchool News Tools for Schools</label></th>
			</tr>
			<tr>
				<td style="padding-bottom:5px;">Find out the latest technology tips, tools and the innovative best practices schools are using everyday to improve learning. <em>Weekly on Wednesday</em></td>
				<td style="width:130px;">
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->eSN_Tools_For_Schools__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="esn_tools_for_schools__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label>';
						}
					?>	
				</td>
			</tr>
			<tr>
				<th colspan="2" style="border-bottom:#ccc solid 1px;"><label for='Ed_Resource_Alert__c'>Ed Resource Alert</label></th>
			</tr>
			<tr>
				<td style="padding-bottom:5px;">Get email alerts notifying you of the latest resources available on eSchool News including Special Reports, Webinars, Resource Centers, Whitepapers and more. <em>Schedule varies</em></td>
				<td style="width:130px;">
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->Ed_Resource_Alert__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="Ed_Resource_Alert__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label>';
						}
					?>	
				</td>
			</tr>
			<tr>

				<th colspan="2" style="border-bottom:#ccc solid 1px;"><label for='esn_offers__c'>Special Offers from eSchool News</label></th>
			</tr>
			<tr>
				<th style="padding-bottom:5px;">Get valuable offers and discounts on publications, conferences and professional development breakthroughs <em>Schedule varies</em></th>
				<td style="width:130px">
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->eSN_Offers__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="esn_offers__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label>';
						}
					?>	
				</td>
			</tr>

			<tr>

				<th colspan="2" style="border-bottom:#ccc solid 1px;"><label for='partner_offers__c'>Special Offers from School Technology Vendors</label></th>
			</tr>
			<tr>
				<td style="padding-bottom:5px;">Get valuable offers from eSchool News technology vendors <em>Schedule varies</em></td>
				<td style="width:130px;">
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->Partner_Offers__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="partner_offers__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label>';
						}
					?>	
				</td>
			</tr>
		</table>

<span class="catname" style="margin-left:15px;">Newsletters from eSchool Media's Companion Websites:</span>
		
		<table style="padding:10px 0px 20px 30px;" class="form-table">
			<tr>
				<th colspan="2" style="border-bottom:#ccc solid 1px;"><label for='eclassroom_news__c'>eClassroom News</label></th>
			</tr>
			<tr>			
				<td style="padding-bottom:5px;">Technology news and resources for teachers.</td>
				<td style="width:130px;">
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->eClassroom_News__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="eclassroom_news__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label>';
						}
					?>	
				</td>
			</tr>
			<tr>
				<th colspan="2" style="border-bottom:#ccc solid 1px;"><label for='ecn_this_week__c'>eCampus News THIS WEEK</label></th>
			</tr>
			<tr>
				<td style="padding-bottom:5px;">Get the week's top education technology news, learn about the latest grants and find out how schools are solving technology problems to improve learning. <em>Weekly on Monday</em></td>
				<td style="width:130px;">
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->eCN_This_Week__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="ecn_this_week__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label>';
						}
					?>	
				</td>
			</tr>
            
			<tr>
				<th colspan="2" style="border-bottom:#ccc solid 1px;"><label for='ecn_today__c'>eCampus News TODAY</label></th>
			</tr>
			<tr>
				<td style="padding-bottom:5px;">Daily breaking news headlines</td>
				<td style="width:130px;">
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->eCN_Today__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="ecn_today__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label>';
						}
					?>	
				</td>
			</tr>
			<tr>
				<th colspan="2" style="border-bottom:#ccc solid 1px;"><label for='ecn_offers__c'>Special Offers from eCampus News Online</label></th>
			</tr>
			<tr>
				<td style="padding-bottom:5px;">Get valuable offers and discounts on publications, conferences and professional development breakthroughs <em>Schedule varies</em></td>
				<td style="width:130px;">
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->eCN_Offers__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="ecn_offers__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label>';
						}
					?>	
				</td>
			</tr>
			<tr>
				<th colspan="2" style="border-bottom:#ccc solid 1px;"><label for='ecn_partners__c'>Special Offers from Campus Technology Vendors</label></th>
			</tr>
			<tr>
				<td style="padding-bottom:5px;">Get valuable offers from higher-ed technology vendors <em>Schedule varies</em></td>
				<td style="width:130px;">
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->eCN_Partners__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="ecn_partners__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label>';
						}
					?>	
				</td>
			</tr>
		
	</table>
	
				</td>
			</tr>
            <tr>
            <td colspan="2">
       
            </td>
            </tr>
            
		</table>
	</div>
</div>	        
                <input type="hidden" name="sfAction" value="update" />
                <input type="hidden" name="srId" value="" />
                <input type="hidden" name="user_id" id="user_id" <?php echo 'value="'. htmlspecialchars($sf_profile->Id).'"' ?> />

			</form>
<p>&nbsp;</p>
		<?php 
				break;
			}


/*

Not logged in below

 */		
?>
<div class="row top">
	<div class="small-12  medium-6 large-6 columns" role="main">
<?php
if ( !is_user_logged_in() ){			 ?>
			<h4>You must login to access this page.</h4>	
<?php wp_login_form(); ?>						
</div></div>
<?php	
	} 
	
	get_footer(); ?>
