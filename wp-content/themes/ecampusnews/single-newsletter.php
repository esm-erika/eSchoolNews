<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "container" div.
 *
 * @package WordPress
 * @subpackage FoundationPress
 * @since FoundationPress 1.0.0
 */

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width"/>
  <style>
/**********************************************
* Ink v1.0.5 - Copyright 2013 ZURB Inc        *
**********************************************/

/* Client-specific Styles & Reset */

#outlook a { 
  padding:0; 
} 

body{ 
  width:100% !important; 
  min-width: 100%;
  -webkit-text-size-adjust:100%; 
  -ms-text-size-adjust:100%; 
  margin:0; 
  padding:0;
  background-color: #666666;
}

.ExternalClass { 
  width:100%;
} 

.ExternalClass, 
.ExternalClass p, 
.ExternalClass span, 
.ExternalClass font, 
.ExternalClass td, 
.ExternalClass div { 
  line-height: 100%; 
} 

#backgroundTable { 
  margin:0; 
  padding:0; 
  width:100% !important; 
  line-height: 100% !important; 
}

img { 
  outline:none; 
  text-decoration:none; 
  -ms-interpolation-mode: bicubic;
  width: auto;
  max-width: 100%; 
  /*float: left; */
  /*clear: both;*/ 
  display: block;
}

center {
  width: 100%;
  /*min-width: 580px;*/
}

a img { 
  border: none;
}

p {
  margin: 0 0 0 10px;
}

table {
  border-spacing: 0;
  border-collapse: collapse;
}

td { 
  word-break: keep-all;
  -webkit-hyphens: none;
  -moz-hyphens: none;
  hyphens: none;
  border-collapse: collapse !important; 
}

table, tr, td {
  padding: 0;
  vertical-align: top;
  text-align: left;
}

hr {
  color: #d9d9d9; 
  background-color: #d9d9d9; 
  height: 1px; 
  border: none;
}

/* Responsive Grid */

table.body {
  height: 100%;
  width: 100%;
  background-color: #666666;
}

table.container, td.container {
  width: 580px;
  margin: 0 auto;
  text-align: inherit;
  background-color: #ffffff;
} 

table.row { 
  padding: 0px; 
  width: 100%;
  position: relative;
}

table.container table.row {
  display: block;
}

td.wrapper {
  padding: 10px 20px 0px 0px;
  position: relative;
}

table.columns,
table.column {
  margin: 0 auto;
}

table.columns td,
table.column td {
  padding: 0px 0px 10px; 
}

table.columns td.sub-columns,
table.column td.sub-columns,
table.columns td.sub-column,
table.column td.sub-column {
  padding-right: 10px;
}

td.sub-column, td.sub-columns {
  min-width: 0px;
}

table.row td.last,
table.container td.last {
  padding-right: 0px;
}

table.one { width: 30px; }
table.two { width: 80px; }
table.three { width: 130px; }
table.four { width: 180px; }
table.five { width: 230px; }
table.six { width: 280px; }
table.seven { width: 330px; }
table.eight { width: 380px; }
table.nine { width: 430px; }
table.ten { width: 480px; }
table.eleven { width: 530px; }
table.twelve { width: 580px; }

table.one center { min-width: 30px; }
table.two center { min-width: 80px; }
table.three center { min-width: 130px; }
table.four center { min-width: 180px; }
table.five center { min-width: 230px; }
table.six center { min-width: 280px; }
table.seven center { min-width: 330px; }
table.eight center { min-width: 380px; }
table.nine center { min-width: 430px; }
table.ten center { min-width: 480px; }
table.eleven center { min-width: 530px; }
table.twelve center { /*min-width: 580px;*/ }

table.one .panel center { min-width: 10px; }
table.two .panel center { min-width: 60px; }
table.three .panel center { min-width: 110px; }
table.four .panel center { min-width: 160px; }
table.five .panel center { min-width: 210px; }
table.six .panel center { min-width: 260px; }
table.seven .panel center { min-width: 310px; }
table.eight .panel center { min-width: 360px; }
table.nine .panel center { min-width: 410px; }
table.ten .panel center { min-width: 460px; }
table.eleven .panel center { min-width: 510px; }
table.twelve .panel center { min-width: 560px; }

