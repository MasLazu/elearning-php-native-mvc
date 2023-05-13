<?php

namespace CobaMVC\Controller;

use CobaMVC\App\View;
use CobaMVC\Config\Database;
use CobaMVC\Domain\User;
use CobaMVC\Repository\JurusanRepository;
use CobaMVC\Repository\MatakuliahRepository;
use CobaMVC\Repository\PengumumanRepositry;
use CobaMVC\Repository\SessionRepository;
use CobaMVC\Service\FileService;
use CobaMVC\Service\UserService;
use CobaMVC\Service\SessionService;
use CobaMVC\Repository\UserRepository;

require_once __DIR__ . "/../App/View.php";
require_once __DIR__ . "/../Domain/User.php";
require_once __DIR__ . "/../Domain/Session.php";
require_once __DIR__ . "/../Config/Database.php";
require_once __DIR__ . "/../Service/UserService.php";
require_once __DIR__ . "/../Service/FileService.php";
require_once __DIR__ . "/../Service/SessionService.php";
require_once __DIR__ . "/../Repository/UserRepository.php";
require_once __DIR__ . "/../Repository/SessionRepository.php";
require_once __DIR__ . "/../Repository/JurusanRepository.php";
require_once __DIR__ . "/../Repository/PengumumanRepositry.php";
require_once __DIR__ . "/../Repository/MatakuliahRepository.php";

class MahasiswaController
{
    private UserService $userService;
    private UserRepository $userRepository;
    private SessionService $sessionService;
    private PengumumanRepositry $pengumumanRepositry;
    private MatakuliahRepository $matakuliahRepository;
    public function __construct()
    {
        $connection = Database::getConnection();
        $userRepository = new UserRepository($connection);
        $this->matakuliahRepository = new MatakuliahRepository($connection);
        $this->userRepository = $userRepository;
        $sessionRepository = new SessionRepository($connection);
        $this->pengumumanRepositry = new PengumumanRepositry($connection);
        $sessionService = new SessionService($sessionRepository, $userRepository);
        $this->sessionService = $sessionService;
        $this->userService = new UserService($userRepository, $sessionRepository, $sessionService);
    }

    public function beranda(): void
    {
        $user = $this->sessionService->current();
        $matakuliah = $this->matakuliahRepository->getMatakuliahYangDiikutiWithDosen($user->kelas_id, $user->semester_id);
        $pengumuman = $this->pengumumanRepositry->getAll();
        View::render("mahasiswa/beranda", [
            "user" => $user,
            "pengumuman" => $pengumuman,
            "matakuliah" => $matakuliah,
        ]);
    }
    public function jadwal(): void
    {
        $user = $this->sessionService->current();
        View::render("mahasiswa/jadwal", [
            'user' => $user
        ]);
    }
    public function tugas(): void
    {
        $user = $this->sessionService->current();
        View::render("mahasiswa/tugas", [
            'user' => $user
        ]);
    }

    public function nilai(): void
    {
        $user = $this->sessionService->current();
        View::render("mahasiswa/nilai", [
            'user' => $user
        ]);
    }

    public function absen(): void
    {
        $user = $this->sessionService->current();
        View::render("mahasiswa/absen", [
            'user' => $user
        ]);
    }
    public function detailTugas(): void
    {
        $user = $this->sessionService->current();
        View::render("mahasiswa/detail_tugas", [
            'user' => $user
        ]);
    }
    public function detail_matakuliah(): void
    {
        $matakuliah = $this->matakuliahRepository->getById($_GET['id']);
        $mahasiswa = $this->userRepository->getAllUserWithCertainMatakuliah($_GET['id']);
        $dosen = $this->userRepository->findById($matakuliah->dosen_id);
        View::render("mahasiswa/detail_matakuliah", [
            "matakuliah" => $matakuliah,
            "dosen" => $dosen,
            "mahasiswa" => $mahasiswa,
        ]);
    }
}