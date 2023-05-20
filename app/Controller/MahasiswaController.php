<?php

namespace CobaMVC\Controller;

use CobaMVC\App\View;
use CobaMVC\Config\Database;
use CobaMVC\Domain\TugasUser;
use CobaMVC\Domain\User;
use CobaMVC\Repository\JurusanRepository;
use CobaMVC\Repository\MatakuliahRepository;
use CobaMVC\Repository\NilaiRepository;
use CobaMVC\Repository\PengumumanRepositry;
use CobaMVC\Repository\SessionRepository;
use CobaMVC\Repository\TugasRepository;
use CobaMVC\Repository\TugasuserReposiroty;
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
require_once __DIR__ . "/../Repository/TugasuserReposiroty.php";
require_once __DIR__ . "/../Repository/PengumumanRepositry.php";
require_once __DIR__ . "/../Repository/MatakuliahRepository.php";
require_once __DIR__ . "/../Repository/NilaiRepository.php";

class MahasiswaController
{
    private UserService $userService;
    private UserRepository $userRepository;
    private SessionService $sessionService;
    private PengumumanRepositry $pengumumanRepositry;
    private MatakuliahRepository $matakuliahRepository;
    private TugasRepository $tugasRepository;
    private FileService $fileService;
    private TugasuserReposiroty $tugasuserReposiroty;
    private NilaiRepository $nilaiRepository;

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
        $this->tugasRepository = new TugasRepository($connection);
        $this->fileService = new FileService();
        $this->tugasuserReposiroty = new TugasuserReposiroty($connection);
        $this->nilaiRepository = new NilaiRepository($connection);
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
        $semester = $_GET["semester"];
        $jadwal = $this->matakuliahRepository->getMatakuliahYangDiikutiWithDosenByUserId($user->id, $semester);
        View::render("mahasiswa/jadwal", [
            "user" => $user,
            "jadwal" => $jadwal,
        ]);
    }

    public function tugas(): void
    {
        $user = $this->sessionService->current();
        $matakuliah = $this->matakuliahRepository->getMatakuliahYangDiikutiWithDosenByUserId($user->id, $user->semester_id);
        if(isset($_GET['id']) && $_GET['id']){
            $tugas = $this->tugasRepository->getAllUserTugasWhereMatakuliah($user->id, intval($_GET['id']));
        } else {
            $tugas = $this->tugasRepository->getAllUserTugas($user->id);
        }
        View::render("mahasiswa/tugas", [
            "user" => $user,
            "matakuliah" => $matakuliah,
            "tugas" => $tugas,
        ]);
    }

    public function nilai(): void
    {
        $user = $this->sessionService->current();
        $matakuliah = $this->matakuliahRepository->getMatakuliahYangDiikutiWithDosenByUserId($user->id, intval($_GET['semester']));
        if(isset($_GET['semester']) && $_GET['semester']){
            $semester = intval($_GET['semester']);
        } else {
            View::redirect("/mahasiswa/nilai", "semester=" . $user->semester_id);
        }
        $nilai = $this->nilaiRepository->getMahasiswaNilaiData($user->id, $semester);
        View::render("mahasiswa/nilai", [
            "user" => $user,
            "matakuliah" => $matakuliah,
            "nilai" => $nilai,
        ]);
    }

    public function absen(): void
    {
        $user = $this->sessionService->current();
        View::render("mahasiswa/absen", [
            'user' => $user
        ]);
    }

    public function detail_tugas(): void
    {
        $user = $this->sessionService->current();
        $tugas = $this->tugasRepository->getById($_GET['id']);
        $tugasUser = $this->tugasuserReposiroty->getByUserIdAndTugasId($user->id, $tugas->id);
        View::render("mahasiswa/detail_tugas", [
            "user" => $user,
            "tugas" => $tugas,
            "tugasUser" => $tugasUser,
        ]);
    }

    public function kumpulkan_tugas(): void
    {
        $user = $this->sessionService->current();
        $tugasUser = new TugasUser();
        $tugasUser->user_id = $user->id;
        $tugasUser->tugas_id = intval($_POST['id']);
        $tugasUser->catatan = $_POST['catatan'];
        $tugasUser->kumpulkan_at = new \DateTime();
        if(isset($_FILES['file']) && $_FILES['file']['error'] == UPLOAD_ERR_OK){
            $tugasUser->link_file_pengumpulan = $this->fileService->uploadTugas($tugasUser->tugas_id, $user->id, $_FILES['file']['tmp_name'], $_FILES['file']['name']);
        }

        $this->tugasuserReposiroty->save($tugasUser);

        View::redirect("/mahasiswa/detail_tugas", "id=" . $tugasUser->tugas_id . "&&message=Berhasil mengumpulkan tugas");
    }

    public function detail_matakuliah(): void
    {
        $user = $this->sessionService->current();
        $matakuliah = $this->matakuliahRepository->getById($_GET['id']);
        $tugas = $this->tugasRepository->getAllCertainMatakuliah($_GET['id']);
        $mahasiswa = $this->userRepository->getAllUserWithCertainMatakuliah($_GET['id']);
        $dosen = $this->userRepository->findById($matakuliah->dosen_id);
        View::render("mahasiswa/detail_matakuliah", [
            "user" => $user,
            "matakuliah" => $matakuliah,
            "dosen" => $dosen,
            "tugas" => $tugas,
            "mahasiswa" => $mahasiswa,
        ]);
    }
}