<?php

namespace CobaMVC\Controller;

use CobaMVC\App\View;
use CobaMVC\Config\Database;
use CobaMVC\Domain\User;
use CobaMVC\Repository\JurusanRepository;
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

class AuthController
{
    private UserRepository $userRepository;
    private UserService $userService;
    private SessionService $sessionService;
    private JurusanRepository $jurusanRepository;
    private fileService $fileService;

    public function __construct()
    {
        $connection = Database::getConnection();
        $userRepository = new UserRepository($connection);
        $this->userRepository = $userRepository;
        $sessionRepository = new SessionRepository($connection);
        $this->jurusanRepository = new JurusanRepository($connection);

        $sessionService = new SessionService($sessionRepository, $userRepository);
        $this->sessionService = $sessionService;
        $this->userService = new UserService($userRepository, $sessionRepository, $sessionService);
        $this->fileService = new fileService();
    }

    public function Login_page(): void
    {
        View::render("auth/login");
    }

    public function Register_page(): void
    {
        View::render("auth/register");
    }

    public function detail_register_page(): void
    {
        $user = $this->sessionService->current();
        $jurusan = $this->jurusanRepository->getAllJurusan();
        View::render("auth/detail_register", [
            "user" => $user,
            "jurusan" => $jurusan
        ]);
    }

    public function detail_register(): void
    {
        $user = $this->sessionService->current();

        if(isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK){
            $link_foto = $this->fileService->uploadPhotoProfile($user->id, $_FILES['foto']['tmp_name'], $_FILES['foto']['name']);
        }

        $user->nama = $_POST['nama'];
        $user->tempat_lahir = $_POST['tempat_lahir'];
        $user->tanggal_lahir = new \DateTime($_POST['tanggal_lahir']);
        $user->jenis_kelamin = $_POST['jenis_kelamin'];
        $user->domisili = $_POST['domisili'];
        $user->jurusan_id = $_POST['jurusan'];
        if($user->link_foto){
            unlink($user->link_foto);
        }
        $user->link_foto = $link_foto;

        $this->userRepository->updateUserData($user);
        $role = $this->sessionService->getRole();
        View::redirect("/$role/beranda");
    }

    public function register(): void
    {
        $request = new User();
        $request->nama = $_POST['nama'];
        $request->email = $_POST['email'];
        $request->password = $_POST['password'];

        $result = $this->userService->register($request);
        if($result['error']){
            View::render("auth/register", [
                "error" => $result['error']
            ]);
            return;
        }
        View::redirect("/auth/login", "message=Register success, data will be reviewed by admin ");
    }

    public function login(): void
    {
        $request = new User();
        $request->email = $_POST['email'];
        $request->password = $_POST['password'];
        $user = $this->userService->login($request);

        if($user["error"]){
            View::render("auth/login", [
                "error" => $user['error']
            ]);
            return;
        }

        if(!$user['role']){
            View::redirect("/auth/login", "message=your account not reviewed yet");
        }

        if($user["alert"]){
            View::redirect("/detail_register");
        }

        View::redirect("/" . $user['role'] . "/beranda", "message=login success");
    }

    public function logout(): void
    {
        $this->sessionService->destroy();
        View::redirect("/auth/login", "message=Log out success");
    }

    public function user_profile(): void
    {
        $user = $this->sessionService->current();
        $userRole = $this->sessionService->getRole();
        View::render("auth/user_profile", [
            "user" => $user,
            "role" => $userRole,
        ]);
    }
}