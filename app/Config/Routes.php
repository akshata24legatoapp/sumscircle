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
$routes->post('check_login', 'Login::check_login');
$routes->post('save_user', 'Admin::save_users');
$routes->post('save_role', 'Admin::save_role');
$routes->post('deleteRole', 'Admin::deleteRole');
$routes->post('deleteUser', 'Admin::deleteUser');
$routes->post('checkpassword', 'Login::checkpassword');
$routes->post('updatePassword', 'Login::updatePassword');
$routes->post('updateProfile', 'Login::updateProfile');
$routes->post('/Catlog-upload', 'Catlog::Catlog_upload');
$routes->post('/Catlog-update-done', 'Catlog::Catlog_update_done');
$routes->post('/Catlog-delete', 'Catlog::Catlog_delete');
$routes->post('/master-attribute-upload', 'Catlog::master_attr_upload');
$routes->post('/master-attribute-delete', 'Catlog::master_attr_delete');
$routes->post('/master-attribute-update', 'Catlog::master_attr_update');
$routes->post('/attribute-variation-upload', 'Catlog::attr_variation_upload');
$routes->post('/attribute-variation-update', 'Catlog::attr_variation_update');
$routes->post('/attribute-variation-delete', 'Catlog::attr_variation_delete');
$routes->post('/save_inventory', 'Inventory::save_inventory');



$routes->group('',['filter' => 'auth'], function ($routes) {

    $routes->get('logout', 'Login::logout');
    $routes->get('dashboard', 'Dashboard::index');
    $routes->get('add_role', 'Admin::add_role');
    $routes->get('roles', 'Admin::index');
    $routes->get('edit_role/(:any)', 'Admin::edit_role/$1');
    $routes->get('user_list', 'Admin::user_list');
    $routes->get('add_user', 'Admin::add_users');
    $routes->get('edit_user/(:any)', 'Admin::edit_user/$1');
    $routes->get('view_user_rights/(:any)', 'Admin::view_user_rights/$1');
    $routes->get('change_password', 'Login::change_password');
    $routes->get('view_profile', 'Login::view_profile');
    $routes->get('/master-attribute-view', 'Catlog::master_attr_view');
    $routes->get('Catlog-view', 'Catlog::Catlog_view');
    $routes->get('Catlog-add', 'Catlog::Catlog_add');
    $routes->get('/Catlog-update/(:num)', 'Catlog::Catlog_update/$1');
    $routes->get('/attribute-variation-list', 'Catlog::attr_variation_list');
    $routes->get('inventory', 'Inventory::index');
    $routes->get('add_inventory', 'Inventory::add_inventory');
    $routes->get('getProductsku', 'Inventory::getProductsku');
    $routes->get('edit_inventory/(:any)', 'Inventory::edit_inventory/$1');


});




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
