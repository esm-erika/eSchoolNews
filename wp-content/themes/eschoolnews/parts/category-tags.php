<?php 

global $cat;

if ( in_category('21st Century Skills')) {
	$categorytags = array(
		'tag' => 'communication,collaboration,creativity,innovation'
		);

} elseif ( in_category('Apps') || in_category('App of the Week')) {
	$categorytags = array(
		'tag' => 'ipad,apps,mobile learning'
		);

} elseif ( in_category('Blended Learning')){
	$categorytags = array(
		'tag' => 'online learning, hybrid learning, digital materials, online courses'
		);

} elseif ( in_category('Funding')){
	$categorytags = array(
		'tag' => 'grants, budgeting, scholarships, awards, contests'
		);

} elseif ( in_category('Innovation Corner')){
	$categorytags = array(
		'tag' => 'best practices, case studies, innovative teaching, innovative leadership'
		);

} elseif ( in_category('Mobile Learning')){
	$categorytags = array(
		'tag' => 'apps, tablets, ipads, chromebooks, laptops, one-to-one'
		);

} elseif ( in_category('Future Ready Schools')){
	$categorytags = array(
		'tag' => 'leadership, superintendents, principals, digital leap, digital instruction, vision'
		);

} elseif ( in_category('Policy')){
	$categorytags = array(
		'tag' => 'district and state policy, reports, research, planning'
		);

} elseif ( in_category('Professional Development')){
	$categorytags = array(
		'tag' => 'PD, training, workshops, conferences, online PD, leadership, learning'
		);

} elseif ( in_category('Research')){
	$categorytags = array(
		'tag' => 'reports, big data, statistics'
		);

} elseif ( in_category('School Administration')){
	$categorytags = array(
		'tag' => 'communication and collaboration,  stakeholder and community relations, 21st century leadership'
		);

} elseif ( in_category("Superintendent's Corner")){
	$categorytags = array(
		'tag' => 'future ready, digital leap, vision'
		);

} elseif ( in_category('IT Management')){
	$categorytags = array(
		'tag' => 'cloud computing, internet, CTOs, mobile device management'
		);

} elseif ( in_category('Network & Broadband')){
	$categorytags = array(
		'tag' => 'capacity, planning, internet, wi-fi'
		);

} elseif ( in_category('Safety & Security')){
	$categorytags = array(
		'tag' => 'cyberbullying, filtering, physical security, cyber security'
		);

} elseif ( in_category('Assessments')){
	$categorytags = array(
		'tag' => 'high-stakes, smarterbalanced, computer-based assessments, testing fatigue, scores, common core'
		);

} elseif ( in_category('Common Core')){
	$categorytags = array(
		'tag' => 'testing, aligned, math, english language arts'
		);

} elseif ( in_category('Digital Citizenship')){
	$categorytags = array(
		'tag' => 'safety, cyberbullying, digital literacy, social media'
		);

} elseif ( in_category('Digital Learning Tools')){
	$categorytags = array(
		'tag' => 'digital curriculum, web 2.0, apps, new products'
		);

} elseif ( in_category('Gaming STEM')){
	$categorytags = array(
		'tag' => 'collaboration, failure, risk-taking, gamification, game-based learning'
		);

} elseif ( in_category('Special Education')){
	$categorytags = array(
		'tag' => 'autism, resources, research, mixed-ability, IEP'
		);

} elseif ( in_category('Social Media')){
	$categorytags = array(
		'tag' => 'twitter, facebook, edmodo, safety'
		);

} elseif ( in_category('STEM')){
	$categorytags = array(
		'tag' => 'engineering, common core, teaching technology, coding, robotics'
		);

} elseif ( in_category('Best Practices')){
	$categorytags = array(
		'tag' => 'case study, resources, leadership'
		);

} elseif ( in_category('How-To')){
	$categorytags = array(
		'tag' => ''
		);

} elseif ( in_category('Industry Insights')){
	$categorytags = array(
		'tag' => 'vendors, vendor-neutral'
		);

} elseif ( in_category('Opinion')){
	$categorytags = array(
		'tag' => 'viewpoints, hot takes'
		);

} else {
	$categorytags = $cat;

}

$resources = new WP_Query(array(
	'cat' => $cat,
	'tag' => $categorytags,
	'posts_per_page' => '6',
	'post_type' => array( 'whitepapers', 'ercs', 'specialreports')
)); 

