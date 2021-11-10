<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
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
//ambulance
$routes->get('homee', 'Page::homee');
$routes->get('about', 'Page::about');
$routes->get('galerii', 'Page::galerii');
$routes->get('layanan', 'Home::layanan');
//admin
$routes->get('b_edit', 'Page::b_edit');

//register
$routes->get('/register', 'Register::index');
$routes->post('/register/process', 'Register::process');
//login dan logout
$routes->get('/login', 'Login::index');
$routes->post('/login/process', 'Login::process');
$routes->get('/logout', 'Login::logout');

//booking
$routes->get('/booking', 'Booking::index');
$routes->post('/booking/store', 'Booking::store');
$routes->get('booking/b_edit/(:num)', 'Booking::b_edit/$1');
$routes->post('booking/update/(:num)', 'Booking::update/$1');
$routes->get('booking/delete/(:num)', 'Booking::delete/$1');

//admin

$routes->get('/adminn', 'Users::index');
$routes->get('/contact', 'Contact::index');

//crew
$routes->get('c_crew', 'Page::c_crew');
$routes->get('crew/c_edit/(:num)', 'Crew::c_edit/$1');
$routes->post('crew/update/(:num)', 'Crew::update/$1');
$routes->get('crew/delete/(:num)', 'Crew::delete/$1');

//galeri
$routes->get('galeri', 'Galeri::index');
$routes->get('c_galeri', 'Page::c_galeri');
$routes->get('galeri/c_edit/(:num)', 'Galeri::g_edit/$1');
$routes->post('galeri/update/(:num)', 'Galeri::update/$1');
$routes->get('galeri/delete/(:num)', 'Galeri::delete/$1');

//kegiatan
$routes->get('c_kegiatan', 'Page::c_kegiatan');
$routes->get('kegiatan/k_edit/(:num)', 'Kegiatan::k_edit/$1');
$routes->post('kegiatan/update/(:num)', 'Kegiatan::update/$1');
$routes->get('kegiatan/delete/(:num)', 'Kegiatan::delete/$1');
$routes->get('kegiatan', 'Kegiatan::index');
$routes->get('kegiatan', 'Kegiatan::index1');


//layanan
$routes->get('layanann', 'Layanan::index');
$routes->get('c_layanan', 'Page::c_layanan');
$routes->get('layanan', 'Layanan::index');
$routes->get('layanan/l_edit/(:num)', 'Layanan::l_edit/$1');
$routes->post('layanan/update/(:num)', 'Layanan::update/$1');
$routes->get('layanan/delete/(:num)', 'Layanan::delete/$1');

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
