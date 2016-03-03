<?php
/**
 * Template part for erc bottom ad
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<div class="ad-container">
		<div class="row">
			<div class="small-12 columns">

			<?php // echo adrotate_group('1'); 
		
	if ($astused > 0){
		// ast used defined   How to do this in the new?
	} else {
			$pageadset = $_GET['ast'];
		if(filter_var($pageadset, FILTER_VALIDATE_INT))
		{//reserved for default ad set
			$astused = $pageadset;	
		} else {
			// Retrieve adset info from URL query vars
			$astused = 1;
		}
	}
	 echo '    <!-- erc bottom banner '.$astused.' --> '; 
	if(function_exists(adrotate_banner)){ echo adrotate_banner($astused,12);}
		
	?>

		</div>
	</div>
</div>
