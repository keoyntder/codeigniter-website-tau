<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Home::index');

// Admin Login Processing Routes
$routes->get('admin', 'Admin\Login::index');
$routes->post('admin/login', 'Admin\Login::authenticate');

// Dashboard & Logout System Routes
$routes->get('dashboard', 'Admin\Login::dashboard');
$routes->get('logout', 'Admin\Login::logout');

// Departments (specific routes must come before the (:segment) catch-all)
$routes->get('departments/cet', 'DepartmentController::cet');
$routes->get('departments/cas', 'DepartmentController::cas');
$routes->get('departments/caf', 'DepartmentController::caf');
$routes->get('departments/cbm', 'DepartmentController::cbm');
$routes->get('departments/cvm', 'DepartmentController::cvm');
$routes->get('departments/ced', 'DepartmentController::ced');
$routes->get('departments/(:segment)', 'Admissions::department/$1');

// Main pages
$routes->get('research', 'Research::index');
$routes->get('office-of-the-president', 'President::index');

// Offices Under the OP
$routes->get('office-of-the-president/offices', 'President::planningDevelopment');
$routes->get('office-of-the-president/offices/planning-and-development', 'President::planningDevelopment');
$routes->get('office-of-the-president/offices/external-linkage', 'President::elia');

$routes->get('admissions', 'Admissions::index');
$routes->get('careers', 'Careers::index');

$routes->get('admin/dashboard', 'Admin\Admin::index');

// About
$routes->get('about', 'Home::about');

// History
$routes->get('history', 'History::index');

$routes->get('offices', 'Offices::index');

// Route group for controllers inside the app/Controllers/Admin/ subfolder
$routes->group('admin', function ($routes) {
    $routes->get('research', 'Admin\Research::index');
    $routes->get('research/edit/(:num)', 'Admin\Research::edit/$1');
    $routes->post('research/update/(:num)', 'Admin\Research::update/$1');

    $routes->get('offices', 'Admin\Offices::index');
    $routes->get('offices/create', 'Admin\Offices::create');
    $routes->post('offices/store', 'Admin\Offices::store');
    $routes->get('offices/edit/(:num)', 'Admin\Offices::edit/$1');
    $routes->post('offices/update/(:num)', 'Admin\Offices::update/$1');
    $routes->post('offices/delete/(:num)', 'Admin\Offices::delete/$1');
});