<?php

namespace CobaMVC\Controller;

use CobaMVC\App\View;
use CobaMVC\Config\Database;
use CobaMVC\Domain\Kelas;
use CobaMVC\Domain\Matakuliah;
use CobaMVC\Domain\Pengumuman;
use CobaMVC\Domain\User;
use CobaMVC\Domain\MatakuliahKelas;
use CobaMVC\Repository\JurusanRepository;
use CobaMVC\Repository\MatakuliahRepository;
use CobaMVC\Repository\PengumumanRepositry;
use CobaMVC\Repository\SessionRepository;
use CobaMVC\Repository\UserRepository;
use CobaMVC\Repository\KelasRepository;
use CobaMVC\Service\MatakuliahService;
use CobaMVC\Service\SessionService;
use CobaMVC\Service\UserService;

require_once __DIR__ . "/../App/View.php";
require_once __DIR__ . "/../Config/Database.php";
require_once __DIR__ . "/../Domain/User.php";
require_once __DIR__ . "/../Domain/Kelas.php";
require_once __DIR__ . "/../Domain/MatakuliahKelas.php";
require_once __DIR__ . "/../Repository/SessionRepository.php";
require_once __DIR__ . "/../Repository/UserRepository.php";
require_once __DIR__ . "/../Repository/KelasRepository.php";
require_once __DIR__ . "/../Repository/MatakuliahRepository.php";
require_once __DIR__ . "/../Repository/PengumumanRepositry.php";
require_once __DIR__ . "/../Repository/JurusanRepository.php";
require_once __DIR__ . "/../Service/SessionService.php";
require_once __DIR__ . "/../Service/UserService.php";
require_once __DIR__ . "/../Service/MatakuliahService.php";

class AdminController
{
    private UserService $userService;
    private UserRepository $userRepository;
    private SessionService $sessionService;
    private KelasRepository $kelasRepository;
    private MatakuliahRepository $matakuliahRepository;
    private MatakuliahService $matakuliahService;
    private PengumumanRepositry $pengumumanRepositry;
    private JurusanRepository $jurusanRepository;

    public function __construct()
    {
        $connection = Database::getConnection();
        $matakuliahRepository = new MatakuliahRepository($connection);
        $this->jurusanRepository = new JurusanRepository($connection);
        $this->matakuliahRepository = $matakuliahRepository;
        $this->matakuliahService = new MatakuliahService($matakuliahRepository);
        $this->pengumumanRepositry = new PengumumanRepositry($connection);
        $userRepository = new UserRepository($connection);
        $this->userRepository = $userRepository;
        $sessionRepository = new SessionRepository($connection);
        $this->kelasRepository = new KelasRepository($connection);
        $sessionService = new SessionService($sessionRepository, $userRepository);
        $this->sessionService = $sessionService;
        $this->userService = new UserService($userRepository, $sessionRepository, $sessionService);
    }

    public function beranda(): void
    {
        $user = $this->sessionService->current();
        $pengumuman = $this->pengumumanRepositry->getAll();
        View::render("admin/beranda", [
            "user" => $user,
            "pengumuman" => $pengumuman,
        ]);
    }

    public function request(): void
    {
        $user = $this->sessionService->current();
        $users = $this->userRepository->getAllUserWithNoRole();
        View::render("admin/request", [
            "user" => $user,
            "users_request" => $users
        ]);
    }

    public function approve_request(): void
    {
        $user = new User();
        $user->email = $_POST['email'];
        $user->role_id = intval($_POST['role_id']);
        if($user->role_id == '3'){
            $user->jurusan_id = intval($_POST['jurusan_id']);
            $user->kelas_id = intval($_POST['kelas_id']);
            $user->semester_id = 1;
        }
        $this->userService->approveByEmail($user);
        View::redirect("/admin/request", "message=success approve " . $user->email);
    }

    public function mata_kuliah(): void
    {
        $user = $this->sessionService->current();
        $matakuliah = $this->matakuliahRepository->getAllWithDosenName();
        View::render("admin/mata_kuliah", [
            "user" => $user,
            "matakuliah" => $matakuliah,
        ]);
    }

    public function kelas(): void
    {
        $kelas = $this->kelasRepository->getAllWithSemesterWhereHaveMember();
        $user = $this->sessionService->current();
        View::render("admin/kelas", [
            "user" => $user,
            "kelas" => $kelas,
        ]);
    }

    public function users(): void
    {
        $users = $this->userRepository->getAllApprovedUser();
        $user = $this->sessionService->current();
        View::render("admin/users", [
            "user" => $user,
            "users" => $users,
        ]);
    }

