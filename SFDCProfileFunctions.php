<?php
/* File: SFDCProfileFunctions.php
 * Version: 0.1
 */
function SFDCConnection (){
	ini_set("soap.wsdl_cache_enabled", "0");
	$USERNAME = "sfdcadmin1@eschoolnews.com"; 
	$PASSWORD = "eSNadm1n";
	$TOKEN = "qhO7UhNTUrYp8XU5eF1SRomDp";
	require_once ( ABSPATH . '/soapclient/SforceEnterpriseClient.php');
	require_once ( ABSPATH . '/soapclient/SforceHeaderOptions.php');
	$wsdl = ABSPATH . '/soapclient/eSNenterprise.wsdl.xml';
	$SforceConnection = new SforceEnterpriseClient();
	$SoapClient = $SforceConnection->createConnection($wsdl);
	$login = $SforceConnection->login($USERNAME, $PASSWORD.$TOKEN);	
	
	return $SforceConnection;

}
function eSNFormatProfileFromPost(){
	$profile = new stdclass();
	$fieldsToNull = array();
	$profile->Id =$_POST['user_id'];

	if (array_key_exists('personemail', $_POST) && $_POST['personemail']!='') { $profile->PersonEmail =$_POST['personemail']; } else {array_push($fieldsToNull, 'PersonEmail');}
	if (array_key_exists('firstname', $_POST) && $_POST['firstname']!='') { $profile->FirstName =$_POST['firstname']; } else {array_push($fieldsToNull, 'FirstName');}
	if (array_key_exists('lastname', $_POST) && $_POST['lastname']!='') { $profile->LastName =$_POST['lastname']; } else {array_push($fieldsToNull, 'LastName');}
	if (array_key_exists('organization__c', $_POST) && $_POST['organization__c']!='') { $profile->Organization__c =$_POST['organization__c']; } else {array_push($fieldsToNull, 'Organization__c');}
	if (array_key_exists('company_type__c', $_POST) && $_POST['company_type__c']!='') { $profile->Company_Type__c =$_POST['company_type__c']; } else {array_push($fieldsToNull, 'Company_Type__c');}
	if (array_key_exists('persontitle', $_POST) && $_POST['persontitle']!='') { $profile->PersonTitle =$_POST['persontitle']; } else {array_push($fieldsToNull, 'PersonTitle');}
	if (array_key_exists('personmailingstreet', $_POST) && $_POST['personmailingstreet']!='') { $profile->PersonMailingStreet =$_POST['personmailingstreet']; } else {array_push($fieldsToNull, 'PersonMailingStreet');}
	if (array_key_exists('Mailing_Address_2__c', $_POST) && $_POST['Mailing_Address_2__c']!='') { $profile->Mailing_Address_2__c =$_POST['Mailing_Address_2__c']; } else {
		//hot fix just make it a space and not null
		$profile->Mailing_Address_2__c =' ';
		//array_push($fieldsToNull, 'Mailing_Address_2__c')
		}
	if (array_key_exists('personmailingcity', $_POST) && $_POST['personmailingcity']!='') { $profile->PersonMailingCity =$_POST['personmailingcity']; } else {array_push($fieldsToNull, 'PersonMailingCity');}
	if (array_key_exists('personmailingstate', $_POST) && $_POST['personmailingstate']!='') { $profile->PersonMailingState =$_POST['personmailingstate']; } else {array_push($fieldsToNull, 'PersonMailingState');}
	if (array_key_exists('personmailingpostalcode', $_POST) && $_POST['personmailingpostalcode']!='') { $profile->PersonMailingPostalCode =$_POST['personmailingpostalcode']; } else {array_push($fieldsToNull, 'PersonMailingPostalCode');}
	if (array_key_exists('personmailingcountry', $_POST) && $_POST['personmailingcountry']!='') { $profile->PersonMailingCountry =$_POST['personmailingcountry']; } else {array_push($fieldsToNull, 'PersonMailingCountry');}
	if (array_key_exists('phone', $_POST) && $_POST['phone']!='') { $profile->Phone =$_POST['phone']; } else {array_push($fieldsToNull, 'phone');}
	if (array_key_exists('grade_level__c', $_POST)) { $profile->Grade_Level__c =implode(",",$_POST['grade_level__c']); } else {array_push($fieldsToNull, 'Grade_Level__c');}
	if (array_key_exists('subject_taught__c', $_POST)) { $profile->Subject_Taught__c =implode(",",$_POST['subject_taught__c']); } else {array_push($fieldsToNull, 'Subject_Taught__c');}
	$profile->eSN_This_Week__c =$_POST['esn_this_week__c'];
	$profile->eSN_Today__c =$_POST['esn_today__c'];
	$profile->eSN_Tools_For_Schools__c =$_POST['esn_tools_for_schools__c'];
	$profile->eSN_Offers__c =$_POST['esn_offers__c'];
	$profile->Partner_Offers__c =$_POST['partner_offers__c'];
	$profile->eClassroom_News__c =$_POST['eclassroom_news__c'];
	$profile->eCN_This_Week__c =$_POST['ecn_this_week__c'];
	$profile->eCN_Today__c =$_POST['ecn_today__c'];
	$profile->eCN_Offers__c =$_POST['ecn_offers__c'];
	$profile->eCN_Partners__c =$_POST['ecn_partners__c'];
	$profile->Ed_Resource_Alert__c =$_POST['Ed_Resource_Alert__c'];

	$profile->Email_as_ExternalID__c = $profile->PersonEmail;
	
	if (count($fieldsToNull)>0){
		$profile->fieldsToNull = $fieldsToNull;
	}
	return $profile;
}

