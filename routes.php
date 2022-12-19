<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'home';
$route['404_override'] = 'home/not_found';
$route['translate_uri_dashes'] = FALSE;

$route['lawyer-consultation-online'] = 'home/speak_to_lawyers';

include(APPPATH.'config/database.php');
require_once( BASEPATH .'database/DB.php');
$db =& DB();

$query1 = $db->query("SELECT language_speaking FROM `language_master`");
$lang_result = $query1->result_array();



$query = $db->query("SELECT DISTINCT `city` FROM `user_master` JOIN `login_details` ON `login_details`.`id`=`user_master`.`loginid` WHERE `login_details`.`usertype` = 'lawyers' AND `login_details`.`isactive` = '1' AND `user_master`.`city` != '' ORDER BY `user_master`.`city`
");
$cit_result = $query->result_array();

$experience = array("2", "5", "10", "11");

foreach($cit_result as $key => $val){
	
	$city = strtolower($val['city']);

		
		$route['accident-lawyers-'.$city]	= 'home/lawyers_list';
		$route['accident-lawyers-(:any)']	= 'home/lawyers_list';
		$route['accident-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['accident-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['business-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['business-lawyers-(:any)']	= 'home/lawyers_list';
		$route['business-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['business-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['banking-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['banking-lawyers-(:any)']	= 'home/lawyers_list';
		$route['banking-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['banking-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['child-custody-lawyers-(:any)']	= 'home/lawyers_list';
		$route['child-custody-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['child-custody-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['child-custody-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['civil-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['civil-lawyers-(:any)']	= 'home/lawyers_list';
		$route['civil-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['civil-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['commercial-contracts-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['commercial-contracts-lawyers-(:any)']	= 'home/lawyers_list';
		$route['commercial-contracts-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['commercial-contracts-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['consumer-grievances-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['consumer-grievances-lawyers-(:any)']	= 'home/lawyers_list';
		$route['consumer-grievances-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['consumer-grievances-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['criminal-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['criminal-lawyers-(:any)']	= 'home/lawyers_list';
		$route['criminal-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['criminal-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['dishonour-of-cheques-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['dishonour-of-cheques-lawyers-(:any)']	= 'home/lawyers_list';
		$route['dishonour-of-cheques-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['dishonour-of-cheques-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['divorce-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['divorce-lawyers-(:any)']	= 'home/lawyers_list';
		$route['divorce-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['divorce-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['documentation-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['documentation-lawyers-(:any)']	= 'home/lawyers_list';
		$route['documentation-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['documentation-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['domestic-violence-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['domestic-violence-lawyers-(:any)']	= 'home/lawyers_list';
		$route['domestic-violence-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['domestic-violence-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['employment-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['employment-lawyers-(:any)']	= 'home/lawyers_list';
		$route['employment-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['employment-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['family-law-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['family-law-lawyers-(:any)']	= 'home/lawyers_list';
		$route['family-law-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['family-law-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['finance-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['finance-lawyers-(:any)']	= 'home/lawyers_list';
		$route['finance-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['finance-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['immigration-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['immigration-lawyers-(:any)']	= 'home/lawyers_list';
		$route['immigration-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['immigration-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['income-tax-return-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['income-tax-return-lawyers-(:any)']	= 'home/lawyers_list';
		$route['income-tax-return-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['income-tax-return-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['labour-issues-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['labour-issues-lawyers-(:any)']	= 'home/lawyers_list';
		$route['labour-issues-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['labour-issues-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['landlord-tenant-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['landlord-tenant-lawyers-(:any)']	= 'home/lawyers_list';
		$route['landlord-tenant-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['landlord-tenant-lawyers'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['legato-assist-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['legato-assist-lawyers-(:any)']	= 'home/lawyers_list';
		$route['legato-assist-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['legato-assist-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['marriage-registration-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['marriage-registration-lawyers-(:any)']	= 'home/lawyers_list';
		$route['marriage-registration-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['marriage-registration-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['medical-negligence-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['medical-negligence-lawyers-(:any)']	= 'home/lawyers_list';
		$route['medical-negligence-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['medical-negligence-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['others-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['others-lawyers-(:any)']	= 'home/lawyers_list';
		$route['others-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['others-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['personal-injury-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['personal-injury-lawyers-(:any)']	= 'home/lawyers_list';
		$route['personal-injury-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['personal-injury-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['property-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['property-lawyers-(:any)']	= 'home/lawyers_list';
		$route['property-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['property-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['ragging-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['ragging-lawyers-(:any)']	= 'home/lawyers_list';
		$route['ragging-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['ragging-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['recovery-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['recovery-lawyers-(:any)']	= 'home/lawyers_list';
		$route['recovery-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['recovery-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['sexual-abuse-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['sexual-abuse-lawyers-(:any)']	= 'home/lawyers_list';
		$route['sexual-abuse-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['sexual-abuse-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['stamp-papers-and-notary-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['stamp-papers-and-notary-lawyers-(:any)']	= 'home/lawyers_list';
		$route['stamp-papers-and-notary-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['stamp-papers-and-notary-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['startup-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['startup-lawyers-(:any)']	= 'home/lawyers_list';
		$route['startup-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['startup-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['tax-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['tax-lawyers-(:any)']	= 'home/lawyers_list';
		$route['tax-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['tax-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['trademark-and-copyright-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['trademark-and-copyright-lawyers-(:any)']	= 'home/lawyers_list';
		$route['trademark-and-copyright-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['trademark-and-copyright-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';

		$route['wills-lawyers-'.$city] 	= 'home/lawyers_list';
		$route['wills-lawyers-(:any)']	= 'home/lawyers_list';
		$route['wills-lawyers-'.$city.'/(:any)'] 	= 'home/lawyers_list';
		$route['wills-lawyers-'.$city.'/(:any)/(:any)'] 	= 'home/lawyers_list/$1';
	
}