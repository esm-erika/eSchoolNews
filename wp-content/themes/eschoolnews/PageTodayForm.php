<?php
/**
* Template Name: Today Page Form
*
*/

$post_id = $post->ID;

$show_top_banner_enabled = get_post_meta($post_id, 'show_top_banner', true);

if($show_top_banner_enabled == 'yes'){ 
	$top_banner_ad = get_post_meta($post_id, 'top_banner_ad', true); 
}

$show_author_intro_enabled = get_post_meta($post_id, 'show_author_intro', true);

if($show_author_intro_enabled == 'yes'){ 
	$author_intro = get_post_meta($post_id, 'author_intro', true); 
}

$date_of_issue = get_post_meta($post_id, 'date_of_issue', true);

$ad_in_top_news_enabled = get_post_meta($post_id, 'ad_in_top_news', true);
if($ad_in_top_news_enabled == 'yes'){ 
	$top_news_ad = get_post_meta($post_id, 'top_news_ad', true); 
}

$show_app_of_the_week_enabled = get_post_meta($post_id, 'show_app_of_the_week', true);
if($show_app_of_the_week_enabled == 'yes'){ 
	$app_of_the_week = get_post_meta($post_id, 'app_of_the_week', true); 
}



$todays_top_news = get_post_meta($post_id, 'todays_top_news', true);
$html_page_name = get_post_meta($post_id, 'html_page_name', true);
$trending_today = get_post_meta($post_id, 'trending_today', true);
$show_marketing_box = get_post_meta($post_id, 'show_marketing_box', true);
$marketing = get_post_meta($post_id, 'marketing', true);
$show_issue_notice = get_post_meta($post_id, 'show_issue_notice', true);
$issue_notice = get_post_meta($post_id, 'issue_notice', true);
$innovation_corner = get_post_meta($post_id, 'innovation_corner', true);



$toparray = explode(",", $todays_top_news);
$topargs = array(
   'post__in' => $toparray
);

$aotwarray = explode(",", $app_of_the_week);
$appargs = array(
   'post__in' => $aotwarray
);



$innoarray = explode(",", $innovation_corner);
$innoargs = array(
   'post__in' => $innoarray
);

$trendarray = explode(",", $trending_today);
$trendargs = array(
   'post__in' => $trendarray
);

$today = date("mdy");
$longtoday = date("F j, Y");
global $theme_options, $newspaper; 
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>eSchool News - Today </title>
<!-- for Facebook -->          
<meta property="og:title" content="eSchool News - Innovation Weekly" />
<meta property="og:type" content="newsletter" />
<meta property="og:image" content="http://www.eschoolnews.com/files/2014/11/CUE.jpg" />
<meta property="og:url" content=http://www.eschoolnews.com/e/iw/InnovationWeekly11192014.html"" />
<meta property="og:description" content="We've redesigned our weekly newsletter for easier, quicker navigation. Welcome to the NEW eSchool News Innovation Weekly. Thank you for your continued support of eSchool News – Happy Reading!" />