.body .columns td.one,
.body .column td.one { width: 8.333333%; }
.body .columns td.two,
.body .column td.two { width: 16.666666%; }
.body .columns td.three,
.body .column td.three { width: 25%; }
.body .columns td.four,
.body .column td.four { width: 33.333333%; }
.body .columns td.five,
.body .column td.five { width: 41.666666%; }
.body .columns td.six,
.body .column td.six { width: 50%; }
.body .columns td.seven,
.body .column td.seven { width: 58.333333%; }
.body .columns td.eight,
.body .column td.eight { width: 66.666666%; }
.body .columns td.nine,
.body .column td.nine { width: 75%; }
.body .columns td.ten,
.body .column td.ten { width: 83.333333%; }
.body .columns td.eleven,
.body .column td.eleven { width: 91.666666%; }
.body .columns td.twelve,
.body .column td.twelve { width: 100%; }

td.offset-by-one { padding-left: 50px; }
td.offset-by-two { padding-left: 100px; }
td.offset-by-three { padding-left: 150px; }
td.offset-by-four { padding-left: 200px; }
td.offset-by-five { padding-left: 250px; }
td.offset-by-six { padding-left: 300px; }
td.offset-by-seven { padding-left: 350px; }
td.offset-by-eight { padding-left: 400px; }
td.offset-by-nine { padding-left: 450px; }
td.offset-by-ten { padding-left: 500px; }
td.offset-by-eleven { padding-left: 550px; }

td.expander {
  visibility: hidden;
  width: 0px;
  padding: 0 !important;
}

table.columns .text-pad,
table.column .text-pad {
  padding-left: 10px;
  padding-right: 10px;
}

table.columns .left-text-pad,
table.columns .text-pad-left,
table.column .left-text-pad,
table.column .text-pad-left {
  padding-left: 10px;
}

table.columns .right-text-pad,
table.columns .text-pad-right,
table.column .right-text-pad,
table.column .text-pad-right {
  padding-right: 10px;
}

h1.text-pad, h2.text-pad, h3.text-pad, h4.text-pad, h5.text-pad, h6.text-pad {
  padding-left: 10px;
  padding-right: 10px;
  padding-bottom: 10px;
}

/* Block Grid */

.block-grid {
  width: 100%;
  max-width: 580px;
}

.block-grid td {
  display: inline-block;
  padding:10px;
}

.two-up td {
  width:270px;
}

.three-up td {
  width:173px;
}

.four-up td {
  width:125px;
}

.five-up td {
  width:96px;
}

.six-up td {
  width:76px;
}

.seven-up td {
  width:62px;
}

.eight-up td {
  width:52px;
}

/* Alignment & Visibility Classes */

table.center, td.center {
  text-align: center;
}

h1.center,
h2.center,
h3.center,
h4.center,
h5.center,
h6.center {
  text-align: center;
}

span.center {
  display: block;
  width: 100%;
  text-align: center;
}

img.center {
  margin: 0 auto;
  float: none;
}



table.right, td.right {
  text-align: right;
}

h1.right,
h2.right,
h3.right,
h4.right,
h5.right,
h6.right {
  text-align: right;
}

span.right {
  display: block;
  width: 100%;
  text-align: right;
}

img.right {
  float: right !important;
  text-align: right;
}

.show-for-small,
.hide-for-desktop {
  display: none;
}

/* Typography */

body, table.body, h1, h2, h3, h4, h5, h6, p, td { 
  color: #222222;
  font-family: "Helvetica", "Arial", sans-serif; 
  font-weight: normal; 
  padding:0; 
  margin: 0;
  text-align: left; 
  line-height: 1.3;
}

h1, h2, h3, h4, h5, h6 {
  word-break: normal;
}

h1 {font-size: 40px;}
h2 {font-size: 36px;}
h3 {font-size: 32px;}
h4 {font-size: 28px;}
h5 {font-size: 24px;}
h6 {font-size: 18px;}
body, table.body, p, td {font-size: 14px;line-height:19px;}

p.lead, p.lede, p.leed {
  font-size: 18px;
  line-height:21px;
}

p { 
  margin-bottom: 10px;
}

small {
  font-size: 10px;
}

a {
  color: #2ba6cb; 
  text-decoration: none;
}

a:hover { 
  color: #2795b6 !important;
}

a:active { 
  color: #2795b6 !important;
}

a:visited { 
  color: #2ba6cb !important;
}

h1 a, 
h2 a, 
h3 a, 
h4 a, 
h5 a, 
h6 a {
  color: #2ba6cb;
}

h1 a:active, 
h2 a:active,  
h3 a:active, 
h4 a:active, 
h5 a:active, 
h6 a:active { 
  color: #2ba6cb !important; 
} 

h1 a:visited, 
h2 a:visited,  
h3 a:visited, 
h4 a:visited, 
h5 a:visited, 
h6 a:visited { 
  color: #2ba6cb !important; 
} 

/* Panels */

.panel {
  background: #f2f2f2;
  border: 1px solid #d9d9d9;
  padding: 10px !important;
}

.sub-grid table {
  width: 100%;
}