function eSNProfile($sfid){
	$Conn = SFDCConnection();
	$output=array();
	$sfPA = ("Select Id, PersonContactId, Email_as_ExternalID__c, WP_Login__c, WP_ID__c, WP_Unique_ID__c, " .
			"PersonEmail, FirstName, LastName, Organization__c, Company_Type__c, " .
			"PersonTitle, PersonMailingStreet, Mailing_Address_2__c, PersonMailingCity, " .
			"PersonMailingState, PersonMailingPostalCode, PersonMailingCountry, " . 
			"Phone, Grade_Level__c, Subject_Taught__c, " .
			"eSN_This_Week__c, eSN_Today__c, eSN_Tools_For_Schools__c, eSN_Offers__c, " .
			"Partner_Offers__c, eClassroom_News__c, eCN_This_Week__c, eCN_Today__c, " .
			"eCN_Offers__c, eCN_Partners__c, Ed_Resource_Alert__c, " .
			"eSchool_News_Digital__c, eSchool_News_Digital_Expire_Date__c, eSchool_News_Digital_Status__c, " .
			"eSchool_News_Print__c, eSchool_News_Print_Expire_Date__c, eSchool_News_Print_Status__c " .	
			"from Account where id ='".$sfid."' and IsPersonAccount=true"); 
	$sfPAresp = $Conn->query($sfPA);
	if (count($sfPAresp->records)>0){
		$output['profile'] = $sfPAresp->records[0];
		$sfid = $output['profile']->Id;
		$sfSub = ("select Id, Name,  Source__c, Sub_Status__c, Request_Date__c, Expire_Date__c, Request_URL__c " .
					"from Subscription_Request__c where Person_Account__c = '".$sfid."'  order by Request_Date__c desc");
		$sfSubresp = $Conn->query($sfSub);

		$allSubs = array();
		$allSubs['eSchoolNews Digital Subscription'] = array(name=>'eSchoolNews Digital Subscription', source=>'eschoolnews', action=>'Subscribe', request=>null, expiration=>null, srid=>null);
		$allSubs['eCampusNews Digital Subscription'] =  array(name=>'eCampusNews Digital Subscription', source=>'ecampusnews',action=>'Subscribe', request=>null, expiration=>null, srid=>null);
		//$allSubs['eClassroomNews Digital Subscription'] =  array(name=>'eClassroomNews Digital Subscription', source=>'eclassroomnews',action=>'Subscribe', expiration=>null, srid=>null);
		
		if (count($sfSubresp->records)>0){

			$output['subs'] = $sfSubresp->records;
			$today = strtotime(date("Y-m-d"));
			$subData = $output['subs'];
			foreach ($subData as &$item) {
				if ($allSubs[$item->Name]['srid']==null){ //|| ($item->Sub_Status__c!="Pending Cancelation")){
					if ($item->Sub_Status__c!="Processed Cancelation"){
						$itemExpireDate =  strtotime($item->Expire_Date__c);
						$allSubs[$item->Name]['action'] =  (($item->Sub_Status__c=="Pending")||($item->Sub_Status__c=="Pending Cancelation"))?$item->Sub_Status__c:(($itemExpireDate <= $today)?'Renew':'Cancel');
						$allSubs[$item->Name]['request'] =  date("m/d/Y", strtotime($item->Request_Date__c));
						$allSubs[$item->Name]['expiration'] = date("m/d/Y", strtotime($item->Expire_Date__c));
					}
					$allSubs[$item->Name]['srid'] = $item->Id;
				}
			}
			unset($item);
		}
		$output['actions'] = $allSubs;
	}
	return $output;

}

