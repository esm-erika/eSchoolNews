<?php
/**
 * @package eSchool Media functions
 * @author Vince Carlson
 * @version 0.2
 */ 
/*
Plugin Name: eSchool Media Functions
Plugin URI: http://www.eschoolmedia.com/#
Description: This plugin adds functions to all pages of the site that are in wordpress.
Author: Vince Carlson
Version: 0.2
Author URI: http://www.eschoolmedia.com
*/

add_filter( 'index_rel_link', 'disable_stuff' );
add_filter( 'parent_post_rel_link', 'disable_stuff' );
add_filter( 'start_post_rel_link', 'disable_stuff' );
add_filter( 'previous_post_rel_link', 'disable_stuff' );
add_filter( 'next_post_rel_link', 'disable_stuff' );

function disable_stuff( $data ) {return false;}



function setesmpass_foot() {

//placeholder for footer actions

}
function setesm_access(){

echo "<!--- setesmpass_foot active --->";

}


function setesm_postdisplay($postid = 0,$ast = 0, $astc = 0, $useragent = '0'){
global $page;

$noreg=get_post_meta($postid, 'No Registration', $single = true);
if ($noreg != null) {
$bypassreg = 1;
}

// if (preg_match("/Googlebot|Yahoo|msnbot|bingbot/i", $useragent) > 0){ $bypassreg = 1;}


if (isset($_COOKIE['esmpass'])) { $bypassreg = 1; }


/* Check if the user is on page gt 1 and not logged in */
	global $page; 
	//wp ecn 3591 6336 4361
	//wp esn 7084 6274  
	//sr 139 127
	//webinar 163 166 167
	
	if (($bypassreg == 1) or (is_user_logged_in())) { 
		$showpagecontent = 1;
	} else if ( in_category(array(139,127)) and (!$bypassreg == 1) or in_category(array(139,127)) and (!is_user_logged_in())) { 
		$showpagecontent = 0;
	} else if ( in_category(array(163,166,167)) and ($page > 1 )) { 
		$showpagecontent = 0;
	} else if ($astused > 1){ 
		$showpagecontent = 0;
	} else {
		//let them in
		$showpagecontent = 1;
	}
 ?>


<div style="clear:both; padding-bottom:5px;"></div>
<?php 

if ( function_exists('wp_socializer') ) {

echo '<div class="wp-socializer-buttons" style="height:20px; margin-top:5px;">';
echo '<span class="wpsr-btn">' . wp_socializer(facebook, 'style=button_count&type=send') . '</span>';
$blog_id = get_current_blog_id();
if($blog_id == '2'){echo '<span class="wpsr-btn">' . wp_socializer(retweet, 'type=compact&username=eschoolnews') . '</span>'; }
elseif($blog_id == '3'){echo '<span class="wpsr-btn">' . wp_socializer(retweet, 'type=compact&username=ecampusnews') . '</span>'; }
elseif($blog_id == '4'){echo '<span class="wpsr-btn">' . wp_socializer(retweet, 'type=compact&username=eclassroomnews') . '</span>'; }
else{echo '<span class="wpsr-btn">' . wp_socializer(retweet, 'type=compact') . '</span>';}
echo '<span class="wpsr-btn">' . wp_socializer(plusone, 'type=medium') . '</span>';
  if(function_exists('wp_email')) {echo '<span class="wpsr-btn">'; email_link(); echo '</span>'; }
  if(function_exists('wp_print')) {echo '<span class="wpsr-btn">'; print_link(); echo '</span>'; }
echo '</div>';
}

?>
					<div id="post-<?php the_ID(); ?>" <?php post_class('entry');?>>
						<div class="entry_title">


<div style="float:left; width:475px;"> 
	<h2 style="color:#000 !important; font-size:24px;"><?php if ( in_category( array( 19,20,21 ) )) { echo 'Press Release: ';} ?><?php the_title(); ?></h2>

<?php $SubTitle=get_post_meta($postid, 'Sub Title', $single = true);
	if ($SubTitle != null) { echo '<h3>'.$SubTitle.'</h3>';}?>
<?php if (get_the_author_meta('user_level') > 3){if (function_exists('gkl_postavatar')) { echo '<style type="text/css">img.postavatar {height: 45px; width: auto;}</style>'; gkl_postavatar(postavatar);}} ?>

<?php $PageByLine=get_post_meta($postid, 'Byline', $single = true);
	                                         if ($PageByLine != null) {
		                                 echo '<span class="byline">'.$PageByLine.'<br/>' ;}
 else { echo '<span class="byline">'; }?>
<?php 
	if ( in_category(29)) { echo '<a href="'.get_category_link(29).'">'.'Read more news from Around the Web </a><br/>'.the_time('F jS, Y').'</span>';
	} elseif ( in_category(126)){ echo '<a href="'.get_category_link(126).'">'.'View more Sites of the Week </a><br/>'.the_time('F jS, Y').'</span>';
	} elseif ( in_category(19)){ echo '<a href="'.get_category_link(19).'">'.'View more Press Releases </a><br/>'.the_time('F jS, Y').'</span>';
	} elseif ( in_category(20)){ echo '<a href="'.get_category_link(20).'">'.'View more Partner Press Releases</a><br/>'.the_time('F jS, Y').'</span>';
	} elseif ( in_category(21)){ echo '<a href="'.get_category_link(21).'">'.'View more Press Releases from Technology Providers</a><br/>'.the_time('F jS, Y').'</span>';
	} else { 
							$AltAuthorName=get_post_meta($postid, 'Alt Author Read More Name', $single = true);
							$AltAuthorLink=get_post_meta($postid, 'Alt Author Read More Link', $single = true);			
							$AltDate=get_post_meta($postid, 'Alt Date', $single = true);						
							
							if ($AltAuthorName != null) { 
								if (($AltAuthorName == 'hide') or ($AltAuthorName == '0'))  { 
								 //delete the line
								} else {
									if ($AltAuthorLink != null) { 
										echo '<a href="'.$AuthorLink.'" title="'.$AltAuthorName.'" rel="author">'.$AltAuthorName.'</a><br />';
									} else { echo $AltAuthorName; echo '<br />'; } 
								} 
							} else { 
							 ?>Read more by <?php the_author_posts_link(); echo '<br />';} 
							 
	?>
    <?php 
	
	
	if ($AltDate != null) { 
		if (($AltDate == 'hide') or ($AltDate == '0'))  { 
		//delete the line
		} else {
			echo $AltDate;//display custom date
		} 
	} else {echo the_time('F jS, Y'); } 

	
	
	
	
	} ?>
</span>

</div>




<div style="clear:both"></div>
<?php if ( in_category( array( 10223 ) )) { echo '<div style="clear:both"></div><div style="display:block; float:right; font-size:9px; color:#333333; background-color:#FFFFFF;">(ADVERTISEMENT)</div>';} ?>

</div>




<!--start slider dependents-->
			<!--end slider dependents-->
	<?php if($showpagecontent == 1){ 	

						// Theme innerpage slider
						if (get_option('of_an_inslider') == 'Site Wide') {
							require_once (GABFIRE_INC_PATH . '/theme-gallery.php');
						} 
						elseif (get_option('of_an_inslider') == 'Tag-based' && ( has_tag(get_option('of_an_inslider_tag')) ) or ( term_exists( get_option('of_an_inslider_tag', 'gallery-tag', '' )) )) {
							require_once (GABFIRE_INC_PATH . '/theme-gallery.php');
						}
						elseif (get_option('of_an_inslider') == 'Disable') {
							// do nothing
						}
						
						// If there is a video, display it
						gab_media(array(
							'name' => 'gab-fea',
							'enable_video' => 'true',
							'video_id' => 'archive',
							'catch_image' => 'false',
							'enable_thumb' => 'false',
							'media_width' => '483',
							'media_height' => '300',
							'thumb_align' => 'aligncenter',
							'enable_default' => 'false'
						));
						


						// Display content
						the_content();


$ContactName=get_post_meta($postid, 'Contact Name', $single = true);
$ContactEmail=get_post_meta($postid, 'Contact Email', $single = true);
$ContactPhone=get_post_meta($postid, 'Contact Phone', $single = true);
$ContactURL=get_post_meta($postid, 'Contact URL', $single = true);

if ($ContactURL != null) {
if (!preg_match("#^http://www\.[a-z0-9-_.]+\.[a-z]{2,4}$#i",$ContactURL)) {
$ContactURL = 'http://'.$ContactURL;
}
}

$GrantOrg=get_post_meta($postid, 'Grant Org', $single = true);
if ($ContactName != null || $ContactEmail != null || $ContactPhone != null || $ContactURL != null || $GrantOrg != null) {
?>
<blockquote>
<strong>Contact Information</strong><hr />
<ul>
<?php
$Eligibility=get_post_meta($postid, 'Eligibility', $single = true);
$GrantDeadline=get_post_meta($postid, 'Grant Deadline', $single = true);
$GrantHeadline=get_post_meta($postid, 'Grant Headline', $single = true);
$GrantValue=get_post_meta($postid, 'Grant Value', $single = true);
if ($GrantOrg != null) {
echo '<li><strong>Grant Organization: </strong>'.$GrantOrg.'</li>';
}

if ($ContactName != null) {
echo '<li><strong>Contact Name: </strong>'.$ContactName.'</li>';
}
if ($ContactPhone != null) {
echo '<li><strong>Contact Phone: </strong>'.$ContactPhone.'</li>';
}
if ($ContactEmail != null) {
echo '<li><strong>Contact Email: </strong>'.$ContactEmail.'</li>';
}
if ($ContactURL != null) {
echo '<li><strong>Contact URL: </strong><a href="'.$ContactURL.'" target="_blank" alt="Grant Link">'.substr($ContactURL, 0, 30).'</a>...</li>';
}
if ($Eligibility != null) {
echo '<li><strong>Eligibility: </strong>'.$Eligibility.'</li>';
}

if ($GrantDeadline != null) {
$grantdatetime = date_create($GrantDeadline);
echo '<li><strong>Grant Deadline: </strong>'.$grantdatetime->format('l F jS, Y').'</li>';
}

if ($GrantValue != null) {
echo '<li><strong>Grant Value: </strong>'.$GrantValue.'</li>';
}

echo '</ul></blockquote>';
}

						
						// make sure any advanceded content gets cleared
						echo '<div class="clear"></div>';
						
						// Display pagination
						echo '<div align="left" style="border-top: 1px solid #ccc; width:100%; float:left; font-size:20px; font-weight:bold; line-height:30px;">';
						if ($astused > 1){
						enhanced_link_pages(array('blink'=>'', 'alink'=>'&nbsp;', 'before' => '', 'after' => '', 'next_or_number' => 'both', 'afterhref' =>'ast='.$astused.'&astc='.$astc)); 
						} else {
						enhanced_link_pages(array('blink'=>'', 'alink'=>'&nbsp;', 'before' => '', 'after' => '', 'next_or_number' => 'both')); 
						}
						echo '</div>';
?>		
<div style="clear:both"></div>				
   <?php 			
						
						
						// Post Widget
						gab_dynamic_sidebar('PostWidget');
					
						?>

						<?php } else {  ?>
						
<p><?php print string_limit_words(get_the_excerpt(), 350); ?>...</p>

<div style="border:#CCCCCC solid 1px; padding:10px;">
<form action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
<table style="width:100%;">
<tr><td colspan="2"><p><strong>Free registration required to continue reading this article.</strong></p></td></tr>
<tr><td style="width:45%; padding-right:10px; border-right:1px solid #666">

Register today and receive free access to all our news and resources and the ability to customize your news by topic with My eSchool News.<br /><br />
<a href="<?php echo get_option('home'); ?>/wp-login.php?action=register&redirect_to=?redirect_to=<?php echo urlencode(get_permalink()); ?>" style="text-decoration:underline;"><strong>Register now.</strong></a>
</td>
<td style="width:55%; padding-left:10px">
Already a member? Log in 

<div>Username: <input type="text" name="log" id="log" value="" /></div>
<div>Password:&nbsp <input name="pwd" id="pwd" type="password" value="" /></div>
<input type="submit" name="submit" value="Login" class="button">
<input name="rememberme" id="rememberme" type="hidden" checked="checked" value="forever">
<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
<br />
<a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword" target="_blank">Lost Password?</a>
	

</td></tr></table>
</form>	
</div>		
<?php	} //end showpagecontent check ?>
</div><!-- .entry -->

				

<?php
}

