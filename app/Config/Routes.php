<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

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
$routes->get('/', 'Home::index');
$routes->get('login', 'Login::index');
$routes->get('roles', 'Roles::index');
$routes->get('add_role', 'Roles::add_role');
$routes->get('user_list', 'User::index');

// catlog routes
$routes->get('Catlog-view', 'Catlog::Catlog_view');
$routes->get('Catlog-add', 'Catlog::Catlog_add');
$routes->post('/Catlog-upload', 'Catlog::Catlog_upload');
$routes->get('/Catlog-update/(:num)', 'Catlog::Catlog_update/$1');
$routes->post('/Catlog-update-done', 'Catlog::Catlog_update_done');
$routes->post('/Catlog-delete', 'Catlog::Catlog_delete');

// master attributes routes
$routes->get('/master-attribute-view', 'Catlog::master_attr_view');
$routes->post('/master-attribute-upload', 'Catlog::master_attr_upload');
$routes->post('/master-attribute-delete', 'Catlog::master_attr_delete');
$routes->post('/master-attribute-update', 'Catlog::master_attr_update');

// attributes variations routes
$routes->get('/attribute-variation-list', 'Catlog::attr_variation_list');
$routes->post('/attribute-variation-upload', 'Catlog::attr_variation_upload');
$routes->post('/attribute-variation-update', 'Catlog::attr_variation_update');
$routes->post('/attribute-variation-delete', 'Catlog::attr_variation_delete');







// $routes->match(['get', 'post'], 'categorie', 'Categories::categorie_add');

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