function eSNAssociateProfileStatus () {
	$status="New";
	if (array_key_exists('sfEmail', $_POST)){
		$status="Search";
	} elseif (array_key_exists('sfAction', $_POST)){
		$status="Submit";
	}
	return $status;
}

function eSNAPSearch ($sfEmail){
	//DScott 2/2012 - changed query to search additional fields.  sfEmail can be email address or FEID
	$Conn = SFDCConnection();
	$output=null;
	$sfPA = ("Select Id, PersonContactId, Email_as_ExternalID__c,  " .
			"PersonEmail, FirstName, LastName, Organization__c, Company_Type__c, " .
			"PersonTitle, PersonMailingStreet, Mailing_Address_2__c, PersonMailingCity, " .
			"PersonMailingState, PersonMailingPostalCode, PersonMailingCountry, " . 
			"Phone, Grade_Level__c, Subject_Taught__c, " .
			"eSN_This_Week__c, eSN_Today__c, eSN_Tools_For_Schools__c, eSN_Offers__c, " .
			"Partner_Offers__c, eClassroom_News__c, eCN_This_Week__c, eCN_Today__c, " .
			"eCN_Offers__c, eCN_Partners__c, Ed_Resource_Alert__c, " .
			"eSchool_News_Digital__c, eSchool_News_Digital_Expire_Date__c, eSchool_News_Digital_Status__c, " .
			"eSchool_News_Print__c, eSchool_News_Print_Expire_Date__c, eSchool_News_Print_Status__c " .	
			"from Account where (PersonEmail ='".$sfEmail."' ".
			"or eSchool_News_Print__c='".$sfEmail.") ".
			"and IsPersonAccount=true"); 
	$sfPAresp = $Conn->query($sfPA);

/*	if (count($sfPAresp->records)>0){
		$output = $sfPAresp->records[0];
	}
*/
	if (count($sfPAresp->records)>0){
		$output['profile'] = $sfPAresp->records[0];
		$sfid = $output['profile']->Id;
		$sfSub = ("select Id, Name,  Source__c, Sub_Status__c, Request_Date__c, Expire_Date__c, Request_URL__c " .
					"from Subscription_Request__c where Person_Account__c = '".$sfid."'  order by Request_Date__c desc");
		$sfSubresp = $Conn->query($sfSub);

		$allSubs = array();
		$allSubs['eSchoolNews Digital Subscription'] = array(name=>'eSchoolNews Digital Subscription', source=>'eschoolnews', action=>'Subscribe', request=>null, expiration=>null, srid=>null);
		$allSubs['eCampusNews Digital Subscription'] =  array(name=>'eCampusNews Digital Subscription', source=>'ecampusnews',action=>'Subscribe', request=>null, expiration=>null, srid=>null);
		//$allSubs['eClassroomNews Digital Subscription'] =  array(name=>'eClassroomNews Digital Subscription', source=>'eclassroomnews',action=>'Subscribe', expiration=>null, srid=>null);
		
		if (count($sfSubresp->records)>0){
			$output['subs'] = $sfSubresp->records;
			$today = strtotime(date("Y-m-d"));
			$subData = $output['subs'];
			foreach ($subData as &$item) {
				if ($allSubs[$item->Name]['srid']==null){
					$itemExpireDate =  strtotime($item->Expire_Date__c);
					$allSubs[$item->Name]['action'] =  (($item->Sub_Status__c=="Pending")||($item->Sub_Status__c=="Pending Cancelation"))?$item->Sub_Status__c:(($itemExpireDate <= $today)?'Renew':'Cancel');
					$allSubs[$item->Name]['request'] =  date("m/d/Y", strtotime($item->Request_Date__c));
					$allSubs[$item->Name]['expiration'] = date("m/d/Y", strtotime($item->Expire_Date__c));
					$allSubs[$item->Name]['srid'] = $item->Id;
				}
			}
			unset($item);
		}
		$output['actions'] = $allSubs;
	}

	return $output;
}

