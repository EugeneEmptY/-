<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'main';
$route['404_override'] = '';
$route['main/(:num)'] = 'main';
$route['translate_uri_dashes'] = FALSE;