.sub-grid td.sub-columns {
  padding-bottom: 0;
}

/* Buttons */

table.button,
table.tiny-button,
table.small-button,
table.medium-button,
table.large-button {
  width: 100%;
  overflow: hidden;
}

table.button td,
table.tiny-button td,
table.small-button td,
table.medium-button td,
table.large-button td {
  display: block;
  width: auto !important;
  text-align: center;
  background: #2ba6cb;
  border: 1px solid #2284a1;
  color: #ffffff;
  padding: 8px 0;
}

table.tiny-button td {
  padding: 5px 0 4px;
}

table.small-button td {
  padding: 8px 0 7px;
}

table.medium-button td {
  padding: 12px 0 10px;
}

table.large-button td {
  padding: 21px 0 18px;
}

table.button td a,
table.tiny-button td a,
table.small-button td a,
table.medium-button td a,
table.large-button td a {
  font-weight: bold;
  text-decoration: none;
  font-family: Helvetica, Arial, sans-serif;
  color: #ffffff;
  font-size: 16px;
}

table.tiny-button td a {
  font-size: 12px;
  font-weight: normal;
}

table.small-button td a {
  font-size: 16px;
}

table.medium-button td a {
  font-size: 20px;
}

table.large-button td a {
  font-size: 24px;
}

table.button:hover td,
table.button:visited td,
table.button:active td {
  background: #2795b6 !important;
}

table.button:hover td a,
table.button:visited td a,
table.button:active td a {
  color: #fff !important;
}

table.button:hover td,
table.tiny-button:hover td,
table.small-button:hover td,
table.medium-button:hover td,
table.large-button:hover td {
  background: #2795b6 !important;
}

table.button:hover td a,
table.button:active td a,
table.button td a:visited,
table.tiny-button:hover td a,
table.tiny-button:active td a,
table.tiny-button td a:visited,
table.small-button:hover td a,
table.small-button:active td a,
table.small-button td a:visited,
table.medium-button:hover td a,
table.medium-button:active td a,
table.medium-button td a:visited,
table.large-button:hover td a,
table.large-button:active td a,
table.large-button td a:visited {
  color: #ffffff !important; 
}

table.secondary td {
  background: #e9e9e9;
  border-color: #d0d0d0;
  color: #555;
}

table.secondary td a {
  color: #555;
}

table.secondary:hover td {
  background: #d0d0d0 !important;
  color: #555;
}

table.secondary:hover td a,
table.secondary td a:visited,
table.secondary:active td a {
  color: #555 !important;
}

table.success td {
  background: #5da423;
  border-color: #457a1a;
}

table.success:hover td {
  background: #457a1a !important;
}

table.alert td {
  background: #c60f13;
  border-color: #970b0e;
}

table.alert:hover td {
  background: #970b0e !important;
}

table.radius td {
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
}

table.round td {
  -webkit-border-radius: 500px;
  -moz-border-radius: 500px;
  border-radius: 500px;
}

/* Outlook First */

body.outlook p {
  display: inline !important;
}

/*  Media Queries */

