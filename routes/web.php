<?php

use App\Controllers\CarController;
use Route\Router;
use App\Controllers\UserController;
use App\Controllers\RentalController;

$router = new Router();

$router->get('/regist', UserController::class, 'viewRegist');
$router->post('/regist', UserController::class, 'regist');
$router->get('/login', UserController::class, 'viewLogin');
$router->post('/login', UserController::class, 'login');
$router->get('/dashboard', UserController::class, 'dashboard');
$router->get('/car', CarController::class, 'viewCars');
$router->get('/rental', RentalController::class, 'viewRental');
$router->post('/rental', RentalController::class, 'rental');
$router->get('/invoice', RentalController::class, 'viewInv');
$router->get('/pembayaran', RentalController::class, 'viewPemb');
$router->post('/pembayaran', RentalController::class, 'updatePemb');
$router->get('/update', CarController::class, 'viewUpdate');
$router->post('/update', CarController::class, 'updateCar');
$router->get('/addCar', CarController::class, 'viewAdd');
$router->post('/addCar', CarController::class, 'addCars');
$router->post('/delete', CarController::class, 'delete');
$router->get('/logout', UserController::class, 'logout');


$router->dispatch();