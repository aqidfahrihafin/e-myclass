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
$route['perpub'] = 'admin/peringkatpublikasi/index';
$route['kategori'] = 'admin/kategori/index';
$route['prestasi'] = 'admin/prestasi/index';
$route['beasiswa'] = 'admin/beasiswa/index';
$route['absensi'] = 'admin/absensi/index';
$route['catatanpembimbing'] = 'admin/catatanpembimbing/index';

//route dosen
$route['dosen'] = 'admin/dosen/index';
$route['pembimbing'] = 'admin/pembimbing/index';
$route['datamengajar'] = 'admin/datamengajar/index';
$route['dataajar'] = 'admin/datamengajar/index';
$route['penilaian'] = 'admin/penilaian/index';

//route mahasiswa
$route['mahasiswa'] = 'admin/mahasiswa/index';
$route['mahasiswakelas'] = 'admin/kelasmahasiswa/index';
$route['detailkelas/(:any)'] = 'admin/kelasmahasiswa/detailkelas/$1';
$route['alumni'] = 'admin/mahasiswa/alumni';

// users
$route['users'] = 'admin/users/index';
$route['card'] = 'admin/users/card';
$route['profil'] = 'admin/profil/index';
$route['scan'] = 'ScanQRController';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