@media only screen and (max-width: 600px) {

  table[class="body"] tbody, table[class="body"] tbody tr {
    display: table !important;
    width: 100%;
  }

  table[class="body"] img {
    width: auto !important;
    height: auto !important;
  }

  table[class="body"] center {
    min-width: 0 !important;
  }

  table[class="body"] .container {
    width: 95% !important;
  }

  table[class="body"] .row {
    width: 100% !important;
    display: block !important;
  }

  table[class="body"] .wrapper {
    display: block !important;
    padding-right: 0 !important;
  }

  table[class="body"] .columns,
  table[class="body"] .column {
    table-layout: fixed !important;
    float: none !important;
    width: 100% !important;
    padding-right: 0px !important;
    padding-left: 0px !important;
    display: block !important;
  }

  table[class="body"] .wrapper.first .columns,
  table[class="body"] .wrapper.first .column {
    display: table !important;
  }

  table[class="body"] table.columns td,
  table[class="body"] table.column td {
    /*width: 100% !important;*/
    /*display: block !important;*/
  }

  table[class="body"] .columns td.one,
  table[class="body"] .column td.one { width: 8.333333%; }
  table[class="body"] .columns td.two,
  table[class="body"] .column td.two { width: 16.666666%; }
  table[class="body"] .columns td.three,
  table[class="body"] .column td.three { width: 25%; }
  table[class="body"] .columns td.four,
  table[class="body"] .column td.four { width: 33.333333%; }
  table[class="body"] .columns td.five,
  table[class="body"] .column td.five { width: 41.666666%; }
  table[class="body"] .columns td.six,
  table[class="body"] .column td.six { width: 50%; }
  table[class="body"] .columns td.seven,
  table[class="body"] .column td.seven { width: 58.333333%; }
  table[class="body"] .columns td.eight,
  table[class="body"] .column td.eight { width: 66.666666%; }
  table[class="body"] .columns td.nine,
  table[class="body"] .column td.nine { width: 75%; }
  table[class="body"] .columns td.ten,
  table[class="body"] .column td.ten { width: 83.333333%; }
  table[class="body"] .columns td.eleven,
  table[class="body"] .column td.eleven { width: 91.666666%; }
  table[class="body"] .columns td.twelve,
  table[class="body"] .column td.twelve { width: 100%; }

  table[class="body"] td.offset-by-one,
  table[class="body"] td.offset-by-two,
  table[class="body"] td.offset-by-three,
  table[class="body"] td.offset-by-four,
  table[class="body"] td.offset-by-five,
  table[class="body"] td.offset-by-six,
  table[class="body"] td.offset-by-seven,
  table[class="body"] td.offset-by-eight,
  table[class="body"] td.offset-by-nine,
  table[class="body"] td.offset-by-ten,
  table[class="body"] td.offset-by-eleven {
    padding-left: 0 !important;
  }

  table[class="body"] table.columns td.expander {
    width: 1px !important;
  }

  table[class="body"] .right-text-pad,
  table[class="body"] .text-pad-right {
    padding-left: 10px !important;
  }

  table[class="body"] .left-text-pad,
  table[class="body"] .text-pad-left {
    padding-right: 10px !important;
  }

  table[class="body"] .hide-for-small,
  table[class="body"] .show-for-desktop {
    display: none !important;
  }

  table[class="body"] .show-for-small,
  table[class="body"] .hide-for-desktop {
    display: inherit !important;
  }
}

</style>
<style>

table.facebook td {
  background: #3b5998;
  border-color: #2d4473;
}

table.facebook:hover td {
  background: #2d4473 !important;
}

table.twitter td {
  background: #00acee;
  border-color: #0087bb;
}

table.twitter:hover td {
  background: #0087bb !important;
}

table.google-plus td {
  background-color: #DB4A39;
  border-color: #CC0000;
}

table.google-plus:hover td {
  background: #CC0000 !important;
}

table.hr {
  /*max-width: 580px;*/
  /*min-width: 560px;*/
  width: 100%;
}

table.hr td {
  height: 1px;
  font-size: 1px; 
  line-height: 1px;
  background-color: #999999;
  width: 100%;
  padding: 0px;
}

h5 span {
  /*border-bottom: 1px solid #999999;*/
  /*padding-bottom: 5px;*/
  display: block;
}

h6 span {
  /*border-top: 1px solid #999999;*/
  /*border-bottom: 1px solid #999999;*/
  /*padding-top: 5px;*/
  /*padding-bottom: 5px;*/
  display: block;
}

.ad center {
  /*border-top: 1px solid #999999;*/
  /*border-bottom: 1px solid #999999;*/
}



.border-top {
  /*border-top: 1px solid #999999;*/
}

.template-label {
  color: #ffffff;
  font-weight: bold;
  font-size: 11px;
}

.callout .panel {
  background: #ECF8FF;
  border-color: #b9e5ff;
}

.header {
  background: #999999;
}

.footer {
  background: #ebebeb;
}

.footer h5 {
  padding-bottom: 10px;
}

table.columns .text-pad {
  padding-left: 10px;
  padding-right: 10px;
}

table.columns .left-text-pad {
  padding-left: 10px;
}

table.columns .right-text-pad {
  padding-right: 10px;
}

@media only screen and (max-width: 600px) {

  h5 {font-size: 36px !important;}
  h6 {font-size: 24px !important; line-height: 24px !important;}
  body, table.body, p, td {font-size: 21px;line-height:28px;}

  table[class="body"] .right-text-pad {
    padding-left: 10px !important;
  }

  table[class="body"] img.right-text-pad {
    padding-left: 0px !important;
    padding-bottom: 10px;
  }

  table[class="body"] .left-text-pad {
    padding-right: 10px !important;
  }

  table[class="body"] table.social td {
    text-align: center;
  }

  table[class="body"] table.social td h6,   table[class="body"] table.date td h6 {
    text-align: left !important;
  }

  table[class="body"] table.social td img {
    float: left;

  }
}

