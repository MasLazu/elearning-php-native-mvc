<?php

use CobaMVC\App\Router;
use CobaMVC\Controller\MahasiswaController;
use CobaMVC\Controller\AdminController;
use CobaMVC\Controller\AuthController;
use CobaMVC\Middleware\GuestOnly;
use CobaMVC\Middleware\MahasiswaOnly;
use CobaMVC\Middleware\LoginOnly;
use CobaMVC\Middleware\AdminOnly;
use CobaMVC\Middleware\DosenOnly;
use CobaMVC\Controller\DosenController;

require_once 'App/Router.php';
require_once 'Controller/MahasiswaController.php';
require_once 'Controller/AdminController.php';
require_once 'Controller/AuthController.php';
require_once 'Controller/DosenController.php';
require_once 'Middleware/MahasiswaOnly.php';
require_once 'Middleware/LoginOnly.php';
require_once 'Middleware/GuestOnly.php';
require_once 'Middleware/AdminOnly.php';
require_once 'Middleware/DosenOnly.php';

//memasukkan daftar route yang tersedia ke private static $routes=[] yang ada di class Route
//auth
Router::add('GET', '/auth/login', AuthController::class, 'login_page', [GuestOnly::class]);
Router::add('POST', '/auth/login', AuthController::class, 'login', [GuestOnly::class]);
Router::add('GET', '/auth/register', AuthController::class, 'register_page', [GuestOnly::class]);
Router::add('POST', '/auth/register', AuthController::class, 'register', [GuestOnly::class]);
//admin
Router::add('GET', '/admin/beranda', AdminController::class, 'beranda', [AdminOnly::class]);
Router::add('POST', '/admin/buat_pengumuman', AdminController::class, 'buat_pengumuman', [AdminOnly::class]);
Router::add('GET', '/admin/users', AdminController::class, 'users', [AdminOnly::class]);
Router::add('GET', '/admin/user_detail', AdminController::class, 'user_detail', [AdminOnly::class]);
Router::add('POST', '/admin/user_detail', AdminController::class, 'update_user_data', [AdminOnly::class]);
Router::add('GET', '/admin/kelas', AdminController::class, 'kelas', [AdminOnly::class]);
Router::add('GET', '/admin/kelas_detail', AdminController::class, 'kelas_detail', [AdminOnly::class]);
Router::add('POST', '/admin/tambah_kelas', AdminController::class, 'tambah_kelas', [AdminOnly::class]);
Router::add('GET', '/admin/mata_kuliah', AdminController::class, 'mata_kuliah', [AdminOnly::class]);
Router::add('GET', '/admin/mata_kuliah_detail', AdminController::class, 'mata_kuliah_detail', [AdminOnly::class]);
Router::add('POST', '/admin/tambah_kelas_ke_mata_kuliah', AdminController::class, 'tambah_kelas_ke_mata_kuliah', [AdminOnly::class]);
Router::add('GET', '/admin/tambah_mata_Kuliah', AdminController::class, 'tambah_mata_Kuliah_page', [AdminOnly::class]);
Router::add('POST', '/admin/tambah_mata_Kuliah', AdminController::class, 'tambah_mata_Kuliah', [AdminOnly::class]);
Router::add('GET', '/admin/request', AdminController::class, 'request', [AdminOnly::class]);
Router::add('POST', '/admin/approve_user', AdminController::class, 'approve_request', [AdminOnly::class]);
//dosen
Router::add('GET', '/dosen/beranda', DosenController::class, 'beranda', [DosenOnly::class]);
Router::add('GET', '/dosen/detail_matakuliah', DosenController::class, 'detail_matakuliah', [DosenOnly::class]);
Router::add('GET', '/dosen/detail_tugas', DosenController::class, 'detail_tugas', [DosenOnly::class]);
Router::add('GET', '/dosen/tugas_user', DosenController::class, 'tugas_user', [DosenOnly::class]);
Router::add('GET', '/dosen/buat_tugas', DosenController::class, 'buat_tugas_page', [DosenOnly::class]);
Router::add('POST', '/dosen/buat_tugas', DosenController::class, 'buat_tugas', [DosenOnly::class]);
Router::add('GET', '/dosen/jadwal', DosenController::class, 'jadwal', [DosenOnly::class]);
Router::add('GET', '/dosen/rekap_nilai', DosenController::class, 'rekap_nilai', [DosenOnly::class]);
Router::add('POST', '/dosen/save_rekap_nilai', DosenController::class, 'save_rekap_nilai', [DosenOnly::class]);
//mahasiswa
Router::add('GET', '/mahasiswa/beranda', MahasiswaController::class, 'beranda', [MahasiswaOnly::class]);
Router::add('GET', '/mahasiswa/detail_matakuliah', MahasiswaController::class, 'detail_matakuliah', [MahasiswaOnly::class]);
Router::add('GET', '/mahasiswa/jadwal', MahasiswaController::class, 'jadwal', [MahasiswaOnly::class]);
Router::add('GET', '/mahasiswa/tugas', MahasiswaController::class, 'tugas', [MahasiswaOnly::class]);
Router::add('GET', '/mahasiswa/nilai', MahasiswaController::class, 'nilai', [MahasiswaOnly::class]);
Router::add('GET', '/mahasiswa/absen', MahasiswaController::class, 'absen', [MahasiswaOnly::class]);
Router::add('GET', '/mahasiswa/detail_tugas', MahasiswaController::class, 'detail_tugas', [MahasiswaOnly::class]);
Router::add('POST', '/mahasiswa/detail_tugas/kumpulkan', MahasiswaController::class, 'kumpulkan_tugas', [MahasiswaOnly::class]);
//universal
Router::add('GET', '/detail_register', AuthController::class, 'detail_register_page', [LoginOnly::class]);
Router::add('POST', '/detail_register', AuthController::class, 'detail_register', [LoginOnly::class]);
Router::add('GET', '/logout', AuthController::class, 'logout', [LoginOnly::class]);
Router::add('GET', '/user_profile', AuthController::class, 'user_profile', [LoginOnly::class]);

//mencari route yang cocok dengan request user
Router::run();