<!-- for Twitter -->          
<meta name="twitter:card" content="summary" />
<meta name="twitter:title" content="eSchool News - Innovation Weekly" />
<meta name="twitter:description" content="Welcome to the NEW eSchool News Innovation Weekly." />
<meta name="twitter:image" content="http://www.eschoolnews.com/files/2014/11/CUE.jpg" />
<style type="text/css">
		/* Outlook link fix */
		#outlook a {padding:0;}
		/* Hotmail background and line height fixes */
		.ExternalClass {width:100% !important;}
		.ExternalClass, .ExternalClass p, .ExternalClass span, .ExternalClass font,
		.ExternalClass td, .ExternalClass div {line-height: 100%;}
		/* Image borders and formatting */
		img {outline:none; text-decoration:none; -ms-interpolation-mode: bicubic;} 
		a img {border:none;} 
		/* Re-style iPhone automatic links (eg. phone numbers) */
		.appleLinksBlack a {color:#000000; text-decoration: none;}
		.appleLinksWhite a {color:#ffffff; text-decoration: none;}
        .appleLinksGrey1 a {color: #545454; text-decoration: none;}
		.appleLinksGrey2 a {color: #585858; text-decoration: none;}
		/* Hotmail symbol fix for mobile devices */
		.ExternalClass img[class^=Emoji] { width: 10px !important; height: 10px !important; display: inline !important; } 
		
		/* Media Query for mobile */
			@media screen and (max-width: 480px) {	
		/* This resizes tables and images to be 100% wide with a proportionate width */
		table[class=emailwrapto100pc], img[class=emailwrapto100pc]{width:100% !important; height:auto !important;}

		table[class=emailwrapto100pc2], img[class=emailwrapto100pc2]{width:90% !important; height:auto !important;}
		
		/* Hide stuff on mobiles */
		table[class=emailnomob],td[class=emailnomob],img[class=emailnomob],span[class=emailnomob]{display:none !important;}
		
		td[class=emailcolsplit]{width:100%!important; float:left!important;}
		
		a[class=emailmobbutton]{display:block !important;font-size:14px !important; font-weight:bold !important; padding:6px 4px 8px 4px !important; line-height:16px !important; background:#dddddd !important; border-radius:5px !important; margin:10px auto;width:70%; text-align:center; color:#111 !important; text-decoration:none; text-shadow:#fff 1px 0 0 ;}

		/* This resizes body text for mobiles */
		span[class=emailbodytext],a[class=emailbodytext]{font-size:16px !important; line-height:21px !important;}
		span[class=emailh2],a[class=emailh2]{font-size:22px !important; line-height:26px !important;}
		
		}
		
		/* Additional Media Query for tablets */
		
		@media screen and (min-width: 480px) and (max-width: 520px) {
		
		/* Same as above */
		table[class=emailwrapto100pc], img[class=emailwrapto100pc]{width:100% !important; height:auto !important;}
		/* Hide stuff on tablets */
		table[class=emailnomob],td[class=emailnomob],img[class=emailnomob],span[class=emailnomob]{display:none !important;}
		
		/* Same as above - make the text larger on a tablet*/
		span[class=emailbodytext],a[class=emailbodytext]{font-size:16px !important; line-height:21px !important;}
		span[class=emailh2],a[class=emailh2]{font-size:22px !important; line-height:26px !important;}
		
		 /*Same as above - make links into buttons*/
		a[class=emailmobbutton]{display:block !important;font-size:14px !important; font-weight:bold !important; padding:6px 4px 8px 4px !important; line-height:16px !important; background:#dddddd !important; border-radius:5px !important; margin:10px auto;width:70%; text-align:center; color:#111 !important; text-decoration:none; text-shadow:#fff 1px 0 0 ;}

}

.style7 { font-size: 12px; }
.style6 { font-size: 12px; }
.style5 { font-size: 14px; }
.style8 { font-family: Arial, Helvetica, sans-serif; font-size: 9px; }
.style10 {
	font-size: 9px;
	font-weight: bold;
	font-family: Arial, Helvetica, sans-serif;
}
.style11 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style12 { font-size: 9px; font-weight: bold; }
</style>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body style="padding:0; margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:100%; background-color:#cccccc;FONT-FAMILY: Arial,Helvetica,sans-serif;" bgcolor="#cccccc">

<table border="0" cellspacing="0" cellpadding="0" width="100%" bgcolor="#666666" style="border-collapse: collapse;">
	<tr>
  	<td align="center" valign="top">

	<p>
		<?php if($show_top_banner_enabled == 'yes'){ 
		echo $top_banner_ad;
		}?>
	</p>


    <table width="540" border="0" cellspacing="0" cellpadding="0" class="emailwrapto100pc" style="border-collapse: collapse;" bgcolor="#ffffff">
      <tr>
        <td width="540" bgcolor="#ffffff" style="padding:10px;">

        	<table border="0" cellpadding="0" cellspacing="0" width="100%">
          		<tr>
            		<!-- <td valign="middle" width="1"></td> NOTE: Not sure what this empty table cell is for... -->
                    <td width="50%" align="center" valign="middle" class="style7">Is this email not displaying correctly?</td>
                    <td width="25%" align="center" valign="middle" class="style7">
                    	<a href="http://www.eschoolnews.com/eNews/<?php echo $html_page_name; ?>" target="_blank"  class="style7">View it in a web browser</a>
                    </td>
                    <td width="25%" rowspan="2" align="center" class="style7" >
                    	<a href="mailto:someone@domain.com&amp;Subject=I thought you might like this&amp;Body=Latest Education Technology News http://www.eschoolnews.com/eNews/<?php echo $html_page_name; ?>" class="style7">Forward to a friend</a>
                    </td>
              	</tr>

				<!-- Not sure what this was intended for as it's just an empty cell. Removed rowspan above.

				<tr>
            		<td align="center" valign="top" width="1" class="flexibleContainerCell">
              			// CONTENT TABLE
              		</td>
              	</tr> -->
          	</table>

			<!-- // Author Intro Enabled? -->
			<?php if($show_author_intro_enabled == 'yes'){ 

				echo '<table border="0" cellspacing="0" cellpadding="0" width="100%" style="border-collapse: collapse;"><tr><td>'. $author_intro . '</td></tr></table>';

 			} ?>
    
			<table border="0" cellspacing="0" cellpadding="0" width="100%" style="border-collapse: collapse;">
  				<tr>
    				<td>
						<a href="http://www.eschoolnews.com/?ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" style=" border:none"><img border="0" src="http://www.eschoolnews.com/eNews/esn_todayRed.jpg" alt="Innovation Weekly" title="eCampus News Today" class="emailwrapto100pc" style="display: block;" /></a></td>
       			</tr>
  				<tr>
    				<td align="right" style="padding-bottom: 5px;">
    						<span style="padding:0px; text-align: right;">
    							<strong style="font-family:Arial,Helvetica,sans-serif;font-size:21px !important; color:#666666"><?php echo $date_of_issue; ?></strong>
    						</span>
    				</td>
      			</tr>
  				<tr><td height="3"></td></tr> 
  			</table>

  
  			<table border="0" cellspacing="0" cellpadding="0" width="100%" style="border-collapse: collapse; margin-top:4px;border-bottom:1pt solid #ccc; margin-bottom:6px; ">
				<tr>
				  <td style="FONT-SIZE: 21px !important; FONT-FAMILY: Arial,Helvetica,sans-serif; COLOR: #666666;padding-left:10pt;"><strong>TODAY'S TOP NEWS</strong></td>
				 <td width="23%"
                valign="bottom" style="PADDING-BOTTOM: 0pt; TEXT-ALIGN:  right; PADDING-TOP: 0pt; PADDING-LEFT: 10pt; PADDING-RIGHT: 0pt"><span style="FONT-SIZE: 12px !important; FONT-FAMILY: Arial,Helvetica,sans-serif; COLOR: #666; LINE-HEIGHT: 16px"
                 > <strong>Share</strong> this issue <strong>&gt;&gt;</strong></span> </td>
				  <td align="right" style="FONT-SIZE: 20px !important; FONT-FAMILY: Arial,Helvetica,sans-serif; COLOR: #666666;">
				  	<!-- <a href="mailto:someone@domain.com&amp;Subject=I thought you might like this&amp;Body=Latest Education Technology News http://www.eschoolnews.com/eNews/<?php echo $html_page_name; ?>">
				  		<img src="http://www.ecampusnews.com/e/i/32x32-Circle-57-EM.png" alt="" name="Email" width="32"  height="32" border="0" id="Email" title="">
				  	</a>  -->

	<?php // echo $date_of_issue; ?> 			  	<!-- <strong>CONNECT WITH US</strong> -->
<a href="mailto:?to=&amp;subject=eSchool News Innovation Weekly&amp;body=eSchool News redesigned their weekly newsletter for easier, quicker navigation. The NEW eSchool News Innovation Weekly%0D%0A%0D%0AI believe you would be interested.%0D%0A%0D%0Ahttp://www.eschoolnews.com/eNews/<?php echo $html_page_name; ?>%0D%0A%0D%0A" title="Email this" target="_blank" rel="nofollow"><img src="http://www.eschoolnews.com/e/i/32x32-Circle-57-EM.png" alt="" name="Email" width="20"  height="20" border="0" id="Email" title="" /></a>
				  	<a href="https://www.facebook.com/eSchoolNews" style="TEXT-DECORATION: none; COLOR: #0072bc"target="_blank">
				  		<img src="http://www.ecampusnews.com/e/i/32x32-Circle-57-FB.png" alt="Facebook" name="FB" width="20" height="20" border="0" id="FB" title="" hspace="3" />
				  	</a> 
				  	<a href="https://twitter.com/eschoolnews" style="TEXT-DECORATION: none; COLOR: #0072bc" target="_blank">
				  		<img src="http://www.ecampusnews.com/e/i/32x32-Circle-57-TW.png" alt="" name="Twitter" width="20" height="20" border="0" id="Twitter" title="" hspace="3" />
				  	</a>
                    
                  
                    
                    
				  </td>
				</tr>
			</table>

<!-- aaaaaaaaaaaaaaaaaaaaaaaaaaaaa --->

 
<table border="0" cellspacing="0" cellpadding="0" width="90%" style="text-align: left;" align="center">
      
<?php
$querytoparray = new WP_Query( array( 'posts_per_page' => '5','post_status' => 'any','post_type' => 'post', 'post__in' => $toparray, 'orderby' => 'post__in' ));

// The Loop
$count = 1;
if ( $querytoparray->have_posts() ) {
    while ( $querytoparray->have_posts() ) { ?>
<?php

	$querytoparray->the_post(); ?>
   <?php if ($count == 1 or $count == 2){ ?>
   <tr>
   <td <?php if (has_post_thumbnail() ){ echo 'colspan="2"'; }?><?php  if ($count == 2){?> style="border-top:1pt solid #ccc;padding-top:5px;" <?php }?>>
   <strong style="font-family:Arial,Helvetica,sans-serif;font-size:16px!important;"><a href="<?php the_permalink(); ?>?ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" name="feature1hed" target="_blank" class="style5" style="text-decoration:none;color:#0072BC"><?php the_title(); ?></a></strong>
   </td>
   
   </tr>
   
   <tr>
    <?php if (has_post_thumbnail() ){ ?> 
		
        <td style="padding-top:5pt;padding-right:5px;padding-bottom:10px;padding-left:5px; text-align: left; margin-bottom:10px;">
        
       <a href="<?php the_permalink(); ?>?ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" style="text-decoration: none; color:#0072BC;" target="_blank"><?php the_post_thumbnail('176 x 103', array( 'align' => 'left', 'style' => 'border:1px solid #ccc' )); ?></a>
	    </td>        <td style="padding-top:5pt;padding-right:5px;padding-bottom:10px;padding-left:5px; text-align: left; margin-bottom:10px;">
		 <?php } else { ?> <td style="padding-top:5pt;padding-right:5px;padding-bottom:10px;padding-left:5px; text-align: left; margin-bottom:10px;">
         <?php } ?>
  <?php  } else { ?>

    <td colspan="2" style="padding-top:5pt;padding-right:5px;padding-bottom:10px;padding-left:5px; text-align: left; margin-bottom:10px;border-top:1pt solid #ccc">
   <strong style="font-family:Arial,Helvetica,sans-serif;font-size:16px!important;"><a href="<?php the_permalink(); ?>?ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" name="feature1hed" target="_blank" class="style6" style="text-decoration:none;color:#0072BC"><?php the_title(); ?></a></strong>
	   
   <?php }  ?>


<span class="style7" style="font-family:Arial,Helvetica,sans-serif;font-weight:normal;color:#000000!important;font-size:9pt!important;line-height:10pt!important"><?php $postid = get_the_ID(); $SubTitle=get_post_meta($postid, 'Sub Title', $single = true);
	if ($SubTitle != null) { echo '<h3>'.$SubTitle.'</h3>';} 
 if ($count == 1 or $count == 2){
	print string_limit_words(get_the_excerpt(), 44);		
 }
	?></span> 


<?	
	echo '</td></tr>';
	$count++;
	}

}


?>      
 <?php if($ad_in_top_news_enabled == 'yes') {
	 
		echo '<tr><td colspan="2" style="padding-top:5pt;padding-right:5px;padding-bottom:10px;padding-left:5px; text-align: left; margin-bottom:10px;border-top:1pt solid #ccc"><div align="center" style="padding-bottom:10px">';
		echo $top_news_ad;
		echo '</div></td></tr>';
	}     ?>    
 
	 
  </table>

<?php //app of the week  ?>
<?php if($show_app_of_the_week_enabled == 'yes') { ?>

  <table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td style="padding-top:0pt;padding-right:20pt;padding-bottom:0pt;padding-left:20pt; text-align: left;" valign="bottom">
        <strong style="font-family:Arial,Helvetica,sans-serif;font-size:21px!important; color:#666">APP OF THE WEEK</strong></td>
    </tr>
  </table>
  


<table border="0" cellspacing="0" cellpadding="0" width="95%" style="padding-bottom:20pt; text-align: left;" align="center">
      
      
<?php

$queryaotw = new WP_Query( array( 'posts_per_page' => '5','post_status' => 'any','post_type' => 'post', 'post__in' => $aotwarray, 'orderby' => 'post__in' ));

// The Loop
$count = 1;
if ( $queryaotw->have_posts() ) {
    while ( $queryaotw->have_posts() ) { ?>
  <tr>
       <td style="padding-top:5pt;padding-right:5px;padding-bottom:10px;padding-left:5px; text-align: left; margin-bottom:10px;border-top:1pt solid #ccc"
  <?php if (has_post_thumbnail() ){ echo 'colspan="2"'; }?>     
       
       >

<?php
	$queryaotw->the_post(); ?>
    
    <table width="100%"><tr>
    <td align="left" valign="top" style="TEXT-ALIGN: right; PADDING-BOTTOM: 0px; PADDING-LEFT: 20px; PADDING-RIGHT: 20px;" >
<span style="VERTICAL-ALIGN:top" class="style6">
Brought to you by</span></td>
    <td width="131" valign="bottom" style="PADDING-RIGHT: 20px; VERTICAL-ALIGN: bottom" 
                               ><img src="http://www.eschoolnews.com/e/i/CommonSense_graphite_logo.png" align="right" height="44" width="121"></td></tr>
</table>
    
      <strong style="font-family:Arial,Helvetica,sans-serif;font-size:16px!important;"><a href="<?php the_permalink(); ?>?ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" name="feature1hed" target="_blank" class="style5" style="text-decoration:none;color:#0072BC"><?php the_title(); ?></a></strong><br />
      
      
      
</td></tr>      
  <tr>
  <?php if (has_post_thumbnail() ){ ?>
  <td style="padding-top:5pt;padding-right:5px;padding-bottom:10px;padding-left:5px; text-align: left;">      
      
 
	   <a href="<?php the_permalink(); ?>?ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" style="color:#0072BC;" target="_blank"><?php the_post_thumbnail('thumbnail', array( 'align' => 'left', 'style' => 'border:1px solid #ccc; height:100px; width:100px ' )); ?></a>
 </td>
 <?php } ?>
 <td style="padding-top:5pt;padding-right:5px;padding-bottom:10px;padding-left:5px; text-align: left; margin-bottom:10px;" valign="top">
 
 <span class="style7" style="font-family:Arial,Helvetica,sans-serif;font-weight:normal;color:#000000!important;font-size:9pt!important;line-height:10pt!important"><?php $postid = get_the_ID(); $SubTitle=get_post_meta($postid, 'Sub Title', $single = true);
	the_excerpt();
	//print string_limit_words(get_the_excerpt(), 175);		
	?></span> 
       
       

<?	
	echo '</td></tr>';
	$count++;
	}

}


?>      
 
  </table>












  
  
  
<?php } ?>
<?php

$show_flexible_articles_enabled = get_post_meta($post_id, 'show_flexible_articles', true);
if($show_flexible_articles_enabled == 'yes'){ 
	 

$queryflex = new WP_Query( array( 'posts_per_page' => '5','post_status' => 'any','post_type' => 'post', 'post__in' => $innoarray, 'orderby' => 'post__in' )); 
// The Loop
$count = 1;
if ( $queryflex->have_posts() ) {

$show_flexible_articles_title = get_post_meta($post_id, 'flexible_articles_title', true);
if($show_flexible_articles_titled  != null){ ?> 

  <table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td style="padding-top:0pt;padding-right:20pt;padding-bottom:0pt;padding-left:20pt; text-align: left;" valign="bottom">
        <strong style="font-family:Arial,Helvetica,sans-serif;font-size:21px!important; color:#666"><?php echo $show_flexible_articles_titled ; ?></strong></td>
    </tr>
  </table>
<?php } ?>			
     

  
<table border="0" cellspacing="0" cellpadding="0" width="95%" style="padding-bottom:20pt; text-align: left;" align="center">
<?php

    
	while ( $queryflex->have_posts() ) { ?>
  <tr>
       <td style="padding-top:5pt;padding-right:5px;padding-bottom:10px;padding-left:5px; text-align: left; margin-bottom:10px;border-top:1pt solid #ccc">

<?php

	$queryflex->the_post(); ?>

      <strong style="font-family:Arial,Helvetica,sans-serif;font-size:16px!important;"><a href="<?php the_permalink(); ?>?ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" name="feature1hed" target="_blank" class="style6" style="text-decoration:none;color:#0072BC"><?php the_title(); ?></a></strong><br />

<?	
	echo '</td></tr>';
	$count++;
	}
echo '</table>';
}
}

?>      
 






  <table border="0" cellspacing="0" cellpadding="0" width="100%">
    <tr>
      <td style="padding-top:0pt;padding-right:20pt;padding-bottom:0pt;padding-left:20pt; text-align: left;" valign="bottom">
        <strong style="font-family:Arial,Helvetica,sans-serif;font-size:21px!important; color:#666">
          TRENDING TODAY </strong></td>
    </tr>
  </table>
  
<table border="0" cellspacing="0" cellpadding="0" width="95%" style="padding-bottom:20pt; text-align: left;" align="center">
      
      
<?php

$querytrend = new WP_Query( array( 'posts_per_page' => '5','post_status' => 'any','post_type' => 'post', 'post__in' => $trendarray, 'orderby' => 'post__in' ));



// The Loop
$count = 1;
if ( $querytrend->have_posts() ) {
    while ( $querytrend->have_posts() ) { ?>
  <tr>
        <td style="padding-top:5pt;padding-right:5px;padding-bottom:10px;padding-left:5px; text-align: left; margin-bottom:10px;border-top:1pt solid #ccc">

<?php

	$querytrend->the_post(); ?>

      <strong style="font-family:Arial,Helvetica,sans-serif;font-size:16px!important;"><a href="<?php the_permalink(); ?>?ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" name="feature1hed" target="_blank" class="style6" style="text-decoration:none;color:#0072BC"><?php the_title(); ?></a></strong><br />
<?php /*      
<span class="style7" style="font-family:Arial,Helvetica,sans-serif;font-weight:normal;color:#000000!important;font-size:9pt!important;line-height:10pt!important"><?php $postid = get_the_ID(); $SubTitle=get_post_meta($postid, 'Sub Title', $single = true);
	if ($SubTitle != null) { echo '<h3>'.$SubTitle.'</h3>';} else {

/* $content = get_the_content();
$pos = strpos($content, '<h3>', 0); 
$pos2 = strpos($content, '</h3>', 0); 
$substr = substr($content, $pos+4, $pos2-4);
echo $substr; *
print string_limit_words(get_the_excerpt(), 44);		
		}?></span> <?php /* <span class="style7" style="font-family:Arial, Helvetica, sans-serif;color:#000000!important;font-size:9pt!important;line-height:10pt!important"><strong><a href="<?php the_permalink(); ?>?ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" name="feature1hed" target="_blank" id="feature1hed" style="background:#C8C6C7;text-decoration:none; COLOR: #0072bc">READ&nbsp;MORE </a></strong></span> */ ?>


<?	
	echo '</td></tr>';
	$count++;
	}

}


?>      
      
      
      

  

  </table>
  
               
<?php if($show_marketing_box == 'Yes'){echo $marketing;} ?>

<?php if($show_issue_notice == 'Yes'){echo $issue_notice;} ?>


  <table border="0" cellspacing="0" cellpadding="0" width="100%" bgcolor="#ffffff">
    <tr>
      <td style="padding-top:10pt;padding-right:20pt;padding-bottom:0pt;padding-left:20pt; text-align: left;" valign="bottom">
        <a href="mailto:?to=&amp;subject=eSchool News Innovation Weekly&amp;body=eSchool News redesigned their weekly newsletter for easier, quicker navigation. The NEW eSchool News Innovation Weekly%0D%0A%0D%0AI believe you would be interested.%0D%0A%0D%0Ahttp://www.eschoolnews.com/eNews/<?php echo $html_page_name; ?>%0D%0A%0D%0A" title="Email this" target="_blank" rel="nofollow"><img src="http://www.eschoolnews.com/e/i/32x32-Circle-57-EM.png" alt="" name="Email" width="32"  height="32" border="0" id="Email" title="" /></a>
        <a href="http://www.facebook.com/eSchoolNews" style="text-decoration: none; color:#0072BC;" target="_blank"><img border="0"  src="http://www.eschoolnews.com/e/i/32x32-Circle-57-FB.png" alt="" title="" name="FB"  height="32" width="32" /></a>
        <a href="http://twitter.com/eschoolnews" style="text-decoration: none; color:#0072BC;" target="_blank"><img border="0"  src="http://www.eschoolnews.com/e/i/32x32-Circle-57-TW.png" alt="" title="" name="Twitter"  height="32" width="32" /></a>
        
        <br />    </td>
    </tr>
    <tr>
      <td style="padding-top:0pt;padding-right:20pt;padding-bottom:20pt;padding-left:20pt; text-align: left;">
        <hr style="margin-bottom:10pt;margin-top:0pt;border-top:medium none;border-bottom:1pt solid #ccc" /> 
        <span class="style7" style="font-family:Arial,Helvetica,sans-serif;font-weight:normal;color:#000!important;font-size:9pt!important;line-height:10pt!important">eSchool News, 7920 Norfolk Ave Suite 900,  Bethesda, MD 20814<br>
          Phone: 301-913-0115 <br>
  <a title="http://www.eschoolnews.com" href="http://www.eschoolnews.com/?ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!">www.eschoolnews.com</a><br>
  <a title="mailto" href="mailto:custserv@eschoolnews.com">custserv@eschoolnews.com</a><br>
          Contents &copy; 2015 eSchool Media. All rights reserved.<br />
  <br />
          You're receiving this newsletter at !*EMAIL*! because you've subscribed to our Newsletter. <a href="http://www.eschoolnews.com/unsubscribe/?em=!*EMAIL*!&amp;list=101&amp;ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" target="_blank">Unsubscribe</a></span>  </td>
    </tr>
  </table>
  

  <table border="0" cellspacing="0" cellpadding="0" width="100%">
    
    <tr><td></td></tr>
  </table>
		  

  <!-- foot -->              </td>
        </tr>
      </table>
          
   </td></tr>
</table>

                

</body>
</html>