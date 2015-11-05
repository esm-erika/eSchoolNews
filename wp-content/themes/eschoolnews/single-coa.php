<?php /* 
Template Name: 3 Column Page

*/ 
require_once( 'library/boxes.php' );
//include_once (TEMPLATEPATH . '/library/boxes.php');


?>

<?php //set variables for testing and to allow flexibility later on...

$post_id = $post->ID;
$astused = get_post_meta($post_id, '_wp_esmad_template', true);

echo '<h1 class="section-title"><span>';
echo the_title();
echo '</span></h1>';

//$astused = get_post_meta($post_id, '_wp_esmad_template', true);

//$adset_follow = get_post_meta($post_id, '_ast_follow', true);

//if($adset_follow > 0){$astf = $astused;} else {$astf = 0;}



$Col1a_enabled = get_post_meta($post_id, '_Col1a_enable', true);
$Col1b_enabled = get_post_meta($post_id, '_Col1b_enable', true);
$Col1c_enabled = get_post_meta($post_id, '_Col1c_enable', true);
$Col1d_enabled = get_post_meta($post_id, '_Col1d_enable', true);

$Col2a_enabled = get_post_meta($post_id, '_Col2a_enable', true);
$Col2b_enabled = get_post_meta($post_id, '_Col2b_enable', true);
$Col2c_enabled = get_post_meta($post_id, '_Col2c_enable', true);
$Col2d_enabled = get_post_meta($post_id, '_Col2d_enable', true);

$collist1 = array();
if($Col1a_enabled == '1'){  $collist = array_push($collist1,'1a'); }
if($Col1b_enabled == '1'){  $collist = array_push($collist1,'1b'); }
if($Col1c_enabled == '1'){  $collist = array_push($collist1,'1c'); }
if($Col1d_enabled == '1'){  $collist = array_push($collist1,'1d'); }
$collist2 = array();
if($Col2a_enabled == '1'){  $collist = array_push($collist2,'2a'); }
if($Col2b_enabled == '1'){  $collist = array_push($collist2,'2b'); }
if($Col2c_enabled == '1'){  $collist = array_push($collist2,'2c'); }
if($Col2d_enabled == '1'){  $collist = array_push($collist2,'2d'); }

if ( is_singular( array( 'ercs' ) ) ) { 

$iserc = 1;
$toc = '';
echo '<div class="row">';
 get_template_part( 'parts/ads/erctop' ); 
 
	$content_post = get_post($post_id);
	$content = $content_post->post_content;
	$content = apply_filters('the_content', $content);
	$content = str_replace(']]>', ']]&gt;', $content);
	echo $content;
 
 
echo '</div>';
 }

