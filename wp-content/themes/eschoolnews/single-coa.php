<?php /* 
Template Name: 3 Column Page

*/ 
include_once (TEMPLATEPATH . '/library/boxes.php');


?>

<?php //set variables for testing and to allow flexibility later on...

$post_id = $post->ID;

$astused = get_post_meta($post_id, '_wp_esmad_template', true);

$adset_follow = get_post_meta($post_id, '_ast_follow', true);

if($adset_follow > 0){$astf = $astused;} else {$astf = 0;}


$Col1a_enabled = get_post_meta($post_id, '_Col1a_enable', true); // 1,0, undefined  ACF API CALL the_field('Col1a_enable');    http://plugins.elliotcondon.com/advanced-custom-fields/field-types/

if($Col1a_enabled == '1'){ 
	$Col1a_style = get_post_meta($post_id, '_Col1a_style', true); //lead, rota, rotp, art, cont, html, ads

	$Col1a_showthumb = get_post_meta($post_id, '_Col1a_showthumb', true); // 1,0, undefined

	$Col1a_rotate = get_post_meta($post_id, '_Col1a_rotate', true); // 1,0, undefined

	$Col1a_cat = get_post_meta($post_id, '_Col1a_cat', true); // list csv ie 1,2,3,4,5

	$Col1a_qty = get_post_meta($post_id, '_Col1a_qty', true); // number

	$Col1a_htmlbody = get_post_meta($post_id, '_Col1a_htmlbody', true);// HTML BLOB

	$Col1a_adspot = get_post_meta($post_id, '_Col1a_adspot', true);// ad spot

	$Col1a_title = get_post_meta($post_id, '_Col1a_title', true);// text

	$Col1a_offset = get_post_meta($post_id, '_Col1a_offset', true); // number

}

$Col1b_enabled = get_post_meta($post_id, '_Col1b_enable', true);; // true,false

if($Col1b_enabled == '1'){ 
	$Col1b_style = get_post_meta($post_id, '_Col1b_style', true); //lead, rota, rotp, art, cont, html, ads

	$Col1b_showthumb = get_post_meta($post_id, '_Col1b_showthumb', true); // 1,0, undefined

	$Col1b_rotate = get_post_meta($post_id, '_Col1b_rotate', true); // 1,0, undefined

	$Col1b_cat = get_post_meta($post_id, '_Col1b_cat', true); // list csv ie 1,2,3,4,5

	$Col1b_qty = get_post_meta($post_id, '_Col1b_qty', true); // number

	$Col1b_htmlbody = get_post_meta($post_id, '_Col1b_htmlbody', true);// HTML BLOB

	$Col1b_adspot = get_post_meta($post_id, '_Col1b_adspot', true);// ad spot

	$Col1b_title = get_post_meta($post_id, '_Col1b_title', true);// text
	
	$Col1b_offset = get_post_meta($post_id, '_Col1b_offset', true); // number

}

$Col1c_enabled = get_post_meta($post_id, '_Col1c_enable', true); // true,false

if($Col1c_enabled == '1'){ 
	$Col1c_style = get_post_meta($post_id, '_Col1c_style', true); //lead, rota, rotp, art, cont, html, ads

	$Col1c_showthumb = get_post_meta($post_id, '_Col1c_showthumb', true); // 1,0, undefined

	$Col1c_rotate = get_post_meta($post_id, '_Col1c_rotate', true); // 1,0, undefined

	$Col1c_cat = get_post_meta($post_id, '_Col1c_cat', true); // list csv ie 1,2,3,4,5

	$Col1c_qty = get_post_meta($post_id, '_Col1c_qty', true); // number

	$Col1c_htmlbody = get_post_meta($post_id, '_Col1c_htmlbody', true);// HTML BLOB

	$Col1c_adspot = get_post_meta($post_id, '_Col1c_adspot', true);// ad spot

	$Col1c_title = get_post_meta($post_id, '_Col1c_title', true);// text
	
	$Col1c_offset = get_post_meta($post_id, '_Col1c_offset', true); // number

}