</style>
</head>
<body>

  <!-- This will appear as the preview text on email clients. -->

  <span style="display: none !important;">
    This is my preview text!
  </span>


  <!-- Begin BODY of Email Template -->

  <table class="body" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; height: 100%; width: 100%; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; background: #666666; margin: 0; padding: 0;" bgcolor="#666666">
    <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
      <td class="center" align="center" valign="top" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: center; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;">
    <center style="width: 100%;">

      <!-- Begin Container for Email Content -->

      <table class="container" width="580" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: inherit; width: 580px; background: #ffffff; margin: 0 auto; padding: 0;" bgcolor="#ffffff">
        <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
          <td style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top">

        <!-- Begin View In Browser Links and Social Media Links -->

        <table class="row viewinbrowser" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;">
          <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
            <td class="wrapper" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 20px 0px 0px;" align="left" valign="top">

          <table class="six columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 280px; margin: 0 auto; padding: 0;">
            <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
              <td class="text-pad" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">
            
            <?php 
              $taxonomy = 'publications';
              $terms = get_the_terms( $post->ID, $taxonomy);
              $term_id = $terms[0]->term_id;
              $term_slug = $terms[0]->slug;
              $term_name = $terms[0]->name;
            ?>
            <p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left"><small style="font-size: 10px;">
              <a href="<?php the_permalink(); ?>" target="_blank" style="color: #2ba6cb; text-decoration: none;">View in a web browser</a></small> | <small style="font-size: 10px;"><a href="mailto:someone@domain.com&amp;Subject=I thought you might like this&amp;Body=Latest <?php echo $term_name; ?> <?php the_permalink(); ?>" style="color: #2ba6cb; text-decoration: none;">Forward to a friend</a>
            </small></p>

          </td>
          <td class="expander" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
        </tr>
      </table>

    </td>
    <td class="wrapper last" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

      <table class="six columns social" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 280px; margin: 0 auto; padding: 0;">
        <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
          <td class="text-pad" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">
            <a href="http://www.twitter.com/ecampusnews" style="color: #2ba6cb; text-decoration: none;">
            <img border="0" src="http://www.ecampusnews.com/e/i/32x32-Circle-57-TW.png" alt="" name="Twitter" id="Twitter" title="" border="0" height="32" width="32" align="right" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;">
            </a>

            <a href="http://www.facebook.com/ecampusnews" style="color: #2ba6cb; text-decoration: none;">
            <img border="0" align="right" src="http://www.ecampusnews.com/e/i/32x32-Circle-57-FB.png" alt="" name="FB" id="FB" title="" border="0" height="32" width="32" class="text-pad" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;">
            </a>

            <?php 
              $taxonomy = 'publications';
              $terms = get_the_terms( $post->ID, $taxonomy);
              $term_id = $terms[0]->term_id;
              $term_slug = $terms[0]->slug;
              $term_name = $terms[0]->name;
            ?>

            <a href="mailto:someone@domain.com&amp;Subject=I thought you might like this&amp;Body=Latest <?php echo $term_name; ?> <?php the_permalink(); ?>" style="color: #2ba6cb; text-decoration: none;">
            <img border="0" align="right" src="http://www.eschoolnews.com/e/i/32x32-Circle-57-EM.png" alt="" name="FB" id="FB" title="" border="0" height="32" width="32" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;">
            </a>
          </td>
          <td class="expander" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
        </tr>
      </table>

  </td>
</tr>
</table>

<!-- End -->


<!-- Begin eSchool News Logo and Date -->

<table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;">
  <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
    <td class="wrapper" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 20px 0px 0px;" align="left" valign="top">


  <table class="six columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 280px; margin: 0 auto; padding: 0;">
    <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
    <td class="text-pad" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top"><img border="0" src="http://www.eschoolnews.com/e/i/eCNlogo-small.gif" alt="" title="eCampus News" name="Image_fb" height="27" width="167" align="left" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;"></td>
    <td class="expander" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
  </tr>
</table>

</td>

<td class="wrapper last" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

  <table class="six columns date" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 280px; margin: 0 auto; padding: 0;">
    <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
      <td align="right" class="right text-pad" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: bottom; text-align: right; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" valign="top">

        <span class="right" style="text-align: right; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: bold; line-height: 1.3; word-break: normal; font-size: 14px; margin: 0; padding: 0;" align="right"><?php the_field('newsletter_date'); ?></span>
      </td>
      <td class="expander" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
    </tr>
  </table>
</td>
</tr>
</table>

<!-- End -->


<!-- Begin Full Width Newsletter Logo -->

