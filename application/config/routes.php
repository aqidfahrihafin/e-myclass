<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//route default
$route['default_controller'] = 'home';

//route home
$route['auth/activate_mahasiswa/(:any)'] = 'auth/activate_mahasiswa/$1';
$route['auth/activate/(:any)'] = 'auth/activate/$1';
$route['login'] = 'home/login';
$route['lupapw'] = 'home/lupapw';
$route['register'] = 'home/register';

//route dashboard admin
$route['dashboard'] = 'admin/dashboard/index';
$route['lembaga'] = 'admin/lembaga/index';
$route['tahunajaran'] = 'admin/tahunajaran/index';
$route['fakultas'] = 'admin/fakultas/index';
$route['prodi'] = 'admin/prodi/index';
$route['kelas'] = 'admin/kelas/index';
$route['makul'] = 'admin/makul/index';
$route['detailmateri/(:any)'] = 'admin/materi/detailmateri/$1';
$route['viewmateri/(:any)'] = 'admin/materi/viewmateri/$1';
$route['listmateri/(:any)'] = 'admin/materi/listmateri/$1';

//route dosen
$route['dosen'] = 'admin/dosen/index';

//route mahasiswa
$route['mahasiswa'] = 'admin/mahasiswa/index';
$route['detailkelas/(:any)'] = 'admin/kelasmahasiswa/detailkelas/$1';
$route['alumni'] = 'admin/mahasiswa/alumni';

// users
$route['users'] = 'admin/users/index';
$route['card'] = 'admin/users/card';
$route['profil'] = 'admin/profil/index';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
