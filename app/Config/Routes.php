<?php

namespace Config;

use App\Controllers\DataOpkController;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('news', 'GalleryController::index');
$routes->get('components', 'Home::components');
$routes->get('opk', 'Home::opk');
$routes->get('kegiatan', 'DataKegiatanController::getAllKegiatan');
$routes->get('dokumen', 'DokumenController::index');
$routes->get('dokumen/download/(:num)', 'DokumenController::download/$1');
$routes->get('dokumen/readOnline/(:num)', 'DokumenController::open/$1');
//$routes->get('loginadmin', 'AdminController::loginadmin');
$routes->get('adminpage', 'AdminController::adminpage');
$routes->get('tambahdata', 'AdminController::tambah');
//$routes->get('register', 'AdminController::register');
$routes->get('(:num)', 'DataOpkController::detail/$1');
$routes->get('kategori/(:any)', 'DataOpkController::opkByKategori/$1');
$routes->get('museum', 'Home::museum');
$routes->get('opk/delete/(:any)/(:num)', 'AdminController::delete/$1/$2');
$routes->get('opk/edit/(:num)', 'AdminController::edit/$1');
$routes->get('/tambahgallery', 'AdminController::tambahGallery');
$routes->get('detailBidang/(:any)', 'Home::detailBidang/$1');
/*
$routes->group('', ['filter' => 'login'], function($routes){
    $routes->get('adminpage', 'AdminController::adminpage');
});
//$routes->get('(:any)', 'DataOpkController::opkByKategori/$1');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
