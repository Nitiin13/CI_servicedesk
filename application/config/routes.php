<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/
$route['service']='service';
$route['service/admin_portal']='service/admin_portal';
$route['service/usertickets']='service/usertickets';
$route['service/admin_view_tickets']='service/admin_view_tickets';
// $route['service/login']='service/login';
$route['service/register']='service/register';
$route['service/registerUser']='service/registerUser';
$route['service/authenticate']='service/authenticate';
$route['service/ticket_portal']='service/ticket_portal';
$route['service/logout']='service/logout';
$route['service/ticket_add']='service/ticket_add';
$route['blog']='blog';
$route['blog/create']='blog/create';
$route['blog/(:any)']='blog/view/$1';
$route['blog/success']='blog/success';
$route['news/create']='news/create';
$route['news/success']='news/success';
$route['news/(:any)'] = 'news/view/$1';
$route['news'] = 'news';
$route['default_controller'] = 'pages/view';
$route['default_controller'] = "welcome";
$route['404_override'] = '';
$route['(:any)'] = 'pages/view/$1';



/* End of file routes.php */
/* Location: ./application/config/routes.php */