/* WP lead page */

function setesm_postdisplaywpl($postid = 0,$ast = 0, $astc = 0, $useragent = '0'){
global $page;

$noreg=get_post_meta($postid, 'No Registration', $single = true);
if ($noreg != null) {
$bypassreg = 1;
}

$gfform = get_post_meta($postid, 'usegravityform', $single = true);

if (preg_match("/Googlebot|Yahoo|msnbot|bingbot/i", $useragent) > 0){ $bypassreg = 1;}


if (isset($_COOKIE['esmpass'])) { $bypassreg = 1; }


/* Check if the user is on page gt 1 and not logged in */
	global $page; 
	if (($bypassreg == 1) or (is_user_logged_in())) { 
		$showpagecontent = 1;
	} else if ( in_category(array(139,127)) and (!$bypassreg == 1) or in_category(array(139,127)) and (!is_user_logged_in())) { 
		$showpagecontent = 0;
	} else if ( in_category(array(163,166,167)) and ($page > 1 )) { 
		$showpagecontent = 0;
	} else if ($astused > 1){ 
		$showpagecontent = 0;
	} else {
		//let them in
		$showpagecontent = 1;
	}
 ?>

<div style="clear:both"></div>
					<div id="post-<?php the_ID(); ?>" <?php post_class('entry');?>>
						<div class="entry_title">


<div style="float:left; width:825px;"> 
	<h2><?php if ( in_category( array( 19,20,21 ) )) { echo 'Press Release: ';} ?><?php the_title(); ?></h2>
</div>

<div style="clear:both"></div>



							






						<?php $SubTitle=get_post_meta($postid, 'Sub Title', $single = true);
	                                         if ($SubTitle != null) {
		                                 echo '<h3>'.$SubTitle.'</h3>';}?>
<?php if (function_exists('gkl_postavatar')) { echo '<style type="text/css">img.postavatar {height: 45px; width: auto;}</style>'; gkl_postavatar(postavatar);} ?>

<?php $PageByLine=get_post_meta($postid, 'Byline', $single = true);
	                                         if ($PageByLine != null) {
		                                 echo '<span class="byline">'.$PageByLine.'<br/>';}
 else { echo '<span class="byline">'; }?>

</span>

</div>




<!--start slider dependents-->
			<!--end slider dependents-->
	<?php if($showpagecontent == 1){ 	



if (is_user_logged_in()) {

// LOGGED IN USER 

$current_user = wp_get_current_user();
$wpuid = $current_user->ID;

$lenautofill['sfuid'] = get_user_meta($wpuid, 'sfid', true ); 
$lenautofill['PersonContactId'] = get_user_meta($wpuid, 'PersonContactId', true ); 
$lenautofill['publisher'] = "eSchool Media";
$lenautofill['asset'] = $post->ID;
$lenautofill['fname'] = $current_user->user_firstname;
$lenautofill['lname'] = $current_user->user_lastname;
$lenautofill['email'] = $current_user->user_email;	
$lenautofill['wplogin'] = $current_user->user_login ;

$useshortform = 1;
	
	
} else {

	// USER NOT LOGGED IN CHECK FOR ID ELSEWHERE
	$loggedin = 0;
	
	//CHECK AND VALIDATE COOKIE esmpass
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
} // end login check







						// Theme innerpage slider
						if (get_option('of_an_inslider') == 'Site Wide') {
							require_once (GABFIRE_INC_PATH . '/theme-gallery.php');
						} 
						elseif (get_option('of_an_inslider') == 'Tag-based' && ( has_tag(get_option('of_an_inslider_tag')) ) or ( term_exists( get_option('of_an_inslider_tag', 'gallery-tag', '' )) )) {
							require_once (GABFIRE_INC_PATH . '/theme-gallery.php');
						}
						elseif (get_option('of_an_inslider') == 'Disable') {
							// do nothing
						}
						
						// If there is a video, display it
						gab_media(array(
							'name' => 'gab-fea',
							'enable_video' => 'true',
							'video_id' => 'archive',
							'catch_image' => 'false',
							'enable_thumb' => 'false',
							'media_width' => '483',
							'media_height' => '300',
							'thumb_align' => 'aligncenter',
							'enable_default' => 'false'
						));
						


						// Display content
						the_content();
						gravity_form($gfform, false, false, false, $lenautofill);

						// make sure any advanceded content gets cleared
						echo '<div class="clear"></div>';
						
						
						
						// Post Widget
						gab_dynamic_sidebar('PostWidget');
					
						?>

						<?php } else {  ?>
						
<p><?php print string_limit_words(get_the_excerpt(), 35); ?>...</p>

<div style="border:#CCCCCC solid 1px; padding:10px;">
<form action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
<table style="width:100%;">
<tr><td colspan="2"><p><strong>Free registration required to continue reading this article.</strong></p></td></tr>
<tr><td style="width:45%; padding-right:10px; border-right:1px solid #666">

Register today and receive free access to all our news and resources and the ability to customize your news by topic with My eSchool News.<br /><br />
<a href="<?php echo get_option('home'); ?>/wp-login.php?action=register&redirect_to=?redirect_to=<?php echo urlencode(get_permalink()); ?>" style="text-decoration:underline;"><strong>Register now.</strong></a>
</td>
<td style="width:55%; padding-left:10px">
Already a member? Log in 

<div>Username: <input type="text" name="log" id="log" value="" /></div>
<div>Password:&nbsp <input name="pwd" id="pwd" type="password" value="" /></div>
<input type="submit" name="submit" value="Login" class="button">
<input name="rememberme" id="rememberme" type="hidden" checked="checked" value="forever">
<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
<br />
<a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword" target="_blank">Lost Password?</a>
	

</td></tr></table>
</form>	
</div>		
<?php	} //end showpagecontent check ?>
</div><!-- .entry -->

				

<?php
}


