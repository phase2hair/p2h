<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$route['default_controller'] = 'home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;

$route['home/register_new_client'] = 'home/register_new_client';
$route['home/check_in'] = 'home/check_in';
$route['admin/dashboard'] = 'admin/dashboard';
