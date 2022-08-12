<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
$route['404_override'] = 'page/error';
$route['translate_uri_dashes'] = TRUE;

$route['default_controller'] = 'index';
$route['about'] = 'page/about';
$route['resources'] = 'page/resources';
$route['hocl/(:any)/(:any)'] = 'page/what_is_hocl/$1/$2';
$route['case-study/(:any)/(:any)'] = 'page/case_studies/$1/$2';
$route['product/(:any)/(:any)'] = 'page/product_details/$1/$2';
$route['faq'] = 'page/faq';
$route['privacy-policy'] = 'page/privacy_policy';
$route['where-to-buy'] = 'page/where_to_buy';
$route['terms-and-conditions'] = 'page/terms';
$route['terms-of-use'] = 'page/terms';
$route['contact'] = 'page/contact_us';

// $route['privacy-policy'] = 'page/privacy_policy';
// $route['terms-and-conditions'] = 'page/terms';


$route['admin/login'] = 'admin/index/login';
$route['admin/logout'] = 'admin/index/logout';
$route['admin/footer-content'] = 'admin/sitecontent/footer';

$route['newsletter'] = 'ajax/newsletter';


/*** start paypal ***/
$route['pay-now/(:any)'] = 'paypal/pay_now/$1';
$route['success-charge/(:any)'] = 'paypal/success_charge/$1';
$route['cancel-charge/(:any)'] = 'paypal/cancel_charge/$1';
$route['notify-charge'] = 'paypal/notify_charge';

/*** end paypal ***/
