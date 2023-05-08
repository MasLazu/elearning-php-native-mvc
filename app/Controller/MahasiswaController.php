<?php

namespace CobaMVC\Controller;

use CobaMVC\App\View;

require_once __DIR__ . "/../App/View.php";

class MahasiswaController
{
    public function beranda(): void
    {
        View::render("mahasiswa/beranda", [
            'username' => 'Tachul Bonjez'
        ]);
    }
    public function jadwal(): void
    {
        View::render("mahasiswa/jadwal", [
            'username' => 'Tachul Bonjez'
        ]);
    }
    public function tugas(): void
    {
        View::render("mahasiswa/tugas", [
            'username' => 'Tachul Bonjez'
        ]);
    }
    public function absen(): void
    {
        View::render("mahasiswa/absen", [
            'username' => 'Tachul Bonjez'
        ]);
    }
    public function detailTugas(): void
    {
        View::render("mahasiswa/detail_tugas", [
            'username' => 'Tachul Bonjez'
        ]);
    }
}