<?php

namespace CobaMVC\Controller;

use CobaMVC\App\View;
use CobaMVC\Config\Database;
use CobaMVC\Domain\Nilai;
use CobaMVC\Domain\Tugas;
use CobaMVC\Repository\MatakuliahRepository;
use CobaMVC\Repository\NilaiRepository;
use CobaMVC\Repository\PengumumanRepositry;
use CobaMVC\Repository\SessionRepository;
use CobaMVC\Repository\TugasRepository;
use CobaMVC\Repository\TugasuserReposiroty;
use CobaMVC\Repository\UserRepository;
use CobaMVC\Service\FileService;
use CobaMVC\Service\NilaiService;
use CobaMVC\Service\SessionService;

require_once __DIR__ . "/../App/View.php";
require_once __DIR__ . "/../Config/Database.php";
require_once __DIR__ . "/../Domain/Tugas.php";
require_once __DIR__ . "/../Repository/UserRepository.php";
require_once __DIR__ . "/../Repository/TugasRepository.php";
require_once __DIR__ . "/../Repository/SessionRepository.php";
require_once __DIR__ . "/../Repository/PengumumanRepositry.php";
require_once __DIR__ . "/../Repository/MatakuliahRepository.php";
require_once __DIR__ . "/../Repository/TugasuserReposiroty.php";
require_once __DIR__ . "/../Repository/NilaiRepository.php";
require_once __DIR__ . "/../Service/SessionService.php";
require_once __DIR__ . "/../Service/NilaiService.php";
require_once __DIR__ . "/../Service/FileService.php";

