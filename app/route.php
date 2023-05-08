<?php

use CobaMVC\App\Router;
use CobaMVC\Controller\MahasiswaController;
use CobaMVC\Controller\AdminController;
use CobaMVC\Controller\AuthController;
use CobaMVC\Middleware\GuestOnly;
use CobaMVC\Middleware\MahasiswaOnly;
use CobaMVC\Middleware\LoginOnly;
use CobaMVC\Middleware\AdminOnly;

require_once 'App/Router.php';
require_once 'Controller/MahasiswaController.php';
require_once 'Controller/AdminController.php';
require_once 'Controller/AuthController.php';
require_once 'Middleware/MahasiswaOnly.php';
require_once 'Middleware/LoginOnly.php';
require_once 'Middleware/GuestOnly.php';
require_once 'Middleware/AdminOnly.php';

//memasukkan daftar route yang tersedia ke private static $routes=[] yang ada di class Route
//auth
Router::add('GET', '/auth/login', AuthController::class, 'login_page', [GuestOnly::class]);
Router::add('POST', '/auth/login', AuthController::class, 'login', [GuestOnly::class]);
Router::add('GET', '/auth/register', AuthController::class, 'register_page', [GuestOnly::class]);
Router::add('POST', '/auth/register', AuthController::class, 'register', [GuestOnly::class]);
//admin
Router::add('GET', '/admin/beranda', AdminController::class, 'beranda', [AdminOnly::class]);
Router::add('GET', '/admin/request', AdminController::class, 'request', [AdminOnly::class]);
Router::add('POST', '/admin/approve_user', AdminController::class, 'approve_request', [AdminOnly::class]);
//mahasiswa
Router::add('GET', '/mahasiswa/beranda', MahasiswaController::class, 'beranda', [MahasiswaOnly::class]);
Router::add('GET', '/mahasiswa/jadwal', MahasiswaController::class, 'jadwal', [MahasiswaOnly::class]);
Router::add('GET', '/mahasiswa/tugas', MahasiswaController::class, 'tugas', [MahasiswaOnly::class]);
Router::add('GET', '/mahasiswa/absen', MahasiswaController::class, 'absen', [MahasiswaOnly::class]);
Router::add('GET', '/mahasiswa/detail_tugas', MahasiswaController::class, 'detailtugas', [MahasiswaOnly::class]);
//universal
Router::add('GET', '/detail_register', AuthController::class, 'detail_register_page', [LoginOnly::class]);
Router::add('POST', '/detail_register', AuthController::class, 'detail_register', [LoginOnly::class]);
Router::add('GET', '/logout', AuthController::class, 'logout', [LoginOnly::class]);

//mencari route yang cocok dengan request user
Router::run();