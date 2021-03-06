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
$route['default_controller'] = 'welcome';
$route['sample'] = 'welcome/sample';
$route['tools'] = 'Tools/index';
$route['tools/new'] = 'Tools/add';
$route['register'] = 'Users/register';
$route['login'] = 'Users/login';
$route['logout'] = 'Users/logout';
$route['thank_you'] = 'Users/thank_you';
$route['user/(:num)/update'] = "Users/update/$1";
$route['home'] = 'Users/home';
$route['update'] = 'Users/update';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['tools/(:num)/info'] = 'Tools/getinfo/$1';
$route['tools/(:num)/version'] = 'Tools/getversion/$1';
$route['tools/(:num)/edit'] = 'Tools/edit/$1';
$route['tools/(:num)/download'] = 'Tools/download/$1';
$route['tools/(:num)/downloadrequest'] = 'Tools/downloadrequest/$1';
$route['user/(:num)/update'] = "Users/update/$1";
$route['approve/(:num)/(:num)'] = 'Admin/approve/$1/$2';
$route['approve_users'] = 'Admin/approve_users';
$route['requests'] = 'Admin/requests';
$route['approve_request/(:num)/(:num)'] = 'Admin/approve_request/$1/$2';
$route['report/(:num)'] = 'ReportGenerator/index/$1';
$route['notifications'] = 'ReportGenerator/notif';
$route['summary'] = 'ReportGenerator/summary';
$route['rpdf/(:num)'] = 'ReportGenerator/report/$1';
$route['publication/new'] = 'Publication/add';
$route['publication'] = 'Publication/index';
$route['publication/(:num)/info'] = 'Publication/getinfo/$1';
