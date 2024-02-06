<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//route default
$route['default_controller'] = 'home';

//route home
$route['login'] = 'home/login';
$route['lupapw'] = 'home/lupapw';
$route['register'] = 'home/register';

//route dashboard admin
$route['dashboard'] = 'admin/dashboard/index';
$route['pesantren'] = 'admin/pesantren/index';
$route['tahunajaran'] = 'admin/tahunajaran/index';
$route['mapel'] = 'admin/mapel/index';
$route['kelas'] = 'admin/kelas/index';

//route guru
$route['guru'] = 'admin/guru/index';
$route['pembimbing'] = 'admin/pembimbing/index';
$route['datamengajar'] = 'admin/datamengajar/index';

//route santri
$route['santri'] = 'admin/santri/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