    public function tambah_mata_Kuliah_page(): void
    {
        $user = $this->sessionService->current();
        $dosen = $this->userRepository->getAllUserWithCertainRole(2);
        View::render("admin/tambah_mata_kuliah", [
            "user" => $user,
            "dosen" => $dosen,
        ]);
    }

    public function tambah_mata_Kuliah(): void
    {
        $matakuliah = new Matakuliah();
        $matakuliah->nama = $_POST['nama'];
        $matakuliah->dosen_id = $_POST['dosen_id'];
        $matakuliah->hari = $_POST['hari'];
        $matakuliah->jam_mulai = $_POST['jam_mulai'];
        $matakuliah->jam_selesai = $_POST['jam_selesai'];
        $matakuliah->ruangan = $_POST['ruangan'];
        $this->matakuliahRepository->create($matakuliah);
        View::redirect("/admin/mata_kuliah", "message=Berhasil menambah mata kuliah");
    }

    public function tambah_kelas(): void
    {
        $kelas = new Kelas();
        $kelas->nama = $_POST['nama'];
        $kelas->jurusan_id = $_POST['jurusan_id'];
        $this->kelasRepository->create($kelas);
        View::redirect("/admin/kelas", "message=Berhasil menambahkan kelas");
    }

    public function user_detail(): void
    {
        $jurusan = $this->jurusanRepository->getAllJurusan();
        $kelas = $this->kelasRepository->getAll();
        $detailUser = $this->userRepository->findById($_GET['id']);
        View::render("admin/user_detail", [
            "jurusan" => $jurusan,
            "detail_user" => $detailUser,
            "kelas" => $kelas,
        ]);
    }

    public function kelas_detail(): void
    {
        $user = $this->sessionService->current();
        $kelas_id = intval($_GET['id']);
        $semester = intval($_GET['semester']);
        $matakuliah = $this->matakuliahRepository->getAllWithCertainKelasWithDosenName(intval($_GET['id']), intval($_GET['semester']));
        $kelas = $this->kelasRepository->getById($kelas_id);
        $users = $this->userRepository->getAllUserWithCertainKelasAndSemester($kelas_id, $semester);
        View::render("admin/kelas_detail", [
            "kelas" => $kelas,
            "semester" => $semester,
            "users" => $users,
            "user" => $user,
            "matakuliah" => $matakuliah,
        ]);
    }

    public function mata_kuliah_detail(): void
    {
        $user = $this->sessionService->current();
        $matakuliah = $this->matakuliahRepository->getById(intval($_GET['id']));
        $dosen = $this->userRepository->findById($matakuliah->dosen_id);
        $kelas = $this->matakuliahRepository->getKelasYangMengikutiById(intval($_GET['id']));
        View::render("admin/mata_kuliah_detail", [
            "matakuliah" => $matakuliah,
            "dosen" => $dosen,
            "kelas" => $kelas,
            "user" => $user,
        ]);
    }

    public function tambah_kelas_ke_mata_kuliah(): void
    {
        $matakuliahKelas = new MatakuliahKelas();
        $matakuliahKelas->kelas_id = $_POST['kelas_id'];
        $matakuliahKelas->pelajaran_id = $_POST['pelajaran_id'];
        $matakuliahKelas->semester_id = $_POST['semester_id'];
        if($this->matakuliahService->tambahKelas($matakuliahKelas)){
            View::redirect("/admin/mata_kuliah_detail", "id=" . $_POST['pelajaran_id'] . "message=Berhasil menambahkan kelas");
        }
        View::redirect("/admin/mata_kuliah_detail", "id=" . $_POST['pelajaran_id'] . "message=Kelas sudah ada");
    }

    public function buat_pengumuman(): void
    {
        $pengumuman = new Pengumuman();
        $pengumuman->judul = $_POST['judul'];
        $pengumuman->isi = $_POST['isi'];
        $this->pengumumanRepositry->save($pengumuman);
        View::redirect("/admin/beranda", "message=berhasil membuat pengumuman");
    }

    public function update_user_data(): void
    {
        $user = $this->userRepository->findById($_POST['id']);
        $user->id = $_POST['id'];
        $user->nama = $_POST['nama'];
        $user->jurusan_id = $_POST['jurusan_id'];
        $user->kelas_id = $_POST['kelas_id'];
        $user->tempat_lahir = $_POST['tempat_lahir'];
        $user->tanggal_lahir = new \DateTime($_POST['tanggal_lahir']);
        $user->jenis_kelamin = $_POST['jenis_kelamin'];
        $user->semester_id = $_POST['semester_id'];
        $user->domisili = $_POST['domisili'];
        $this->userRepository->updateUserData($user);
        View::redirect("/admin/user_detail", "id=" . $user->id . "&message=berhasil merubah data");
    }
}