/* wp lead page end */


function setesm_postdisplay_m($postid = 0,$ast = 0, $astc = 0){
global $page;

$noreg=get_post_meta($postid, 'No Registration', $single = true);
if ($noreg != null) {
$bypassreg = 1;
}
if (isset($_COOKIE['esmpass'])) { $bypassreg = 1; }


/* Check if the user is on page gt 1 and not logged in */
	global $page; 
	if (($bypassreg == 1) or (is_user_logged_in())) { 
		$showpagecontent = 1;
	} else if ( in_category(array(139,127)) and (!$bypassreg == 1) or in_category(array(139,127)) and (!is_user_logged_in())) { 
		$showpagecontent = 0;
	} else if ( in_category(array(163,166,167)) and ($page > 1 )) { 
		$showpagecontent = 0;
	} else if ($astused > 1){ 
		$showpagecontent = 0;
	} else {
		//let them in
		$showpagecontent = 1;
	}
 ?>
 


		<div id="title">
		
        	<h2><?php if ( in_category( array( 19,20,21 ) )) { echo 'Press Release: ';} ?><?php the_title(); ?></h2>
		</div>
        <div class="postmeta">

		<?php $SubTitle=get_post_meta($postid, 'Sub Title', $single = true);
		if ($SubTitle != null) {
		echo '<span class="subtitle">'.$SubTitle.'</span></br>'; 
		the_time('F jS, Y');
		echo '</br>';}?>
        
		<?php if (function_exists('gkl_postavatar')){ echo '<div style="float:left; margin-right:5px;">';   gkl_postavatar(postavatar);  echo '</div>';}?>
        <?php $PageByLine=get_post_meta($postid, 'Byline', $single = true);
	                                         if ($PageByLine != null) {
		                                 echo $PageByLine.'<br/>';}
			 else { echo '<span class="byline">'; }
			if ( in_category(29)) { echo '<a href="'.get_category_link(29).'">'.'Read more news from Around the Web </a></span>';
			} elseif ( in_category(126)){ echo '<a href="'.get_category_link(126).'">'.'View more Sites of the Week </a></span>';
			} elseif ( in_category(19)){ echo '<a href="'.get_category_link(19).'">'.'View more Press Releases </a></span>';
			} elseif ( in_category(20)){ echo '<a href="'.get_category_link(20).'">'.'View more Partner Press Releases</a></span>';
			} elseif ( in_category(21)){ echo '<a href="'.get_category_link(21).'">'.'View more Press Releases from Technology Providers</a></span>';
			} else { ?> Read more by <?php
							$AltAuthorName=get_post_meta($postid, 'Alt Author Read More Name', $single = true);
							$AltAuthorLink=get_post_meta($postid, 'Alt Author Read More Link', $single = true);
							$AltDate=get_post_meta($postid, 'Alt Date', $single = true);							
							if ($AltAuthorName != null) {
								if (($AltAuthorName == 'hide') or ($AltAuthorName == '0'))  { 
								 //delete the line
								} else {
								if ($AltAuthorLink != null) { 
								echo '<a href="'.$AuthorLink.'" title="'.$AltAuthorName.'" rel="author">'.$AltAuthorName.'</a>';
								} else { echo $AltAuthorName; } 
								
								}
								
							} else { 
							 the_author_posts_link(); } 
							 
			}?>
   
		</div>
		<div class="post">


<?php
 if ($astc > 1){ ?>
<div id="title">
<h2>Table of Contents</h2>
</div>

<?php
	 echo '<div class="toc"><h3>'.get_cat_name($astc).'</h3>';
	$e = 1; $query5 = new WP_Query();$query5->query('posts_per_page=-1&cat='.$astc);
	while ($query5->have_posts()) : $query5->the_post(); ?>
		<p><a href="<?php the_permalink() ?><?php echo '?ast='.$ast.'&astc='.$astc; ?>" rel="bookmark"><?php the_title(); ?></a></p>
	<?php $e++; endwhile; wp_reset_query(); ?>
   </div>
<?php }?>


		
		<?php if ( has_post_thumbnail() ) : $thumbnail_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' ); ?>
            <a href="<?php the_permalink(); ?>" class="thumbnail"><img src="<?php echo mopr_create_thumbnail( $thumbnail_url[0], 0, 50, 50 ); ?>" /></a>
            <?php endif; ?>

            <?php 
			if($showpagecontent == 1){ 
			the_content(); 

			$ContactName=get_post_meta($postid, 'Contact Name', $single = true);
			$ContactEmail=get_post_meta($postid, 'Contact Email', $single = true);
			$ContactPhone=get_post_meta($postid, 'Contact Phone', $single = true);
			$ContactURL=get_post_meta($postid, 'Contact URL', $single = true);
			
			if ($ContactURL != null) {
			if (!preg_match("#^http://www\.[a-z0-9-_.]+\.[a-z]{2,4}$#i",$ContactURL)) {
			$ContactURL = 'http://'.$ContactURL;
			}
			}
			
			$GrantOrg=get_post_meta($postid, 'Grant Org', $single = true);
			if ($ContactName != null || $ContactEmail != null || $ContactPhone != null || $ContactURL != null || $GrantOrg != null) {
			?>
			<blockquote>
			<strong>Contact Information</strong><hr />
			<ul>
			<?php
			$Eligibility=get_post_meta($postid, 'Eligibility', $single = true);
			$GrantDeadline=get_post_meta($postid, 'Grant Deadline', $single = true);
			$GrantHeadline=get_post_meta($postid, 'Grant Headline', $single = true);
			$GrantValue=get_post_meta($postid, 'Grant Value', $single = true);
			if ($GrantOrg != null) {
			echo '<li><strong>Grant Organization: </strong>'.$GrantOrg.'</li>';
			}
			
			if ($ContactName != null) {
			echo '<li><strong>Contact Name: </strong>'.$ContactName.'</li>';
			}
			if ($ContactPhone != null) {
			echo '<li><strong>Contact Phone: </strong>'.$ContactPhone.'</li>';
			}
			if ($ContactEmail != null) {
			echo '<li><strong>Contact Email: </strong>'.$ContactEmail.'</li>';
			}
			if ($ContactURL != null) {
			echo '<li><strong>Contact URL: </strong><a href="'.$ContactURL.'" target="_blank" alt="Grant Link">'.substr($ContactURL, 0, 30).'</a>...</li>';
			}
			if ($Eligibility != null) {
			echo '<li><strong>Eligibility: </strong>'.$Eligibility.'</li>';
			}
			
			if ($GrantDeadline != null) {
			$grantdatetime = date_create($GrantDeadline);
			echo '<li><strong>Grant Deadline: </strong>'.$grantdatetime->format('l F jS, Y').'</li>';
			}
			
			if ($GrantValue != null) {
			echo '<li><strong>Grant Value: </strong>'.$GrantValue.'</li>';
			}
			
			echo '</ul></blockquote>';
			}

						
						// make sure any advanceded content gets cleared
						echo '<div class="clear"></div>';			
			
						// Display pagination
						echo '<div align="left" style="border-top: 1px solid #ccc; border-bottom: 1px solid #ccc; width:100%; float:left; font-size:20px; font-weight:bold; line-height:30px;">';
						if ($ast > 1){
						enhanced_link_pages(array('blink'=>'', 'alink'=>'&nbsp;', 'before' => '<strong>Pages:</strong> ', 'after' => '', 'next_or_number' => 'next', 'afterhref' =>'ast='.$ast.'&astc='.$astc)); 
						} else {
						enhanced_link_pages(array('blink'=>'', 'alink'=>'&nbsp;', 'before' => '<div class="pagelinks">Pages: ', 'after' => '</div>', 'next_or_number' => 'next')); 
						}
						echo '</div>';
						// Post Widget
						gab_dynamic_sidebar('PostWidget');
		
			?>			

<div style="clear:both;"></div> 
	
<div style="clear:both"></div>
						
							
<?php			
 } else { ?>
						
<p><?php print string_limit_words(get_the_excerpt(), 35); ?>...</p>

<div style="border:#CCCCCC solid 1px; padding:10px;">
<form action="<?php echo get_option('home'); ?>/wp-login.php" method="post">
<table style="width:100%;">
<tr><td colspan="2"><p><strong>Free registration required to continue reading this article.</strong></p></td></tr>
<tr><td style="width:45%; padding-right:10px; border-right:1px solid #666">

Register today and receive free access to all our news and resources and the ability to customize your news by topic with My eSchool News.<br /><br />
<a href="<?php echo get_option('home'); ?>/wp-login.php?action=register&redirect_to=?redirect_to=<?php echo urlencode(get_permalink()); ?>" style="text-decoration:underline;"><strong>Register now.</strong></a>
</td>
<td style="width:55%; padding-left:10px">
Already a member? Log in 

<div>Username: <input type="text" name="log" id="log" value="" /></div>
<div>Password:&nbsp <input name="pwd" id="pwd" type="password" value="" /></div>
<input type="submit" name="submit" value="Login" class="button">
<input name="rememberme" id="rememberme" type="hidden" checked="checked" value="forever">
<input type="hidden" name="redirect_to" value="<?php echo $_SERVER['REQUEST_URI']; ?>">
<br />
<a href="<?php echo get_option('home'); ?>/wp-login.php?action=lostpassword" target="_blank">Lost Password?</a>
	

</td></tr></table>
</form>	
</div>		
<?php	} //end showpagecontent check ?>
		</div>


</div>

				

<?php
}