$Col1d_enabled = get_post_meta($post_id, '_Col1d_enable', true); // true,false

if($Col1d_enabled == '1'){ 
	$Col1d_style = get_post_meta($post_id, '_Col1d_style', true); //lead, rota, rotp, art, cont, html, ads

	$Col1d_showthumb = get_post_meta($post_id, '_Col1d_showthumb', true); // 1,0, undefined

	$Col1d_rotate = get_post_meta($post_id, '_Col1d_rotate', true); // 1,0, undefined

	$Col1d_cat = get_post_meta($post_id, '_Col1d_cat', true); // list csv ie 1,2,3,4,5

	$Col1d_qty = get_post_meta($post_id, '_Col1d_qty', true); // number

	$Col1d_htmlbody = get_post_meta($post_id, '_Col1d_htmlbody', true);// HTML BLOB

	$Col1d_adspot = get_post_meta($post_id, '_Col1d_adspot', true);// ad spot

	$Col1d_title = get_post_meta($post_id, '_Col1d_title', true);// text
	
	$Col1d_offset = get_post_meta($post_id, '_Col1d_offset', true); // number

}

 //Col 2 vars...
 $Col2_htmlcol = get_post_meta($post_id, '_Col2_htmlcol', true);
 $Col2_htmlcol_htmlbody = get_post_meta($post_id, '_Col2_htmlcol_htmlbody', true);
 $Col2_eventscol = get_post_meta($post_id, '_Col2_eventscol', true);
 $Col2_supercol = get_post_meta($post_id, '_Col2_supercol', true);
 $Col2_adcol = get_post_meta($post_id, '_Col2_adcol', true);
if($Col2_htmlcol == '1'){
} else if($Col2_eventscol == '1'){
} else if($Col2_supercol == '1'){
} else if($Col2_adcol == '1'){

// DO NOT PROCESS THE REST...
} else {

	$Col2a_enabled = get_post_meta($post_id, '_Col2a_enable', true); // true,false

	if($Col2a_enabled == '1'){ 
		$Col2a_style = get_post_meta($post_id, '_Col2a_style', true); //lead, rota, rotp, art, cont, html, ads

		$Col2a_showthumb = get_post_meta($post_id, '_Col2a_showthumb', true); // 1,0, undefined

		$Col2a_rotate = get_post_meta($post_id, '_Col2a_rotate', true); // 1,0, undefined

		$Col2a_cat = get_post_meta($post_id, '_Col2a_cat', true); // list csv ie 1,2,3,4,5

		$Col2a_qty = get_post_meta($post_id, '_Col2a_qty', true); // number

		$Col2a_htmlbody = get_post_meta($post_id, '_Col2a_htmlbody', true);// HTML BLOB

		$Col2a_adspot = get_post_meta($post_id, '_Col2a_adspot', true);// ad spot

		$Col2a_title = get_post_meta($post_id, '_Col2a_title', true);// text
		
		$Col2a_offset = get_post_meta($post_id, '_Col2a_offset', true); // number

	}

	$Col2b_enabled = get_post_meta($post_id, '_Col2b_enable', true); // true,false

	if($Col2b_enabled == '1'){ 
		$Col2b_style = get_post_meta($post_id, '_Col2b_style', true); //lead, rota, rotp, art, cont, html, ads

		$Col2b_showthumb = get_post_meta($post_id, '_Col2b_showthumb', true); // 1,0, undefined

		$Col2b_rotate = get_post_meta($post_id, '_Col2b_rotate', true); // 1,0, undefined

		$Col2b_cat = get_post_meta($post_id, '_Col2b_cat', true); // list csv ie 1,2,3,4,5

		$Col2b_qty = get_post_meta($post_id, '_Col2b_qty', true); // number

		$Col2b_htmlbody = get_post_meta($post_id, '_Col2b_htmlbody', true);// HTML BLOB

		$Col2b_adspot = get_post_meta($post_id, '_Col2b_adspot', true);// ad spot

		$Col2b_title = get_post_meta($post_id, '_Col2b_title', true);// text
		
		$Col2b_offset = get_post_meta($post_id, '_Col2b_offset', true); // number

	}

	$Col2c_enabled = get_post_meta($post_id, '_Col2c_enable', true);; // true,false

	if($Col2c_enabled == '1'){ 
		$Col2c_style = get_post_meta($post_id, '_Col2c_style', true); //lead, rota, rotp, art, cont, html, ads

		$Col2c_showthumb = get_post_meta($post_id, '_Col2c_showthumb', true); // 1,0, undefined

		$Col2c_rotate = get_post_meta($post_id, '_Col2c_rotate', true); // 1,0, undefined

		$Col2c_cat = get_post_meta($post_id, '_Col2c_cat', true); // list csv ie 1,2,3,4,5

		$Col2c_qty = get_post_meta($post_id, '_Col2c_qty', true); // number

		$Col2c_htmlbody = get_post_meta($post_id, '_Col2c_htmlbody', true);// HTML BLOB

		$Col2c_adspot = get_post_meta($post_id, '_Col2c_adspot', true);// ad spot

		$Col2c_title = get_post_meta($post_id, '_Col2c_title', true);// text
		
		$Col2c_offset = get_post_meta($post_id, '_Col2c_offset', true); // number

	}

	$Col2d_enabled = get_post_meta($post_id, '_Col2d_enable', true); // true,false

	if($Col2d_enabled == '1'){ 
		$Col2d_style = get_post_meta($post_id, '_Col2d_style', true); //lead, rota, rotp, art, cont, html, ads

		$Col2d_showthumb = get_post_meta($post_id, '_Col2d_showthumb', true); // 1,0, undefined

		$Col2d_rotate = get_post_meta($post_id, '_Col2d_rotate', true); // 1,0, undefined

		$Col2d_cat = get_post_meta($post_id, '_Col2d_cat', true); // list csv ie 1,2,3,4,5

		$Col2d_qty = get_post_meta($post_id, '_Col2d_qty', true); // number

		$Col2d_htmlbody = get_post_meta($post_id, '_Col2d_htmlbody', true);// HTML BLOB

		$Col2d_adspot = get_post_meta($post_id, '_Col2d_adspot', true);// ad spot

		$Col2d_title = get_post_meta($post_id, '_Col2d_title', true);// text
		
		$Col2d_offset = get_post_meta($post_id, '_Col2d_offset', true); // number

	}

}


