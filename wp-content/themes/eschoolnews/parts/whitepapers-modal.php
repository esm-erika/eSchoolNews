<?php
/**
 * Template part for top bar menu
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>
<?php


		$WPURL=get_post_meta($post->ID, 'WP URL', $single = true).'?'.$_SERVER['QUERY_STRING'];
		$WPForm=get_post_meta($post->ID, 'WP Form Number', $single = true);
		$WPcbt=get_post_meta($post->ID, 'WP Custom Button', $single = true);
		$WPfooter=get_post_meta($post->ID, 'WP Footer', $single = true);
?>

<div id="<?php the_slug(); ?>" class="reveal-modal" data-reveal aria-labelledby="<?php the_slug(); ?>" aria-hidden="true" role="dialog">
  <h2 id="<?php the_slug(); ?>"><?php the_title(); ?></h2>

  <hr/>
  <?php the_content(); ?>
  


<?php
if ($WPForm != null) {
/*
			if ( isset($_GET['ps']) ) {
				$esmpassvals = explode ( "-" , $_GET['ps']);	
					if (isset($esmpassvals[0]) && is_numeric($esmpassvals[0])){
						$wpuidSP=$esmpassvals[0];} 
					if (isset($esmpassvals[1]) && strlen($esmpassvals[1]) == 15 || ($pscheck==1) && isset($esmpassvals[1]) && strlen($esmpassvals[1]) == 18 ){
						$sfuidSP=$esmpassvals[1];}
					if (isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 15 || ($pscheck==1) && isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 18 ){
						$PersonContactIdPS=$esmpassvals[2];} 
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
		$WPautofill = array(
		wpuidSP => $wpuidSP,
		sfuidSP => $sfuidSP,
		PersonContactIdPS => $PersonContactIdPS,
		wpuid => $wpuid,
		sfuid => $sfuid,
		PersonContactId => $PersonContactId,	
		esmpassvalue => $_COOKIE['esmpass'],	
		astc => $astc			
		);


gravity_form( $WPForm , false, false, false, $WPautofill);  


}else if ($WPURL != null) { 
echo '<p><a href="'.$WPURL.'" target="_blank">';
 if ($WPcbt != null) { 
		echo'<img class="alignright" src="'.$WPcbt.'" alt="Next" border="0" />';
		} else{
		echo'<img class="alignright" src="http://www.eschoolnews.com/files/2011/10/download-whitepaper.gif" alt="Download Whitepaper" width="364" height="76" border="0" />';	 
	 
	 }
echo '</a></p>'; 
}

?>


<?php */
} else {
/*	
	
?>
<table width="100%"><tr><td valign="top" style="vertical-align:top; padding-top:20px; padding-right:10px">
	<?php the_content(); ?>
</td>
<td valign="top" style="vertical-align:top; padding-left:10px; border-left:#CCC 1px solid">

<?php
if ($WPForm != null) {

			if ( isset($_GET['ps']) ) {
				$esmpassvals = explode ( "-" , $_GET['ps']);	
					if (isset($esmpassvals[0]) && is_numeric($esmpassvals[0])){
						$wpuidSP=$esmpassvals[0];} 
					if (isset($esmpassvals[1]) && strlen($esmpassvals[1]) == 15 || ($pscheck==1) && isset($esmpassvals[1]) && strlen($esmpassvals[1]) == 18 ){
						$sfuidSP=$esmpassvals[1];}
					if (isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 15 || ($pscheck==1) && isset($esmpassvals[2]) && strlen($esmpassvals[2]) == 18 ){
						$PersonContactIdPS=$esmpassvals[2];} 
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
		$WPautofill = array(
		wpuidSP => $wpuidSP,
		sfuidSP => $sfuidSP,
		PersonContactIdPS => $PersonContactIdPS,
		wpuid => $wpuid,
		sfuid => $sfuid,
		PersonContactId => $PersonContactId,	
		esmpassvalue => $_COOKIE['esmpass'],	
		astc => $astc		
		);


gravity_form( $WPForm , false, false, false, $WPautofill);  

}else if ($WPURL != null) { 
echo '<p><a href="'.$WPURL.'" target="_blank">';
 if ($WPcbt != null) { 
		echo'<img class="alignright" src="'.$WPcbt.'" alt="Next" border="0" />';
		} else{
		echo'<img class="alignright" src="http://www.eschoolnews.com/files/2011/10/download-whitepaper.gif" alt="Download Whitepaper" width="364" height="76" border="0" />';	 
	 
	 }
echo '</a></p>'; 
}

?>




<?php */ } ?>
  
  
  
  
  
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>