<table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;">
  <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
    <td class="wrapper last" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">
      <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;">
        <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
          <td class="text-pad" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

            <!-- Content here! -->

                            <?php 

                            $taxonomy = 'publications';
                            $terms = get_the_terms( $post->ID, $taxonomy);
                            $term_id = $terms[0]->term_id;
                            $term_slug = $terms[0]->slug;

                            $image = get_field('publication_logo', $taxonomy . '_' . $term_id);


                            // echo '<pre>';
                            // var_dump($term_slug);
                            // echo '</pre>';



                            if( !empty($image) ): ?>

                            <a href="<?php site_url(); ?>/publications/<?php echo $term_slug; ?>" style="color: #2ba6cb; text-decoration: none;">

                            <img border="0" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" style="display: block; outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%;" />

                            </a>
                          <?php endif; ?>

                        </td>

                        <td class="expander" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                      </tr>
                    </table>
                  </td>
                </tr>
              </table>

              <!-- End Masthead -->

              <?php if(get_field('newsletter_introduction')) { ?>

              <table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;">
                <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                  <td class="wrapper last" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">
                
                  <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;">
                      <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                        <td class="text-pad" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                          <?php the_field('newsletter_introduction'); ?>

                          <br><br>

                        

                    <center style="width: 100%;">

                    <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;">
                      <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                        <td height="1" bgcolor="#999999" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top">&nbsp;</td>
                      </tr>
                    </table>

                  </center>

                  </td>
                </tr>
              </table>

              </td>
                      </tr>
                  </table>


              <?php } ?>





              <!-- Begin TOP HEADLINES Section -->

              <!-- Begin Featured TOP HEADLINES -->



              <?php

                      // check if the repeater field has rows of data
              if( have_rows('newsletter_section') ):

                        // loop through the rows of data
                while ( have_rows('newsletter_section') ) : the_row(); ?>

              <table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;">
                <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                  <td class="wrapper last" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                    <?php if(get_sub_field('newsletter_section_title')) { ?>
                    <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;">
                      <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                        <td class="text-pad" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                          <span style="display: block; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: bold; text-align: left; line-height: 1.3; word-break: normal; font-size: 14px; margin: 0; padding: 0;" align="left">
                            <?php the_sub_field('newsletter_section_title'); ?>
                          </span>
                          

                            <center style="width: 100%;">

                              <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;">
                                <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                                  <td height="1" bgcolor="#999999" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top">&nbsp;</td>
                                </tr>
                              </table>

                            </center>

                          </td>
                        </tr>
                      </table>
                      <?php } ?>

                      <?php 

                      $image = get_sub_field('sponsored_section');

                      if( !empty($image) ): ?>

                      <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;">
                        <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                          <td class="text-pad" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                            Brought to you by: <img border="0" src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" align="right" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;" />

                          </td>
                          <td class="expander" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                        </tr>
                      </table>

                    <?php endif; ?>


                    <?php 

                    $posts = get_sub_field('article_newsletter');

                    if( $posts ): ?>

                    <?php foreach( $posts as $post): // variable must be called $post (IMPORTANT) ?>
                    <?php setup_postdata($post); ?>


                    <?php if( get_sub_field('remove_thumbnail') ) { ?>
                    <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;">
                      <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                        <td class="text-pad" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                          <?php if(get_sub_field('bullets')) {?>
                          <table width="100%">
                            <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                              <td width="15" style="width: 15px; vertical-align: top;"><img border="0" width="7" height="15" src="http://eschoolnews.esminc.staging.wpengine.com/files/2016/02/bullet.png" alt="bullet" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;" /></td>
                              <td>

                                <?php } ?>

                                <h6 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 20px; margin: 0; padding: 0;" align="left">

                                  <?php if(get_sub_field('custom_link_newsletter')) { ?>
                                  <a href="<?php the_sub_field('custom_link_newsletter'); ?>?ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" style="color: #2ba6cb; text-decoration: none;">
                                    <?php } else { ?>
                                    <a href="<?php the_permalink(); ?>?ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" style="color: #2ba6cb; text-decoration: none;">
                                      <?php } ?>  
                                      <?php the_title(); ?>
                                    </a>

                                  </h6>

                                  <?php if(get_sub_field('hr_newsletter')) { ?>
                                  <center style="width: 100%;">
                                    <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;">
                                      <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                                        <td height="1" bgcolor="#cccccc" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top">&nbsp;</td>
                                      </tr>
                                    </table>
                                  </center>
                                  <?php } ?>

                                  <?php if(get_sub_field('exclude_excerpt')) { 

                                    echo '';

                                  } else { ?>

                                  <p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left">
                                    <?php 
                                    echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 30, $more = '&hellip;' ), true); 
                                    ?>
                                  </p>

                                  <?php } ?>

                                  <?php if(get_sub_field('bullets')) {?>
                                </td>
                              </tr>
                            </table>
                            <?php } ?>



                          </td>
                        </tr>
                      </table>



                      <?php } else { ?>



                      <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;">
                        <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                          <td class="text-pad" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                            <h6 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 20px; margin: 0; padding: 0;" align="left">
                              <?php if(get_sub_field('custom_link_newsletter')) { ?>
                              <a href="<?php the_sub_field('custom_link_newsletter'); ?>?ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" style="color: #2ba6cb; text-decoration: none;">
                                <?php } else { ?>
                                <a href="<?php the_permalink(); ?>?ps=!*EMAIL*!-!*AccountID*!-!*ContactID*!" style="color: #2ba6cb; text-decoration: none;">
                                  <?php } ?>  
                                  <?php the_title(); ?>
                                </a>
                              </h6>

                              <?php if(get_sub_field('hr_newsletter')) { ?>
                              <center style="width: 100%;">
                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;">
                                  <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                                    <td height="1" bgcolor="#cccccc" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top">&nbsp;</td>
                                  </tr>
                                </table>
                              </center>
                              <?php } ?>

                            </td>
                          </tr>
                        </table>

                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;">
                          <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                            <td class="four sub-columns left-text-pad" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; min-width: 0px; width: 33.333333%; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                              <?php 

                              the_post_thumbnail('newsletter-thumb'); 

                              ?>

                            </td>

                            <td class="eight sub-columns right-text-pad" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; min-width: 0px; width: 66.666666%; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px 0px;" align="left" valign="top">
                              <?php if(get_sub_field('exclude_excerpt')) { 

                                echo '';

                              } else { ?>

                              <p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left">
                                <?php 
                                echo balanceTags(wp_trim_words( get_the_excerpt(), $num_words = 30, $more = '&hellip;' ), true); 
                                ?>
                              </p>


                              <?php } ?>



                            </td>
                            <td class="expander" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr>
                        </table>

                        <?php } ?>


                        <?php if(get_sub_field('ad_newsletter')) { ?>

                        <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;">
                          <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                            <td class="text-pad center" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: center; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="center" valign="top">
                              <br>
                              <center style="width: 100%;">
                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;">
                                  <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                                    <td height="1" bgcolor="#cccccc" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top">&nbsp;</td>
                                  </tr>
                                </table>
                              </center>
                              <br>
                              <center style="width: 100%;">
                                <?php the_sub_field('ad_newsletter'); ?>
                              </center>
                              <br>
                              <center style="width: 100%;">
                                <table class="hr" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; padding: 0;">
                                  <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                                    <td height="1" bgcolor="#cccccc" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 1px; font-size: 1px; height: 1px; width: 100%; background: #999999; margin: 0; padding: 0px;" align="left" valign="top">&nbsp;</td>
                                  </tr>
                                </table>
                              </center>
                              <br>
                            </td>
                            <td class="expander" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                          </tr>
                        </table>
                        
                        <?php } ?>


                      <?php endforeach; ?>

                      <?php wp_reset_postdata(); // IMPORTANT - reset the $post object so the rest of the page works correctly ?>
                    <?php endif; ?>

                    

                  </td>
                </tr>
              </table>

              <?php 

              endwhile;

              else :

                          // no rows found

                endif;

              ?>

              <table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;">
                <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                  <td class="wrapper last" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                    <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;">
                      <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                        <td class="text-pad center" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: center; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="center" valign="top">
                          <a href="http://www.eschoolnews.com/current-issue/">
                            <img border="0" src="http://eschoolnews.esminc.staging.wpengine.com/files/2016/02/DigitalIssue550.jpg" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;"/>
                          </a>
                        </td>
                         <td class="expander" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                      </tr>
                    </table>

                  </td>
                </tr>
              </table>

              <!--  </td></tr></table> -->

              <!-- Begin FOOTER Section -->

              <table class="row footer" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; background: #ebebeb; padding: 0px;" bgcolor="#ebebeb">
                <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                  <td class="wrapper" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 20px 0px 0px;" align="left" valign="top">

                    <table class="six columns social" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 280px; margin: 0 auto; padding: 0;">
                      <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                        <td class="text-pad" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">

                          <h6 style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 1.3; word-break: normal; font-size: 20px; margin: 0; padding: 0;" align="left">Connect With Us:</h6>

                          <p style="color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; text-align: left; line-height: 19px; font-size: 14px; margin: 0 0 10px; padding: 0;" align="left">eSchool News, 7920 Norfolk Ave Suite 900, Bethesda, MD 20814<br>
                            Phone: 301-913-0115 <br>
                            <a href="http://www.ecampusnews.com" style="color: #2ba6cb; text-decoration: none;">www.ecampusnews.com</a> <br>
                            <a href="mailto:custserv@ecampusnews.com" style="color: #2ba6cb; text-decoration: none;">custserv@ecampusnews.com</a>
                          </p>

                        </td>
                        <td class="expander" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                      </tr>
                    </table>

                  </td>
                  <td class="wrapper last" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                    <table class="six columns social" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 280px; margin: 0 auto; padding: 0;">
                      <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                        <td class="text-pad" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0px 10px 10px;" align="left" valign="top">
                          <a href="http://www.twitter.com/ecampusnews" style="color: #2ba6cb; text-decoration: none;">
                          <img border="0" src="http://www.ecampusnews.com/e/i/32x32-Circle-57-TW.png" alt="" name="Twitter" id="Twitter" title="" border="0" height="32" width="32" align="right" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;">
                          </a>

                          <a href="http://www.facebook.com/ecampusnews" style="color: #2ba6cb; text-decoration: none;">
                          <img border="0" align="right" src="http://www.ecampusnews.com/e/i/32x32-Circle-57-FB.png" alt="" name="FB" id="FB" title="" border="0" height="32" width="32" class="text-pad" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;">
                          </a>

                          <?php 
                            $taxonomy = 'publications';
                            $terms = get_the_terms( $post->ID, $taxonomy);
                            $term_id = $terms[0]->term_id;
                            $term_slug = $terms[0]->slug;
                            $term_name = $terms[0]->name;
                          ?>

                          <a href="mailto:someone@domain.com&amp;Subject=I thought you might like this&amp;Body=Latest <?php echo $term_name; ?> <?php the_permalink(); ?>" style="color: #2ba6cb; text-decoration: none;">
                          <img border="0" align="right" src="http://www.eschoolnews.com/e/i/32x32-Circle-57-EM.png" alt="" name="FB" id="FB" title="" border="0" height="32" width="32" style="outline: none; text-decoration: none; -ms-interpolation-mode: bicubic; width: auto; max-width: 100%; display: block;">
                          </a>
                        </td>
                        <td class="expander" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                      </tr>
                    </table>

                  </td>
                </tr>
              </table>

              <!-- End FOOTER Section -->


              <!-- Begin COPYRIGHT Section -->

              <table class="row" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 100%; position: relative; display: block; padding: 0px;">
                <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                  <td class="wrapper last" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; position: relative; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 10px 0px 0px;" align="left" valign="top">

                    <table class="twelve columns" style="border-spacing: 0; border-collapse: collapse; vertical-align: top; text-align: left; width: 580px; margin: 0 auto; padding: 0;">
                      <tr style="vertical-align: top; text-align: left; padding: 0;" align="left">
                        <td align="center">
                          <center style="width: 100%;">
                            <p style="text-align:center;"><small>Contents ©2015 eSchool Media. All rights reserved.</small></p>
                            <p style="text-align:center;"><a href="http://www.ecampusnews.com/privacy-policy/" style="color: #2ba6cb; text-decoration: none;">Privacy</a> | 

                            <?php if( has_term('it-campus-leadership', 'publications')) {

                              echo '<a href="http://www.ecampusnews.com/unsubscribe/?em=!*EMAIL*!&amp;list=205" target="_blank" style="color: #2ba6cb; text-decoration: none;">';

                            } elseif( has_term('ecampus-news-today', 'publications')) {

                              echo '<a href="http://www.ecampusnews.com/unsubscribe/?em=!*EMAIL*!&amp;" target="_blank" style="color: #2ba6cb; text-decoration: none;">';


                           } elseif( has_term('reinventing-higher-education', 'publications')) {

                              echo '<a href="http://www.ecampusnews.com/unsubscribe/?em=!*EMAIL*!&amp;list=200" target="_blank" style="color: #2ba6cb; text-decoration: none;">';
                          
                          } else {

                              echo '<a href="http://www.ecampusnews.com/unsubscribe/?em=!*EMAIL*!&amp;" target="_blank" style="color: #2ba6cb; text-decoration: none;">';

                          } ?>

                              Unsubscribe</a></p>

                          </center>
                        </td>
                        <td class="expander" style="word-break: keep-all; -webkit-hyphens: none; -moz-hyphens: none; hyphens: none; border-collapse: collapse !important; vertical-align: top; text-align: left; visibility: hidden; width: 0px; color: #222222; font-family: 'Helvetica', 'Arial', sans-serif; font-weight: normal; line-height: 19px; font-size: 14px; margin: 0; padding: 0;" align="left" valign="top"></td>
                      </tr>
                    </table>

                  </td>
                </tr>
              </table>

              <!--  End COPYRIGHT -->


            </td>
          </tr>
        </table>

        <!-- End CONTAINER -->


      </center>
    </td>
  </tr>
</table>

<!-- End BODY -->

<?php //wp_footer(); ?>

</body>
</html>
