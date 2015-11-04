<?php /* 
Template Name: 3 Column Page

*/ 
require_once( 'library/boxes.php' );
//include_once (TEMPLATEPATH . '/library/boxes.php');


?>

<?php //set variables for testing and to allow flexibility later on...

$post_id = $post->ID;

$astused = get_post_meta($post_id, '_wp_esmad_template', true);

$adset_follow = get_post_meta($post_id, '_ast_follow', true);

if($adset_follow > 0){$astf = $astused;} else {$astf = 0;}



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

//check for col 1 and 2 then set widths

//$meta = get_post_meta($post_id);
//echo "<pre>";
//print_r($meta);
//echo "</pre>";

if(!empty($collist1)){
echo '<div class="row">';

	if(empty($collist2)){
		echo '<div class="small-12 large-12 columns">';		
	} else{
		echo '<div class="small-12 large-8 columns">';		
	}

		foreach($collist1 as $row){
//echo "<pre>";
//print_r($row);
//echo "</pre>";
//echo $row;
			$astcvar = 'Col'.$row.'_cat';
			echo $astcvar;
			$astc = $$astcvar;
			
			$Col_style = get_post_meta($post_id, '_Col'.$row.'_style', true);
			$Col_showthumb = get_post_meta($post_id, '_Col'.$row.'_showthumb', true);
			$Col_rotate = get_post_meta($post_id, '_Col'.$row.'_rotate', true);
			$Col_cat = get_post_meta($post_id, '_Col'.$row.'_cat', true);
			$Col_qty = get_post_meta($post_id, '_Col'.$row.'_qty', true);
			$Col_htmlbody = get_post_meta($post_id, '_Col'.$row.'_htmlbody', true);
			$Col_adspot = get_post_meta($post_id, '_Col'.$row.'_adspot', true);
			$Col_title = get_post_meta($post_id, '_Col'.$row.'_title', true);
			$Col_offset = get_post_meta($post_id, '_Col'.$row.'_offset', true);
echo '<!-- '.
' astc:'.$astc.
' Col_style:'.$Col_style.
' Col_showthumb:'.$Col_showthumb.
' Col_rotate:'.$Col_rotate.
' Col_cat:'.$Col_cat.
' Col_qty:'.$Col_qty.
' Col_htmlbody:'.$Col_htmlbody.
' Col_adspot:'.$Col_adspot.
' Col_title:'.$Col_title.
' Col_offset:'.$Col_offset.
' -->';

			if ($Col_style == 'lead'){
				box_lead($Col_qty,$Col_rotate,$Col_showthumb,$Col_cat,$Col_title,$Col_offset, $astf, $astc);
			} else if ($Col_style == 'mlead'){ 
				box_multilead($Col_qty,$Col_rotate,$Col_showthumb,$Col_cat,$Col_title,$Col_offset, $astf, $astc);
			}/* else if($Col_style == 'rota') {
				box_rota($Col_qty,$Col_offset, $astf, $astc, $Col_cat);
			} else if($Col_style == 'rotp') {
				box_rotp($Col_qty,$Col_offset, $astf, $astc, $Col_cat);						
			}*/ else if($Col_style == 'art' || 'art2' || 'art3' || 'rota' || 'rotp' ) {
				box_art($Col_qty,$Col_rotate,$Col_showthumb,$Col_cat,$Col_offset,$Col_title, $astf, $astc);
			} /*else if($Col_style == 'art2') {
				box_art_2($Col_qty,$Col_rotate,$Col_showthumb,$Col_cat,$Col_offset,$Col_title,$astf,$astc);
			} else if($Col_style == 'art3') {
				box_art_3($Col_qty,$Col_rotate,$Col_showthumb,$Col_cat,$Col_offset,$Col_title, $astf, $astc);
			} */ else if($Col_style == 'cont') {
				if (have_posts()) : while (have_posts()) : the_post();
					echo '<div class="extracontent">';
					the_content();
					echo '</div>';
				endwhile; else : endif;
			} else if($Col_style == 'html') {
				echo $Col_htmlbody;
//				echo apply_filters('the_content', $Col_htmlbody);
			} else if($Col_style == 'ads') {
				box_ad($Col_adspot);
			}
		
		}

	echo '</div>'; //close col 1
} //col 1

if(!empty($collist2)){

	if(empty($collist1)){
	echo '<div class="row">'; //open the row 
		echo '<div class="small-12 large-12 columns">';		
	} else{
		echo '<div class="small-12 large-4 columns">';		
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
if(!empty($collist1)){ echo '</div>'; /* close row */ }


/*
?>
		<article <?php post_class() ?> id="post-<?php the_ID(); ?>">
			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>
			<?php do_action( 'foundationpress_page_before_entry_content' ); ?>
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<footer>
				<?php wp_link_pages( array('before' => '<nav id="page-nav"><p>' . __( 'Pages:', 'foundationpress' ), 'after' => '</p></nav>' ) ); ?>
				<p><?php the_tags(); ?></p>
			</footer>
			<?php do_action( 'foundationpress_page_before_comments' ); ?>
			<?php comments_template(); ?>
			<?php do_action( 'foundationpress_page_after_comments' ); ?>
		</article>

	<?php //end old first column  ?>
	</div>


	
    <!-- right side  -->
	<?php //old second column  ?>
    
	<?php //end old second column  ?>
    
    </div>

</div>

*/ ?>