/* END MOBLE POST DISPLAY */


function setesm_postaccess($postid = 0){

/*	
$noreg=get_post_meta($postid, 'No Registration', $single = true);
if ($noreg != null) {
$bypassreg = 1;
}	
	
$siteaccess = 0;	
if ($bypassreg == 1){ $siteaccess = 1; }
if (is_user_logged_in()	){ $siteaccess = 1; }
if (isset($_COOKIE['esmpass'])) { $siteaccess = 1;}
if ( isset($_GET['ps']) ) { $siteaccess = 1;} 	
*/
$siteaccess = 1;
return $siteaccess;


}






/////// unsub recorder ///////////////

function unsub_record($email,$Action,$Site_Name,$list,$Accountid ='0',$URL='',$campain = ''){
global $wpdb;

	$Action__c = $Action;
	$Site_Used__c = $Site_Name;
	$List__c = $list;
	$Change_Date__c = date('Y-m-d H:i:s');
	$Campaign__c =$campain;
	$Email_Changed__c = $email;
	$Account__c = $Accountid;
	$URL__c	 = $URL;

		


		
$wpdb->query( $wpdb->prepare("INSERT INTO esm_unsub (Action__c,Campaign__c,Account__c,Site_Used__c,URL__c,Change_Date__c,List__c,Email_Changed__c,uploaded) VALUES (%s,%s,%s,%s,%s,%s,%s,%s,%d)", $Action__c,$Campaign__c,$Account__c,$Site_Used__c,$URL__c,$Change_Date__c,$List__c,$Email_Changed__c,0) );
	
}

/////// unsub recorder ///////////////



?>