function eSNSRCancel($profile, $srid){
	$sfSub = ("select Id, Name, Person_Account__c,   Source__c, Sub_Status__c, Request_Date__c, Expire_Date__c, Request_URL__c, FEID__c, WP_ID__c, Personal_Answer__c, Personal_Question__c " .
					"from Subscription_Request__c where id = '".$srid."'");
	$Conn = SFDCConnection();
	$sfSubresp = $Conn->query($sfSub);
	if (count($sfSubresp->records)>0){
		$item=$sfSubresp->records[0];
		$item->Id = null;
		$item->Sub_Status__c="Pending Cancelation";
		$item->Request_Date__c=date("Y-m-d");

		$item->Address1__c=$_POST['personmailingstreet'];
		$item->Address2__c=$_POST['Mailing_Address_2__c'];
		$item->City__c=$_POST['personmailingcity'];
		$item->Country__c=$_POST['personmailingcountry'];
		$item->Email__c =$_POST['personemail']; 
		$item->First_Name__c =$_POST['firstname'];
		$item->Last_Name__c =$_POST['lastname'];
		$item->Organization__c =$_POST['organization__c'];
		$item->Organization_Type__c =$_POST['company_type__c'];
		$item->Phone__c =$_POST['phone'];
		$item->State__c =$_POST['personmailingstate'];
		$item->Zip__c=$_POST['personmailingpostalcode'];
		$createResponse = $Conn->create(array($item), 'Subscription_Request__c');
		if ($createResponse->success==1){
			$output='Cancel Request Successful';
		} else {
			$output='Cancel Request Error';
		}
		return $output;
	}
}

function eSNAPUpdate($profile){
	
	$Conn = SFDCConnection();
	$output=null;
	$updateResponse = $Conn->update(array($profile), 'Account');
	if ($updateResponse->success==1){
		$output='<p style="font-weight:bold; font-size:12pt; background-color:#ffc; padding:3px; width:100%; border-left:solid 1px #fa0; border-bottom:solid 1px #fa0;">Update Successful.</p>';
	} else {
		$output='<p style="font-weight:bold; font-size:12pt; background-color:#ffc; padding:3px; width:100%; border-left:solid 1px #fa0; border-bottom:solid 1px #fa0;">Error: There was an error processing your request. Please check the form below and resubmit. </p>';
		
		
	}
	return $output; 
}


function MyeSNAPUpdate($profile){
	
	$Conn = SFDCConnection();
	$output=null;
	$updateResponse = $Conn->update(array($profile), 'Account');
	if ($updateResponse->success==1){
		$output='<p style="font-weight:bold; font-size:12pt; background-color:#ffc; padding:3px; width:100%; border-left:solid 1px #fa0; border-bottom:solid 1px #fa0;">Update Successful.</p>';
	} else {
		$output='<p style="font-weight:bold; font-size:12pt; background-color:#ffc; padding:3px; width:100%; border-left:solid 1px #fa0; border-bottom:solid 1px #fa0;">Error: There was an error processing your request.</p>';
		
		
	}
	return $output; 
}



function eSNAP_Subs(){
	$Subs = array("Subscribed",
		"Not Subscribed");
	return $Subs;
}

function eSNAP_Organization_Type(){
	$OrgType = array("",
		"Federal/State Level Education", 
		"School District",
		"School Building",
		"Higher Education",
		"Other");
	return $OrgType;
}

function eSNAP_Title(){
	$Title = array("",
		"Administrative Support Staff",
		"State School Official",
		"College/University Official",
		"Curriculum Director",
		"Deputy/ Asst/ Area Superintendent",
		"District Administrator",
		"Educational Services Agency Dir.",
		"Federal Official",
		"Federal/State Program Admin",
		"Governor's Office Staff Member",
		"Legislative Staff Member",
		"Librarian/Media Specialist",
		"Library Services Director",
		"MIS/IT Director",
		"Non-Educator/ Parent",
		"Principal/ Assistant Principal",
		"Safety/Security Director",
		"School Board Member",
		"School Business Official",
		"Superintendent (General)",
		"Teacher",
		"Tech. Coordinator School-Level",
		"Tech. Director District-Level",
		"Vendor");
	return $Title;
}

