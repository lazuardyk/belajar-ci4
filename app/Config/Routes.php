<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes(true);

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

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'Home::index');
$routes->get('/', 'CompanyController::showCompanyList');
$routes->get('/edit-company', function () {
	return view('edit-company');
});
$routes->get('/edit-company/(:num)', 'CompanyController::showSpecificCompany/$1');
$routes->get('/delete-company/(:num)', 'CompanyController::deleteCompany/$1');
$routes->get('/detail-company/(:num)', 'CompanyController::showCompanyDetail/$1');

$routes->get('/employee-list/(:num)', 'EmployeeController::showEmployeeList/$1');
$routes->get('/delete-employee/(:num)/(:num)', 'EmployeeController::deleteEmployee/$1/$2');
$routes->get('/edit-employee/(:num)/', 'EmployeeController::showAddEmployee/$1');
$routes->get('/edit-employee/(:num)/(:num)', 'EmployeeController::showSpecificEmployee/$1/$2');

$routes->post('/edit-employee/(:num)/(:num)', 'EmployeeController::editEmployee/$1/$2');
$routes->post('/edit-employee/(:num)/add', 'EmployeeController::addEmployee/$1');
$routes->post('/edit-company/(:num)', 'CompanyController::editCompany/$1');
$routes->post('/edit-company/add', 'CompanyController::addCompany');
$routes->post('/add-company', 'CompanyController::addCompany');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
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
