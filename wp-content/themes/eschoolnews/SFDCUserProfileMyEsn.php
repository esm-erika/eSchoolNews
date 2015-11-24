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

<?php global $theme_options, $suvi; ?>
<script type='text/javascript'>
function Cancel (Id){
	jQuery("input[name='sfAction']").val("Cancel");
	jQuery("input[name='srId']").val(Id);
	jQuery("#profileSubmit").click();

}
</script>

<div class="row">
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

		<div class="row">
			<div class="small-12  medium-12 columns" role="main">	

				<h4>User and Address Information</h4>
				<br/>

				<div class="row medium-collapse">
					<div class="small-6 columns">
						<label for="user_login">Username</label>
						<strong><?php echo $current_user->user_login;  ?></strong>
					</div>
				
				
					<div class="small-6 columns">
						<label for='personemail'><span style="color: red;">*</span>Email</label>

						<?php if ($sf_email_check == 0){ ?>
						<input  type='text' name='personemail' id='personemail' class='regular-text' <?php echo 'value="'. $current_user->user_email.'"'  ?>/>
						<?php } else { ?> 
						<input  type='text' name='personemail' id='personemail' class='regular-text' <?php echo 'value="'. htmlspecialchars($sf_profile->PersonEmail).'"'  ?>/>
						<?php } ?>

					</div>
				</div>

				<div class="row medium-collapse">
					<div class="small-6 columns">
						<label for='firstname'><span style="color: red;">*</span>First Name</label>
						<input  type='text' name='firstname' id='firstname' class='regular-text' <?php echo 'value="'. htmlspecialchars($sf_profile->FirstName).'"'  ?>/>
					</div>
				
					<div class="small-6 columns">
						<label for='lastname'><font color="red">*</font>Last Name</label>
						<input  type='text' name='lastname' id='lastname' class='regular-text' <?php echo 'value="'. htmlspecialchars($sf_profile->LastName).'"'  ?> />
					</div>
			
					<div class="small-6 columns">
						<label for='organization__c'><font color="red">*</font>Organization</label>
						<input  type='text' name='organization__c' id='organization__c' class='regular-text' <?php echo 'value="'. htmlspecialchars($sf_profile->Organization__c).'"'  ?>/>
					</div>
				
					<div class="small-6 columns">
						<label for='company_type__c'><font color="red">*</font>Organization Type</label>

						<select  name='company_type__c' id='company_type__c'>
							<?php
							$aOrgType = eSNAP_Organization_Type();
							for ($i=0; $i<count($aOrgType);$i++){
								$sel = ($sf_profile->Company_Type__c==$aOrgType[$i])?'selected="true"':'';
								echo '<option value="' . $aOrgType[$i] . '" ' . $sel . '>' . $aOrgType[$i] . '</option>';
							}
							?>				
						</select>

					</div>
				
					<div class="small-6 columns">
						<label for='persontitle'><font color="red">*</font>Title</label>

						<select  name='persontitle' id='persontitle'>
							<?php
							$aTitle = eSNAP_Title();
							for ($i=0; $i<count($aTitle);$i++){
								$sel = ($sf_profile->PersonTitle==$aTitle[$i])?'selected="true"':'';
								echo '<option value="' . $aTitle[$i] . '" ' . $sel . '>' . $aTitle[$i] . '</option>';
							}
							?>	
						</select>

					</div>
				
					<div class="small-6 columns">
						<label for='personmailingstreet'><font color="red">*</font>Address</label>
						<input  type='text' name='personmailingstreet' id='personmailingstreet' class='regular-text'  <?php echo 'value="'. htmlspecialchars($sf_profile->PersonMailingStreet).'"'  ?>/>
					</div>
				
					<div class="small-6 columns">
						<label for='Mailing_Address_2__c'>Address 2</label>
						<input  type='text' name='Mailing_Address_2__c' id='Mailing_Address_2__c' class='regular-text'  <?php echo 'value="'. htmlspecialchars($sf_profile->Mailing_Address_2__c).'"'  ?>/>
					</div>
				
					<div class="small-6 columns">

						<label for='personmailingcity'><font color="red">*</font>City</label>
						<input  type='text' name='personmailingcity' id='personmailingcity' class='regular-text'  <?php echo 'value="'. htmlspecialchars($sf_profile->PersonMailingCity).'"'  ?>/>
					</div>
			
					<div class="small-6 columns">
						<label for='personmailingstate'><font color="red">*</font>State or Province</label>

						<select  name='personmailingstate' id='personmailingstate'>
							<?php
							$aState = eSNAP_State();
							for ($i=0; $i<count($aState);$i++){
								$sel = ($sf_profile->PersonMailingState==$aState[$i])?'selected="true"':'';
								echo '<option value="' . $aState[$i] . '" ' . $sel . '>' . $aState[$i] . '</option>';
							}
							?>	
						</select>

					</div>
				
					<div class="small-6 columns">
						<label for='personmailingpostalcode'><font color="red">*</font>Zip or Postal Code</label>
						<input  type='text' name='personmailingpostalcode' id='personmailingpostalcode' class='regular-text' <?php echo 'value="'. htmlspecialchars($sf_profile->PersonMailingPostalCode).'"'  ?>/>
					</div>
				
					<div class="small-6 columns">
						<label for='personmailingcountry'><font color="red">*</font>Country</label>

						<select  name='personmailingcountry' id='personmailingcountry'>
							<?php
							$aCountry = eSNAP_Country();
							for ($i=0; $i<count($aCountry);$i++){
								$sel = ($sf_profile->PersonMailingCountry==$aCountry[$i])?'selected="true"':'';
								echo '<option value="' . $aCountry[$i] . '" ' . $sel . '>' . $aCountry[$i] . '</option>';
							}
							?>	
						</select>

					</div>
				
					<div class="small-6 columns">
						<label for='phone'><font color="red">*</font>Phone</label>
						<input  type='text' name='phone' id='phone' class='regular-text'  <?php echo 'value="'. htmlspecialchars($sf_profile->Phone).'"' ?>  />
					</div>
				
					<div class="small-6 columns">
						<label for='grade_level__c'><font color="red">*</font>What Grade Level do you teach?</label></th>

						<?php
						$aGrade = eSNAP_Grade();
						for ($i=0; $i<count($aGrade);$i++){
							$sel = (strpos($sf_profile->Grade_Level__c, $aGrade[$i])===false)?'':'checked="checked"';
							echo '<label><input type="checkbox" name="grade_level__c[]" value="' . $aGrade[$i] . '" ' . $sel . ' />&nbsp;'. $aGrade[$i] . '</label>';
						}
						?>	

					</div>
				
					<div class="small-6 columns">
						<label for='subject_taught__c'><font color="red">*</font>What Subject(s) do you teach?</label>

						<?php
						$aSubject = eSNAP_Subject();
						for ($i=0; $i<count($aSubject);$i++){
							$sel = (strpos($sf_profile->Subject_Taught__c, $aSubject[$i])===false)?'':'checked="checked"';
							echo '<label><input type="checkbox" name="subject_taught__c[]" value="' . $aSubject[$i] . '" ' . $sel . ' />&nbsp;'. $aSubject[$i] . '</label>';
						}
						?>	

					</div>


				
					<div class="small-12 columns">

						<p class="submit">
							<input type="submit" class="button radius" id="profileSubmit" value="Update Profile" name="submit" />
						</p>
					</div>
				</div>

			</div>

			<hr/>


			<div class="small-12 medium-12 columns" role="main">    

				<div class="row medium-collapse">
					<div class="small-12 columns">

						<h4>Password</h4>
					</br>

						<p>If you would like to change the password type a new one.</p>

						<input type="password" name="pass1" id="pass1" size="16" value="" autocomplete="off" /><span class="description"> Otherwise leave this blank.</span><br />
						<em>Required length 5 characters</em>
					</div>
				</div>

				<div class="row medium-collapse">
					<div class="small-12 columns">

					<input type="password" name="pass2" id="pass2" size="16" value="" autocomplete="off" /><span class="description"> <?php _e("Type your new password again."); ?></span>
				</div>
				</div>

				<div class="row medium-collapse">
					<div class="small-12 columns">

					<p class="description indicator-hint"><?php _e('Hint: The password should be at least seven characters long. To make it stronger, use upper and lower case letters, numbers and symbols like ! " ? $ % ^ &amp; ).'); ?></p>
				</div>
				</div>	
			
			<div class="row medium-collapse">
					<div class="small-12 columns">

			<p class="submit">
				<input type="submit" class="button radius" id="profileSubmit" value="Update Password" name="submit" />
			</p>

				</div>
			</div>

			<hr/>

		

					

			<h4>Please select the eMail newsletters you would like to receive:</h4>
			<br/>
				
			<div class="row">
			<div class="small-6 columns">

				
			
