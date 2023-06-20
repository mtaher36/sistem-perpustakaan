<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/admin', 'Admin::index');
$routes->get('/admin/dataBuku/listBuku', 'Admin::listBuku');
$routes->get('/admin/dataBuku/editBuku/(:segment)', 'Admin::edit/$1');
$routes->post('admin/update/(:num)', 'Admin::update/$1');
$routes->add('/admin/save', 'Admin::save');
$routes->get('/admin/dataBuku/tambahBuku', 'Admin::tambahBuku');
$routes->delete('/admin/dataBuku/listBuku/(:num)', 'Admin::delete/$1');
$routes->get('admin/profile/(:num)', 'Profile::edit/$1');
$routes->post('profile/update/(:num)', 'Profile::update/$1');

// member
// $routes->get('/member/listMember', 'Member::listMember');
$routes->group('member', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'Member::listMember');
    $routes->get('edit/(:num)', 'Member::edit/$1');
    $routes->get('tambah', 'Member::tambahMember');
    $routes->post('create', 'Member::create');
    $routes->put('update/(:num)', 'Member::update/$1');
    $routes->delete('delete/(:num)', 'Member::delete/$1');
});

$routes->group('kategori', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'Kategori::listKategori');
    $routes->post('create', 'Kategori::create');
    $routes->put('update/(:num)', 'Kategori::update/$1');
    $routes->delete('delete/(:num)', 'Kategori::delete/$1');
});

$routes->group('peminjaman', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'Peminjaman::listPeminjaman');
    $routes->get('tambah', 'Peminjaman::tambahPeminjaman');
    $routes->get('edit/(:num)', 'Peminjaman::edit/$1');
    $routes->post('create', 'Peminjaman::create');
    $routes->get('editStatusForm/(:num)', 'Peminjaman::EditStatusForm/$1');
    $routes->post('updateStatus/(:num)', 'Peminjaman::updateStatus/$1');
    $routes->post('update/(:num)', 'Peminjaman::update/$1');
    $routes->delete('delete/(:num)', 'Peminjaman::delete/$1');
});

$routes->group('pengembalian', ['namespace' => 'App\Controllers'], function ($routes) {
    $routes->get('/', 'Pengembalian::listPengembalian');
    $routes->get('tambah', 'Peminjaman::tambahPeminjaman');
    $routes->get('edit/(:num)', 'Peminjaman::edit/$1');
    $routes->post('create', 'Peminjaman::create');
    $routes->post('updatestatus/(:num)', 'Peminjaman::updateStatus/$1');
    $routes->post('update/(:num)', 'Peminjaman::update/$1');
    $routes->delete('delete/(:num)', 'Peminjaman::delete/$1');
});


$routes->get('/get-member-name/(:num)', 'Peminjaman::getMemberName/$1');



/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
