$routes->get('/ekstra', 'Ekstra::index');
$routes->get('/tambah_ekstra', 'Ekstra::tambah_ekstra');
$routes->post('/aksi_tambah_ekstra', 'Ekstra::aksi_tambah_ekstra');
$routes->get('/edit_ekstra/(:num)', 'Ekstra::edit_ekstra/$1');
$routes->post('/aksi_edit_ekstra/(:num)', 'Ekstra::aksi_edit_ekstra/$1');
$routes->get('/delete_ekstra/(:num)', 'Ekstra::delete_ekstra/$1');