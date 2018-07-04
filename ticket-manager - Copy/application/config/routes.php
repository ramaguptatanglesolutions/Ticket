<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'User_Controller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['user/login'] = 'User_Controller/login';
$route['user/profile'] = 'User_Controller/profile';
$route['user/settings'] = 'User_Controller/settings';
$route['user/logout'] = 'User_Controller/logout';

$route['tickets/new'] = 'Ticket_Controller/create';
$route['tickets/queued'] = 'Ticket_Controller/queued';
$route['tickets/opened'] = 'Ticket_Controller/opened';
$route['tickets/resolved'] = 'Ticket_Controller/resolved';
$route['tickets/delete']= 'Ticket_Controller/delete';
$route['tickets/assign']= 'Ticket_Controller/assign';
$route['tickets/view/(:any)']  = 'Ticket_Controller/view/$1';
$route['tickets/update'] = 'Ticket_Controller/updateThread';
$route['tickets/filter']='Ticket_Controller/filter';
$route['tickets/self']='Ticket_Controller/selfAssigned';
$route['tickets/resolved/tickets']= 'Ticket_Controller/resolve';
$route['tickets/transfer']='Ticket_Controller/transferAgent';


$route['agents/new'] = 'Agent_Controller/create';
$route['agents/search'] = 'Agent_Controller/search';
$route['agents/filter']= 'Agent_Controller/filter';
$route['agents/delete']='Agent_Controller/delete';


$route['departments/new'] = 'Department_Controller/create';
$route['departments/search'] = 'Department_Controller/search';
$route['department/delete'] = 'Department_Controller/delete';