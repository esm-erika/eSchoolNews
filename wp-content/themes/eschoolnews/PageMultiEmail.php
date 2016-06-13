<?php
/**
* Template Name: Multi Email template
*/

$post_id = $post->ID;

//newsletter name and site
$newsletter_name = get_post_meta($post_id, 'newsletter_name', true);

if ( in_array($newsletter_name, array('eSN Today','Innovation Weekly','Leading the Digital Leap','IT School Leadership'), true ) ) {
	$logo = 'erc_esnlogo.gif';
	$siteurl = 'http://www.eschoolnews.com/';
	$custserv = 'custserv@eschoolnews.com';
 }
elseif ( in_array($newsletter_name, array('eCN Today','Reinventing Higher Ed','IT Campus Leadership'), true ) ) {
	$logo = 'ecnLogo.gif';
	$siteurl = 'http://www.ecampusnews.com/';
	$custserv = 'custserv@ecampusnews.com';
 }
elseif($newsletter_name =='eClassroom News'){
	$logo = '';
	$siteurl = 'http://www.eclassroomnews.com/';
	$custserv = 'custserv@eclassroomnews.com';
	}
//top ad
$show_top_banner_enabled = get_post_meta($post_id, 'show_top_banner', true);

if($show_top_banner_enabled == 'yes'){ 
	$top_banner_ad = get_post_meta($post_id, 'top_banner_ad', true); 
}

//Intro?
$show_author_intro_enabled = get_post_meta($post_id, 'show_author_intro', true);
if($show_author_intro_enabled == 'Yes'){ 
	$author_intro = get_post_meta($post_id, 'author_intro', true); 
}

//Issue Date
$date_of_issue = get_post_meta($post_id, 'date_of_issue', true);

//pagename
$html_page_name = get_post_meta($post_id, 'html_page_name', true);


//First section or "top news"
$todays_top_news = get_post_meta($post_id, 'todays_top_news', true);
$toparray = explode(",", $todays_top_news);

$querytoparray = new WP_Query( array( 'posts_per_page' => '15','post_status' => 'any','post_type' => 'post', 'post__in' => $toparray, 'orderby' => 'post__in' ));

//ad in top section
$ad_in_top_news_enabled = get_post_meta($post_id, 'ad_in_top_news', true);
if($ad_in_top_news_enabled == 'yes'){ 
	$top_news_ad = get_post_meta($post_id, 'top_news_ad', true); 
}

//app of the week

$show_app_of_the_week_enabled = get_post_meta($post_id, 'show_app_of_the_week', true);

if($show_app_of_the_week_enabled == 'yes'){
	 
$app_of_the_week = get_post_meta($post_id, 'app_of_the_week', true);
$apparray = explode(",", $app_of_the_week);

$queryapparray = new WP_Query( array( 'posts_per_page' => '3','post_status' => 'any','post_type' => 'post', 'post__in' => $apparray, 'orderby' => 'post__in' ));



}

//funding_articles

$funding_articles = get_post_meta($post_id, 'funding_articles', true);
$fundarray = explode(",", $funding_articles);

$queryfundarray = new WP_Query( array( 'posts_per_page' => '3','post_status' => 'any','post_type' => 'post', 'post__in' => $fundarray, 'orderby' => 'post__in' ));

//trending today

$trending_today = get_post_meta($post_id, 'trending_today', true);
$trendarray = explode(",", $trending_today);
$querytrend = new WP_Query( array( 'posts_per_page' => '5','post_status' => 'any','post_type' => 'post', 'post__in' => $trendarray, 'orderby' => 'post__in' ));



//trend ads
$show_trending_ad_1 = get_post_meta($post_id, 'show_trending_ad_1', true);
if($show_trending_ad_1 == 'yes'){
	$trending_ad_1 = get_post_meta($post_id, 'trending_ad_1', true);
}
$show_trending_ad_2 = get_post_meta($post_id, 'show_trending_ad_2', true);
if($show_trending_ad_2 == 'yes'){
	$trending_ad_2 = get_post_meta($post_id, 'trending_ad_2', true);
}
$show_trending_ad_3 = get_post_meta($post_id, 'show_trending_ad_3', true);
if($show_trending_ad_3 == 'yes'){
	$trending_ad_3 = get_post_meta($post_id, 'trending_ad_3', true);
}



//marketing
$show_marketing_box = get_post_meta($post_id, 'show_marketing_box', true);
$marketing = get_post_meta($post_id, 'marketing', true);
//issue notice
$show_issue_notice = get_post_meta($post_id, 'show_issue_notice', true);
$issue_notice = get_post_meta($post_id, 'issue_notice', true);

$cc_roundtable = get_post_meta($post_id, 'cc_roundtable', true);

ob_start( );


?>


<!-- Inliner Build Version 4380b7741bb759d6cb997545f3add21ad48f010b -->
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width" />
  </head>
  <body style="width: 100% !important; min-width: 100%; -webkit-text-size-adjust: 100%; -ms-text-size-adjust: 100%; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; background: #666666; margin: 0; padding: 0;" bgcolor="#666666"><style type="text/css">
