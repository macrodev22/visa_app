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
$routes->setDefaultController('Visa');
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
$routes->get('/', 'Visa::index');
$routes->get('/apply/' , 'Visa::index');
$routes->get('/login/', 'Visa::managerLogin');
$routes->get('/login/manager/', 'Visa::managerLogin');
$routes->get('/login/admin/', 'Visa::adminLogin');
$routes->get('/signup/', 'Visa::signup');
$routes->get('/checkapplication/', 'Visa::checkApplication');
$routes->get('/checkapplication/user/', 'ApplicationController::showApplicationStatusLoggedIn');
$routes->get('/user/staff/', 'Staff::dashboard');
$routes->get('/logout/', 'Staff::logout');
$routes->get('/applications/', 'ApplicationController::show');
$routes->get('/applications/viewpdf/', 'ApplicationController::generateVisa');
$routes->get('/test/', 'ApplicationController::test');


$routes->post('/test/', 'ApplicationController::test');
$routes->post('/login/manager/', 'Staff::staffLoginAuthenticate');
$routes->post('/login/admin/', 'Staff::staffLoginAuthenticate');
$routes->post('/signup/', 'Staff::create');
$routes->post('/newapplication/', 'Visa::processApplicantForm');
$routes->post('/checkapplication/', 'ApplicationController::showApplicationStatus');


// API Routes 
$routes->get('/api/visa-req/', 'Visa::getVisaRequirements');
$routes->get('/api/users/', 'Api::getUsers');
$routes->get('/api/visas/', 'Api::getVisaTypes');
$routes->get('/api/requirements', 'Api::getRequirements');
$routes->post('/api/admin/add-user', 'Api::adminAddStaff');
$routes->get('/api/application/', 'Api::applications');

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