//tab vars..

$tabs_enabled = get_post_meta($post_id, '_tabs_enabled', true); // true,false

if($tabs_enabled == '1'){ 
$tabs_width = get_post_meta($post_id, '_tabs_width', true); // number

$tab_1 = get_post_meta($post_id, '_tab_1', true); // list csv ie 1,2,3,4,5

$tab_2 = get_post_meta($post_id, '_tab_2', true); // list csv ie 1,2,3,4,5

$tab_3 = get_post_meta($post_id, '_tab_3', true); // list csv ie 1,2,3,4,5

$tab_4 = get_post_meta($post_id, '_tab_4', true); // list csv ie 1,2,3,4,5

$tab_5 = get_post_meta($post_id, '_tab_5', true); // list csv ie 1,2,3,4,5

}


// print_r($arr["b"]);



?>





<?php get_header(); ?>


<div id="primarycontent">

		<div id="primary-left">

	        
            <?php //if(is_home()){ ?>

	            <h3 class="section-title"><?php the_title(); edit_post_link(__('#','source'),' ',''); ?></h3>

    		<?php // } else {   <h4 class="section-title">Breaking News</h4>?>   
	           
	       
			<?php // }


	if(!$Col1a_enabled == '1' and !$Col1b_enabled == '1' and !$Col1c_enabled == '1' and !$Col1d_enabled == '1' ) {

		if (have_posts()) : while (have_posts()) : the_post();

			// Display content

			echo '<div class="extracontent">';
the_content();
echo '</div>';

		endwhile; else : endif;

	} else {

				
					if($Col1a_enabled == '1'){
						$astc = $Col1a_cat;

						if ($Col1a_style == 'lead'){
							// box_lead($qty = 3,$theorder = 'date', $showthumb = 1, $thecat = 0, $theboxtitle = '0', $ast = 0, $astc = 0)

							box_lead($Col1a_qty,$Col1a_rotate,$Col1a_showthumb,$Col1a_cat,$Col1a_title,$Col1a_offset, $astf, $astc);

						} else if ($Col1a_style == 'mlead'){ 
							// box_multilead($qty = 1,$theorder = 'date', $showthumb = 1, $thecat = 0, $theboxtitle = '0', $ast = 0, $astc = 0)

							box_multilead($Col1a_qty,$Col1a_rotate,$Col1a_showthumb,$Col1a_cat,$Col1a_title,$Col1a_offset, $astf, $astc);

						} else if($Col1a_style == 'rota') {
							//function box_rota($qty = 6, $thecat = NULL){

							box_rota($Col1a_qty,$Col1a_offset, $astf, $astc, $Col1a_cat);

						} else if($Col1a_style == 'rotp') {

							// box_rotp($qty = 6, $thecat = NULL)

							box_rotp($Col1a_qty,$Col1a_offset, $astf, $astc, $Col1a_cat);						
						
						} else if($Col1a_style == 'art') {
							box_art($Col1a_qty,$Col1a_rotate,$Col1a_showthumb,$Col1a_cat,$Col1a_offset,$Col1a_title, $astf, $astc);

						} else if($Col1a_style == 'art2') {
							box_art_2($Col1a_qty,$Col1a_rotate,$Col1a_showthumb,$Col1a_cat,$Col1a_offset,$Col1a_title,$astf,$astc);

						} else if($Col1a_style == 'art3') {
							box_art_3($Col1a_qty,$Col1a_rotate,$Col1a_showthumb,$Col1a_cat,$Col1a_offset,$Col1a_title, $astf, $astc);

						} else if($Col1a_style == 'cont') {

							if (have_posts()) : while (have_posts()) : the_post();
echo '<div class="extracontent">';
the_content();
echo '</div>';
                            endwhile; else : endif;

						} else if($Col1a_style == 'html') {

							echo apply_filters('the_content', $Col1a_htmlbody);

						} else if($Col1a_style == 'ads') {
							box_ad($Col1a_adspot);

						}

            	}

					if($Col1b_enabled == '1'){
						$astc = $Col1b_cat;

						if ($Col1b_style == 'lead'){
							// box_lead($qty = 3,$theorder = 'date', $showthumb = 1, $thecat = 0, $theboxtitle = '0', $ast = 0, $astc = 0)

							box_lead($Col1b_qty,$Col1b_rotate,$Col1b_showthumb,$Col1b_cat,$Col1b_title,$Col1b_offset, $astf, $astc);

						} else if ($Col1b_style == 'mlead'){ 
							// box_multilead($qty = 1,$theorder = 'date', $showthumb = 1, $thecat = 0, $theboxtitle = '0', $ast = 0, $astc = 0)

							box_multilead($Col1b_qty,$Col1b_rotate,$Col1b_showthumb,$Col1b_cat,$Col1b_title,$Col1b_offset, $astf, $astc);

						} else if($Col1b_style == 'rota') {
							//function box_rota($qty = 6, $thecat = NULL){

							box_rota($Col1b_qty,$Col1b_offset, $astf, $astc, $Col1b_cat);

						} else if($Col1b_style == 'rotp') {

							// box_rotp($qty = 6, $thecat = NULL)

							box_rotp($Col1b_qty,$Col1b_offset, $astf, $astc, $Col1b_cat);						}

						else if($Col1b_style == 'art') {
							box_art($Col1b_qty,$Col1b_rotate,$Col1b_showthumb,$Col1b_cat,$Col1b_offset,$Col1b_title, $astf, $astc);

						} else if($Col1b_style == 'art2') {
							box_art_2($Col1b_qty,$Col1b_rotate,$Col1b_showthumb,$Col1b_cat,$Col1b_offset,$Col1b_title,$astf,$astc);

						} else if($Col1b_style == 'art3') {
							box_art_3($Col1b_qty,$Col1b_rotate,$Col1b_showthumb,$Col1b_cat,$Col1b_offset,$Col1b_title,$astf,$astc);

						} else if($Col1b_style == 'cont') {

							if (have_posts()) : while (have_posts()) : the_post();
echo '<div class="extracontent">';
the_content();
echo '</div>';
                            endwhile; else : endif;

						} else if($Col1b_style == 'html') {

							echo apply_filters('the_content', $Col1b_htmlbody);

						} else if($Col1b_style == 'ads') {
							box_ad($Col1b_adspot);

						}

            	}

					if($Col1c_enabled == '1'){
						$astc = $Col1c_cat;

						if ($Col1c_style == 'lead'){
							// box_lead($qty = 3,$theorder = 'date', $showthumb = 1, $thecat = 0, $theboxtitle = '0', $ast = 0, $astc = 0)

							box_lead($Col1c_qty,$Col1c_rotate,$Col1c_showthumb,$Col1c_cat,$Col1c_title,$Col1c_offset, $astf, $astc);

						} else if ($Col1c_style == 'mlead'){ 
							// box_multilead($qty = 1,$theorder = 'date', $showthumb = 1, $thecat = 0, $theboxtitle = '0', $ast = 0, $astc = 0)

							box_multilead($Col1c_qty,$Col1c_rotate,$Col1c_showthumb,$Col1c_cat,$Col1c_title,$Col1c_offset, $astf, $astc);

						} else if($Col1c_style == 'rota') {
							//function box_rota($qty = 6, $thecat = NULL){

							box_rota($Col1c_qty,$Col1c_offset, $astf, $astc, $Col1c_cat);

						} else if($Col1c_style == 'rotp') {

							// box_rotp($qty = 6, $thecat = NULL)

							box_rotp($Col1c_qty,$Col1c_offset, $astf, $astc, $Col1c_cat);						}

						else if($Col1c_style == 'art') {
							box_art($Col1c_qty,$Col1c_rotate,$Col1c_showthumb,$Col1c_cat,$Col1c_offset,$Col1c_title, $astf, $astc);

						} else if($Col1c_style == 'art2') {
							box_art_2($Col1c_qty,$Col1c_rotate,$Col1c_showthumb,$Col1c_cat,$Col1c_offset,$Col1c_title,$astf,$astc);

						} else if($Col1c_style == 'art3') {
							box_art_3($Col1c_qty,$Col1c_rotate,$Col1c_showthumb,$Col1c_cat,$Col1c_offset,$Col1c_title,$astf,$astc);

						} else if($Col1c_style == 'cont') {

							if (have_posts()) : while (have_posts()) : the_post();
echo '<div class="extracontent">';
the_content();
echo '</div>';
                            endwhile; else : endif;

						} else if($Col1c_style == 'html') {

							echo apply_filters('the_content', $Col1c_htmlbody);

						} else if($Col1c_style == 'ads') {
							box_ad($Col1c_adspot);

						}

            	}
					if($Col1d_enabled == '1'){
						$astc = $Col1d_cat;

						if ($Col1d_style == 'lead'){
							// box_lead($qty = 3,$theorder = 'date', $showthumb = 1, $thecat = 0, $theboxtitle = '0', $ast = 0, $astc = 0)

							box_lead($Col1d_qty,$Col1d_rotate,$Col1d_showthumb,$Col1d_cat,$Col1d_title,$Col1d_offset, $astf, $astc);

						} else if ($Col1c_style == 'mlead'){ 
							// box_multilead($qty = 1,$theorder = 'date', $showthumb = 1, $thecat = 0, $theboxtitle = '0', $ast = 0, $astc = 0)

							box_multilead($Col1d_qty,$Col1d_rotate,$Col1d_showthumb,$Col1d_cat,$Col1d_title,$Col1d_offset, $astf, $astc);

						} else if($Col1d_style == 'rota') {
							//function box_rota($qty = 6, $thecat = NULL){

							box_rota($Col1d_qty,$Col1d_offset, $astf, $astc, $Col1d_cat);

						} else if($Col1d_style == 'rotp') {

							// box_rotp($qty = 6, $thecat = NULL)

							box_rotp($Col1d_qty,$Col1d_offset, $astf, $astc, $Col1d_cat);						}

						else if($Col1d_style == 'art') {
							box_art($Col1d_qty,$Col1d_rotate,$Col1d_showthumb,$Col1d_cat,$Col1d_offset,$Col1d_title, $astf, $astc);

						} else if($Col1d_style == 'art2') {
							box_art_2($Col1d_qty,$Col1d_rotate,$Col1d_showthumb,$Col1d_cat,$Col1d_offset,$Col1d_title,$astf,$astc);

						} else if($Col1d_style == 'art3') {
							box_art_3($Col1d_qty,$Col1d_rotate,$Col1d_showthumb,$Col1d_cat,$Col1d_offset,$Col1d_title,$astf,$astc);

						} else if($Col1d_style == 'cont') {

							if (have_posts()) : while (have_posts()) : the_post();
echo '<div class="extracontent">';
the_content();
echo '</div>';
                            endwhile; else : endif;

						} else if($Col1d_style == 'html') {

							echo apply_filters('the_content', $Col1d_htmlbody);

						} else if($Col1d_style == 'ads') {
							box_ad($Col1d_adspot);

						}

            	}
						
			}
