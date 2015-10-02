<<<<<<< HEAD
<?php

 require( $_SERVER['DOCUMENT_ROOT'].'/wp-load.php' );

global $wpdb, $current_user;

$esml_pageid = $_GET['esmlp'];
$esml_pageadset = $_GET['esmlpa'];

//page
if (is_numeric($esml_pageid)) {
	$intNavID = $esml_pageid;
}
//adset
if (is_numeric($esml_pageadset)) {
	$intAdSetID = $esml_pageadset;
}

	$intUserID = $current_user->ID;

$dtDate = date('Ymd');
$dtVisit = date('Y-m-d H:i:s');
$siteprefix = $wpdb->prefix;
$querystr = $_SERVER['QUERY_STRING'];

//set or update cookie

if (!isset($_COOKIE["esml"]))
{
	if($intUserID == 0)
				
			{
				$cookieid = date("Ymdhis").rand(100000000,999999999);
				$cookieinfo = $cookieid.'0'; } 
		else 
			{
				$cookieid = date("Ymdhis").rand(100000000,999999999);
				$cookieinfo = $cookieid.$intUserID;}
	
	$wpuid = $intUserID;		
	
	setcookie("esml", $cookieinfo, time(U)+60*60*24*365*10,'/');

}else{

	$hbcook = $_COOKIE['esml'];//intval()

	$hbcook_cookieid = substr($hbcook, 0, 23);
	$hbcook_userid = substr($hbcook, 23, 100);
	$cookieid = $hbcook_cookieid;
	if($intUserID > 0)
	{
		$wpuid = $intUserID;	
		
			if ($hbcook_userid == 0){
				$cookieinfo = $hbcook_cookieid .  $wpuid;
				setcookie("esml", $cookieinfo, time(U)+60*60*24*365*10,'/');
				}
		
	} else {
		$wpuid = $hbcook_userid;
		
	}
} 

$wpdb->query( $wpdb->prepare("INSERT INTO esm_log_users (dtDate, dtVisit, wpuid, pageid, ercid, siteprefix, querystr, cookie) 
VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", $dtDate, $dtVisit, $wpuid, $intNavID, $intAdSetID, $siteprefix, $querystr, $cookieid) );

?>

=======
<?php

 require( $_SERVER['DOCUMENT_ROOT'].'/wp-load.php' );

global $wpdb, $current_user;

$esml_pageid = $_GET['esmlp'];
$esml_pageadset = $_GET['esmlpa'];

//page
if (is_numeric($esml_pageid)) {
	$intNavID = $esml_pageid;
}
//adset
if (is_numeric($esml_pageadset)) {
	$intAdSetID = $esml_pageadset;
}

	$intUserID = $current_user->ID;

$dtDate = date('Ymd');
$dtVisit = date('Y-m-d H:i:s');
$siteprefix = $wpdb->prefix;
$querystr = $_SERVER['QUERY_STRING'];

//set or update cookie

if (!isset($_COOKIE["esml"]))
{
	if($intUserID == 0)
				
			{
				$cookieid = date("Ymdhis").rand(100000000,999999999);
				$cookieinfo = $cookieid.'0'; } 
		else 
			{
				$cookieid = date("Ymdhis").rand(100000000,999999999);
				$cookieinfo = $cookieid.$intUserID;}
	
	$wpuid = $intUserID;		
	
	setcookie("esml", $cookieinfo, time(U)+60*60*24*365*10,'/');

}else{

	$hbcook = $_COOKIE['esml'];//intval()

	$hbcook_cookieid = substr($hbcook, 0, 23);
	$hbcook_userid = substr($hbcook, 23, 100);
	$cookieid = $hbcook_cookieid;
	if($intUserID > 0)
	{
		$wpuid = $intUserID;	
		
			if ($hbcook_userid == 0){
				$cookieinfo = $hbcook_cookieid .  $wpuid;
				setcookie("esml", $cookieinfo, time(U)+60*60*24*365*10,'/');
				}
		
	} else {
		$wpuid = $hbcook_userid;
		
	}
} 

$wpdb->query( $wpdb->prepare("INSERT INTO esm_log_users (dtDate, dtVisit, wpuid, pageid, ercid, siteprefix, querystr, cookie) 
VALUES (%s, %s, %s, %s, %s, %s, %s, %s)", $dtDate, $dtVisit, $wpuid, $intNavID, $intAdSetID, $siteprefix, $querystr, $cookieid) );

?>

>>>>>>> origin/master