if(!empty($collist1)){
echo '<div class="row">';

	if(empty($collist2) and !$iserc == 1){
		echo '<div class="small-12 large-12 columns">';		
	} else{
		echo '<div class="small-12 large-8 columns">';		
	}

		foreach($collist1 as $row){
			$astf = $astused;
			if($astf == ""){ $Col_style = get_post_meta($post_id, '_Col'.$row.'_style', true); }
			$Col_style = get_post_meta($post_id, '_Col'.$row.'_style', true);
			$Col_showthumb = get_post_meta($post_id, '_Col'.$row.'_showthumb', true);
			$Col_rotate = get_post_meta($post_id, '_Col'.$row.'_rotate', true);
			$Col_cat = get_post_meta($post_id, '_Col'.$row.'_cat', true);
			$Col_qty = get_post_meta($post_id, '_Col'.$row.'_qty', true);
			$Col_htmlbody = get_post_meta($post_id, '_Col'.$row.'_htmlbody', true);
			$Col_adspot = get_post_meta($post_id, '_Col'.$row.'_adspot', true);
			$Col_title = get_post_meta($post_id, '_Col'.$row.'_title', true);
			$Col_offset = get_post_meta($post_id, '_Col'.$row.'_offset', true);
			$astc = $Col_cat;
			$maketoc = 0;
			echo '<!-- '.$astc.' ~ '.$astf.' -->';
			if ($Col_style == 'lead'){
				echo '<!-- lead -->';
				$maketoc = 1;
				box_lead($Col_qty,$Col_rotate,$Col_showthumb,$Col_cat,$Col_title,$Col_offset, $astf, $astc);
			} else if ($Col_style == 'mlead'){ 
				$maketoc = 1;
				box_multilead($Col_qty,$Col_rotate,$Col_showthumb,$Col_cat,$Col_title,$Col_offset, $astf, $astc);
				echo '<!-- mlead -->';
			} else if($Col_style == 'art' || $Col_style == 'art2' || $Col_style == 'art3' || $Col_style == 'rota' || $Col_style == 'rotp' ) {
				echo '<!-- art -->';
				$maketoc = 1;
				box_art($Col_qty,$Col_rotate,$Col_showthumb,$Col_cat,$Col_offset,$Col_title, $astf, $astc);
				
				echo '<!-- end art -->';
			} else if($Col_style == 'cont') {
				echo '<!-- content -->';
				if (have_posts()) : while (have_posts()) : the_post();
					echo '<div class="columns">';
					the_content();
					echo '</div>';
				endwhile; else : endif;
			} else if($Col_style == 'html') {
				$maketoc = 2;
				echo '<!-- html -->';
				echo '<div class="columns">';
				echo apply_filters('the_content', $Col_htmlbody);
				echo '</div>';
				echo '<!-- end html -->';				
			} else if($Col_style == 'ads') {
				echo '<!-- ad -->';
				box_ad($Col_adspot);
			}
					
					
			if($maketoc == 1){
			$toc = '';
			if(strlen($Col_title) > 0){ 
			$toc = $toc . '<p style="font-weight:bold"><a href="#'.$row.'">'.$Col_title.'</a></p>'; 
			} else { 
			$toc = $toc . '<p style="font-weight:bold"><a href="#'.$row.'">'.get_cat_name($Col_cat).'</a></p>'; }
			
			$e = 1; $query5 = new WP_Query();$query5->query('cat='.$Col_cat);
			while ($query5->have_posts()) : $query5->the_post(); 
			$toc = $toc . '<ul><li><a href="'. get_permalink(). '?ast='.$astused.'&astc='.$Col_cat.'" rel="bookmark">'. get_the_title() .'</a></li></ul>';
			
			 $e++; endwhile; wp_reset_query(); 
			} elseif($maketoc == 2){
			
				
			}




	} //col 1 foreach
echo '</div><!-- end -->'; //close col 1
}
if(!empty($collist2) or $iserc == 1){

	if(empty($collist1)){
	echo '<div class="row">'; //open the row 
		echo '<div class="small-12 large-12 columns">';		
	} else{
		echo '<div class="small-12 large-4 columns">';		
	}

	if($iserc == 1){
	?>
	
	<article>
	<section>
	<h4>Table of Contents</h4>	
	   
	<?php echo $toc; ?>
	
	
	</div>
	</section>
	</article>
	
	<?	
	}

	foreach($collist2 as $row){
		$astc = ${'Col'.$row.'_cat'};
		$Col_style = get_post_meta($post_id, '_Col'.$row.'_style', true);
		$Col_showthumb = get_post_meta($post_id, '_Col'.$row.'_showthumb', true);
		$Col_rotate = get_post_meta($post_id, '_Col'.$row.'_rotate', true);
		$Col_cat = get_post_meta($post_id, '_Col'.$row.'_cat', true);
		$Col_qty = get_post_meta($post_id, '_Col'.$row.'_qty', true);
		$Col_htmlbody = get_post_meta($post_id, '_Col'.$row.'_htmlbody', true);
		$Col_adspot = get_post_meta($post_id, '_Col'.$row.'_adspot', true);
		$Col_title = get_post_meta($post_id, '_Col'.$row.'_title', true);
		$Col_offset = get_post_meta($post_id, '_Col'.$row.'_offset', true);
	
		if ($Col_style == 'lead'){ 
			box_lead_300($Col_qty,$Col_rotate,$Col_showthumb,$Col_cat,$Col_offset,$Col_title,$astf,$astc);
		} /* else if($Col_style == 'rota') { 
			box_rota_300($Col_qty,$Col_offset,$astf,$astc,$Col_cat);
		} else if($Col_style == 'rotp') {
			box_rotp_300($Col_qty,$Col_offset,$astf,$astc,$Col_cat);
		} */ else if($Col_style == 'art' || 'rota' || 'rotp') { 
			box_art_300($Col_qty,$Col_rotate,$Col_showthumb,$Col_cat,$Col_offset,$Col_title,$astf,$astc);
		} else if($Col_style == 'cont') {
			if (have_posts()) : while (have_posts()) : the_post();
				echo '<div class="extracontent">';
					the_content();
				echo '</div>';
			endwhile; else : endif;
	
		} else if($Col_style == 'html') {
				echo apply_filters('the_content', $Col_htmlbody);
		} else if($Col_style == 'ads') { 
				box_ad($Col_adspot);
		}
	}

	echo '</div>'; //close col 2

}
if(!empty($collist1) or $iserc == 1){ echo '</div>'; /* close row */ }


if ( $iserc == 1 ) { 
echo '<div class="row">';
 get_template_part( 'parts/ads/ercbottom' ); 
echo '</div>';

 }