?>

		</div><!-- #primary-left -->

	
		<div id="primary-mid">

	
	<?php 


// box_lead_300($qty = 3,$theorder = 'date', $showthumb = 1, $thecat = 0, $ast = 0, $astc = 0)

// box_rota_300($qty = 6, $ast = 0, $astc = 0, $thecat = NULL)

// box_rotp_300($qty = 4, $ast = 0, $astc = 0, $thecat = NULL)

// box_art_300($qty = 4,$theorder = 'date', $showthumb = 1, $thecat = 0, $theboxtitle = 0, $ast = 0, $astc = 0 )


			if($Col2a_enabled == '1'){ 
						$astc = $Col2a_cat;

						if ($Col2a_style == 'lead'){ 
							box_lead_300($Col2a_qty,$Col2a_rotate,$Col2a_showthumb,$Col2a_cat,$Col2a_offset,$Col2a_title,$astf,$astc);

						} else if($Col2a_style == 'rota') { 
							box_rota_300($Col2a_qty,$Col2a_offset,$astf,$astc,$Col2a_cat);

						} else if($Col2a_style == 'rotp') {

							box_rotp_300($Col2a_qty,$Col2a_offset,$astf,$astc,$Col2a_cat);

						} else if($Col2a_style == 'art') { 
							box_art_300($Col2a_qty,$Col2a_rotate,$Col2a_showthumb,$Col2a_cat,$Col2a_offset,$Col2a_title,$astf,$astc);

						} else if($Col2a_style == 'cont') {

							if (have_posts()) : while (have_posts()) : the_post();

									echo '<div class="extracontent">';
the_content();
echo '</div>';

                            endwhile; else : endif;

						} else if($Col2a_style == 'html') {

							echo apply_filters('the_content', $Col2a_htmlbody);

						} else if($Col2a_style == 'ads') { 
							box_ad($Col2a_adspot);

						} else if($Col2a_style == 'hec') { 
							box_hec($Col2a_qty,$Col2a_offset,$astf,$astc,$Col2a_cat);

						}

            	}

			if($Col2b_enabled == '1'){ 
						$astc = $Col2b_cat;

						if ($Col2b_style == 'lead'){ 
							box_lead_300($Col2b_qty,$Col2b_rotate,$Col2b_showthumb,$Col2b_cat,$Col2b_offset,$Col2b_title,$astf,$astc);

						} else if($Col2b_style == 'rota') { 
							box_rota_300($Col2b_qty,$Col2b_offset,$astf,$astc,$Col2b_cat);

						} else if($Col2b_style == 'rotp') {

							box_rotp_300($Col2b_qty,$Col2b_offset,$astf,$astc,$Col2b_cat);

						} else if($Col2b_style == 'art') { 
							box_art_300($Col2b_qty,$Col2b_rotate,$Col2b_showthumb,$Col2b_cat,$Col2b_offset,$Col2b_title,$astf,$astc);

						} else if($Col2b_style == 'cont') {

							if (have_posts()) : while (have_posts()) : the_post();

									echo '<div class="extracontent">';
the_content();
echo '</div>';

                            endwhile; else : endif;

						} else if($Col2b_style == 'html') {

							echo apply_filters('the_content', $Col2b_htmlbody);

						} else if($Col2b_style == 'ads') { 
							box_ad($Col2b_adspot);

						}

            	}

			if($Col2c_enabled == '1'){ 
						$astc = $Col2c_cat;

						if ($Col2c_style == 'lead'){ 
							box_lead_300($Col2c_qty,$Col2c_rotate,$Col2c_showthumb,$Col2c_cat,$Col2c_offset,$Col2c_title,$astf,$astc);

						} else if($Col2c_style == 'rota') { 
							box_rota_300($Col2c_qty,$Col2c_offset,$astf,$astc,$Col2c_cat);

						} else if($Col2c_style == 'rotp') {

							box_rotp_300($Col2c_qty,$Col2c_offset,$astf,$astc,$Col2c_cat);

						} else if($Col2c_style == 'art') { 
							box_art_300($Col2c_qty,$Col2c_rotate,$Col2c_showthumb,$Col2c_cat,$Col2c_offset,$Col2c_title,$astf,$astc);

						} else if($Col2c_style == 'cont') {

							if (have_posts()) : while (have_posts()) : the_post();

									echo '<div class="extracontent">';
the_content();
echo '</div>';

                            endwhile; else : endif;

						} else if($Col2c_style == 'html') {

							echo apply_filters('the_content', $Col2c_htmlbody);

						} else if($Col2c_style == 'ads') { 
							box_ad($Col2c_adspot);

						}

            	} 
			if($Col2d_enabled == '1'){ 
						$astc = $Col2d_cat;

						if ($Col2d_style == 'lead'){ 
							box_lead_300($Col2d_qty,$Col2d_rotate,$Col2d_showthumb,$Col2d_cat,$Col2d_offset,$Col2d_title,$astf,$astc);

						} else if($Col2d_style == 'rota') { 
							box_rota_300($Col2d_qty,$Col2d_offset,$astf,$astc,$Col2d_cat);

						} else if($Col2d_style == 'rotp') {

							box_rotp_300($Col2d_qty,$Col2d_offset,$astf,$astc,$Col2d_cat);

						} else if($Col2d_style == 'art') { 
							box_art_300($Col2d_qty,$Col2d_rotate,$Col2d_showthumb,$Col2d_cat,$Col2d_offset,$Col2d_title,$astf,$astc);

						} else if($Col2d_style == 'cont') {

							if (have_posts()) : while (have_posts()) : the_post();

									echo '<div class="extracontent">';
the_content();
echo '</div>';

                            endwhile; else : endif;

						} else if($Col2d_style == 'html') {

							echo apply_filters('the_content', $Col2d_htmlbody);

						} else if($Col2d_style == 'ads') { 
							box_ad($Col2d_adspot);

						}

            	}



	?>

	</div><!-- #primary-mid -->


	<div class="clear"></div>

</div><!-- #primary-content -->


<?php

		if($tabs_enabled == '1' and $tabs_width == '3' ){ 
				box_tab_3($tab_1,$tab_2,$tab_3,$tab_4,$tab_5);

		}

	
  /* Call media slider if the number of entries are set greater than 0 on theme control panel 
$postnr = get_option('of_an_nr6') + get_option('of_an_nr7') + get_option('of_an_nr8') + get_option('of_an_nr9') + get_option('of_an_nr10');

if (intval($postnr) > 0 ) { include (TEMPLATEPATH . '/inc/mid-slider.php'); } */

?>


<?php get_footer(); ?>