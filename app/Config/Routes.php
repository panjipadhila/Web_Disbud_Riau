<?php

namespace Config;

use App\Controllers\AdminController;
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
//Root
$routes->get('/', 'Home::index');
$routes->get('news', 'GalleryController::index');
$routes->get('components', 'Home::components');
$routes->get('opk', 'Home::opk');
$routes->get('kegiatan', 'DataKegiatanController::getAllKegiatan');
$routes->get('museum', 'Home::museum');
//$routes->get('loginadmin', 'AdminController::loginadmin');
$routes->get('adminpage', 'AdminController::adminpage');
$routes->get('listAdmin', 'AdminController::listAdmin', ['filter' => 'role:admin-pusat']);
//$routes->get('register', 'AdminController::register');
$routes->get('detailBidang/(:any)', 'Home::detailBidang/$1');
$routes->get('deleteUsers/(:num)', 'AdminController::deleteUsers/$1', ['filter' => 'role:admin-pusat']);
//Dokumen
$routes->get('dokumen', 'DokumenController::index');
$routes->get('/tambahdokumen', 'AdminController::tambahDokumen', ['filter' => 'role:admin-pusat']);
$routes->get('dokumen/download/(:num)', 'DokumenController::download/$1');
$routes->get('dokumen/readOnline/(:num)', 'DokumenController::open/$1');
$routes->get('dokumen/delete/(:num)', 'AdminController::deleteDokumen/$1', ['filter' => 'role:admin-pusat']);
//Kegiatan
$routes->get('kegiatan/(:num)', 'DataKegiatanController::detail/$1');
$routes->get('deleteKegiatan/(:num)', 'AdminController::deleteKegiatan/$1', ['filter' => 'role:admin-pusat']);
$routes->get('tambahKegiatan', 'AdminController::tambahKegiatan', ['filter' => 'role:admin-pusat']);
//OPK
$routes->get('(:num)', 'DataOpkController::detail/$1');
$routes->get('kategori/(:any)', 'DataOpkController::opkByKategori/$1');
$routes->get('tambahdata', 'AdminController::tambah');
$routes->get('opk/edit/(:num)', 'AdminController::edit/$1');
$routes->get('opk/delete/(:any)/(:num)', 'AdminController::delete/$1/$2');
//Gallery
$routes->get('detailGallery/(:num)', 'GalleryController::detailGallery/$1');
$routes->get('tambahGallery', 'AdminController::tambahGallery', ['filter' => 'role:admin-pusat']);
$routes->get('deleteGallery/(:num)', 'AdminController::deleteGallery/$1', ['filter' => 'role:admin-pusat']);
//museum
$routes->get('museum/(:num)', 'DataMuseumController::detail/$1');
$routes->get('kategoriMuseum/(:any)', 'DataMuseumController::MuseumByJenis/$1');
$routes->get('/tambahdatamuseum', 'AdminController::tambahMuseum', ['filter' => 'role:admin-pusat']);
$routes->get('museum/delete/(:num)', 'AdminController::deleteMuseum/$1', ['filter' => 'role:admin-pusat']);
$routes->get('museum/edit/(:num)', 'AdminController::editMuseum/$1', ['filter' => 'role:admin-pusat']);
//Naskah
$routes->get('Naskah', 'DataMuseumController::dataNaskah');
$routes->get('Naskah/(:num)', 'DataMuseumController::detailNaskah/$1');
$routes->get('tambahNaskah', 'AdminController::tambahNaskah', ['filter' => 'role:admin-pusat']);
$routes->get('naskah/edit/(:num)', 'AdminController::editNaskah/$1', ['filter' => 'role:admin-pusat']);
$routes->get('naskah/delete/(:num)', 'AdminController::deleteNaskah/$1', ['filter' => 'role:admin-pusat']);
//Numismatika
$routes->get('NumismatikaDanHeraldika', 'DataMuseumController::dataNumismatika');
$routes->get('tambahNumismatika', 'AdminController::tambahNumismatika', ['filter' => 'role:admin-pusat']);
$routes->get('NumismatikaDanHeraldika/(:num)', 'DataMuseumController::detailNumismatika/$1');
$routes->get('numismatika/edit/(:num)', 'AdminController::editNumismatika/$1', ['filter' => 'role:admin-pusat']);
$routes->get('numismatika/delete/(:num)', 'AdminController::deleteNumismatika/$1', ['filter' => 'role:admin-pusat']);
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
