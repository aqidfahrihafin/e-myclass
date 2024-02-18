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
$route['nilai'] = 'admin/nilai/index';
$route['nilaikepribadian'] = 'admin/nilaikepribadian/index';
$route['prestasi'] = 'admin/prestasi/index';
$route['beasiswa'] = 'admin/beasiswa/index';
$route['absensi'] = 'admin/absensi/index';
$route['catatanpembimbing'] = 'admin/catatanpembimbing/index';

//route guru
$route['guru'] = 'admin/guru/index';
$route['pembimbing'] = 'admin/pembimbing/index';
$route['datamengajar'] = 'admin/datamengajar/index';
$route['dataajar'] = 'admin/datamengajar/index';
$route['penilaian'] = 'admin/penilaian/index';

//route santri
$route['santri'] = 'admin/santri/index';
$route['alumni'] = 'admin/santri/alumni';

// users
$route['users'] = 'admin/users/index';
$route['profil'] = 'admin/profil/index';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
