<?php

use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */

$routes->get('/', 'Home::index');

// Admin Login Processing Routes
$routes->get('admin', 'Admin\Login::index');
$routes->post('admin/login', 'Admin\Login::authenticate'); // Points to authenticate()

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
$routes->get('admissions', 'Admissions::index');
$routes->get('careers', 'Careers::index');
$routes->get('admin/dashboard', 'Admin::index');

// About (all sub-pages are panels inside app/Views/about.php)
$routes->get('about', 'Home::about');

// Standalone history route (remove if you only use about/history)
$routes->get('history', 'History::index');

// Route group for controllers inside the app/Controllers/Admin/ subfolder
$routes->group('admin', function ($routes) {
    $routes->get('research', 'Admin\Research::index');
    $routes->get('research/edit/(:num)', 'Admin\Research::edit/$1');
    $routes->post('research/update/(:num)', 'Admin\Research::update/$1');
});