function eCNAP_Organization_Type(){
	$OrgType = array("",
		"Higher Education",
		"K-12 Education",
		"Federal/State Level Education",
		"Other");
	return $OrgType;
}

function eCNAP_Title(){
	$Title = array("",
		"Academic Officer",
		"Administration and Operations",
		"Admissions and Registrar",
		"Athletic Director",
		"Bookstore Director",
		"Campus Svc and Facilities",
		"Chancellor / President / CEO / Provost",
		"Chief Development and Planning",
		"Dean",
		"Director Branch Campus",
		"Faculty",
		"Federal and State Official",
		"Financial and Funding Director / Manager",
		"Institute and Research Director / Manager",
		"Instructional and Curriculum Director / Manager",
		"Library/Media Director / Manager",
		"MIS and IT Director / Manager",
		"Non-Ed Parent or Student",
		"Safety and Security Director / Manager",
		"Vendor",
		"Vice President");
	return $Title;
}


function eSNAP_State(){
	$State = array("",
		"AA",
		"AB",
		"AC",
		"AE",
		"AF",
		"AK",
		"AL",
		"AM",
		"AP",
		"AR",
		"AS",
		"AZ",
		"BC",
		"CA",
		"CO",
		"CT",
		"DC",
		"DE",
		"FL",
		"FM",
		"GA",
		"GU",
		"HI",
		"IA",
		"ID",
		"IL",
		"IN",
		"KS",
		"KY",
		"LA",
		"MA",
		"MB",
		"MD",
		"ME",
		"MH",
		"MI",
		"MN",
		"MO",
		"MP",
		"MS",
		"MT",
		"NB",
		"NC",
		"ND",
		"NE",
		"NF",
		"NH",
		"NJ",
		"NM",
		"NS",
		"NT",
		"NU",
		"NV",
		"NY",
		"OH",
		"OK",
		"ON",
		"OR",
		"PA",
		"PE",
		"PR",
		"PW",
		"QC",
		"RI",
		"SC",
		"SD",
		"SK",
		"TN",
		"TX",
		"UT",
		"VA",
		"VI",
		"VT",
		"WA",
		"WI",
		"WV",
		"WY",
		"YT",
		"Not Listed");
	return $State;
}

