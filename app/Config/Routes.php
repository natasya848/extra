<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Login::index');
$routes->get('home', 'Home::index');
$routes->get('home/user', 'Home::user');
$routes->get('profile', 'Home::profile');
$routes->post('profile/update', 'Home::updateProfile');
$routes->get('/login', 'Login::index');
$routes->post('/login/aksi_login', 'Login::aksi_login'); 

$routes->get('/user', 'User::index');
$routes->get('/user/edit/(:num)', 'User::edit_user/$1');
$routes->get('/user/tambah', 'User::tambah');
$routes->post('/user/simpan', 'User::simpan');
$routes->get('/user/detail/(:num)', 'User::detail/$1');

$routes->get('/kelas', 'Ruangan::kelas');
$routes->get('/tambah_kelas', 'Ruangan::tambah_kelas');
$routes->post('/aksi_tambah_kelas', 'Ruangan::aksi_tambah_kelas');
$routes->get('/edit_kelas/(:num)', 'Ruangan::edit_kelas/$1');
$routes->post('/aksi_edit_kelas/(:num)', 'Ruangan::aksi_edit_kelas/$1');
$routes->get('/delete_kelas/(:num)', 'Ruangan::delete_kelas/$1');
$routes->get('/jurusan', 'Ruangan::jurusan');
$routes->get('/tambah_jurusan', 'Ruangan::tambah_jurusan');
$routes->post('/aksi_tambah_jurusan', 'Ruangan::aksi_tambah_jurusan');
$routes->get('/edit_jurusan/(:num)', 'Ruangan::edit_jurusan/$1');
$routes->post('/aksi_edit_jurusan/(:num)', 'Ruangan::aksi_edit_jurusan/$1');
$routes->get('/delete_jurusan/(:num)', 'Ruangan::delete_jurusan/$1');
$routes->get('/rombel', 'Ruangan::rombel');
$routes->get('/tambah_rombel', 'Ruangan::tambah_rombel');
$routes->post('/aksi_tambah_rombel', 'Ruangan::aksi_tambah_rombel');
$routes->get('/edit_rombel/(:num)', 'Ruangan::edit_rombel/$1');
$routes->post('/aksi_edit_rombel/(:num)', 'Ruangan::aksi_edit_rombel/$1');
$routes->get('/delete_rombel/(:num)', 'Ruangan::delete_rombel/$1');
$routes->get('/guru', 'Guru::index');
$routes->get('/tambah_guru', 'Guru::tambah_guru');
$routes->post('/aksi_tambah_guru', 'Guru::aksi_tambah_guru');
$routes->get('/edit_guru/(:num)', 'Guru::edit_guru/$1');
$routes->post('/aksi_edit_guru/(:num)', 'Guru::aksi_edit_guru/$1');
$routes->get('/delete_guru/(:num)', 'Guru::delete_guru/$1');
$routes->get('/ekstra', 'Ekstra::index');
$routes->get('/tambah_ekstra', 'Ekstra::tambah_ekstra');
$routes->post('/aksi_tambah_ekstra', 'Ekstra::aksi_tambah_ekstra');
$routes->get('/edit_ekstra/(:num)', 'Ekstra::edit_ekstra/$1');
$routes->post('/aksi_edit_ekstra/(:num)', 'Ekstra::aksi_edit_ekstra/$1');
$routes->get('/delete_ekstra/(:num)', 'Ekstra::delete_ekstra/$1');
$routes->get('/siswa', 'Siswa::index');
$routes->get('/tambah_siswa', 'siswa::tambah_siswa');
$routes->post('/aksi_tambah_siswa', 'siswa::aksi_tambah_siswa');
$routes->get('/edit_siswa/(:num)', 'siswa::edit_siswa/$1');
$routes->post('/aksi_edit_siswa', 'Siswa::aksi_edit_siswa');
$routes->get('/delete_siswa/(:num)', 'siswa::delete_siswa/$1');

$routes->get('/pilih_rombel', 'Nilai_siswa::pilih_rombel');
$routes->get('nilai_perkelas/(:num)/(:num)', 'Nilai_siswa::nilai_kelas/$1/$2');
$routes->get('/nilai_saya', 'Nilai_siswa::nilai_saya');
$routes->post('update_jabatan', 'Nilai_siswa::update_jabatan');
$routes->post('simpan_nilai', 'Nilai_siswa::simpan_nilai');
$routes->post('update_sikap', 'Nilai_siswa::update_sikap');
$routes->post('simpan_ekstra', 'Nilai_siswa::simpan_ekstra');
$routes->post('hapus', 'Nilai_siswa::hapus');


$routes->get('absensi', 'Absensi::index');
$routes->post('simpan', 'Absensi::simpan');
$routes->get('get_status_by_date', 'Absensi::get_status_by_date');


$routes->get('daftar', 'Ekstra::daftar');
$routes->post('simpan', 'Ekstra::simpanDaftar');



$routes->get('/logout', 'Logout::index');
$routes->get('/register', 'Register::index');
$routes->post('/register/aksi_register', 'Register::aksi_register'); 
$routes->post('/register/kirimWAAktivasi', 'Register::kirimWAAktivasi');


$routes->get('/csrf-refresh', function() {
    return json_encode([
        'csrf_hash' => csrf_hash()
    ]);
});
