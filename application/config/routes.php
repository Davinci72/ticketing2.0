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
$route['incoming/(:num)'] = 'premium';
$route['default_controller'] = 'pager';
$route['about']='pager/about';
$route['services']='pager/services';
$route['why-us']='pager/whyus';
$route['contacts']='pager/contacts';
$route['enquiry']='pager/enquiry';

/*
| Bus ticketing methods
| modules
|  -woocommerce
|  -tickera
|  -bridge for tickera / woocommerce
|  -Api Based Aproach

*/

$route['buy-ticket']='pager/buyTicket';
$route['check-route']='pager/checkRoute';
$route['create-location']='Ticketing/createLocation';
$route['get-locations/(:num)/(:num)']='Ticketing/getLocale/$1/$2';
$route['get-locale-by-id/(:num)']='Ticketing/getLocaleByID/$1';
$route['get-route-info/(:num)/(:num)']='Ticketing/getRouteInfo/$1/$2';
$route['show-route-info'] = 'pager/showRouteInfo';
$route['nairobi-commuter-rail']='pager/ncr';
$route['plan-route/(:num)/(:num)']='Ticketing/createRoute/$1/$2';
$route['check-route-nairobi-commuter-rail'] = 'pager/infoNcr';//'Ticketing/bookNcr';
$route['send_push']='pager/processPayments';
$route['get-all-routes']='Ticketing/getAllRoutes';
$route['create-vehichles']='Ticketing/addVehichle';

/* 
codeigniter uri settings 

*/
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