a:hover {
color: #2795b6 !important;
}
a:active {
color: #2795b6 !important;
}
a:visited {
color: #2ba6cb !important;
}
h1 a:active {
color: #2ba6cb !important;
}
h2 a:active {
color: #2ba6cb !important;
}
h3 a:active {
color: #2ba6cb !important;
}
h4 a:active {
color: #2ba6cb !important;
}
h5 a:active {
color: #2ba6cb !important;
}
h6 a:active {
color: #2ba6cb !important;
}
h1 a:visited {
color: #2ba6cb !important;
}
h2 a:visited {
color: #2ba6cb !important;
}
h3 a:visited {
color: #2ba6cb !important;
}
h4 a:visited {
color: #2ba6cb !important;
}
h5 a:visited {
color: #2ba6cb !important;
}
h6 a:visited {
color: #2ba6cb !important;
}
table.button:hover td {
background: #2795b6 !important;
}
table.button:visited td {
background: #2795b6 !important;
}
table.button:active td {
background: #2795b6 !important;
}
table.button:hover td a {
color: #fff !important;
}
table.button:visited td a {
color: #fff !important;
}
table.button:active td a {
color: #fff !important;
}
table.button:hover td {
background: #2795b6 !important;
}
table.tiny-button:hover td {
background: #2795b6 !important;
}
table.small-button:hover td {
background: #2795b6 !important;
}
table.medium-button:hover td {
background: #2795b6 !important;
}
table.large-button:hover td {
background: #2795b6 !important;
}
table.button:hover td a {
color: #ffffff !important;
}
table.button:active td a {
color: #ffffff !important;
}
table.button td a:visited {
color: #ffffff !important;
}
table.tiny-button:hover td a {
color: #ffffff !important;
}
table.tiny-button:active td a {
color: #ffffff !important;
}
table.tiny-button td a:visited {
color: #ffffff !important;
}
table.small-button:hover td a {
color: #ffffff !important;
}
table.small-button:active td a {
color: #ffffff !important;
}
table.small-button td a:visited {
color: #ffffff !important;
}
table.medium-button:hover td a {
color: #ffffff !important;
}
table.medium-button:active td a {
color: #ffffff !important;
}
table.medium-button td a:visited {
color: #ffffff !important;
}
table.large-button:hover td a {
color: #ffffff !important;
}
table.large-button:active td a {
color: #ffffff !important;
}
table.large-button td a:visited {
color: #ffffff !important;
}
table.secondary:hover td {
background: #d0d0d0 !important; color: #555;
}
table.secondary:hover td a {
color: #555 !important;
}
table.secondary td a:visited {
color: #555 !important;
}
table.secondary:active td a {
color: #555 !important;
}
table.success:hover td {
background: #457a1a !important;
}
table.alert:hover td {
background: #970b0e !important;
}
table.facebook:hover td {
background: #2d4473 !important;
}
table.twitter:hover td {
background: #0087bb !important;
}
table.google-plus:hover td {
background: #CC0000 !important;
}
@media only screen and (max-width: 600px) {
  table[class="body"] img {
    width: auto !important; height: auto !important;
  }
  table[class="body"] center {
    min-width: 0 !important;
  }
  table[class="body"] .container {
    width: 95% !important;
  }
  table[class="body"] .row {
    width: 100% !important; display: block !important;
  }
  table[class="body"] .wrapper {
    display: block !important; padding-right: 0 !important;
  }
  table[class="body"] .columns {
    table-layout: fixed !important; float: none !important; width: 100% !important; padding-right: 0px !important; padding-left: 0px !important; display: block !important;
  }
  table[class="body"] .column {
    table-layout: fixed !important; float: none !important; width: 100% !important; padding-right: 0px !important; padding-left: 0px !important; display: block !important;
  }
  table[class="body"] .wrapper.first .columns {
    display: table !important;
  }
  table[class="body"] .wrapper.first .column {
    display: table !important;
  }
  table[class="body"] table.columns td {
    width: 100% !important;
  }
  table[class="body"] table.column td {
    width: 100% !important;
  }
  table[class="body"] .columns td.one {
    width: 8.333333% !important;
  }
  table[class="body"] .column td.one {
    width: 8.333333% !important;
  }
  table[class="body"] .columns td.two {

    width: 16.666666% !important;
  }
  table[class="body"] .column td.two {
    width: 16.666666% !important;
  }
  table[class="body"] .columns td.three {
    width: 25% !important;
  }
  table[class="body"] .column td.three {
    width: 25% !important;
  }
  table[class="body"] .columns td.four {
    width: 33.333333% !important;
  }
  table[class="body"] .column td.four {
    width: 33.333333% !important;
  }
  table[class="body"] .columns td.five {
    width: 41.666666% !important;
  }
  table[class="body"] .column td.five {
    width: 41.666666% !important;
  }
  table[class="body"] .columns td.six {
    width: 50% !important;
  }
  table[class="body"] .column td.six {
    width: 50% !important;
  }
  table[class="body"] .columns td.seven {
    width: 58.333333% !important;
  }
  table[class="body"] .column td.seven {
    width: 58.333333% !important;
  }
  table[class="body"] .columns td.eight {
    width: 66.666666% !important;
  }
  table[class="body"] .column td.eight {
    width: 66.666666% !important;
  }
  table[class="body"] .columns td.nine {
    width: 75% !important;
  }
  table[class="body"] .column td.nine {
    width: 75% !important;
  }
  table[class="body"] .columns td.ten {
    width: 83.333333% !important;
  }
  table[class="body"] .column td.ten {
    width: 83.333333% !important;
  }
  table[class="body"] .columns td.eleven {
    width: 91.666666% !important;
  }
  table[class="body"] .column td.eleven {
    width: 91.666666% !important;
  }
  table[class="body"] .columns td.twelve {
    width: 100% !important;
  }
  table[class="body"] .column td.twelve {
    width: 100% !important;
  }
  table[class="body"] td.offset-by-one {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-two {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-three {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-four {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-five {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-six {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-seven {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-eight {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-nine {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-ten {
    padding-left: 0 !important;
  }
  table[class="body"] td.offset-by-eleven {
    padding-left: 0 !important;
  }
  table[class="body"] table.columns td.expander {
    width: 1px !important;
  }
  table[class="body"] .right-text-pad {
    padding-left: 10px !important;
  }
  table[class="body"] .text-pad-right {
    padding-left: 10px !important;
  }
  table[class="body"] .left-text-pad {
    padding-right: 10px !important;
  }
  table[class="body"] .text-pad-left {
    padding-right: 10px !important;
  }
  table[class="body"] .hide-for-small {
    display: none !important;
  }
  table[class="body"] .show-for-desktop {
    display: none !important;
  }
  table[class="body"] .show-for-small {
    display: inherit !important;
  }
  table[class="body"] .hide-for-desktop {
    display: inherit !important;
  }
  h5 {
    font-size: 36px !important;
  }
  h6 {
    font-size: 30px !important;
  }
  body {
    font-size: 21px; line-height: 28px;
  }
  table.body {
    font-size: 21px; line-height: 28px;
  }
  p {
    font-size: 21px; line-height: 28px;
  }
  td {
    font-size: 21px; line-height: 28px;
  }
  table[class="body"] .right-text-pad {
    padding-left: 10px !important;
  }
  table[class="body"] img.right-text-pad {
    padding-left: 0px !important; padding-bottom: 10px;
  }
  table[class="body"] .left-text-pad {
    padding-right: 10px !important;
  }
  table[class="body"] table.social td {
    text-align: center;
  }
  table[class="body"] table.social td h6 {
    text-align: left !important;
  }
  table[class="body"] table.date td h6 {
    text-align: left !important;
  }
  table[class="body"] table.social td img {
    float: left;
  }
}
</style>

  <!-- This will appear as the preview text on email clients. -->

  <span style="display: none !important;">
    <!-- add a text version -->
  </span>


  <!-- Begin BODY of Email Template -->

  <table class="body" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; height: 100%; width: 100%; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; background: #666666; margin: 0; padding: 0;" bgcolor="#666666"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="center" align="center" valign="top" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: center; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;">
        <center style="width: 100%;">

          <!-- Begin Container for Email Content -->

          <table class="container" width="580" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: inherit; width: 580px; background: #ffffff; margin: 0 auto; padding: 0;" bgcolor="#ffffff"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top">

                <!-- Begin View In Browser Links and Social Media Links -->

                <table class="row viewinbrowser" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 20px 0px 0px;" align="left" valign="top">

                      <table class="six columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 280px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                            <p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left"><small style="font-size: 10px;"><a href="<?php echo $siteurl; ?>eNews/<?php echo $html_page_name; ?>" target="_blank" style="color: #2ba6cb; text-decoration: none;">View in a web browser</a></small> | <small style="font-size: 10px;"><a href="mailto:someone@domain.com&amp;Subject=I thought you might like this&amp;Body=Latest Education Technology News <?php echo $siteurl; ?>eNews/<?php echo $html_page_name; ?>" style="color: #2ba6cb; text-decoration: none;">Forward to a friend</a></small></p>

                          </td>
                          <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                        </tr></table></td>
                    <td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                      <table class="six columns social" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 280px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                            <a href="http://twitter.com/eschoolnews" style="COLOR: #0072bc; TEXT-DECORATION: none" target="_blank"><img src="<?php echo $siteurl; ?>e/i/32x32-Circle-57-TW.png" alt="" name="Twitter" id="Twitter" title="" border="0" height="32" width="32" align="right" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;" /></a><a href="http://www.facebook.com/eSchoolNews" style="COLOR: #0072bc; TEXT-DECORATION: none" target="_blank"><img align="right" src="<?php echo $siteurl; ?>e/i/32x32-Circle-57-FB.png" alt="" name="FB" id="FB" title="" border="0" height="32" width="32" class="text-pad" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block; padding-left: 10px; padding-right: 10px;" /></a><a title="Email this" href="mailto:?to=&amp;subject=<?php echo $newsletter_name; ?>&amp;body=<?php echo $newsletter_name; ?> has been redesigned for easier, quicker navigation. %0D%0A%0D%0AI believe you would be interested.%0D%0A%0D%0A<?php echo $siteurl; ?>eNews/<?php echo $html_page_name; ?>%0D%0A%0D%0A" rel="nofollow" target="_blank"><img align="right" src="<?php echo $siteurl; ?>e/i/32x32-Circle-57-EM.png" alt="" name="EM" id="EM" title="" border="0" height="32" width="32" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;" /></a></td>
                          <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                        </tr></table></td>
                  </tr></table><!-- End --><!-- Begin eSchool News Logo and Date --><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 20px 0px 0px;" align="left" valign="top">

                      <table class="six columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 280px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top"><img border="0" src="<?php echo $siteurl; ?>e/i/<? echo $logo; ?>" alt="" title="" name="Image_fb" height="27" width="167" align="left" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;" id="Image_fb" /></td>
                          <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                        </tr></table></td>

                    <td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                      <table class="six columns date" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 280px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td align="right" class="right text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: right; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" valign="top">
                            <h6 class="right" style="text-align: right; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1.3; word-break: normal; font-size: 20px; margin: 0; padding: 0;" align="right"><?php echo $date_of_issue; ?></h6>
                          </td>
                          <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                        </tr></table></td>
                  </tr></table><!-- End --><!-- Begin Full Width Newsletter Logo --><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">
                      <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                            <!-- Content here! -->
<img border="0" width="580" src="<?php echo $siteurl; ?>e/i/<?php 
if($newsletter_name =='eSN Today'){echo 'eSNToday.png';}
elseif($newsletter_name =='Innovation Weekly'){echo 'InnovationWeekly.png';}
elseif($newsletter_name =='Leading the Digital Leap'){echo 'digital-leap.png';}
elseif($newsletter_name =='IT School Leadership'){echo 'school-it-leadership.png';}
elseif($newsletter_name =='eCN Today'){echo 'ecampus-news-today.png';}
elseif($newsletter_name =='Reinventing Higher Ed'){echo 'reinventing-highered.png';}
elseif($newsletter_name =='IT Campus Leadership'){echo 'it-campus-leadership.png';}
elseif($newsletter_name =='eClassroom News'){echo 'email_header_eclassroom.gif';}
?>" alt="Innovation Weekly" title="<?php echo $newsletter_name;?>" style="display: block; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%;" />
                            
                            
                            </td>

                          <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                        </tr></table></td>
                  </tr></table><!-- End Masthead --><!-- Begin TOP HEADLINES Section --><!-- Begin Featured TOP HEADLINES -->
                  
                  




<?php 
if($newsletter_name =='eSN Today' or $newsletter_name =='eCN Today'){


?>

                  
                  <table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">
<?php // if author intro
if($show_author_intro_enabled == 'Yes'){
 ?>
<table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">
                              <p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left"><?php echo $author_intro; ?></p>

                            </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table>
<?php } ?>

<?php 
//if ( in_array($newsletter_name, array('IT Campus Leadership','IT School Leadership'), true ) ) {  //supress the who top of the email and jump to the trending section.
 ?>



                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                            <h5 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 24px; margin: 0; padding: 0;" align="left">
                              <span style="display: block;"><?php 

if ( in_array($newsletter_name, array('eSN Today','eCN Today'), true ) ) {
	echo "TODAY'S TOP NEWS";
 }
if ( in_array($newsletter_name, array('Innovation Weekly','Leading the Digital Leap','Reinventing Higher Ed'), true ) ) {
	echo 'Top Headlines';
 }
elseif ( in_array($newsletter_name, array('IT Campus Leadership','IT School Leadership'), true ) ) {
	echo 'Trending IT Headlines';
 }
elseif($newsletter_name =='eClassroom News'){echo 'Top News Stories';}							  
							  
							  
							  
							  ?></span></h5>

                              <center style="width: 100%;">

                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>

                            </td>
                          </tr></table>

</td>
                    </tr></table><!-- End --><!-- Begin TOP HEADLINES Article -->
                    
<?php //This is the first story title 

$count = 1;

if ( $querytoparray->have_posts() ) {
    while ( $querytoparray->have_posts() ) {

	$postid = get_the_ID();
	$querytoparray->the_post(); ?>
   <?php if ( in_array($newsletter_name, array('eSN Today','eCN Today'), true ) and $count < 3 ) { ?>
    
 <table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">                   
                    
                    
<table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                              <h6 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 20px; margin: 0; padding: 0;" align="left"><a href="<?php echo $siteurl.'?p='.$postid ?>&ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" name="feature1hed" target="_blank" class="style6" id="feature1hed" style="text-decoration: none; color: #0072BC;"><?php the_title(); ?></a></h6>
                            </td>
                          </tr></table>                    
                    
  </td></tr></table>
  

  
 <table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;">
 <tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 20px 0px 0px;" align="left" valign="top">
<?php if (has_post_thumbnail() ){ ?>
                        <table class="four columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 180px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="left-text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 0px 10px 10px;" align="left" valign="top">


   <?php  the_post_thumbnail('176 x 103', array( 'align' => 'left', 'style' => 'outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;' )); ?>

                               </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table>
<?php } //END if thumb ?>                          
                          
                          </td>

                      <td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <table class="eight columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 380px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="right-text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px 0px;" align="left" valign="top">

                              <p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left"><?php  print string_limit_words(get_the_excerpt(), 44); ?> </p>

                            </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table></td>
              </tr></table>
<?php                     
	$count++;
	
	} else {
	
if($count == 3){
	
	?>
<!-- End TOP HEADLINES Featured Article --><!-- Begin TOP HEADLINES w/o Photo --><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top"> <?php } 
						//aaaaaaaa
						
						?>
                        
                        
                        
                        
                              <h6 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 20px; margin: 0; padding: 0;" align="left"><span style="display: block;"><a href="<?php echo $siteurl.'?p='.$postid ?>&ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" name="feature1hed" target="_blank" class="style6" id="feature1hed" style="text-decoration: none; color: #0072BC;"><?php the_title(); ?></a></span></h6>

                              <center style="width: 100%;">

                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>

<?php                    	
		
	$count++;
	}//end today no image 3+
	
  } 
  
if($count > 2){

?>
</td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table></td>
                    </tr></table><!-- End TOP HEADLINES Section -->

<?php	
	
	
}  
  
  
} ?>

	
                 
                    
 <?php if($ad_in_top_news_enabled == 'yes') { ?>
		

                    
                    
                    
              <!-- Begin Ad --><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad center" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: center; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="center" valign="top">
                              <center style="width: 100%;">
                              <?php echo $top_news_ad; ?>                              </center>
                            </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table></td>
                    </tr></table><!-- End Ad -->
<?php	} ?>                    
                    
<?php 
if($show_app_of_the_week_enabled == 'yes'){ 

?>
 <!-- Begin APP OF THE WEEK Section --><!-- Begin APP OF THE WEEK Header --><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                              <h5 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 24px; margin: 0; padding: 0;" align="left">
                                <span style="display: block;">App of the Week</span>                                       
                              </h5>

                              <center style="width: 100%;">

                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>

                            </td>
                          </tr></table></td>
                    </tr></table>
                   
                    
                    <!-- End --><!-- Begin APP OF THE WEEK Sponsor Subheader --><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top">

                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                              Brought to you by: <img src="<?php echo $siteurl; ?>e/i/CommonSense_graphite_logo.png" align="right" height="44" width="121" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;" /></td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table></td>
                    </tr></table><!-- End -->
<?
$count = 1;
if ( $queryapparray->have_posts() ) {
    while ( $queryapparray->have_posts() ) 
 $queryapparray->the_post(); ?>    



<!-- Begin APP OF THE WEEK Article --><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top"> <h6 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 20px; margin: 0; padding: 0;" align="left"><a href="<?php echo $siteurl.'?p='.$postid ?>&ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" name="feature1hed" target="_blank" id="feature1hed" style="color: #0072bc; text-decoration: none;"><?php the_title(); ?></a></h6></td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table>
                          
                      
                          
                          <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="four sub-columns left-text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; min-width: 0px; width: 33.333333%; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">
                              
        <?php echo get_the_post_thumbnail($postid, '176 x 103', array( 'align' => 'left', 'style' => 'outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;')); ?>                    
   <?php // WHY IS THIS NOT WORKING in the loop??  the_post_thumbnail($postid,'176 x 103', array( 'align' => 'left', 'style' => 'outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;' )); ?>
                              
                             </td>

                          <td class="eight sub-columns right-text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; min-width: 0px; width: 66.666666%; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px 0px;" align="left" valign="top">
                         
                              <p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left"><?php  print string_limit_words(get_the_excerpt(), 44); ?></p>
                            </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table>













                        
<?	
$count++;
}



}


//} //End Trending 

?> 

                    <!-- Begin TRENDING THIS WEEK Section --><!-- Begin TRENDING THIS WEEK Headline --><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">


                              <h5 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 24px; margin: 0; padding: 0;" align="left"><span style="display: block;">
<?php 
if ( in_array($newsletter_name, array('eSN Today','eCN Today'), true ) ) {
echo 'Trending Today';
 }
elseif ( in_array($newsletter_name, array('IT Campus Leadership','IT School Leadership'), true ) ) {
?>

<?php
 }
elseif ( in_array($newsletter_name, array('Reinventing Higher Ed','Innovation Weekly','Leading the Digital Leap','eClassroom News'), true ) ) {
	echo 'Trending This Week';
 }




?>
</span></h5>

                              <center style="width: 100%;">

                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>

                            </td>
                          </tr></table></td>
                    </tr></table><!-- End --><!-- Begin TRENDING THIS WEEK Articles --><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <!-- Start Article -->
<?php





// The Loop
$count = 1;
if ( $querytrend->have_posts() ) {
    while ( $querytrend->have_posts() ) { ?>
<?php $querytrend->the_post(); ?>    

                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                              <h6 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 20px; margin: 0; padding: 0;" align="left"><a href="<?php echo $siteurl.'?p='.$postid ?>&ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" name="feature1hed" target="_blank" class="style6" id="feature1hed" style="text-decoration: none; color: #0072BC;"><?php the_title(); ?></a></h6>
<?php 


if ( in_array($newsletter_name, array('eCN Today','IT School Leadership','IT Campus Leadership'), true ) ) {

//if($newsletter_name =='eCN Today'){
	 ?>
                              <p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left"><?php  print string_limit_words(get_the_excerpt(), 44); ?></p>
<?php if ( in_array($newsletter_name, array('IT School Leadership','IT Campus Leadership'), true ) ) {  

if($show_trending_ad_1 == 'yes' && $count == 1){
	echo $trending_ad_1;
}

if($show_trending_ad_2 == 'yes' && $count == 2){
	echo $trending_ad_2;
}

if($show_trending_ad_3 == 'yes' && $count == 3){
	echo $trending_ad_3;
}



} ?> 
<?php }
elseif($newsletter_name =='eSN Today'){
?>

<center style="width: 100%;"><table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center> 
<?php
	
	
	}



// ${"show_trending_ad_" . $count} show_trending_ad_1  $count
// trending_ad_1  $count   ${'a' . 'b'}




 ?>                            
                            </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table>
<?	
	$count++;
	}
}
?>                          
                          
                          
                          
                          
                          
                          </td>
                    </tr></table><!-- End TRENDING THIS WEEK Articles --><!-- End TRENDING THIS WEEK Section --><!-- Start GRANT OF THE WEEK Section --><!-- Start GRAND OF THE WEEK Header -->

                  
                  <!-- End GRANT OF THE WEEK --><!-- Start PAID CONTENT -->
                  
                  
<?php if($show_marketing_box == 'Yes'){echo $marketing;} ?>
<?php if($show_issue_notice == 'Yes'){echo $issue_notice;} ?>
                  
                  
                  
                  <!-- End PAID CONTENT Section --><!-- Start VIEW ISSUE Section --><!-- End VIEW ISSUE Section -->

<?php

	
}

if($newsletter_name =='IT School Leadership' or $newsletter_name =='IT Campus Leadership'){


?>

<table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">
<?php // if author intro
if($show_author_intro_enabled == 'Yes'){
 ?>
<table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">
                              <p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left"><?php echo $author_intro; ?></p>

                            </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table>
<?php } ?>

</td>
</tr></table><!-- End -->                


                    <!-- Begin TRENDING THIS WEEK Section --><!-- Begin TRENDING THIS WEEK Headline --><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">


                              <h5 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 24px; margin: 0; padding: 0;" align="left"><span style="display: block;">Trending IT Headlines</span></h5>

                              <center style="width: 100%;">

                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>

                            </td>
                          </tr></table></td>
                    </tr></table><!-- End --><!-- Begin TRENDING THIS WEEK Articles --><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <!-- Start Article -->
<?php





// The Loop
$count = 1;
if ( $querytrend->have_posts() ) {
    while ( $querytrend->have_posts() ) { ?>
<?php

$postid = get_the_ID();
	$querytrend->the_post(); 
	?>

    
 <table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">                   
                    
                    
<table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                              <h6 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 20px; margin: 0; padding: 0;" align="left"><a href="<?php echo $siteurl.'?p='.$postid ?>&ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" name="feature1hed" target="_blank" class="style6" id="feature1hed" style="text-decoration: none; color: #0072BC;"><?php the_title(); ?></a></h6>
                            </td>
                          </tr></table>                    
                    
  </td></tr></table>
  

  
 <table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;">
 <tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 20px 0px 0px;" align="left" valign="top">
<?php if (has_post_thumbnail() ){ ?>
                        <table class="four columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 180px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="left-text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 0px 10px 10px;" align="left" valign="top">


   <?php  the_post_thumbnail('176 x 103', array( 'align' => 'left', 'style' => 'outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;' )); ?>

                               </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table>
<?php } //END if thumb ?>                          
                          
                          </td>

                      <td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <table class="eight columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 380px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="right-text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px 0px;" align="left" valign="top">

                              <p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left"><?php  print string_limit_words(get_the_excerpt(), 44); ?> </p>

                            </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table></td>
              </tr></table>
                              <center style="width: 100%;">

                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>              
<?php                     


if($show_trending_ad_1 == 'yes' && $count == 1){
	echo '<br><center style="width: 100%;">'.$trending_ad_1.'</center><br>';
?>
                              <center style="width: 100%;">

                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>
<?php	
}

if($show_trending_ad_2 == 'yes' && $count == 2){
	echo '<br><center style="width: 100%;">'.$trending_ad_2.'</center><br>';
?>
                              <center style="width: 100%;">

                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>
<?php	
}

if($show_trending_ad_3 == 'yes' && $count == 3){
	echo '<br><center style="width: 100%;">'.$trending_ad_3.'</center><br>';
?>
                              <center style="width: 100%;">

                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>
<?php	
}



	$count++;
	}
}
?>                          
                          
                          
                          
                          
                          
                          </td>
                    </tr></table><!-- End TRENDING THIS WEEK Articles --><!-- End TRENDING THIS WEEK Section --><!-- Start GRANT OF THE WEEK Section --><!-- Start GRAND OF THE WEEK Header -->

                  
                  <!-- End GRANT OF THE WEEK --><!-- Start PAID CONTENT -->
                  
                  
<?php if($show_marketing_box == 'Yes'){echo $marketing;} ?>
<?php if($show_issue_notice == 'Yes'){echo $issue_notice;} ?>
                  
                  
                  
                  <!-- End PAID CONTENT Section --><!-- Start VIEW ISSUE Section --><!-- End VIEW ISSUE Section -->

<?php





	
}

if($newsletter_name =='Leading the Digital Leap'){

$count = 1;

if ( $querytoparray->have_posts() ) {
    while ( $querytoparray->have_posts() ) {

	$postid = get_the_ID();
	$querytoparray->the_post(); ?>
               
<center style="width: 100%;">

                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>   
 <table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">                   
                    
                    
<table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                              <h6 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 20px; margin: 0; padding: 0;" align="left"><a href="<?php echo $siteurl.'?p='.$postid ?>&ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" name="feature1hed" target="_blank" class="style6" id="feature1hed" style="text-decoration: none; color: #0072BC;"><?php the_title(); ?></a></h6>
                            </td>
                          </tr></table>                    
                    
  </td></tr></table>
  

  
 <table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;">
 <tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 20px 0px 0px;" align="left" valign="top">
<?php if (has_post_thumbnail() ){ ?>
                        <table class="four columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 180px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="left-text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 0px 10px 10px;" align="left" valign="top">


   <?php  the_post_thumbnail('176 x 103', array( 'align' => 'left', 'style' => 'outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;' )); ?>

                               </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table>
<?php } //END if thumb ?>                          
                          
                          </td>

                      <td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <table class="eight columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 380px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="right-text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px 0px;" align="left" valign="top">

                              <p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left"><?php  print string_limit_words(get_the_excerpt(), 44); ?> </p>

                            </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table></td>
              </tr></table>
<?php                     
	$count++;
	}//end today no image 3+
	
  } 




?>















<table border="0" cellpadding="20" cellspacing="0" width="530" class="flexibleContainer">
                                                    <tbody><tr>
                                                      <td valign="middle" width="530" class="flexibleContainerCell">
                                                        <h3 style="text-align: left; color: rgb(19, 53, 60); line-height: 125%; font-family: Helvetica,Arial,sans-serif; font-size: 20px; font-weight: bold; margin-top: 0px; margin-bottom: 3px;" 
                       >In partnership with</h3><br><!-- CONTENT TABLE // -->
                                                            <table align="left" border="0" cellpadding="0" cellspacing="0" width="100%">
                                                                <tbody><tr>
                                                                    <td align="center" valign="middle" class="flexibleContainerBox">
                                                                        <table border="0" cellpadding="0" cellspacing="0" width="125" style="max-width: 100%;">
                                                                            <tbody><tr>
                                                                                <td align="left" class="textContent">
                                                                                    <a href="http://www.aasa.org/" target="_blank"><img src="http://www.eschoolnews.com/files/2015/02/aasa_logo_color.gif" width="125" class="flexibleImage" style="max-width: 100%;" alt   ="The School Superintendents Association" title="The School Superintendents Association" 
                                target="_blank"></a>                                                                                </td>
                                                                            </tr>
                                                                        </tbody></table>
                                                                    </td>
                                                                    <td align="center" valign="middle" class="flexibleContainerBox">
                                                                        <table class="flexibleContainerBoxNext" border="0" cellpadding="0" cellspacing="0" width="125" style="max-width: 100%;">
                                                                            <tbody><tr>
                                                                                <td align="left" class="textContent">
                                                                                    <a href="http://cosn.org/" target="_blank"><img src="http://www.eschoolnews.com/files/2015/02/CoSN_Logo_SML.gif" width="125" class="flexibleImage" style="max-width: 100%;" alt    ="CoSN - Leading Education Innovation" title="CoSN - Leading Education Innovation" 
                                target="_blank"></a>                                                                                </td>
                                                                            </tr>
                                                                        </tbody></table>
                                                                    </td>
                                                                    <td align="center" valign="middle" class="flexibleContainerBox">
                                                                        <table class="flexibleContainerBoxNext" border="0" cellpadding="0" cellspacing="0" width="125" style="max-width: 100%;">
                                                                            <tbody><tr>
                                                                                <td align="left" class="textContent">
                                                                                    <a href="http://www.nsba.org/" target="_blank"><img src="http://www.eschoolnews.com/files/2015/02/NSBA_Logo2013.jpg" width="125" class="flexibleImage" style="max-width: 100%;" alt   ="National School Boards Association" title="National School Boards Association" 
                               ></a>                                                                                </td>
                                                                            </tr>
                                                                        </tbody></table>
                                                                    </td>                                                                    
                                                                </tr>
                                                            </tbody></table>
                                                            <p><!-- // CONTENT TABLE -->
                                                        </p>
                                                            <p>&nbsp;</p>
                                                            <p>&nbsp;</p>
                                                   </td>
                                                    </tr>
                                                </tbody></table>




<table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">                       <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">                            <table style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad panel sub-grid" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; background: #f2f2f2; margin: 0; padding: 10px; border: 1px solid #d9d9d9;" align="left" bgcolor="#f2f2f2" valign="top">                                                                    <h6 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 20px; margin: 0; padding: 0;" align="left">Leading the Digital Leap</h6>                                  


<p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left">Leading the Digital Leap is a partnership of the AASA, CoSN, and NSBA to share and create our collective knowledge, resources, and networks to help school system leaders inform and strengthen their digital advocacy. For more information, <a href="http://leaddigitalleap.org/" target="_blank">click here</a>.<br><br>@LeadDigitalLeap</p>



                                  </td>                             </tr></table></td>                             <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>                           </tr></table></td>                     </tr></table>


             


	
<?php	
	
	
// if($show_marketing_box == 'Yes'){echo $marketing;} 
// if($show_issue_notice == 'Yes'){echo $issue_notice;} 
}


if($newsletter_name =='Reinventing Higher Ed'){

//intro
?>
<table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">
<?php // if author intro

if($show_author_intro_enabled == 'Yes'){
 ?>
<table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">
                              <p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left"><?php echo $author_intro; ?></p>

                            </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table>
<?php } ?>




                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top"></td>
                          </tr></table>

</td>
                    </tr></table>

<!-- Begin TOP HEADLINES Article -->
<?php




$count = 1;

if ( $querytoparray->have_posts() ) {
    while ( $querytoparray->have_posts() ) {

	$postid = get_the_ID();
	$querytoparray->the_post(); ?>
               
<center style="width: 100%;">

                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>   
 <table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">                   
                    
                    
<table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                              <h6 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 20px; margin: 0; padding: 0;" align="left"><a href="<?php echo $siteurl.'?p='.$postid ?>&ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" name="feature1hed" target="_blank" class="style6" id="feature1hed" style="text-decoration: none; color: #0072BC;"><?php the_title(); ?></a></h6>
                            </td>
                          </tr></table>                    
                    
  </td></tr></table>
  

  
 <table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;">
 <tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 20px 0px 0px;" align="left" valign="top">
<?php if (has_post_thumbnail() ){ ?>
                        <table class="four columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 180px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="left-text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 0px 10px 10px;" align="left" valign="top">


   <?php  the_post_thumbnail('176 x 103', array( 'align' => 'left', 'style' => 'outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;' )); ?>

                               </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table>
<?php } //END if thumb ?>                          
                          
                          </td>

                      <td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <table class="eight columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 380px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="right-text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px 0px;" align="left" valign="top">

                              <p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left"><?php  print string_limit_words(get_the_excerpt(), 44); ?> </p>

                            </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table></td>
              </tr></table>
<?php                     
	$count++;
	}//end today no image 3+
	
  } 
















?>
<table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">


                              <h5 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 24px; margin: 0; padding: 0;" align="left"><span style="display: block;">Community College Roundtable</span></h5>

                              <center style="width: 100%;">

                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>

                            </td>
                          </tr></table> 
                          
<table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">
<p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left"><?php echo $cc_roundtable;
?></p>                            </td>
                          </tr></table>                          
                          
<?php




	
//TRENDING THIS WEEK	
?>

<table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">


                              <h5 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 24px; margin: 0; padding: 0;" align="left"><span style="display: block;">TRENDING THIS WEEK</span></h5>

                              <center style="width: 100%;">

                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>

                            </td>
                          </tr></table></td>
                    </tr></table>

<table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <!-- Start Article -->
<?php





// The Loop
$count = 1;
if ( $querytrend->have_posts() ) {
    while ( $querytrend->have_posts() ) { ?>
<?php

$postid = get_the_ID();
	$querytrend->the_post(); 
	?>

    
 <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                              <h6 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 20px; margin: 0; padding: 0;" align="left"><a href="<?php echo $siteurl.'?p='.$postid ?>&ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" name="feature1hed" target="_blank" class="style6" id="feature1hed" style="text-decoration: none; color: #0072BC;"><?php the_title(); ?></a></h6>
<?php 





	 ?>
                              <p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left"><?php  print string_limit_words(get_the_excerpt(), 44); ?></p>
<?php if ( in_array($newsletter_name, array('IT School Leadership','IT Campus Leadership'), true ) ) {  

if($show_trending_ad_1 == 'yes' && $count == 1){
	echo $trending_ad_1;
}

if($show_trending_ad_2 == 'yes' && $count == 2){
	echo $trending_ad_2;
}

if($show_trending_ad_3 == 'yes' && $count == 3){
	echo $trending_ad_3;
}



 ?> 
<?php } ?>
                         
                            </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table> 
<?php                          

	$count++;
	}
}
?>                          
                          
                          
                          
                          
                          
                          </td>
                    </tr></table>
<?php
//two ad blocks	

 if($show_marketing_box == 'Yes'){echo $marketing;} 
 if($show_issue_notice == 'Yes'){echo $issue_notice;} 
	
}



if($newsletter_name =='Innovation Weekly'){
//aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa
?>

                  
                  <table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">
<?php // if author intro
if($show_author_intro_enabled == 'Yes'){
 ?>
<table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">
                              <p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left"><?php echo $author_intro; ?></p>

                            </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table>
<?php } ?>

                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                            <h5 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 24px; margin: 0; padding: 0;" align="left">
                              <span style="display: block;">Top Headlines</span></h5>

                              <center style="width: 100%;">

                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>

                            </td>
                          </tr></table>

</td>
                    </tr></table><!-- End --><!-- Begin TOP HEADLINES Article -->
                    
<?php //This is the first story title 

$count = 1;

if ( $querytoparray->have_posts() ) {
    while ( $querytoparray->have_posts() ) {

	$postid = get_the_ID();
	$querytoparray->the_post(); ?>

    
 <table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">                   
                    
                    
<table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                              <h6 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 20px; margin: 0; padding: 0;" align="left"><a href="<?php echo $siteurl.'?p='.$postid ?>&ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" name="feature1hed" target="_blank" class="style6" id="feature1hed" style="text-decoration: none; color: #0072BC;"><?php the_title(); ?></a></h6>
                            </td>
                          </tr></table>                    
                    
  </td></tr></table>
  

  
 <table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;">
 <tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 20px 0px 0px;" align="left" valign="top">
<?php if (has_post_thumbnail() ){ ?>
                        <table class="four columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 180px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="left-text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 0px 10px 10px;" align="left" valign="top">


   <?php  the_post_thumbnail('176 x 103', array( 'align' => 'left', 'style' => 'outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;' )); ?>

                               </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table>
<?php } //END if thumb ?>                          
                          
                          </td>

                      <td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <table class="eight columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 380px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="right-text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px 0px;" align="left" valign="top">

                              <p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left"><?php  print string_limit_words(get_the_excerpt(), 44); ?> </p>

                            </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table></td>
              </tr></table>
<center style="width: 100%;">

                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>              
<?php             
if($show_trending_ad_1 == 'yes' && $count == 1){
		echo '<center style="width: 100%;"><br />'.$trending_ad_1.'</center>';
?>	
<center style="width: 100%;">

                                <br /><table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>	
<?php	
}

if($show_trending_ad_2 == 'yes' && $count == 2){
	echo '<center style="width: 100%;"><br />'.$trending_ad_2.'</center>';
?>	
<center style="width: 100%;">

                                <br /><table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>	
<?php		
}

if($show_trending_ad_3 == 'yes' && $count == 3){
		echo '<center style="width: 100%;"><br />'.$trending_ad_3.'</center>';
?>	
<center style="width: 100%;">

                                <br /><table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>	
<?php		
}              

	
	$count++;
	}
   }


?> 

                    <!-- Begin TRENDING THIS WEEK Section --><!-- Begin TRENDING THIS WEEK Headline --><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">


                              <h5 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 24px; margin: 0; padding: 0;" align="left"><span style="display: block;">Trending This Week</span></h5>

                            </td>
                          </tr></table></td>
                    </tr></table><!-- End --><!-- Begin TRENDING THIS WEEK Articles --><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <!-- Start Article -->



                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

<?php
// The Loop
$count = 1;
if ( $querytrend->have_posts() ) {
    while ( $querytrend->have_posts() ) { ?>
<?php $querytrend->the_post(); ?>    



<?php /*
<center style="width: 100%;">

                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center> */ ?>


                              <h6 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 20px; margin: 0; padding: 0;" align="left">&middot;<a href="<?php echo $siteurl.'?p='.$postid ?>&ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" name="feature1hed" target="_blank" class="style6" id="feature1hed" style="text-decoration: none; color: #0072BC;"><?php the_title(); ?></a></h6>
                             
                           
                              
<?php 
/*
if($show_trending_ad_1 == 'yes' && $count == 1){
	echo $trending_ad_1;
}

if($show_trending_ad_2 == 'yes' && $count == 2){
	echo $trending_ad_2;
}

if($show_trending_ad_3 == 'yes' && $count == 3){
	echo $trending_ad_3;
} */







 ?>                            

<?	
	$count++;
	}
}
?>                          
                            </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table>                          
                          
                          
                          
                          
                          </td>
                    </tr></table><!-- End TRENDING THIS WEEK Articles --><!-- End TRENDING THIS WEEK Section -->
                    
<!-- App of the week --->                    
                    
<?php 
if($show_app_of_the_week_enabled == 'yes'){ 

?>
 <!-- Begin APP OF THE WEEK Section --><!-- Begin APP OF THE WEEK Header --><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                              <h5 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 24px; margin: 0; padding: 0;" align="left">
                                <span style="display: block;">App of the Week</span>                                       
                              </h5>

                              <center style="width: 100%;">

                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>

                            </td>
                          </tr></table></td>
                    </tr></table>
                   
                    
                    <!-- End --><!-- Begin APP OF THE WEEK Sponsor Subheader --><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top">

                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                              Brought to you by: <img src="<?php echo $siteurl; ?>e/i/CommonSense_graphite_logo.png" align="right" height="44" width="121" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;" /></td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table></td>
                    </tr></table><!-- End -->
<?
$count = 1;
if ( $queryapparray->have_posts() ) {
    while ( $queryapparray->have_posts() ) 
 $queryapparray->the_post(); ?>    



<!-- Begin APP OF THE WEEK Article --><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top"> <h6 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 20px; margin: 0; padding: 0;" align="left"><a href="<?php echo $siteurl.'?p='.$postid ?>&ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" name="feature1hed" target="_blank" id="feature1hed" style="color: #0072bc; text-decoration: none;"><?php the_title(); ?></a></h6></td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table>
                          
                      
                          
                          <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="four sub-columns left-text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; min-width: 0px; width: 33.333333%; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">
                              
        <?php echo get_the_post_thumbnail($postid, '176 x 103', array( 'align' => 'left', 'style' => 'outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;')); ?>                    
   <?php // WHY IS THIS NOT WORKING in the loop??  the_post_thumbnail($postid,'176 x 103', array( 'align' => 'left', 'style' => 'outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;' )); ?>
                              
                             </td>

                          <td class="eight sub-columns right-text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; min-width: 0px; width: 66.666666%; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px 0px;" align="left" valign="top">
                         
                              <p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left"><?php  print string_limit_words(get_the_excerpt(), 44); ?></p>
                            </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table>













                        
<?	
$count++;
}



} ?>                    
                    
                    <!-- Start GRANT OF THE WEEK Section --><!-- Start GRAND OF THE WEEK Header -->
<table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                            <h5 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 24px; margin: 0; padding: 0;" align="left">
                              <span style="display: block;">Funding News</span></h5>

                              <center style="width: 100%;">

                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; max-width: 580px; min-width: 560px; width: 100%; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td height="1" bgcolor="#cccccc" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top"> </td>
                                  </tr></table></center>

                            </td>
                          </tr></table>  
<?php                     
$count = 1;
if ( $queryfundarray->have_posts() ) {
    while ( $queryfundarray->have_posts() ) 
 $queryfundarray->the_post(); ?>    



<!-- Begin APP OF THE WEEK Article --><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top"> <h6 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 20px; margin: 0; padding: 0;" align="left"><a href="<?php echo $siteurl.'?p='.$postid ?>&ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" name="feature1hed" target="_blank" id="feature1hed" style="color: #0072bc; text-decoration: none;"><?php the_title(); ?></a></h6>


<p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left"><?php  print string_limit_words(get_the_excerpt(), 44); ?></p>                        
                        
                        </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table>
                          
                      
                          
                          













                        
<?	
$count++;
}
                        
     ?>                     
                                          
                  <!-- End GRANT OF THE WEEK --><!-- Start PAID CONTENT -->
                  
                  
                  
                  <!-- End PAID CONTENT Section --><!-- Start VIEW ISSUE Section --><!-- End VIEW ISSUE Section -->

<?php




//two ad blocks	

 if($show_marketing_box == 'Yes'){echo $marketing;} 
 if($show_issue_notice == 'Yes'){echo $issue_notice;} 	

//end innovation weekly

}





?>

                  
                 <!-- Begin FOOTER Section --><table class="row footer" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; background: #ebebeb; padding: 0px;" bgcolor="#ebebeb"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 20px 0px 0px;" align="left" valign="top">

                        <table class="six columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 280px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                              <h6 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 20px; margin: 0; padding: 0;" align="left">Connect With Us:</h6>

                              <p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left">eSchool News, 7920 Norfolk Ave Suite 900, Bethesda, MD 20814<br />
                                Phone: 301-913-0115 <br /><a href="<?php echo $siteurl ?>" style="color: #2ba6cb; text-decoration: none;"><?php echo $siteurl ?></a> <br /><a href="mailto:<?php echo $custserv; ?>" style="color: #2ba6cb; text-decoration: none;"><?php echo $custserv; ?></a>
                              </p>

                            </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table></td>
                      <td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <table class="six columns social" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 280px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="text-pad" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                            <a href="http://twitter.com/eschoolnews" style="COLOR: #0072bc; TEXT-DECORATION: none" target="_blank"><img src="<?php echo $siteurl; ?>e/i/32x32-Circle-57-TW.png" alt="" name="Twitter" id="Twitter" title="" border="0" height="32" width="32" align="right" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;" /></a><a href="http://www.facebook.com/eSchoolNews" style="COLOR: #0072bc; TEXT-DECORATION: none" target="_blank"><img align="right" src="<?php echo $siteurl; ?>e/i/32x32-Circle-57-FB.png" alt="" name="FB" id="FB" title="" border="0" height="32" width="32" class="text-pad" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block; padding-left: 10px; padding-right: 10px;" /></a><a title="Email this" href="mailto:?to=&amp;subject=<?php echo $newsletter_name; ?>&amp;body=<?php echo $newsletter_name; ?> has been redesigned for easier, quicker navigation. %0D%0A%0D%0AI believe you would be interested.%0D%0A%0D%0A<?php echo $siteurl; ?>eNews/<?php echo $html_page_name; ?>%0D%0A%0D%0A" rel="nofollow" target="_blank"><img align="right" src="<?php echo $siteurl; ?>e/i/32x32-Circle-57-EM.png" alt="" name="EM" id="EM" title="" border="0" height="32" width="32" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;" /></a></td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table></td>
                    </tr></table><!-- End FOOTER Section --><!-- Begin COPYRIGHT Section --><table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td class="wrapper last" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;"><tr style="vertical-align: top; text-align: left; padding: 0;" align="left"><td align="center" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 0px 10px;" valign="top">
                              <center style="width: 100%;">
                                <p style="text-align: center; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="center"><small style="font-size: 10px;">Contents ©2015 eSchool Media. All rights reserved.</small></p>
                                <p style="text-align: center; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="center"><a href="<?php echo $siteurl ?>terms/" style="color: #2ba6cb; text-decoration: none;">Terms</a> | <a href="<?php echo $siteurl ?>privacy/" style="color: #2ba6cb; text-decoration: none;">Privacy</a> | <a href="<?php echo $siteurl; ?>unsubscribe/?em=!*EMAIL*!&amp;list=100" target="_blank" style="color: #2ba6cb; text-decoration: none;">Unsubscribe</a></p>
                              </center>
                            </td>
                            <td class="expander" style="word-break: break-word; -webkit-hyphens: auto; -moz-hyphens: auto; hyphens: auto; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr></table></td>
                    </tr></table><!--  End COPYRIGHT --></td>
              </tr></table><!-- End CONTAINER --></center>
        </td>
      </tr></table><!-- End BODY --></body>
</html>



<?php 

$local_email_cache = ob_get_clean( );

if( current_user_can( 'edit_post' ) ) {
echo '<strong>This line and code shown to admins only, code follows the preview</strong>. If made live the "preview" will show as the live page, so it can be used as a web version.';
}
echo $local_email_cache;
if( current_user_can( 'edit_post' ) ) {
echo 'Copy into email:<br><textarea cols="80" rows="5">'.$local_email_cache.'</textarea>
<hr style="Padding-top:10px; padding-bottom:40px">
';

}








?>