<h6>Innovation Weekly</h6>
					<p>The week's top education technology news, learn about the latest grants and find out how schools are solving technology problems to improve learning.  <br/><em>Weekly on Monday</em></p>
				
						<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->eSN_This_Week__c==$aSub[$i])?'checked="checked"':'';
							echo '<input type="radio" name="esn_this_week__c" value="' . $aSub[$i] . '" ' . $sel . ' /><label>'. $aSub[$i] . '</label>';
						}
						?>	
					</div>
				

				
					<div class="small-6 columns">
<h6>eSchool News Today</h6>
					<p>Daily breaking news headlines</p>
				
						<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->eSN_Today__c==$aSub[$i])?'checked="checked"':'';
							echo '<input type="radio" name="esn_today__c" value="' . $aSub[$i] . '" ' . $sel . ' /><label>'. $aSub[$i] . '</label>';
						}
						?>	
					
				</div>
			</div>
			
				
				<div class="row">
					<div class="small-6 columns">
				<h6>eSchool News Tools for Schools</h6>

						<p>Find out the latest technology tips, tools and the innovative best practices schools are using everyday to improve learning. <br/><em>Weekly on Wednesday</em></p>
					
						<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->eSN_Tools_For_Schools__c==$aSub[$i])?'checked="checked"':'';
							echo '<input type="radio" name="esn_tools_for_schools__c" value="' . $aSub[$i] . '" ' . $sel . ' /><label>'. $aSub[$i] . '</label>';
						}
						?>	
					</div>
				
			<div class="small-6 columns">
					
					
					<h6>Ed Resource Alert</h6>

						<p>Get email alerts notifying you of the latest resources available on eSchool News including Special Reports, Webinars, Resource Centers, Whitepapers and more. <br/><em>Schedule varies</em></p>
					
						<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->Ed_Resource_Alert__c==$aSub[$i])?'checked="checked"':'';
							echo '<input type="radio" name="Ed_Resource_Alert__c" value="' . $aSub[$i] . '" ' . $sel . ' /><label>'. $aSub[$i] . '</label>';
						}
						?>	
					</div>
				</div>

				

				<div class="row">
					<div class="small-6 columns">
										<h6>Special Offers from eSchool News</h6>

					<p>Get valuable offers and discounts on publications, conferences and professional development breakthroughs <br><em>Schedule varies</em></p>
			
						<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->eSN_Offers__c==$aSub[$i])?'checked="checked"':'';
							echo '<input type="radio" name="esn_offers__c" value="' . $aSub[$i] . '" ' . $sel . ' /><label>'. $aSub[$i] . '</label>';
						}
						?>	
					</div>
				
					<div class="small-6 columns">
										<h6>Special Offers from School Technology Vendors</h6>

					<p>Get valuable offers from eSchool News technology vendors <br><em>Schedule varies</em></p>
				
						<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->Partner_Offers__c==$aSub[$i])?'checked="checked"':'';
							echo '<input type="radio" name="partner_offers__c" value="' . $aSub[$i] . '" ' . $sel . ' /><label>'. $aSub[$i] . '</label>';
						}
						?>	
					</div>
				</div>

			<hr/>

			<h4>Newsletters from eSchool Media's Companion Websites:</h4>
			<br/>

			
				

				<div class="row">
				<div class="small-6 columns">	
				<h6>eClassroom News</h6>		
					<p>Technology news and resources for teachers.</p>
				
						<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->eClassroom_News__c==$aSub[$i])?'checked="checked"':'';
							echo '<input type="radio" name="eclassroom_news__c" value="' . $aSub[$i] . '" ' . $sel . ' /><label>'. $aSub[$i] . '</label>';
						}
						?>	
					</div>
			

				
				
					<div class="small-6 columns">
						<h6>eCampus News THIS WEEK</h6>
						<p>Get the week's top education technology news, learn about the latest grants and find out how schools are solving technology problems to improve learning. <br><em>Weekly on Monday</em></p>
					
						<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->eCN_This_Week__c==$aSub[$i])?'checked="checked"':'';
							echo '<input type="radio" name="ecn_this_week__c" value="' . $aSub[$i] . '" ' . $sel . ' /><label>'. $aSub[$i] . '</label>';
						}
						?>	
					</div>
				</div>

				
				<div class="row">
					<div class="small-6 columns">
						<h6>eCampus News TODAY</h6>

						<p>Daily breaking news headlines</p>
					
						<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->eCN_Today__c==$aSub[$i])?'checked="checked"':'';
							echo '<input type="radio" name="ecn_today__c" value="' . $aSub[$i] . '" ' . $sel . ' /><label>'. $aSub[$i] . '</label>';
						}
						?>	
					</div>
				
					<div class="small-6 columns">
						<h6>Special Offers from eCampus News Online</h6>

						<p>Get valuable offers and discounts on publications, conferences and professional development breakthroughs <br/><em>Schedule varies</em></p>
					
						<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->eCN_Offers__c==$aSub[$i])?'checked="checked"':'';
							echo '<input type="radio" name="ecn_offers__c" value="' . $aSub[$i] . '" ' . $sel . ' /><label>'. $aSub[$i] . '</label>';
						}
						?>	
					</div>
				</div>

				
				
				<div class="row">
					<div class="small-6 columns">
						<h6>Special Offers from Campus Technology Vendors</h6>

						<p>Get valuable offers from higher-ed technology vendors <br/><em>Schedule varies</em></p>
					
						<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($sf_profile->eCN_Partners__c==$aSub[$i])?'checked="checked"':'';
							echo '<input type="radio" name="ecn_partners__c" value="' . $aSub[$i] . '" ' . $sel . ' /><label>'. $aSub[$i] . '</label>';
						}
						?>	
					</div>
				</div>

			

        
<input type="hidden" name="sfAction" value="update" />
<input type="hidden" name="srId" value="" />
<input type="hidden" name="user_id" id="user_id" <?php echo 'value="'. htmlspecialchars($sf_profile->Id).'"' ?> />

</form>

</div>
</div>

</div>
</div>

<p>&nbsp;</p>
<?php 
break;
}


/*

Not logged in below

 */		
?>

</div>
</div>

<?php
if ( !is_user_logged_in() ){ ?>

<div class="row">
	<div class="small-12  medium-12 columns" role="main">
		<h4>You must login to access this page.</h4>
		<br/>	
		<?php wp_login_form(); ?>						
	</div></div>
	<?php	
} 

get_footer(); ?>
