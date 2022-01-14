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
$routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
//$routes->get('/', 'Home::index');
$routes->get('/', 'Main::index');
$routes->post('setLocale', 'Main::setLocale');
$routes->get('about', 'Main::about');
$routes->get('team', 'Main::team');
$routes->get('services', 'Main::services');
$routes->get('product', 'Main::product');
$routes->get('application', 'Main::application');
// 2021.10.18 추가
$routes->get('employers', 'Main::employers');
$routes->get('individuals', 'Main::individuals');
$routes->group('recruit', function ($routes) {
    $routes->get('/', 'Recruit::index');
    $routes->get('view/(:num)', 'Recruit::view/$1');
});

$routes->group('event', function ($routes) {
    $routes->get('/', 'Event::index');
    $routes->get('view/(:num)', 'Event::view/$1');
});

$routes->group('reservation', function ($routes) {
    $routes->get('/', 'Reservation::index');
    $routes->post('proc', 'Reservation::process');
    $routes->get('confirm', 'Reservation::confirm');
    $routes->post('confirm', 'Reservation::findReservation');
    $routes->post('checkValid', 'Reservation::checkValid');
});

$routes->group('policy', function ($routes) {
    $routes->get('agreement', 'Policy::agreement');
    $routes->get('privacy', 'Policy::privacy');
    $routes->get('refund', 'Policy::refund');
});

$routes->group('contact', function ($routes) {
    $routes->get('/', 'Contact::index');
    $routes->post('/', 'Contact::register');
});
// 2022.01.10 추가
$routes->get('media', 'Main::media');

/*
$routes->group('admin', function ($routes) {
    $routes->get('/', 'Admin/Member::index');
    $routes->post('member/login', 'Admin/Member::loginProc');

    $routes->get('reservation', 'Admin/Reservation::list');
    $routes->get('reservation/view', 'Admin/Reservation::view');
    $routes->post('reservation/modify', 'Admin/Reservation::modify');

    $routes->get('center', 'Admin/Center::list');
    $routes->get('centerEng', 'Admin/Center::listEng');
});
 */
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
