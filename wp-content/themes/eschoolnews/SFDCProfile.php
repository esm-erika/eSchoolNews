<?php
 /* 
Template Name: AssociateSFDCProfile
*/
if ( current_user_can('manage_options')) {

	require("SFDCProfileFunctions.php"); 
	$status = eSNAssociateProfileStatus();
	$profile = null;
	$sf_data = null;
	$message = "";
	$fieldsToNull = array();
	switch ($status){
		case 'Search':
		//DScott 2/2012 - commented out email validation because search can also be done on FEID
//			if (!is_email( $_POST['sfEmail'] )){
//				$status = 'BadEmail';
//			} else {
				//call search
				$sf_data = eSNAPSearch( $_POST['sfEmail']);
				$profile = $sf_data['profile'];
//			}
			break;
		case 'Submit':
			if (array_key_exists('user_id', $_POST)) {
				
				$profile = new stdclass();
				$profile->Id =$_POST['user_id'];
				if (array_key_exists('personemail', $_POST) && $_POST['personemail']!='') { $profile->PersonEmail =$_POST['personemail']; } else {array_push($fieldsToNull, 'PersonEmail');}
				if (array_key_exists('firstname', $_POST) && $_POST['firstname']!='') { $profile->FirstName =$_POST['firstname']; } else {array_push($fieldsToNull, 'FirstName');}
				if (array_key_exists('lastname', $_POST) && $_POST['lastname']!='') { $profile->LastName =$_POST['lastname']; } else {array_push($fieldsToNull, 'LastName');}
				if (array_key_exists('organization__c', $_POST) && $_POST['organization__c']!='') { $profile->Organization__c =$_POST['organization__c']; } else {array_push($fieldsToNull, 'Organization__c');}
				if (array_key_exists('company_type__c', $_POST) && $_POST['company_type__c']!='') { $profile->Company_Type__c =$_POST['company_type__c']; } else {array_push($fieldsToNull, 'Company_Type__c');}
				if (array_key_exists('persontitle', $_POST) && $_POST['persontitle']!='') { $profile->PersonTitle =$_POST['persontitle']; } else {array_push($fieldsToNull, 'PersonTitle');}
				if (array_key_exists('personmailingstreet', $_POST) && $_POST['personmailingstreet']!='') { $profile->PersonMailingStreet =$_POST['personmailingstreet']; } else {array_push($fieldsToNull, 'PersonMailingStreet');}
				if (array_key_exists('mailing_address_2__c', $_POST) && $_POST['mailing_address_2__c']!='') { $profile->Mailing_Address_2__c =$_POST['mailing_address_2__c']; } else {array_push($fieldsToNull, 'Mailing_Address_2__c');}
				if (array_key_exists('personmailingcity', $_POST) && $_POST['personmailingcity']!='') { $profile->PersonMailingCity =$_POST['personmailingcity']; } else {array_push($fieldsToNull, 'PersonMailingCity');}
				if (array_key_exists('personmailingstate', $_POST) && $_POST['personmailingstate']!='') { $profile->PersonMailingState =$_POST['personmailingstate']; } else {array_push($fieldsToNull, 'PersonMailingState');}
				if (array_key_exists('personmailingpostalcode', $_POST) && $_POST['personmailingpostalcode']!='') { $profile->PersonMailingPostalCode =$_POST['personmailingpostalcode']; } else {array_push($fieldsToNull, 'PersonMailingPostalCode');}
				if (array_key_exists('personmailingcountry', $_POST) && $_POST['personmailingcountry']!='') { $profile->PersonMailingCountry =$_POST['personmailingcountry']; } else {array_push($fieldsToNull, 'PersonMailingCountry');}
				if (array_key_exists('phone', $_POST) && $_POST['phone']!='') { $profile->Phone =$_POST['phone']; } else {array_push($fieldsToNull, 'phone');}
				if (array_key_exists('grade_level__c', $_POST)) { $profile->Grade_Level__c =implode(",",$_POST['grade_level__c']); } else {array_push($fieldsToNull, 'Grade_Level__c');}
				if (array_key_exists('subject_taught__c', $_POST)) { $profile->Subject_Taught__c =implode(",",$_POST['subject_taught__c']); } else {array_push($fieldsToNull, 'Subject_Taught__c');}
				$profile->eSN_This_Week__c =$_POST['esn_this_week__c'];
				$profile->eSN_Today__c =$_POST['esn_today__c'];
				$profile->eSN_Tools_For_Schools__c =$_POST['esn_tools_for_schools__c'];
				$profile->eSN_Offers__c =$_POST['esn_offers__c'];
				$profile->Partner_Offers__c =$_POST['partner_offers__c'];
				$profile->eClassroom_News__c =$_POST['eclassroom_news__c'];
				$profile->eCN_This_Week__c =$_POST['ecn_this_week__c'];
				$profile->eCN_Today__c =$_POST['ecn_today__c'];
				$profile->eCN_Offers__c =$_POST['ecn_offers__c'];
				$profile->eCN_Partners__c =$_POST['ecn_partners__c'];

				$profile->Email_as_ExternalID__c = $profile->PersonEmail;

				if (count($fieldsToNull)>0){
					$profile->fieldsToNull = $fieldsToNull;
				}

				if (!in_array ('PersonEmail', $fieldsToNull) && 
					!in_array ('FirstName', $fieldsToNull) && 
					!in_array ('LastName', $fieldsToNull) && 
					!in_array('Organization__c', $fieldsToNull) && 
					!in_array('Company_Type__c', $fieldsToNull) && 
					!in_array('PersonTitle', $fieldsToNull) && 
					!in_array('PersonMailingStreet', $fieldsToNull) && 
					!in_array('PersonMailingCity', $fieldsToNull) && 
					!in_array('PersonMailingState', $fieldsToNull) && 
					!in_array('PersonMailingPostalCode', $fieldsToNull) && 
					!in_array('PersonMailingCountry', $fieldsToNull) && 
					!in_array('phone', $fieldsToNull) && 
					!in_array('Grade_Level__c', $fieldsToNull) && 
					!in_array('Subject_Taught__c', $fieldsToNull))

				{
					switch ($_POST['sfAction']){
						case "update":
							//print_r($profile);
							$message = eSNAPUpdate($profile);
							break;
						case "Cancel":
							
							$message = eSNAPUpdate($profile);
							$message += eSNSRCancel($profile,  $_POST['srId']);
							break;
					}
				} else {
					$message = "<br/><h5><font color='red'>Please fill out all required fields</font></h5>";
					$status = 'Search';
				}

			}
			break;
	}
} else {
	die ('No Access');
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
<script type='text/javascript'>
	function Cancel (Id){
		jQuery("input[name='sfAction']").val("Cancel");
		jQuery("input[name='srId']").val(Id);
		jQuery("#profileSubmit").click();
		
	}
</script>

<?php global $theme_options, $suvi; ?>
		<br/>
		<H3>eSchool Associate SFDC Profile update</H3>

		<?php 
			switch($status){
				
				case 'BadEmail':
						echo 'Email address is invalid';
						//fall through to search form
				case 'Submit':
					if ($message!=""){
						echo $message;
					}
						//fall through to search form
				case 'New':
				
		?>
		
		<form name="eSNSFDC" action="" method="post">
			<input type="text" name="sfEmail" /><input type="submit" value="Search"/>
		</form>
		<br/>
		<br/>
		
		<?php 
				break;
				case 'Search':
				if ($message!=""){
					echo $message;
				}
					
		?>
		<form name="eSNSFDC" action="" method="post">
<table class="form-container">
	<tr>
		<td>
		<table class='form-table'>
			<tr>
				<th><label for='firstname'><font color="red">*</font>Email</label></th>
				<td style='vertical-align:bottom;'><input type='text' name='personemail' id='personemail' class='regular-text' <?php echo 'value="'. htmlspecialchars($profile->PersonEmail).'"'  ?>/></td>
			</tr>
			<tr>
				<th><label for='firstname'><font color="red">*</font>First Name</label></th>
				<td style='vertical-align:bottom;'><input type='text' name='firstname' id='firstname' class='regular-text' <?php echo 'value="'. htmlspecialchars($profile->FirstName).'"'  ?>/></td>
			</tr>
			<tr>
				<th><label for='lastname'><font color="red">*</font>Last Name</label></th>
				<td style='vertical-align:bottom;'><input type='text' name='lastname' id='lastname' class='regular-text' <?php echo 'value="'. htmlspecialchars($profile->LastName).'"'  ?> /></td>
			</tr>
			<tr>
				<th><label for='organization__c'><font color="red">*</font>Organization</label></th>
				<td style='vertical-align:bottom;'><input type='text' name='organization__c' id='organization__c' class='regular-text' <?php echo 'value="'. htmlspecialchars($profile->Organization__c).'"'  ?>/></td>
			</tr>
			<tr>
				<th><label for='company_type__c'><font color="red">*</font>Organization Type</label></th>
				<td style='vertical-align:bottom;'>
					<select name='company_type__c' id='company_type__c' style='width: 15em;'>
					<?php
						$aOrgType = eSNAP_Organization_Type();
						for ($i=0; $i<count($aOrgType);$i++){
							$sel = ($profile->Company_Type__c==$aOrgType[$i])?'selected="true"':'';
							echo '<option value="' . $aOrgType[$i] . '" ' . $sel . '>' . $aOrgType[$i] . '</option>';
						}
					?>				
					</select>
				</td>
			</tr>
			<tr>
				<th><label for='persontitle'><font color="red">*</font>Title</label></th>
				<td style='vertical-align:bottom;'>
					<select name='persontitle' id='persontitle' style='width: 15em;'>
					<?php
						$aTitle = eSNAP_Title();
						for ($i=0; $i<count($aTitle);$i++){
							$sel = ($profile->PersonTitle==$aTitle[$i])?'selected="true"':'';
							echo '<option value="' . $aTitle[$i] . '" ' . $sel . '>' . $aTitle[$i] . '</option>';
						}
					?>	
					</select>
				</td>
			</tr>
			<tr>
				<th><label for='personmailingstreet'><font color="red">*</font>Address</label></th>
				<td style='vertical-align:bottom;'><input type='text' name='personmailingstreet' id='personmailingstreet' class='regular-text'  <?php echo 'value="'. htmlspecialchars($profile->PersonMailingStreet).'"'  ?>/></td>
			</tr>
			<tr>
				<th><label for='mailing_address_2__c'>Address 2</label></th>
				<td style='vertical-align:bottom;'><input type='text' name='mailing_address_2__c' id='mailing_address_2__c' class='regular-text'  <?php echo 'value="'. htmlspecialchars($profile->Mailing_Address_2__c).'"'  ?>/></td>
			</tr>
			<tr>
				<th><label for='personmailingcity'><font color="red">*</font>City</label></th>
				<td style='vertical-align:bottom;'><input type='text' name='personmailingcity' id='personmailingcity' class='regular-text'  <?php echo 'value="'. htmlspecialchars($profile->PersonMailingCity).'"'  ?>/></td>
			</tr>
			<tr>
				<th><label for='personmailingstate'><font color="red">*</font>State or Province</label></th>
				<td style='vertical-align:bottom;'>
					<select name='personmailingstate' id='personmailingstate' style='width: 15em;'>
					<?php
						$aState = eSNAP_State();
						for ($i=0; $i<count($aState);$i++){
							$sel = ($profile->PersonMailingState==$aState[$i])?'selected="true"':'';
							echo '<option value="' . $aState[$i] . '" ' . $sel . '>' . $aState[$i] . '</option>';
						}
					?>	
					</select>
				</td>
			</tr>
			<tr>
				<th><label for='personmailingpostalcode'><font color="red">*</font>Zip or Postal Code</label></th>
				<td style='vertical-align:bottom;'><input type='text' name='personmailingpostalcode' id='personmailingpostalcode' class='regular-text' <?php echo 'value="'. htmlspecialchars($profile->PersonMailingPostalCode).'"'  ?>/></td>
			</tr>
			<tr>
					<th><label for='personmailingcountry'><font color="red">*</font>Country</label></th>
					<td style='vertical-align:bottom;'>
						<select name='personmailingcountry' id='personmailingcountry' style='width: 15em;'>
					<?php
						$aCountry = eSNAP_Country();
						for ($i=0; $i<count($aCountry);$i++){
							$sel = ($profile->PersonMailingCountry==$aCountry[$i])?'selected="true"':'';
							echo '<option value="' . $aCountry[$i] . '" ' . $sel . '>' . $aCountry[$i] . '</option>';
						}
					?>	
					</select>
							
					</td>
				</tr>
			<tr>
				<th><label for='phone'><font color="red">*</font>Phone</label></th>
				<td style='vertical-align:bottom;'><input type='text' name='phone' id='phone' class='regular-text'  <?php echo 'value="'. htmlspecialchars($profile->Phone).'"' ?>  /></td>
			</tr>
			<tr>
				<th><label for='grade_level__c'><font color="red">*</font>What Grade Level do you teach?</label></th>
				<td style='vertical-align:bottom;'>
					<?php
						$aGrade = eSNAP_Grade();
						for ($i=0; $i<count($aGrade);$i++){
							$sel = (strpos($profile->Grade_Level__c, $aGrade[$i])===false)?'':'checked="checked"';
							echo '<label><input type="checkbox" name="grade_level__c[]" value="' . $aGrade[$i] . '" ' . $sel . ' />&nbsp;'. $aGrade[$i] . '</label><br />';
						}
					?>	
				</td>
			</tr>
			<tr>
				<th><label for='subject_taught__c'><font color="red">*</font>What Subject(s) do you teach?</label></th>
				<td style='vertical-align:bottom;'>
					<?php
						$aSubject = eSNAP_Subject();
						for ($i=0; $i<count($aSubject);$i++){
							$sel = (strpos($profile->Subject_Taught__c, $aSubject[$i])===false)?'':'checked="checked"';
							echo '<label><input type="checkbox" name="subject_taught__c[]" value="' . $aSubject[$i] . '" ' . $sel . ' />&nbsp;'. $aSubject[$i] . '</label><br />';
						}
					?>	
				</td>
			</tr>
		</table>
	</td>
	<td>
		<table class="form-table">
			<tr>
				<td colspan="2">Please select the eMail newsletters you would like to receive:</td>
			</tr>
			<tr>
				<th><label for='esn_this_week__c'>Innovation Weekly</label></th>
				<td style='vertical-align:bottom;'>
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($profile->eSN_This_Week__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="esn_this_week__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label><br />';
						}
					?>	
				</td>
			</tr>

			<tr>
				<th><label for='esn_today__c'>eSchool News Today</label></th>
				<td style='vertical-align:bottom;'>
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($profile->eSN_Today__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="esn_today__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label><br />';
						}
					?>	
				</td>
			</tr>

			<tr>
				<th><label for='esn_tools_for_schools__c'>eSchool News Tools for Schools</label></th>
				<td style='vertical-align:bottom;'>
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($profile->eSN_Tools_For_Schools__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="esn_tools_for_schools__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label><br />';
						}
					?>	
				</td>
			</tr>

			<tr>
				<th><label for='esn_offers__c'>Special Offers from eSchool News</label></th>
				<td style='vertical-align:bottom;'>
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($profile->eSN_Offers__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="esn_offers__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label><br />';
						}
					?>	
				</td>
			</tr>

			<tr>
				<th><label for='partner_offers__c'>Special Offers from School Technology Vendors</label></th>
				<td style='vertical-align:bottom;'>
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($profile->Partner_Offers__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="partner_offers__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label><br />';
						}
					?>	
				</td>
			</tr>

			<tr>
				<td colspan="2">Newsletters available from eSchool Media Companion Websites:</td>
			</tr>
			<tr>
				<th><label for='eclassroom_news__c'>eClassroom News</label></th>
				<td style='vertical-align:bottom;'>
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($profile->eClassroom_News__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="eclassroom_news__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label><br />';
						}
					?>	
				</td>
			</tr>
			<tr>
				<th><label for='ecn_this_week__c'>eCampus News THIS WEEK</label></th>
				<td style='vertical-align:bottom;'>
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($profile->eCN_This_Week__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="ecn_this_week__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label><br />';
						}
					?>	
				</td>
			</tr>

			<tr>
				<th><label for='ecn_today__c'>eCampus News TODAY</label></th>
				<td style='vertical-align:bottom;'>
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($profile->eCN_Today__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="ecn_today__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label><br />';
						}
					?>	
				</td>
			</tr>
			<tr>
				<th><label for='ecn_offers__c'>Special Offers from eCampus News Online</label></th>
				<td style='vertical-align:bottom;'>
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($profile->eCN_Offers__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="ecn_offers__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label><br />';
						}
					?>	
				</td>
			</tr>
			<tr>
				<th><label for='ecn_partners__c'>Special Offers from Campus Technology Vendors</label></th>
				<td style='vertical-align:bottom;'>
					<?php
						$aSub = eSNAP_Subs();
						for ($i=0; $i<count($aSub);$i++){
							$sel = ($profile->eCN_Partners__c==$aSub[$i])?'checked="checked"':'';
							echo '<label><input type="radio" name="ecn_partners__c" value="' . $aSub[$i] . '" ' . $sel . ' />&nbsp;'. $aSub[$i] . '</label><br />';
						}
					?>	
				</td>
			</tr>

		</table>
	<br/>
	<?php
		if ($sf_data!=null){
	?>
		<h2>Subscriptions</h2>
			<table>
	<?php
			$regURL="http://eschoolnews.eschoolnetwork.com/?page_id=89276&sfid=".htmlspecialchars($profile->Id)."&promo=1&source=";
			foreach($sf_data['actions'] as &$subscription) {
				echo "<tr><td>".htmlspecialchars($subscription['name'])."</td><td>";
				
				switch ( $subscription['action'] ){
					case "Cancel":
						echo "Expires " .  $subscription['expiration'] ."<br/>";
						echo "<a href='javascript:Cancel(\"".$subscription['srid']."\")'>Cancel</a><br/>";	
						echo "<a href='".$regURL.htmlspecialchars($subscription['source'])."' target='_new' >Renew</a>";	
						break;
					case "Renew":
						echo "Expired " .  $subscription['expiration'] ."<br/>";
						echo "<a href='".$regURL.htmlspecialchars($subscription['source'])."' target='_new' >Renew</a>";	
						break;
					case "Subscribe":
						echo "<a href='".$regURL.htmlspecialchars($subscription['source'])."' target='_new'>Subscribe</a>";	
						break;
					default:
						echo $subscription['action'];	
						break;
				}
				echo "</td></tr>";
			} 
		}
	?>
	</table>

				</td>
			</tr>
		</table>

            <p class="submit">
                <input type="hidden" name="sfAction" value="update" />
                <input type="hidden" name="srId" value="" />
                <input type="hidden" name="user_id" id="user_id" <?php echo 'value="'. htmlspecialchars($profile->Id).'"' ?> />
                <input type="submit" class="button-primary" id="profileSubmit" value="Update Profile" name="submit" />
            </p>
			</form>
		<?php 
				break;
			}
		?>
	
		<div class="clear"></div>
	
	<div class="clear"></div>
	
	<?php get_footer(); ?>