class DosenController
{
    private UserRepository $userRepository;
    private SessionService $sessionService;
    private PengumumanRepositry $pengumumanRepositry;
    private MatakuliahRepository $matakuliahRepository;
    private FileService $fileService;
    private TugasRepository $tugasRepository;
    private TugasuserReposiroty $tugasuserReposiroty;
    private NilaiRepository $nilaiRepository;
    private NilaiService $nilaiService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $this->matakuliahRepository = new MatakuliahRepository($connection);
        $this->pengumumanRepositry = new PengumumanRepositry($connection);
        $userRepository = new UserRepository($connection);
        $this->userRepository = $userRepository;
        $sessionRepository = new SessionRepository($connection);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
        $this->fileService = new FileService();
        $this->tugasRepository = new TugasRepository($connection);
        $this->tugasuserReposiroty = new TugasuserReposiroty($connection);
        $nilaiRepository = new NilaiRepository($connection);
        $this->nilaiRepository = $nilaiRepository;
        $this->nilaiService = new NilaiService($nilaiRepository);
    }
    public function beranda(): void
    {
        $user = $this->sessionService->current();
        $pengumuman = $this->pengumumanRepositry->getAll();
        $matakuliah = $this->matakuliahRepository->getMatakuliahYangDiajar($user->id);
        View::render("dosen/beranda", [
            "user" => $user,
            "pengumuman" => $pengumuman,
            "matakuliah" => $matakuliah,
        ]);
    }

    public function jadwal(): void
    {
        $user = $this->sessionService->current();
        $jadwal = $this->matakuliahRepository->getMatakuliahYangDiajar($user->id);
        View::render("dosen/jadwal", [
            "user" => $user,
            "jadwal" => $jadwal,
        ]);
    }

    public function detail_matakuliah(): void
    {
        $user = $this->sessionService->current();
        $matakuliah = $this->matakuliahRepository->getById($_GET['id']);
        $tugas = $this->tugasRepository->getAllCertainMatakuliah($_GET['id']);
        $mahasiswa = $this->userRepository->getAllUserWithCertainMatakuliah($_GET['id']);
        View::render("dosen/detail_matakuliah", [
            "user" => $user,
            "matakuliah" => $matakuliah,
            "mahasiswa" => $mahasiswa,
            "tugas" => $tugas,
        ]);
    }

    public function detail_tugas(): void
    {
        $user = $this->sessionService->current();
        $tugas = $this->tugasRepository->getById($_GET['id']);
        $usersAlreadySubmit = $this->tugasuserReposiroty->getUsersAlreadySubmit(intval($_GET['id']));
        View::render("dosen/detail_tugas", [
            "user" => $user,
            "tugas" => $tugas,
            "usersAlreadySubmit" => $usersAlreadySubmit,
        ]);
    }

    public function buat_tugas_page(): void
    {
        $user = $this->sessionService->current();
        $matakuliah = $this->matakuliahRepository->getById($_GET['id']);
        View::render("dosen/buat_tugas", [
            "user" => $user,
            "matakuliah" => $matakuliah,
        ]);
    }

    public function buat_tugas(): void
    {
        $tugas = new Tugas();
        $tugas->pelajaran_id = $_POST['id'];
        $tugas->judul = $_POST['judul'];
        $tugas->deskripsi = $_POST['deskripsi'];
        $tugas->deadline = new \DateTime($_POST['deadline']);

        if(isset($_FILES['lampiran']) && $_FILES['lampiran']['error'] == UPLOAD_ERR_OK){
            $tugas->link_lampiran = $this->fileService->uploadLampiranTugas($tugas->pelajaran_id, $_FILES['lampiran']['tmp_name'], $_FILES['lampiran']['name']);
        }

        $this->tugasRepository->save($tugas);
        View::redirect("/dosen/detail_matakuliah", "id=" . $tugas->pelajaran_id . "&&message=berhasil membuat tugas");
    }

    public function tugas_user(): void
    {
        $user = $this->sessionService->current();
        $data = $this->tugasuserReposiroty->getTugasUserWithTugasJudulAndUserById(intval($_GET['id']));
        View::render("dosen/tugas_user", [
            "user" => $user,
            "datapage" => $data,
        ]);
    }

    public function rekap_nilai(): void
    {
        $user = $this->sessionService->current();
        $matakuliah = $this->matakuliahRepository->getMatakuliahYangDiajar($user->id);
        if (isset($_GET['id']) && $_GET['id']){
            foreach ($matakuliah as $satuMatakuliah){
                if ($satuMatakuliah->id == $_GET['id']){
                    $matakuliahData = $satuMatakuliah;
                }
            }
        } else {
            View::redirect("/dosen/rekap_nilai", "id=" . $matakuliah[0]->id);
        }
        $pageData = $this->nilaiRepository->getRekapNilaiData($matakuliahData->id);
        View::render("dosen/rekap_nilai", [
            "user" => $user,
            "matakuliah" => $matakuliah,
            "matakuliahData" => $matakuliahData,
            "pageData" => $pageData,
        ]);
    }

    public function save_rekap_nilai(): void
    {
        $nilai = new Nilai();
        $nilai->id = $_POST['nilai_id'] == "" ? null : intval($_POST['nilai_id']);
        $nilai->user_id = $_POST['user_id'] == "" ? null : intval($_POST['user_id']);
        $nilai->pelajaran_id = $_POST['matakuliah_id'] == "" ? null : intval($_POST['matakuliah_id']);
        $nilai->nilai_1 = $_POST['nilai_1'] == "" ? null : intval($_POST['nilai_1']);
        $nilai->nilai_2 = $_POST['nilai_2'] == "" ? null : intval($_POST['nilai_2']);
        $nilai->nilai_3 = $_POST['nilai_3'] == "" ? null : intval($_POST['nilai_3']);
        $nilai->nilai_4 = $_POST['nilai_4'] == "" ? null : intval($_POST['nilai_4']);
        $nilai->nilai_5 = $_POST['nilai_5'] == "" ? null : intval($_POST['nilai_5']);
        $nilai->nilai_uts = $_POST['nilai_uts'] == "" ? null : intval($_POST['nilai_uts']);
        $nilai->nilai_6 = $_POST['nilai_6'] == "" ? null : intval($_POST['nilai_6']);
        $nilai->nilai_7 = $_POST['nilai_7'] == "" ? null : intval($_POST['nilai_7']);
        $nilai->nilai_8 = $_POST['nilai_8'] == "" ? null : intval($_POST['nilai_8']);
        $nilai->nilai_9 = $_POST['nilai_9'] == "" ? null : intval($_POST['nilai_9']);
        $nilai->nilai_10 = $_POST['nilai_10'] == "" ? null : intval($_POST['nilai_10']);
        $nilai->nilai_uas = $_POST['nilai_uas'] == "" ? null : intval($_POST['nilai_uas']);
        $this->nilaiService->save($nilai);
        View::redirect("/dosen/rekap_nilai", "id=" . $_POST['matakuliah_id']);
    }
}