function eSNAP_Country(){
	$Country = array("",
		"United States",
		"Canada",
		"Afghanistan",
		"Albania",
		"Algeria",
		"American Samoa",
		"Andorra",
		"Angola",
		"Anguilla",
		"Antarctica",
		"Antigua and Barbuda",
		"Argentina",
		"Armenia",
		"Aruba",
		"Australia",
		"Austria",
		"Azerbaijan",
		"Bahamas",
		"Bahrain",
		"Bangladesh",
		"Barbados",
		"Belarus",
		"Belgium",
		"Belize",
		"Benin",
		"Bermuda",
		"Bhutan",
		"Bolivia",
		"Bosnia and Herzegowina",
		"Botswana",
		"Bouvet Island",
		"Brazil",
		"British Indian Ocean Territory",
		"Brunei Darussalam",
		"Bulgaria",
		"Burkina Faso",
		"Burundi",
		"Cambodia",
		"Cameroon",
		"Canada",
		"Cape Verde",
		"Cayman Islands",
		"Central African Republic",
		"Chad",
		"Chile",
		"China",
		"Christmas Island",
		"Cocos (Keeling) Islands",
		"Colombia",
		"Comoros",
		"Congo",
		"Cook Islands",
		"Costa Rica",
		"Croatia",
		"Cuba",
		"Cyprus",
		"Czech Republic",
		"Democratic Peoples Republic of Korea",
		"Denmark",
		"Djibouti",
		"Dominica",
		"Dominican Republic",
		"East Timor",
		"Ecuador",
		"Egypt",
		"El Salvador",
		"Equatorial Guinea",
		"Eritrea",
		"Estonia",
		"Ethiopia",
		"Falkland Islands (Malvinas)",
		"Faroe Islands",
		"Fiji",
		"Finland",
		"France",
		"French Guiana",
		"French Polynesia",
		"French Southern Territories",
		"Gabon",
		"Gambia",
		"Georgia",
		"Germany",
		"Ghana",
		"Gibraltar",
		"Greece",
		"Greenland",
		"Grenada",
		"Guadeloupe",
		"Guam",
		"Guatemala",
		"Guinea",
		"Guinea-bissau",
		"Guyana",
		"Haiti",
		"Heard and Mc Donald Islands",
		"Honduras",
		"Hong Kong",
		"Hungary",
		"Iceland",
		"India",
		"Indonesia",
		"Iran (Islamic Republic of)",
		"Iraq",
		"Ireland",
		"Israel",
		"Italy",
		"Jamaica",
		"Japan",
		"Jordan",
		"Kazakhstan",
		"Kenya",
		"Kiribati",
		"Korea",
		"Kuwait",
		"Kyrgyzstan",
		"Lao Peoples Democratic Republic",
		"Latvia",
		"Lebanon",
		"Lesotho",
		"Liberia",
		"Libyan Arab Jamahiriya",
		"Liechtenstein",
		"Lithuania",
		"Luxembourg",
		"Macau",
		"Macedonia",
		"Madagascar",
		"Malawi",
		"Malaysia",
		"Maldives",
		"Mali",
		"Malta",
		"Marshall Islands",
		"Martinique",
		"Mauritania",
		"Mauritius",
		"Mayotte",
		"Mexico",
		"Micronesia",
		"Moldova",
		"Monaco",
		"Mongolia",
		"Montserrat",
		"Morocco",
		"Mozambique",
		"Myanmar",
		"Namibia",
		"Nauru",
		"Nepal",
		"Netherlands",
		"Netherlands Antilles",
		"New Caledonia",
		"New Zealand",
		"Nicaragua",
		"Niger",
		"Nigeria",
		"Niue",
		"Norfolk Island",
		"Northern Mariana Islands",
		"Norway",
		"Oman",
		"Pakistan",
		"Palau",
		"Panama",
		"Papua New Guinea",
		"Paraguay",
		"Peru",
		"Philippines",
		"Pitcairn",
		"Poland",
		"Portugal",
		"Puerto Rico",
		"Qatar",
		"Reunion",
		"Romania",
		"Russian Federation",
		"Rwanda",
		"Saint Kitts and Nevis",
		"Saint Lucia",
		"Saint Vincent and the Grenadines",
		"Samoa",
		"San Marino",
		"Sao Tome and Principe",
		"Saudi Arabia",
		"Senegal",
		"Seychelles",
		"Sierra Leone",
		"Singapore",
		"Slovakia (Slovak Republic)",
		"Slovenia",
		"Solomon Islands",
		"Somalia",
		"South Africa",
		"South Georgia and the South Sandwich Islands",
		"Spain",
		"Sri Lanka",
		"St. Helena",
		"St. Pierre and Miquelon",
		"Sudan",
		"Suriname",
		"Svalbard and Jan Mayen Islands",
		"Swaziland",
		"Sweden",
		"Switzerland",
		"Syrian Arab Republic",
		"Taiwan",
		"Tajikistan",
		"Tanzania",
		"Thailand",
		"Togo",
		"Tokelau",
		"Tonga",
		"Trinidad and Tobago",
		"Tunisia",
		"Turkey",
		"Turkmenistan",
		"Turks and Caicos Islands",
		"Tuvalu",
		"Uganda",
		"Ukraine",
		"United Arab Emirates",
		"United Kingdom",
		"United States",
		"United States Minor Outlying Islands",
		"Uruguay",
		"Uzbekistan",
		"Vanuatu",
		"Vatican City State (Holy See)",
		"Venezuela",
		"Viet Nam",
		"Virgin Islands (British)",
		"Virgin Islands (U.S.)",
		"Wallis and Futuna Islands",
		"Western Sahara",
		"Yemen",
		"Yugoslavia",
		"Zaire",
		"Zambia",
		"Zimbabwe");
	return $Country;
}
function eSNAP_Grade(){
	$Grade = array("Pre-K",
		"K",
		"1",
		"2",
		"3",
		"4",
		"5",
		"6",
		"7",
		"8",
		"9",
		"10",
		"11",
		"12",
		"Undergrad",
		"PostGrad",
		"Not a teacher");
	return $Grade;
}
function eSNAP_Subject(){
	$Subject = array("English",
		"Mathematics",
		"Languages",
		"Social Studies",
		"Science",
		"Trades",
		"Business",
		"Home Living",
		"Physical Education",
		"Religious Education",
		"Music & Arts",
		"Not a teacher");
	return $Subject;
}
?>

